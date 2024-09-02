<?php

namespace App\Http\Controllers;

use App\CodeSchool;
use App\Resume;
use App\User;
use App\UserManager;
use Carbon\Carbon;
use App\Services\CmpApi;
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
        $this->domain = env('PC_DOMAIN');
        $this->secret = env('PC_SECRET');
        ///$this->um = new UserManager($this->domain, $this->secret);
        $this->cmp = new CmpApi();
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
        $userInfo = $this->cmp->getCustomer($user->customer_id);
        $subscription = $this->cmp->getSubscription($user->subscription_id);
        $subscription_passed = 'active';
        $orders = $this->cmp->getOrders($user->subscription_id);
        if($subscription->data->status != "success"){
            $subscription_passed = 'not_active';
        }
        $CodeSchool = new CodeSchool();
        $codeSchoolUrl = $CodeSchool->authenticateUser();
        // opens texts folder
        $orders = $this->cmp->getOrders($user->subscription_id);
        $products = Product::all();
        $tags = Tag::all();
        $productTags = ProductTag::all()->unique('tag_id');
        return view('pages.products')->with(['user' => $userInfo, 'user_id' => $user->id, 'orders' => $orders, 'subscription_passed' => $subscription_passed, 'subscription' => $subscription, 'url' => $codeSchoolUrl, 'products' => $products, 'productTags' => $productTags, 'tags' => $tags]);

    }

    public function courseTopics(Request $request, $id)
    {
        $course = Course::find($id);
        if (!$course) {
            return redirect('/courses');
        }
        $topics = Topics::with('subTopics')->where('course_id', $id)->get();

        return view('pages.topics')->with([
            'course' => $course,
            'topics' => $topics
        ]);

    }

    public function courseSubTopics(Request $request, $id)
    {
        $topics = Topics::find($id);
        if (!$topics) {
            return redirect('/topics');
        }
        $subtopics = SubTopic::where('topic_id', $id)->get();

        return view('pages.subtopics')->with([
            'topics' => $topics,
            'subtopics' => $subtopics

        ]);

    }

    public function courseSubTopicsDetail(Request $request, $id)
    {
        $subtopics = SubTopic::find($id);
        if (!$subtopics) {
            return redirect('/topics');
        }
        return view('pages.subtopicsdetail')->with([
            'subtopics' => $subtopics

        ]);

    }


//    public function userPerformance(Request $request)
//    {
//        $subtopic_id = $request->get('subtopic_id');
//        $subTopics = SubTopic::find($subtopic_id);
//        if (!$subTopics) {
//            return redirect('/courses');
//        }
//
//        $user = auth()->user();
//        $userPerformance = new UserPerformance();
//        $userPerformance->subtopic_id = $subTopics->id;
//        $userPerformance->user_id = $user->id;
//        $userPerformance->save();
//
//        return Redirect::route('course.topics', $subTopics->course_id);
//    }


    public function coursePractice(Request $request, $id)
    {
       $subtopic = SubTopic::find($id);

       if(!$subtopic) {
            return redirect('/topics');
       }

        $sub_id = auth()->user()->subscription_id;
        $concept_id = config('app.api_xyz')['key'];
        $subtopic_id = $subtopic->id;
        $concept_name = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? request()->getHost(): '127.0.0.1:8000';
        $url = $subtopic->practice_url.'?sub_id='.$sub_id.'&concept_id='.$concept_id.'&topic_id='.$subtopic_id.'&concept_domain='.$concept_name;

        return response()->json([
            'status' => 'success',
            'url' => $url,
        ]);
    }



    /**
     * Profile method, return what user see when login
     */
    public function profile(Request $request){

        $user = auth()->user();
        $userInfo = $this->cmp->getCustomer($user->customer_id);
        $subscription = $this->cmp->getSubscription($user->subscription_id);
        $subscription_passed = 'active';
        $orders = $this->cmp->getOrders($user->subscription_id);
        if($subscription->data->status != "active"){
            $subscription_passed = 'not_active';
        }
        // opens texts folder
        $orders = $this->cmp->getOrders($user->subscription_id);
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
        $userData = $this->cmp->getCustomer($logged_user->customer_id);
        $request->offsetUnset('_token');
        $user = $request->all();
        $user['current_email'] = $userData->data->email;
        $user['subscription_id'] = $logged_user->subscription_id;
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

        return redirect('/courses?password=changed')->with('success', 'Password changed');
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
        if(strtolower($canceled_subscription->status) == 'canceled'){
            return redirect('/profile')->with('success', 'Subscription canceled');
        }else if(strtolower($canceled_subscription->message) == 'you cannot cancel a demo account.'){
            return redirect('/profile')->withErrors(['error' => 'You cannot cancel a demo user.']);
        }else{
            return redirect('/profile')->withErrors(['error' => 'Something went wrong. Please try later or contact our support team.']);
        }

    }

    public function showSubscriptions(){
        $logged_user = auth()->user();
        $orders = $this->um->getOrders($logged_user);
        return view('subscriptions')->with('orders',$orders);
    }

    public function getOrder(Request $request)
    {
        $order = $this->cmp->getOrder($request->orderId);
        return new Response($order->data);
    }

}
