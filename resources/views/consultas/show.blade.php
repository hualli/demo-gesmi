@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Paciente: {{$paciente->apellido}}, {{$paciente->nombre}}</h1>
                </div>

              </div>
            </div><!-- /.container-fluid -->
          </section>


          @foreach ($consultas as $consulta)
          <div class="card card-secondary">
            <div class="card-header">
              <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                  <h3 class="card-title">{{$consulta->tipo_consulta->nombre}} - {{ date('d-m-Y', strtotime($consulta->fecha)) }}</h3>
                </li>
                <!-- <li class="nav-item">
                  <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-block"><i class="fas fa-pencil-alt" style="color:white"></i></a>
                </li> -->
              </ul>

            </div>

            <!-- /.card-header -->
            <div class="card-body">

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <p><b>Diagn&oacute;stico: </b>{{ $consulta->diagnostico }}</p>
                  <br>
                  <p><b>Tratamiento: </b>{{ $consulta->tratamiento }}</p>
                  <br>
                  <p><b>Atendi&oacute;: </b>{{ $consulta->user->apellido }}, {{ $consulta->user->nombre }}</p>
                  <br>
                </div>
              </div>
            </div>
          </div>
          <br>
          @endforeach

        </div>
    </div>
</div>
@endsection
