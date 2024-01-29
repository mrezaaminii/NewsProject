<?php

namespace mam\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use mam\Category\Model\Category;

class CategoryRequest extends FormRequest
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
        'title' => 'required|min:3|string|unique:categories,title',
        'description' => 'nullable|min:3',
        'keyword' => 'nullable|min:3|max:255',
        'status' => ['required',Rule::in(Category::$statuses)],
        'parent_id' => 'nullable|exists:categories,id',
        ];

        if(request()->method() === 'PUT' || request()->method() === 'PATCH'){
            $rules['title'] = ['required','min:3','string',Rule::unique('categories','title')->ignore($this->category)];
        }

        return $rules;
    }
}
