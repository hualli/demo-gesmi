<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObraSocialRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|unique:obras_sociales,nombre,'. request('id'),
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El Nombre de la obra social es obligatorio',
            'nombre.unique' => 'Esa Obra Social ya esta registrada',
        ];
    }
}
