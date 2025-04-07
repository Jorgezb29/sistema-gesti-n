<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all(); // Obtener todos los usuarios
        return view('usuarios.index', compact('usuarios')); // Pasar a la vista
    }

    public function create()
    {
        return view('usuarios.create'); // Vista para crear un nuevo usuario
    }

    public function store(Request $request)
    {
        Usuario::create($request->all()); // Crear un nuevo usuario
        return redirect()->route('usuarios.index'); // Redirigir a la lista de usuarios
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario')); // Vista para editar un usuario
    }

    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update($request->all()); // Actualizar los datos del usuario
        return redirect()->route('usuarios.index'); // Redirigir a la lista de usuarios
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete(); // Eliminar un usuario
        return redirect()->route('usuarios.index'); // Redirigir a la lista de usuarios
    }
}
