<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener empleados agrupados por departamento
        $empleadosPorDepartamento = Empleado::selectRaw('departamento_id, COUNT(*) as total')
            ->groupBy('departamento_id')
            ->with('departamento') // Cargar relación
            ->get();
    
        // Obtener empleados agrupados por cargo
        $empleadosPorCargo = Empleado::selectRaw('cargo_id, COUNT(*) as total')
            ->groupBy('cargo_id')
            ->with('cargo') // Cargar relación
            ->get();
    
        return view('dashboard.index', compact('empleadosPorDepartamento', 'empleadosPorCargo'));
    }
    
}
