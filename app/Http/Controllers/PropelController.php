<?php


namespace App\Http\Controllers;
use App\CodeSchool;
use App\Mail\ForgotPasswordMail;
use App\UserManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use App\User;

class PropelController extends Controller
{
    protected $domain;
    protected $secret;

    public function __construct()
    {

    }

    public function postSubscriptionSuccessAction(Request $request)
    {

        $this->domain = env('PC_DOMAIN');
        $this->secret = env('PC_SECRET');
       // dd($request);
        if ($request->apikey != getenv('API_KEY') && $request->apikey != 'NDQyNmY3NjM3MWMxNjc4NzJhNjc3Yzg2MzEzZTA4ZTc4MDIyM2RkMA') {
            throw new BadRequestHttpException('IC Key');
        }
        $subscription_id    = isset($request->subscription_id) ? $request->subscription_id : $request->post('subscription_id');
        $customer_id        = isset($request->customer_id) ? $request->customer_id : $request->post('customer_id');
        $email              = isset($request->email) ? $request->email : $request->post('email');
        $first_name         = isset($request->first_name) ? $request->first_name : $request->post('first_name');
        $last_name          = isset($request->last_name) ? $request->last_name : $request->post('last_name');
        $country_code       = isset($request->country) ? $request->country : $request->post('country');
        $campaign_id        = isset($request->campaign_id) ? $request->campaign_id : $request->post('campaign_id');
        $subscription_name  = isset($request->subscription_name) ? $request->subscription_name : $request->post('subscription_name');

        $send_credentials = isset($request->send_login_credentials) ? $request->send_login_credentials : $request->post('send_login_credentials');
        //dd($subscription_id);
        if (empty($subscription_id) || empty($email)){
            throw new BadRequestHttpException('M-ID');
        }

        // ASSUME EMAIL IS SAME IN BOTH SYSTEMS
        $userRepo = new User();
        $user = $userRepo->where('email',$email)->first();
        $response = [];

        // If email not exists, create user, with data from service
        if (!$user) {
            $um = new UserManager($this->domain, $this->secret);

            $old_user = $userRepo->where('email',$email)->first();

            if ($old_user) {
                die('old user');
                // TODO figure something here
            }
            $username = $um->generateValidUsername($first_name, $last_name);

            $full_name = $first_name . ' ' . $last_name;

            $password = UserManager::randomKey(rand(10, 20));

            $user = new User();
            $user->email = $email;
            $user->name = $first_name." ".$last_name;
            $user->email_canonical = strtolower($email);
            $user->username = $username;
            $user->username_canonical = strtolower($username);
            $user->plain_password = $password;
            $user->country_code = $country_code;
            $user->role = 'ROLE_SUBSCRIBER';
            $user->enabled = 1;
            $user->campaign_id = $campaign_id;
            $encryptedPassword = Hash::make($password);
            $user->password = $encryptedPassword;

            $blogUsername = $username.rand(0, 2000);
            $CodeSchool = new CodeSchool(env('IM_LABEL'), env('IM_APIKEY'));
            $createBlogUsername = strtolower($blogUsername);

            $createBlogUsername = preg_replace('/[^\00-\255]+/u', '', $createBlogUsername);
            $createBlogUser = $CodeSchool->createUser($createBlogUsername, $email, $createBlogUsername);
            if($createBlogUser){
                $user->blog_creator_nickname = $createBlogUsername;
                $user->blog_creator_password = $createBlogUsername;
            }else{
                $createBlogUsername = $createBlogUsername.'-'.rand(0,2000);
                $CodeSchool->createUser($createBlogUsername, $email, $createBlogUsername);
                $user->blog_creator_nickname = $createBlogUsername;
                $user->blog_creator_password = $createBlogUsername;
            }
            //$user->generateOneTimeLoginToken();

            /*
            if (isset($campaign_id) && in_array($campaign_id, $this->container->getParameter('front_campaign_ids'))) {
                $um = $this->get('user_manager');
                $response['instant_login'] = $um->getInstantLoginURL($user);
            }
            */

            if ($send_credentials) {
                try {
                    $um->sendWelcomeMail($user, $password,'', $subscription_id);
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
            }
        }
        $user->subscription_id = $subscription_id;
        $user->customer_id = $customer_id;
        $user->save();

        return ['status' => 'success', 'data' => $response];
    }

    public function sendForgotPassword(Request $request){
        $user = User::where('email', $request->email)->first();
        $password = UserManager::randomKey(rand(10, 20));
        $user->plain_password = $password;
        $user->password = Hash::make($password);
        $user->save();
        Mail::to($request->email)->send(new ForgotPasswordMail($user, $password));
        return redirect('login');
    }

    public function forgotPassword(){
        return view('forgot-password');
    }
}
