<?php

namespace App\Http\Controllers;
use App\ObraSocial;

use Illuminate\Http\Request;

class ObrasocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $obrassociales = ObraSocial::where('estado','like','habilitado')->orderBy('nombre', 'ASC')->paginate(10);
      return view('obrassociales.index', compact('obrassociales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('obrassociales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $obrasocial = new ObraSocial;
      $obrasocial->nombre = $request->nombre;
      $obrasocial->save();

      return redirect()->route('obrassociales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $obrasocial = ObraSocial::find($id);
      return view('obrassociales.show', compact('obrasocial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $obrasocial = ObraSocial::find($id);

      return view('obrassociales.edit', compact('obrasocial'));
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
      $obrasocial = ObraSocial::find($id);
      $obrasocial->nombre = $request->nombre;
      $obrasocial->save();
      return redirect()->route('obrassociales.index');
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
