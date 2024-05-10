<?php

namespace mam\Advertising\Policies;

use mam\Role\Models\Permission;
use mam\User\Models\User;

class AdvertisingPolicy
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
        if ($user->hasPermissionTo(Permission::PERMISSION_ADVERTISING)) {
            return true;
        }
    }
}
