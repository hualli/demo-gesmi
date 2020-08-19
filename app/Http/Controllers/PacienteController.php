<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\ObraSocial;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $pacientes = Paciente::orderBy('apellido', 'ASC')
                  ->paginate(10);

      return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $obrassociales = ObraSocial::orderBy('nombre', 'ASC')
                      ->select('nombre as nombre', 'id as id')
                      ->get();

      return view('pacientes.create',compact('obrassociales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $paciente = new Paciente;
      $paciente->apellido = $request->apellido;
      $paciente->nombre = $request->nombre;
      $paciente->dni_cuil_cuit = $request->dni_cuil_cuit;
      $paciente->fecha_nacimiento = $request->fecha_nacimiento;
      $paciente->domicilio = $request->domicilio;
      $paciente->telefono_fijo = $request->telefono_fijo;
      $paciente->telefono_celular = $request->telefono_celular;
      $paciente->email = $request->email;
      $paciente->plan = $request->plan;
      $paciente->numero_afiliado = $request->numero_afiliado;
      $paciente->obrasocial_id = $request->obrasocial_id;
      $paciente->save();

      return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $paciente = Paciente::find($id);
      return view('pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $paciente = Paciente::find($id);
      $obrassociales = ObraSocial::orderBy('nombre', 'ASC')
                      ->select('nombre as nombre', 'id as id')
                      ->get();
      return view('pacientes.edit', compact('paciente','obrassociales'));
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
      $paciente = Paciente::find($id);
      $paciente->apellido = $request->apellido;
      $paciente->nombre = $request->nombre;
      $paciente->dni_cuil_cuit = $request->dni_cuil_cuit;
      $paciente->fecha_nacimiento = $request->fecha_nacimiento;
      $paciente->domicilio = $request->domicilio;
      $paciente->telefono_fijo = $request->telefono_fijo;
      $paciente->telefono_celular = $request->telefono_celular;
      $paciente->email = $request->email;
      $paciente->plan = $request->plan;
      $paciente->numero_afiliado = $request->numero_afiliado;
      $paciente->obrasocial_id = $request->obrasocial_id;
      $paciente->save();
      return redirect()->route('pacientes.index');
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
}
