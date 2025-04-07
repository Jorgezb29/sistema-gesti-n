{{-- resources/views/documentos/internos/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Documentos Internos</h2>
        <div class="row">
            @foreach ($documentos as $documento)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ $documento->titulo }}</div>
                        <div class="card-body">
                            <p>{{ $documento->descripcion }}</p>
                            <a href="{{ route('documentos.internos.show', $documento) }}" class="btn btn-primary">Ver Documento</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
