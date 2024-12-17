<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Talento Humano')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        /* Navbar */
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav .nav-link {
            font-size: 1rem;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107 !important;
        }

        /* Header */
        .container h1 {
            font-size: 2rem;
            color: #343a40;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
        }

        /* Alerts */
        .alert {
            border-radius: 8px;
        }

        /* Footer */
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: #ffffff;
            padding: 10px 0;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }

        footer a {
            color: #ffc107;
            text-decoration: none;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <i class="fas fa-briefcase"></i> Gestión Talento Humano
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('empleados.index') }}"><i class="fas fa-users"></i> Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('departamentos.index') }}"><i class="fas fa-building"></i> Departamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cargos.index') }}"><i class="fas fa-user-tie"></i> Cargos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('roles.index') }}"><i class="fas fa-user-tie"></i> Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fas fa-chart-line"></i> Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Mensajes -->
    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- Contenido Principal -->
    <div class="container mt-4 mb-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            &copy; {{ date('Y') }} Gestión de Talento Humano | Todos los derechos reservados.
            <br>
            
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



