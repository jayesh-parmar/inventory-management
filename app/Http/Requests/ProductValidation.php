<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductValidation extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', Rule::unique('products')->ignore($this->product)],
            'brand_id' => ['required', 'string', 'exists:brands,id'],
            'color_id' => ['nullable', 'string', 'exists:colors,id'],
            'size_id' => ['string', 'nullable', 'exists:sizes,id'],
            'status' => ['boolean'],
        ];
    }
}