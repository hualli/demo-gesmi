<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaRequest extends FormRequest
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

    public function rules()
    {
        return [
            'usuario' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'usuario.required' => 'Error....Seleccione un medico'
        ];
    }
}
