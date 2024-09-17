<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth, DB;

Use App\Models\User;
use Modules\OpenAI\Entities\{
    Archive,
    Content,
    Code,
    Image,
    UseCase,
    Chat
};

use App\Traits\ReportHelperTrait;
use Modules\Coupon\Http\Models\Coupon;
use Modules\Subscription\Entities\{
    PackageSubscription,
    PackageSubscriptionMeta,
};


class DashboardController extends Controller
{
    use ReportHelperTrait;

    /**
     * User dashboard page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {

        $auth = Auth::user();
        $user = User::where('status', 'Active');
        $id = [ $auth->id ];
        // dd($auth->id);

        // if ($auth->role()->type === 'admin') {
        //     $id = $user->get()->pluck('id');
        // } else {
        //     $id = [ $auth->id ];
        // }

        $allDocuments = Archive::with('useCase', 'metas')->where(['type' => 'template'])->whereHas('metas', function ($q) {
            $q->where('key', 'template_creator_id')->where('value', auth()->id());
        })->latest();
        $data['totalDocument'] = $allDocuments->count();
        $data['documents'] = $allDocuments->take(6)->get();
        $allImages = Image::whereIn('user_id', $id)->latest();
        $data['totalImage'] = $allImages->count();
        $data['images'] = $allImages->take(4)->get();

        $data['code'] =  Archive::with('metas')->where(['type' => 'code_chat_reply'])->whereHas('metas', function ($q) {
            $q->where('key', 'code_creator_id')->where('value', auth()->id());
        })->latest();
        $data['totalCode'] = $data['code']->count();


        $favouriteUseCases = $user->where('id', $auth->id)->first()->use_case_favorites;
        $data['mostPopularUseCases'] = UseCase::whereIn('id', $favouriteUseCases)->take(4)->get();

        $data['subscription'] = PackageSubscription::with(['package'])->where('user_id', $auth->id)->first();

        if ($data['subscription'] != NULL) {

            $subscriptionMeta = PackageSubscriptionMeta::where('package_subscription_id', $data['subscription']->id)->where('type','feature_word')->get();
            $data['creditLimit'] = $subscriptionMeta->where('key', 'value')->first()->value;
            $data['creditUsed'] = $subscriptionMeta->where('key', 'usage')->first()->value;
            $data['creditPercentage'] = $data['creditLimit'] == 0 ? 0 : round((($data['creditLimit']  - $data['creditUsed']) * 100) / $data['creditLimit'] );

        }

        $range = $this->getDay($this->offsetDate());
        $lastDate = date('t'); //Current Month
        $dates = range(1, $lastDate);

        $currentMonth = $this->getMonth($this->offsetDate());

        $data['dates'] = json_encode($dates);
   
        $data['documentReport'] = $this->documentReport($id, $lastDate, $range, $currentMonth);
        $data['imageReport'] = $this->imageReport($id, $lastDate, $range, $currentMonth);
        $data['codeReport'] = $this->codeReport($id, $lastDate, $range, $currentMonth);
        $data['chatReport'] = $this->chatReport($id, $lastDate, $range, $currentMonth);

        $data['currentMonth'] = date('M Y');
        
        $data['coupons'] = Coupon::with('plans')->where(['status' => 'Active', 'is_private' => 0])->where('end_date', '>=', date('Y/m/d'))->get();
        // dd(view('user.dashboard'));

        return view('user.dashboard', $data);
    }

    /**
     * Documents Report
     *
     * @param array $id
     * @param string $lastDate
     * @param int $range
     * @param string $currentMonth
     * @return string|bool
     */
    public function documentReport($id, $lastDate, $range, $currentMonth) {

        $contents[$currentMonth] = array_fill(0, $lastDate, 0);

        $results = Archive::select(DB::raw('DATE(created_at) as newDate'), DB::raw('count(id) as total'))
        ->where('type', 'template_chat_reply')
        ->whereHas('metas', function ($q) {
            $q->where('key', 'template_creator_id')
              ->where('value', auth()->id());
        })
        ->where('created_at', '>=', $this->offsetDate('-' . $range - 1))
        ->where('created_at', '<', $this->tomorrow())
        ->groupBy('newDate')
        ->get();

        $results->map(function ($query) use (&$codes, $currentMonth) {
            $codes[$currentMonth][$this->getDay($query->date1) - 1] = $query->total;
        });

        return json_encode($contents[$currentMonth], JSON_NUMERIC_CHECK);

    }

    /**
     * Images Report
     * @param array $id
     * @param string $lastDate
     * @param int $range
     * @param string $currentMonth
     * @return string|bool
     */
    public function imageReport($id, $lastDate, $range, $currentMonth) {

        $images[$currentMonth] = array_fill(0, $lastDate, 0);

        Image::select('id', DB::raw('DATE(created_at) as date'), DB::raw('count(user_id) as total'))
        ->whereIn('user_id', $id)
        ->where('created_at', '>=', $this->offsetDate('-' . $range - 1))
        ->where('created_at', '<', $this->tomorrow())
        ->groupBy('date')
        ->get()
        ->map(function ($query) use (&$images, $currentMonth) {
            $images[$currentMonth][$this->getDay($query->date) - 1] = $query->total;
        });

        return json_encode($images[$currentMonth], JSON_NUMERIC_CHECK);
    }

    /**
     * Codes Report
     *
     * @param array $id
     * @param string $lastDate
     * @param int $range
     * @param string $currentMonth
     * @return string|bool
     */
    public function codeReport($id, $lastDate, $range, $currentMonth) {

        $codes[$currentMonth] = array_fill(0, $lastDate, 0);
        $results = Archive::select(DB::raw('DATE(created_at) as date1'), DB::raw('count(id) as total'))
        ->where('type', 'code_chat_reply')
        ->whereHas('metas', function ($q) {
            $q->where('key', 'code_creator_id')
              ->where('value', auth()->id());
        })
        ->where('created_at', '>=', $this->offsetDate('-' . $range - 1))
        ->where('created_at', '<', $this->tomorrow())
        ->groupBy('date1')
        ->get();

        $results->map(function ($query) use (&$codes, $currentMonth) {
            $codes[$currentMonth][$this->getDay($query->date1) - 1] = $query->total;
        });

        return json_encode($codes[$currentMonth], JSON_NUMERIC_CHECK);
    }

     /**
     * Chat Report
     *
     * @param array $id
     * @param string $lastDate
     * @param int $range
     * @param string $currentMonth
     * @return string|bool
     */
    public function chatReport($id, $lastDate, $range, $currentMonth) {

        $chats[$currentMonth] = array_fill(0, $lastDate, 0);

        Chat::select('id', DB::raw('DATE(created_at) as date'), DB::raw('count(user_id) as total'))
        ->whereIn('user_id', $id)
        ->where('created_at', '>=', $this->offsetDate('-' . $range - 1))
        ->where('created_at', '<', $this->tomorrow())
        ->groupBy('date')
        ->get()
        ->map(function ($query) use (&$chats, $currentMonth) {
            $chats[$currentMonth][$this->getDay($query->date) - 1] = $query->total;
        });

        return json_encode($chats[$currentMonth], JSON_NUMERIC_CHECK);

    }

}
