<?php
/**
 * @package DataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Millat <[millat.techvill@gmail.com]>
 * @created 07-09-2021
 */
namespace App\DataTables;

use Yajra\DataTables\Services\DataTable as BaseDataTable;
use App\Models\Permission;
use App\Models\Preference;
use Auth;

class DataTable extends BaseDataTable
{
    /*
     * Permissions
     *
     * @var array
     */
    public $prms;

    /**
     * addtitional data
     *
     * @var array
     */
    public $data = [];

    /**
     * Preference
     *
     * @var array
     */
    public $preference;

    /*
    * DataTable Construct
    *
    * @return void
    */
    public function __construct()
    {
        $this->prms = Permission::getAuthUserPermission(optional(Auth::user())->id);
        $this->preference = preference();
    }

    /*
    * Has Permission
    *
    * @param array $permissions
    * @return bool
    */
    public function hasPermission(array $permissions) :bool
    {

        if ( !is_array($permissions) || !is_array($this->prms)) {
            return false;
        }

        return (array_intersect($permissions, $this->prms)) ? true : false;
    }

    /*
     * Render the DataTable
     *
     * @param string $view
     * @param array $data
     * @param array $mergeData
     * @return mixed
     */
    public function render(?string $view = null, array $data = [], array $mergeData = [])
    {
        $this->setViewData();

        $mergedData = array_merge($this->data, $data);

        return parent::render($view, $mergedData, $mergeData);
    }

    /*
     * Set Additional Data
     * To be implemented in child classes
     */
    protected function setViewData()
    {
        // To be implemented in child classes
    }
}
