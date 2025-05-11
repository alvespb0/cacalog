<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntregaRequest extends FormRequest
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
            #'cliente_id' => 'required|integer|exists:clientes,id', /* O certo para mim seria fazer a STORE com cliente_id, mas foi alterado para facilitar o processo e colocado cliente como string */
            'cliente' => 'required|string',
            'cep' => 'required|string',
            'conteudo_entrega' => 'required|string',
            'endereco' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'cliente_id.required' => 'O campo cliente é obrigatório.',
            'cliente_id.integer' => 'O campo cliente deve ser um número inteiro.',
            'cliente_id.exists' => 'O cliente selecionado não foi encontrado.',

            'cep.required' => 'O campo CEP é obrigatório.',
            'cep.string' => 'O campo CEP deve ser uma string.',

            'conteudo_entrega.required' => 'O conteúdo da entrega é obrigatório.',
            'conteudo_entrega.string' => 'O conteúdo da entrega deve ser uma string.',

            'endereco.required' => 'O endereço é obrigatório.',
            'endereco.string' => 'O endereço deve ser uma string.',

            'motoboy_id.required' => 'O campo motoboy é obrigatório.',
            'motoboy_id.integer' => 'O campo motoboy deve ser um número inteiro.',
            'motoboy_id.exists' => 'O motoboy selecionado não foi encontrado.',
        ];
    }

}
