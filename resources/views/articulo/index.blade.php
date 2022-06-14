@extends('plantilla.plantilla')

@section('contenido')

<a href="articulos/create" class="btn btn-success">CREAR</a>

<table class="table table-striped table-hover mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Código</th>
            <th scope="col">Descripción</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articulos as $articulo)
        <tr>
            <td>{{ $articulo->id }}</td>
            <td>{{ $articulo->codigo }}</td>
            <td>{{ $articulo->descripcion }}</td>
            <td>{{ $articulo->cantidad }}</td>
            <td>{{ $articulo->precio }}</td>
            <td>
                <form action="{{route('articulos.destroy', $articulo->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/articulos/{{ $articulo->id }}/edit" class="btn btn-success">Editar</a>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection