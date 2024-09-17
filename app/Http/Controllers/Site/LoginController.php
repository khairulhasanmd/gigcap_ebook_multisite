<?php

/**
 * @package LoginController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 08-11-2021
 */

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthUserRequest;
use App\Http\Requests\Admin\RegistrationUserRequest;
use App\Models\{User, PasswordReset, RoleUser, Role, Team, TeamMemberMeta};
use App\Services\ActivityLogService;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Modules\Subscription\Services\CreditService;
use App\Services\SubscriptionService;
use App\Services\Mail\{
    UserResetPasswordMailService,
    UserSetPasswordMailService,
    UserVerificationCodeMailService,
    UserMailService
};
use Modules\OpenAI\Services\FolderService;

use Illuminate\Support\Facades\{Password, Auth, Session, DB, Cookie, Hash};

class LoginController extends Controller
{
    /**
     * Cookie name
     *
     * @var string
     */
    private string $ckname = '';

    /**
     * Login controller constructor
     * @return void
     */
    public function __construct()
    {
        $this->ckname = explode("_", Auth::getRecallerName())[2];
        $this->middleware('guest:user')->except('logout', 'impersonate', 'cancelImpersonate');
    }

    /**
     * Show admin login form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showLoginForm()
    {
        $value = Cookie::get($this->ckname);
        if (!is_null($value)) {
            $rememberedUser = explode(".", explode($this->ckname, decrypt($value))[1]);

            if ($rememberedUser[1] == 'user' && Auth::guard('user')->loginUsingId($rememberedUser[0])) {
                $ckkey = encrypt($this->ckname . Auth::user()->id . ".user");
                Cookie::queue($this->ckname, $ckkey, 2592000);

                return redirect()->intended(route('dashboard'));
            }
        }

        if (isActive('Affiliate')) {
            \Modules\Affiliate\Entities\Referral::userClickUpdate();
        }

        return view('site.auth.login');
    }

    /**
     * Login authenticate operation.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function authenticate(AuthUserRequest $request)
    {
        $data = $request->only('email', 'password');
        $data['status'] = 'Active';
        $userData = User::where('email', $data['email'])->first();

        if (Hash::check($data['password'], $userData->password)) {

            if ($userData->status === 'Deleted') {
                (new ActivityLogService())->userLogin('failed', 'Deleted');
                return back()->withInput()->withErrors(['error' => __("Invalid User")]);
            }

            if ($userData->status === 'Pending') {
                (new ActivityLogService())->userLogin('failed', $userData->status);
                $resendCode = true;
                return back()->with('resendCode', $resendCode)->with('email', $userData->email)->withErrors(['error' => __("Please verify your email address.")]);
            }
            if ($userData->status != 'Active') {
                (new ActivityLogService())->userLogin('failed', 'Inactive');
                return back()->withInput()->withErrors(['error' => __("Inactive User")]);
            }
            if (Auth::guard('user')->attempt($data)) {
                if (!is_null($request->remember)) {
                    $ckkey = encrypt($this->ckname.Auth::user()->id.".user");
                    Cookie::queue($this->ckname, $ckkey, 2592000);
                }
                if ($this->ncpc()) {
                    Session::flush();
                    return view('errors.installer-error', ['message' => __('This product is facing license validation issue.') . "<br>" . __('Please verify your purchase code from :x.', ['x' => '<a style="color:#fcca19" href="' . route('purchase-code-check', ['bypass' => 'purchase_code']) .'">' . __('here') . '</a>'])]);
                }
                (new ActivityLogService())->userLogin('success', 'Login successful');
                
                
                $userTeam =  Team::getMember(Auth::user()->id);
                if (!empty($userTeam) && (subscription('isSubscribed', auth()->user()->id) || auth()->user()->hasCredit('word'))) 
                {
                    $getMemberMetaUser = TeamMemberMeta::getMemberMetaUser($userTeam->id, 'packageUserId');
                    if (!empty($getMemberMetaUser)) {
                        $userData = ['packageUser' => $getMemberMetaUser->id, 'packUserName' => $getMemberMetaUser->name];
                        session()->put('memberPackageData', $userData);
                    }
                }

                if (isActive('Affiliate') && session()->has('user_referral_active')) {
                    session()->forget('user_referral_active');

                    return redirect()->route('site.affiliate.registration');
                }

                if (auth()->user()->role()->type == 'admin') {
                    return redirect()->intended(route('dashboard'))->withCookie($this->getUserThemePreferenceCookie());
                } else {
                    return redirect()->intended(route('user.dashboard'))->withCookie($this->getUserThemePreferenceCookie());
                }
            }

            return back()->withInput()->withErrors(['error' => __("Invalid User")]);
        } else {
            (new ActivityLogService())->userLogin('failed', 'Incorrect');
            return back()->withInput()->withErrors(['email' => __("Invalid password")]);
        }

    }

    /**
     * Registration
     *
     * @param RegistrationUserRequest $request
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function registration(RegistrationUserRequest $request, SubscriptionService $subscriptionService, FolderService $folderService)
    {
        if (!$request->isMethod('post')) {
            $encryptedKey = $request->key;
            if ($encryptedKey) {
                $separator = explode('_', base64_decode($encryptedKey));
                $decryptedEmail = $separator[1];
                $existUserCheck = User::where('email', $separator[1])->first();
                if ($existUserCheck) {
                    return abort(401);
                }
            }
            if (isActive('Affiliate')) {
                \Modules\Affiliate\Entities\Referral::userClickUpdate();
            }
            return view('site.auth.registration', compact('encryptedKey'));

        } else {
            if (preference('customer_signup') != '1') {
                $data = ['status' => 'fail', 'message' => __('Customer sign up temporarily unavailable.')];
                $this->setSessionValue($data);
                return redirect()->back();
            }
            $data = ['status' => 'fail', 'message' => __('Invalid Request')];

            $request['name'] = $request->first_name . ' ' . $request->last_name;
            $request['password'] = Hash::make($request->password);
            $request['email'] = strtolower($request->email);
            $request['status'] = preference('user_default_signup_status') ?? 'Pending';

            if (preference('user_default_signup_status') === 'Pending') {
                $request['activation_code'] = Str::random(10);
                $request['activation_otp'] = random_int(1111, 9999);
            }

            $role = Role::getAll()->where('type', 'user')->first();
            try {
                DB::beginTransaction();

                $id = (new User)->store($request->only('name', 'email', 'activation_code', 'activation_otp', 'password', 'status'));
                if (!empty($id)) {
                    if (!empty($role)) {
                        (new RoleUser)->store(['user_id' => $id, 'role_id' => $role->id]);
                    }
                    
                    $folderService->createFolder($id);
                    
                    $teamId = null;
                    $requestEncrypKey = $request->encryptedKey;
                    if ($requestEncrypKey) {
                        $invalidLinkMsg = __('Not a valid invitation link');
                        $invalidEmail = __('Not a valid Email Address');
                        if (base64_encode(base64_decode($requestEncrypKey, true)) != $requestEncrypKey){
                            return redirect()->back()->withInput()->withErrors(['fail' => $invalidLinkMsg]);
                        }
                        $separator = explode('_', base64_decode($requestEncrypKey));
                        $decryptedId = $separator[0];
                        $decryptedEmail = $separator[1];
                        if ($request['email'] != $decryptedEmail) {
                            return redirect()->back()->withInput()->withErrors(['fail' => $invalidEmail]);
                        }
                        if (!is_numeric($decryptedId)) {
                            return redirect()->back()->withInput()->withErrors(['fail' => $invalidLinkMsg]);
                        }
                        $substrFirstPart = substr($decryptedId, 3);
                        $parentId   = substr($substrFirstPart, 0, -4);
                        $parentUser = User::find($parentId);
                        if (empty($parentUser)) {
                            return redirect()->back()->withInput()->withErrors(['fail' => $invalidLinkMsg]);
                        }
                        $teamArray = [
                            'user_id'    => $id,
                            'parent_id'  => $parentUser->id,
                            'package_id' => 0,
                            'status'     => 'Active'
                        ];
                        $teamId = (new Team)->store($teamArray);
                        if ($teamId) {
                            TeamMemberMeta::insertMetaData($teamId);
                        }
                    }
                    $defaultPackage = CreditService::defaultPackage();
                    if ((preference('is_default_package') == 1) && !empty($defaultPackage) && is_null($teamId)) {
                        $subscriptionService->storeFreeCredit($defaultPackage, $id);
                    }
                    $emailResponse = ['status' => true];
                    if ($request['status'] === "Pending") {
                        $emailResponse = (new UserVerificationCodeMailService)->send($request);
                    } elseif (preference('welcome_email') == 1) {
                        $emailResponse = (new UserMailService)->send($request);
                    }
                    if (!$emailResponse['status']) {
                        DB::rollBack();
                        return redirect()->back()->withInput()->withErrors(['fail' => $emailResponse['message']]);
                    }

                    $data['status'] = 'success';
                    $data['message'] = ( $request['status'] == "Pending" ) ? __('The User has been successfully registered.') .' '. __('Please verify your email.') : __('The User has been successfully registered.');
                }

                if (isActive('Affiliate') && isset($request->reference)) {
                    \Modules\Affiliate\Entities\ReferralUser::referralUserStore($request->reference, $id);
                    session()->put('user_referral_active', 1);
                }
                

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $data['message'] = $e->getMessage();
            }

            $this->setSessionValue($data);

            if ( $request['status'] == "Pending" &&  User::userVerification('otp')) {
                return redirect()->route('users.verify');
            }
            return redirect()->route('login');
        }
    }

    /**
     * Re-send user verification code
     *
     * @param Request $request
     * @param $email
     * @return mixed;
     */
    public function resendUserVerificationCode(Request $request, $email)
    {
        $response = ['status' => 'fail'];
        $request['email'] = validateEmail($email) ? strtolower($email) : null;
        $request['activation_code'] = Str::random(10);
        $request['activation_otp'] = random_int(1111, 9999);

        $user = User::where('email', $email)->first();
        $request['name'] = $user->name;

        $result = (new User)->updateUser($request->only('activation_code', 'activation_otp'), $user->id);
        if (!empty($result)) {
            try {
                DB::beginTransaction();
                $emailResponse = (new UserVerificationCodeMailService)->send($request);

                if ($emailResponse['status'] == false) {
                    DB::rollBack();
                    return redirect()->back()->withInput()->withErrors(['fail' => $emailResponse['message']]);
                }

                DB::commit();

                if (User::userVerification('otp')) {
                    return redirect()->route('users.verify')->withSuccess(__('A verification code send to your email address.'));
                }

                $response['status'] = 'success';
                $response['message'] = __('A link has been sent to your mail.');

            } catch (\Exception $e) {
                DB::rollback();
                $response['message'] = $e->getMessage();
            }

            $this->setSessionValue($response);
            return redirect()->route('login');
        }
    }

    /**
     * Log out the user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Preserve the specific key 
        $longarticle = session('longarticle');

        $cookie = Cookie::forget($this->ckname);
        $user = Auth::user();
        Auth::guard('user')->logout();

        if (isset($user)) {
            (new ActivityLogService())->userLogout('success', 'Logout successful', $user);
        }

        if (isActive('Affiliate')) {
            $helper = \Modules\Affiliate\Services\AffiliateHelper::getInstance();
            $helper->destroy();
        }

        Session::flush();

         // Restore the specific key
         session(['longarticle' => $longarticle]);

        return redirect()->route('frontend.index')->withCookie($cookie);
    }

    /**
     * Reset password
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function reset()
    {
        return view('site.auth.passwords.email');
    }

    /**
     * Opt form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function resetOtp()
    {
        $data['route'] = route('password.reset', ['token = null']);
        return view('site.auth.passwords.otp', $data);
    }

    /**
     * Send reset password link
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $data = ['status' => 'fail', 'message' => __('Invalid Request')];
        $validator = PasswordReset::storeValidation($request->all());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $request['token'] = Password::getRepository()->createNewToken();
        $request['otp'] = random_int(1111, 9999);
        $request['created_at'] = date('Y-m-d H:i:s');
        try {
            DB::beginTransaction();
            (new PasswordReset)->storeOrUpdate($request->only('email', 'token', 'otp', 'created_at'));

            $emailResponse = (new UserResetPasswordMailService)->send($request);

            if ($emailResponse['status'] == false) {
                DB::rollBack();
                return redirect()->back()->withInput()->withErrors(['fail' => $emailResponse['message']]);
            }

            $data['status'] = 'success';
            $data['message'] = User::userVerification('both') ? __('OTP & Link has been sent to your email.') : ( User::userVerification('token') ? '' :  __('OTP has been sent to your mail.') );
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $data['status'] = 'fail';
            $data['message'] = $e->getMessage();
        }

        $this->setSessionValue($data);

        if (User::userVerification('otp')) {
            return redirect()->route('reset.otp')->withInput();
        } else if (User::userVerification('token')) {
            return redirect()->route('password.reset.notify', $request->email);
        }

        return redirect()->back();
    }

    /**
     * Password Reset Notify to user
     *
     * @param string $email
     * @return \Illuminate\Contracts\View\View
     */
    public function passwordResetNotify($email)
    {
        return view('site.auth.passwords.password-link', ['email' => $email]);
    }

    /**
     * Show password reset form.
     *
     * @param  string  $tokens
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showResetForm(Request $request, $tokens = null)
    {
        if (!empty($tokens)) {
            $tokens = $request->token;
        }

        $passwordReset = PasswordReset::where('token', $tokens)->orWhere('otp', $tokens)->first();

        if (!$passwordReset || empty($request->token)) {
            return redirect()->route('reset.otp')->withErrors(['email' => __("Invalid password token or OTP")]);
        }

        $data = ['token' => $tokens];
        $data['user'] = (new User)->getData($tokens);

        if ($data['user'] && ($passwordReset->created_at < now()->subSeconds(preference('otp_expire_time')))) {
            if (strlen($tokens) > 6) {
                $this->setSessionValue(['status' => 'fail', 'message' => __('Your Token has been expired. Please resubmit your email again.')]);
                return redirect()->route('login.reset');
            }
            
            $this->setSessionValue(['status' => 'fail', 'message' => __('Your OTP has been expired. Please resend OTP again.')]);
            return redirect()->back()->with(['password_reset' => true, 'email' => $data['user']->email]);
        }

        if (!$data['user']) {
            return redirect()->back()->withErrors(['email' => __("Invalid password token or OTP")]);
        }

        return view('site.auth.passwords.reset', $data);
    }

    /**
     * Set password.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function setPassword(Request $request)
    {
        $data = ['status' => 'fail', 'message' => __('Invalid Request')];

        if ($request->isMethod('post')) {
            $response = $this->checkExistence($request->id, 'users', ['getData' => true]);

            if ($response['status'] === true) {
                $validator = PasswordReset::passwordValidation($request->all());

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }

                $request['user_name'] =  $response['data']->name;
                $request['email'] =  $response['data']->email;
                $request['raw_password'] = $request->password;
                $request['updated_at'] = date('Y-m-d H:i:s');
                $request['password'] = Hash::make(trim($request->password));

                if ((new PasswordReset)->updatePassword($request->only('password', 'token', 'updated_at'), $request->id)) {
                    $emailResponse = (new UserSetPasswordMailService)->send($request);

                    if ($emailResponse['status'] == false) {
                        return redirect()->back()->withInput()->withErrors(['fail' => $emailResponse['message']]);
                    }

                    $data = ['status' => '', 'message' => ''];
                } else {
                    $data['message'] = __('Nothing is updated.');
                }
            } else {
                $data['message'] = $response['message'];
            }
        }

        $this->setSessionValue($data);

        return redirect()->route('password.reset.success');
    }

    /**
     * Reset password success
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function resetPasswordSuccess()
    {
        return view('site.auth.passwords.updated-password');
    }

    /**
     * signup from for email
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function emailSignup()
    {
        return view('site.auth.emailSignup');
    }

    /**
     * user store if sso service email not provided
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     * @throws \Exception
     */
    public function emailStore(Request $request)
    {
        if ($request->session()->has('userData')) {

            $response = $this->messageArray(__('Invalid Request'), 'fail');
            $role = Role::getAll()->where('slug', 'user')->first();
            $validator = User::userEmailValidation($request->all());

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            try {
                DB::beginTransaction();
                $userData = $request->session()->get('userData');
                $request['activation_code'] = Str::random(10);
                $request['activation_otp'] = random_int(1111, 9999);
                $id = (new User)->store(['name' => $userData['name'], 'email' => $request->email, 'password' => Hash::make($userData['password']), 'status' => 'Pending',  'sso_account_id' => $userData['sso_account_id'], 'sso_service' => $userData['sso_service'], 'activation_code' => $request->activation_code, 'activation_otp' => $request->activation_otp], "url", $userData['url']);

                if (!empty($id)) {
                    if (!empty($role)) {
                        (new RoleUser)->store(['user_id' => $id, 'role_id' => $role->id]);
                    }

                    $request['name'] = $userData['name'];
                    $request['raw_password'] = $userData['password'];

                    // Send Mail to the customer
                    $emailResponse = (new UserMailService)->send($request);

                    if ($emailResponse['status'] == false) {
                        DB::rollBack();
                        $response['message'] = $emailResponse['message'];
                        $this->setSessionValue($response);

                        return redirect()->back();
                    }

                    DB::commit();
                    $request->session()->forget('userData');

                    return redirect()->route('site.verification.otp');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                $response['message'] = $e->getMessage();
            }
            $this->setSessionValue($response);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * use Google driver
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * take data from Google and save in db & redirect in main page
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handelGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->registerOrLoginUser($user, 'Google');

        return redirect()->route('login');
    }

    /**
     * use Facebook driver
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * take data from Facebook and save in db & redirect in main page
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handelFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $response = $this->registerOrLoginUser($user, 'Facebook');

        if (!$response) {
            return redirect()->route('user.emailSignup');
        }

    }

    /**
     * save user data
     *
     * @param $data
     */
    protected function registerOrLoginUser($data, $service = null)
    {
        if (isset($data->email) && !empty($data->email)) {
            $user = User::where('email', '=', $data->email)->first();

            if (!$user) {
                try {
                    DB::beginTransaction();
                    $id = (new User)->store(['name' => $data->name, 'email' => $data->email, 'password' => Hash::make(Str::random(5)), 'status' => 'Active',  'sso_account_id' => $data->id, 'sso_service' => $service], "url", $data->avatar);

                    if (!empty($id)) {
                        $role = Role::getAll()->where('slug', 'user')->first();

                        if (!empty($role)) {
                            (new RoleUser)->store(['user_id' => $id, 'role_id' => $role->id]);
                        }

                        DB::commit();
                        $user = User::where('id', '=', $id)->first();
                    }
                } catch (\Exception $e) {
                    DB::rollBack();
                    return redirect()->route('login')->withErrors(['error' => $e->getMessage()]);
                }

            }

            if (!empty($user) && $user->status != 'Active') {
                User::where('email', $data->email)->update(['status' => 'Active']);
            }

            Auth::guard('user')->login($user);

        } else {
            $userData = [
                'name' => $data->name,
                'password' => Str::random(5),
                'status' => 'Pending',
                'sso_account_id' => $data->id,
                'sso_service' => $service,
                'url' => $data->avatar
            ];

            request()->session()->put('userData', $userData);

            return false;
        }
    }

    /**
     * Impersonate as another user.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function impersonate(Request $request)
    {
        $password = techDecrypt($request->impersonate);
        $userId= User::where('password', $password)->value('id');

        if (!session()->has('impersonator')) {
            session(['impersonator' => auth()->id()]);
        }

        Auth::loginUsingId($userId);

        return redirect(route('frontend.index'));
    }

    /**
     * Cancel Impersonate
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function cancelImpersonate()
    {
        Auth::loginUsingId(session('impersonator'));
        session()->forget('impersonator');

        return redirect(route('dashboard'));
    }

    /**
     * Resend Password Reset Code
     *
     * @param string $email
     */
    public function resendPasswordReset(Request $request, $email)
    {
        $request['email'] = $email;

        return $this->sendResetLinkEmail($request);
    }

    /**
     * ncpc
     *
     * @return bool
     */
    public function ncpc()
    {
        // if (!g_e_v()) {
        //     return true;
        // }
        // if (!g_c_v()) {
        //     try {
        //         $d_ = g_d();
        //         $e_ = g_e_v();
        //         $e_ = explode('.', $e_);
        //         $c_ = md5($d_ . $e_[1]);
        //         if ($e_[0] == $c_) {
        //             p_c_v();
        //             return false;
        //         }
        //         return true;
        //     } catch (\Exception $e) {
        //         return true;
        //     }
        // }
        return false;
    }

    /**
     * Get User Theme Preference Cookie
     *
     * @return void
     */
    public function getUserThemePreferenceCookie()
    {
        $theme = 'light';
        $authUser = auth()->user();
        $themePreference = $authUser->theme_preference;

        if (!empty($themePreference)) {
            $theme = $themePreference;
        } else {
            $authUser->theme_preference = $theme;
            $authUser->save();
        }

        return Cookie::forever('theme_preference', $theme);
    }

    /**
     * Confirm Payment
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function paymentConfirm()
    {
        return view('site.auth.payment-confirm');
    }
}
