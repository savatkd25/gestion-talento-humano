<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    // Listar todos los departamentos
    public function index()
    {
        $departamentos = Departamento::paginate(10);
        return view('departamentos.index', compact('departamentos'));
    }

    // Mostrar formulario para crear un nuevo departamento
    public function create()
    {
        return view('departamentos.create');
    }

    // Guardar un nuevo departamento
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:departamentos|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Departamento::create($validated);

        return redirect()->route('departamentos.index')->with('success', 'Departamento creado exitosamente.');
    }

    // Mostrar los detalles de un departamento
    public function show(Departamento $departamento)
    {
        return view('departamentos.show', compact('departamento'));
    }

    // Mostrar formulario para editar un departamento
    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit', compact('departamento'));
    }

    // Actualizar un departamento existente
    public function update(Request $request, Departamento $departamento)
    {
        $validated = $request->validate([
            'nombre' => "required|string|unique:departamentos,nombre,{$departamento->id}|max:255",
            'descripcion' => 'nullable|string',
        ]);

        $departamento->update($validated);

        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado exitosamente.');
    }

    // Eliminar un departamento
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado exitosamente.');
    }
}
