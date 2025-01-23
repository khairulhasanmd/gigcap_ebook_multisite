<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GlobalController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use App\Services\CmpApi;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends GlobalController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public $crmApi;
    public $cmp;

    public function __construct()
    {
        parent::__construct();
        $this->cmp = new CmpApi($this->concept);
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

        $response = $this->cmp->resetUserPassword($userEmail, 'en', $overrideReceiverEmail);
        // dd($response);
    
        if($response->status=='success') {
            // dd($response);

            return Redirect::route('welcome')->with('success', $response->data);
        }
        // dd($response);
        // return Redirect::back()->with(['error' => $response->errors]);
        return redirect()->back()->withErrors(['error' => $response->errors]);

        }

        protected function validateEmail(Request $request)
        {
            $request->validate(['email' => 'required|email']);
        }

    
}
