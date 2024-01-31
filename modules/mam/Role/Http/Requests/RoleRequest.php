<?php

namespace mam\Role\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:200|unique:roles,name',
            'permissions.*' => 'required|exists:permissions,name'
        ];
        if (request()->method() === 'PUT' || request()->method() === 'PATCH') {
            $rules['name'] = ['required','string','min:2','max:200',Rule::unique('roles','name')->ignore($this->role)];
            $rules['permissions.*'] = 'required|exists:permissions,name';
        }
        return $rules;
    }
}
