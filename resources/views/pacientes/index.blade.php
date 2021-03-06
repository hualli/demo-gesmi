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

          <!-- Comienza la tabla -->

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Listado de Pacientes</h3>

                  <div class="card-tools">
                    <form class="form-inline" action="{{ route('pacientes.index')}}" role="form">
                        <div class="input-group input-group-sm" style="width: 300px;">
                          <select class="form-control" name="searchCondicion">
                            <option value="apellido">Apellido</option>
                            <option value="dni_cuil_cuit">Dni / Cuil / Cuit</option>                     
                          </select>
                          <input type="text" name="searchText" class="form-control float-right" placeholder="Buscar">
                          

                        
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
                        <th>Dni / Cuil / Cuit</th>
                        <th>Tel&eacute;fono Fijo</th>
                        <th>Tel&eacute;fono Celular</th>
                        <th style="width: 6%;">&nbsp;</th>
                        <th style="width: 6%;">
                          <a href="{{ route('pacientes.create') }}" class="btn btn-primary btn-block" title="Agregar Paciente"><i class="fas fa-plus"></i></a>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($pacientes as $paciente)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{ $paciente->apellido }}, {{ $paciente->nombre }}</td>
                          <td>{{ $paciente->dni_cuil_cuit }} </td>
                          <td>{{ $paciente->telefono_fijo }}</td>
                          <td>{{ $paciente->telefono_celular }}</td>
                          <td style="width: 6%;">
                            <a href="{{ route('consultas.show', $paciente->id) }}" class="btn btn-dark btn-block" title="Historia Cl??nica"><i class="fas fa-notes-medical"></i></a>
                          </td>
                          <td style="width: 6%;">
                            <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-success btn-block" title="Detalle del Paciente"><i class="far fa-eye"></i></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{$pacientes->render()}}
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