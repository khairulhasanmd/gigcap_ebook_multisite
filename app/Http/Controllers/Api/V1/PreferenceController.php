<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Preference,
    Language
};

class PreferenceController extends Controller
{
    /**
     * Get default preference data
     * @return $array
     */
    public function defaultPreferenceData()
    {
        $configs = $this->initialize([], null);
        return [
            "preference" => [
                "row_per_page" => $configs['rows_per_page'],
                "date_format" => "1",
                "date_sepa" => "-",
                "date_format_type" => "dd-mm-yyyy",
                "default_timezone" => "Asia/Dhaka",
                "thousand_separator" => ",",
                "decimal_digits" => "3",
                "symbol_position" => "before",
                "pdf" => "mPdf",
                "file_size" => "10",
                "sso_service" => "[\"Facebook\",\"Google\"]",
                "order_prefix" => "Ord-"
            ],
            "company" => [

                "site_short_name" => "AR",
                "company_name" => "Artifism",
                "company_email" => "admin@techvill.net",
                "company_phone" => "+12013828901",
                "company_street" => "City Hall Park Path",
                "company_city" => "New york",
                "company_state" => "New yorktt",
                "company_zip_code" => "116",
                "dflt_lang" => "en",
                "dflt_currency_id" => "3",
                "company_gstin" => "11",
                "company_icon" => "",
                "company_logo" => "",
                "company_logo_light" => "",
                "company_logo_dark" => ""

            ],
            "verification" => [
                "email" => "both"
            ],
            "password" => [
                "length" => "4",
                "uppercase" => true,
                "lowercase" => true,
                "number" => true,
                "symbol" => true
            ]
        ];
    }

    /**
     * Preference
     *
     * @param Request $request
     * @return array
     */
    public function preference(Request $request)
    {
        $preference = Preference::select('*');
        $defaultPreference = $this->defaultPreferenceData();
        $catArr = ['preference', 'company', 'verification', 'password'];
        $category = isset($request->category) ? $request->category : null;

        if (in_array($category, $catArr)) {
            $preference->where('category', strtolower($category));
            $defaultPreference = $defaultPreference[$category];
        }

        $preference = $preference->get();

        $conditions = explode('|', env('PASSWORD_STRENGTH'));

        if (env('PASSWORD_STRENGTH') != null && env('PASSWORD_STRENGTH') != '') {
            $passwordPreference = [
                'length' => filter_var(env('PASSWORD_STRENGTH'), FILTER_SANITIZE_NUMBER_INT),
                'uppercase' => in_array("UPPERCASE", $conditions),
                'lowercase' => in_array("LOWERCASE", $conditions),
                'number' => in_array("NUMBERS", $conditions),
                'symbol' => in_array("SYMBOLS", $conditions)
            ];

            foreach ($passwordPreference as $key => $value) {
                $preference->push([
                    'category' => 'password',
                    'field' => $key,
                    'value' => $value
                ]);
            }
        }
        $dbPreference = [];

        foreach ($preference as $key => $pref) {
            if (in_array($pref['field'], ['company_icon', 'company_logo', 'company_logo_light', 'company_logo_dark'])) {
                $pref['value'] = Preference::where('field', $pref['field'])->first()->fileUrl();
            }
            
            if ($pref['category'] == 'openai' && in_array($pref['field'], ['openai', 'stablediffusion', 'google_api', 'clipdrop_api'])) {
                $pref['value'] = config('openAI.is_demo') ? 'sk-xxxxxxxxxxxxxxx' : $pref['value'];
            }
            
            $dbPreference[$pref['category']][$pref['field']] = $pref['value'];
        }

        $dbPreference['language'] = Language::where('status', 'Active')->select('name', 'short_name', 'direction')->get()->toArray();

        if (in_array($category, $catArr)) {
            return $this->response([array_merge($defaultPreference, $dbPreference[$category])]);
        }

        return $this->response([array_merge($defaultPreference, $dbPreference)]);
    }
}
