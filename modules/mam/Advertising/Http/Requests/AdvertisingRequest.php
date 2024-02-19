<?php

namespace mam\Advertising\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use mam\Advertising\Models\Advertising;

class AdvertisingRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|string|min:3',
            'title' => 'required|string|min:3|max:255',
            'location' => ['required','string',Rule::in(Advertising::$locations)]
        ];

        if (request()->method() === 'PATCH' || request()->method() === 'PUT') {
            $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png|max:2048';
        }

        return $rules;
    }
}
