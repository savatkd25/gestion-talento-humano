<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:roles|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Rol::create($validated);
        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente.');
    }

    public function show(Rol $rol)
    {
        return view('roles.show', compact('rol'));
    }

    public function edit(Rol $rol)
    {
        $permisos = Permiso::all();
        return view('roles.edit', compact('rol', 'permisos'));
    }
    

    public function update(Request $request, Rol $rol)
    {
        $validated = $request->validate([
            'nombre' => "required|string|unique:roles,nombre,{$rol->id}|max:255",
            'descripcion' => 'nullable|string',
        ]);

        $rol->update($validated);
        return redirect()->route('roles.index')->with('success', 'Rol actualizado exitosamente.');
    }

    public function destroy(Rol $rol)
    {
        $rol->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente.');
    }

    public function asignarPermisos(Request $request, Rol $role)
    {
         $role->permisos()->sync($request->input('permisos', []));
         return redirect()->route('roles.index')->with('success', 'Permisos asignados correctamente.');
    }

    public function showAsignarPermisos(Rol $role)
    {
        $permisos = Permiso::all();
        return view('roles.asignar', compact('role', 'permisos'));
    }



}
