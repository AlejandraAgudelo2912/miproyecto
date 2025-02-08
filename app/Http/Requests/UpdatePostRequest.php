<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
                'title' => 'required',
                'body' => 'required',
                'published_at' => 'required',
                'category_id' => 'required | exists:categories,id',
            ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
