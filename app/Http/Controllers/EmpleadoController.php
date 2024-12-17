<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use App\Models\Cargo;
use App\Models\Rol;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    // Listar todos los empleados
    public function index()
    {
        $empleados = Empleado::with(['departamento', 'cargo'])->paginate(10);
        return view('empleados.index', compact('empleados'));
    }

    // Mostrar formulario para crear un nuevo empleado
    public function create()
    {
        $departamentos = Departamento::all();
        $cargos = Cargo::all();
        return view('empleados.create', compact('departamentos', 'cargos'));
    }

    // Guardar un nuevo empleado
    public function store(Request $request)
    {
        Empleado::create($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente.');
    }

    // Mostrar un empleado específico
    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    // Mostrar formulario para editar un empleado
    public function edit(Empleado $empleado)
    {
        $departamentos = Departamento::all();
        $cargos = Cargo::all();
        return view('empleados.edit', compact('empleado', 'departamentos', 'cargos'));
    }

    // Actualizar un empleado
    public function update(Request $request, Empleado $empleado)
    {
        $empleado->update($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    // Eliminar un empleado
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }

    // Mostrar formulario para asignar roles a empleados
    public function asignarRolesForm(Empleado $empleado)
    {
        $roles = Rol::all();
        return view('empleados.roles', [
            'empleado' => $empleado, // Empleado actual
            'roles' => $roles,       // Lista de roles
        ]);
    }
    

    // Guardar los roles asignados a un empleado
    public function asignarRoles(Request $request, Empleado $empleado)
    {
        $empleado->roles()->sync($request->input('roles', []));
        return redirect()->route('empleados.index')->with('success', 'Roles asignados correctamente.');
    }
}
