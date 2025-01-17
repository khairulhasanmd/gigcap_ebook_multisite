<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GlobalController;
use Illuminate\Http\Request;
use App\Models\Concept;
use App\Models\Crm;
use MetricaloClientSdkCrm\CrmApi;
use MetricaloClientSdkCrm\Resource\Api\ErrorResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Services\CmpApi;
use App\Models\Category;
use Exception;
use DB;
use App\Services\GetCompanyData;


class ConceptController extends GlobalController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');//requires login
        $domain = url()->current();
        $this->domain = parse_url($domain)['host'];
        $this->concept = Concept::where('domain_name', $this->domain)->first();
        $this->cmp = new CmpApi($this->concept);
        $this->getCompanyInfo = new GetCompanyData();


    }

    public function index()
    {
        $directories = \Storage::disk('templates')->directories();
        return view('admin.concepts.concepts', [
            'directories' => $directories,
            'data' => Concept::orderBy('id', 'desc')->paginate(14),
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->store($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $data = new Concept;
        $validation_rules['crm_id'] = 'required|string';
        // $validation_rules['company_id'] = 'required|string';
        $validation_rules['domain_name'] = 'required|string';
        $validation_rules['crm_api_key'] = 'required|string';
        // $validation_rules['service_id'] = 'required|string';
        // $validation_rules['product_id'] = 'required|string';
        // $validation_rules['service_name'] = 'required|string';
        // $validation_rules['mail_from_address'] = 'required|string';
        $validation_rules['template'] = 'required|string';
        // $validation_rules['email_api_id'] = 'required|string';
        $validation_rules['recaptcha_sitekey'] = 'required|string';
        $validation_rules['recaptcha_secretkey'] = 'required|string';
        // $validation_rules['extra_codes'] = 'required|string';

        $validator = Validator::make($request->all(), $validation_rules);

        $requestData = $request->all();
        $requestData['crm_id'] = 0; // Set the fixed value for crm_id

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            $data = Concept::create($request->only(
                ['crm_id', 'company_id', 'domain_name', 'crm_api_key', 'service_id', 'product_id', 'service_name', 'mail_from_address', 'template', 'email_api_id', 'recaptcha_sitekey', 'recaptcha_secretkey', 'extra_codes','domain'=>'test']));
            $this->update_command_config_extra_data($data->id);
            return redirect('admin/concepts')->with("success","Concept Created successfully!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->edit($id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $directories = \Storage::disk('templates')->directories();
        return view('admin.concepts.concepts', [
            'directories' => $directories,
            'data' => Concept::orderBy('id', 'desc')->paginate(14),
            'detail' => Concept::where('id', $id)->first(),
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        // $validation_rules['crm_id'] = 'required|string';
        // $validation_rules['company_id'] = 'required|string';
        $validation_rules['domain_name'] = 'required|string';
        $validation_rules['crm_api_key'] = 'required|string';
        // $validation_rules['service_id'] = 'required|string';
        // $validation_rules['product_id'] = 'required|string';
        // $validation_rules['service_name'] = 'required|string';
        // $validation_rules['mail_from_address'] = 'required|string';
        $validation_rules['template'] = 'required|string';
        // $validation_rules['email_api_id'] = 'required|string';
        $validation_rules['recaptcha_sitekey'] = 'required|string';
        $validation_rules['recaptcha_secretkey'] = 'required|string';
        // $validation_rules['extra_codes'] = 'required|string';

        $validator = Validator::make($request->all(), $validation_rules);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            $data = Concept::where('id', $id)->first();
            $data->update($request->only(
                ['crm_id', 'company_id', 'domain_name', 'crm_api_key', 'service_id', 'product_id', 'service_name', 'mail_from_address', 'template', 'recaptcha_sitekey', 'recaptcha_secretkey', 'extra_codes']));
            $this->update_command_config_extra_data($data->id);
            return redirect('admin/concepts')->with("success","Concept Updated successfully!");
        }
    }

    public function destroy($id)
    {
        $obj = Concept::find($id);
        @unlink(public_path().$obj->image);
        $obj->delete();
        return Redirect::back()->with("success","Concept Deleted successfully !");
    }

    public function getInfo($id)
    {
        // $concept = Concept::with(['crm', 'company'])->where('id', '=', $id)->first();
        $concept = Concept::find($id);
        // dd($concept->id);
        // update config files for concepts
        $data = $this->getCompanyInfo->getCompanyInfo($concept);
        // return redirect()->route('concept.index')->with('success','Company Information '.$data->getCompany()['name'].' Has Been updated successfully');
        return redirect('admin/concepts')->with("success",'Company Information '.$data->getCompany()['name'].' Has Been updated successfully');

    }


    public function update_command_config_extra_data($id)
    {
        $concept = Concept::find($id);
        $data = $this->cmp->getCompanyData($concept);
        // dd($data);

        // $data = $crmApi->get(CrmApi::$routes['webshop_get']);
        if($data instanceof ErrorResponse) {
            echo $data->getStatus();
        }
        if(is_null($data)){
            return false;
        }

        // $products = $data->getProducts();
        $company = $data->data->company;
        $support = $data->data->support;
        // dd($data->data);


        if (empty($company->vat_numbers)) {
            $company->vat_numbers[0]->area = 'N/A';
            $company->vat_numbers[0]->number = 'N/A';
        }

        $concept->support_email = $support->email;
        $concept->support_phone = $support->phone;
        $concept->support_hours = $support->hours;
        $concept->support_languages = $support->languages;
        $concept->concept_name = $data->data->name;
        $concept->company_name = $company->name;
        $concept->company_business_number = $company->business_number;
        $concept->company_vat_number_area = $company->vat_numbers['0']->area;
        $concept->company_vat_number = $company->vat_numbers['0']->number;
        $concept->company_address = $company->address;
        $concept->company_postcode = $company->postcode;
        $concept->company_city = $company->city;
        $concept->company_country = $company->country;
        $concept->company_country_code = $company->country_code;
        $concept->company_registration_date = $company->registration_date;
        $concept->concept_website_name = $data->data->domain;
        $concept->campaign_domain = $data->data->registration_url;
        $concept->campaign_domain_url = $data->data->campaign_domain;
        $concept->service_unique_id_token = $data->data->id;
        $concept->save();
        return true;
    }



}
