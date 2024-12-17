<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    // Generar reporte en PDF
    public function empleadosPDF()
    {
        $empleados = Empleado::with(['departamento', 'cargo'])->get();

        $pdf = Pdf::loadView('reportes.empleados_pdf', compact('empleados'));
        return $pdf->download('reporte_empleados.pdf');
    }

    // Generar reporte en Excel
   
}

