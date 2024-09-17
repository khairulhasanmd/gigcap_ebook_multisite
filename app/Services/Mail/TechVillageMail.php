<?php

namespace App\Services\Mail;

use App\Http\Controllers\EmailController;
use App\Models\{
    EmailTemplate, Language, Preference
};

abstract class TechVillageMail
{
    protected $email;
    protected $logo;
    protected $response;
    protected $companyName;
    protected $companyEmail;

    abstract protected function send($request);

    /**
     * Constructor
     *
     * return void
     */
    public function __construct()
    {
        $this->email = new EmailController;
        $this->logo = Preference::where('field', 'company_logo')->first()->fileUrl();
        $this->response = ['status' => false, 'message' => __('Email can not be sent, please contact with admin.')];
        $this->companyName = preference('company_name');
        $this->companyEmail = preference('company_email');
    }

    /**
     * Mail setting
     *
     * @param  string  $languageShortCode
     * @param  string  $slug
     * @return object|array
     */
    protected function getTemplate($languageShortCode = null, $slug = null)
    {
        if (empty($slug)) {
            return $this->response;
        }

        $languageId = Language::getAll()->where('short_name', $languageShortCode)->first()->id;
        $template = EmailTemplate::getAll()->where('status', 'Active')->where('slug', $slug)->whereIn('language_id', [$languageId, 1])->sortByDesc('language_id')->first();

        if (empty($template)) {
            return $this->response;
        }

        return $template;
    }
}
