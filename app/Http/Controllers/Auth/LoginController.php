<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Concept;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\CmpApi;
use MetricaloClientSdkCrm\CrmApi;
use MetricaloClientSdkCrm\Resource\Api\WebsiteUser;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/administrator/dashboard';
    protected $redirectTo = '/products';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   

        $domain = url()->current();
        $this->currentDomain = parse_url($domain)['host'];
        $this->concept = Concept::where('domain_name', $this->currentDomain)->first();
        $this->api_url = env('CRM_API_URL');

        // dd( $this->currentDomain);

        if (!$this->concept) {
            $this->concept = Concept::where('template_name', '=', config('app.default_concept'))->first();
        }
        $this->version = $this->concept->concept_version;
        $this->theme = $this->concept->template_name;
        $this->locale = app()->getLocale();




        $this->version = $this->concept->concept_version;
        $this->theme = $this->concept->template_name;
        $this->cmp = new CmpApi($this->concept);
        $this->middleware('guest')->except('logout');

    }

    public function showLoginForm() {
        return view('templates.'.$this->concept->template.'.auth.login');

    }


    public function signout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function showAdminLoginForm() {
        return view('admin.auth.login');

    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login');
    }

    public function login(Request $request)
{  
    $username = $request->email;
    $password = $request->password;

    $request->setLocale(app()->getLocale());
    $userLogin = $this->cmp->authenticateUser($request, $username, $password);

    $userLoginArr = [
        'email' => $request->email,
        'password' => $request->password,
        'enabled' => 1
    ];
    //blocking other users from cross site login
    if(!($request->email == 'admin@52north.co' || $request->email == 'superadmin@52north.co')){
        $userLoginArr['id'] = $this->concept->id;
    }
    if ($this->hasTooManyLoginAttempts($request)) {
        $this->fireLockoutEvent($request);
        return $this->sendLockoutResponse($request);
    }
    if ($userLogin->status == 'success') {
        $user = $this->isWebUserId($userLogin->data, $username, $request->password);
            // dd($request->password);


        Auth::loginUsingId($user->id);
        return $this->authenticated($request);
    }else if(Auth::attempt($userLoginArr)) {//conventional login process for admin, superadmin or local users
        return $this->authenticated($request);
    }
    // If the login attempt was unsuccessful we will increment the number of attempts
    // to login and redirect the user back to the login form. Of course, when this
    // user surpasses their maximum number of attempts they will get locked out.
    $this->incrementLoginAttempts($request);

    return $this->sendFailedLoginResponse($request);
}

protected function authenticated(Request $request)
{
    $user = Auth::user();
    // dd($user);
    $this->clearLoginAttempts($request);
    if ( isset($user->is_admin) && ($user->is_admin == 1 )) {// do your magic here
        // return redirect('concepts');
        return redirect()->route('concepts');

    }

    return redirect()->route('products');

}
    

// return redirect()->back()->withErrors(['error' => 'New password is not repeated twice']);


public function isWebUserId($data, $username, $password){
    $existingUser = User::where('customer_id', $data->customer_id)->first();
// dd($existingUser);
    $existingUserByEmail = User::where('email', $data->username)->first();
    if ($existingUser) {
        $userInfo = $this->cmp->getCustomer($data->customer_id);
            $subData = $this->cmp->getSubscriptionDetailByCustomerId($data->customer_id);
            // dd($data->id);

            $subscription = $subData->data[0];
            
            $user = new User();
            $user->email = $username;
            $user->name = $userInfo->data->first_name." ".$userInfo->data->last_name;
            $user->email_canonical = strtolower($username);
            $user->username = $userInfo->data->first_name."-".$userInfo->data->last_name;
            $user->username_canonical = strtolower($userInfo->data->first_name."-".$userInfo->data->last_name);
            $user->plain_password = $password;
            $user->role = 'ROLE_SUBSCRIBER';
            $user->enabled = 1;
            $encryptedPassword = Hash::make($password);
            $user->password = $encryptedPassword;
            $user->subscription_id = $subscription->id;
            $user->customer_id = $data->customer_id;
            $user->webshop_user_id  = $data->webshop_id;
            $user->site_user_id = $data->id;
            $user->domain_name = $this->currentDomain;
        $existingUserByEmail->update();

        return $existingUserByEmail;
    }else{
        $custData = [
            'customerId' => $data->customer_id
        ];
        $userInfo = $this->crmApi->get(CrmApi::$routes['customer_get'], $custData);

        $subData = $this->crmApi->get(CrmApi::$routes['customer_subscriptions_get'], $custData);
        $subscription = $subData->getItems()[0];

        $newUser = new User();
        $newUser->concept_id = $this->concept->id;
        $newUser->web_user_id = $data->id;
        $newUser->name = $userInfo->getFirstName().' '.$userInfo->getLastName();
        $newUser->created_at = $userInfo->getCreatedAt();
        // $newUser->email = $data->getUsername();
        // $newUser->username_canonical = $userInfo->getFirstName().' '.$userInfo->getLastName();
        $newUser->username = $userInfo->getEmail();
        $newUser->email = $username;//$userInfo->getEmail();
        // $newUser->email_canonical = $data->getEmail();
        $newUser->subscription_id = $subscription->getId();
        $newUser->level = 'ROLE_SUBSCRIBER';
        $newUser->customer_id = $userInfo->getId();
        $newUser->plain_password = $password;
        $newUser->password = password_hash($newUser->plain_password, PASSWORD_DEFAULT);
        $newUser->country_code = $userInfo->getCountryCode();
        $newUser->save();

        return redirect()->route('products');
    }
}
}
