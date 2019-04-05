@extends('layout')

@section('titulo', "Catalogo de contactos")

@section('contenido')

    <div class="mt-5 d-flex justify-content-between align-items-end mb-2">
        <h1 class="pb-1"> {{ $titulo }} </h1>
        <p>
            <a href="{{ route('contactos.nuevo') }}" class="btn btn-primary"> Nuevo contacto </a>
        </p>
    </div>

    <div class="card">
        @if ($contactos->isNotEmpty())
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Paterno</th>
                        <th scope="col">Materno</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactos as $contacto)
                        <tr>
                            <th scope="row"> {{ $contacto->id }} </th>
                            <td> {{ $contacto->nombre }} </td>
                            <td> {{ $contacto->ap_paterno }} </td>
                            <td> {{ $contacto->ap_materno }} </td>
                            <td> 
                                <form action="{{ route('contactos.eliminar',  $contacto) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ route('contactos.detalle', $contacto) }}" class="btn btn-link"> <span class="oi oi-eye"></span> </a>
                                    <a href="{{ route('contactos.editar',  $contacto) }}" class="btn btn-link"> <span class="oi oi-pencil"> </a> 
                                    <button type="submit" class="btn btn-link"> <span class="oi oi-trash"></span> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Paginacion --->
            <div class="d-flex justify-content-center">
                    {!! $contactos->render() !!}
            </div>
        @else
            <p> No hay contactos registrados </p>
        @endif
    </div>

@endsection