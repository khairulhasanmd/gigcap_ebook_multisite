<?php

/**
 * @package UserController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @contributor Soumik Datta <[soumik.techvill@gmail.com]>
 * @created 22-11-2021
 */

namespace App\Http\Controllers\User;

use Auth, Hash, DB, Crypt, Session;
use App\Models\{User, Team, TeamMemberMeta};
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GlobalController;
use Illuminate\Support\Str;
use App\Services\UserService;
use App\Services\Mail\{
    UserVerificationMail,
    MemberMailService,
};
use App\Rules\CheckValidEmail;
use Illuminate\Support\Facades\Validator;
use App\Services\CmpApi;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;




use Modules\Subscription\Entities\{
    Credit, SubscriptionDetails, PackageSubscription
};
use Modules\Subscription\Services\PackageService;
use Modules\Concept\Http\Controllers\LoginController;

class UserController extends GlobalController
{
    /**
     * User profile
     */
    public function profile()
    {
        parent::__construct();
        // dd($this->concept);
        $this->cmp= New CmpApi(($this->concept));
        $userid = auth()->user()->id;
        $id = Auth::guard('user')->user()->id;
        $data['user'] = User::with('avatarFile')->where('id', $id)->first();
        $data =auth()->user();
        $userInfo = $this->cmp->getCustomer($data->customer_id);
        $order = $this->cmp->getOrders($data->customer_id);
        $subData = $this->cmp->getSubscriptionDetailByCustomerId($data->customer_id);
        // dd($subscription);
        return view('user.profile', [
            'userInfo' => $userInfo->data,
            'subData'  => $subData->data,
            'order'  => $order->data,
            'data'  => $data,
        ]);
  

    }
    public function changePassword()
    {
      
        return view('user.change-password');
  

    }

    public function saveChangePassword(Request $request) {

        if($request->password != $request->password_confirmation){
            return redirect()->back()->withErrors(['error' => 'New password is not repeated twice']);
        }

        $newPassword = $request->password;
        $this->cmp= New CmpApi(($this->concept));
        $this->cmp->getNewPassword($newPassword);  
        return redirect('user/profile')->with('success', 'Password changed'); 
     
    }

    public function getOrder(Request $request, $orderId) {
        $this->cmp= New CmpApi(($this->concept));
        // dd($orderId);
        $response = $this->cmp->getOrder($orderId);  
        return $response;
      
    }

    /**
     * packages for member user header
     * @return array
     */
    public static function packages():array
    {
        $id = Auth::guard('user')->user()->id;
        $data['memberData'] = Team::getMember($id);
        $data['isMemberPackage'] = subscription('isSubscribed', auth()->user()->id);
        if (!empty($data['memberData']) && ($data['isMemberPackage'] === true || auth()->user()->hasCredit('word'))) {
            
            $data['memberCurrentPackage'] = session()->get('memberPackageData');
            $ids = [$data['memberData']->parent_id, $id];
            $memberPackages = SubscriptionDetails::with(['user' => function($q) {
                $q->select('id', 'name');
            }, 'package' => function($q) {
                $q->select('id', 'name as packageName');
            }])->whereIn('subscription_details.user_id', $ids)
                ->groupBy('subscription_details.user_id')->get()
                ->map(function ($memberPackage) {
                    return [
                        'id' => $memberPackage->user?->id,
                        'package_name' =>  $memberPackage?->user?->name,
                    ];
                });
            $data['memberPackages'] = $memberPackages;
        }
        return $data;
    }

    /**
     * User subscription
     */
    public function subscription(): View
    {
        return view('user.subscription');
    }
    public function cancelSubscription()
    {   
        $id = Auth::guard('user')->user()->subscription_id;
        $this->cmp= New CmpApi(($this->concept));
        $response = $this->cmp->cancelSubscription($id);  
        // dd($response->errors);
        if($response->status == "success"){
            return Redirect::back()->with('success', $response->errors);
        }else if($response->status == 'error'){
            // return redirect()->intended(route('user.profile'))->withErrors(['error' => $response->errors]);
            return Redirect::back()->withErrors(['error' => $response->errors]);
        }else{
            return redirect($this->locale.'/profile')->withErrors(['error' => 'Something went wrong. Please try later or contact our support team.']);
        }
    }

    public function updateProfile(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $request->offsetUnset('_token');
        $user['customer_id'] = Auth::guard('user')->user()->customer_id;

        $user['data'] = $request->all();
            $this->cmp= New CmpApi(($this->concept));
            $response = $this->cmp->updateCustomer($user); 
            if($response) {
                return Redirect::back()->with('success', 'Profile updated!'); 
            } else {
                return redirect('/profile')->withErrors(['error' => 'Something went wrong. Please try later']);
            }
       
        }
    

    /**
     * Edit user
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(): View
    {
        $data['user'] = User::getAll()->where('id', Auth::user()->id)->first();

        return view('site.user.edit', $data);
    }

    /**
     * Update user
     *
     * @param  Request  $request
     */
    public function update(Request $request): mixed
    {
        $response = ['status' => 'fail', 'message' => __('Invalid Request')];

        if ($request->isMethod('post')) {
            $id = Auth::user()->id;
            $result = $this->checkExistence($id, 'users');

            if ($result['status'] === true) {
                $validator = User::siteUpdateValidation($request->only('name', 'image'), $id);
                if ($validator->fails()) {
                    $response['message'] = $validator->errors()->first();
                    return $response;
                }

                try {

                    DB::beginTransaction();

                    if ((new user)->updateUser($request->only('name', 'image'), $id)) {
                        DB::commit();
                        $response = ['status' => 'success', 'message' => __('Your information has been successfully saved.')];
                    }

                } catch (\Exception $e) {
                    DB::rollBack();
                    $response['message'] = $e->getMessage();
                }

            } else {
                $response['message'] = $result['message'];
            }
        }

        return $response;
    }

    /**
     * Invite member via email
     *
     * @param  Request  $request
     * @return array
     */
    public function memberInvitationEmail(Request $request): mixed
    {
        $response = ['status' => 'fail', 'message' => __('Invalid Request')];
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255', new CheckValidEmail]
        ]);
        if ($validator->fails()) {
            return $response = ['status' => 'fail', 'message' => $validator->messages()->first()];
        }
        if ($request->isMethod('post')) {
            $id = Auth::user()->id;
            $result = $this->checkExistence($id, 'users');
            $checkEmailExist = User::where('email', $request->email)->first();
            if (!empty($checkEmailExist)) {
                return $response = ['status' => 'fail', 'message' => __('This email is already exist.')];
            }
            if ($result['status'] === true) {
                $request['member_url'] = $this->memberGenerateLink($request->email);
                try {
                    DB::beginTransaction();
                    $emailResponse = (new MemberMailService)->send($request);
                    if ($emailResponse['status'] == false) {
                        DB::rollBack();
                        return $response = ['status' => 'fail', 'message' => $emailResponse['message']];
                    } else {
                        DB::commit();
                        $response = ['status' => 'success', 'message' => __('Invitation link send successfully.')];
                    }

                } catch (\Exception $e) {
                    DB::rollBack();
                    $response['message'] = $e->getMessage();
                }

            } else {
                $response['message'] = $result['message'];
            }
        }

        return $response;
    }

    /**
     * Update user password
     *
     * @param  Request  $request
     */
    public function updatePassword(Request $request): array
    {
        $response = ['status' => 'fail', 'message' => __('Invalid Request')];
        $user = Auth::user();

        $data = $this->checkExistence($user->id, 'users', ['getData' => true]);

        if ($data['status'] === false) {
            $response['message'] = $data['message'];

            return $response;
        }

        if (empty($data['data']->sso_service) && !Hash::check($request->old_password, $data['data']->password)) {
            $response['message'] = __('Current password is wrong.');

            return $response;
        }

        $validator = User::siteUpdatePasswordValidation($request->all());

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();

            return $response;
        }

        $user->password = Hash::make(trim($request->new_password));

        if ($user->save()) {
            $response = [
                'status' => 'success',
                'message' => __('The :x has been successfully saved.', ['x' => __('Password')])
            ];
        } else {
            $response['message'] = __('Nothing is updated.');
        }

        return $response;
    }

    /**
     * Verify Email
     *
     * @param  Request  $request
     */
    public function verifyEmailByAjax(Request $request): mixed
    {

        $response = ['status' => 'fail', 'message' => __('Invalid Request')];
        $id = Auth::user()->id;
        $email = Auth::user()->email;

        if ($email != $request->email) {
            return $response;
        }

        try {
            DB::beginTransaction();

            $id = Auth::User()->id;

            $request['activation_code'] = Str::random(10);
            $request['activation_otp'] = random_int(1111, 9999);

            $id = (new User)->updateUser(['activation_code' => $request->activation_code, 'activation_otp' => $request->activation_otp], $id);

            if (!empty($id)) {

                $request['name'] = Auth::user()->name;
                $request['raw_password'] = Auth::user()->password;

                // Send Mail to the customer
                $emailResponse = (new UserVerificationMail)->send($request);

                if ($emailResponse['status'] == false) {
                    DB::rollBack();
                    $response['message'] = $emailResponse['message'];

                    return $response;
                }

                DB::commit();

                $response['status'] = 'success';
                $response['preference'] = preference('email');

                if (preference('email') == 'both' ) {
                    $response['message'] = __('Verification link & code has been sent to your mail.');
                } else if (preference('email') == 'token') {
                    $response['message'] =  __('Verification link has been sent to your mail.');
                } else {
                    $response['message'] = __('Verification code has been sent to your mail.');
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $response['status'] = 'fail';
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    /**
     * Verify Email By Ajax
     *
     * @param  Request  $request
     */
    public function verifyOtpByAjax(Request $request): mixed
    {
        $response = ['status' => 'fail', 'message' => __('Invalid Request')];

        $otp = (new User)->tokenExist($request->otp);

        if ($otp) {
            User::where('activation_otp', $request->otp)->update(['activation_code' => NULL, 'activation_otp' => NULL, 'email_verified_at' => now()]);
            $response = ['status' => 'success', 'message' => __('Email Verified')];
        } else {
            $response = ['status' => 'fail', 'message' => __('OTP didn\'t match')];
        }

        return $response;
    }

    /**
     * Update Email By Ajax
     *
     * @param  Request  $request
     */
    public function updateEmailByAjax(Request $request): mixed
    {
        $response = ['status' => 'fail', 'message' => __('Invalid Request')];
        $validator = User::userEmailValidation(['email' => $request->new_email]);

        if ($validator->fails()) {
            $response = ['status' => 'fail', 'message' => $validator->errors()->first()];

            return $response;
        }

        try {
            DB::beginTransaction();

            $id = Auth::User()->id;
            $id = (new User)->updateUser(['email' => $request->new_email], $id);

            if (!empty($id)) {
                DB::commit();
                $response = ['status' => 'success', 'message' => __('Email has been updated')];
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $response['status'] = 'fail';
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    /**
     * Edit Email
     *
     * @param  Request  $request
     */
    public function editEmail(Request $request): View
    {
        $data['id'] = $request->id;

        return view('user.update_email', $data);
    }

    /**
     * Update Email
     *
     * @param  Request  $request
     */
    public function updateEmail(Request $request)
    {
        $response = ['status' => 'fail', 'message' => __('Invalid Request')];
        $validator = User::userEmailValidation(['email' => $request->email]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            $id = $request->id;
            $id = (new User)->updateUser(['email' => $request->email], $id);

            if (!empty($id)) {
                DB::commit();
                $response = ['status' => 'success', 'message' => __('Email has been updated')];
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $response['status'] = 'fail';
            $response['message'] = $e->getMessage();
        }

        $this->setSessionValue($response);
        return redirect()->route('user.profile');
    }

    /**
     * Verification
     * @param int $id
     * @return \Illuminate\Routing\Redirector
     */
    public function verification($code)
    {
        $user = User::where('activation_code', $code)->first();

        if (empty($user)) {
            $this->setSessionValue(['status' => 'fail', 'message' => __('Invalid Request')]);

            return redirect()->route('user.profile');
        }

        User::where('activation_code', $code)->update(['activation_otp' => NULL, 'activation_code' => NULL]);

        return redirect()->route('userEditEmail', ['id' => Crypt::encrypt($user->id)]);
    }

    /**
     * Delete
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        if (auth()->user()->role()->slug == 'super-admin') {
            return back()->withFail(__("Admin account can't be deleted."));
        }

        if (!Hash::check($request->password, Auth::user()->password)) {
            return back()->withFail(__('Password does not match'));
        }

        if (User::where('id', \Auth::user()->id)->update(['status' => 'Deleted'])) {
            Auth::guard('user')->logout();
            return redirect()->route('frontend.index')->withSuccess(__('The :x has been successfully deleted.', ['x' => __('Account')]));
        }

        return back()->withFail(__('Failed to delete user, please try again.'));
    }

    /**
     * Delete Image
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeImage()
    {
        if ((new User)->removeProfileImage()) {
            return back()->withSuccess(__('Profile image remove successfully.'));
        }

        return back()->withFail(__('Profile image remove fail.'));
    }

    /**
     * Distinct User Activity
     */
    public function activity(): View
    {
        $idArray = [];
        $lastLogins = \DB::table(config('activitylog.table_name'))
            ->select(\DB::raw('MAX(id) as id'))
            ->where('causer_id', auth()->id())
            ->where('log_name', 'user login')
            ->where('description', 'LIKE', '%successful%')
            ->groupBy(['properties->ip_address', 'properties->browser'])->get();

        foreach ($lastLogins as $lastLogin){
            $idArray[] = $lastLogin->id;
        }

        $userActivities = \DB::table(config('activitylog.table_name'))
            ->select(\DB::raw('id, properties, created_at'))
            ->whereIn('id', $idArray)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('site.user.activity', compact('userActivities'));
    }

    /**
     * Get user subscription history
     *
     * @return View
     */
    public function subscriptionHistory(): View
    {
        $data['payments'] = SubscriptionDetails::with('package', 'credit', 'user')->where('user_id', auth()->id())->latest()->paginate(preference('row_per_page', 25));
        return view('user.subscription-history', $data);
    }

    /**
     * Customer Ticket
     *
     * @return View
     */
    public function customTicket(): View
    {
        return view('user.custom-ticket');
    }

    /**
     * Support Ticket
     *
     * @return View
     */

    public function supportTicket(): View
    {
        return view('user.support-ticket');
    }

    /**
     * new ticket
     *
     * @return View
     */
    public function newTicket(): View
    {
        return view('user.new-ticket');
    }

    /**
     * Buy Small Package
     * Get Team list
     *
     * @return View
     */
    public function userTeamList(): View
    {
        if (!subscription('isSubscribed', Auth::user()->id)) {
            return abort(404);
        }
        $data['teamMembers'] = Team::with('parent', 'user', 'memberMeta')->where('parent_id', auth()->id())->latest()->paginate(preference('row_per_page', 25));
        return view('user.subscription-team-list', $data);
    }


    /**
     * team member link generate
     *
     * @return string
     */
    public function memberGenerateLink($email = null)
    {
        $id = Auth::guard('user')->user()->id;
        if ($email) {
            $encrypted = base64_encode(rand(101, 999) . $id . rand(1001, 9999) . '_' . $email);
        }
        return  url('/registration') . "?key=" . $encrypted;
    }

    /**
     * Member Delete
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyMember(UserService $service, $id)
    {

        $response = ['status' => 'error', 'message' => __('The data you are looking for is not found')];

        if ($response = $service->deleteMember($id)) {
            $response = ['status' => 'success', 'message' => __('The :x has been successfully deleted.', ['x' => __('Member')])];
        }

        return response()->json($response);
    }

    /**
     * Member edit page 
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function memberEdit($id): mixed
    {
        $data['memberData'] = Team::with('user','memberMeta')->where('id', $id)->first();
        if (empty($data['memberData'])) {
            return redirect()->back()->withFail(__('User does not exist.'));
        }
        $data['memberMetaData'] = TeamMemberMeta::memberMetaData($data['memberData']->id, 'access');
        return view('user.member-edit', $data);
        
    }

    /**
     * Update team member info
     *
     * @param  Request  $request
     * @return array
     */
    public function updateMember(Request $request): mixed
    {
        $response = ['status' => 'fail', 'message' => __('Invalid Request')];
        if ($request->isMethod('post')) {
            $validator = Team::updateTeamValidation($request->all());
            if ($validator->fails()) {
                $response = ['status' => 'fail', 'message' => $validator->errors()->first()];
                return $response;
            }
            $memberData = Team::find($request->team_id);
            $notExistMsg = ':x does not exists.';
            if (empty($memberData)) {
                return $response = ['status' => 'fail', 'message' => __($notExistMsg, ['x' => __('Member')])];
            }
            $id = $memberData->user_id;
            $result = $this->checkExistence($id, 'users');

            if ($result['status'] === false) {
                return $response = ['status' => 'fail', 'message' => __($notExistMsg, ['x' => __('User')])];
            } 
            try {
                DB::beginTransaction();
                if ((new Team)->updatTeamStatus($request->only('status'), $request->team_id)) {
                    
                    DB::commit();
                    $response = ['status' => 'success', 'message' => __('Your information has been successfully saved.')];
                }
            } catch (\Exception $e) {
                DB::rollBack();
                $response['message'] = $e->getMessage();
            }
        }
        return $response;
    }

    /**
     * Update team member meta
     *
     * @param  Request  $request
     * @return array
     */
    public function updateMemberMeta(Request $request)
    {
        $response = ['status' => 'fail', 'message' => __('Invalid Request')];
        if ($request->isMethod('post')) {
            $validator = TeamMemberMeta::updateTeamMetaValidation($request->all());
            if ($validator->fails()) {
                $response = ['status' => 'fail', 'message' => $validator->errors()->first()];
                return $response;
            }
            $memberData = Team::find($request->team_id);
            $notExistMsg = ':x does not exists.';
            if (empty($memberData)) {
                return $response = ['status' => 'fail', 'message' => __($notExistMsg, ['x' => __('Member')])];
            }
            $id = $memberData->user_id;
            $result = $this->checkExistence($id, 'users');

            if ($result['status'] === false) {
                return $response = ['status' => 'fail', 'message' => __($notExistMsg, ['x' => __('User')])];
            }
            try {
                DB::beginTransaction();

                if (TeamMemberMeta::updateTeamMemberMeta($request->team_id, $request->metaField, $request->metaValue)) {
                    DB::commit();
                    $response = ['status' => 'success', 'message' => __('Your information has been successfully saved.')];
                }

            } catch (\Exception $e) {
                DB::rollBack();
                $response['message'] = $e->getMessage();
            }

        }
        return $response;
    }

    /**
     * Update team member Session & meta
     *
     * @param  Request  $request
     * @return array
     */
    public function updateMemberSession(Request $request)
    {
        $response = ['status' => 'fail', 'message' => __('Invalid Request')];
        if ($request->isMethod('post')) {
            $memberPackageData = SubscriptionDetails::where('user_id',$request->packageUserId)->first();
            if (empty($memberPackageData)) {
                return $response = ['status' => 'fail', 'message' => __('No pachage found to switch')];
            }
            $notExistMsg = ':x does not exists.';
            $id = $memberPackageData->user_id;
            $result = $this->checkExistence($id, 'users');
            
            if ($result['status'] === false) {
                return $response = ['status' => 'fail', 'message' => __($notExistMsg, ['x' => __('User')])];
            }
            $memberData = Team::getMember(auth()->user()->id);
            if (empty($memberData)) {
                return $response = ['status' => 'fail', 'message' => __($notExistMsg, ['x' => __('Member')])];
            }
            try {
                DB::beginTransaction();
                if (subscription('isSubscribed', auth()->user()->id) || auth()->user()->hasCredit('word')) {
                    
                    $currcentPackage = $request->session()->get('memberPackageData');
                    $user = User::find($request->packageUserId);
                    if (!empty($currcentPackage) && $currcentPackage['packageUser']) {  

                        $save = TeamMemberMeta::updateTeamMemberMeta($memberData->id, 'packageUserId', $id);
                        $userData = ['packageUser' => $id,'packUserName' => $user->name];
                        $request->session()->put('memberPackageData', $userData);
                    }else {
                        $insertMeta[] = [
                            'team_id' => $memberData->id,
                            'category'=> 'package',
                            'field'   => 'packageUserId',
                            'value'   => $id,
                        ];
                        $save = TeamMemberMeta::memberMetaInsert ($insertMeta);
                        $userData = ['packageUser' => $id,'packUserName' => $user->name];
                        $request->session()->put('memberPackageData', $userData);
                    }
                }
                if ($save) {
                    DB::commit();
                    $response = ['status' => 'success', 'message' => __('Your information has been successfully saved.')];
                }

            } catch (\Exception $e) {
                DB::rollBack();
                $response['message'] = $e->getMessage();
            }
        }
        return $response;
    }

    /**
     * Small Plan
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function smallPlan()
    {
        $data['defaultFeatures'] = PackageService::features();
        
        $data['plan'] = SubscriptionDetails::where(['user_id' => auth()->user()->id, 'billing_cycle' => null])->latest()->first()?->credit()->first();
        
        return view('user.small-plan', $data);
    }

}
