@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <meta name="csrf-token" content="{{ csrf_token() }}">
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Agenda</h1>
                </div>

              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Comienza la tabla -->

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">

                <form method="get" action="{{ route('agenda.index')}}" role="form">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                      <div class="form-group">
                        <select name="usuario" id="usuario" class="form-control">
                          <option value="0">Seleccione un M&eacute;dico</option>
                          @foreach ($usuarios as $usuario)
                          <option value="{{ $usuario->id }}" >{{ $usuario->apellido }}, {{ $usuario->nombre }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
                      </div>
                    </div>
                  </div>
                </form>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    {{$medico_nombre}}
                  </div>
                </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <!-- Calendario -->
                  <div id="agenda"></div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

            <!-- Modal de Turnos-->
            <div class="modal fade" id="turnoModal" tabindex="-1" role="dialog" aria-labelledby="turnoModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agendar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <label>Paciente</label>
                    <select class="form-control select2" style="width: 100%;" id="txtPaciente" name="txtPaciente">
                      <option value="0">Seleccione un Paciente</option>
                      @foreach($pacientes as $paciente)
                      <option value="{{$paciente->id}}">{{$paciente->apellido}}, {{$paciente->nombre}} - {{$paciente->dni_cuil_cuit}}</option>
                      @endforeach
                    </select>
                    <br>
                    <label>Consulta</label>
                    <select class="form-control select2" style="width: 100%;" id="txtTipoConsulta" name="txtTipoConsulta">
                      <option value="0">Seleccione el Tipo de Consulta</option>
                      @foreach($tipo_consultas as $tipoconsulta)
                      <option value="{{$tipoconsulta->id}}">{{$tipoconsulta->nombre}}</option>
                      @endforeach
                    </select>
                    <br>
                    <label>Fecha</label>
                    <input type="text" class="form-control" id="txtFecha" name="txtFecha">
                    <br>
                    <input type="hidden" class="form-control" id="txtMedico" name="txtMedico" value="{{$medico_id}}">
                  </div>
                  <div class="modal-footer">
                    <button id="btnGuardar" type="button" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal de Elimino Turnos-->
            <div class="modal fade" id="turnoEliminar" tabindex="-1" role="dialog" aria-labelledby="turnoEliminarLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancelar Turno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <label id="lbTurno"></label>
                    
                    <input type="hidden" class="form-control" id="txtTurno" name="txtTurno">
                  </div>
                  <div class="modal-footer">
                    <button id="btnCancelar" type="button" class="btn btn-danger">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
    </div>
</div>


<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('agenda');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'timeGridWeek',
          allDaySlot: false,
          weekends: false,
          slotDuration: '00:15:00',
          slotMinTime: '11:00:00',
          slotMaxTime: '20:30:00',
          titleFormat:{year: 'numeric', month: 'long', day: 'numeric'},
          buttonText:{today:'Hoy'},
          slotLabelFormat:{hour: 'numeric',minute: '2-digit',omitZeroMinute: false,meridiem: 'short'},
          editable: false,
          defaultTimedEventDuration: '00:15',
          timeZone: 'America/Argentina/Tucuman',

          dateClick:function(info){

            $('#txtFecha').val("");

            dia = (info.date.getUTCDate());
            mes = (info.date.getUTCMonth()+1);
            anio = (info.date.getUTCFullYear());
            hora = (info.date.getUTCHours()+":"+info.date.getUTCMinutes());

            $('#txtFecha').val(dia+"-"+mes+"-"+anio+" "+hora);

            $('#btnGuardar').prop('disabled',false);

            $('#turnoModal').modal();
          },

          eventClick:function(info){
            $('#txtTurno').val(info.event.id);
            $('#lbTurno').empty();
            $('#lbTurno').append(info.event.title);
            $('#btnCancelar').prop('disabled',false);
            $('#turnoEliminar').modal();
          },

          events:"{{route('agenda.show',$medico_id)}}",
        });

        calendar.setOption('locale','Es');
        calendar.render();

        $('#btnGuardar').click(function(){
          objTurno=recolectarDatos("POST");
          guardarTurno(objTurno);
        });

        $('#btnCancelar').click(function(){
          objTurno=recolectarDatosCancelar("POST");
          cancelarTurno(objTurno);
        });

        function recolectarDatos(method){
          nuevoTurno={
            paciente_id:$('#txtPaciente').val(),
            tipoconsulta_id:$('#txtTipoConsulta').val(),
            medico_id:$('#txtMedico').val(),
            fecha:$('#txtFecha').val(),
            '_token':$("meta[name='csrf-token']").attr("content"),
            '_method':method,
          }
          return nuevoTurno;
        };

        function guardarTurno(objTurno){
          $.ajax(
            {
              type:"POST",
              url:"{{route('agenda.store')}}",
              data:objTurno,
              success:function(msg){
                console.log(msg);
                $('#turnoModal').modal('toggle');
                calendar.refetchEvents();
                },
              error:function(){alert("Hay un error");},
            }
          );
        };


        function recolectarDatosCancelar(method){
          turnoid={
            id:$('#txtTurno').val(),
            '_token':$("meta[name='csrf-token']").attr("content"),
            '_method':method,
          }
          return turnoid;
        };

        function cancelarTurno(objTurno){
          $.ajax(
            {
              type:"POST",
              url:"{{route('agenda.cancelar')}}",
              data:objTurno,
              success:function(msg){
                console.log(msg);
                $('#turnoEliminar').modal('toggle');
                calendar.refetchEvents();
                },
              error:function(){alert("Hay un error");},
            }
          );
        };

      });

</script>

@endsection
