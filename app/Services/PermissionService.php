<?php
/**
 * @author TechVillage <support@techvill.org>
 *
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * 
 * @contributor Kabir Ahmed <[kabir.techvill@gmail.com]>
 *
 * @created 04-02-2024
 */
namespace App\Services;

use App\Models\Permission;
use App\Models\PermissionRole;

class PermissionService
{
    /**
     * Role ID for the admin role.
     */
    public const ADMIN_ROLE = 1;

    /**
     * Role ID for the customer role.
     */
    public const CUSTOMER_ROLE = 2;

    /**
     * @var int|null Stores the ID of the created permission.
     */
    private $permissionId = null;

    /**
     * @var string|null Stores the path of the controller associated with the permission.
     */
    private $controllerPath = null;

    /**
     * @var string|null Stores the name of the controller associated with the permission.
     */
    private $controllerName = null;

    /**
     * @var string|null Stores the name of the method associated with the permission.
     */
    private $methodName = null;

    /**
     * Role IDs associated with permissions to be assigned.
     *
     * @var array
     */
    private $permissionRoles = [];

    /**
     * Adds a permission based on the provided name.
     *
     * @param  string  $name  The permission name in the format 'ControllerPath@MethodName'.
     * @return $this
     */
    public function addPermission(string|array $name)
    {
        try {
            if (! is_array($name)) {
                $name = [$name];
            }

            foreach ($name as $value) {
                // Parses the provided permission name into controller path, controller name, and method name
                $this->parsePermissionName($value);
                // Checks if the permission already exists
                if (! $this->permissionExists($value)) {
                    // Creates a new permission if it doesn't exist
                    $this->createPermission([
                        'name' => $value,
                        'controller_path' => $this->controllerPath,
                        'controller_name' => $this->controllerName,
                        'method_name' => $this->methodName,
                    ]);
                }
            }
        } catch (\Exception $e) {
        } finally {
            return $this;
        }
    }

    /**
     * Assigns the permission to the vendor role.
     *
     * @return $this
     */
    public function assignToAdmin()
    {
        // Assigns the permission to the vendor role
        $this->assignPermissionToRole(self::ADMIN_ROLE);

        return $this;
    }

    /**
     * Assigns the permission to the customer role.
     *
     * @return $this
     */
    public function assignToCustomer()
    {
        // Assigns the permission to the customer role
        $this->assignPermissionToRole(self::CUSTOMER_ROLE);

        return $this;
    }

    /**
     * Parses the provided permission name into controller path, controller name, and method name.
     *
     * @param  string  $name  The permission name in the format 'ControllerPath@MethodName'.
     * @return void
     */
    private function parsePermissionName(string $name)
    {
        [$this->controllerPath, $this->methodName] = explode('@', $name);
        $this->controllerName = class_basename($this->controllerPath);
    }

    /**
     * Checks if a permission with the given name already exists.
     *
     * @param  string  $name  The permission name.
     * @return bool
     */
    private function permissionExists(string $name)
    {
        return Permission::where('name', $name)->exists();
    }

    /**
     * Creates a new permission with the provided data.
     *
     * @param  array  $data  The data for creating the permission.
     * @return void
     */
    private function createPermission(array $data)
    {
        // Inserts a new permission and retrieves its ID
        $this->permissionId = Permission::insertGetId($data);
    }

    /**
     * Assigns the permission to a specific role.
     *
     * @param  int  $roleId  The role ID to which the permission should be assigned.
     * @return void
     */
    private function assignPermissionToRole(int $roleId)
    {
        // Checks if a permission has been created
        if (! is_null($this->permissionId)) {
            // Inserts a new record linking the permission to the specified role
            $this->permissionRoles[] = [
                'permission_id' => $this->permissionId,
                'role_id' => $roleId,
            ];
        }
    }

    /**
     * Destructor method that automatically runs when the object is destroyed.
     * Inserts permission role records if the $permissionRoles array is not empty.
     */
    public function __destruct()
    {
        // Check if there are permission roles to be assigned
        if (! empty($this->permissionRoles)) {
            // Insert permission role records into the database
            PermissionRole::insert($this->permissionRoles);
        }
    }
}