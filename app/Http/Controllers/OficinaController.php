<?php

namespace App\Http\Controllers;

use App\Models\Oficina;
use App\Models\Menu; // Importamos el modelo de Menú
use Illuminate\Http\Request;

class OficinaController extends Controller
{
    // Mostrar todas las oficinas
    public function index()
    {
        $oficinas = Oficina::all();
        return view('oficinas.index', compact('oficinas'));
    }

    // Crear una nueva oficina
    public function create()
    {
        return view('oficinas.create');
    }

    // Almacenar una nueva oficina
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Oficina::create($request->all());

        return redirect()->route('oficinas.index');
    }

    // Editar una oficina existente
    public function edit(Oficina $oficina)
    {
        $menus = Menu::all();  // Obtenemos todos los menús disponibles
        return view('oficinas.edit', compact('oficina', 'menus'));
    }

    // Asignar menús a la oficina
    public function assignMenus(Request $request, Oficina $oficina)
    {
        $request->validate([
            'menus' => 'required|array',  // Aseguramos que menus sea un array
            'menus.*' => 'exists:menus,id',  // Verificamos que los IDs sean válidos
        ]);

        // Sincronizamos los menús seleccionados con la oficina
        $oficina->menus()->sync($request->menus);

        return redirect()->route('oficinas.index')->with('success', 'Menús asignados correctamente.');
    }

    // Actualizar una oficina
    public function update(Request $request, Oficina $oficina)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $oficina->update($request->all());

        return redirect()->route('oficinas.index');
    }

    // Eliminar una oficina
    public function destroy(Oficina $oficina)
    {
        $oficina->delete();
        return redirect()->route('oficinas.index');
    }
}
