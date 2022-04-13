<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteStoreUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => ['required'],
            'cpf' => ['required'],
            'nascimento' => ['required'],
            'telefone1' => ['required'],
            'cep' => ['required'],
            'logradouro' => ['required'],
            'numero' => ['required'],
            'bairro' => ['required'],
            'cidade' => ['required'],
            'uf' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'nascimento.required' => 'O campo nascimento é obrigatório',
            'telefone1.required' => 'O campo WhatsApp é obrigatório',
            'cep.required' => 'O campo cep é obrigatório',
            'logradouro.required' => 'O campo logradouro é obrigatório',
            'numero.required' => 'O campo número é obrigatório',
            'bairro.required' => 'O campo bairro é obrigatório',
            'cidade.required' => 'O campo cidade é obrigatório',
            'uf.required' => 'O campo uf é obrigatório',
        ];
    }
}
