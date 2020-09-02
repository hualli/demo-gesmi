<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoConsulta extends Model
{
  protected $table = "tipo_consulta";

  protected $fillable = [
    'nombre'
  ];

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
