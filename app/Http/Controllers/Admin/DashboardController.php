<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\GlobalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Rc;
use App\Models\TransactionFiltered;
use App\Models\AffiliateTransaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardController extends GlobalController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        // $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.index');
    }




}
