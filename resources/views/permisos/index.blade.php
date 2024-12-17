@extends('layouts.app')

@section('title', 'Lista de Permisos')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Lista de Permisos</h1>
    <a href="{{ route('permisos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Permiso</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($permisos as $permiso)
                <tr>
                    <td>{{ $permiso->id }}</td>
                    <td>{{ $permiso->nombre }}</td>
                    <td>{{ $permiso->descripcion }}</td>
                    <td>
                        <a href="{{ route('permisos.show', $permiso) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('permisos.edit', $permiso) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('permisos.destroy', $permiso) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No hay permisos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
