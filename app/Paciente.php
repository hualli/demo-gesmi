<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = "pacientes";

    protected $fillable = [
      'nombre', 'apellido', 'fecha_nacimiento', 'domicilio', 'telefono_fijo', 'telefono_celular','estado', 'obrasocial_id'
    ];

    //Relacion con Obra Social
    public function obrasocial()
    {
        return $this->belongsTo('App\ObraSocial');
    }
}
