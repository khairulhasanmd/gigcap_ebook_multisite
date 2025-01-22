<?php
namespace App\Services;

use App\Http\Controllers\Auth\LoginController;
use App\Models\PropelConversions;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use MetricaloClientSdkCrm\CrmApi;
use App\Models\Concept;
use App\Services\CmpApi;


class GetCompanyData
{
    protected $crmApi;

    public function __construct()
    {
        $domain = url()->current();
        $this->domain = parse_url($domain)['host'];
        // $concept = Concept::with('crm')->where('domain_name', '=', $this->currentDomain)->first();
        $concept = Concept::where('domain_name', $this->domain)->first();
        $this->cmp = new CmpApi($concept);


        if (!$concept) {
            $concept = Concept::where('template', '=', config('app.default_concept'))->first();
        }
        $this->theme = $concept->template;

        // dd($this->theme);
    }

    
    public function getCompanyInfo($conceptData)
    {

        // dd($conceptData);
        if ($conceptData) {
            $data = $this->cmp->getCompanyData($conceptData);
             $this->theme = $conceptData->template;
        }
        if(is_null($data)) {
            return false;
        }
        $this->setEnvironmentValue($data);

        return $data;
    }

    private function setEnvironmentValue($data)
    {       
    //   $products = $data->getProducts();
      $company = $data->data->company;
      $support = $data->data->support;
      $data = $data->data;
    //   dd($data);
        if (empty($company->vat_numbers)) {
            $company->vat_numbers[0]->area = 'N/A';
            $company->vat_numbers[0]->number = 'N/A';
        }
        
        $config =[
            "SUPPORT_EMAIL"                     =>    $support->email,
            "SUPPORT_PHONE"                     =>    $support->phone,
            "SUPPORT_HOURS"                     =>    $support->hours,
            "SUPPORT_LANGUAGES"                 =>    $support->languages,
            "CONCEPT_NAME"                      =>    $data->name,
            "COMPANY_NAME"                      =>    $company->name,
            "COMPANY_BUSINESS_NUMBER"           =>    $company->business_number,
            "COMPANY_VAT_NUMBER_AREA"           =>    $company->vat_numbers[0]->area,
            "COMPANY_VAT_NUMBER"                =>    $company->vat_numbers[0]->number,
            "COMPANY_ADDRESS"                   =>    $company->address,
            "COMPANY_POSTCODE"                  =>    $company->postcode,
            "COMPANY_CITY"                      =>    $company->city,
            "COMPANY_COUNTRY"                   =>    $company->country,
            "COMPANY_COUNTRY_CODE"              =>    $company->country_code,
            "COMPANY_REGISTRATION_DATE"         =>    $company->registration_date,
            "CONCEPT_WEBSITE_NAME"              =>    $data->domain,
            "CAMPAIGN_DOMAIN"                   =>    $data->registration_url,
            "CAMPAIGN_DOMAIN_URL"               =>    $data->campaign_domain,
            "SERVICE_UNIQUE_ID_TOKEN"           =>    $data->id

        ];
        if (empty($company->vat_numbers)) {
            $company->vat_numbers[0]->area = 'N/A';
            $company->vat_numbers[0]->number = 'N/A';
        } else {
            $i = 1;
            foreach ($company->vat_numbers as $vat_number) {
                $config["COMPANY_VAT_NUMBER_AREA_{$i}"] = $vat_number->area;
                $config["COMPANY_VAT_NUMBER_{$vat_number->area}"] = $vat_number->number;
                $i++;
            }
        }
        $envFile = config_path()."/concept/".$this->theme.".php";
        if(is_array($config)){
            $text = "<?php\n\nreturn " . var_export($config, true) . ";";
            $fd = fopen($envFile,'w');
            fwrite($fd, $text);
            fclose($fd);
        }else{
            exit(0);
        }
        return true;
    }
}
