<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObraSocial extends Model
{
    protected $table = "obras_sociales";

    protected $fillable = [
      'nombre', 'estado'
    ];


}
