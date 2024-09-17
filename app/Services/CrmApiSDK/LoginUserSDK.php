<?php

namespace App\Services\CrmApiSDK;

use Session;
use Redirect;
use Illuminate\Http\Request;
use MetricaloClientSdkCrm\CrmApi;
use MetricaloClientSdkCrm\Resource\Api\EmailMessage;
use MetricaloClientSdkCrm\Resource\Api\StringResponse;
use MetricaloClientSdkCrm\Resource\Api\WebsiteUser;

class LoginUserSDK {

    public function __construct($api_url, $api_key) {
        $this->crmApi = new CrmApi($api_url, $api_key);
    }

    public function loginVerfication($parameters) {
        $username = $parameters->email;
        $password = $parameters->password;

        $parameters->setLocale(app()->getLocale());
        $user = $this->crmApi->authenticateUser($parameters, $username, $password);
        if ($user instanceof WebsiteUser) {
            $data = [
                "id" => $user->getId(),
                "customerId" => $user->getCustomerId(),
                "serviceId" => $user->getWebshopId(),
                "username" => $user->getUsername(),
            ];
            return $this->sendLoginResponse($parameters, $data);
        } 
        return [ 'status' => false, 'error' => $user->getMessage()];
    }

    protected function sendLoginResponse(Request $request, $data)
    {  
        $request->session()->regenerate();
        Session::put('user', ['id' => $data['id'], 'customerId' => $data['customerId']]);
        return [ 'status' => true ];
    }

}