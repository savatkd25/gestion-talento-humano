@extends('layouts.app')

@section('title', 'Lista de Roles')

@section('content')
<div class="container mt-4">
    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">
            <i class="fas fa-user-shield"></i> Lista de Roles
        </h2>
        <a href="{{ route('roles.create') }}" class="btn btn-success shadow-sm">
            <i class="fas fa-plus-circle"></i> Crear Nuevo Rol
        </a>
    </div>

    <!-- Tabla de Roles -->
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $rol)
                    <tr>
                        <td>{{ $rol->id }}</td>
                        <td>{{ $rol->nombre }}</td>
                        <td>{{ $rol->descripcion }}</td>
                        <td class="text-center">
                            <!-- Botón Asignar Permisos -->
                            <a href="{{ route('roles.showAsignarPermisos', $rol->id) }}" class="btn btn-info btn-sm me-1 shadow">
                                <i class="fas fa-key"></i> Permisos
                            </a>
                            
                            <!-- Botón Ver -->
                            <a href="{{ route('roles.show', $rol->id) }}" class="btn btn-primary btn-sm me-1 shadow">
                                <i class="fas fa-eye"></i> Ver
                            </a>

                            <!-- Botón Editar -->
                            <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-warning btn-sm me-1 shadow">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este rol?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No hay roles registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
