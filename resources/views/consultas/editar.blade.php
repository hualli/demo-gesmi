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



          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Nueva Consulta - {{ date('d-m-Y') }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('consultas.update', $consulta->id)}}" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Tipo de Consulta</label>
                      <select class="form-control select2" style="width: 100%;" id="tipo_consulta_id" name="tipo_consulta_id">
                        <option value="{{ $consulta->tipo_consulta->id }}">{{ $consulta->tipo_consulta->nombre }}</option>
                        @foreach($tipoconsultas as $tipoconsulta)
                        <option value="{{$tipoconsulta->id}}">{{$tipoconsulta->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Obra Social</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="os" name="os" value="{{$paciente->obrasocial->nombre}}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Plan</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="plan" name="plan" value="{{$paciente->plan}}">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>N° de Afiliado</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="numero_afiliado" name="numero_afiliado" value="{{$paciente->numero_afiliado}}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Motivo de consulta</label>
                      <textarea class="form-control" placeholder="Enter ..." id="motivo_consulta" name="motivo_consulta" rows="3">{{$consulta->motivo_consulta}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Estudios</label>
                      <textarea class="form-control" placeholder="Enter ..." id="estudios" name="estudios" rows="3">{{$consulta->estudios}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Diagn&oacute;stico</label>
                      <textarea class="form-control" placeholder="Enter ..." id="diagnostico" name="diagnostico" rows="3">{{$consulta->diagnostico}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Tratamiento</label>
                      <textarea class="form-control" placeholder="Enter ..." id="tratamiento" name="tratamiento" rows="3">{{$consulta->tratamiento}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Agregar</button>
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
