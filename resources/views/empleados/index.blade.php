@extends('layouts.app')

@section('title', 'Lista de Empleados')

@section('content')
<!-- Botón para regresar a la página principal -->
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('home.index') }}" class="btn btn-outline-dark shadow-sm">
            <i class="fas fa-arrow-left"></i> Regresar a la Página Principal
        </a>
        <h2 class="fw-bold text-secondary">Lista de Empleados</h2>
        <a href="{{ route('empleados.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-user-plus"></i> Crear Nuevo Empleado
        </a>
    </div>

    <!-- Botones para Exportar Reportes -->
    <div class="mb-4 text-center">
        <a href="{{ route('reportes.empleados.pdf') }}" class="btn btn-danger shadow-sm me-2">
            <i class="fas fa-file-pdf"></i> Exportar a PDF
        </a>
        <a href="{{ route('reportes.empleados.excel') }}" class="btn btn-success shadow-sm">
            <i class="fas fa-file-excel"></i> Exportar a Excel
        </a>
    </div>

    <!-- Tabla de Empleados -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle shadow-sm">
            <thead class="table-primary text-center">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Email</th>
                    <th>Departamento</th>
                    <th>Cargo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($empleados as $empleado)
                    <tr class="text-center">
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->cedula }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->departamento->nombre ?? 'N/A' }}</td>
                        <td>{{ $empleado->cargo->nombre ?? 'N/A' }}</td>
                        <td>
                            <span class="badge {{ $empleado->estado == 'Activo' ? 'bg-success' : 'bg-danger' }}">
                                {{ $empleado->estado }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Botón Ver Detalles -->
                                <a href="{{ route('empleados.show', $empleado) }}" class="btn btn-sm btn-info shadow-sm">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Botón Editar -->
                                <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-sm btn-warning shadow-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Botón Eliminar -->
                                <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este empleado?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                <!-- Botón Activar/Inactivar -->
                                <form action="{{ route('empleados.toggle', $empleado) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $empleado->estado == 'Activo' ? 'btn-danger' : 'btn-success' }} shadow-sm">
                                        <i class="fas fa-toggle-on"></i>
                                    </button>
                                </form>

                                <!-- Botón Asignar Roles -->
                                <a href="{{ route('empleados.roles', $empleado) }}" class="btn btn-sm btn-secondary shadow-sm">
                                    <i class="fas fa-user-shield"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center fw-bold text-muted">No hay empleados registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-3">
        {{ $empleados->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
