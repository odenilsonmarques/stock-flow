<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;

use Illuminate\validation\Validator;

class StoreUpdateProductOutPut extends FormRequest
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
            'product_id' => ['required'],
            'quantity_output' => ['required', 'integer', 'min:1', 'regex:/^\d+$/'],
            'destiny' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'responsible_for_receiving' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s]+$/u'],
        ];
    }



    /**
     * Configure the validator instance.
     * Este método é usado para adicionar regras de validação adicionais após as regras básicas terem sido aplicadas.
     * Aqui, verificamos se a quantidade solicitada é maior que a quantidade disponível do produto
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $productId = $this->input('product_id');
            $requestedQuantity = $this->input('quantity_output');

            $product = Product::find($productId);

            if ($product && $requestedQuantity > $product->quantity) {
                $validator->errors()->add('quantity_output', "Quantidade indisponível. Disponível: {$product->quantity}");
            }
        });
    }


    public function messages()
    {
        return [
            'product_id.required' => 'O campo produto é obrigatório',

            'quantity_output.required' => 'O campo quantidade de saída é obrigatório',
            'quantity_output.integer' => 'O campo quantidade de saída deve ser um número',
            'quantity_output.regex' => 'O campo quantidade de saída só aceita números',
            'quantity_output.min' => 'O campo quantidade de saída deve ter no mínimo 1 valor',

            'destiny.required' => 'O campo destino é obrigatório',
            'destiny.min' => 'O campo destino deve ter no mínimo 3 caractres',
            'destiny.max' => 'O campo destino deve ter no maximo 255 caractres',
            'destiny.regex' => 'O campo destino deve conter apenas letras.',

            'responsible_for_receiving.required' => 'O campo responsável pelo recebimento é obrigatório',
            'responsible_for_receiving.min' => 'O campo responsável pelo recebimento deve ter no mínimo 3 caractres',
            'responsible_for_receiving.max' => 'O campo responsável pelo recebimento deve ter no maximo 255 caractres',
            'responsible_for_receiving.regex' => 'O campo responsável pelo recebimento deve conter apenas letras.',
        ];
    }
}
