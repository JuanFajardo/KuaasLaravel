@extends('lourdes')

@section('empleado')   @endsection
@section('titulo') Proveedor @endsection


@section('modal1')
<div id="modalAgregar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content panel panel-primary">

      <div class="modal-header panel-heading">
        <b>Insertar nuevo Proveedor</b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body panel-body">
        {!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}

        <div class="row">
          <div class="col-md-6">
            <label for="proveedor_" > <b><i>Proveedor</i></b> </label>
            {!! Form::text('proveedor', null, ['class'=>'form-control letras', 'placeholder'=>'Proveedor', 'id'=>'proveedor_', 'required']) !!}
          </div>
          <div class="col-md-3">
            <label for="rubro_" > <b><i>Rubro</i></b> </label>
            {!! Form::text('rubro', null, ['class'=>'form-control', 'placeholder'=>'Rubro', 'id'=>'rubro_', 'required']) !!}
          </div>
          <div class="col-md-3">
            <label for="entidad_" > <b><i>Entidad</i></b> </label>
            {!! Form::text('entidad', null, ['class'=>'form-control', 'placeholder'=>'Entidad', 'id'=>'entidad_', 'required']) !!}
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <label for="responsable_" > <b><i>Responsable o Encargado</i></b> </label>
            {!! Form::text('responsable', null, ['class'=>'form-control', 'placeholder'=>'Responsable o Encargado', 'id'=>'responsable_', 'required']) !!}
          </div>
          <div class="col-md-3">
            <label for="ciudad_" > <b><i>Ciudad</i></b> </label>
            {!! Form::text('ciudad', null, ['class'=>'form-control', 'placeholder'=>'Ciudad', 'id'=>'ciudad_', 'required']) !!}
          </div>
          <div class="col-md-3">
            <label for="telefono_" > <b><i>Telefono o Celular</i></b> </label>
            {!! Form::text('telefono', null, ['class'=>'form-control numeros', 'placeholder'=>'Telefono o Celular', 'id'=>'telefono_', 'required', 'maxlength'=>'10']) !!}
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <label for="direccion_" > <b><i>Direccion</i></b> </label>
            {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion', 'id'=>'direccion_', 'required']) !!}
          </div>
          <div class="col-md-4">
            <label for="correo_" > <b><i>Correo Electronico</i></b> </label>
            {!! Form::email('correo', null, ['class'=>'form-control', 'placeholder'=>'Correo Electronico', 'id'=>'correo_', 'required']) !!}
          </div>
          <div class="col-md-4">
            <label for="nit_" > <b><i>NIT</i></b> </label>
            {!! Form::text('nit', null, ['class'=>'form-control', 'placeholder'=>'NIT', 'id'=>'nit_', 'required']) !!}
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
                    <b>Actualizar Proveedor</b>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body panel-body">
                    {!! Form::open(['route'=>['Proveedor.update', ':DATO_ID'], 'method'=>'PATCH', 'id'=>'form-update' ])!!}

                    <div class="row">
                      <div class="col-md-6">
                        <label for="proveedor_" > <b><i>Proveedor</i></b> </label>
                        {!! Form::text('proveedor', null, ['class'=>'form-control letras', 'placeholder'=>'Proveedor', 'id'=>'proveedor', 'required']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="rubro_" > <b><i>Rubro</i></b> </label>
                        {!! Form::text('rubro', null, ['class'=>'form-control', 'placeholder'=>'Rubro', 'id'=>'rubro', 'required']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="entidad_" > <b><i>Entidad</i></b> </label>
                        {!! Form::text('entidad', null, ['class'=>'form-control', 'placeholder'=>'Entidad', 'id'=>'entidad', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label for="responsable_" > <b><i>Responsable o Encargado</i></b> </label>
                        {!! Form::text('responsable', null, ['class'=>'form-control', 'placeholder'=>'Responsable o Encargado', 'id'=>'responsable', 'required']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="ciudad_" > <b><i>Ciudad</i></b> </label>
                        {!! Form::text('ciudad', null, ['class'=>'form-control', 'placeholder'=>'Ciudad', 'id'=>'ciudad', 'required']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="telefono_" > <b><i>Telefono o Celular</i></b> </label>
                        {!! Form::text('telefono', null, ['class'=>'form-control numeros', 'placeholder'=>'Telefono o Celular', 'id'=>'telefono', 'required', 'maxlength'=>'10']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <label for="direccion_" > <b><i>Direccion</i></b> </label>
                        {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion', 'id'=>'direccion', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="correo_" > <b><i>Correo Electronico</i></b> </label>
                        {!! Form::email('correo', null, ['class'=>'form-control', 'placeholder'=>'Correo Electronico', 'id'=>'correo', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="nit_" > <b><i>NIT</i></b> </label>
                        {!! Form::text('nit', null, ['class'=>'form-control', 'placeholder'=>'NIT', 'id'=>'nit', 'required']) !!}
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
                    <div class="panel-heading"><a href="#modalAgregar"   data-toggle="modal" class="nuevo" data-target=""> <li class="fa fa-plus"></li> Nuevo Proveedor</a>  </div>
                    <div class="panel-body">
                        <table id="tablaAgenda" class="table display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Proveedor</th>
                                    <th>Rubro</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datos as $dato)
                                    <tr data-id="{{ $dato->id }}">
                                        <td>{{$dato->id}}</td>
                                        <td>{{$dato->proveedor}}</td>
                                        <td>{{$dato->rubro}}</td>
                                        <td>{{$dato->direccion}}</td>
                                        <td>{{$dato->telefono}}</td>
                                        <td>
                                              <a href="#modalModifiar"  data-toggle="modal" data-target="" class="actualizar" style="color: #B8823B;"> <li class="fa fa-edit"></li>Editar</a> &nbsp;&nbsp;&nbsp;
                                              <a href="#"  data-toggle="modal" data-target="" style="color: #ff0000;" class="eliminar"> <li class="fa fa-trash"></li>Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! Form::open(['route'=>['Proveedor.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
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

        $('.nuevo').click(function(event){
          event.preventDefault();
          $('#form-insert').closest('form').find("input[type=text], textarea").val("");
        });

        $('.actualizar').click(function(event){
            event.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            var form = $('#form-update')
            var url = form.attr('action').replace(':DATO_ID', id);
            form.get(0).setAttribute('action', url);
            link  = '{{ asset("/index.php/Proveedor/")}}/'+id;

            $.getJSON(link, function(data, textStatus) {
                if(data.length > 0){
                    $.each(data, function(index, el) {
                      $('#proveedor').val(el.proveedor);
                      $('#rubro').val(el.rubro);
                      $('#entidad').val(el.entidad);
                      $('#responsable').val(el.responsable);
                      $('#ciudad').val(el.ciudad);
                      $('#direccion').val(el.direccion);
                      $('#telefono').val(el.telefono);
                      $('#correo').val(el.correo);
                      $('#nit').val(el.nit);

                    });
                }else{
                    //
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

            if(confirm('Esta seguro de eliminar al Empleado'))
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
