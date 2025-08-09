<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUser extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'],
            'is_admin' => ['required', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            // Nome
            'name.required' => 'O campo nome é obrigatório.',
            'name.string'   => 'O nome deve ser um texto válido.',
            'name.min'      => 'O nome deve ter no mínimo 3 caracteres.',
            'name.max'      => 'O nome pode ter no máximo 255 caracteres.',

            // Email
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email'    => 'Informe um endereço de e-mail válido.',
            'email.max'      => 'O e-mail pode ter no máximo 255 caracteres.',
            'email.unique'   => 'Já existe um usuário cadastrado com este e-mail.',

            // Senha
            'password.required'  => 'O campo senha é obrigatório.',
            'password.min'       => 'A senha deve ter no mínimo 6 caracteres.',
            'password.confirmed' => 'A confirmação da senha não confere.',

            // is_admin
            'is_admin.required' => 'O campo de perfil (administrador) é obrigatório.',
            // 'is_admin.boolean'  => 'O campo administrador deve ser verdadeiro ou falso.',
        ];
    }
}
