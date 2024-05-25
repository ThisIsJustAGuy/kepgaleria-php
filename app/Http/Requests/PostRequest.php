<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', Rule::unique('posts', 'title')->ignore($this->route('post')?->id)],
            'description' => ['nullable', 'max:1000'],
//            'delete-image' => ['nullable', 'boolean'],
        ];
    }
}
