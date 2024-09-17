<?php
/**
 * @package SsoController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 11-11-2021
 */
namespace App\Http\Controllers;

use Validator;
use App\Lib\Env;
use Illuminate\Http\Request;
use App\Models\Preference;

class SsoController extends Controller
{
    /**
     * Sso Constructor
     *
     * @param Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        //this middleware should be for POST request only
        if ($request->isMethod('post')) {
            $this->middleware('checkForDemoMode')->only('index');
        }
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        $response = $this->messageArray(__('Invalid Request'), 'fail');

        $data['listMenu'] = 'sso';

        if ($request->isMethod('get')) {

            $data['preference'] = preference('sso_service');
            return view('admin.sso_service.index', $data);

        }

        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'data' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            foreach ($request->data as $key => $value) {

                if ($key == "facebook") {
                    Env::set('FACEBOOK_CLIENT_ID', $value['client_id'] ?? '');
                    Env::set('FACEBOOK_CLIENT_SECRET', $value['client_secret'] ?? '');
                    Env::set('FACEBOOK_REDIRECT_URL', route('facebook'));
                } elseif ($key == "google") {
                    Env::set('GOOGLE_CLIENT_ID', $value['client_id'] ?? '');
                    Env::set('GOOGLE_CLIENT_SECRET', $value['client_secret'] ?? '');
                    Env::set('GOOGLE_REDIRECT_URL', route('google'));
                }
            }

            $sso = [
                'category' => 'preference',
                'field' => 'sso_service',
                'value' => $request->filled('sso_service') ? json_encode($request->sso_service) : '',
            ];

            Preference::storeOrUpdate($sso);
            $response = $this->messageArray(__('The :x has been successfully saved.', ['x' => __('SSO Service')]), 'success');

            $this->setSessionValue($response);
            return redirect()->route('sso.index');
        }
    }
}
