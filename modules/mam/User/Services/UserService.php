<?php

namespace mam\User\Services;

class UserService
{
    public function assignOperation($role,$user)
    {
        return $user->assignRole($role);
    }

    public function removeAssignedRoleOperation($role,$user)
    {
        return $user->removeRole($role);
    }
}
