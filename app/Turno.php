<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
  protected $table = "turnos";

  protected $fillable = [
    'estado', 'fecha', 'coseguro', 'motivo_consulta', 'tipo_consulta_id', 'paciente_id', 'user_id'
  ];


  //Relacion con el Usuario
  public function user()
  {
      return $this->belongsTo('App\User');
  }

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
}
