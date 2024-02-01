<?php

namespace mam\User\Services;

class UserService
{
    public function assignOperation($role,$user)
    {
        return $user->assignRole($role);
    }
}
