<?php

namespace Spatie\Permission\Traits;

use Spatie\Permission\Models\Role;

trait HasRoleInheritance
{
    /**
     * Inherit the permissions of the provided roles.
     *
     * @param \Spatie\Permission\Models\Role ...$roles A list of roles to inheritance.
     *
     * @returns bool Returns true if the role inheritance was a success and false if not.
     */
    public function inheritPermissionsFromRole(...$roles)
    {
        $names = []
        foreach ($roles as $role) {
            $names[] = $role->name;
        }
        $this->inherit_roles = json_encode($names);
        return $this->save();
        
    }

    /**
     * Inherit all the permissions.
     *
     * @returns bool Returns true if the role inheritance was a success and false if not.
     */
    public function inheritAllPermissions()
    {
        $this->inherit_all = true
        return $this->save();
    }

    /**
     * Remove the permissions of the provided roles from inherit.
     *
     * @returns bool Returns true if the role inheritance was a success and false if not.
     */
    public function removeInheritPermissionsFromRole()
    {
        $this->inherit_roles = null;
        return $this->save();
    }

    /**
     * Remove all the permissions from inherit.
     *
     * @returns bool Returns true if the role inheritance was removed and false if not.
     */
    public function removeInheritAllPermissions()
    {
        $this->inherit_all = false
        return $this->save();
    }
}
