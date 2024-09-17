<?php

/**
 * @package UserActivityDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Soumik Datta <soumik.techvill@gmail.com>
 * @created 15-11-2022
 */

namespace App\DataTables;

use App\DataTables\DataTable;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use App\Traits\ModelTraits\{Filterable, FormatDateTime};


class UserActivityDataTable extends DataTable
{
    use Filterable, FormatDateTime;

    /**
     * Properties Array
     *
     * @var array
     */
    protected $propertiesArray = [];

    /*
    * DataTable Ajax
    *
    * @return JsonResponse
    */
    public function ajax(): JsonResponse
    {
        $activities = $this->query();

        return DataTables::eloquent($activities)
            ->addColumn('log_name', function ($activity) {
                return str_replace('USER ', '', $activity->log_name);
            })
            ->addColumn('description', function ($activity) {
                return $activity->description;
            })
            ->addColumn('browser', function ($activity) {
                $this->propertiesArray = json_decode($activity->properties, true);
                return $this->propertiesArray['browser'] . ' ' . $this->propertiesArray['browser_version'];
            })
            ->addColumn('platform', function($activity) {
                return $this->propertiesArray['platform'];
            })
            ->addColumn('ip', function($activity) {
                return $this->propertiesArray['ip_address'];
            })
            ->addColumn('created_at', function ($activity) {
                return $this->formatDateTime($activity->created_at);
            })
            ->rawColumns(['log_name', 'description', 'browser', 'platform', 'ip', 'created_at'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return QueryBuilder
    */
    public function query(): QueryBuilder
    {
        $activities = Activity::query()
            ->where('log_name', 'LIKE', '%user%')
            ->where('causer_id', '=', Auth::id());

        if (count(request()->query()) > 0) {
            $activities = $this->scopeFilter($activities, 'App\\Filters\\UserActivityLogFilter');
        }

        return $this->applyScopes($activities);
    }

    /*
    * DataTable HTML
    *
    * @return HtmlBuilder
    */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->addColumn(['data' => 'log_name', 'name' => 'log_name', 'title' => __('Type'), 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'description', 'name' => 'description', 'title' => __('Description'), 'orderable' => false])
            ->addColumn(['data' => 'browser', 'name' => 'browser', 'title' => __('Browser'), 'orderable' => false])
            ->addColumn(['data' => 'platform', 'name' => 'platform', 'title' => __('Platform'), 'orderable' => false, 'width' => '5%'])
            ->addColumn(['data' => 'ip', 'name' => 'ip', 'title' => __('IP'), 'orderable' => false])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created at'), 'orderable' => false])
            ->parameters(dataTableOptions());
    }
}
