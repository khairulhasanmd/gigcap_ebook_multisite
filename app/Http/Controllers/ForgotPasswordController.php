<?php

namespace App\Http\Controllers;

use Config;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use MetricaloClientSdkCrm\CrmApi;
use App\Models\Concept;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->currentDomain = request()->getHttpHost();
        $domain = url()->current();
        $this->domain = parse_url($domain)['host'];
        $this->concept = Concept::where('domain_name', $this->domain)->first();
        // $this->concept = Concept::where('domain', '=', $this->currentDomain)->first();
        // dd($this->concept->template);
       
    }

    public function showLinkRequestForm()
    {
        return view('templates.'.$this->concept->template.'.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        if ($this->version == "sdk" || $this->version == "v3") {
            $userEmail = $request->email;
            $test_email = '';
            $overrideReceiverEmail = null;

            // Override the e-mail that will receive the reset notification, only for test purposes
            if (!empty($test_email)) {
                $overrideReceiverEmail = $test_email;
            }

            $response = $this->crmApi->resetUserPassword($userEmail, 'en', $overrideReceiverEmail);
        
            if($response->getStatus()=='success') {
                return Redirect::route('welcome')->with('success', $response->getMessage());
            }
            return Redirect::back()->withErrors(['error' => $response->getMessage()]);
        } else if ($this->version == "v2") {
            $response = $this->broker()->sendResetLink(
                $request->only('email')
            );
            switch ($response) {
                case Password::RESET_LINK_SENT:
                    return Redirect::route('welcome')->with('success', 'Password reset link sent');
    
                case Password::INVALID_USER:
                default:
                    return Redirect::back()->withErrors(['error' => 'No user with that email']);
            }
        }
    }
}
