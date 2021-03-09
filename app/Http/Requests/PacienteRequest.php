<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'apellido' => 'required',
            'nombre' => 'required',
            'dni_cuil_cuit' => 'required|unique:Pacientes,dni_cuil_cuit,'. request('id'),
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
            'dni_cuil_cuit.unique' => 'El Dni ya esta registrado en otro usuario',
            'obrasocial_id.required' => 'Seleccione Obra Social',
            'fecha_nacimiento.required' => 'Ingrese Fecha de Nacimiento',
        ];
    }
}
