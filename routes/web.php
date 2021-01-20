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
      if( Auth::user()->principal =='pacientes' )//se valida el la pantalla principal
      {
          return redirect('/pacientes');
      }

      if( Auth::user()->principal =='visor' )
      {
          return redirect('/visor');
      }

    }
    else{
        return redirect('/login');
    }
});

Route::get('/home', function () {
    if( Auth::user() ) //se valida si esta logueado
    {
      if( Auth::user()->principal =='pacientes' )//se valida el la pantalla principal
      {
          return redirect('/pacientes');
      }

      if( Auth::user()->principal =='visor' )
      {
          return redirect('/visor');
      }

    }
    else{
        return redirect('/login');
    }
});

//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Route::get('/home', 'PacienteController@index')->name('home');

Route::middleware(['auth'])->group(function(){

  //Pacientes
  Route::get('pacientes', 'PacienteController@index')->name('pacientes.index');

  Route::get('pacientes/create', 'PacienteController@create')->name('pacientes.create');

  Route::post('pacientes/store', 'PacienteController@store')->name('pacientes.store');

  Route::get('pacientes/{paciente}', 'PacienteController@show')->name('pacientes.show');

  Route::get('pacientes/{paciente}/edit', 'PacienteController@edit')->name('pacientes.edit');

  Route::put('pacientes/update', 'PacienteController@update')->name('pacientes.update');


  //Obras Sociales
  Route::get('obrassociales', 'ObrasocialController@index')->name('obrassociales.index');

  Route::get('obrassociales/create', 'ObrasocialController@create')->name('obrassociales.create');

  Route::post('obrassociales/store', 'ObrasocialController@store')->name('obrassociales.store');

  Route::get('obrassociales/{obrasocial}', 'ObrasocialController@show')->name('obrassociales.show');

  Route::get('obrassociales/{obrasocial}/edit', 'ObrasocialController@edit')->name('obrassociales.edit');

  Route::put('obrassociales/update', 'ObrasocialController@update')->name('obrassociales.update');


  //Consultas

  Route::get('consultas/{paciente}', 'ConsultaController@show')->name('consultas.show');

  Route::get('consultas/{paciente}/nueva', 'ConsultaController@nueva')->name('consultas.nueva');

  Route::post('consultas/store', 'ConsultaController@store')->name('consultas.store');

  Route::get('consultas/{paciente}/editar', 'ConsultaController@editar')->name('consultas.editar');

  Route::put('consultas/{consulta}', 'ConsultaController@update')->name('consultas.update');


  //Turnos

  Route::get('turnos', 'TurnoController@index')->name('turnos.index');

  Route::get('turnos/{paciente}/nuevo', 'TurnoController@nuevo')->name('turnos.nuevo');

  Route::post('turnos/store', 'TurnoController@store')->name('turnos.store');

  Route::get('turnos/{turno}/consulta', 'TurnoController@consulta')->name('turnos.consulta');

  Route::put('turnos/{turno}', 'TurnoController@cancelar')->name('turnos.cancelar');

  Route::put('turnos/atender/{turno}', 'TurnoController@finalizar')->name('turnos.finalizar');


  //Visor

  Route::get('/visor', 'VisorController@index')->name('visor.index');


  //Ayuda

  Route::get('/ayuda', 'AyudaController@index')->name('ayuda');


  // Usuarios

  Route::get('usuarios', 'UsuarioController@index')->name('usuarios.index');

  Route::get('usuarios/create', 'UsuarioController@create')->name('usuarios.create');

  Route::post('usuarios/store', 'UsuarioController@store')->name('usuarios.store');

  Route::get('usuarios/{user}/edit', 'UsuarioController@edit')->name('usuarios.edit');

  Route::put('usuarios/{user}', 'UsuarioController@update')->name('usuarios.update');

  Route::get('usuarios/{usuario}', 'UsuarioController@show')->name('usuarios.show');


  // Roles
  
  Route::get('roles', 'RoleController@index')->name('roles.index');

  Route::get('roles/create', 'RoleController@create')->name('roles.create');

  Route::post('roles/store', 'RoleController@store')->name('roles.store');

  Route::get('roles/{rol}', 'RoleController@show')->name('roles.show');

  Route::get('roles/{rol}/edit', 'RoleController@edit')->name('roles.edit');

  Route::put('roles/{roles}', 'RoleController@update')->name('roles.update');


  // Agenda
  
  Route::get('agenda', 'AgendaController@index')->name('agenda.index');

  Route::post('agenda/store', 'AgendaController@store')->name('agenda.store');

  Route::get('agenda/{medico}', 'AgendaController@show')->name('agenda.show');

  Route::post('agenda/cancelar', 'AgendaController@cancelar')->name('agenda.cancelar');

  Route::post('agenda/finalizar', 'AgendaController@finalizar')->name('agenda.finalizar');


});
