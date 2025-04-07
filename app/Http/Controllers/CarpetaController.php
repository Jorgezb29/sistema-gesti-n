<?php

namespace App\Http\Controllers;

use App\Models\Carpeta;
use App\Models\Oficina;
use Illuminate\Http\Request;

class CarpetaController extends Controller
{
    // Mostrar todas las carpetas
    public function index()
    {
        $carpetas = Carpeta::all(); // Obtener todas las carpetas
        return view('carpetas.index', compact('carpetas')); // Mostrar en la vista 'carpetas.index'
    }

    // Mostrar el formulario para crear una nueva carpeta
    public function create()
    {
        $oficinas = Oficina::all(); // Obtener todas las oficinas disponibles
        return view('carpetas.create', compact('oficinas')); // Mostrar formulario de creación con oficinas
    }

    // Almacenar una nueva carpeta en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'oficina_id' => 'required|exists:oficinas,id', // Validar que la oficina exista
        ]);

        // Crear la carpeta
        Carpeta::create([
            'nombre' => $request->nombre,
            'oficina_id' => $request->oficina_id, // Relacionar con la oficina
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('carpetas.index')->with('success', 'Carpeta creada exitosamente');
    }

    // Mostrar una carpeta específica
    public function show(Carpeta $carpeta)
    {
        return view('carpetas.show', compact('carpeta')); // Mostrar detalles de la carpeta
    }

    // Mostrar el formulario para editar una carpeta existente
    public function edit(Carpeta $carpeta)
    {
        $oficinas = Oficina::all(); // Obtener todas las oficinas para el formulario
        return view('carpetas.edit', compact('carpeta', 'oficinas')); // Mostrar el formulario de edición
    }

    // Actualizar una carpeta existente en la base de datos
    public function update(Request $request, Carpeta $carpeta)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'oficina_id' => 'required|exists:oficinas,id',
        ]);

        // Actualizar la carpeta
        $carpeta->update([
            'nombre' => $request->nombre,
            'oficina_id' => $request->oficina_id,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('carpetas.index')->with('success', 'Carpeta actualizada exitosamente');
    }

    // Eliminar una carpeta
    public function destroy(Carpeta $carpeta)
    {
        // Eliminar la carpeta
        $carpeta->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('carpetas.index')->with('success', 'Carpeta eliminada exitosamente');
    }
}
