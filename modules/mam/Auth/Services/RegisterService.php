<?php

namespace mam\Auth\Services;

use mam\User\Models\User;
use Illuminate\Support\Facades\Hash;

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
