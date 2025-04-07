@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Documentos Externos') }}</div>

                <div class="card-body">
                    <a href="{{ route('documentos.create') }}" class="btn btn-success mb-3">Crear Nuevo Documento</a>
                    
                    <!-- Verificar si hay documentos externos -->
                    @if($documentos->isEmpty())
                        <div class="alert alert-warning">No hay documentos externos disponibles.</div>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documentos as $documento)
                                    <tr>
                                        <td>{{ $documento->nombre }}</td>
                                        <td>{{ ucfirst($documento->tipo) }}</td>
                                        <td>
                                            <!-- Enlaces a acciones -->
                                            <a href="{{ route('documentos.edit', $documento) }}" class="btn btn-warning btn-sm">Editar</a>
                                            
                                            <!-- Formulario para eliminar documento -->
                                            <form action="{{ route('documentos.destroy', $documento) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este documento?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
