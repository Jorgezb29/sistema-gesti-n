<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all(); // Obtener todos los menús
        return view('menus.index', compact('menus')); // Pasar a la vista
    }

    public function create()
    {
        return view('menus.create'); // Vista para crear un nuevo menú
    }

    public function store(Request $request)
    {
        Menu::create($request->all()); // Crear un nuevo menú
        return redirect()->route('menus.index'); // Redirigir a la lista de menús
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu')); // Vista para editar un menú
    }

    public function update(Request $request, Menu $menu)
    {
        $menu->update($request->all()); // Actualizar el menú
        return redirect()->route('menus.index'); // Redirigir a la lista de menús
    }

    public function destroy(Menu $menu)
    {
        $menu->delete(); // Eliminar un menú
        return redirect()->route('menus.index'); // Redirigir a la lista de menús
    }
}
