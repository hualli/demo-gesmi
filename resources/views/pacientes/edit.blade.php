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
              <h3 class="card-title">Editar Paciente</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2 offset-md-10 col-lg-2 offset-lg-10 col-xl-2 offset-xl-10">
                  <a href="{{route('pacientes.index')}}" class="btn btn-primary btn-block">Volver</a>
                </div>
              </div>
              <form method="post" action="{{ route('pacientes.update', $paciente->id)}}" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Apellido</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="apellido" name="apellido" value="{{ $paciente->apellido }}">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="nombre" name="nombre" value="{{ $paciente->nombre }}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Fecha de Nacimiento</label>
                      <input type="date" class="form-control" placeholder="Enter ..." id="fecha_nacimiento" name="fecha_nacimiento" value="{{ date('Y-m-d', strtotime($paciente->fecha_nacimiento)) }}">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Domicilio</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="domicilio" name="domicilio" value="{{ $paciente->domicilio }}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>DNI / CUIL / CUIT</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="dni_cuil_cuit" name="dni_cuil_cuit" value="{{ $paciente->dni_cuil_cuit }}">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="email" name="email" value="{{ $paciente->email }}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Tel&eacute;fono Fijo</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="telefono_fijo" name="telefono_fijo" value="{{ $paciente->telefono_fijo }}">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Tel&eacute;fono Celular</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="telefono_celular" name="telefono_celular" value="{{ $paciente->telefono_celular }}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Obra Social</label>
                      <select class="form-control select2" style="width: 100%;" id="obrasocial_id" name="obrasocial_id">
                        <option value="0">Seleccione una Obra Social</option>
                        @foreach($obrassociales as $obrasocial)
                          <?php if ($obrasocial->id == $paciente->obrasocial_id): ?>
                            <option value="{{$obrasocial->id}}" selected>{{$obrasocial->nombre}}</option>
                          <?php else: ?>
                            <option value="{{$obrasocial->id}}">{{$obrasocial->nombre}}</option>
                          <?php endif; ?>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Plan</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="plan" name="plan" value="{{ $paciente->plan }}">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>N° de Afiliado</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="numero_afiliado" name="numero_afiliado" value="{{ $paciente->numero_afiliado }}">
                    </div>
                  </div>
                </div>



                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
                    </div>
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
