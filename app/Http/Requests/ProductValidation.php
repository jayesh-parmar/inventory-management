<?php

namespace App\Http\Requests;

use App\Enums\StatusEnum;
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
            'size_id' => ['nullable', 'string', 'exists:sizes,id'],
            'status' => ['required', 'string', Rule::in(StatusEnum::values(), 'boolean')],
            'category_ids' => ['required','array'],
            'category_ids.*' => ['string', 'exists:categories,id'],
        ];
    }
}