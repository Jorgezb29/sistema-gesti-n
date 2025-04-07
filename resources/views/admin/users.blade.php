<!-- resources/views/admin/users.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Usuarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- Puedes añadir botones para editar o eliminar usuarios -->
                        <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                        <!-- Aquí puedes agregar funcionalidad para eliminar usuarios -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
