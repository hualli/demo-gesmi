<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
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
            'apellido' => 'required',
            'nombre' => 'required',
            'dni_cuil_cuit' => 'required',
            'obrasocial_id' => 'required',
            'fecha_nacimiento'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'apellido.required' => 'El Apellido del Paciente es obligatorio',
            'nombre.required' => 'El Nombre del Paciente es obligatorio',
            'dni_cuil_cuit.required' => 'El Dni del Paciente es obligatorio',
            'obrasocial_id.required' => 'Seleccione Obra Social',
            'fecha_nacimiento.required' => 'Ingrese Fecha de Nacimiento',
        ];
    }
}
