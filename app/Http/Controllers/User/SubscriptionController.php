<?php

/**
 * @package SubscriptionController
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <mostafijur.techvill@gmail.com>
 * @created 28-03-2023
 */

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Currency, User, Team, TeamMemberMeta};
use App\Services\SubscriptionService;
use Modules\Subscription\Services\PackageService;
use Illuminate\Support\Facades\{
    Auth,
    DB
};
use Illuminate\Support\Facades\Session;
use Modules\Coupon\Services\CouponService;
use Modules\Gateway\Redirect\GatewayRedirect;
use Modules\Subscription\Services\PackageSubscriptionService;
use Modules\Subscription\Entities\{
    Credit,
    Package,
    SubscriptionDetails,
    PackageSubscription
    
};

class SubscriptionController extends Controller
{
    /**
     * Subscription service
     *
     * @var object
     */
    protected $subscriptionService;

    /**
     * Package Subscription Service
     *
     * @var object
     */
    protected $packageSubscriptionService;
    
    /**
     * Coupon Service
     *
     * @var object
     */
    protected $couponService;

    /**
     * Constructor for Subscription controller
     *
     * @param SubscriptionService $subscriptionService
     * @return void
     */
    public function __construct(SubscriptionService $subscriptionService, PackageSubscriptionService $packageSubscriptionService, CouponService $couponService)
    {
        $this->subscriptionService = $subscriptionService;
        $this->packageSubscriptionService = $packageSubscriptionService;
        $this->couponService = $couponService;
    }

    /**
     * Get packages
     *
     * @param Request $request
     * @return view
     */
    public function package(Request $request)
    {
        $data['activeSubscription'] = $this->packageSubscriptionService->getUserSubscription();

        $data['activeFeatureLimits'] = $this->packageSubscriptionService->getActiveFeature($data['activeSubscription']?->id ?? 1);
        $data['packages'] = Package::orderBy('sort_order')->get();
        $data['activeSubscriptionPackage'] = Package::find($data['activeSubscription']?->package_id);
        $data['activePackage'] = $this->subscriptionService->activePackage();

        $package = $this->packages();

        $data['packages'] = $package['packages'];
        $data['features'] = $package['features'];
        $data['subscription'] = $package['subscription'];
        $data['billingCycles'] = $this->billingCycle($package['packages']);
        
        $data['credits'] = Credit::whereNot('type', 'default')->activeStatus()->sortOrder()->get();


        if ($data['activePackage']) {
            $data['activePackageDescription'] = $this->subscriptionService->planDescription($data['activePackage']->id);
        }

        if (!isset($request->page) && subscription('getUserSubscription', auth()->user()->id)) {
            return view('user.subscription-details', $data);
        }
        return view('user.subscription-details', $data);
    }

    /**
     * Get plan description
     *
     * @param string $id
     * @return \Illuminate\Contracts\View\View
     */
    public function planDescription(string $id)
    {
        $data['activeSubscription'] = $this->packageSubscriptionService->getUserSubscription();
        $data['activeSubscriptionPackage'] = Package::find($data['activeSubscription']?->package_id);
        $data['packages'] = Package::orderBy('sort_order')->get();
        $data['activePackage'] = $this->subscriptionService->activePackage();
        $data['activePackageDescription'] = $this->subscriptionService->planDescription($id);

        return view('user.renderable.plans', $data)->render();
    }

    /**
     * Store subscription data
     *
     * @param Request $request
     * @return redirect
     */
    public function storeSubscription(Request $request)
    {
        if ($this->c_p_c()) {
            \Session::flush();
            return view('errors.installer-error', ['message' => __("This product is facing license violation issue.<br>Please contact admin to fix the issue.")]);
        }
        Package::where(['status' => 'Active', 'id' => $request->package_id])->firstOrFail();
        $subscription = subscription('getUserSubscription', auth()->user()->id);
        
        if ($subscription && $subscription->status == 'Active' && str_contains(strtolower($subscription->activeDetail()?->payment_method), 'recurring')) {
            return redirect()->route('user.package')->withErrors(__('Please cancel your current subscription to activate another.'));
        }
        
        if (!isset($request->billing_cycle) || !in_array($request->billing_cycle, ['days', 'weekly', 'monthly', 'yearly', 'lifetime'])) {
            return back()->withErrors(__('Invalid billing cycle provided'));
        }
        
        if ($subscription) {
            return $this->updateSubscription($request);
        }
        
        try {
            $paymentType = $this->packageSubscriptionService->paymentType($request->billing_cycle, $request->package_id);
            
            DB::beginTransaction();
            $response = $this->packageSubscriptionService->storePackage($request->package_id, Auth::user()?->id, $request->billing_cycle);

            if ($response['status'] != 'success') {
                throw new \Exception(__('Subscription fail.'));
            }
            $packageSubscriptionDetails = $this->packageSubscriptionService->storeSubscriptionDetails();
            
            $price = $packageSubscriptionDetails->billing_price - $this->couponService->getDiscountAmount($request->package_id, auth()->user()->id, $request->billing_cycle);
            if (!$packageSubscriptionDetails->is_trial && $price == 0 ) {
                $this->packageSubscriptionService->activatedSubscription($packageSubscriptionDetails->id);
                $this->couponService->storeCouponRedeem($packageSubscriptionDetails->id, $request->package_id, 'Active');

                
                if (isActive('Affiliate') && empty($subscription)) {
                    $package = Package::find($request->package_id);
                    $billed = $package->discount_price[$request->billing_cycle] > 0 ? $package->discount_price[$request->billing_cycle] : $package->sale_price[$request->billing_cycle];
                    $packageSubscriptionDetails['amount_billed'] = $billed;

                    if (isActive('Affiliate')) {
                        \Modules\Affiliate\Entities\ReferralPurchase::purchase($packageSubscriptionDetails);
                    }
                }

                DB::commit();
                return redirect()->route('user.package')->withSuccess($response['message']);
            }

            if ($packageSubscriptionDetails->is_trial) {
                $paymentType = "recurring";
            }

            request()->query->add(['payer' => 'user', 'to' => techEncrypt('subscription-paid')]);

            $route = GatewayRedirect::paymentRoute($packageSubscriptionDetails, $price, $packageSubscriptionDetails->currency, $packageSubscriptionDetails->unique_code, $request, $paymentType);

            DB::commit();
            return redirect($route);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('user.package')->withErrors($response['message'] ?? $e->getMessage());
        }
    }

    /**
     * Cancel Subscription
     *
     * @param $user_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancelSubscription($user_id)
    {
        $response = (new PackageSubscriptionService)->cancel($user_id);
        $this->setSessionValue($response);

        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscriptionPaid(Request $request)
    {
        if (!checkRequestIntegrity()) {
            return redirect(GatewayRedirect::failedRedirect('integrity'));
        }
        try {
            $response =  $this->subscriptionService->subscriptionPaid($request);
            $this->memberPackageSessionSet();

            if (isActive('Affiliate')) {
                \Modules\Affiliate\Entities\ReferralPurchase::purchase($response);
            }
            
            Session::flash('success', __('You have successfully subscribed to your desired plan.'));
            return redirect()->route('user.package');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->route('user.package');
        }
    }

    /**
     * Show billing details
     *
     * @param string|integer $id
     * @return view
     */
    public function billDetails(string|int $id)
    {
        $data['subscription'] = SubscriptionDetails::find($id);

        return view('user.bill-details', $data);
    }

    /**
     * bill pdf
     *
     * @param string|integer $id
     * @return pdf
     */
    public function billPdf(string|int $id)
    {
        $data['subscription'] = SubscriptionDetails::find($id);
        return printPDF($data, 'invoice' . time() . '.pdf', 'user.invoice-print', view('user.invoice-print', $data), 'pdf');
    }

    /**
     * pay for pending subscription
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector
     */
    public function payPendingSubscription(Request $request)
    {
        try {
            $paymentType = ['automate' => 'recurring', 'manual' => 'single', 'customer_choice' => 'all'];
            DB::beginTransaction();

            $subscriptionDetails = SubscriptionDetails::where('id', $request->id)->first();
            $subscriptionDetails->update(['unique_code' => uniqid(rand(), true)]);
            $subscriptionDetails = $subscriptionDetails->refresh();
            
            if ($subscriptionDetails->status == 'Active' && str_contains(strtolower($subscriptionDetails->payment_method), 'recurring')) {
                return redirect()->route('user.package')->withErrors(__('Please cancel you current subscription to activate other plan.'));
            }

            if ($subscriptionDetails->billing_cycle) {
                $package = Package::find($subscriptionDetails->package_id);

                if (!$package) {
                    return redirect()->route('user.package')->withErrors(__('The package is not available.'));
                }
    
                $price = $package->discount_price[$subscriptionDetails->billing_cycle] > 0 ? $package->discount_price[$subscriptionDetails->billing_cycle] : $package->sale_price[$subscriptionDetails->billing_cycle];
                
                $price -= $this->couponService->getDiscountAmount($request->package_id, auth()->user()->id, $subscriptionDetails->billing_cycle);
            } else {
                $credit = Credit::find($subscriptionDetails->package_id);
                
                if (!$credit) {
                    return redirect()->route('user.package')->withErrors(__('The plan is not available.'));
                }
                
                $price = $credit->price;
            }
            
            if ($price == 0) {
                $this->packageSubscriptionService->activatedSubscription($subscriptionDetails->id);
                $this->couponService->storeCouponRedeem($subscriptionDetails->id, $subscriptionDetails->package_id, 'Active');
                DB::commit();

                return redirect()->route('user.package')->withSuccess(__('Subscription successfully updated.'));
            }

            request()->query->add(['payer' => 'user', 'to' => techEncrypt('subscription-pending-payment-response')]);

            $route = GatewayRedirect::paymentRoute($subscriptionDetails, $price, $subscriptionDetails->currency, $subscriptionDetails->unique_code, $request, $paymentType[preference('subscription_renewal')]);

            DB::commit();
            return redirect($route);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('user.package')->withErrors($e->getMessage());
        }
    }

    /**
     * Subscription pending payment response
     *
     * @param Request $request
     */
    public function subscriptionPendingPaymentResponse(Request $request)
    {
        if (!checkRequestIntegrity()) {
            return redirect(GatewayRedirect::failedRedirect('integrity'));
        }

        try {

            $response = $this->subscriptionService->paidPendingSubscription($request);
            
            if (isActive('Affiliate') && $response->payment_status == 'Paid') {
                DB::beginTransaction();
                $affiliateResponse = \Modules\Affiliate\Entities\ReferralPurchase::referralPurchaseUpdate($response);
                
                if ($affiliateResponse) {
                    DB::commit();
                } else {
                    DB::rollBack();
                }
                
            }
            

            return redirect()->route('user.package')->withSuccess(__('Your subscription is update.'));
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->route('user.package');
        }
    }

    /**
     * Update subscription data
     *
     * @param Request $request
     * @return redirect
     */
    public function updateSubscription(Request $request)
    {
        try {
            $paymentType = $this->packageSubscriptionService->paymentType($request->billing_cycle, $request->package_id);
            DB::beginTransaction();

            $subscription = subscription('getUserSubscription', auth()->user()->id);
            $package = Package::find($request->package_id);
            $usedTrial = SubscriptionDetails::where(['package_subscription_id' => $subscription->id, 'is_trial' => 1, 'package_id' => $package->id])->first();

            $price = $package->discount_price[$request->billing_cycle] > 0 ? $package->discount_price[$request->billing_cycle] : $package->sale_price[$request->billing_cycle];
            
            $price -= $this->couponService->getDiscountAmount($request->package_id, auth()->user()->id, $request->billing_cycle);
            

            if ($price == 0) {
                $response = $this->packageSubscriptionService->storePackage($request->package_id, auth()->user()->id, $request->billing_cycle);

                if ($response['status'] != 'success') {
                    throw new \Exception(__('Subscription fail.'));
                }

                $packageSubscriptionDetails = $this->packageSubscriptionService->storeSubscriptionDetails();
                $this->packageSubscriptionService->activatedSubscription($packageSubscriptionDetails->id);
                $this->couponService->storeCouponRedeem($packageSubscriptionDetails->id, $package->id, 'Active');
                DB::commit();
                return redirect()->route('user.package')->withSuccess($response['message']);
            }

            if ($package->trial_day && !$usedTrial) {
                $response = $this->packageSubscriptionService->storePackage($request->package_id, auth()->user()->id, $request->billing_cycle);

                $paymentType = "recurring";
            }

            session(['package_id' => $package->id]);
            $currency = Currency::find(preference('dflt_currency_id'))->name;

            request()->query->add(['payer' => 'user', 'to' => techEncrypt('subscription-update-paid')]);

            $route = GatewayRedirect::paymentRoute(['package_id' => $request->package_id, 'code' => $subscription->code, 'user_id' => $subscription->user_id, 'billing_cycle' => $request->billing_cycle, 'billing_price' => $price], $price, $currency, uniqid(rand(), true), $request, $paymentType);

            DB::commit();
            return redirect($route);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('user.package')->withErrors($response['message'] ?? $e->getMessage());
        }
    }

    /**
     * Subscription update paid
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscriptionUpdatePaid(Request $request)
    {
        if (!checkRequestIntegrity()) {
            return redirect(GatewayRedirect::failedRedirect('integrity'));
        }
        try {
            $request['package_id'] = session('package_id');
            $response = $this->subscriptionService->subscriptionUpdatePaid($request);
            $this->memberPackageSessionSet();

            if (isActive('Affiliate')) {
                
                $subscriptionDetails = SubscriptionDetails::where('package_id', $response->package_id)->where('user_id', auth()->user()->id)->where('is_trial', 1)->first();
                $totalTrailPlan = SubscriptionDetails::where('user_id', auth()->user()->id)->where('is_trial', 1)->count();
                $totalPlan = SubscriptionDetails::where('id', '!=', $response->id)->where('user_id', auth()->user()->id)->count();
                
                if (!empty($subscriptionDetails) && $totalTrailPlan == 1 && $totalPlan == 1) {
                    $subscriptionDetails['amount_billed'] = $response->amount_billed;
                   \Modules\Affiliate\Entities\ReferralPurchase::referralPurchaseUpdate($subscriptionDetails);
                } elseif ($totalTrailPlan == 1 && $totalPlan == 1) {
                    \Modules\Affiliate\Entities\ReferralPurchase::purchase($response);
                }
            }
            
            Session::flash('success', __('You have successfully subscribed to your desired plan.'));
            return redirect()->route('user.package');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->route('user.package');
        }
    }


    /**
     * Store credit data
     *
     * @param Request $request
     * @return redirect
     */
    public function storeCredit(Request $request)
    {
        $request['credit_id'] = $request->package_id;
        $credit = Credit::where(['status' => 'Active', 'id' => $request->credit_id])->firstOrFail();

        try {
            DB::beginTransaction();
            $price = $credit->price;
            
            $price -= $this->couponService->getDiscountAmount($request->package_id, auth()->user()->id, 'onetime');
            
            if ($price == 0) {
                $response = $this->subscriptionService->storeFreeCredit($credit);

                DB::commit();

                return redirect()->route('user.package')->withSuccess($response['message']);
            }

            $currency = Currency::find(preference('dflt_currency_id'))->name;

            request()->query->add(['payer' => 'user', 'to' => techEncrypt('credit.paid')]);

            $route = GatewayRedirect::paymentRoute(['package_id' => $request->credit_id, 'code' => 'onetime', 'user_id' => auth()->user()->id], $price, $currency, uniqid(rand(), true), $request, 'single');

            DB::commit();
            return redirect($route);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('user.package')->withErrors($response['message'] ?? $e->getMessage());
        }
    }

    /**
     * Credit paid
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function creditPaid(Request $request)
    {
        if (!checkRequestIntegrity()) {
            return redirect(GatewayRedirect::failedRedirect('integrity'));
        }

        try {
            $response = $this->subscriptionService->creditPaid($request);
            $this->memberPackageSessionSet();

            if (isActive('Affiliate')) {
                \Modules\Affiliate\Entities\ReferralPurchase::purchase($response);
            }
            
            Session::flash('success', __('You have successfully purchase the plan.'));
            return redirect()->route('user.package');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->route('user.package');
        }
    }
    
    /**
     * Checkout
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function checkout(Request $request, CouponService $service)
    {
        $service->forgetCache($request->package_id, auth()->user()->id);
        
        $data['plan'] = Package::find($request->package_id);
        $data['currency'] = Currency::getDefault();
        $data['price'] = 0;
        
        if (isset($request->billing_cycle) && in_array($request->billing_cycle, ['days', 'weekly', 'monthly', 'yearly', 'lifetime']) ) {
            $data['price'] = $data['plan'] && $data['plan']['discount_price'][$request->billing_cycle] ? formatCurrencyAmount($data['plan']['discount_price'][$request->billing_cycle]) : formatCurrencyAmount($data['plan']['sale_price'][$request->billing_cycle] ?? 0);
        } elseif (isset($request->billing_cycle) && $request->billing_cycle == 'onetime') {
            $credit = Credit::find($request->package_id);
            $data['price'] = $credit ? formatCurrencyAmount($credit->price) : 0;
            $data['plan'] = $credit;
        }
        
        
        return view('site.checkout', $data);
    }
    
    /**
     * Check and set coupon discount
     * 
     * @param Request $request
     * @param CouponService $service
     * @return array
     */
    public function checkCouponDiscount(Request $request, CouponService $service)
    {
        $coupon = $service->setAll($request->code, $request->package_id, auth()->user()->id, $request->billing_cycle);
        
        $couponResponse = $coupon->checkCouponValidity()->checkPlanValidity()->getResponse();
        
        if ($couponResponse['status'] == 'fail') {
            return $couponResponse + [
                'amount' => $coupon->getDiscountAmount(),
                'data' => $coupon->getDiscount()
            ];
        }
        
        return [
            'status' => 'success',
            'message' => __('Coupon applied successfully.'),
            'data' => $coupon->setDiscount()->getDiscount(),
            'amount' => $coupon->getDiscountAmount()
        ];
    }
    
    /**
     * Reset Discount
     * 
     * @param Request $request
     * @param CouponService $service
     * @return array
     */
    public function resetDiscount(Request $request, CouponService $service)
    {
        $coupon = $service->setAll(null, $request->package_id, auth()->user()->id, $request->billing_cycle);
        
        return $service->forgetCache($request->package_id, auth()->user()->id, $request->code)->getResponse() + [
            'amount' => $coupon->getDiscountAmount(),
            'data' => $coupon->getDiscount()
        ];
    }

    /**
     * Check Verification
     *
     * @return bool
     */
    public function c_p_c()
    {
        // if (!g_e_v()) {
        //     return true;
        // }
        // if (!g_c_v()) {
        //     try {
        //         $d_ = g_d();
        //         $e_ = g_e_v();
        //         $e_ = explode('.', $e_);
        //         $c_ = md5($d_ . $e_[1]);
        //         if ($e_[0] == $c_) {
        //             p_c_v();
        //             return false;
        //         }
        //         return true;
        //     } catch (\Exception $e) {
        //         return true;
        //     }
        // }
        return true;
    }   

    /**
     * Team member package session set
     *
     * @return void
     */
    public function memberPackageSessionSet()
    {
        $authData = auth()->user();
        $memberData = Team::getMember($authData->id);
        if (!empty($memberData)) {
            $currentPackage = session()->get('memberPackageData');
            if (!empty($currentPackage) && $currentPackage['packageUser']) {  
                TeamMemberMeta::updateTeamMemberMeta($memberData->id, 'packageUserId', $authData->id);
                $userData = ['packageUser' => $authData->id, 'packUserName' => $authData->name];
                session()->put('memberPackageData', $userData);
            }else {
                $insertMeta[] = [
                    'team_id' => $memberData->id,
                    'category'=> 'package',
                    'field'   => 'packageUserId',
                    'value'   => $authData->id,
                ];
                TeamMemberMeta::memberMetaInsert ($insertMeta);
                $userData = ['packageUser' => $authData->id, 'packUserName' => $authData->name];
                session()->put('memberPackageData', $userData);
            }
        }
        return false;
    }

    /**
     * Subscription plan with their feature info
     *
     * @return array
     */
    public function packages(){
        $packages = Package::getAll()->where('status', 'Active')->sortBy('sort_order');

        $prices = [];

        foreach ($packages as $package) {
            $prices[] = $package->sale_price;
        }

        /* border color  */
        $parentClass1 = "h-max lg:w-[30.33%] pricing-width w-full";
        $parentClass2 = "h-max lg:w-[30.33%] pricing-width w-full bg-white dark:bg-color-14 rounded-[30px] card-border";
        $childClass1 = "rounded-[30px] border border-color-89 dark:border-color-47 bg-white dark:bg-color-14 6xl:py-9 py-8 6xl:px-11 lg:px-5 px-8 sub-plan-rtl";
        $childClass2 = "6xl:py-9 py-8 6xl:px-11 lg:px-5 px-8 sub-plan-rtl";

        /* button color  */
        $buttonClass = "mt-[34px] text-white dark:text-color-14 text-16 font-semibold py-[13px] px-8 rounded-lg bg-color-14 dark:bg-white font-Figtree";

        /* button name  */
        $priceColor1= "text-48 font-bold break-all";
        $priceColor2= "text-48 font-bold heading-1 break-all";

        $allPackages= [];

        foreach( $packages as $package) {

            $allPackages[] = [
                'id' => $package->id,
                'name' => $package->name,
                'trial_day' => $package->trial_day,
                'sort_order' => $package->sort_order,
                'parent_class' => max($prices) == $package->sale_price ?  $parentClass2 : $parentClass1,
                'child_class' => max($prices) == $package->sale_price ?  $childClass2 : $childClass1,
                'price_color' => max($prices) == $package->sale_price ?  $priceColor2 : $priceColor1,
                'discount_price' => $package->discount_price,
                'sale_price' => $package->sale_price,
                'billing_cycle' => $package->billing_cycle,
                'duration' => $package->duration,
                'button' =>  $buttonClass,
                'features' => PackageService::editFeature($package, false),
            ];
        }

        $featureList = [];
        $mainFeature = [];
        $subFeature = [];
        foreach ($allPackages as $package) {
            foreach ($package['features'] as $feature) {
                if (isset($feature['value'])) {
                    $feature['values'][$package['name']] = $feature['value'];
                }

                if (array_key_exists($feature['title'], $featureList)) {
                    $featureList[$feature['title']]['feature'][] = $package['name'];

                    if (isset($feature['value'])) {
                        $featureList[$feature['title']]['values'][$package['name']] = $feature['value'];
                    }
                    
                    if (isset($featureList[$feature['title']]['is_value_fixed'])) {
                        $mainFeature[$feature['title']] = $featureList[$feature['title']];
                    } else {
                        $subFeature[$feature['title']] = $featureList[$feature['title']];
                    }

                    continue;
                }

                $featureList[$feature['title']] = $feature + ['feature' => [$package['name']]];
                
                if (isset($featureList[$feature['title']]['is_value_fixed'])) {
                    $mainFeature[$feature['title']] = $featureList[$feature['title']];
                } else {
                    $subFeature[$feature['title']] = $featureList[$feature['title']];
                }
            }
        }     
        
        $featureList = $mainFeature + $subFeature;

        $subscription = PackageSubscription::where('user_id', auth()->user()->id ?? 0)->first();

        return ['packages' => $allPackages, 'features' => $featureList, 'subscription' => $subscription];
    }
    
    /**
     * Available Billing Cycle 
     */
    private function billingCycle($packages)
    {
        $cycleList = [
            'lifetime' => __('Lifetime'),
            'yearly' => __('Yearly'),
            'monthly' => __('Monthly'),
            'weekly' => __('Weekly'),
            'days' => __('Days'),
        ];
        
        $cycles = [];
        
        foreach ($packages as $key => $package) {
            foreach ($package['billing_cycle'] as $billingKey => $value) {
                if ($value == 1) {
                    $cycles[$billingKey] = $cycleList[$billingKey];
                }
            }
        }
        
        // Sort the $cycles array based on the order of $cycle array
        uksort($cycles, function ($a, $b) use ($cycleList) {
            return array_search($a, array_keys($cycleList)) - array_search($b, array_keys($cycleList));
        });
        
        return $cycles;
    }
}
