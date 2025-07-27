<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
