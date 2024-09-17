<?php
/**
 * @package RoleController
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 07-03-2023
 */

namespace App\Http\Controllers;

use App\DataTables\RoleListDataTable;
use App\Models\Role;
use App\Services\RoleService;
use App\Http\Requests\Admin\Role\{
    StoreRoleRequest, UpdateRoleRequest
};

class RoleController extends Controller
{
    private $service;

    /**
     * Constructor for Role
     *
     * @param RoleService $service
     * @return void
     */
    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    /**
     * Role List
     *
     * @param  RoleListDataTable $dataTable
     * @return \Illuminate\Contracts\View\View
     */
    public function index(RoleListDataTable $dataTable)
    {
        $data['listMenu'] = 'role';

        return $dataTable->render('admin.roles.index', $data);
    }

    /**
     * Create
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $data['listMenu'] = 'role';
        
        return view('admin.roles.create', $data);
    }

    /**
     * Store Role
     *
     * @param StoreRoleRequest $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(StoreRoleRequest $request)
    {
        $response = $this->service->store($request->validated());
        $this->setSessionValue($response);

        return to_route('roles.index');
    }

    /**
     * Edit Role
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $data['listMenu'] = 'role';
        $data['roles'] = Role::find($id);

        if (!$data['roles']) {
            return to_route('roles.index')->withFail(__('The :x does not exist.', ['x' => __('Role')]));
        }

        return view('admin.roles.edit', $data);
    }

    /**
     * Update Role
     *
     * @param UpdateRoleRequest $request
     * @param int $id
     * @return \Illuminate\Routing\Redirector
     */
    public function update(UpdateRoleRequest $request, int $id)
    {
        $response = $this->service->update($request->validated(), $id);
        $this->setSessionValue($response);

        return to_route('roles.index');
    }

    /**
     * Delete Role
     *
     * @param int $id
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(int $id)
    {
        $response = $this->service->delete($id);
        $this->setSessionValue($response);

        return to_route('roles.index');
    }
}
