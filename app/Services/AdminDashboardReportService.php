<?php

/**
* @package AdminDashboardReportService
* @author TechVillage <support@techvill.org>
* @contributor Muhammad AR Zihad <[zihad.techvill@gmail.com]>
* @contributor Al Mamun <[almamun.techvill@gmail.com]>
* @created 11-04-2022
*/

namespace App\Services;

use App\Traits\{ApiResponse, ReportHelperTrait};
use Illuminate\Support\Facades\DB;

use App\Models\{ User};

Use Modules\Subscription\Entities\{
    SubscriptionDetails,
    PackageSubscription
    };
Use Modules\OpenAI\Entities\{Archive, Content, Image, Code, Chat};

class AdminDashboardReportService
{
    use ApiResponse, ReportHelperTrait;

    /**
     * New users registered in last 30 days
     *
     * @param string|null $key
     * @return mixed
     */
    public function newUsersCount($key = 'newUsersCount', $returnSelf = true)
    {
        if ($key == '') {
            $key = 'newUsers';
        }

        $count = User::where('created_at', '>=', $this->offsetDate('-30'))
            ->where('status', 'Active')
            ->count();

        if ($returnSelf) {
            return $this->complete($count, $key);
        }

        $this->setReturn($count, $key);
        return $count;
    }

    /**
     * Compare new users count against last 30 days
     *
     * @param string|null $key
     * @return mixed
     */
    public function newUsersCompare($key = 'newUsersCompare')
    {
        $totalLastMonth = User::where('created_at', '>=', $this->offsetDate('-60'))->where('created_at', '<', $this->offsetDate('-30'))
            ->where('status', 'Active')
            ->count();
        $totalThisMonth = $this->getValue('newUsers') ??  $this->newUsersCount('', false);

        return $this->complete($this->growthRate($totalThisMonth, $totalLastMonth), $key);
    }

    /**
     * Calculates total Subscribers in this month
     *
     * @param string|null $key
     * @param bool $returnSelf
     * @return mixed
     */
    public function thisMonthSubscribersCount($key = 'thisMonthSubscribersCount', $returnSelf = true)
    {
        if ($key == '') {
            $key = 'thisMonthSubscribersCount';
        }
        $total = SubscriptionDetails::whereIn('status', ['Active', 'Expired'])->where('billing_date', '>=', $this->offsetDate("-30"))->count();

        return $this->complete($total, $key, $returnSelf);
    }

    /**
     * Compare this month Subscribers count against last month Subscribers count
     *
     * @param string|null $key
     * @return mixed
     */
    public function thisMonthSubscribersCompare($key = 'thisMonthSubscribersCompare')
    {
        $totalLastMonth = SubscriptionDetails::whereIn('status', ['Active', 'Expired'])->where('billing_date', '>=', $this->offsetDate('-60'))->where('billing_date', '<', $this->offsetDate('-30'))->count();
        $totalThisMonth = $this->getValue('thisMonthSubscribersCount') ?? $this->thisMonthSubscribersCount('', false);

        return $this->complete($this->growthRate($totalThisMonth, $totalLastMonth), $key);
    }


    /**
     * Get income of the month
     *
     * @param string|null $key
     * @return mixed
     */
    public function incomeThisMonth($key = 'incomeThisMonth', $returnSelf = true)
    {
        $key = $key ?? 'incomeThisMonth';
        $income = SubscriptionDetails::whereIn('status', ['Active', 'Expired', 'Cancel'])
            ->where('created_at', '>=', $this->offsetDate('-30'))
            ->sum('billing_price');

        return $this->complete($income, $key, $returnSelf);
    }

    /**
     * Compare income of the month
     *
     * @param string|null $key
     * @return mixed
     */
    public function incomeThisMonthCompare($key = 'incomeThisMonthCompare')
    {

        $totalLastMonth = SubscriptionDetails::whereIn('status', ['Active', 'Expired', 'Cancel'])->where('billing_date', '>=', $this->offsetDate('-60'))->where('billing_date', '<', $this->offsetDate('-30'))->sum('billing_price');
        $totalThisMonth = $this->getValue('incomeThisMonth') ?? $this->incomeThisMonth(null, false);

        return $this->complete($this->growthRate($totalThisMonth, $totalLastMonth), $key);
    }

    /**
     * Get total code generated of the month
     *
     * @param string|null $key
     * @return mixed
     */
    public function codeGeneratedThisMonth($key = 'codeGeneratedThisMonth', $returnSelf = true)
    {
        $key = $key ?? 'codeGeneratedThisMonth';
        $codeGenerated = Archive::where('created_at', '>=', $this->offsetDate('-30'))->where('type', 'code')->count();

        return $this->complete($codeGenerated, $key, $returnSelf);
    }

    /**
     * Compare code generated of the month
     *
     * @param string|null $key
     * @return mixed
     */
    public function codeGeneratedThisMonthCompare($key = 'codeGeneratedThisMonthCompare')
    {

        $totalLastMonth = Archive::where('created_at', '>=', $this->offsetDate('-60'))->where('created_at', '<', $this->offsetDate('-30'))->where('type', 'code')->count();
        $totalThisMonth = $this->getValue('codeGeneratedThisMonth') ?? $this->codeGeneratedThisMonth(null, false);

        return $this->complete($this->growthRate($totalThisMonth, $totalLastMonth), $key);
    }

    /**
     * Get word generated of the month
     *
     * @param string|null $key
     * @return mixed
     */
    public function wordGeneratedThisMonth($key = 'wordGeneratedThisMonth', $returnSelf = true)
    {
        $key = $key ?? 'wordGeneratedThisMonth';

        $content = Content::where('created_at', '>=', $this->offsetDate('-30'))->sum('words');
        $chat = Chat::where('created_at', '>=', $this->offsetDate('-30'))->sum('words');
        $code = Code::where('created_at', '>=', $this->offsetDate('-30'))->sum('words');
       
        $wordGenerated = $content + $chat + $code;
        
        return $this->complete($wordGenerated, $key, $returnSelf);
    }

    /**
     * Compare word generated of the month
     *
     * @param string|null $key
     * @return mixed
     */
    public function wordGeneratedThisMonthCompare($key = 'wordGeneratedThisMonthCompare')
    {

        $content = Content::where('created_at', '>=', $this->offsetDate('-60'))->where('created_at', '<', $this->offsetDate('-30'))->sum('words');
        $code = Code::where('created_at', '>=', $this->offsetDate('-60'))->where('created_at', '<', $this->offsetDate('-30'))->sum('words');
        $chat = Chat::where('created_at', '>=', $this->offsetDate('-60'))->where('created_at', '<', $this->offsetDate('-30'))->sum('words');

        $totalLastMonth =  $content + $code + $chat;
        $totalThisMonth = $this->getValue('wordGeneratedThisMonth') ?? $this->wordGeneratedThisMonth(null, false);

        return $this->complete($this->growthRate($totalThisMonth, $totalLastMonth), $key);
    }

    /**
     * Get image generated of the month
     *
     * @param string|null $key
     * @return mixed
     */
    public function imageGeneratedThisMonth($key = 'imageGeneratedThisMonth', $returnSelf = true)
    {
        $key = $key ?? 'imageGeneratedThisMonth';
        $imageGenerated = Image::where('created_at', '>=', $this->offsetDate('-30'))->count();

        return $this->complete($imageGenerated, $key, $returnSelf);
    }

    /**
     * Compare image generated of the month
     *
     * @param string|null $key
     * @return mixed
     */
    public function imageGeneratedThisMonthCompare($key = 'imageGeneratedThisMonthCompare')
    {

        $totalLastMonth = Image::where('created_at', '>=', $this->offsetDate('-60'))->where('created_at', '<', $this->offsetDate('-30'))->count();
        $totalThisMonth = $this->getValue('imageGeneratedThisMonth') ?? $this->imageGeneratedThisMonth(null, false);

        return $this->complete($this->growthRate($totalThisMonth, $totalLastMonth), $key);
    }

    /**
     * Get image generated of the month
     *
     * @param string|null $key
     * @return mixed
     */
    public function documentCreatedThisMonth($key = 'documentGeneratedThisMonth', $returnSelf = true)
    {
        $key = $key ?? 'documentCreatedThisMonth';
        $documentCreated = Archive::where('created_at', '>=', $this->offsetDate('-30'))->where('type', 'template')->count();

        return $this->complete($documentCreated, $key, $returnSelf);
    }

    /**
     * Compare image generated of the month
     *
     * @param string|null $key
     * @return mixed
     */
    public function documentCreatedThisMonthCompare($key = 'documentCreatedThisMonthCompare')
    {

        $totalLastMonth = Archive::where('created_at', '>=', $this->offsetDate('-60'))->where('created_at', '<', $this->offsetDate('-30'))->where('type', 'template')->count();
        $totalThisMonth = $this->getValue('documentCreatedThisMonth') ?? $this->documentCreatedThisMonth(null, false);

        return $this->complete($this->growthRate($totalThisMonth, $totalLastMonth), $key);
    }

    /**
     * Get transactions of the month
     *
     * @param string|null $key
     * @return mixed
     */
    public function transactionsThisMonth($key = 'transactionsThisMonth', $returnSelf = true)
    {
        $key = $key ?? 'transactionsThisMonth';
        $transactions = SubscriptionDetails::where(function ($query) {
            $query->where('status', 'Active')
                ->orWhere('status', 'Expired')
                ->orWhere('status', 'Cancel');
        })->where('created_at', '>=', $this->offsetDate('-30'))->count();

        return $this->complete($transactions, $key, $returnSelf);
    }

    /**
     * Compare transactions of the month
     *
     * @param string|null $key
     * @return mixed
     */
    public function transactionsThisMonthCompare($key = 'transactionsThisMonthCompare')
    {

        $totalLastMonth = SubscriptionDetails::whereIn('status', ['Active', 'Expired', 'Cancel'])->where('billing_date', '>=', $this->offsetDate('-60'))->where('billing_date', '<', $this->offsetDate('-30'))->count();
        $totalThisMonth = $this->getValue('transactionsThisMonth') ?? $this->transactionsThisMonth(null, false);

        return $this->complete($this->growthRate($totalThisMonth, $totalLastMonth), $key);
    }

     /**
     * Get sales comparison
     *
     * @param string|null $key
     * @return mixed
     */
    public function salesOfTheMonth($key = 'salesComparison')
    {
        $range = $this->getDay($this->offsetDate());
        $dates = range(1, 31);

        $currentMonth = $this->getMonth($this->offsetDate());
        $values[$currentMonth - 2] = array_fill(0, 31, 0);
        $values[$currentMonth - 1] = array_fill(0, 31, 0);
        $values[$currentMonth] = array_fill(0, $range - 1, 0);


        SubscriptionDetails::select('id', 'billing_date', DB::raw('sum(billing_price) as total'))
            ->whereIn('status', ['Active', 'Expired', 'Cancel'])
            ->where('payment_status', 'Paid')
            ->where('billing_date', '>=', $this->offsetDate('-' . 60 + $range - 1))
            ->where('billing_date', '<', $this->tomorrow())
            ->groupBy('billing_date')
            ->get()
            ->map(function ($sale) use (&$values, $currentMonth) {
                $month = $this->getMonth($sale->billing_date);
                if ($currentMonth < 3 && $month > 10) {
                    $month -= 12;
                }

                $values[$month][$this->getDay($sale->billing_date) - 1] = $sale->total;
            });

        return $this->complete([
            'dates' => $dates,
            'values' => $values,
            'thisMonth' => date('M Y')
        ], $key);
    }

    /**
     * Orders of different statuses
     *
     * @param string|null $key
     * @return mixed
     */
    public function newUsersWithCount($key = 'newRegisterUsers')
    {
        $data = [];
        User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->where('status', 'Active')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->get()
                    ->map(function ($user) use (&$data) {
                        $data['status'][] = $user->month_name;
                        $data['count'][] = $user->count;
                    });

        return $this->complete($data, $key);

    }

    /**
     * latest Registration
     *
     * @param string|null $key
     * @return mixed
     */
    public function latestRegistration($key = 'latestRegistration')
    {

        $user = User::take($this->getLimit())
                ->where('status', 'Active')
                ->orderByDesc('created_at')
                ->get()
                ->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->name,
                        'status' => $user->status,
                        'created_at' => formatDate($user->created_at),
                        'view' => route('users.edit', ['id' => $user->id]),
                    ];
                });

        return $this->complete($user , $key);
    }

    /**
     * latest Transaction
     *
     * @param string|null $key
     * @return mixed
     */
    public function latestTransaction($key = 'latestTransaction')
    {
        $data = SubscriptionDetails::with(['user' => function ($q){
            $q->select('id', 'name');
        }, 'package' => function($q) {
            $q->select('id', 'name as packageName');
        }, 'credit' => function($q) {
            $q->select('id', 'name as packageName');
        }])->whereIn('subscription_details.status', ['Active', 'Expired', 'Cancel'])->take($this->getLimit())
                ->groupBy('subscription_details.id')
                ->select(
                    'subscription_details.id as id',
                    'subscription_details.user_id',
                    'subscription_details.package_id',
                    'subscription_details.status as status',
                    'subscription_details.billing_price as price',
                    'subscription_details.created_at as date',
                )
                ->orderByDesc('subscription_details.created_at')
                ->get()
                ->map(function ($transaction) {
                    return [
                        'id' => $transaction->id,
                        'user_name' => $transaction?->user?->name,
                        'package_name' =>  $transaction?->package?->packageName ?? $transaction?->credit?->packageName,
                        'price' => formatNumber($transaction->price),
                        'status' =>  $transaction->status,
                        'date' => formatDate($transaction->date),
                    ];
                });
        return $this->complete($data , $key);
    }

    /**
     * Get Chat generated of the month
     *
     * @param string|null $key
     * @return mixed
     */
    public function chatGeneratedThisMonth($key = 'chatGeneratedThisMonth', $returnSelf = true)
    {
        $key = $key ?? 'chatGeneratedThisMonth';
        $chatGenerated = Chat::where('created_at', '>=', $this->offsetDate('-30'))->where('bot_id', '!=', NULL)->count();

        return $this->complete($chatGenerated, $key, $returnSelf);
    }

    /**
     * Compare chat generated of the month
     *
     * @param string|null $key
     * @return mixed
     */
    public function chatGeneratedThisMonthCompare($key = 'chatGeneratedThisMonthCompare')
    {

        $totalLastMonth = Chat::where('created_at', '>=', $this->offsetDate('-60'))->where('created_at', '<', $this->offsetDate('-30'))->count();
        $totalThisMonth = $this->getValue('chatGeneratedThisMonth') ?? $this->chatGeneratedThisMonth(null, false);

        return $this->complete($this->growthRate($totalThisMonth, $totalLastMonth), $key);
    }
}
