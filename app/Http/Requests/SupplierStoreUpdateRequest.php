<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierStoreUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required'],
            'cnpj' => ['required']
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo "nome" é obrigatório.',
            'cnpj.required' => 'O campo "CNPJ" é obrigatório.',
        ];
    }
}
