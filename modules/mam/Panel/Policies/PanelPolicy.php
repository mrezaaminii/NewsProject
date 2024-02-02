<?php

namespace mam\Panel\Policies;

use mam\Role\Models\Permission;
use mam\User\Models\User;

class PanelPolicy
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
        if ($user->hasPermissionTo(Permission::PERMISSION_CATEGORIES)){
            return true;
        }
    }
}
