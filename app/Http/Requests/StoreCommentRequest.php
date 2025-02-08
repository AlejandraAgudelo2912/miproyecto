<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'parent_id' => ['nullable', 'exists:comments,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
