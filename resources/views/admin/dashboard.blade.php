<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido al Panel de Administración</h1>
    <p>Gestiona usuarios, documentos y más.</p>

    <div>
        <a href="{{ route('admin.users') }}" class="btn btn-primary">Ver usuarios</a>
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Gestionar documentos</a>
    </div>
</div>
@endsection
