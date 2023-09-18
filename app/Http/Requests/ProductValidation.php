<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'max:255', Rule::unique('products')->ignore($this->productId, 'name')],
            'brand_id' => ['required', 'max:255'],
            'color_id' => ['required', 'max:255'],
            'size_id' => ['required', 'max:255'],
            'status' => ['required', 'max:255'],
        ];
        return $rules;

    }
}
