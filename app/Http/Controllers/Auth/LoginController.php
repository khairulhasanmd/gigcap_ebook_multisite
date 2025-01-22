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

    // protected function redirectTo()
    // {  
    //     $username = request()->get('email');
    //     $password = request()->get('password');
        
    //     if (auth()->user()->is_admin) {
    //         return '/administrator/dashboard';
    //     } 
    //     else {
    //         $users = User::where('email', '=', auth()->user()->email)->get();
    //         if(!$users) {
    //             dd($request);
    //             $userLogin = $this->cmp->authenticateUser($request, $username, $password);
    //             if ($userLogin->status == 'success') {
    //                 if ($this->concept->concept_type == "coding") {
    //                     return route('courses');
    //                 } else  if ($this->concept->concept_type == "bbt") { 
    //                     return route('dashboard');
    //                 } else if ($this->concept->concept_type == "gaming") {
    //                     return route('dashboard');
    //                 } else {
    //                     return redirect()->route('login')->with('error','Something went wrong');
    //                 }
    //             } else {
    //                 return redirect()->intended('login')
    //                 ->with('error','Email-Address And Password Are Wrong.');
    //             }
    //         } else {
    //             foreach ($users as $user) {
    //                 if($user->domain == $this->currentDomain) {
    //                     if ($this->concept->concept_type == "coding") {
    //                         return route('courses');
    //                     } else  if ($this->concept->concept_type == "bbt") { 
    //                         return route('dashboard');
    //                     } else if ($this->concept->concept_type == "gaming") {
    //                         return route('dashboard');
    //                     } else {
    //                         return redirect()->route('login')->with('error','Something went wrong');
    //                     }
    //                 } else {
    //                     return redirect()->route('login')->with('error','Something went wrong');
    //                 }
    //             }
    //         }
    //     }
    // }

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

    protected function login()
{  
    $username = request()->get('email');
    $password = request()->get('password');
    if(!($username == 'admin@52north.co' || $username == 'superadmin@52north.co')){
        Auth::attempt(['email' => $username, 'password' => $password]);
        // dd('here');

        return redirect()->route('concepts');

    }
    if (Auth::attempt(['email' => $username, 'password' => $password, 'domain_name' => $this->currentDomain])) { 


        if(Auth::user()->is_admin == 1){
            return redirect()->route('concepts');
        }else{

            return redirect()->route('products');
        
    }

    }else if (Auth::attempt(['email' => $username, 'password' => $password, 'is_admin' => 1])) {

       

    // Third attempt for other cases
    } else if ($this->cmp->authenticateUser(request(), $username, $password)->status == 'success') {

        $user = $this->cmp->authenticateUser(request(), $username, $password);
        // dd($password);
        $this->isWebUserId($user->data, $username, $password);
        // dd($this->currentDomain);
            
        if (Auth::attempt(['email' => $username, 'password' => $password, 'domain_name' => $this->currentDomain])) {
            return redirect()->route('products');
        }
        // dd('testing');

    // Third attempt for other cases
    } 
     else {
        // dd('wrong');
        // return redirect()->intended('login')
        //     ->withErrors('error', 'Email-Address And Password Are Wrong.');
        return redirect()->back()->withErrors(['error' => 'Email-Address And Password Are Wrong']);
    }
}
    

// return redirect()->back()->withErrors(['error' => 'New password is not repeated twice']);


    public function isWebUserId($data, $username, $password) {
        $existingUser = User::where('customer_id', $data->customer_id)->where('domain_name', '=', $this->currentDomain)->first();
        if (!$existingUser) {
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

            $user->save();
        } else {
            $existingUserEmail = User::where('email', $username)->where('domain_name', '=', $this->currentDomain)->first();
            if ($existingUserEmail) {
                $userInfo = $this->cmp->getCustomer($data->customer_id);
                $subData = $this->cmp->getSubscriptionDetailByCustomerId($data->customer_id);

                $subscription = $subData->data[0];
                
                $existingUserEmail->email = $username;
                $existingUserEmail->name = $userInfo->data->first_name." ".$userInfo->data->last_name;
                $existingUserEmail->email_canonical = strtolower($username);
                $existingUserEmail->username = $userInfo->data->first_name."-".$userInfo->data->last_name;
                $existingUserEmail->username_canonical = strtolower($userInfo->data->first_name."-".$userInfo->data->last_name);
                $existingUserEmail->plain_password = $password;
                $existingUserEmail->role = 'ROLE_SUBSCRIBER';
                $existingUserEmail->enabled = 1;
                $encryptedPassword = Hash::make($password);
                $existingUserEmail->password = $encryptedPassword;
                $existingUserEmail->subscription_id = $subscription->id;
                $existingUserEmail->customer_id = $data->customer_id;
                $existingUserEmail->domain = $this->currentDomain;

                return redirect()->route('products');

            }

        }

    }
}
