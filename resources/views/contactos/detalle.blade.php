@extends('layout')

@section('titulo', "Contacto # $buscarContacto->id ")

@section('contenido')

    <h3 class="mt-5"> DETALLE DEL CONTACTO # {{ $buscarContacto->id }} </h3>

    <div class="form-group row">

        <!-- Nos hemos traido el objeto con Eloquent -->
        @if ( !empty($foto[0]->foto)) 
            <div class="col-sm-12">
                <img src="/img/{{ $foto[0]->foto }}" width="100" alt="imagen">
            </div>
        @endif

        <div class="col-sm-12">
            <label class="col-sm-3 col-form-label"><b>Nombre</b></label>
            <label class="col-sm-7 col-form-label"> {{ $buscarContacto->nombre }}</label>
        </div>
        <div class="col-sm-12">
            <label class="col-sm-3 col-form-label"><b>Paterno</b></label>
            <label class="col-sm-7 col-form-label"> {{ $buscarContacto->ap_paterno }}</label>
        </div>
        <div class="col-sm-12">
            <label class="col-sm-3 col-form-label"><b>Materno</b></label>
            <label class="col-sm-7 col-form-label"> {{ $buscarContacto->ap_materno }}</label>
        </div>
        <div class="col-sm-12">
            <label class="col-sm-3 col-form-label"><b>Fecha nacimeinto</b></label>
            <label class="col-sm-7 col-form-label"> {{ $buscarContacto->fecha_nacimiento }}</label>
        </div>
        <div class="col-sm-12">
            <label class="col-sm-3 col-form-label"><b>Alias</b></label>
            <label class="col-sm-7 col-form-label"> {{ $buscarContacto->alias }}</label>
        </div>
        <div class="col-sm-12">
            <label class="col-sm-3 col-form-label"><b>Email</b></label>
            @foreach ($emails AS $email)
                <label class="col-sm-7 col-form-label"> {{ $email->email }}</label>
            @endforeach
        </div>
        <div class="col-sm-12">
            <label class="col-sm-3 col-form-label"><b>Telefono</b></label>
            @foreach ($telefonos AS $telefono)
                <label class="col-sm-7 col-form-label"> {{ $telefono->descripcion }}: {{ $telefono->telefono }}</label>
            @endforeach
        </div>
        <div class="col-sm-12">
            <label class="col-sm-3 col-form-label"><b>Direccion</b></label>
            @foreach ($direcciones AS $direccion)
                <label class="col-sm-7 col-form-label"> {{ $direccion->direccion }}</label>
            @endforeach
        </div>
    </div>

    <p>
        <a href="{{ route('contactos.index') }}"> Regresar al catalogo de contactos </a>
    </p>

@endsection



