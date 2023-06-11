<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeaturedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // 'exists:categories,id' means 'exists in categories table, id column
            'description' => 'required|string',
            'number' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'status' => 'nullable'
        ];
    }
}
