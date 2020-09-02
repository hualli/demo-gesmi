@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Obras Sociales</h1>
                </div>

              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Comienza la tabla -->

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Listado de Obras Sociales</h3>

                  <div class="card-tools">
                    <form class="form-inline">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="variable" class="form-control float-right" placeholder="Buscar">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>&nbsp;</th>
                        <th>Nombre</th>
                        <th style="width: 6%;">&nbsp;</th>
                        <th style="width: 6%;">
                          <a href="{{ route('obrassociales.create') }}" class="btn btn-primary btn-block"><i class="fas fa-plus"></i></a>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($obrassociales as $obrasocial)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{ $obrasocial->nombre }}</td>
                          <td style="width: 6%;">
                            <a href="{{ route('obrassociales.show', $obrasocial->id) }}" class="btn btn-success btn-block"><i class="far fa-eye"></i></a>
                          </td>
                          <td style="width: 6%;">
                            <a href="{{ route('obrassociales.edit', $obrasocial->id) }}" class="btn btn-warning btn-block"><i class="fas fa-pencil-alt" style="color:white"></i></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{$obrassociales->render()}}
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
