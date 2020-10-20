@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Usuarios</h1>
                </div>

              </div>
            </div><!-- /.container-fluid -->
          </section>



          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Agregar Usuario</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-2 offset-md-10 col-lg-2 offset-lg-10 col-xl-2 offset-xl-10">
                        <a href="{{route('usuarios.index')}}" class="btn btn-primary btn-block">Volver</a>
                    </div>
                </div>
              <form method="post" action="{{ route('usuarios.store')}}" role="form">
                {{ csrf_field() }}

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="nombre" name="nombre">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Apellido</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="apellido" name="apellido">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Usuario</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="username" name="username">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Contrase&ntilde;a</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="password" name="password">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="email" name="email">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Tipo de Usuario</label>
                      <select name="tipo" id="tipo" class="form-control">
                        <option value="0">Seleccione el tipo de usuario</option>
                        <option value="1">M&eacute;dico</option>
                        <option value="2">Administrativo</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>P&aacute;gina Principal</label>
                      <select name="principal" id="principal" class="form-control">
                        <option value="0">Seleccione la p&aacute;gina principal</option>
                        <option value="1">Pacientes</option>
                        <option value="2">Visor</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Rol</label>
                      <select name="rol" id="rol" class="form-control">
                        <option value="0">Seleccione un Rol</option>
                        @foreach ($roles as $rol)
                          <option value="{{ $rol->id }}" >{{ $rol->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <hr>

                

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Agregar</button>
                    </div>
                  </div>
                </div>

              </form>
            </div>
            <!-- /.card-body -->
          </div>


        </div>
    </div>
</div>
@endsection
