@extends('lourdes')

@section('empleado')   @endsection
@section('titulo') Inventario @endsection

@section('modal2')
    <div id="modalModifiar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content panel panel-warning ">

                <div class="modal-header panel-heading">
                    <b>Actualizar </b>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body panel-body">
                    {!! Form::open(['route'=>['Inventario.update', ':DATO_ID'], 'method'=>'PATCH', 'id'=>'form-update' ])!!}

                    <div class="row">
                      <div class="col-md-4">
                        <label for="curso" > <b><i>Proveedor</i></b> </label>
                        {!! Form::text('curso', null, ['class'=>'form-control', 'placeholder'=>'Curso', 'id'=>'curso', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="anio" > <b><i>Rubro</i></b> </label>
                        {!! Form::text('anio', null, ['class'=>'form-control', 'placeholder'=>'Gestion', 'id'=>'anio', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="estado" > <b><i>Estado</i></b> </label>
                        {!! Form::text('estado', null, ['class'=>'form-control', 'placeholder'=>'Estado', 'id'=>'estado', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <label for="bien_id" > <b><i>Escuela</i></b> </label>
                        {!! Form::select('bien_id', \App\Bien::pluck('colegio', 'id'),  null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'bien_id', 'required']) !!}
                      </div>
                      <div class="col-md-8">
                        <label for="observacion" > <b><i>Observacion</i></b> </label>
                        {!! Form::text('observacion', null, ['class'=>'form-control', 'placeholder'=>'Observacion', 'id'=>'observacion', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-6">
                        <label for="codigo_cajon" > <b><i>Codigo del Cajon</i></b> </label>
                        {!! Form::text('codigo_cajon', null, ['class'=>'form-control', 'placeholder'=>'Codigo del cajon', 'id'=>'codigo_cajon', 'required']) !!}
                      </div>
                      <div class="col-md-6">
                        <label for="codigo" > <b><i>Codigo</i></b> </label>
                        {!! Form::text('codigo', null, ['class'=>'form-control', 'placeholder'=>'Codigo', 'id'=>'codigo', 'required']) !!}
                      </div>
                    </div>



                    <hr>

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
                    <div class="panel-heading"><a href="{{asset('index.php')}}"   >  Inicio </a>  </div>
                    <div class="panel-body">
                        <table id="tablaAgenda" class="table display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Colegio</th>
                                    <th>Director Telefono</th>
                                    <th>Gestion</th>
                                    <th>Estado</th>
                                    <th>Codigos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datos as $dato)
                                    <tr data-id="{{ $dato->id }}">
                                        <td>{{$dato->id}}</td>
                                        <td>{{ (explode(" ", $dato->created_at))[0] }}</td>
                                        <td>{{$dato->colegio}}</td>
                                        <td>{{$dato->responsable}} - {{$dato->telefono}}</td>
                                        <td>{{$dato->anio}}</td>
                                        <td>{{$dato->estado}}</td>
                                        <td>{{$dato->codigo_cajon}} - {{$dato->codigo}}</td>
                                        <td>
                                              <a href="#modalModifiar"  data-toggle="modal" data-target="" class="actualizar" style="color: #B8823B;"> <li class="fa fa-edit"></li>Editar</a> &nbsp;&nbsp;&nbsp;
                                              <!--<a href="#"  data-toggle="modal" data-target="" style="color: #ff0000;" class="eliminar"> <li class="fa fa-trash"></li>Eliminar</a>-->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! Form::open(['route'=>['Inventario.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
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

        $('.actualizar').click(function(event){
            event.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            var form = $('#form-update')
            var url = form.attr('action').replace(':DATO_ID', id);
            form.get(0).setAttribute('action', url);
            link  = '{{ asset("/index.php/Inventario/")}}/'+id;
            // 'curso', 'anio', 'estado', 'observacion', 'codigo', 'codigo_cajon', 'bien_id'
            $.getJSON(link, function(data, textStatus) {
                if(data.length > 0){
                    $.each(data, function(index, el) {
                      $('#curso').val(el.curso);
                      $('#anio').val(el.anio);
                      $('#estado').val(el.estado);
                      $('#observacion').val(el.observacion);
                      $('#codigo').val(el.codigo);
                      $('#codigo_cajon').val(el.codigo_cajon);
                      $('#bien_id').val(el.bien_id);
                    });
                }else{
                    //
                }
            });
        });

        /*
        $('.eliminar').click(function(event) {
            event.preventDefault();
            var fila = $(this).parents('tr');
            var id = fila.data('id');
            var form = $('#form-delete');
            var url = form.attr('action').replace(':DATO_ID',id);
            var data = form.serialize();

            if(confirm('Esta seguro de eliminar el Inventario'))
            {
                $.post(url, data, function(result, textStatus, xhr) {
                    alert(result);
                    fila.fadeOut();
                }).fail(function(esp){
                    fila.show();
                });
            }
        });
        */
    </script>
@endsection
