<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\{JsonResponse, Request};
use App\Http\Requests\Auth\LoginRequest;
use App\Models\{PasswordReset, Role, RoleUser, User};
use App\Services\Mail\{
    UserResetPasswordMailService,
    UserSetPasswordMailService,
    UserVerificationCodeMailService,
    UserMailService,

};
use Modules\Subscription\Services\CreditService;
use App\Services\SubscriptionService;
use Auth, DB;

class AuthController extends Controller
{
    /**
     * User Login
     *
     * @param  Request  $request
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $records = [];

        if (auth()->attempt($data)) {
            $user = Auth::user();
            $userStatus = $user->status;

            if ($userStatus == "Deleted") {
                return $this->unprocessableResponse([], __('Invalid email or password'));
            }

            if ($userStatus == "Inactive") {
                return $this->forbiddenResponse([], __('Your account is currently inactive. Please contact the website administrator to resolve this matter.'));
            } 

            if ( $userStatus == "Pending" ) {
                return $this->response([], 202, __('Your account is not activated yet, please verify your email in order to login.'));
            } 

            $records['user_id'] = $user->id;
            $records['name'] = $user->name;
            $records['email'] = $user->email;
            $records['picture'] = $user->fileUrl() ? $user->fileUrl() : null;
            $records['status'] = $userStatus;
            $records['token'] = auth()->user()->createToken('Token')->accessToken;

            return $this->response($records);
        }

        return $this->unprocessableResponse([], __('Invalid email or password'));
    }

    /**
     * Sign Up
     *
     * @param  Request  $request
     */
    public function signUp(Request $request, SubscriptionService $subscriptionService): JsonResponse
    {
        if (preference('customer_signup') != '1') {
            return $this->response([], 202, __('The signup option is temporarily disabled. Please contact the website administrator.'));
        }

        $role = Role::getAll()->where('slug', 'user')->first();
        $request['status'] = preference('user_default_signup_status') ?? 'Pending';
        $validator = User::siteStoreValidation($request->all());

        if ($validator->fails()) {
            return $this->unprocessableResponse($validator->messages());
        }

        $request['name'] = $request->first_name .' '. $request->last_name;
        $request['password'] = \Hash::make($request->password);
        $request['email'] = validateEmail($request->email) ? strtolower($request->email) : null;

        if (preference('user_default_signup_status') === 'Pending') {
            $request['activation_code'] = \Str::random(10);
            $request['activation_otp'] = random_int(1111, 9999);
        }

        try {
            DB::beginTransaction();
            $id = (new User)->store($request->only('name', 'email', 'activation_code', 'activation_otp', 'password', 'status'));
            if (!empty($id)) {
                if (!empty($role)) {
                    (new RoleUser())->store(['user_id' => $id, 'role_id' => $role->id]);
                }
                $defaultPackage = CreditService::defaultPackage();
                if ((preference('is_default_package') == 1) && !empty($defaultPackage)) {
                    $subscriptionService->storeFreeCredit($defaultPackage, $id);
                }
                $emailResponse = ['status' => true];

                if ($request['status'] === "Pending") {
                    $emailResponse = (new UserVerificationCodeMailService)->send($request);
                } elseif (preference('welcome_email') == 1) {
                    $emailResponse = (new UserMailService)->send($request);
                }

                if ($emailResponse['status'] == false) {
                    DB::rollBack();
                    return $this->badRequestResponse([], $emailResponse['message']);
                }

               DB::commit();
               if ( $request['status'] == 'Pending') {
                    return $this->createdResponse( [], __('Your account has been successfully registered.') .' '. __('Please check your email for the activation link & verify yourself.') );
               }

               return $this->createdResponse( [], __('Your account has been successfully registered.') );
            }
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->badRequestResponse([], $e->getMessage());
        }
    }

    /**
     * Check OTP validity
     *
     * @param  Request  $request
     */
    public function checkOtp($code = null): JsonResponse
    {
        $token = (new PasswordReset)->tokenExist($code);

        if (!$token) {
            return $this->unprocessableResponse(['otp' => __("Invalid OTP")]);
        }

        $user = (new User)->getData($code);

        if (empty($user)) {
            return $this->unprocessableResponse([], __("Invalid OTP"));
        }
        $reset = PasswordReset::where('otp', $code)->first();
       
        if ($user && ($reset->created_at < now()->subSeconds(preference('otp_expire_time')))) {

            return $this->badRequestResponse(['password_reset' => true, 'email' => $user->email], __('Your OTP has been expired. Please resend your OTP again.'));
        }

        return $this->successResponse(__('OTP successfully verified.'));
    }

    /**
     * Resend Password Reset Code
     *
     * @param string $email
     */
    public function resendPasswordReset(Request $request, $email)
    {
        $request['email'] = $email;

        return $this->sendPasswordResetLink($request);
    }

    /**
     * Send Password Reset Link
     *
     * @param  Request  $request
     */
    public function sendPasswordResetLink(Request $request): JsonResponse
    {
        $validator = PasswordReset::storeValidation($request->all());

        if ($validator->fails()) {
            return $this->unprocessableResponse($validator->messages());
        }

        $status = User::where('email', $request->email)->value('status');

        if ($status == "Inactive") {
            return $this->forbiddenResponse([], __('Your account is currently inactive. Please contact the website administrator to resolve this matter.'));

        } else if ($status == "Pending" ) {
            return $this->response([], 202, __('Your account is not activated yet, please verify your email in order to login.'));
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
                return $this->badRequestResponse([], $emailResponse['message']);
            }

            DB::commit();

            if ( preference('email') === 'both') {
                return $this->okResponse([], __('A verification code & link has been send to your email address.'));

            } else if (preference('email') === 'otp') {
                return $this->okResponse([], __('A verification code been send to your email address.'));
            }

            return $this->okResponse([], __('A verification link has been sent to your email.'));

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->badRequestResponse([], $e->getMessage());
        }

    }

    /**
     * Reset Password
     *
     * @param  Request  $request
     */
    public function setPassword(Request $request): JsonResponse
    {
        $data['user'] = (new User)->getData($request->token);

        if (!$data['user']) {
            return $this->notFoundResponse([], __('Please check your OTP/Token.'));
        }

        $validator = PasswordReset::passwordValidation($request->all());

        if ($validator->fails()) {
            return $this->unprocessableResponse($validator->messages());
        }

        $request['user_name'] =  $data['user']->name;
        $request['email'] =  $data['user']->email;
        $request['raw_password'] = $request->password;
        $request['updated_at'] = date('Y-m-d H:i:s');
        $request['password'] = \Hash::make(trim($request->password));

        if ((new PasswordReset)->updatePassword($request->only('password', 'token', 'updated_at'), $data['user']->id)) {
            $emailResponse = (new UserSetPasswordMailService)->send($request);

            if ($emailResponse['status'] == false) {
                return $this->badRequestResponse([], $emailResponse['message']);
            }
;
            return $this->okResponse([], __('Your Password has been successfully updated.'));
        }
            
        return $this->okResponse([], __('Nothing is updated.'));

    }

    /**
     * User Logout
     *
     * @return jsonResponse
     */
    public function logout(): JsonResponse
    {
        if (Auth::guard('api')->check()) {
            Auth::guard('api')->user()->token()->delete();

            return $this->okResponse([], __("Logged out successfully"));
        }

        return $this->unauthorizedResponse([], __("Unauthorized request"));
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
        $request['email'] = validateEmail($email) ? strtolower($email) : null;
        $request['activation_code'] = \Str::random(10);
        $request['activation_otp'] = random_int(1111, 9999);

        $user = User::where('email', $email)->first();

        if (empty($user)) {
            return $this->unprocessableResponse([], __('Invalid Request'));
        }
        $request['name'] = $user->name;

        $result = (new User)->updateUser($request->only('activation_code', 'activation_otp'), $user->id);

        if (!empty($result)) {

            try {
                DB::beginTransaction();
                $emailResponse = (new UserVerificationCodeMailService)->send($request);

                if ($emailResponse['status'] == false) {
                    DB::rollBack();
                    return $this->badRequestResponse([], $emailResponse['message']);
                }

                DB::commit();
                
                if ( preference('email') === 'both') {
                    return $this->okResponse([], __('A verification code & link has been send to your email address.'));

                } else if(preference('email') === 'otp'){
                    return $this->okResponse([], __('A verification code been send to your email address.'));
                }

                return $this->okResponse([], __('A verification link has been sent to your mail.'));

            } catch (\Exception $e) {
                DB::rollback();
                return $this->badRequestResponse([], $e->getMessage());
            }
        }

    }

    /**
     * Verify OTP
     *
     * @return mixed
     */
    public function verifyByOtp($code = null)
    {
        if (preference('customer_signup') != 1) {
            return $this->response([], 202, __('The signup option is temporarily disabled. Please contact the website administrator.'));
        }
        
        $user = User::where('activation_otp', $code)->first();

        if (empty($user)) {
            return $this->badRequestResponse([], __('Invalid OTP Request. Please provide your OTP again'));
            
        } else if ($user->status == 'Active') {
            return $this->okResponse([], __('Your account is already activated.'));
        }

        if ($user && (($user->updated_at ?? $user->created_at) < now()->subSeconds(preference('otp_expire_time')))) {
            return $this->badRequestResponse(['resend' => true, 'email' => $user->email], __('Your OTP has been expired. Please resend your OTP again.'));
        }

        
        if ($user->update(['activation_otp' => null, 'activation_code' => null, 'status' => 'Active', 'email_verified_at' => now()])) {
            
            if (preference('welcome_email') == 1) {
                $emailResponse = (new UserMailService)->send($user);
    
                if (!$emailResponse['status']) {
                    return redirect()->back()->withInput()->withErrors(['fail' => $emailResponse['message']]);
                }
            }
            
            return $this->okResponse([], __('Your account has been activated.'));
        }

    }
}
