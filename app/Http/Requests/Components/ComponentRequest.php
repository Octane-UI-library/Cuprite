<?php

namespace App\Http\Requests\Components;

use Illuminate\Foundation\Http\FormRequest;

class ComponentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'code_html' => 'nullable|string',
            'code_vue' => 'nullable|string',
            'code_react' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
