<?php

namespace App\Http\Controllers;

use App\Models\CodeSchool;
use App\Models\Resume;
use App\Models\User;
use App\Models\UserManager;
use Carbon\Models\Carbon;
use App\Services\CmpApi;
use App\Services\ProductEbook;
use App\Models\Admin\Product;
use App\Models\Admin\Tag;
use App\Models\Admin\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use App\Models\Concept;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public $um;
    protected $secret;
    protected $domain;

    public function __construct()
    {

        $this->middleware('auth');
        $domain = url()->current();
        $this->domain = parse_url($domain)['host'];
        $this->concept = Concept::where('domain_name', $this->domain)->first();
        $this->api_url = env('CRM_API_URL');
        // dd($this->concept);

        ///$this->um = new UserManager($this->domain, $this->secret);
        $this->cmp = new CmpApi($this->concept);
    }

    /**
     * Profile method, return what user see when login
     */
    // public function home(Request $request){

    //     $user = auth()->user();
    //     $userInfo = $this->um->getCustomer($user);
    //     $subscription = $this->um->getSubscription($user);
    //     $subscription_passed = 'active';
    //     $orders = $this->um->getOrders($user);
    //     if($subscription->status != "active"){
    //         $subscription_passed = 'not_active';
    //     }
    //     $CodeSchool = new CodeSchool();
    //     $codeSchoolUrl = $CodeSchool->authenticateUser();
    //     // opens texts folder
    //     $orders = $this->um->getOrders($user);
    //     return view('pages.home')->with([ 'user' => $userInfo, 'user_id' => $user->id, 'orders' => $orders, 'subscription_passed' => $subscription_passed, 'subscription' => $subscription, 'url' => $codeSchoolUrl]);
    // }

    public function products(Request $request){

        $user = auth()->user();
         //dd($user->customer_id);
        $userInfo = $this->cmp->getCustomer($user->customer_id);
        $subscription = $this->cmp->getSubscription($user->subscription_id);
        // dd($subscription);
        $subscription_passed = 'active';
        $orders = $this->cmp->getOrders($user->subscription_id);
	//dd($subscription);
        if($subscription->data->status != "success"){
            $subscription_passed = 'not_active';
        }
        $CodeSchool = new CodeSchool();
        $codeSchoolUrl = $CodeSchool->authenticateUser();
        // opens texts folder
        $orders = $this->cmp->getOrders($user->subscription_id);
        $tag = $request->get('tag');
        if (isset($tag) && !empty($tag)) {
            $tagId = Tag::where('name', $tag)->first();
            $productId = ProductTag::with('products')->where('tag_id', $tagId->id)->orderBy('created_at', 'desc')->paginate(12);
            $products = [];
            foreach ($productId as $product_id) {
                $products[] = Product::find($product_id->product_id);
            }
        } else {
            $products = Product::orderBy('created_at', 'desc')->paginate(12);
        }

        $tags = Tag::all();

        $productTags = ProductTag::all()->unique('tag_id');
        // dd($this->concept->template);
        $articles = '';
        if ($request->ajax()) {
            $productEbook = new ProductEbook();
            foreach ($products as $product) {
                $articles.='<div class="col-lg-4 col-md-6 col-xxl-3 mix box-item '.$productEbook->getTags($product->productTags).'">
                                <div class="mx-box">
                                    <div class="mix-img mb-3"><img src="images/'.$product->image.'" alt="responsive-web-design">

                                        <div class="effect d-flex justify-content-center align-items-center">
                                            <div class="preview text-center pe-2">
                                                <a href="products/'.$product->id.'"><i class="fas fa-download"></i><span>Download</span></a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mix-content d-flex justify-content-center align-items-start">
                                        <div class="theme-info ps-2">
                                            <h4 style="margin-top:9px;" data-toggle="tooltip" data-placement="bottom" title="'.$product->product_name.'">'.substr($product->product_name, 0, 25).'</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }
            return $articles;
            //return $articles;
        }
        // dd($products);
        return view('templates.'.$this->concept->template.'.pages.products')->with(['user' => $userInfo, 'user_id' => $user->id, 'orders' => $orders, 'subscription_passed' => $subscription_passed, 'subscription' => $subscription, 'url' => $codeSchoolUrl, 'products' => $products, 'productTags' => $productTags, 'tags' => $tags]);

    }

    




    public function productsDownload($product_id) {
        $user = auth()->user();
        $product = Product::find($product_id);
        if(!$user || !$product || !$product->pdf_url) {
            return redirect('/products');
        }
        $fileNameArr = explode('?', basename($product->pdf_url));
        $mediaName = $fileNameArr[0];
        $downloadFile = $product->pdf_url;

        header('content-type: application/octet-stream');
        header('Content-disposition: attachment; filename="' . $mediaName . '"');
        header('Pragma: no-cache');
        header('Expires: 0');
        readfile($downloadFile);
        exit();
        return true;
    }

    /**
     * Profile method, return what user see when login
     */
    // public function profile(Request $request){

    //     $user = auth()->user();
    //     $userInfo = $this->cmp->getCustomer($user->customer_id);
    //     $subscription = $this->cmp->getSubscription($user->subscription_id);
        
    //     $subscription_passed = 'active';
    //     $orders = $this->cmp->getOrders($user->subscription_id);
    //     // dd($subscription);
    //     if($subscription->data->status != "active"){
    //         $subscription_passed = 'not_active';
    //     }
    //     // opens texts folder
    //     $orders = $this->cmp->getOrders($user->subscription_id);
    //     return view('pages.profile')->with([ 'user' => $userInfo, 'orders' => $orders, 'subscription_passed' => $subscription_passed, 'subscription' => $subscription]);
    // }

    public function profile(Request $request){

        $user = auth()->user();
        // dd($user);
        
        $userInfo = $this->cmp->getCustomer($user->customer_id);
        $subscription = $this->cmp->getSubscription($user->subscription_id);
        

        $subscription_passed = 'active';
       
            $orders = $this->cmp->getOrders($user->subscription_id);
            
            if($subscription->data->status != "active"){
               

            $subscription_passed = 'not_active';
        }
       
        $orders = $this->cmp->getOrders($subscription->data->customer_id);
        return view('pages.profile')->with([ 'user' => $userInfo, 'orders' => $orders, 'subscription_passed' => $subscription_passed, 'subscription' => $subscription]);
    }

    public function updateProfile(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $logged_user = auth()->user();
        // dd($logged_user);
        
        $userData = $this->cmp->getCustomer($logged_user->customer_id);
        $request->offsetUnset('_token');
        $user = $request->all();
        $user['current_email'] = $userData->data->email;
        $user['subscription_id'] = $logged_user->subscription_id;
        $user['customer_id'] = $logged_user->customer_id;
        // dd($user);
        $userInfo = $this->cmp->updateCustomer($user);
       
        if($userInfo->status == 'success'){
            return Redirect::back()->with('success', 'Profile updated!');
        }else{
            return Redirect::back()->withErrors(['error' => 'Something went wrong. Please try later']);
        }
    }

    public function changePassword(){
        return view('pages.change-password');
    }

    public function saveChangePassword(Request $request){
        $logged_user = auth()->user();
        if($request->password != $request->password_confirmation){
            return redirect()->back()->withErrors(['error' => 'New password is not repeated twice']);
        }
        $logged_user->password = Hash::make($request->password);
        $logged_user->plain_password = $request->password;
        $logged_user->update();

        return redirect('/profile')->with('success', 'Password changed');
    }

    public function cancelMembership(){
        $user = auth()->user();
        $userInfo = $this->cmp->getCustomer($user->customer_id);
        $subscription = $this->cmp->getSubscription($user->subscription_id);
        $subscription_passed = 'active';
        $orders = $this->cmp->getOrders($user->subscription_id);
        if($subscription->data->status != "active"){
            $subscription_passed = 'not_active';
        }
        return view('pages.cancel-membership')->with([ 'user' => $userInfo, 'orders' => $orders, 'subscription_passed' => $subscription_passed, 'subscription' => $subscription]);;
    }

    public function cancelSubscription(){

        $logged_user = auth()->user();
        $canceled_subscription = $this->cmp->cancelSubscription($logged_user->subscription_id);
        
        if(strtolower($canceled_subscription->status) == 'success'){
            return redirect('/profile')->with('success', $canceled_subscription->data);
        }else if(strtolower($canceled_subscription->status) == 'error'){
            return redirect('/profile')->withErrors(['error' => $canceled_subscription->errors]);
        }else{
            return redirect('/profile')->withErrors(['error' => 'Something went wrong. Please try later or contact our support team.']);
        }
    }

    public function showSubscriptions(){
        $logged_user = auth()->user();
        $orders = $this->cmp->getOrders($logged_user);
        return view('subscriptions')->with('orders',$orders);
    }

    public function getOrder(Request $request)
    {
        $order = $this->cmp->getOrder($request->orderId);
        // dd($order);
        return new Response($order);
    }

}
