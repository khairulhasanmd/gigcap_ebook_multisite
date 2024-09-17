<?php
/**
 * @package EmailTemplateListDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Sabbir Al-Razi <[sabbir.techvill@gmail.com]>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 20-05-2021
 * @modified 04-10-2021
 */

namespace App\DataTables;

use App\DataTables\DataTable;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;
use App\Models\EmailTemplate;


class EmailTemplateListDataTable extends DataTable
{
    /*
    * DataTable Ajax
    *
    * @return JsonResponse
    */
    public function ajax(): JsonResponse
    {
        $templates = $this->query();

        return DataTables::eloquent($templates)
            ->addColumn('name', function ($templates) {
                return isset($templates->name) ? "<a href='". route('emailTemplates.edit', ['id' => $templates->id]) ."'>" . $templates->name . "</a>": '';
            })
            ->addColumn('created_at', function ($brands) {
                return $brands->format_created_at;
            })
            ->addColumn('status', function ($templates) {
                return statusBadges(lcfirst($templates->status));
            })
            ->addColumn('action', function ($templates) {
                $edit = '<a title="' . __('Edit') . '" href="'. route('emailTemplates.edit', ['id' => $templates->id]) .'" class="btn btn-xs btn-primary"><i class="feather icon-edit"></i></a>&nbsp;';
                $str = '';

                if ($this->hasPermission(['App\Http\Controllers\MailTemplateController@edit'])) {
                    $str .= $edit;
                }

                return $str;
            })
            ->rawColumns(['name', 'subject', 'status', 'slug', 'action'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return QueryBuilder
    */
    public function query(): QueryBuilder
    {
        $templates = EmailTemplate::query();
        if ($templates) {
            $templates = $templates->whereNull('parent_id');
        }
        
        return $this->applyScopes($templates);
    }

    /*
    * DataTable HTML
    *
    * @return HtmlBuilder
    */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => __('Name')])
            ->addColumn(['data' => 'slug', 'name' => 'slug', 'title' => __('Slug')])
            ->addColumn(['data' => 'subject', 'name' => 'subject', 'title' => __('Subject')])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status')])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created at')])
            ->addColumn(['data'=> 'action', 'name' => 'action', 'title' => __('Action'), 'width' => '5%',
                'visible' => $this->hasPermission(['App\Http\Controllers\MailTemplateController@edit', 'App\Http\Controllers\MailTemplateController@destroy']),
                'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }
}
