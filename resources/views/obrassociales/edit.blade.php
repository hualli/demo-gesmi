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



          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Editar Obra Social</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            
              <form method="post" action="{{ route('obrassociales.update')}}" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="nombre" name="nombre" value="{{ $obrasocial->nombre }}">
                      <input type="hidden" class="form-control" placeholder="Enter ..." id="id" name="id" value="{{ $obrasocial->id }}">
                        @if ($errors->has('nombre'))
                          <div class="alert alert-danger">
                            {{ $errors->first('nombre') }}
                          </div>
                        @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success btn-block">Actualizar</button>
                    </div>
                  </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                      <a href="{{route('obrassociales.index')}}" class="btn btn-primary btn-block">Volver</a>
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
