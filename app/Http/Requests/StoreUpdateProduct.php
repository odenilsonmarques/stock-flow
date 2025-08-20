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
            'name' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL0-9\s]+$/u'],
            'product_number' => ['required', 'string', 'unique:products'],
            'minimum_quantity' => ['required', 'integer', 'min:1', 'regex:/^\d+$/'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'O campo produto é obrigatório',
            'name.min' => 'O campo produto deve ter no mínimo 3 caractres',
            'name.max' => 'O campo produto deve ter no maximo 255 caractres',
            'name.alpha' => 'O campo produto deve conter apenas letras',
            'name.regex' => 'O campo produto deve conter apenas letras e números.',

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
