@extends('layout')

@section('titulo', "Crear contacto")

@section('contenido')

    <h4 class="mt-5"> Editar contacto </h4>

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

    <form method="POST" action="{{ url("contactos/{$contacto->id}") }}">
        {{ method_field('PUT') }}
        {!! csrf_field() !!} <!-- Token -->
        
        <input type="hidden" name="idcontacto" value="{{$contacto->id}}">

        <!-- CONTACTO -->
        <div class="form-group">
                <label for="nombre"> <b>Nombre</b> </label>
                <input type="text" class="form-control" name='nombre' id="nombre" placeholder="Gerardo" value="{{ old('nombre', $contacto->nombre) }}"> 
            </div>
    
            <div class="form-group">
                <label for="ap_paterno"> <b>Apellido paterno</b> </label>
                <input type="text" class="form-control" name='ap_paterno' id="ap_paterno" placeholder="Treviño"value="{{ old('nombre', $contacto->ap_paterno) }}">
            </div>
    
            <div class="form-group">
                <label for="ap_materno"> <b>Apellido materno</b> </label>
                <input type="text" class="form-control" name='ap_materno' id="ap_materno" placeholder="Montelongo" value="{{ old('nombre', $contacto->ap_materno) }}">
            </div>
    
            <div class="form-group">
                <label for="fecha_nacimiento"> <b>Fecha de nacimiento</b> </label>
                <input type="date" class="form-control" name='fecha_nacimiento' id="fecha_nacimiento" value="{{ old('nombre', $contacto->fecha_nacimiento) }}">
            </div>
    
            <div class="form-group">
                <label for="alias"> <b>Alias</b> </label>
                <input type="text" class="form-control" name='alias' id="alias" placeholder="Zero" value="{{ old('nombre', $contacto->alias) }}">
            </div>
            <!-- EMAIL -->
            <div class="form-group">
                <label for="alias"> <b>Email</b> </label> <a id="agregarEmail" href="#"> + </a>
                @foreach ($emails AS $email)
                    <input type="email" class="form-control" name='emails[]' id="email" placeholder="prueba@prueba.com" value="{{ old('email', $email->email) }}">
                    <input type="hidden" name="idemail[]" value="{{$email->id}}">
                @endforeach
                <div id="contenedorEmail">
                    <div class="addedEmail">   
                    </div>   
                </div>
            </div>
            <!-- DIRECCION -->
            <div class="form-group">
                <label for="alias"> <b>Direccion</b> </label> <a id="agregarDireccion" href="#"> + </a>
                @foreach ($direcciones AS $direccion)
                    <input type="text" class="form-control" name='direcciones[]' id="direccion" placeholder="Calle # 123" value="{{ old('direccion', $direccion->direccion) }}">
                    <input type="hidden" name="iddireccion[]" value="{{$direccion->id}}">
                @endforeach
                <div id="contenedorDireccion">
                    <div class="addedDireccion">   
                    </div>    
                </div>
            </div>
            <!-- TELEFONO -->
            <div class="form-group">
                <label for="alias"> <b>Telefono</b> </label> <a id="agregarTelefono" href="#"> + </a>
                @foreach ($telefonos AS $telefono)
                    <div class="input-group">
                        <input type="text" class="form-control" name='descripciones[]' id="descripcion" placeholder="11 11 11 11 11" value="{{ old('descripcion', $telefono->descripcion) }}">
                        <input type="text" class="form-control" name='telefonos[]' id="telefono" placeholder="11 11 11 11 11" value="{{ old('telefono', $telefono->telefono) }}">
                        <input type="hidden" name="idtelefono[]" value="{{$telefono->id}}">
                    </div>
                @endforeach
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
        <button type="submit" class="btn btn-primary"> Actualizar contacto </button>
    </form>

    <br>
    <p>
        <a href="{{ route('contactos.index') }}"> Regresar al catalogo de contactos </a>
    </p>

@endsection