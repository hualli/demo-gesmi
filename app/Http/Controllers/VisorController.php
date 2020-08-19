<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turno;

class VisorController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index()
  {
    $fecha_actual = date("Y-m-d");
    
    $turnos = Turno::where('user_id','like', auth()->id())
              ->whereDate('fecha', '=', $fecha_actual)
              ->orderBy('fecha', 'DESC')
              ->paginate(10);

    return view('visor.index', compact('turnos'));
  }
}
