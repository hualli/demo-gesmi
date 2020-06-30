<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = "consultas";

    protected $fillable = [
      'fecha', 'diagnostico', 'tratamiento', 'paciente_id'
    ];
}
