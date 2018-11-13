@extends('lourdes')

@section('empleado')   @endsection
@section('titulo') Bienes @endsection




@section('cuerpo')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
              <br>
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
                },
                "pageLength": 6
            });
        });

    </script>
@endsection
