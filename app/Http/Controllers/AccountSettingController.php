<?php

/**
 * @package AccountSettingController
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @contributor Soumik Datta <[soumik.techvill@gmail.com]>
 * @created 17-10-2022
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{Preference};
use Illuminate\Http\Request;
use App\Http\Requests\Admin\DefaultPackageRequest;
use Modules\Subscription\Services\CreditService;

class AccountSettingController extends Controller
{
    /**
     * Account Setting Constructor
     *
     * @param Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->middleware('checkForDemoMode')->only('index');
        }
    }

    /**
     * Account setting options
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        if ($request->isMethod('GET')) {
            $listMenu = 'options';
            $customerSignup = preference('customer_signup');
            $welcomeEmail = preference('welcome_email');

            return view('admin.account_settings.index', compact('listMenu', 'customerSignup', 'welcomeEmail'));
        }

        $response = ['status' => 'fail', 'message' => __('Failed to save :x!', ['x' => __('Preference')])];
        $i = $success = 0;
        $preferenceData = [];
        
        $request->mergeIfMissing(['customer_signup' => '0', 'welcome_email' => '0']);

        foreach ($request->except('_token') as $key => $value) {
            $preferenceData[$i]['category'] = "preference";
            $preferenceData[$i]['field'] = $key;
            $preferenceData[$i]['value'] = $value;
            $i++;
        }

        foreach ($preferenceData as $key => $value) {
            if (Preference::storeOrUpdate($value)) {
                $success = 1;
                session([$value['field'] => $value['value']]);          //update preferences on session
            }else{
                $success = 0;
                break;
            }
        }

        if ($success == 1){
            $response = ['status' => 'success', 'message' => __('The :x has been successfully saved.', ['x' => __('Preference')])];
        }

        $this->setSessionValue($response);                              //flash response
        return redirect()->route('account.setting.option');
    }

    /**
     * Show default package page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function defaultPackage()
    {
        $data['defaultPackage'] = '';
        $data['listMenu'] = 'default_package';
        $defaultPackage = CreditService::defaultPackage();
        if (!empty($defaultPackage)) {
            $data['defaultPackage'] = $defaultPackage;
        }
        return view('admin.account_settings.default_package', $data);
    }

    /**
     * Store a default package.
     *
     * @param DefaultPackageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function defaultPackageStore(DefaultPackageRequest $request)
    {
        $response = ['status' => 'fail', 'message' => __('Failed to save :x!', ['x' => __('Preference')])];
        $request->mergeIfMissing(['is_default_package' => '0']);
        $isDefaultPackage = $request->is_default_package;
        $insertData = [
            "category" => "preference",
            "field" => "is_default_package",
            "value" => $isDefaultPackage
        ];
        if (Preference::storeOrUpdate($insertData)) {
            $response = ['status' => 'success', 'message' => __('The :x has been successfully saved.', ['x' => __('Preference')])];
            if ($request->is_default_package == 1) {
                $existDefaultPackage = CreditService::defaultPackage();
                if (empty($existDefaultPackage)) {
                    $response = (new CreditService)->store($request->validated());
                } else {
                    $response = (new CreditService())->update($request->validated(), $existDefaultPackage->id);
                }
            }
            session([$insertData['field'] => $isDefaultPackage]); //update preferences on session
        }
        $this->setSessionValue($response); //flash response
        return redirect()->route('account.setting.defaultPackage');
    }
}
