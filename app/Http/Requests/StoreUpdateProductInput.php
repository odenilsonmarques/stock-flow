<?php

namespace App\Http\Requests;

use App\Models\Supplier;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductInput extends FormRequest
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
            'supplier_id' => ['required'],
            'quantity_input' => ['required', 'integer', 'min:1', 'regex:/^\d+$/'],
            'invoice_number' => ['nullable', 'string', 'max:255', 'unique:product_inputs'],
            'date_input' => ['required', 'date']
        ];
    }


    public function messages()
    {
        return [
            'product_id.required' => 'O campo produto é obrigatório',
            'supplier_id.required' => 'O campo fornecedor é obrigatório',
            'quantity_input.required' => 'O campo quantidade é obrigatório',
            'quantity_input.integer' => 'O campo quantidade deve ser um número inteiro',
            'quantity_input.min' => 'O campo quantidade deve ser pelo menos 1',
            'quantity_input.regex' => 'O campo quantidade deve conter apenas números',
            'invoice_number.string' => 'O campo número da nota pode conter apenas caracteres alfanuméricos',
            'invoice_number.max' => 'O campo número da nota deve ter no máximo 255 caracteres',
            'invoice_number.unique' => 'O número da nota já existe na base de dados',
            'date_input.required' => 'O campo data é obrigatório',
            'date_input.date' => 'O campo data deve ser uma data válida',
        ];
    }
}
