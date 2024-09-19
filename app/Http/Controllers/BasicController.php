<?php

namespace App\Http\Controllers;

use App\CodeSchool;
use App\Models\Admin\SubTopic;
use App\Models\Admin\UserPerformance;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use App\Mail\ForgotPasswordMail;
use App\Resume;
use App\User;
use App\UserManager;
use Carbon\Carbon;
use App\Services\CmpApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class BasicController extends GlobalController
{
    public $um;
    protected $secret;
    protected $domain;

    public function __construct()
    {
        parent::__construct();
        $this->domain = env('PC_DOMAIN');
        $this->secret = env('PC_SECRET');
        $this->locale = app()->getLocale();

        $this->cmp = new CmpApi($this->concept);
    }


    public function welcome()
    {
        $clickPricing = $this->cmp->getProducts();
        return view($this->template.'pages.index', [
            'prices' => $clickPricing->data->products,
        ]);
    }

    public function about(){
        $clickPricing = $this->cmp->getProducts();
        return view($this->template.'pages.about-us', [
            'prices' => $clickPricing->data->products,
        ]);
        // return view($this->template.'pages.about-us', []);
    }
    public function unsubscribe(){
        return view($this->template.'.'.'pages.unsubscribe');
    }

    public function subscription() {
        // $cmpRequest = new CmpApi();

        $policy = $this->cmp->getPolicy();
        return view($this->template.'.pages.policy', compact('policy'));
    }

    public function termsLocale(){

        // $data = $this->crmApi->get(CrmApi::$routes['webshop_get']);
        // $company = $data->getCompany();
        $terms = $this->cmp->getTermsLocale($this->locale);
        if(!is_null($terms)){
            $this->createTerms($terms);
            return view($this->template.'.pages.terms')->with(['terms' => $terms]);
        }else{
            $terms = Storage::disk('local')->get('terms.txt');
            return view($this->template.'.pages.terms')->with('terms', $terms);
        }
    }
    public function typeOfService(Request $request, $service){

        $result = $this->cmp->typeOfService($service , $this->locale);
        // $this->createService($service, $result->data->html);
        return view($this->template.'.pages.services')->with(['service' => $result, 'pageName' => $service]);
     
    }

    public function privacy(){
        return view($this->template.'pages.privacy');
    }

    public function returnPolicy(){
        return view('pages.return');
    }

    public function contact(){
        
        return view('templates.'.$this->concept->template.'.pages.contact-us');
    }

    public function comingSoon(){
        return view('pages.coming-soon');
    }

    public function signup(){
        return view('pages.signup');
    }

    public function contactUs(Request $request){
        $this->validate($request, [
            'g-recaptcha-response' => ['required', new RecaptchaRule($this->concept->site_key, $this->concept->secret_key)],
        ]);

        if(isset($request->firstname) && isset($request->lastname) && isset($request->message)) {
            try {
                $customerEmail = $request->email;

                // Skip test if no e-mail added
                if (!$customerEmail)
                    return;

                $message = new CmpApi();

                $message->setEmail(config('concept.'.$this->concept->template_name.'.SUPPORT_EMAIL'))
                    ->setReplyTo($customerEmail)
                    ->setSubject($request->subject)
                    ->setHtml($request->message)
                    ->setHtml('Email: ' . $customerEmail . '<br> Name: ' . $request->firstname . ' ' . $request->lastname . '<br> Message: ' . $request->message, 'text/html')
                    ->setLocale(app()->getLocale());

                $stringResponse = $this->cmp->sendEmailMessage($message);

                if($stringResponse instanceof StringResponse) {
                    return redirect()->back()->with('success', 'Message sent');
                } else {
                    return Redirect::back()->withErrors(['error' => 'Something went wrong. Please try later']);
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
                return Redirect::back()->withErrors(['error' => 'Something went wrong. Please try later']);
            }
        }else{
            return Redirect::back()->withErrors(['error' => 'Something went wrong. Please try later']);
        }
    }

    public function sendForgotPassword(Request $request){
        $user = User::where('email', $request->email)->first();
        if(is_null($user)){
            return Redirect::back()->withErrors(['error' => 'No user with that email']);
        }
        $password = UserManager::randomKey(rand(10, 20));
        $user->plain_password = $password;
        $user->password = Hash::make($password);
        $user->save();
        Mail::to($request->email)->send(new ForgotPasswordMail($user, $password));
        return redirect('/')->with('success', 'Password sent');;
    }

    public function forgotPassword(){
        return view('pages.forgot-password');
    }

    public function terms(){
        $terms = $this->cmp->getTerms();
        if(!is_null($terms)){
            $this->createTerms($terms);
        }else{
            $terms = Storage::disk('local')->get('terms.txt');
        }
        return view('pages.terms')->with('terms', $terms);
    }

    private function createTerms($terms){
        Storage::disk('local')->put('terms.txt', $terms);
    }

    public function userPerformance(Request $request)
    {
        return view('pages.redirect');
    }

    public function updateUserPerformance(Request $request)
    {
        $subId = $request->get('sub_id');
        if ($subId){
            $user = User::where('subscription_id', $subId)->first();
        }
        $subtopic_id = $request->get('subtopic_id');
        $subTopics = SubTopic::find($subtopic_id);
        if (!$subTopics) {
            return redirect('/courses');
        }

        $userPerformance = UserPerformance::where('subtopic_id', $subTopics->id)
            ->where('user_id', $user->id)
            ->first();
        if (!$userPerformance) {
            $userPerformance = new UserPerformance();
            $userPerformance->subtopic_id = $subTopics->id;
            $userPerformance->user_id = $user->id;
            $userPerformance->save();
        }

        return response()->json([
            'status' => true
        ]);
    }


    public function unsubscribeMembership(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'last4' => 'required|max:4',
        ]);

        $response = $this->cmp->unsubscribe($request->all());

        if($response->status == "success") {
            $canceled_subscription = $this->cmp->cancelSubscription($response->data[0]->id);
            if($canceled_subscription->status == "success"){
                return Redirect::back()->with('success', $canceled_subscription->data);
            } else if($canceled_subscription->status == 'error'){
                return Redirect::back()->withErrors(['error' => $canceled_subscription->errors]);
            }else{
                return Redirect::back()->withErrors(['error' => 'Something went wrong. Please try later or contact our support team.']);
            }
        } else {
            return Redirect::back()->withErrors(['error' => $response->errors]);
        }
    }




    // // /**
    // //  * Site publicly visible use cases
    // //  */
    // // public function useCases(): View
    // // {
    // //     $data['useCaseCategories'] = ContentService::useCaseCategories();
    // //     $data['useCase'] = UseCase::count();

    // //     return view('site.use-cases', $data);
    // // }

    // /**
    //  * Site publicly visible privacy policies
    //  *
    //  * @return \Illuminate\Contracts\View\View
    //  */
    // public function privacyPolicy(): View
    // {
    //     return view('site.privacy-policy');
    // }

    // public function aboutUs(): View
    // {
    //     return view('site.privacy-policy');
    // }

    // public function contactUs(): View
    // {
    //     return view('site.privacy-policy');
    // }

    // public function termsAndConditions(): View
    // {
    //     return view('site.privacy-policy');
    // }

    // public function subscriptionPolicy(): View
    // {
    //     return view('site.privacy-policy');
    // }

    // /**
    //  * Package Pricing
    //  *
    //  * @return \Illuminate\Contracts\View\View
    //  */
    // public function pricing(): View
    // {
    //     $data = $this->packages();
    //     $data['billingCycles'] = $this->billingCycle($data['packages']);

    //     $data['credits'] = Credit::whereNot('type', 'default')->activeStatus()->sortOrder()->get();

    //     if (isActive('Affiliate')) {
    //         \Modules\Affiliate\Entities\Referral::userClickUpdate();
    //     }

    //     return view('site.pricing', $data);
    // }

    // /**
    //  * Subscription plan with their feature info
    //  *
    //  * @return array
    //  */
    // public function packages(){
    //     $packages = Package::getAll()->where('status', 'Active')->sortBy('sort_order');

    //     $prices = [];

    //     foreach ($packages as $package) {
    //         $prices[] = $package->sale_price;
    //     }

    //     /* border color  */
    //     $parentClass1 = "h-max lg:w-[30.33%] pricing-width w-full";
    //     $parentClass2 = "h-max lg:w-[30.33%] pricing-width w-full bg-white dark:bg-color-14 rounded-[30px] card-border";
    //     $childClass1 = "rounded-[30px] border border-color-89 dark:border-color-47 bg-white dark:bg-color-14 6xl:py-9 py-8 6xl:px-11 lg:px-5 px-8 sub-plan-rtl";
    //     $childClass2 = "6xl:py-9 py-8 6xl:px-11 lg:px-5 px-8 sub-plan-rtl";

    //     /* button color  */
    //     $buttonClass = "mt-[34px] text-white dark:text-color-14 text-16 font-semibold py-[13px] px-8 rounded-lg bg-color-14 dark:bg-white font-Figtree";

    //     /* button name  */
    //     $priceColor1= "text-48 font-bold break-all";
    //     $priceColor2= "text-48 font-bold heading-1 break-all";

    //     $allPackages= [];

    //     foreach( $packages as $package) {

    //         $allPackages[] = [
    //             'id' => $package->id,
    //             'name' => $package->name,
    //             'trial_day' => $package->trial_day,
    //             'sort_order' => $package->sort_order,
    //             'parent_class' => max($prices) == $package->sale_price ?  $parentClass2 : $parentClass1,
    //             'child_class' => max($prices) == $package->sale_price ?  $childClass2 : $childClass1,
    //             'price_color' => max($prices) == $package->sale_price ?  $priceColor2 : $priceColor1,
    //             'discount_price' => $package->discount_price,
    //             'sale_price' => $package->sale_price,
    //             'billing_cycle' => $package->billing_cycle,
    //             'duration' => $package->duration,
    //             'button' =>  $buttonClass,
    //             'features' => PackageService::editFeature($package, false),
    //         ];
    //     }

    //     $featureList = [];
    //     $mainFeature = [];
    //     $subFeature = [];
    //     foreach ($allPackages as $package) {
    //         foreach ($package['features'] as $feature) {
    //             if (isset($feature['value'])) {
    //                 $feature['values'][$package['name']] = $feature['value'];
    //             }

    //             if (array_key_exists($feature['title'], $featureList)) {
    //                 $featureList[$feature['title']]['feature'][] = $package['name'];

    //                 if (isset($feature['value'])) {
    //                     $featureList[$feature['title']]['values'][$package['name']] = $feature['value'];
    //                 }

    //                 if (isset($featureList[$feature['title']]['is_value_fixed'])) {
    //                     $mainFeature[$feature['title']] = $featureList[$feature['title']];
    //                 } else {
    //                     $subFeature[$feature['title']] = $featureList[$feature['title']];
    //                 }

    //                 continue;
    //             }

    //             $featureList[$feature['title']] = $feature + ['feature' => [$package['name']]];

    //             if (isset($featureList[$feature['title']]['is_value_fixed'])) {
    //                 $mainFeature[$feature['title']] = $featureList[$feature['title']];
    //             } else {
    //                 $subFeature[$feature['title']] = $featureList[$feature['title']];
    //             }
    //         }
    //     }

    //     $featureList = $mainFeature + $subFeature;

    //     $subscription = PackageSubscription::where('user_id', auth()->user()->id ?? 0)->first();

    //     return ['packages' => $allPackages, 'features' => $featureList, 'subscription' => $subscription];
    // }

    // /**
    //  * Available Billing Cycle
    //  */
    // private function billingCycle($packages)
    // {
    //     $cycleList = [
    //         'lifetime' => __('Lifetime'),
    //         'yearly' => __('Yearly'),
    //         'monthly' => __('Monthly'),
    //         'weekly' => __('Weekly'),
    //         'days' => __('Days'),
    //     ];

    //     $cycles = [];

    //     foreach ($packages as $key => $package) {
    //         foreach ($package['billing_cycle'] as $billingKey => $value) {
    //             if ($value == 1) {
    //                 $cycles[$billingKey] = $cycleList[$billingKey];
    //             }
    //         }
    //     }

    //     // Sort the $cycles array based on the order of $cycle array
    //     uksort($cycles, function ($a, $b) use ($cycleList) {
    //         return array_search($a, array_keys($cycleList)) - array_search($b, array_keys($cycleList));
    //     });

    //     return $cycles;
    // }











}
