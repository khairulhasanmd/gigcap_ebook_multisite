<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Concept;
use App\Service\CrmApiSDK\LoginUserSDK;
use Illuminate\Http\Request as Req;
use Illuminate\Support\Facades\Auth;
use App\Services\CmpApi;



class LoginController extends Controller
{
    public function __construct()
    {   
        $domain = url()->current();
        $this->currentDomain = parse_url($domain)['host'];
        $this->domain = parse_url($domain)['host'];
        $this->concept = Concept::where('domain_name', $this->domain)->first();
        $this->api_url = env('CRM_API_URL');

        // dd( $this->api_url);

        if (!$this->concept) {
            $this->concept = Concept::where('template_name', '=', config('app.default_concept'))->first();
        }
        $this->version = $this->concept->concept_version;
        $this->theme = $this->concept->template_name;
        $this->locale = app()->getLocale();
        // $this->sdk = new LoginUserSDK($this->api_url, $this->concept->crm_api_key);
    }
 
    public function signin() {

        return view('templates.'.$this->concept->template.'.auth.login');
    }


    public function signout(){
        Auth::logout();
        return redirect()->route('login');
    }
    protected function login()
{  
    $username = request()->get('email');
    $password = request()->get('password');
    
    // First attempt with domain_name check
    if (Auth::attempt(['email' => $username, 'password' => $password, 'domain_name' => $this->currentDomain])) { 

        // dd((Auth::user()->is_admin));

        if(Auth::user()->is_admin == 1){
            dd('redirect to dashbord');
            return redirect()->route('admin.dashboard');
        }else{
        $user = $this->cmp->authenticateUser(request(), $username, $password);
        if ($user->status == 'success') {
            return redirect()->route('products');
        } else {
            return redirect()->back()->withErrors(['error' => 'Email-Address And Password Are Wrong']);

        }
    }

    }else if (Auth::attempt(['email' => $username, 'password' => $password, 'is_admin' => 1])) {

       

    // Third attempt for other cases
    } else if ($this->cmp->authenticateUser(request(), $username, $password)->status == 'success') {

        $user = $this->cmp->authenticateUser(request(), $username, $password);
        $this->isWebUserId($user->data, $username, $password);
            
        if (Auth::attempt(['email' => $username, 'password' => $password, 'domain_name' => $this->currentDomain])) {
            return redirect()->route('products');
        }

    // Third attempt for other cases
    } 
     else {
        // dd('wrong');
        // return redirect()->intended('login')
        //     ->withErrors('error', 'Email-Address And Password Are Wrong.');
        return redirect()->back()->withErrors(['error' => 'Email-Address And Password Are Wrong']);
    }
}
    
        

    
}
