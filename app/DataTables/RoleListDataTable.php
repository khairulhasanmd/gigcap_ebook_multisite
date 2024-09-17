<?php
/**
 * @package RoleListDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Sabbir Al-Razi <[sabbir.techvill@gmail.com]>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 20-05-2021
 * @modified 04-10-2021
 */

namespace App\DataTables;

use App\Models\Role;
use App\DataTables\DataTable;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;

class RoleListDataTable extends DataTable
{
    /*
    * DataTable Ajax
    *
    * @return JsonResponse
    */
    public function ajax(): JsonResponse
    {
        $roles = $this->query();

        return DataTables::eloquent($roles)
            ->addColumn('created_at', function ($roles) {
                return $roles->format_created_at;
            })
            ->addColumn('name', function ($roles) {
                return wrapIt($roles->name, 20, ['columns' => 2]);
            })
            ->addColumn('description', function ($roles) {
                return wrapIt($roles->description, 30, ['columns' => 2]);
            })
            ->addColumn('action', function ($roles) {
                $edit = '<a title="' . __('Edit') . '" href="'. route('roles.edit', ['id' => $roles->id]) .'" class="btn btn-xs btn-primary"><i class="feather icon-edit"></i></a>&nbsp;';
                $delete = '<form method="post" action="'. route('roles.destroy', ['id' => $roles->id]) .'" id="delete-role-'. $roles->id .'" accept-charset="UTF-8" class="display_inline">
                        ' . csrf_field() . '
                        ' . method_field('delete') . '
                        <button title="' . __('Delete') . '" class="btn btn-xs btn-danger confirm-delete" type="button" data-id=' . $roles->id . ' data-label="Delete" data-delete="role" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-title="' . __('Delete :x', ['x' => __('Role')]) . '" data-message="' . __('Are you sure to delete this?') . '">
                        <i class="feather icon-trash-2"></i>
                        </button>
                        </form>';
                $str = '';

                if ($this->hasPermission(['App\Http\Controllers\RoleController@edit'])) {
                    $str .= $edit;
                }

                if ($this->hasPermission(['App\Http\Controllers\RoleController@destroy']) && !in_array($roles->slug, defaultRoles())) {
                    $str .= $delete;
                }

                return $str;
            })
            ->rawColumns(['name', 'description', 'type', 'action'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return QueryBuilder
    */
    public function query(): QueryBuilder
    {
        $roles = Role::all();

        return $this->applyScopes($roles->toQuery());
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
            ->addColumn(['data' => 'description', 'name' => 'description', 'title' => __('Description')])
            ->addColumn(['data' => 'type', 'name' => 'type', 'title' => __('Type')])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created at')])
            ->addColumn([
                'data'=> 'action', 'name' => 'action', 'title' => __('Action'), 'width' => '10%',
                'visible' => $this->hasPermission(['App\Http\Controllers\RoleController@edit', 'App\Http\Controllers\RoleController@destroy']),
                'orderable' => false, 'searchable' => false])
            ->parameters(dataTableOptions());
    }
}
