<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function index()
    {
        $permisos = Permiso::all();
        return view('permisos.index', compact('permisos'));
    }

    public function create()
    {
        return view('permisos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:permisos|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Permiso::create($validated);
        return redirect()->route('permisos.index')->with('success', 'Permiso creado exitosamente.');
    }

    public function show(Permiso $permiso)
    {
        return view('permisos.show', compact('permiso'));
    }

    public function edit(Permiso $permiso)
    {
        return view('permisos.edit', compact('permiso'));
    }

    public function update(Request $request, Permiso $permiso)
    {
        $validated = $request->validate([
            'nombre' => "required|string|unique:permisos,nombre,{$permiso->id}|max:255",
            'descripcion' => 'nullable|string',
        ]);

        $permiso->update($validated);
        return redirect()->route('permisos.index')->with('success', 'Permiso actualizado exitosamente.');
    }

    public function destroy(Permiso $permiso)
    {
        $permiso->delete();
        return redirect()->route('permisos.index')->with('success', 'Permiso eliminado exitosamente.');
    }
}
