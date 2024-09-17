<?php

namespace App\Service\CrmApiSDK;

use Session;
use Request;
use App\Models\CodeSchool;  
use MetricaloClientSdkCrm\CrmApi;

class UserSDK {

    public function __construct($api_url, $api_key) {
        $this->crmApi = new CrmApi($api_url, $api_key);
    }

    public function getCourse($concept){   
        if(!$this->isLogin()) {
            return redirect()->back();
        }
        $custData = [
            'customerId' => Session::get('user')['customerId']
        ];
        $customer = $this->crmApi->get(CrmApi::$routes['customer_get'], $custData);
        
        $subData = $this->crmApi->get(CrmApi::$routes['customer_subscriptions_get'], $custData);
        $subscription = $subData->getItems();
        
        $subscription_passed = 'active';
        if($subscription[0]->getStatus() != "active"){
            $subscription_passed = 'not_active';
        }
    
        $CodeSchool = new CodeSchool();
        $codeSchoolUrl = $CodeSchool->authenticateUser();
        $gamingUrl = $CodeSchool->authenticateGamingUser();
       
        $orders = $this->crmApi->get(CrmApi::$routes['customer_invoices_get'], $custData);

        if($concept == "coding") {
            $data = ['user' => $customer, 'orders' => $orders->getItems(), 'subscription_passed' => $subscription_passed, 'subscription' => $subscription, 'url' => $codeSchoolUrl];
        } else {
            $data = ['user' => $customer, 'orders' => $orders->getItems(), 'subscription_passed' => $subscription_passed, 'subscription' => $subscription, 'url' => $gamingUrl];
        }
        
        return $data;
    }

    // public function showDashboard($concept){
    //     if(!$this->isLogin()) {
    //         return redirect()->back();
    //     }
    //     $custData = [
    //         'customerId' => Session::get('user')['customerId']
    //     ];  
    //     $customer = $this->crmApi->get(CrmApi::$routes['customer_get'], $custData);
        
    //     $subData = $this->crmApi->get(CrmApi::$routes['customer_subscriptions_get'], $custData);
    //     $subscription = $subData->getItems();
        
    //     $subscription_passed = 'active';
    //     if($subscription[0]->getStatus() != "active"){
    //         $subscription_passed = 'not_active';
    //     }

    //     $financialTerminal = 'https://t.krakentech.net/';
       
    //     $orders = $this->crmApi->get(CrmApi::$routes['customer_invoices_get'], $custData);

    //     $data = ['user' => $customer, 'orders' => $orders->getItems(), 'subscription_passed' => $subscription_passed, 'subscription' => $subscription[0], 'url' => $financialTerminal];
    //     return $data;
    // }
   

    public function showDashboard($concept){
        if(!$this->isLogin()) {
            return redirect()->back();
        }
        $custData = [
            'customerId' => Session::get('user')['customerId']
        ];  
        $customer = $this->crmApi->get(CrmApi::$routes['customer_get'], $custData);
        
        $subData = $this->crmApi->get(CrmApi::$routes['customer_subscriptions_get'], $custData);
        $subscription = $subData->getItems();
        
        $subscription_passed = 'active';
        if($subscription[0]->getStatus() != "active"){
            $subscription_passed = 'not_active';
        }
      if ($concept == "bbt"){
        $url = 'https://t.krakentech.net/';
       } else if ($concept == "gaming"){
        $CodeSchool = new CodeSchool();
        $url = $CodeSchool->authenticateGamingUser();
       }
        $orders = $this->crmApi->get(CrmApi::$routes['customer_invoices_get'], $custData);

        $data = ['user' => $customer, 'orders' => $orders->getItems(), 'subscription_passed' => $subscription_passed, 'subscription' => $subscription[0], 'url' => $url];
        return $data;
    }

    public function getProfile(){
        if(!$this->isLogin()) {
            return redirect()->back();
        }
        $custData = [
            'customerId' => Session::get('user')['customerId']
        ];
        $customer = $this->crmApi->get(CrmApi::$routes['customer_get'], $custData);

        $subData = $this->crmApi->get(CrmApi::$routes['customer_subscriptions_get'], $custData);
        $subscription = $subData->getItems();
        
        $subscription_passed = 'active';
        if($subscription[0]->getStatus() != "active"){
            $subscription_passed = 'not_active';
        }
        
        $orders = $this->crmApi->get(CrmApi::$routes['customer_invoices_get'], $custData);

        $data = ['user' => $customer, 'orders' => $orders->getItems(), 'subscription_passed' => $subscription_passed, 'subscription' => $subscription];
        
        return $data;
    }

    public function updateProfileInfo($user){
        if(!$this->isLogin()) {
            return redirect()->back();
        }
        $custData = [
            'customerId' => Session::get('user')['customerId']
        ];
        $customer = $this->crmApi->get(CrmApi::$routes['customer_get'], $custData);

        $user['customer_id'] = $custData['customerId'];
        
        try {
            $userInfo = $this->crmApi->patch(CrmApi::$routes['customer_update'], $custData, $user);
            return true;
        } catch (\Exception $e){
            return false;
        }   
    }

    public function getNewPassword($newPassword){
        if(!$this->isLogin()) {
            return redirect()->back();
        }
        $queryData = [
            'websiteUserId' => Session::get('user')['id']
        ];

        $postData = [
            'password' => $newPassword
        ];

        $user = $this->crmApi->patch(CrmApi::$routes['website_user_update'], $queryData, $postData);
        return true;
    }

    public function cancelMembershipPage(){
        if(!$this->isLogin()) {
            return redirect()->back();
        }
        $custData = [
            'customerId' => Session::get('user')['customerId']
        ];
        $customer = $this->crmApi->get(CrmApi::$routes['customer_get'], $custData);

        $subData = $this->crmApi->get(CrmApi::$routes['customer_subscriptions_get'], $custData);
        $subscription = $subData->getItems();

        $subscription_passed = 'active';
        if($subscription[0]->getStatus() != "active"){
            $subscription_passed = 'not_active';
        }

        $orders = $this->crmApi->get(CrmApi::$routes['customer_invoices_get'], $custData);

        $data = ['user' => $customer, 'orders' => $orders->getItems(), 'subscription_passed' => $subscription_passed, 'subscription' => $subscription];

        return $data;
    }

    public function cancelUserSubscription(){
        if(!$this->isLogin()) {
            return redirect()->back();
        }
        $custData = [
            'customerId' => Session::get('user')['customerId']
        ];
        $customer = $this->crmApi->get(CrmApi::$routes['customer_get'], $custData);

        $subData = $this->crmApi->get(CrmApi::$routes['customer_subscriptions_get'], $custData);
        $subscription = $subData->getItems();

        $queryData = [
            'subscriptionId' => $subscription[0]->getId()
        ];
        
        $postData = [
            'request_ip' => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? Request::ip() : "49.180.184.133"),
            'request_user_agent' => Request::server()['HTTP_USER_AGENT'],
            'request_accept_language' => Request::server('HTTP_ACCEPT_LANGUAGE'),
            '_locale' => app()->getLocale()
        ];
        
        $cancelSubscriptionResponse = $this->crmApi->post(CrmApi::$routes['subscription_cancel'], $queryData, $postData);
        
        return $cancelSubscriptionResponse;
    }

    public function showSubscriptions(){
        $logged_user = auth()->user();
        $orders = $this->cmpApi->getOrders($logged_user);
        return view('subscriptions')->with('orders',$orders);
    }

    public function getOrderDetail($orderId)
    {  
        if(!$this->isLogin()) {
            return redirect()->back();
        }
        $data = [
            'orderId' => $orderId
        ];

        $order = $this->crmApi->get(CrmApi::$routes['invoice_get'], $data);
        
        return $order;
    }

    public function isLogin() {
        //dd(Session::get('user')['id']);
        if(isset(Session::get('user')['id'])) {
            return true;
        }
        return false;
    }
}