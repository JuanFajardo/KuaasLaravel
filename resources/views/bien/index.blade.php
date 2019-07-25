@extends('bett0')

@section('empleado')   @endsection
@section('titulo') Bienes @endsection

@section('modal1')
<div id="modalAgregar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content panel panel-primary">

      <div class="modal-header panel-heading">
        <b>Nuevo</b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body panel-body">
        {!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}

        <div class="row">
          <div class="col-md-12">
            <label for="bien_" > <b><i>Colegio</i></b> </label>
            {!! Form::text('colegio', null, ['class'=>'form-control', 'placeholder'=>'Colegio', 'id'=>'colegio_', 'required']) !!}
          </div>
        </div>

        <hr>
        <div class="row">
          <div class="col-md-4">
            <label for="responsable_" > <b><i>Director/Responsable</i></b> </label>
            {!! Form::text('responsable', null, ['class'=>'form-control', 'placeholder'=>'Responsable', 'id'=>'responsable_', 'required']) !!}
          </div>
          <div class="col-md-4">
            <label for="telefono_" > <b><i>Telefono/Celular</i></b> </label>
            {!! Form::text('telefono', null, ['class'=>'form-control', 'placeholder'=>'Telefono/Celular', 'id'=>'telefono_', 'required']) !!}
          </div>
          <div class="col-md-4">
            <label for="observacion_" > <b><i>Observacion</i></b> </label>
            {!! Form::text('observacion', null, ['class'=>'form-control', 'placeholder'=>'Observacion', 'id'=>'observacion_', 'required']) !!}
          </div>
        </div>

        <hr>
        <div class="row">
          <div class="col-md-4">
            <label for="profesor_" > <b><i>Profesor Computacion</i></b> </label>
            {!! Form::text('profesor', null, ['class'=>'form-control', 'placeholder'=>'Profesor Computacion', 'id'=>'profesor_', 'required']) !!}
          </div>
          <div class="col-md-4">
            <label for="celular_profesor_" > <b><i>Telefono/Celular</i></b> </label>
            {!! Form::text('celular_profesor', null, ['class'=>'form-control', 'placeholder'=>'Telefono/Celular', 'id'=>'celular_profesor_', 'required']) !!}
          </div>
          <div class="col-md-4">
            <label for="observacion_profesor_" > <b><i>Observacion</i></b> </label>
            {!! Form::text('observacion_profesor', null, ['class'=>'form-control', 'placeholder'=>'Observacion', 'id'=>'observacion_profesor_', 'required']) !!}
          </div>
        </div>

        <hr>
        <div class="row">
          <div class="col-md-6">
            <label for="nombre1_" > <b><i>Tecnico 1</i></b> </label>
            {!! Form::text('nombre1', null, ['class'=>'form-control', 'placeholder'=>'Nombre Tecnico 1', 'id'=>'nombre1_', 'required']) !!}
          </div>
          <div class="col-md-6">
            <label for="ci1_" > <b><i>CI 1</i></b> </label>
            {!! Form::text('ci1', null, ['class'=>'form-control', 'placeholder'=>'Documento Identidad', 'id'=>'ci1_', 'required']) !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="nombre2_" > <b><i>Tecnico 2</i></b> </label>
            {!! Form::text('nombre2', null, ['class'=>'form-control', 'placeholder'=>'Nombre Tecnico 2', 'id'=>'nombre2_', 'required']) !!}
          </div>
          <div class="col-md-6">
            <label for="ci2_" > <b><i>CI 2</i></b> </label>
            {!! Form::text('ci2', null, ['class'=>'form-control', 'placeholder'=>'Documento Identidad', 'id'=>'ci2_', 'required']) !!}
          </div>
        </div>

        <hr>

        {!! Form::hidden('id_usuario', '1') !!}
        {!! Form::submit('A&ntilde;adir', ['class'=>'agregar btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>

    </div>
  </div>
</div>
@endsection

@section('modal2')
    <div id="modalModifiar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content panel panel-warning ">

                <div class="modal-header panel-heading">
                    <b>Actualizar </b>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body panel-body">
                    {!! Form::open(['route'=>['Bien.update', ':DATO_ID'], 'method'=>'PATCH', 'id'=>'form-update' ])!!}

                    <div class="row">
                      <div class="col-md-12">
                        <label for="bien" > <b><i>Colegio</i></b> </label>
                        {!! Form::text('colegio', null, ['class'=>'form-control', 'placeholder'=>'Colegio', 'id'=>'colegio', 'required']) !!}
                      </div>
                    </div>

                    <hr>
                    <div class="row">
                      <div class="col-md-4">
                        <label for="responsable" > <b><i>Director/Responsable</i></b> </label>
                        {!! Form::text('responsable', null, ['class'=>'form-control', 'placeholder'=>'Responsable', 'id'=>'responsable', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="telefono" > <b><i>Telefono/Celular</i></b> </label>
                        {!! Form::text('telefono', null, ['class'=>'form-control', 'placeholder'=>'Telefono/Celular', 'id'=>'telefono', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="observacion" > <b><i>Observacion</i></b> </label>
                        {!! Form::text('observacion', null, ['class'=>'form-control', 'placeholder'=>'Observacion', 'id'=>'observacion', 'required']) !!}
                      </div>
                    </div>

                    <hr>
                    <div class="row">
                      <div class="col-md-4">
                        <label for="profesor" > <b><i>Profesor Computacion</i></b> </label>
                        {!! Form::text('profesor', null, ['class'=>'form-control', 'placeholder'=>'Profesor Computacion', 'id'=>'profesor', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="celular_profesor" > <b><i>Telefono/Celular</i></b> </label>
                        {!! Form::text('celular_profesor', null, ['class'=>'form-control', 'placeholder'=>'Telefono/Celular', 'id'=>'celular_profesor', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="observacion_profesor" > <b><i>Observacion</i></b> </label>
                        {!! Form::text('observacion_profesor', null, ['class'=>'form-control', 'placeholder'=>'Observacion', 'id'=>'observacion_profesor', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label for="nombre1" > <b><i>Tecnico 1</i></b> </label>
                        {!! Form::text('nombre1', null, ['class'=>'form-control', 'placeholder'=>'Nombre Tecnico 1', 'id'=>'nombre1', 'required']) !!}
                      </div>
                      <div class="col-md-6">
                        <label for="ci1" > <b><i>CI 1</i></b> </label>
                        {!! Form::text('ci1', null, ['class'=>'form-control', 'placeholder'=>'Documento Identidad', 'id'=>'ci1', 'required']) !!}
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="nombre2" > <b><i>Tecnico 2</i></b> </label>
                        {!! Form::text('nombre2', null, ['class'=>'form-control', 'placeholder'=>'Nombre Tecnico 2', 'id'=>'nombre2', 'required']) !!}
                      </div>
                      <div class="col-md-6">
                        <label for="ci2" > <b><i>CI 2</i></b> </label>
                        {!! Form::text('ci2', null, ['class'=>'form-control', 'placeholder'=>'Documento Identidad', 'id'=>'ci2', 'required']) !!}
                      </div>
                    </div>
                    <hr>

                    {!! Form::hidden('id_usuario', '1') !!}

                    {!! Form::submit('Actualizar ', ['class'=>'btn btn-warning']) !!}
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection


@section('cuerpo')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <br>
                      <a href="#modalAgregar"   data-toggle="modal" class="nuevo btn btn-primary" data-target=""> <li class="fa fa-plus"></li> Nuevo </a>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="{{asset('index.php')}}"   class="btn btn-warning">  <b> <i class="fa fa-home"></i> Inicio</b> </a>
                      <br><br>
                    </div>
                    <div class="panel-body">
                        <table id="tablaAgenda" class="table display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Colegio</th>
                                    <th>Responsable</th>
                                    <th>Contacto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datos as $dato)
                                    <tr data-id="{{ $dato->id }}">
                                        <td>{{$dato->id}}</td>
                                        <td>{{ (explode(" ", $dato->created_at))[0] }}</td>
                                        <td>{{$dato->colegio}}</td>
                                        <td>{{$dato->responsable}}</td>
                                        <td>{{$dato->telefono}}</td>
                                        <td>
                                          <a href="{{asset('index.php/Computadoras/'.$dato->id)}}"  class="" style="color: #007bff;"> <li class="fa fa-eye"></li> Ver</a> &nbsp;&nbsp;&nbsp;
                                          <a href="{{asset('index.php/reporte/'.$dato->id)}}"  class="" style="color: #007bff;"> <li class="fa fa-file-pdf"></li> Reporte</a> &nbsp;&nbsp;&nbsp;
                                          <a href="#modalModifiar"  data-toggle="modal" data-target="" class="actualizar" style="color: #B8823B;"> <li class="fa fa-edit"></li>Editar</a> &nbsp;&nbsp;&nbsp;
                                          <a href="{{asset('index.php/Inventario/'.$dato->id.'/Global')}}"  class="" style="color: #007bff;"> <li class="fa fa-bars"></li> Insertar</a> &nbsp;&nbsp;&nbsp;
                                          <a href="#"  data-toggle="modal" data-target="" style="color: #ff0000;" class="eliminar"> <li class="fa fa-trash"></li>Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! Form::open(['route'=>['Bien.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tablaAgenda').DataTable({
                "order": [[ 0, 'desc']],
                "language": {
                    "bDeferRender": true,
                    "sEmtpyTable": "No ay registros",
                    "decimal": ",",
                    "thousands": ".",
                    "lengthMenu": "Mostrar _MENU_ datos por registros",
                    "zeroRecords": "No se encontro nada,  lo siento",
                    "info": "Mostrar paginas [_PAGE_] de [_PAGES_]",
                    "infoEmpty": "No ay entradas permitidas",
                    "search": "Buscar ",
                    "infoFiltered": "(Busqueda de _MAX_ registros en total)",
                    "oPaginate":{
                        "sLast":"Final",
                        "sFirst":"Principio",
                        "sNext":"Siguiente",
                        "sPrevious":"Anterior"
                    }
                }
            });
        });
        /*
        $('.nuevo').click(function(event){
          event.preventDefault();
          $('#form-insert').closest('form').find("input[type=text], textarea").val("");
        });
        */
        $('.actualizar').click(function(event){
            event.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            var form = $('#form-update')
            var url = form.attr('action').replace(':DATO_ID', id);
            form.get(0).setAttribute('action', url);
            link  = '{{ asset("/index.php/Bien/")}}/'+id;

            $.getJSON(link, function(data, textStatus) {
                if(data.length > 0){
                    $.each(data, function(index, el) {
                      $('#colegio').val(el.colegio);
                      $('#responsable').val(el.responsable);
                      $('#telefono').val(el.telefono);
                      $('#observacion').val(el.observacion);
                      $('#profesor').val(el.profesor);
                      $('#celular_profesor').val(el.celular_profesor);
                      $('#observacion_profesor').val(el.observacion_profesor);
                      $('#nombre1').val(el.nombre1);
                      $('#nombre2').val(el.nombre2);
                      $('#ci1').val(el.ci1);
                      $('#ci2').val(el.ci2);
                    });
                }
            });
        });

        $('.eliminar').click(function(event) {
            event.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            var form = $('#form-delete');
            var url = form.attr('action').replace(':DATO_ID',id);
            var data = form.serialize();

            if(confirm('Esta seguro de eliminar al Bien'))
            {
                $.post(url, data, function(result, textStatus, xhr) {
                    alert(result);
                    fila.fadeOut();
                }).fail(function(esp){
                    fila.show();
                });
            }
        });
    </script>
@endsection
