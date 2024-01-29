<?php

namespace mam\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() === true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|min:3,min:200',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8'
        ];

        if(request()->method() === 'PUT' || request()->method() === 'PATCH'){
            $rules['email'] = ['required','email',Rule::unique('users','email')->ignore($this->user)];
        }

        return $rules;
    }
}
