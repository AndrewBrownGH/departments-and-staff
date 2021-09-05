<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class StoreDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:departments|min:2',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = new Response([
            'success' => false,
            'errors' => $validator->errors()->get('name'),
        ]);

        throw new ValidationException($validator, $response);
    }
}
