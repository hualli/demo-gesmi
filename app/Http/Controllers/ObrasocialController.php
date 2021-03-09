<?php

namespace App\Http\Controllers;
use App\ObraSocial;
use App\Http\Requests\ObraSocialRequest;

use Illuminate\Http\Request;

class ObrasocialController extends Controller
{
    public function index(Request $request)
    {
      $variable = $request->get('variable');

      $obrassociales = ObraSocial::where('estado','like','habilitado')
                      ->where('nombre', 'LIKE', "%$variable%")
                      ->orderBy('nombre', 'ASC')
                      ->paginate(10);

      return view('obrassociales.index', compact('obrassociales'));
    }

    public function create()
    {
      return view('obrassociales.create');
    }

    public function store(ObraSocialRequest $request)
    {
      $obrasocial = new ObraSocial;
      $obrasocial->nombre = $request->nombre;
      $obrasocial->save();

      return redirect()->route('obrassociales.index');
    }

    public function show($id)
    {
      $obrasocial = ObraSocial::find($id);
      return view('obrassociales.show', compact('obrasocial'));
    }

    public function edit($id)
    {
      $obrasocial = ObraSocial::find($id);

      return view('obrassociales.edit', compact('obrasocial'));
    }

    public function update(ObraSocialRequest $request)
    {
      $obrasocial = ObraSocial::find($request->id);
      $obrasocial->nombre = $request->nombre;
      $obrasocial->save();
      return redirect()->route('obrassociales.index');
    }

    public function destroy($id)
    {
        
    }
}
