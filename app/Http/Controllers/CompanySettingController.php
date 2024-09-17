<?php

/**
 * @package CompanySettingController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 26-05-2021
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{
    Country,
    Currency,
    Language,
    EmailConfiguration,
    Preference
};
use Illuminate\Http\Request;


class CompanySettingController extends Controller
{
    /**
     * Company Setting Constructor
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        // This middleware should be for POST request only
        if ($request->isMethod('post')) {
            $this->middleware('checkForDemoMode')->only('index', 'openai');
        }
    }

    /**
     * company setting
     *
     * @param  Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|void
     */
    public function index(Request $request)
    {
        $response             = $this->messageArray(__('Invalid Request'), 'fail');
        $data['list_menu']    = 'system_setup';
        $data['currencyData'] = Currency::getAll();
        $data['countryData']  = Country::getAll();
        $data['languageData'] = Language::getAll();
        $pref                 = preference();

        if ($request->isMethod('get')) {
            $data['companyData']["company"] = $pref;
            $data['companyData']['logo']  = Preference::where('field', 'company_logo')->first()->fileUrl();
            $data['companyData']['logo_light']  = Preference::where('field', 'company_logo_light')->first()->fileUrl();
            $data['companyData']['logo_dark']  = Preference::where('field', 'company_logo_dark')->first()->fileUrl();
            $data['companyData']['icon']  = Preference::where('field', 'company_icon')->first()->fileUrl();

            return view('admin.company_settings.index', $data);
        } else if ($request->isMethod('post')) {

            $validator = Preference::companySettingValidation($request->all());

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $post = $request->only('company_name', 'site_short_name', 'company_email', 'company_phone', 'company_street', 'company_city', 'company_state', 'company_zip_code', 'company_country', 'dflt_lang', 'dflt_currency_id');
            $post['company_gstin'] = $request->company_tax_id;
            unset($data);
            $i = 0;

            foreach ($post as $key => $value) {
                $data[$i]['category'] = 'company';
                $data[$i]['field']    = $key;
                $data[$i]['value'] = $value;
                $i++;
            }

            foreach ($data as $key => $value) {
                if (Preference::storeOrUpdate($value)) {
                    $response = $this->messageArray(__('The :x has been successfully saved.', ['x' => __('Company Settings')]), 'success');
                }
            }

            $prefer = preference();

            if (!empty($prefer)) {
                $curr = Currency::getDefault();
            }

            $language     = Language::getAll()->where('is_default', 1)->first();
            $languageData = [];

            if ($request->dflt_lang != $language->short_name) {
                $updateLanguage             = Language::getAll()->where('short_name', $request->dflt_lang)->first();
                $languageData['is_default'] = 1;
                (new Language)->updateLanguage($languageData, $updateLanguage->id);
            }
            $this->setSessionValue($response);

            return redirect()->route('companyDetails.setting');
        }
    }

    /**
     * set redirect link
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Routing\Redirector
     */
    public function setRedirectLink(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data['defaultPackage'] = '';
            $data['list_menu'] = 'redirect_link';
            return view('admin.company_settings.redirect_link', $data);
        }

        $response = ['status' => 'fail', 'message' => __('Failed to save :x.', ['x' => __('Preference')])];
        $redirect = redirect()->route('setting.setRedirectLink');
        $i = $success = 0;
        $preferenceData = [];
        $request->mergeIfMissing(['is_redirect_link' => '0']);
        if ($request->is_redirect_link == 1 && $request->redirect_link == '') {
            $response = ['status' => 'fail', 'message' => __('The Field Set Link is Required')];
            // Set flash response
            $this->setSessionValue($response);
            return $redirect;
        }
        foreach ($request->except('_token') as $key => $value) {
            $preferenceData[$i]['category'] = "preference";
            $preferenceData[$i]['field'] = $key;
            $preferenceData[$i]['value'] = $value;
            $i++;
        }

        foreach ($preferenceData as $key => $value) {
            if (Preference::storeOrUpdate($value)) {
                $success = 1;
                // Update preferences on session
                session([$value['field'] => $value['value']]);
            } else {
                $success = 0;
                break;
            }
        }

        if ($success == 1) {
            $response = ['status' => 'success', 'message' => __('The :x has been successfully saved.', ['x' => __('Preference')])];
        }
        // Set flash response
        $this->setSessionValue($response);
        return $redirect;
    }

}
