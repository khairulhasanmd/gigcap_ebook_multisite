<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GlobalController;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ForgotPasswordController extends GlobalController
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

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        return view($this->themeDir.'auth.password_reset_email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $userEmail = $request->email;
        $test_email = '';
        $overrideReceiverEmail = null;

        // Override the e-mail that will receive the reset notification, only for test purposes
        if (!empty($test_email)) {
            $overrideReceiverEmail = $test_email;
        }

        $response = $this->crmApi->resetUserPassword($userEmail, 'en', $overrideReceiverEmail);
        // dd($response->getStatus()=='success');
        if($response->getStatus()=='success') {
            // dd('works fine');
            return Redirect::route('welcome')->with('success', $response->getMessage());
        }
        return Redirect::back()->withErrors(['error' => $response->getMessage()]);
    }
}
