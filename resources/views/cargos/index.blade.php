@extends('layouts.app')

@section('title', 'Lista de Cargos')

@section('content')
<div class="container mt-4">
    <!-- Botón de Regreso -->
    <div class="mb-3">
        <a href="{{ route('home.index') }}" class="btn btn-outline-dark">
            <i class="fas fa-arrow-left"></i> Regresar a la Página Principal
        </a>
    </div>

    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary"><i class="fas fa-briefcase"></i> Lista de Cargos</h2>
        <a href="{{ route('cargos.create') }}" class="btn btn-success shadow-sm">
            <i class="fas fa-plus-circle"></i> Crear Nuevo Cargo
        </a>
    </div>

    <!-- Tabla de Cargos -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Salario Mínimo</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cargos as $cargo)
                        <tr>
                            <td>{{ $cargo->id }}</td>
                            <td>{{ $cargo->nombre }}</td>
                            <td>{{ $cargo->descripcion }}</td>
                            <td>${{ number_format($cargo->salario_minimo, 2) }}</td>
                            <td class="text-center">
                                <!-- Botón Ver -->
                                <a href="{{ route('cargos.show', $cargo) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <!-- Botón Editar -->
                                <a href="{{ route('cargos.edit', $cargo) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Botón Eliminar -->
                                <form action="{{ route('cargos.destroy', $cargo) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este cargo?');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                <i class="fas fa-info-circle"></i> No hay cargos registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $cargos->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
