<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'unique:sizes,name,', 'max:255'],
        ];

        if ($this->isMethod('PUT')) {
            $rules = [
                'name' => 'required', 'unique:sizes,name,' . $this->sizeId . 'max:255',

            ];
        }
        return $rules;
    }
}
