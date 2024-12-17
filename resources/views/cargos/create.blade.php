@extends('layouts.app')

@section('title', 'Crear Cargo')

@section('content')
<div class="container mt-5">
    <h1>Crear Nuevo Cargo</h1>
    <form action="{{ route('cargos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="salario_minimo" class="form-label">Salario Mínimo</label>
            <input type="number" step="0.01" name="salario_minimo" id="salario_minimo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
