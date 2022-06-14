@extends('plantilla.plantilla')

@section('contenido')

    <h2>CREAR REGISTROS</h2>
    
    <form action="/articulos" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Código</label>
            <input id="codigo" name="codigo" class="form-control" type="text" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripción</label>
            <input id="descripcion" name="descripcion" class="form-control" type="text" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Cantidad</label>
            <input id="cantidad" name="cantidad" class="form-control" type="text" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio</label>
            <input id="precio" name="precio" class="form-control" type="number" step="any" value="0.00" tabindex="4">
        </div>

        <a href="/articulos" class="btn btn-warning" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-success" tabindex="6">Guardar</button>
    </form>
@endsection