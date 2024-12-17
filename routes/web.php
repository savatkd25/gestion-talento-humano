<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\SalarioController;
use App\Http\Controllers\PermisoLaboralController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
// Rutas CRUD
Route::resource('empleados', EmpleadoController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('cargos', CargoController::class);
Route::resource('roles', RolController::class);
Route::resource('permisos', PermisoController::class);
Route::resource('contratos', ContratoController::class);
Route::resource('salarios', SalarioController::class);
Route::resource('permisos-laborales', PermisoLaboralController::class);

Route::post('roles/{rol}/permisos', [RolController::class, 'asignarPermisos'])->name('roles.asignarPermisos');
Route::get('empleados/{empleado}/roles', [EmpleadoController::class, 'asignarRolesForm'])->name('empleados.roles');
Route::post('empleados/{empleado}/roles', [EmpleadoController::class, 'asignarRoles'])->name('empleados.asignarRoles');
use App\Http\Controllers\ReporteController;

Route::get('reportes/empleados/pdf', [ReporteController::class, 'empleadosPDF'])->name('reportes.empleados.pdf');
Route::get('reportes/empleados/excel', [ReporteController::class, 'empleadosExcel'])->name('reportes.empleados.excel');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/roles/{role}/asignar', [RolController::class, 'showAsignarPermisos'])->name('roles.showAsignar');
Route::post('/roles/{role}/asignar', [RolController::class, 'asignarPermisos'])->name('roles.asignar');
// Mostrar el formulario de asignar permisos
Route::get('/roles/{role}/asignar', [RolController::class, 'showAsignarPermisos'])->name('roles.showAsignarPermisos');
// Mostrar la lista de roles
Route::get('/roles', [RolController::class, 'index'])->name('roles.index');
// Mostrar el formulario de asignar permisos
Route::get('/roles/{role}/asignar', [RolController::class, 'showAsignarPermisos'])->name('roles.showAsignarPermisos');

// Ruta para Activar/Inactivar Empleados
Route::post('empleados/{empleado}/toggle', [EmpleadoController::class, 'toggleEstado'])->name('empleados.toggle');