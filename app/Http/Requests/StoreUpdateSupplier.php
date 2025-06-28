<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSupplier extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        #esse valor por padrão vem false, mas como não vamos trabalhar com acl nessse projeto, é melhor usar o true
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
            'name' => ['required', 'string', 'min:3', 'max:255', 'unique:suppliers'],
            'type_supplier' => ['required', 'string'],
            'cpf_cnpj' => ['required', 'string', 'unique:suppliers'],
            'phone' => ['required', 'string', 'unique:suppliers'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:suppliers'],
            'zip_code' => ['nullable', 'string', 'max:8'],
            'address' => ['required', 'string','max:225'],
            'number' => ['nullable', 'string', 'max:5'],
            'district' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:100'],
            'state' => ['required', 'string', 'max:100'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no maximo 255 caracteres',
            'name.unique' => 'Já existe um fornecedor cadastrado com esse nome',
            'type_supplier.required' => 'O campo tipo de fornecedor é obrigatório',
            'cpf_cnpj.required' => 'O campo CPF/CNPJ é obrigatório',
            'cpf_cnpj.unique' => 'Já existe um fornecedor cadastrado com esse CPF/CNPJ',
            'cpf_cnpj.min' => 'O campo CPF/CNPJ deve ter no mínimo 11 caracteres',
            'cpf_cnpj.max' => 'O campo CPF/CNPJ deve ter no máximo 14 caracteres',
            'phone.required' => 'O campo telefone é obrigatório',
            'phone.unique' => 'Já existe um fornecedor cadastrado com esse telefone',
            'phone.min' => 'O campo telefone deve ter no mínimo 10 caracteres',
            'phone.max' => 'O campo telefone deve ter no máximo 15 caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ser um endereço de email válido',
            'email.max' => 'O campo email deve ter no máximo 255 caracteres',
            'email.unique' => 'Já existe um fornecedor cadastrado com esse email',
            'zip_code.max' => 'O campo CEP deve ter no máximo 8 caracteres',
            'address.required' => 'O campo endereço é obrigatório',
            'address.max' => 'O campo endereço deve ter no máximo 225 caracteres',
            'number.max' => 'O campo número deve ter no máximo 5 caracteres',
            'district.required' => 'O campo bairro é obrigatório',
            'district.max' => 'O campo bairro deve ter no máximo 100 caracteres',
            'city.required' => 'O campo cidade é obrigatório',
            'city.max' => 'O campo cidade deve ter no máximo 100 caracteres',
            'state.required' => 'O campo estado é obrigatório',
            'state.max' => 'O campo estado deve ter no máximo 100 caracteres',
        ];
    }
}
