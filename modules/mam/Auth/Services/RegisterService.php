<?php

namespace mam\Auth\Services;

use Illuminate\Support\Facades\Hash;
use mam\User\Models\User;

class RegisterService
{
    public function generateUser($request)
    {
        return User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }
}
