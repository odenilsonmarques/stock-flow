<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
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
            'supplier_id' => ['required'],
            'name' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL0-9\s]+$/u'], //o parametro a expresssao (regex) no lugar da (alpha), pois o regex aceita somente letrar e espaços, a alpha nao aceita espaços
            'product_number' => ['required', 'string', 'unique:products'],
            // 'quantity' => ['required', 'integer', 'min:1','regex:/^\d+$/'],
            // 'confirm_quantity' => ['required', 'integer', 'min:1', 'same:quantity','regex:/^\d+$/'],
            'minimum_quantity' => ['required', 'integer', 'min:1','regex:/^\d+$/'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages()
    {
        return [
            'supplier_id.required' => 'O campo fornecedor é obrigatório',

            'name.required' => 'O campo produto é obrigatório',
            'name.min' => 'O campo produto deve ter no mínimo 3 caractres',
            'name.max' => 'O campo produto deve ter no maximo 255 caractres',
            'name.alpha' => 'O campo produto deve conter apenas letras',
            'name.regex' => 'O campo produto deve conter apenas letras e números.',


            // 'quantity.required' => 'O campo quantidade é obrigatório',
            // 'quantity.integer' => 'O campo quantidade deve ser um número inteiro',
            // 'quantity.regex' => 'O campo quantidade só aceita números inteiros',
            // 'quantity.min' => 'O campo quantidade deve ter no mínimo 1 valor',

            // 'confirm_quantity.required' => 'O campo confirme a quantidade é obrigatório',
            // 'confirm_quantity.integer' => 'O campo confirme a quantidade deve ser um número inteiro',
            // 'confirm_quantity.regex' => 'O campo confirme a quantidade só aceita números inteiros',
            // 'confirm_quantity' => 'O campo confirme a quantidade deve ter no mínimo 1 valor',
            // 'confirm_quantity' => 'O campo confirme a quantidade deve ser igual à quantidade',

            'minimum_quantity.required' => 'O campo quantidade minima é obrigatório',
            'minimum_quantity.integer' => 'O campo quantidade minima deve ser um número inteiro',
            'minimum_quantity.regex' => 'O campo quantidade minima só aceita números inteiros',
            'minimum_quantity' => 'O campo quantidade minima deve ter no mínimo 1 valor',
            'minimum_quantity.lte' => 'O campo quantidade minima deve ser menor ou igual à quantidade',

            'product_number.required' => 'O campo código do produto é obrigatório',
            'product_number.unique' => 'O código do produto informado já está cadastrado',

            'description.max' => 'O campo descrição deve ter no máximo 1000 caracteres',

        ];
    }
}
