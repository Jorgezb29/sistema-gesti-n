@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Documento</h1>
    <form action="{{ route('documentos.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nombre">Nombre del Documento</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
        </div>
        
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="form-control" required>
                <option value="interno">Interno</option>
                <option value="externo">Externo</option>
            </select>
        </div>

        <!-- Cambiar select por input para que se pueda escribir -->
        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <input type="text" class="form-control" name="usuario" id="usuario" required>
        </div>

        <div class="form-group">
            <label for="oficina_id">Oficina</label>
            <input type="text" class="form-control" name="oficina" id="oficina" required>
        </div>

        <div class="form-group">
            <label for="carpeta_id">Carpeta</label>
            <input type="text" class="form-control" name="carpeta" id="carpeta" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Documento</button>
    </form>
</div>
@endsection
