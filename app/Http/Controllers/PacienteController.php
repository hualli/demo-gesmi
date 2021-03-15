<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Paciente;
use App\Turno;
use App\ObraSocial;
use App\Http\Requests\PacienteRequest;

class PacienteController extends Controller
{

    public function index(Request $request)
    {
      
      $searchText = $request->searchText;

      $searchCondicion = $request->searchCondicion;

      if($searchCondicion && $searchText){
        $pacientes = Paciente::where('estado','like','habilitado')
        ->where($searchCondicion, 'LIKE', '%'.$searchText.'%')
        ->orderBy('apellido', 'ASC')
        ->paginate(10);
      }
      else{
        $pacientes = Paciente::where('estado','like','habilitado')
        ->orderBy('apellido', 'ASC')
        ->orderBy('nombre', 'ASC')
        ->paginate(10);
      }


      return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
      $obrassociales = ObraSocial::orderBy('nombre', 'ASC')
                      ->select('nombre as nombre', 'id as id')
                      ->get();

      return view('pacientes.create',compact('obrassociales'));
    }

    public function store(PacienteRequest $request)
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

    public function show($id)
    {
      $paciente = Paciente::find($id);
      
      $turnos = Turno::where('paciente_id','like',$id)->orderBy('id', 'DESC')->paginate(10);;
      
      return view('pacientes.show', compact('paciente','turnos'));
    }

    public function edit($id)
    {
      $paciente = Paciente::find($id);

      $obrassociales = ObraSocial::orderBy('nombre', 'ASC')
                      ->select('nombre as nombre', 'id as id')
                      ->get();

      return view('pacientes.edit', compact('paciente','obrassociales'));
    }

    public function update(PacienteRequest $request)
    {
      $paciente = Paciente::find($request->id);
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
}
