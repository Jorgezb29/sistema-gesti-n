@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>{{ __('Bienvenido al Sistema de Gestión de Documentos!') }}</h3>

                    <div class="mt-4">
                        <div class="row">
                            <!-- Mis Documentos Internos -->
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        {{ __('Mis Documentos Internos') }}
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('documentos.internos.index') }}" class="btn btn-primary">Ver Mis Documentos Internos</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Documentos Externos -->
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        {{ __('Documentos Externos') }}
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('documentos.externos.index') }}" class="btn btn-primary">Ver Documentos Externos</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Documentos Compartidos -->
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        {{ __('Documentos Compartidos') }}
                                    </div>
                                    <div class="card-body">
                                        <!-- Corregir la ruta -->
                                        <a href="{{ route('documentos.compartidos.index') }}" class="btn btn-primary">Ver Documentos Compartidos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Información adicional o funcionalidades específicas -->
                    <div class="mt-4">
                        <p>Desde aquí puedes gestionar tus documentos, crear carpetas, y compartir archivos con otras oficinas según sea necesario.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
