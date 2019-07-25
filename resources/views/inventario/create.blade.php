@extends('bett0')

@section('empleado')   @endsection
@section('titulo') Inventario @endsection

@section('cuerpo')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                  <a class="btn btn-primary" href="{{asset('index.php/Bien')}}"> <i class="fa fa-list"></i> Lista de Colegio</a>
                  <a class="btn btn-success" href="{{asset('index.php/Inventario/'.$id.'/Global')}}" > <i class="fa fa-book"></i> Datos nuevos del colegio</a>
                  <a class="btn btn-primary" href="{{asset('index.php/Inventario/')}}" > <i class="fa fa-list"></i> Lista de Inventario</a>
                  <div class="modal-body panel-body">
                    {!! Form::open([ 'action'=>'InventarioController@store', 'accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}
                    <div class="row">
                      <div class="col-md-4">
                        <label for="curso" > <b><i>Curso</i></b> </label>
                        {!! Form::text('curso', null, ['class'=>'form-control', 'placeholder'=>'Curso o Ambiente', 'id'=>'curso', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="anio" > <b><i>Año / Gestio</i></b> </label>
                        {!! Form::text('anio', null, ['class'=>'form-control', 'placeholder'=>'Entidad', 'id'=>'anio', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="estado" > <b><i>Estado</i></b> </label>
                        {!! Form::text('estado', null, ['class'=>'form-control', 'placeholder'=>'Estado:Bueno/Mal/No Sirve', 'id'=>'estado', 'required']) !!}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <label for="observacion" > <b><i>Observacion</i></b> </label>
                        {!! Form::text('observacion', null, ['class'=>'form-control', 'placeholder'=>'Caracteristicas', 'id'=>'observacion', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="codigo_cajon" > <b><i>Codigo del cajon</i></b> </label>
                        {!! Form::text('codigo_cajon', null, ['class'=>'form-control', 'placeholder'=>'Codigo del cajon', 'id'=>'codigo_cajon', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="codigo" > <b><i>Codigo</i></b> </label>
                        {!! Form::text('codigo', null, ['class'=>'form-control', 'placeholder'=>'codigo', 'id'=>'codigo', 'required']) !!}
                      </div>
                    </div>
                    <hr>
                    {!! Form::hidden('bett0', 'JuanFajardo') !!}
                    {!! Form::hidden('bien_id', $id) !!}
                    {!! Form::submit('Insertar', ['class'=>'agregar btn btn-primary']) !!}
                    {!! Form::close() !!}
                    <hr>
                    <hr>

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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                  </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
          $('#codigo_cajon').val('');
          $('#codigo').val('');
          $('#codigo_cajon').focus();
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
                },
                "pageLength": 6
            });
        });
    </script>
@endsection
