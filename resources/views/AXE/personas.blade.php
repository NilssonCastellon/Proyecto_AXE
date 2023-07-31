@extends('adminlte::page')

@section('title', 'AXE')
@section('content_header')
<center>
    <h1>Detalles personas</h1>
</center>
<blockquote class="blockquote text-center">
    <p class="mb-0">Personas registradas en el sistema AXE.</p>
    <footer class="blockquote-footer">Existencia <cite title="Source Title">Completados</cite></footer>
</blockquote>
@stop

@section('content')

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#personas">+ Nuevo</button>
<div class="modal fade bd-example-modal-sm" id="personas" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ingresa una Nueva Persona</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingrese los Datos:</p>
            </div>
            <div class="modal-footer">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <form action="{{url('personas/insertar')}}" method="post">
                        @csrf
                <!-- INICIO --->
                        <div class="mb-3 mt-3">
                            <label for="NOMBRE" class="form-label">Nombres de la persona</label>
                            <input type="text" class="form-control" id="NOMBRE" name="NOMBRE" placeholder="Ingrese los nombres de la persona">
                        </div>
                 <!-- FIN --->
                        <div class="mb-3 mt-3">
                                       <label for="personas" class="form-label">Apellidos</label>
                                      <input type="text" class="form-control" id="APELLIDO" name="APELLIDO" placeholder="Ingrese los apellidos de la persona">
                         </div>
    <div class="mb-3">
      <label for="personas" class="form-label">Numeros de identidad</label>
      <input type="text" class="form-control" id="" name="IDENTIDAD" placeholder="Ingrese numero de identidad de la persona">
    </div>

<div class="mb-3">
  <label for="personas" class="form-label">Género</label>
  <select class="form-select" id="GENERO" name="GENERO">
    <option value="M" selected>Masculino</option>
    <option value="F"selected>Femenino</option>
  </select>
</div>

<div class="mb-3">
  <label for="personas" class="form-label">Tipo persona</label>
  <input type="text" class="form-control" id="TIPO_PERSONA" name="TIPO_PERSONA" placeholder="Ingrese tipo de persona">
</div>
<div class="mb-3">
  <label for="personas" class="form-label">Edad</label>
  <input type="text" class="form-control" id="EDAD" name="EDAD" placeholder="Ingrese la edad">
</div>
<div class="mb-3">
  <label for="personas" class="form-label">Fecha de naciemiento</label>
  <input type="text" class="form-control" id="FECHA_NACIMIENTO" name="FECHA_NACIMIENTO" placeholder="Ingrese fecha de naciemiento">
</div>
<div class="mb-3">
  <label for="personas" class="form-label">Fecha salida</label>
  <input type="text" class="form-control" id="FECHA_SALIDA" name="FECHA_SALIDA" placeholder="Ingrese fecha de salida">
</div>

                        <button type="submit" class="btn btn-primary">Añadir</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<table cellspacing="10" cellpadding="10" class="Table table-hover table-hover table-responsive table-dark table-striped mt-1" style="border:2px solid lime;">
    <thead>
        <th>Código_Persona</th> 
        <th>Nombres</th> 
        <th>Apellidos</th>
        <th>Numero de identidad</th>
        <th>Genero</th>
        <th>Tipo de persona</th>
        <th>Edad</th>
        <th>Fecha nacimiento</th>
        <th>Fecha registro</th>
        <th>Fecha salida</th>
        <th>Opciones de la Tabla</th>
        <th></th>
    </thead>
    <tbody>
        @foreach($citaArreglo as $personas)
        <tr>
            <td>{{$personas['COD_PERSONA']}}</td>
            <td>{{$personas['NOMBRE']}}</td>
            <td>{{$personas['APELLIDO']}}</td>
            <td>{{$personas['IDENTIDAD']}}</td>
            <td>{{$personas['GENERO']}}</td>
            <td>{{$personas['TIPO_PERSONA']}}</td>
            <td>{{$personas['EDAD']}}</td>
            <td>{{$personas['FECHA_NACIMIENTO']}}</td>
            <td>{{$personas['FECHA_REGISTRO']}}</td>
            <td>{{$personas['FECHA_SALIDA']}}</td>
            <td>
                <button value="Editar" title="Editar" class="btn btn-outline-info" type="button" data-toggle="modal" data-target="#personas-edit-{{$personas['COD_PERSONA']}}">
                    <i class='fas fa-edit' style='font-size:13px;color:cyan'></i> Editar
                </button>
                <div class="modal fade bd-example-modal-sm" id="personas-edit-{{$personas['COD_PERSONA']}}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Actualiza la persona seleccionada</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Ingresa los Nuevos Datos</p>
                            </div>
                            <div class="modal-footer">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <form action="{{url('personas/actualizar')}}" method="post">
                                        @csrf
                                        <input type="hidden" class="form-control" name="COD_PERSONA" value="{{$personas['COD_PERSONA']}}">
                                        <div class="mb-3 mt-3">
                                            <label for="NOMBRE" class="form-label">Nombres de la persona</label>
                                            <input type="text" class="form-control" id="NOMBRE" name="NOMBRE" placeholder="Ingrese los nombres de la persona" value="{{$personas['NOMBRE']}}">
                                        </div>
                                        <div class="mb-3 mt-3">
                                       <label for="personas" class="form-label">Apellidos</label>
                                      <input type="text" class="form-control" id="APELLIDO" name="APELLIDO" placeholder="Ingrese los apellidos de la persona"value="{{$personas['APELLIDO']}}">
                                      </div>
                                      <div class="mb-3">
  <label for="personas" class="form-label">Numeros de identidad</label>
  <input type="text" class="form-control" id="" name="IDENTIDAD" placeholder="Ingrese numero de identidad de la persona"value="{{$personas['IDENTIDAD']}}">
</div>

<div class="mb-3">
  <label for="personas" class="form-label">Género</label>
  <select class="form-select" id="GENERO" name="GENERO">
    <option value="M" {{ $personas['GENERO'] === 'M' ? 'selected' : '' }}>Masculino</option>
    <option value="F" {{ $personas['GENERO'] === 'F' ? 'selected' : '' }}>Femenino</option>
  </select>
</div>

<div class="mb-3">
  <label for="personas" class="form-label">Tipo persona</label>
  <input type="text" class="form-control" id="TIPO_PERSONA" name="TIPO_PERSONA" placeholder="Ingrese tipo de persona"value="{{$personas['TIPO_PERSONA']}}">
</div>
<div class="mb-3">
  <label for="personas" class="form-label">Edad</label>
  <input type="text" class="form-control" id="EDAD" name="EDAD" placeholder="Ingrese la edad"value="{{$personas['EDAD']}}">
</div>
<div class="mb-3">
  <label for="personas" class="form-label">Fecha de naciemiento</label>
  <input type="text" class="form-control" id="FECHA_NACIMIENTO" name="FECHA_NACIMIENTO" placeholder="Ingrese fecha de naciemiento"value="{{$personas['FECHA_NACIMIENTO']}}">
</div>
<div class="mb-3">
  <label for="personas" class="form-label">Fecha salida</label>
  <input type="text" class="form-control" id="FECHA_SALIDA" name="FECHA_SALIDA" placeholder="Ingrese fecha de salida"value="{{$personas['FECHA_SALIDA']}}">
</div>



                                        <!-- ... otros campos del formulario ... -->
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                       
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">cancelar</button>
          </form>
          </div><!-- DIV PARA CENTRAR FORMULARIO--->
       
      </div>
    </div>
  </div>
</div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop