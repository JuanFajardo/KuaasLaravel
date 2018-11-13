@extends('lourdes')

@section('empleado')   @endsection
@section('titulo') Inventario @endsection

@section('cuerpo')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{{asset('index.php')}}"   >  Inicio </a>
                  </div>
                  <div class="modal-body panel-body">
                    {!! Form::open(['action'=>'InventarioController@datos', 'accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}

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
                    <div class="">
                      <div class="col-md-12">
                        <label for="observacion" > <b><i>Observacion</i></b> </label>
                        {!! Form::textarea('observacion', null, ['class'=>'form-control', 'placeholder'=>'Caracteristicas', 'id'=>'observacion', 'required']) !!}
                      </div>
                    </div>
                    <hr>
                    {!! Form::hidden('bett0', 'bett0') !!}
                    {!! Form::hidden('bien_id', $id) !!}
                    {!! Form::submit('Insertar Codigos', ['class'=>'agregar btn btn-primary']) !!}
                    {!! Form::close() !!}
                  </div>
                </div>
            </div>
        </div>
@endsection
