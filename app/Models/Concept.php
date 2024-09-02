<?php

namespace App\Models;

// use App\Models\Core\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{

    protected $fillable = [
        'crm_id',
        'domain_name',
        'crm_api_key',
        'service_id',
        'product_id',
        'service_name',
        'mail_from_address',
        'support_email',
        'support_phone',
        'support_hours',
        'support_languages',
        'concept_name',
        'company_name',
        'company_business_number',
        'company_vat_number_area',
        'company_vat_number',
        'company_address',
        'company_postcode',
        'company_city',
        'company_country',
        'company_country_code',
        'company_registration_date',
        'concept_website_name',
        'campaign_domain',
        'campaign_domain_url',
        'service_unique_id_token',
        'company_id',
        'template',
        'email_api_id',
        'recaptcha_sitekey',
        'recaptcha_secretkey',
        'extra_codes',
        'openai_key',
        'openai_completions_model',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [];

    // public function customers()
    // {
    //     return $this->hasMany(Customer::class);
    // }

    // public function contents()
    // {
    //     return $this->hasMany(Content::class);
    // }

    // public function categories()
    // {
    //     return $this->hasMany(Category::class);
    // }

    // public function company()
    // {
    //     return $this->belongsTo(Company::class);
    // }

    // public function crm()
    // {
    //     return $this->belongsTo(Crm::class);
    // }



}
