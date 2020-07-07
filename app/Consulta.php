<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = "consultas";

    protected $fillable = [
      'fecha', 'coseguro', 'diagnostico', 'tratamiento', 'paciente_id', 'tipo_consulta_id', 'user_id'
    ];

    //Relacion con Paciente
    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    //Relacion con Tipo de Consulta
    public function tipo_consulta()
    {
        return $this->belongsTo('App\TipoConsulta');
    }

    //Relacion con el Usuario
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
