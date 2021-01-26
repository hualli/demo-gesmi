<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Paciente;
use App\TipoConsulta;
use App\Turno;
use Illuminate\Support\Facades\DB;

class AgendaglController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $medico_id = $request->get('usuario');
        
        if($request->usuario != 0){
            $medico = User::where('id','=',$medico_id)->first();
            $medico_nombre = $medico->apellido . ", " . $medico->nombre;
        }else{
            $medico_nombre = " ";
            $medico_id = 0;
        }
        
        $usuarios = User::where('tipo','LIKE','medico')
                    ->where('estado','LIKE','habilitado')
                    ->get();

        $pacientes = Paciente::where('estado','LIKE','habilitado')->get();

        $tipo_consultas = TipoConsulta::orderby('nombre','ASC')->get();

        return view('agendagl.index', compact('usuarios','pacientes','medico_nombre','medico_id','tipo_consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turno = new Turno;
        $turno->tipo_consulta_id = $request->tipoconsulta_id;
        $turno->fecha = date('Y-m-d H:i:s',strtotime($request->fecha));
        $turno->paciente_id = $request->paciente_id;
        $turno->user_id = $request->medico_id;
        $turno->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $turnos = DB::table('turnos')
                    ->join('pacientes', 'pacientes.id', '=', 'turnos.paciente_id')
                    ->join('tipo_consulta', 'tipo_consulta.id', '=', 'turnos.tipo_consulta_id')
                    ->where('turnos.user_id','LIKE',$id)
                    ->where('turnos.estado','!=','Cancelado')
                    ->select(DB::raw("CONCAT(pacientes.apellido,' ',pacientes.nombre,' - ',tipo_consulta.nombre) as title"),'turnos.fecha as start','turnos.id as id')
                    ->get();
        
        return response()->json($turnos);
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
        //
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

    public function cancelar(Request $request)
    {
        $turno = Turno::find($request->id);
        $turno->estado = 'Cancelado';
        $turno->save();;
        
    }
}
