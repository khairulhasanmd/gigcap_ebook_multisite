<?php

/**
 * @package UserController
 * @author TechVillage <support@techvill.org>
 * @contributor Sabbir Al-Razi <[sabbir.techvill@gmail.com]>
 * @contributor Soumik Datta <[soumik.techvill@gmail.com]>
 * @created 20-05-2021
 * @modified 15-02-2023
 */

namespace App\Http\Controllers;

use DB, Session, Hash, Auth, Str;
use App\DataTables\{UserListDataTable, UsersActivityDataTable};
use App\Models\{User, File, Role, RoleUser};
use App\Exports\{UserListExport};
use App\Http\Requests\Admin\PasswordUpdateRequest;
use App\Services\Mail\{UserMailService, UserSetPasswordMailService};
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreUserRequest;
use Spatie\Activitylog\Models\Activity;
use App\Http\Resources\AjaxSelectSearchResource;
use App\Services\UserService;
use Modules\Subscription\Services\CreditService;
use App\Services\SubscriptionService;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Subscription\Services\PackageSubscriptionService;
use Modules\OpenAI\Services\FolderService;

class UserController extends Controller
{
    /**
     * Subscription service
     *
     * @var object
     */
    protected $subscriptionService;

    /**
     * Login controller constructor
     * @param SubscriptionService $subscriptionService
     * @return void
     */
    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    /**
     * User List
     *
     * @param  UserListDataTable  $dataTable
     * @return \Illuminate\Contracts\View\View
     */
    public function index(UserListDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index', ['roles' => Role::getAll()]);
    }

    /**
     * Create user
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('admin.users.create', ['roles' => Role::getAll()->whereNotIn('slug', ['vendor-admin', 'guest'])]);
    }

    /**
     * Store user
     *
     * @param  StoreUserRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreUserRequest $request, FolderService $folderService)
    {
        $data = ['status' => 'fail', 'message' => __('Invalid Request')];

        $request['password'] = Hash::make($request->password);
        $request['email'] = strtolower($request->email);
        $request['activation_code'] = ($request->status <> 'Active') ? Str::random(10) : null;

        try {
            DB::beginTransaction();

            $id = (new User)->store($request->only('name', 'email', 'activation_code', 'password', 'status'));

            if (!empty($id)) {
                $roleAll = Role::getAll();
                $roles = [];

                foreach ($request->role_ids as $role_id) {
                    $roles[] = ['user_id' => $id, 'role_id' => $role_id];
                    $request['role'] = $roleAll->where('id', $role_id)->first();
                    if ($request['role']['type'] == 'user') {
                        $defaultPackage = CreditService::defaultPackage();
                        if ((preference('is_default_package') == 1) && !empty($defaultPackage)) {
                            $this->subscriptionService->storeFreeCredit($defaultPackage, $id);
                        }
                    }
                }

                if (!empty($roles)) {
                    (new RoleUser)->store($roles);
                }

                $folderService->createFolder($id);
                
                if ($request->send_mail == 'on' && $request->status != 'Inactive') {
                    $emailResponse = (new UserMailService)->send($request);

                    if ($emailResponse['status'] == false) {
                        \DB::rollBack();
                        return redirect()->back()->withInput()->withErrors(['fail' => $emailResponse['message']]);
                    }
                }

                $data['status'] = 'success';
                $data['message'] = __('The :x has been successfully saved.', ['x' => __('User Info')]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $data['message'] = $e->getMessage();
        }

        $this->setSessionValue($data);
        return redirect()->route('users.index');
    }

    /**
     * Verification
     * @param int $id
     * @return \Illuminate\Routing\Redirector
     */
    public function verification($code)
    {
        if (preference('customer_signup') != 1) {
            $this->setSessionValue(['status' => 'fail', 'message' => __('The signup option is disabled. Please contact the website administrator.')]);
            return redirect()->route('login');
        }
        $user = User::where('activation_code', $code)->first();

        if ($user && (($user->updated_at ?? $user->created_at) < now()->subSeconds(preference('otp_expire_time')))) {
            $this->setSessionValue(['status' => 'fail', 'message' => __('Your OTP has been expired. Please try to login and you will get resend link.')]);
            return redirect()->back()->with(['resend' => true, 'email' => $user->email]);
        }

        if (empty($user)) {
            $this->setSessionValue(['status' => 'fail', 'message' => __('Invalid Request')]);
            return redirect()->route('login');
        } else if ($user->status == 'Active') {
            $this->setSessionValue(['status' => 'fail', 'message' => __('This account is already activated')]);
            return redirect()->route('login');
        }

        User::where('activation_code', $code)->update(['status' => 'Active', 'activation_code' => NULL, 'activation_otp' => NULL, 'email_verified_at' => now()]);
        $user->status = 'Active';

        if (preference('welcome_email') == 1) {
            $emailResponse = (new UserMailService)->send($user);

            if (!$emailResponse['status']) {
                return redirect()->back()->withInput()->withErrors(['fail' => $emailResponse['message']]);
            }
        }

        $this->setSessionValue(['status' => 'success', 'message' => __('Your account is activated, please login')]);
        return redirect()->route('login');
    }

    /**
     * OTP form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function verify()
    {
        $data['route'] = route('users.verify.otp',['otp = null']);
        return view('site.auth.passwords.otp', $data);
    }


    /**
     * Verify OTP
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function verifyByOtp(Request $request, $code = null)
    {
        if (preference('customer_signup') != 1) {
            $this->setSessionValue(['status' => 'fail', 'message' => __('The signup option is disabled. Please contact the website administrator.')]);
            return redirect()->route('login');
        }
        
        if ( !empty($code) ) {
            $code = $request->token;
        }

        $user = User::where('activation_otp', $code)->first();

        if ($user && (($user->updated_at ?? $user->created_at) < now()->subSeconds(preference('otp_expire_time')))) {
            $this->setSessionValue(['status' => 'fail', 'message' => __('Your OTP has been expired. Please resend OTP again.')]);
            return redirect()->back()->with(['resend' => true, 'email' => $user->email]);
        }

        if (empty($user)) {
            $this->setSessionValue(['status' => 'fail', 'message' => __('Invalid OTP Request. Please provide your OTP again')]);
            return redirect()->back();
        } else if ($user->status == 'Active') {
            $this->setSessionValue(['status' => 'fail', 'message' => __('This account is already activated')]);
            return redirect()->route('login');
        }

        User::where('activation_otp', $code)->update(['status' => 'Active', 'activation_code' => NULL, 'activation_otp' => NULL, 'email_verified_at' => now()]);
        $user->status = 'Active';

        if (preference('welcome_email') == 1) {
            $emailResponse = (new UserMailService)->send($user);

            if (!$emailResponse['status']) {
                return redirect()->back()->withInput()->withErrors(['fail' => $emailResponse['message']]);
            }
        }
        
        $this->setSessionValue(['status' => 'success', 'message' => __('Your account is activated, please login')]);
        return redirect()->route('login');
    }

    /**
     * Edit user information
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit($id = null)
    {
        $data['profile'] = 'active';
        $data['user'] = User::with('metas')->where('id', $id)->first();

        if (is_null($data['user'])) {
            return redirect()->back()->withFail(__('User does not exist.'));
        }

        $data['roleIds'] = $data['user']->roles()->pluck('id')->toArray();
        $data['roles'] = Role::getAll()->whereNotIn('slug', ['guest', 'vendor-admin']);

        return view('admin.users.edit', $data);
    }

    /**
     * Update password
     *
     * @param  PasswordUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(PasswordUpdateRequest $request, int $id)
    {
        $response = (new UserService)->updatePassword($request->all(), $id);
        $this->setSessionValue($response);

        return back();
    }
    /**
     * Update profile password
     *
     * @param  PasswordUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfilePassword(PasswordUpdateRequest $request, int $id)
    {
        $this->updatePassword($request, $id);
        return redirect()->route('dashboard');
    }

    /**
     * Update
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id = null)
    {
        $response = ['status' => 'fail', 'message' => __('Invalid Request')];
        if ($request->isMethod('post')) {
            $result = $this->checkExistence($id, 'users');
            if ($result['status'] === true) {
                $validator = User::updateValidation($request->all(), $id);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                try {
                    DB::beginTransaction();
                    $request['email'] = validateEmail($request->email) ? strtolower($request->email) : null;
                    $data['userData'] = $request->only('name', 'email', 'status');
                    $data['userMetaData'] = $request->only('designation', 'description', 'facebook', 'twitter', 'instagram');
                    $user = User::find($id);
                    $request->has('file_id') && !empty($request->file_id) ? $user->updateFiles() : $user->deleteFromMediaManager();
                    
                    if ($request->status != 'Active') {
                        (new PackageSubscriptionService())->cancel($id);
                    }

                    $userStore = (new user)->updateUser($data, $id);

                    if ($userStore) {
                        if (isset($request->role_ids)) {
                            $request['user_id'] = $id;
                            (new RoleUser)->remove($id);

                            $roles = [];
                            foreach ($request->role_ids as $role_id) {
                                $roles[] = ['user_id' => $id, 'role_id' => $role_id];
                            }
                            if (!empty($roles)) {
                                (new RoleUser)->store($roles);
                            }
                        }

                        DB::commit();
                        $response['status'] = 'success';
                        $response['message'] = __('The :x has been successfully saved.', ['x' => __('User Info')]);
                    }
                } catch (Exception $e) {
                    DB::rollBack();
                    $response['message'] = $e->getMessage();
                }
            } else {
                $response['message'] = $result['message'];
            }
        }

        $this->setSessionValue($response);
        if (isset($request->user_profile)) {
            return redirect()->back();
        }
        return redirect()->route('users.index');
    }

    /**
     * Update Profile
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request, $id = null)
    {
        $response = ['status' => 'fail', 'message' => __('Invalid Request')];
        $result = $this->checkExistence($id, 'users');
        if ($result['status'] === true) {
            $validator = User::updateProfileValidation($request->all(), $id);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $request['email'] = validateEmail($request->email) ? strtolower($request->email) : null;
            $data['userData'] = $request->only('name', 'email', 'status');
            $data['userMetaData'] = $request->only('designation', 'description', 'facebook', 'twitter', 'instagram');
            (new user)->updateUser($data, $id);
            $response['status'] = 'success';
            $response['message'] = __('The :x has been successfully saved.', ['x' => strtolower(__('User Info'))]);
        } else {
            $response['message'] = $result['message'];
        }

        $this->setSessionValue($response);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(UserService $service, $id)
    {
        $response = $service->delete($id);
        $this->setSessionValue($response);

        return back();
    }

    /**
     * Profile
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function profile()
    {
        $id = Auth::guard('user')->user()->id;
        $data['user'] = User::with('avatarFile')->where('id', $id)->first();
        $data['roleIds'] = $data['user']->roles()->pluck('id')->toArray();
        $data['roles'] = Role::getAll();

        return view('admin.users.profile', $data);
    }

    /**
     * User list pdf
     *
     * @return mixed
     */
    public function pdf()
    {
        $data['users'] = User::orderBy('id', 'desc')->get();

        return printPDF($data, 'user_list' . time() . '.pdf', 'admin.users.list_pdf', view('admin.users.list_pdf', $data), 'pdf');
    }

    /**
     * User list csv
     *
     * @return mixed
     */
    public function csv()
    {
        return Excel::download(new UserListExport(), 'user_list' . time() . '.csv');
    }

    /**
     * Find users
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function findUser(Request $request)
    {
        $users = User::whereLike('name', $request->q)->limit(10)->get();
        return AjaxSelectSearchResource::collection($users);
    }

    /**
     * All users activities log
     *
     * @param  UsersActivityDataTable  $dataTable
     * @return mixed
     */
    public function allUserActivity(UsersActivityDataTable $dataTable)
    {
        $logTypes = ['USER LOGIN', 'USER LOGOUT'];
        return $dataTable->render('admin.users.activity_list', ['logTypes' => $logTypes]);
    }

    /**
     * Delete user activity log
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function deleteUserActivity($id)
    {
        $response = ['status' => 'fail', 'message' => __('Invalid Request')];
        $result = $this->checkExistence($id, 'activity_logs');

        if ($result['status'] === true) {
            Activity::find($id)->delete();
            $response['status'] = 'success';
            $response['message'] = 'Activity log deleted successfully!';
        } else {
            $response['message'] = $result['message'];
        }

        $this->setSessionValue($response);
        return redirect()->route('users.activity');
    }
}
