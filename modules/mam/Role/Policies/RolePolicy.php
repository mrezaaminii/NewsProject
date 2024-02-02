<?php

namespace mam\Role\Policies;

use mam\Role\Models\Permission;
use mam\User\Models\User;

class RolePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function index(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_ROLES)){
            return true;
        }
    }
}
