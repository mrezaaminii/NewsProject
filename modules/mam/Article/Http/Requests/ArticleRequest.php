<?php

namespace mam\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use mam\Article\Models\Article;

class ArticleRequest extends FormRequest
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
            'title' => 'required|min:3|max:200|string|unique:articles,title',
            'user_id' => 'required|numeric|exists:users,id',
            'category_id' => 'required|numeric|exists:categories,id',
            'time_to_read' => 'required|numeric',
            'keywords' => 'nullable|min:3|max:255',
            'description' => 'nullable|min:3',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'score' => 'required|numeric|in:0,1,2,3,4,5,6,7,8,9,10',
            'status' => ['required',Rule::in(Article::$statuses)],
            'type' => ['required',Rule::in(Article::$types)],
            'body' => 'required|min:3|string'
        ];

        if (request()->method() === 'PUT' || request()->method() === 'PATCH'){
            $rules['title'] = ['required','min:3','max:200','string',Rule::unique('articles','title')->ignore($this->article)];
            $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png|max:2048';
        }
        return $rules;
    }

    public function attributes()
    {
        return [
          'user_id' => 'کاربر',
          'time_to_read' => 'زمان خواندن',
        ];
    }
}
