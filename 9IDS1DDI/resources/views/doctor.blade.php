@extends('adminlte::page')

@section('title', 'Agregar Doctor')

@section('content_header')

    <link href="http://mx.geocities.com/mipagina/favicon.ico" type="image/x-icon" rel="shortcut icon" />
@stop

@section('content')

<div class="container mt-5 mx-3 my-3"> <!-- Agregamos las clases "mx-3" y "my-3" para agregar margen horizontal y vertical -->
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div style=" background-color:#1466C3; color:#fff"  class="bg text-white p-3 mb-3 rounded-top">
                    <h2 class="text-center">Datos del Doctor</h2>
            </div>
            <form action="{{ route('doctor.guardar')}}" method="POST" class="shadow p-3 mb-5 bg-white rounded" style="animation: fadeInUp;">
                @csrf
                <input type="hidden" name="id" value="{{$doctor->id}}">
                <div class="form-group row">
                    <label for="codigo" class="col-sm-3 col-form-label">Cedula:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control input-animation" id="cedula" name="cedula" value="{{$doctor->cedula}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control input-animation" id="nombre" name="nombre" value="{{$doctor->nombre}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Telefono:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control input-animation" id="telefono" name="telefono" value="{{$doctor->telefono}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Correo:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control input-animation" id="correo" name="correo" value="{{$doctor->correo}}" required>
                    </div>
                </div>
                <center>
                <button id="saberBtn" style=" background-color:#1466C3; color:#fff"  type="submit" class="btn">Guardar</button>
                </center>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
    <style>
        body{
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
         line-height: 1.5;
  
        }
        .input-animation {
            border: none;
            border-bottom: 1px solid #ccc; /* Línea de fondo */
            transition: all 0.3s ease-in-out; /* Transición suave */
        }

        .input-animation:focus {
            border-bottom-color: #80bdff; /* Cambio de color al enfocar */
            box-shadow: none; /* Quita la sombra al enfocar */
            outline: none; /* Quita el borde al enfocar */
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@stop