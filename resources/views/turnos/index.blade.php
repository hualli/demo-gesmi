@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Turnos</h1>
                </div>

              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Comienza la tabla -->

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Listado de Turnos</h3>

                  <div class="card-tools">
                    <form class="form-inline">
                      <div class="input-group input-group-sm" style="width: 400px;">
                        <input type="text" name="medico" class="form-control" placeholder="Buscar">
                        <input type="date" name="fecha" class="form-control float-right" placeholder="Buscar">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" id="datos">
                    <thead>
                      <tr>
                        <th>&nbsp;</th>
                        <th>Nombre</th>
                        <th>Obra Social</th>
                        <th>Estado</th>
                        <th>M&eacute;dico</th>
                        <th style="width: 6%;">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($turnos as $turno)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{ $turno->paciente->apellido }}, {{ $turno->paciente->nombre }}</td>
                          <td>{{ $turno->paciente->obrasocial->nombre }}</td>
                          <td>{{ $turno->estado }}</td>
                          <td>{{ $turno->user->apellido }}, {{ $turno->user->nombre }}</td>
                          <td style="width: 6%;">
                            <form method="post" action="{{ route('turnos.cancelar', $turno->id) }}" role="form">
                              {{ csrf_field() }}
                              {{ method_field('PUT') }}
                            <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-times"></i></button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{$turnos->render()}}
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>

        </div>
    </div>
</div>
@endsection
