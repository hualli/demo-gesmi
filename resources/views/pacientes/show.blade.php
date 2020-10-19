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
                <div class="col-xs-12 col-sm-12 col-md-2 offset-md-10 col-lg-2 offset-lg-10 col-xl-2 offset-xl-10">
                  <a href="{{route('pacientes.index')}}" class="btn btn-primary btn-block">Volver</a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <p><b>Nombre: </b>{{$paciente->apellido}}, {{$paciente->nombre}}</p>
                  <p><b>Fecha de Nacimiento: </b>{{ date('d-m-Y', strtotime($paciente->fecha_nacimiento)) }} / {{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->age}} a&ntilde;os</p>
                  <p><b>DNI / CUIL / CUIT: </b>{{$paciente->dni_cuil_cuit}}</p>
                  <p><b>Domicilio: </b>{{$paciente->domicilio}}</p>
                  <p><b>Tel&eacute;fonos: </b>{{$paciente->telefono_fijo}} / {{$paciente->telefono_celular}}</p>
                  <p><b>E-mail: </b>{{$paciente->email}}</p>
                  <p><b>Obra Social: </b>{{$paciente->obrasocial->nombre}} - {{$paciente->plan}} - {{$paciente->numero_afiliado}}</p>
                  <br>

                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <a href="{{route('pacientes.edit', $paciente->id)}}" class="btn btn-warning btn-block">Editar</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>


        </div>
    </div>
</div>
@endsection
