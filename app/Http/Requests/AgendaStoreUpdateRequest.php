<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaStoreUpdateRequest extends FormRequest
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
            'grupo_id' => ['required'],
            'data_inicial' => ['required'],
            'data_final' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'grupo_id.required' => 'O campo grupo é obrigatório',
            'data_inicial.required' => 'O campo data da Vacinação.',
            'data_final.required' => 'O campo data final da vacinação',
        ];
    }
}
