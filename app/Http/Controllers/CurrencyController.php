<?php
/**
 * @package CurrencyController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 08-08-2021
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\AjaxCurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * currency List
     * @param Request $request
     * @return json $data
     */
    public function findCurrencyAjaxQuery(Request $request)
    {
        $currencies = Currency::select('id', 'name')
            ->where('name', 'LIKE', "%{$request->q}%")
            ->limit(10)->get();

        return AjaxCurrencyResource::collection($currencies);
    }
}
