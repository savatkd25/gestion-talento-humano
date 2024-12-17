<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Empleado</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            background: #ffffff;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4a5568;
            font-weight: bold;
        }
        .btn {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
            color: #555;
        }
        .form-control:focus {
            border-color: #6c63ff;
            box-shadow: 0 0 5px rgba(108, 99, 255, 0.5);
        }
        .btn-primary {
            background-color: #6c63ff;
            border-color: #6c63ff;
        }
        .btn-primary:hover {
            background-color: #5a54e6;
            border-color: #5a54e6;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <!-- Encabezado -->
    <div class="text-center mb-4">
        <h1><i class="fas fa-user-plus"></i> Crear Nuevo Empleado</h1>
        <p class="text-muted">Complete los siguientes campos para registrar un nuevo empleado.</p>
    </div>

    <!-- Formulario -->
    <div class="form-container">
        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Primera columna -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Cédula (10 dígitos)" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono (10 dígitos)" required>
                    </div>
                </div>

                <!-- Segunda columna -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="departamento_id" class="form-label">Departamento</label>
                        <select name="departamento_id" id="departamento_id" class="form-select" required>
                            <option value="" selected disabled>Seleccione un departamento</option>
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cargo_id" class="form-label">Cargo</label>
                        <select name="cargo_id" id="cargo_id" class="form-select" required>
                            <option value="" selected disabled>Seleccione un cargo</option>
                            @foreach ($cargos as $cargo)
                                <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="salario_base" class="form-label">Salario Base</label>
                        <input type="number" step="0.01" name="salario_base" id="salario_base" class="form-control" placeholder="0.00" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_contratacion" class="form-label">Fecha de Contratación</label>
                        <input type="date" name="fecha_contratacion" id="fecha_contratacion" class="form-control" required>
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="text-end mt-4">
                <a href="{{ route('empleados.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar Empleado
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

