@extends('plantilla.plantilla')

@section('contenido')

    <h2>EDITAR REGISTROS</h2>
    @foreach($articulo as $articulo)
    <form action="/articulos/{{ $articulo->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Código</label>
            <input id="codigo" name="codigo" class="form-control" type="text" tabindex="1" value="{{ $articulo->codigo }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripción</label>
            <input id="descripcion" name="descripcion" class="form-control" type="text" tabindex="2" value="{{ $articulo->descripcion }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Cantidad</label>
            <input id="cantidad" name="cantidad" class="form-control" type="text" tabindex="3" value="{{ $articulo->cantidad }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio</label>
            <input id="precio" name="precio" class="form-control" type="number" step="any" tabindex="4" value="{{ $articulo->precio }}">
        </div>

        <a href="/articulos" class="btn btn-warning" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-success" tabindex="6">Guardar</button>
    </form>
    @endforeach
    
@endsection