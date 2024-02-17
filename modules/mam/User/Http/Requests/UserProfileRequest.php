<?php

namespace mam\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserProfileRequest extends FormRequest
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
        return [
            'name' => ['required','string','min:2','max:190',Rule::unique('users','name')->ignore($this->user)],
            'email' => ['required','email','min:2','max:190',Rule::unique('users','email')->ignore($this->user)],
            'password' => ['nullable',Password::min(8)->letters()->numbers()->uncompromised()],
            'image' => 'nullable|image|mimes:png,jpeg,jpg|max:2048',
            'linkedin' => ['nullable',Rule::unique('users','linkedin')->ignore($this->user)],
            'telegram' => ['nullable',Rule::unique('users','telegram')->ignore($this->user)],
            'instagram' => ['nullable',Rule::unique('users','instagram')->ignore($this->user)],
            'twitter' => ['nullable',Rule::unique('users','twitter')->ignore($this->user)],
            'bio' => 'nullable|string'
        ];
    }
}
