<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    // Listar todos los cargos
    public function index()
    {
        $cargos = Cargo::paginate(10);
        return view('cargos.index', compact('cargos'));
    }

    // Mostrar formulario para crear un nuevo cargo
    public function create()
    {
        return view('cargos.create');
    }

    // Guardar un nuevo cargo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:cargos|max:255',
            'descripcion' => 'nullable|string',
            'salario_minimo' => 'required|numeric|min:0',
        ]);

        Cargo::create($validated);

        return redirect()->route('cargos.index')->with('success', 'Cargo creado exitosamente.');
    }

    // Mostrar los detalles de un cargo
    public function show(Cargo $cargo)
    {
        return view('cargos.show', compact('cargo'));
    }

    // Mostrar formulario para editar un cargo
    public function edit(Cargo $cargo)
    {
        return view('cargos.edit', compact('cargo'));
    }

    // Actualizar un cargo existente
    public function update(Request $request, Cargo $cargo)
    {
        $validated = $request->validate([
            'nombre' => "required|string|unique:cargos,nombre,{$cargo->id}|max:255",
            'descripcion' => 'nullable|string',
            'salario_minimo' => 'required|numeric|min:0',
        ]);

        $cargo->update($validated);

        return redirect()->route('cargos.index')->with('success', 'Cargo actualizado exitosamente.');
    }

    // Eliminar un cargo
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargos.index')->with('success', 'Cargo eliminado exitosamente.');
    }
}
