<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Admin - Painel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Estilo personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<div class="container py-5">
    <!-- Quadro Amarelo -->
    <div class="p-4 bg-warning-subtle border border-warning rounded-4 shadow-sm">
        <div class="text-center mb-4">
            <h2 class="text-success section-title">
                <i class="bi bi-person-gear me-2"></i>
                Bem-vindo, {{ Auth::guard('admin')->user()->nome ?? 'Administrador' }}!
            </h2>
            <p class="text-muted">Estás autenticado como <strong>Administrador</strong>.</p>
        </div>

        <!-- Menu de Navegação -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-success text-white text-center fw-bold">
                <i class="bi bi-list-ul me-1"></i> Menu de Navegação
            </div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-house-door me-2"></i> Início
                </a>

                <a href="{{ route('admin.utentes.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-people me-2"></i> Gestão de Utentes
                </a>

                <a href="{{ route('admin.clinicos.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-person-badge me-2"></i> Gestão do Pessoal Clínico
                </a>

                <a href="{{ route('admin.especialidades.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-journals me-2"></i> Especialidades
                </a>

                <a href="{{ route('admin.horarios.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-clock-history me-2"></i> Horários
                </a>

                <a href="{{ route('admin.marcacoes.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-calendar2-week me-2"></i> Gestão de Marcações
                </a>
            </div>
        </div>

        <!-- Botão Logout -->
        <div class="text-center mt-4">
            <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-login"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right me-1"></i> Terminar Sessão
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

