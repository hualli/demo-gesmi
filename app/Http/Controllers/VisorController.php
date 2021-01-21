<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turno;

class VisorController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request)
  {
    $fecha = date("Y-m-d");

    if($request->searchText != ''){
      $fecha = $request->searchText;
    }
    
    $turnos = Turno::where('user_id','like', auth()->id())
              ->whereDate('fecha', $fecha)
              ->orderBy('fecha', 'DESC')
              ->paginate(10);

    return view('visor.index', compact('turnos'));
  }
}
