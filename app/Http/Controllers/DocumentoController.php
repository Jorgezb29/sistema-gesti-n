<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Usuario;
use App\Models\Oficina;
use App\Models\Carpeta;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    // Mostrar documentos internos
    public function internos()
    {
        $documentos = Documento::where('tipo', 'interno')
            ->with(['usuario', 'oficina', 'carpeta'])
            ->get();

        return view('documentos.internos.index', compact('documentos'));
    }

    // Mostrar documentos externos
    public function externos()
    {
        $documentos = Documento::where('tipo', 'externo')
            ->with(['usuario', 'oficina', 'carpeta'])
            ->get();

        return view('documentos.externos.index', compact('documentos'));
    }

    // Mostrar documentos compartidos
    public function compartidos()
    {
        $documentos = Documento::where('compartido', true)
            ->with(['usuario', 'oficina', 'carpeta'])
            ->get();

        return view('documentos.compartidos.index', compact('documentos'));
    }

    // Mostrar todos los documentos (sin filtros)
    public function index()
    {
        $documentos = Documento::with(['usuario', 'oficina', 'carpeta'])->get();
        return view('documentos.index', compact('documentos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('documentos.create');
    }

    // Guardar nuevo documento
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'tipo' => 'required|in:interno,externo',
            'usuario_id' => 'required|exists:usuarios,id',
            'oficina_id' => 'required|exists:oficinas,id',
            'carpeta_id' => 'required|exists:carpetas,id',
        ]);

        // Crear el nuevo documento con los datos validados
        Documento::create([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'tipo' => $validated['tipo'],
            'usuario_id' => $validated['usuario_id'],
            'oficina_id' => $validated['oficina_id'],
            'carpeta_id' => $validated['carpeta_id'],
            'archivo_path' => 'ruta/temporal.pdf' // Si es necesario, ajusta esta línea
        ]);

        return redirect()->route('documentos.internos'); // o .index si prefieres
    }

    // Mostrar formulario de edición
    public function edit(Documento $documento)
    {
        return view('documentos.edit', compact('documento'));
    }

    // Actualizar documento
    public function update(Request $request, Documento $documento)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'tipo' => 'required|in:interno,externo',
            'usuario_id' => 'required|exists:usuarios,id',
            'oficina_id' => 'required|exists:oficinas,id',
            'carpeta_id' => 'required|exists:carpetas,id',
        ]);

        // Actualizar el documento con los nuevos datos
        $documento->update([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'tipo' => $validated['tipo'],
            'usuario_id' => $validated['usuario_id'],
            'oficina_id' => $validated['oficina_id'],
            'carpeta_id' => $validated['carpeta_id'],
        ]);

        return redirect()->route('documentos.internos'); // o .index si prefieres
    }

    // Eliminar documento
    public function destroy(Documento $documento)
    {
        $documento->delete();
        return redirect()->route('documentos.internos'); // o .index si prefieres
    }
}
