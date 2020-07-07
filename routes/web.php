<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('auth/login');
// });

Route::get('/', function () {
    if( Auth::user() ) //se valida si esta logueado
    {
        return redirect('pacientes');
    }
    else{
        return redirect('/login');
    }
});

Auth::routes();

Route::get('/home', 'PacienteController@index')->name('home');

Route::middleware(['auth'])->group(function(){

  //Pacientes
  Route::get('pacientes', 'PacienteController@index')->name('pacientes.index');

  Route::get('pacientes/create', 'PacienteController@create')->name('pacientes.create');

  Route::post('pacientes/store', 'PacienteController@store')->name('pacientes.store');

  Route::get('pacientes/{paciente}', 'PacienteController@show')->name('pacientes.show');

  Route::get('pacientes/{paciente}/edit', 'PacienteController@edit')->name('pacientes.edit');

  Route::put('pacientes/{paciente}', 'PacienteController@update')->name('pacientes.update');


  //Obras Sociales
  Route::get('obrassociales', 'ObrasocialController@index')->name('obrassociales.index');

  Route::get('obrassociales/create', 'ObrasocialController@create')->name('obrassociales.create');

  Route::post('obrassociales/store', 'ObrasocialController@store')->name('obrassociales.store');

  Route::get('obrassociales/{obrasocial}', 'ObrasocialController@show')->name('obrassociales.show');

  Route::get('obrassociales/{obrasocial}/edit', 'ObrasocialController@edit')->name('obrassociales.edit');

  Route::put('obrassociales/{obrasocial}', 'ObrasocialController@update')->name('obrassociales.update');


  //Consultas
  Route::get('consultas', 'ConsultaController@index')->name('consultas.index');

  Route::get('consultas/create', 'ConsultaController@create')->name('consultas.create');

  Route::post('consultas/store', 'ConsultaController@store')->name('consultas.store');

});
