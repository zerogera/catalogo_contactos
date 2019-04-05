@extends('layout')
@section('titulo', "Crear contacto")

@section('contenido')

    <h4 class="mt-5"> Crear contacto </h4>

    
    <!-- Mensaje de error -->
    @if($errors->any())
        <div class="alert alert-danger">
            <h6> Por favor corrige los siguientes errores: </h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('contactos/crear') }}" enctype="multipart/form-data">
        {!! csrf_field() !!} <!-- Token -->

        <div class="form-group">
            <label for="nombre"> <b>Nombre</b> </label>
            <input type="text" class="form-control" name='nombre' id="nombre" placeholder="Gerardo" value="{{ old('nombre') }}"> 
        </div>

        <div class="form-group">
            <label for="ap_paterno"> <b>Apellido paterno</b> </label>
            <input type="text" class="form-control" name='ap_paterno' id="ap_paterno" placeholder="Treviño" value="{{ old('ap_paterno') }}">
        </div>

        <div class="form-group">
            <label for="ap_materno"> <b>Apellido materno</b> </label>
            <input type="text" class="form-control" name='ap_materno' id="ap_materno" placeholder="Montelongo" value="{{ old('ap_materno') }}">
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento"> <b>Fecha de nacimiento</b> </label>
            <input type="date" class="form-control" name='fecha_nacimiento' id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
        </div>

        <div class="form-group">
            <label for="alias"> <b>Alias</b> </label>
            <input type="text" class="form-control" name='alias' id="alias" placeholder="Zero" value="{{ old('alias') }}">
        </div>
        
        <div class="form-group">
            <label for="alias"> <b>Email</b> </label> <a id="agregarEmail" href="#"> + </a>
            <div id="contenedorEmail">
                <div class="addedEmail">   
                </div>   
            </div>
        </div>

        <div class="form-group">
            <label for="alias"> <b>Direccion</b> </label> <a id="agregarDireccion" href="#"> + </a>
            <div id="contenedorDireccion">
                <div class="addedDireccion">   
                </div>    
            </div>
        </div>

        <div class="form-group">
            <label for="alias"> <b>Telefono</b> </label> <a id="agregarTelefono" href="#"> + </a>
            <div id="contenedorTelefono">
                <div class="addedTelefono">   
                </div>    
            </div>
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento"> <b>Imagen</b> </label>
            <input type="file" class="form-control" name='imagen' id="imagen">
        </div>

        <br>
        <button type="submit" class="btn btn-primary"> Crear contacto </button>
    </form>

    <br>
    <p>
        <a href="{{ route('contactos.index') }}"> Regresar al catalogo de contactos </a>
    </p>

@endsection



