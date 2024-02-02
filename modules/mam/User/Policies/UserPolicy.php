<?php

namespace mam\User\Policies;

use mam\Role\Models\Permission;
use mam\User\Models\User;

class UserPolicy
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
        if ($user->hasPermissionTo(Permission::PERMISSION_USERS)){
            return true;
        }
    }
}
