@extends('layouts.app')

@section('title', 'Lista de Departamentos')

@section('content')
<!-- Botón Regresar -->
<div class="mb-3">
    <a href="{{ route('home.index') }}" class="btn btn-outline-dark shadow-sm">
        <i class="fas fa-arrow-left"></i> Regresar a la Página Principal
    </a>
</div>

<!-- Contenedor principal -->
<div class="container mt-4">
    <!-- Encabezado -->
    <div class="text-center mb-4">
        <h1 class="fw-bold text-primary">
            <i class="fas fa-building"></i> Lista de Departamentos
        </h1>
        <p class="lead text-muted">Administra y organiza los departamentos de tu empresa</p>
    </div>

    <!-- Botón para Crear Departamento -->
    <div class="text-end mb-3">
        <a href="{{ route('departamentos.create') }}" class="btn btn-primary shadow">
            <i class="fas fa-plus-circle"></i> Crear Departamento
        </a>
    </div>

    <!-- Tabla de Departamentos -->
    <div class="table-responsive">
        <table class="table table-hover align-middle shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($departamentos as $departamento)
                    <tr>
                        <td>{{ $departamento->id }}</td>
                        <td>{{ $departamento->nombre }}</td>
                        <td>{{ $departamento->descripcion }}</td>
                        <td class="text-center">
                            <!-- Botón Ver -->
                            <a href="{{ route('departamentos.show', $departamento) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Ver
                            </a>

                            <!-- Botón Editar -->
                            <a href="{{ route('departamentos.edit', $departamento) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('departamentos.destroy', $departamento) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar este departamento?');">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            <i class="fas fa-folder-open fa-2x"></i>
                            <p class="mt-2">No hay departamentos registrados.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    @if ($departamentos->hasPages())
    <div class="d-flex justify-content-center mt-3">
        {{ $departamentos->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
@endsection

