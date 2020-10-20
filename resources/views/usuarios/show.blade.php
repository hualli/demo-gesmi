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
              <h3 class="card-title">Detalle de Usuario</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2 offset-md-10 col-lg-2 offset-lg-10 col-xl-2 offset-xl-10">
                  <a href="{{route('usuarios.index')}}" class="btn btn-primary btn-block">Volver</a>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <br>
                  <p><b>Nombre: </b>{{$usuario->apellido}}, {{$usuario->nombre}}</p>
                  <p><b>Nombre de usuario: </b>{{$usuario->username}}</p>
                  <p><b>Estado: </b>{{$usuario->estado}}</p>
                  <p><b>Tipo de usuario: </b>{{$usuario->tipo}}</p>
                  <p><b>Pantalla principal: </b>{{$usuario->principal}}</p>
                  <br>

                </div>
              </div>
            </div>
          </div>


        </div>
    </div>
</div>
@endsection
