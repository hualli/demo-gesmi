<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\TipoConsulta;
use App\Turno;
use App\User;
use App\Consulta;

class TurnoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request)
  {

    $medico = $request->get('medico');

    $fecha = $request->get('fecha');

    $turnos = Turno::orderBy('fecha', 'DESC')
                ->paginate(10);

    return view('turnos.index', compact('turnos'));
  }

  public function nuevo($id)
  {
      $paciente = Paciente::find($id);

      $tipoconsultas = TipoConsulta::orderBy('nombre', 'ASC')
                      ->select('nombre as nombre', 'id as id')
                      ->get();

      $usuarios = User::orderBy('apellido', 'ASC')->get();

      return view('turnos.nuevo', compact('paciente', 'tipoconsultas', 'usuarios'));
  }

  public function store(Request $request)
  {
    $turno = new Turno;
    $turno->fecha = date("Y-m-d H:i:s");
    $turno->coseguro = $request->coseguro;
    $turno->motivo_consulta = $request->motivo_consulta;
    $turno->paciente_id = $request->paciente_id;
    $turno->tipo_consulta_id = $request->tipo_consulta_id;
    $turno->user_id = $request->user_id;
    $turno->save();

    return redirect()->route('pacientes.index');
  }

  public function cancelar(Request $request, $id)
  {
    $turno = Turno::find($id);
    $turno->estado = 'Cancelado';
    $turno->save();

    return redirect()->route('turnos.index');
  }

  public function consulta($id)
  {
      $turno = Turno::find($id);
      $turno->estado = 'Atendido';
      $turno->save();

      $consulta = new Consulta;
      $consulta->fecha = date("Y-m-d H:i:s");
      $consulta->coseguro = $turno->coseguro;
      $consulta->motivo_consulta = $turno->motivo_consulta;
      $consulta->paciente_id = $turno->paciente_id;
      $consulta->tipo_consulta_id = $turno->tipo_consulta_id;
      $consulta->user_id = $turno->user_id;
      $consulta->save();

      $tipoconsultas = TipoConsulta::orderBy('nombre', 'ASC')
                      ->select('nombre as nombre', 'id as id')
                      ->get();
                      
      $paciente = Paciente::find($consulta->paciente_id);

      return view('consultas.editar', compact('consulta', 'tipoconsultas', 'paciente', 'turno'));
  }

}
