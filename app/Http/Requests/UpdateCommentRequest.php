<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'body' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
