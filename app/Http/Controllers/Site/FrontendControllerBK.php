<?php

namespace App\Http\Controllers\Site;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;
use Modules\OpenAI\Entities\UseCase;
use Modules\OpenAI\Services\ContentService;
use Modules\Subscription\Entities\{Credit, Package, PackageSubscription};
use Modules\Subscription\Services\PackageService;
use App\Http\Controllers\GlobalController;
use Modules\Blog\Http\Models\Blog;
use App\Services\CmpApi;
use MetricaloClientSdkCrm\CrmApi;

class FrontendController extends GlobalController
{

    public $crmApi;
    public $cmp;

    public function __construct()
    {
        parent::__construct();
        $this->crmApi = new CrmApi(env('CRM_API_URL'), $this->concept->crm_api_key);
        $this->cmp = new CmpApi($this->concept);
    }

    /**
     * Site public home page
     */
    public function index(): View
    {
        $data = $this->packages();
        $data['billingCycles'] = $this->billingCycle($data['packages']);
        $data['credits'] = Credit::whereNot('type', 'default')->activeStatus()->sortOrder()->get();
        $data['blogs'] = Blog::with(['user', 'objectImage'])->whereHas('blogCategory', function ($query) {
            $query->where('status', 'Active');
        })->where(['status' => 'Active'])->whereYear('created_at' , now()->year)->orderBy('id', 'DESC')->get();

        $data['homeService'] = $homeService = new \Modules\CMS\Service\HomepageService;
        $data['page'] = $homeService->home();

        if (isActive('Affiliate')) {
            \Modules\Affiliate\Entities\Referral::userClickUpdate();
        }
        
        return view('site.home.index', $data);
    }

    /**
     * Site publicly visible use cases
     */
    public function useCases(): View
    {
        $data['useCaseCategories'] = ContentService::useCaseCategories();
        $data['useCase'] = UseCase::count();

        return view('site.use-cases', $data);
    }

    /**
     * Site publicly visible privacy policies
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function privacyPolicy(): View
    {
        return view('site.privacy-policy');
    }

    /**
     * Package Pricing
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function pricing(): View
    {
        $data = $this->packages();
        $data['billingCycles'] = $this->billingCycle($data['packages']);
        
        $data['credits'] = Credit::whereNot('type', 'default')->activeStatus()->sortOrder()->get();

        if (isActive('Affiliate')) {
            \Modules\Affiliate\Entities\Referral::userClickUpdate();
        }
        
        return view('site.pricing', $data);
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


