!-- resources/views/oficinas/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Oficina: {{ $oficina->nombre }}</h2>

        <form action="{{ route('oficinas.assignMenus', $oficina) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $oficina->nombre }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control">{{ $oficina->descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label for="menus">Menús Disponibles</label>
                <select name="menus[]" id="menus" class="form-control" multiple required>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}" {{ in_array($menu->id, $oficina->menus->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $menu->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
        </form>
    </div>
@endsection