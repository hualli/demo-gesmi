@extends('layouts.app')
@section('content')
<div class="container">

  <div class="row justify-content-center">
    
      <div class="col-md-12">

        <section class="content-header">
            
            <div class="container-fluid">
              
              <div class="row mb-2">
                
                <div class="col-sm-6">
                  
                    <h1>Visor</h1>
                
                </div>

              </div>
            
            </div>
        
        </section>

        <div class="row"> 
            
          <div class="col-12">
              
              <div class="card">
                
                <div class="card-header">
                    
                    <h3 class="card-title">Listado de Turnos</h3>

                    <div class="card-tools">
                    <form class="form-inline" action="{{ route('visor.index')}}" role="form">
                        <div class="input-group input-group-sm" style="width: 300px;">
                          <input type="date" name="searchText" class="form-control float-right" placeholder="Buscar">
                                   
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
                              <th>#</th>
                              <th>Nombre</th>
                              <th>Obra Social</th>
                              <th>Fecha y Hora</th>
                              <th>Hora</th>
                              <th>Estado</th>
                              <th>&nbsp;</th> 
                              <th>&nbsp;</th>                  
                          </tr>
                       
                      </thead>

                      <tbody>
                        
                        @foreach ($turnos as $turno)
                            
                            <tr>
                                
                                <td>{{$loop->iteration}}</td>
                                
                                <td>{{ $turno->paciente->apellido }}, {{ $turno->paciente->nombre }}</td>
                                
                                <td>{{ $turno->paciente->obrasocial->nombre }}</td>
                                
                                <td>{{ $turno->formatoFecha($turno->fecha)}}</td>
                                
                                <td>{{ $turno->formatohora($turno->fecha)}}</td>

                                <td>{{ $turno->estado}}</td>
                              
                                @if($turno->estado == 'Pendiente')                                 
                              
                                <td style="width: 5%;">
                                  
                                  <a href="{{ route('turnos.consulta', $turno->id) }}" class="btn btn-primary btn-block" data-toggle="tooltip" title="Atender Turno" data-original-title="Atender Turno"><i class="fas fa-notes-medical"></i></a>
                                
                                </td>
                                
                               

                                <td style="width: 5%;">
                                    
                                    <form method="post" action="{{ route('turnos.cancelar', $turno->id) }}" role="form">
                                      {{ csrf_field() }}
                                      {{ method_field('PUT') }}
                                    
                                    <button type="submit" class="btn btn-danger btn-block" data-toggle="tooltip" title="Cancelar Turno" data-original-title="Cancelar Turno"><i class="fas fa-times"></i></button>
                                    
                                    </form>
                                    
                                </td>
                              
                               @endif
                            </tr>
                        
                        @endforeach
                      
                      </tbody>
                  
                  </table>

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
