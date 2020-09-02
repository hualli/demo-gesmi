<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = "pacientes";

    protected $fillable = [
      'nombre', 'apellido', 'dni_cuil_cuit', 'fecha_nacimiento', 'domicilio', 'telefono_fijo', 'telefono_celular', 'email', 'plan', 'numero_afiliado', 'estado', 'obrasocial_id'
    ];

    //Relacion con Obra Social
    public function obrasocial()
    {
        return $this->belongsTo('App\ObraSocial');
    }

    //Relacion con Consultas
    public function consultas()
    {
        return $this->hasMany('App\Consulta');
    }

    //Relacion con Turnos
    public function turnos()
    {
        return $this->hasMany('App\Turno');
    }
}
