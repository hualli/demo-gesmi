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
              <h3 class="card-title">Agregar Paciente</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form method="post" action="{{ route('pacientes.store')}}" role="form">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Apellido</label>
                      <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}">
                      @if ($errors->has('apellido'))
                        <div class="alert alert-danger">
                          {{ $errors->first('apellido') }}
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
                      @if ($errors->has('nombre'))
                        <div class="alert alert-danger">
                          {{ $errors->first('nombre') }}
                        </div>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Fecha de Nacimiento</label>
                      <input type="date" class="form-control" placeholder="Enter ..." id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" >
                    </div>
                      @if ($errors->has('fecha_nacimiento'))
                        <div class="alert alert-danger">
                          {{ $errors->first('fecha_nacimiento') }}
                        </div>
                      @endif
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Domicilio</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="domicilio" name="domicilio" value="{{ old('domicilio') }}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>DNI / CUIL / CUIT</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="dni_cuil_cuit" name="dni_cuil_cuit" value="{{ old('dni_cuil_cuit') }}">
                    </div>
                    @if ($errors->has('dni_cuil_cuit'))
                        <div class="alert alert-danger">
                          {{ $errors->first('dni_cuil_cuit') }}
                        </div>
                    @endif
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="email" name="email" value="{{ old('email') }}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Tel&eacute;fono Fijo</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="telefono_fijo" name="telefono_fijo" value="{{ old('telefono_fijo') }}">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Tel&eacute;fono Celular</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="telefono_celular" name="telefono_celular" value="{{ old('telefono_celular') }}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Obra Social</label>
                      <select class="form-control select2" style="width: 100%;" id="obrasocial_id" name="obrasocial_id" >
                        <option value="">Seleccione una Obra Social</option>
                        @foreach($obrassociales as $obrasocial)
                        <option value="{{$obrasocial->id}}">{{$obrasocial->nombre}}</option>
                        @endforeach
                      </select>
                        @if ($errors->has('obrasocial_id'))
                          <div class="alert alert-danger">
                            {{ $errors->first('obrasocial_id') }}
                          </div>
                        @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Plan</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="plan" name="plan" value="{{ old('plan') }}" >
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>N° de Afiliado</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="numero_afiliado" name="numero_afiliado" value="{{ old('numero_afiliado') }}">
                    </div>
                  </div>
                </div>



                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block" onclick="mensaje()">Agregar</button>
                    </div>         
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                  <a href="{{route('pacientes.index')}}" class="btn btn-danger btn-block">Volver</a>
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
