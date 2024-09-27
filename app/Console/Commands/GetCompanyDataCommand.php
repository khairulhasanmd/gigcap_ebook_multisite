<?php

namespace App\Console\Commands;
use App\Services\CmpApi;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;
use App\Models\Concept;


class GetCompanyDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-company-data:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get company data and add it to .env';

    private $pc;
    protected $secret;
    protected $domain;
    protected $api_key;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $domain = url()->current();
        $this->domain = parse_url($domain)['host'];
        $this->concept = Concept::where('domain_name', $this->domain)->first();
        // dd($this->concept->concept_name);
        $this->domain = env('PC_DOMAIN');
        $this->secret = env('PC_SECRET');
        $this->api_key = env('API_KEY');
        $this->crmApi = new CmpApi($this->concept);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('Started company import');
        $data = $this->crmApi->getCompanyInfo();
        // dd($this->concept->template);
        if(is_null($data)){
            return false;
        }
        Log::info('Data ok, starting import');
        $this->setEnvironmentValue($data);
        echo "All done, company data values are imported in .env and .env.production files\n";
    }

    private function setEnvironmentValue($data)
{       
        // $products = $data->getProducts();
        $company = $data->data->company;
        $support = $data->data->support;
        // dd($company);

        if (empty($company->vat_numbers)) {
            $company->vat_numbers[0]['area'] = 'N/A';
            $company->vat_numbers[0]['number'] = 'N/A';
        }
        
        $config =[
            "SUPPORT_EMAIL"                     =>    $support->email,
            "SUPPORT_PHONE"                     =>    $support->phone,
            "SUPPORT_HOURS"                     =>    $support->hours,
            // "SUPPORT_LANGUAGES"                 =>    $support['languages'],
            "CONCEPT_NAME"                      =>    $this->concept->concept_name,
            "COMPANY_NAME"                      =>    $company->name,
            "COMPANY_BUSINESS_NUMBER"           =>    $company->business_number,
            // "COMPANY_VAT_NUMBER_AREA"           =>    $company->vat_numbers[0]['area'],
            "COMPANY_VAT_NUMBER"                =>    $company->vat_numbers['0']->number,
            "COMPANY_ADDRESS"                   =>    $company->address,
            "COMPANY_POSTCODE"                  =>    $company->postcode,
            "COMPANY_CITY"                      =>    $company->city,
            "COMPANY_COUNTRY"                   =>    $company->country,
            "COMPANY_COUNTRY_CODE"              =>    $company->country_code,
            "COMPANY_REGISTRATION_DATE"         =>    $company->registration_date,
            // "CONCEPT_WEBSITE_NAME"              =>    $data->getDomain(),
            // "CAMPAIGN_DOMAIN"                   =>    $data->getRegistrationUrl(),
            // "CAMPAIGN_DOMAIN_URL"               =>    $data->getCampaignDomain(),
            // "SERVICE_UNIQUE_ID_TOKEN"           =>    $data->getId(),

        ];

        // dd($this->concept);

       $envFile = config_path() .'/'.$this->concept->template .".php";

       if(is_array($config)){
           $text = "<?php\n\nreturn " . var_export($config, true) . ";";
           $fd = fopen($envFile,'w');
           fwrite($fd, $text);
           fclose($fd);
       }else{
           exit(0);
       }
       
           Artisan::call('cache:clear');
           Artisan::call('config:clear');

           Log::info('Data import finished');
           return true;

    }

    private function get($route, $data) {

        $endpoint = $this->domain . self::$routes[$route] . '?apikey='.$this->api_key;
        foreach ($data as $key => $value) {
            if (strpos($endpoint, '{'.$key.'}') !== false) {
                $endpoint = str_replace('{'.$key.'}', $value, $endpoint);
            } else {
                $endpoint .= '&' . $key . '=' . $value;
            }
        }

        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response);

        return $data;
    }
}
