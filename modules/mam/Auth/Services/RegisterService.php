<?php

namespace mam\Auth\Services;

use mam\User\Models\User;

class RegisterService
{
    public function generateUser($request)
    {
        return User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->name)
        ]);
    }
}
