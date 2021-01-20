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
                  <p><b>Fecha de Nacimiento: </b>{{ date('d-m-Y', strtotime($paciente->fecha_nacimiento)) }}  </p>
                  <p><b>Edad: </b> {{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->age}} a&ntilde;os</p>
                  <p><b>DNI / CUIL / CUIT: </b>{{$paciente->dni_cuil_cuit}}</p>
                  <p><b>Domicilio: </b>{{$paciente->domicilio}}</p>
                  <p><b>Tel&eacute;fonos: </b>{{$paciente->telefono_fijo}} / {{$paciente->telefono_celular}}</p>
                  <p><b>E-mail: </b>{{$paciente->email}}</p>
                  <p><b>Obra Social: </b>{{$paciente->obrasocial->nombre}} - {{$paciente->plan}} - {{$paciente->numero_afiliado}}</p>
                  <br>

                  <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                    <a href="{{route('pacientes.edit', $paciente->id)}}" class="btn btn-warning btn-block">Editar</a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                    <a href="{{route('pacientes.index')}}" class="btn btn-primary btn-block">Volver</a>
                  </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          
          <div class="card card-secondary">   
            <div class="card-header">
              <h3 class="card-title">Turnos del Paciente</h3>
            </div>
            <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" id="datos">
                    <thead>
                      <tr>
                        <th>&nbsp; </th>
                        <th> Fecha </th>
                        <th> Coseguro </th>
                        <th> Motivo </th>
                        <th> Tipo Consulta</th>
                        <th> Estado </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($turnos as $turno)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{ $turno->fecha }}</td>
                          <td>{{ $turno->coseguro }} </td>
                          <td>{{ $turno->motivo_consulta }}</td>
                          <td>{{ $turno->tipo_consulta->nombre }}</td>
                          <td>{{ $turno->estado }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{$turnos->render()}}
                </div>
          </div>

        </div>
    </div>
</div>
@endsection
