@extends('layouts.app')

@section('title', 'Editar Cargo')

@section('content')
<div class="container mt-5">
    <h1>Editar Cargo</h1>
    <form action="{{ route('cargos.update', $cargo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" value="{{ $cargo->nombre }}" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ $cargo->descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label for="salario_minimo" class="form-label">Salario Mínimo</label>
            <input type="number" step="0.01" name="salario_minimo" value="{{ $cargo->salario_minimo }}" id="salario_minimo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
