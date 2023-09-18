<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'unique:colors,name,', 'max:255'],
        ];

        if ($this->isMethod('PUT')) {
            $rules = [
                'name' => 'required', 'unique:colors,name,' . $this->colorId . 'max:255',

            ];
        }
        return $rules;
    }
}
