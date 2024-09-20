<?php
namespace App\Services;

use Request;
use App\Models\Concept;
use Illuminate\Support\Facades\Hash;



class CmpApi {

    public function __construct($concept)
    {

        $this->url = env('CRM_API_URL');
        $this->apiKey = $concept->crm_api_key;
        $this->trans = env('API_TRANSLATION_KEY');
        $this->crmApiKey = env('CRM_API_KEY');
        // dd($this->url);
    }

    public function getCompanyInfo() {
        $url = $this->url."/api/s/v3/this/webshop.json";
        // dd($url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);
        // dd($responseData);
        return $responseData;
    }


    function sendEmailViaAPI($email, $replyTo, $subject, $htmlContent, $locale = 'en') {

        $apiKey = $this->apiKey; // Replace with your API key
        $baseDomain = $this->url; // Replace with your base domain
        // $endpoint = 'emails/sends.json';
        $endpoint = $baseDomain.'/api/s/v3/emails/sends.json';

        $url = $endpoint;

        // Prepare the data
        $postData = json_encode([
           'email' => $email,
            'reply_to' => $replyTo,
            'subject' => $subject,
            'html' => $htmlContent,
            'locale' => $locale,
        ]);

        // Initialize cURL session
        $ch = curl_init($url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'x-api-key: ' . $apiKey,
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        // Execute cURL session
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            // Handle error; for example, log it or display an error message
            return "cURL error: " . $error_msg;
        }

        // Close cURL session
        curl_close($ch);

        // Optionally, you can process $response to handle the API's response
        // For example, check if the email was sent successfully
        $responseData = json_decode($response, true);
        // dd($responseData['status']);

        if (isset($responseData['status']) && $responseData['status']) {
            return "success";
        } else {
            // Handle the case where the email was not sent successfully
            return "error";
        }
    }



    public function getCustomer($customer_id) {
        $url = $this->url."/api/s/v3/customers/".$customer_id.".json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);
        // dd($responseData);

        return $responseData;
    }

    public function getOrders($customer_id) {
        $url = $this->url."/api/s/v3/customers/".$customer_id."/invoices.json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);
        return $responseData;
    }

    public function getOrder($invoice_id) {
        $url = $this->url."/api/s/v3/invoices/".$invoice_id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        // $responseData = json_decode($responseData);
// dd($responseData);
        return $responseData;
    }

    public function getSubscription($subscription_id) {
        $url = $this->url."/api/s/v3/subscriptions/".$subscription_id.".json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);
        return $responseData;
    }

    public function getSubscriptionDetailByCustomerId($customer_id) {
        $url = $this->url."/api/s/v3/customers/".$customer_id.'/subscriptions/active.json';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);
        return $responseData;
    }

    public function cancelSubscription($subscription_id) {
        $url = $this->url."/api/s/v3/subscriptions/".$subscription_id."/cancel.json";

        $request = [
            "customer_ip" => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? Request::ip() : "123.123.123.123"),
            "customer_user_agent" => Request::server()['HTTP_USER_AGENT'],
            "customer_accept_language" => Request::server('HTTP_ACCEPT_LANGUAGE'),
            "_locale"=> app()->getLocale()
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);
        // dd($responseData);
        return $responseData;
    }

    public function getProducts() {
        $url = $this->url."/api/s/v3/selects/products/websites.json";

        $request = [
            "request_ip" => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? request()->ip() : "49.180.184.133"),
            "request_user_agent" =>  (isset(request()->server()['HTTP_USER_AGENT']) ? request()->server()['HTTP_USER_AGENT'] : "Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-A202F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/16.0 Chrome/92.0.4515.166 Mobile Safari/537.36"),
            "request_accept_language" => request()->server('HTTP_ACCEPT_LANGUAGE'),
            "request_locale"=> app()->getLocale()
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);
        // dd($responseData);
        return $responseData;
    }

    public function updateCustomer($data) {
        $url = $this->url."/api/s/v3/customers/".$data['customer_id'].".json";
        // dd($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        $responseData = curl_exec($ch);

        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);
        return $responseData;
    }
    public function getNewPassword($newPassword){
        $logged_user = auth()->user();
        $logged_user->password = Hash::make($newPassword);
        $logged_user->plain_password = $newPassword;
        $logged_user->update();
        return true;
    }

    public function getTermsLocale($locale) {
        $url = $this->url."/api/s/v3/this/webshop/terms?_locale=".$locale;
        // dd($url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $responseData;
    }
    public function typeOfService($tos_type, $locale) {
        $url = $this->url."/api/s/v3/website/tos/rendered.json?tos_type=".$tos_type."&_locale=".$locale;    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData)->data->html;
        // dd($responseData);
        return $responseData;
    }



    public function getTermsLocales($locale) {
        //$url = $this->urlV3."website/tos/rendered.json?tos_type=terms_of_service&_locale=".$locale;
        //https://crm.52north.co/api/s/v3/this/website/tos/rendered.json?tos_type=terms_of_service&_locale=".$locale;

        // $url = $this->url."/api/s/v3/this/webshop/terms?_locale=".$locale;
        $url = "https://crm.52north.co/api/s/v3/website/tos/rendered.json?tos_type=subscription_policy&_locale=".$locale;
        // dd($url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $service = json_decode($responseData)->data;
        // dd($responseData);
        return $service;
    }


    public function getTermsNew($locale) {
        $url = $this->url."/api/s/v3/website/tos/rendered.json?tos_type=terms_of_service&_locale=".$locale;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $responseData;
    }

    public function getPolicy() {
        $url = $this->url."/api/s/v2/services/this/subscription-policy";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);
        return $responseData;
    }

    public function getPrice() {
        $url = $this->url."/api/s/v3/selects/clicks/pricings/plans.json";

        $data = [
            "request.ip" => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? Request::ip() : "188.6.38.93"),
            "request.user_agent" => Request::server()['HTTP_USER_AGENT'],
            "service.id" => config('app.service_id'),
            "product.id" => config('app.product_id')
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->crmApiKey,
            'x-is-admin: 1',
            'Content-Type: application/json'
        ));
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);

        return $responseData;
    }

    public function unsubscribe($data) {
        $url = $this->url."/api/s/v3/subscriptions/search.json";

        $postData = [
            "email" => $data['email'],
            "last4" => $data['last4'],
            "request_ip" => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? Request::ip() : "49.180.184.133"),
            "request_user_agent" => Request::server()['HTTP_USER_AGENT'],
            "request_accept_language" => Request::server('HTTP_ACCEPT_LANGUAGE'),
            "_locale"=> app()->getLocale(),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        $responseData = curl_exec($ch);

        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);

        return $responseData;
    }

    public function authenticateUser($request, $username, $password){
        $url = $this->url."/api/s/v3/users/authenticates.json";

        $postData = [
            "username" => $username,
            "password" => $password,
            "_locale"=> app()->getLocale()
       ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        $responseData = curl_exec($ch);

        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);
        return $responseData;
    }


    public function searchSubscription($email, $cc_last_4) {
        $url = $this->url."/api/s/v3/subscriptions/search.json";

        $request = [
            "email" => $email,
            "last4" => $cc_last_4,
            "request.ip" => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? Request::ip() : "123.123.123.123"),
            "request.user_agent" => Request::server()['HTTP_USER_AGENT'],
            "request.accept_language" => Request::server('HTTP_ACCEPT_LANGUAGE'),
            "_locale"=> app()->getLocale()
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:'.$this->apiKey,
            'Content-Type: application/json'
        ));
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);
        return $responseData;
    }


    public function getTranslations($data) {

        $url = "https://crm.advivus.com/api/s/v3/translations.json";

        // dd($url);



        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

            'x-api-key:'.'ODQzM2I2MTQ4NWU1NWRkZTAxN2Y1MmIxZDZlMTM2OGNhOWNkNDIyZA',

            'x-is-admin: 1',

            'Content-Type: application/json'

        ));



        $responseData = curl_exec($ch);

        if(curl_errno($ch)) {

            return curl_error($ch);

        }

        curl_close($ch);

        $responseData = json_decode($responseData);

        return $responseData;

    }

    public function sendEmailMessage(EmailMessage $message)
    {
        dd($message);
        if (!$message->getEmail() && !$message->getCustomerId()) {
            throw new \Exception('You must provide either customerId or email.');
        }

        $postData = [
            'email'  => $message->getEmail(),
            'subject' => $message->getSubject(),
            'html' => $message->getHtml(),
            'locale' => $message->getLocale()
        ];

        if ($message->getCustomerId()) {
            $postData['customer_id'] = $message->getCustomerId();
        }

        if ($message->getEmail()) {
            $postData['email'] = $message->getEmail();
        }

        if ($message->getReplyTo()) {
            $postData['reply_to'] = $message->getReplyTo();
        }

        $response = $this->post(self::$routes['email_send'], [], $postData);

        if (!$response instanceof StringResponse) {
            throw new \Exception('Unexpected response from send email.');
        }

        return $response;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerId
     * @return $this
     */
    public function setCustomerId($customerId): self
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return $this
     */
    public function setEmail($email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReplyTo()
    {
        return $this->replyTo;
    }

    /**
     * @param mixed $replyTo
     * @return $this
     */
    public function setReplyTo($replyTo): self
    {
        $this->replyTo = $replyTo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @param mixed $templateId
     * @return $this
     */
    public function setTemplateId($templateId): self
    {
        $this->templateId = $templateId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     * @return $this
     */
    public function setSubject($subject): self
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param mixed $html
     * @return $this
     */
    public function setHtml($html): self
    {
        $this->html = $html;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param mixed $locale
     * @return $this
     */
    public function setLocale($locale): self
    {
        $this->locale = $locale;
        return $this;
    }


}
