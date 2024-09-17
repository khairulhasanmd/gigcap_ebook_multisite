<?php

namespace App\Http\Controllers;

use Request;
use Session;
use App\Models\CodeSchool;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use App\Mail\ForgotPasswordMail;
use App\Resume;
use App\Models\User;
use App\Models\Concept;
use Carbon\Carbon;
use App\Service\CrmApiSDK\LoginUserSDK;
use Illuminate\Http\Request as Req;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public function __construct()
    {   
        $domain = url()->current();
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

    public function signinVerfication(Req $request) {
        if ($this->version == "sdk") {
            $response = $this->sdk->loginVerfication($request);
             if ($response['status']) {
                if ($this->concept->concept_type == "coding") {
                    return redirect($this->locale.'/courses');
                } else  if ($this->concept->concept_type == "bbt") { 
                    return redirect($this->locale.'/dashboard');
                } else  if ($this->concept->concept_type == "gaming") { 
                return redirect($this->locale.'/dashboard');
                }
            } else {
                return Redirect::back()->withErrors(['error' => $response['error']]);
            }
        }
    }

    public function signout(){
        Session::forget('user');
        // dd(redirect()->route($this->locale.'/welcome'));
        return redirect()->route('welcome');
    }
}
