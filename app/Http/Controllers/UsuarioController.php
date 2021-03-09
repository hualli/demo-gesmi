<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $variable = $request->get('variable');

        $usuarios = User::where('estado','like','habilitado')
                  ->where('nombre', 'LIKE', "%$variable%")
                  ->orWhere('apellido', 'LIKE', "%$variable%")
                  ->orderBy('apellido', 'ASC')
                  ->paginate(10);
                  
        return view('usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('usuarios.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->username = $request->username;
        $user->password =bcrypt($request->password);
        $user->email = $request->email;

        if ($request->principal == 1) {
            $user->principal = 'pacientes';
        }

        if ($request->principal == 2) {
            $user->principal = 'visor';
        }

        if ($request->tipo == 1) {
            $user->tipo = 'medico';
        }
        
        if ($request->tipo == 2) {
            $user->tipo = 'administrativo';
        }
        
        $user->save();

        if (isset($request->rol) && $request->rol != 0) {
            $user->assignRole($request->rol);
        }
        
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        
        return view('usuarios.show', compact('usuario'));
    }

    public function edit()
    {
        $usuario = User::find(auth()->id());

        $roles = Role::get();
        
        return view('usuarios.edit', compact('usuario','roles'));
    }

    public function editPerfil()
    {
        $usuario = User::find(auth()->id());

        return view('usuarios.editPerfil', compact('usuario'));
    }

    public function updatePerfil(Request $request)
    {
        $usuario = User::find(auth()->id());
        
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->email = $request->email;

        if($request->hasFile('img'))
        {
            $file = $request->file('img');
            $uniqueFileName = $usuario->nombre . '.' . $file->getClientOriginalExtension();
            $destino = public_path('img/perfil');
            $request->img->move($destino,$uniqueFileName);         
            $usuario->imagen_perfil = $uniqueFileName;
       }

        $usuario->save();

        if( $usuario->principal =='pacientes' )//se valida el la pantalla principal
        {
            return redirect('/pacientes');
        }
  
        if( $usuario->principal =='visor' )
        {
            return redirect('/visor');
        }
    }

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
}
