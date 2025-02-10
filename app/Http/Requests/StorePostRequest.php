<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'published_at' => 'required',
            'category_id' => 'required | exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
