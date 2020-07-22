<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consulta;
use App\Paciente;
use App\TipoConsulta;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $consulta = new Consulta;
      $consulta->fecha = date("Y-m-d H:i:s");
      $consulta->coseguro = $request->coseguro;
      $consulta->motivo_consulta = $request->motivo_consulta;
      $consulta->paciente_id = $request->paciente_id;
      $consulta->tipo_consulta_id = $request->tipo_consulta_id;
      $consulta->user_id = auth()->id();
      $consulta->save();

      return redirect()->route('consultas.show', $consulta->paciente_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $consultas = Consulta::where('paciente_id','like',$id)->orderBy('fecha', 'DESC')->get();
      $paciente = Paciente::find($id);
      return view('consultas.show', compact('consultas','paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $consulta = Consulta::find($id);
      $consulta->estudios = $request->estudios;
      $consulta->diagnostico = $request->diagnostico;
      $consulta->tratamiento = $request->tratamiento;
      $consulta->tipo_consulta_id = $request->tipo_consulta_id;
      $consulta->user_id = auth()->id();
      $consulta->estado = 'atendido';
      $consulta->save();

      return redirect()->route('consultas.show', $consulta->paciente_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function nueva($id)
    {
        $paciente = Paciente::find($id);
        $tipoconsultas = TipoConsulta::orderBy('nombre', 'ASC')
                        ->select('nombre as nombre', 'id as id')
                        ->get();
        return view('consultas.nueva', compact('paciente', 'tipoconsultas'));
    }

    public function editar($id)
    {
        $consulta = Consulta::find($id);
        $tipoconsultas = TipoConsulta::orderBy('nombre', 'ASC')
                        ->select('nombre as nombre', 'id as id')
                        ->get();
        $paciente = Paciente::find($consulta->paciente_id);

        return view('consultas.editar', compact('consulta', 'tipoconsultas', 'paciente'));
    }
}
