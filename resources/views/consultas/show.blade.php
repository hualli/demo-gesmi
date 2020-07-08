@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-md-11">
                  <h1>Paciente: {{$paciente->apellido}}, {{$paciente->nombre}}</h1>
                </div>
                <div class="col-md-1 d-flex">
                  <a href="{{ route('consultas.nueva', $paciente->id) }}" class="btn btn-primary btn-block ml-auto"><i class="fas fa-plus"></i></a>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>


          @foreach ($consultas as $consulta)
          <div class="card card-secondary">
            <div class="card-header">
              <div class="row">
                <div class="col-md-11">
                  <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                      <h3 class="card-title">{{$consulta->tipo_consulta->nombre}} - {{ date('d-m-Y', strtotime($consulta->fecha)) }}</h3>
                    </li>
                  </ul>
                </div>
                <div class="col-md-1 d-flex">
                  <a href="{{ route('consultas.editar', $consulta->id) }}" class="btn btn-warning btn-block ml-auto"><i class="fas fa-pencil-alt" style="color:white"></i></a>
                </div>
              </div>


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
