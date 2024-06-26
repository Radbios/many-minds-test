<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'email.required' => 'O campo "email" é obrigatório.',
            'email.email' => 'O campo "email" deve ser um email válido.',
            'password.required' => 'O campo "senha" é obrigatório.',
            // 'password.min' => 'O campo "senha" deve ter o mínimo de 8 caracteres.',
        ];
    }
}
