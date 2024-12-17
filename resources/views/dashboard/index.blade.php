@extends('layouts.app')

@section('title', 'Dashboard Estadístico')

@section('content')
<!-- Contenedor principal -->
<div class="container mt-5">
    <!-- Botón Regresar -->
    <div class="mb-4">
        <a href="{{ route('home.index') }}" class="btn btn-outline-dark">
            <i class="fas fa-arrow-left"></i> Regresar a la Página Principal
        </a>
    </div>

    <!-- Título -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">
            <i class="fas fa-chart-pie"></i> Dashboard Estadístico
        </h1>
        <p class="lead text-muted">Visualice los datos de empleados según sus departamentos y cargos</p>
    </div>

    <!-- Gráfico de Empleados por Departamento -->
    <div class="row mb-5">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center fw-bold">
                    <i class="fas fa-chart-bar"></i> Empleados por Departamento
                </div>
                <div class="card-body">
                    <canvas id="chartDepartamentos"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfico de Empleados por Cargo -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white text-center fw-bold">
                    <i class="fas fa-chart-pie"></i> Empleados por Cargo
                </div>
                <div class="card-body">
                    <canvas id="chartCargos"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts de Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico de Empleados por Departamento
    const ctxDepartamentos = document.getElementById('chartDepartamentos').getContext('2d');
    const chartDepartamentos = new Chart(ctxDepartamentos, {
        type: 'bar',
        data: {
            labels: @json($empleadosPorDepartamento->map(function($item) {
                return $item->departamento ? $item->departamento->nombre : 'Sin Departamento';
            })),
            datasets: [{
                label: 'Número de Empleados',
                data: @json($empleadosPorDepartamento->pluck('total')),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true, position: 'top' }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Gráfico de Empleados por Cargo
    const ctxCargos = document.getElementById('chartCargos').getContext('2d');
    const chartCargos = new Chart(ctxCargos, {
        type: 'pie',
        data: {
            labels: @json($empleadosPorCargo->map(function($item) {
                return $item->cargo ? $item->cargo->nombre : 'Sin Cargo';
            })),
            datasets: [{
                data: @json($empleadosPorCargo->pluck('total')),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)'
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                tooltip: { enabled: true }
            }
        }
    });
</script>
@endsection
