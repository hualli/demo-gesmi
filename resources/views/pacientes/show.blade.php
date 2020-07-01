@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Pacientes</h1>
                </div>

              </div>
            </div><!-- /.container-fluid -->
          </section>



          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Detalle del Paciente</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <p><b>Nombre: </b>{{$paciente->apellido}}, {{$paciente->nombre}}</p>
                  <p><b>Edad: </b>{{\Carbon\Carbon::parse($paciente->fecha_nacimiento)->age}}</p>
                  <p><b>Fecha de Nacimiento: </b>{{ date('d-m-Y', strtotime($paciente->fecha_nacimiento)) }}</p>
                  <p><b>Domicilio: </b>{{$paciente->domicilio}}</p>
                  <p><b>Tel&eacute;fono Fijo: </b>{{$paciente->telefono_fijo}}</p>
                  <p><b>Tel&eacute;fono Celular: </b>{{$paciente->telefono_celular}}</p>
                  <p><b>Obra Social: </b>{{$paciente->obrasocial->nombre}}</p>
                  <br>

                </div>
              </div>
            </div>
          </div>


        </div>
    </div>
</div>
@endsection
