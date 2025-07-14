<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Painel do Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.clinicos.index') }}">Clínicos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.especialidades.index') }}">Especialidades</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.horarios.index') }}">Horários</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.marcacoes.index') }}">Marcações</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.utentes.index') }}">Utentes</a></li>
                </ul>
                <form method="POST" action="{{ route('logout.admin') }}">
                    @csrf
                    <button class="btn btn-outline-light btn-sm" type="submit">Sair</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

</body>
</html>
