<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIH</title>

    <!-- Bootstrap CSS & Ícones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

    <div class="container py-5">
        <!-- Botão Voltar ao Início -->
        <div class="mb-4">
            <a href="{{ route('home') }}" class="btn btn-outline-success btn-home shadow-sm">
                <i class="bi bi-house-door-fill me-1"></i> Voltar ao Início
            </a>
        </div>

        <!-- Título -->
        <h2 class="text-center mb-5 text-success fw-bold display-5">
            <i class="bi bi-lock-fill me-2"></i> Escolha o seu Perfil
        </h2>

        <!-- Cartões de Perfis -->
        <div class="row justify-content-center g-4">
            <!-- Utente -->
            <div class="col-md-4">
                <div class="card profile-card h-100 text-center border-0 shadow-lg card-hover">
                    <div class="card-body">
                        <i class="bi bi-person-circle text-success icon-large mb-3"></i>
                        <h5 class="card-title">Utente</h5>
                        <p class="text-muted">Acesso para utentes visualizarem e gerirem os seus dados e marcações.</p>
                        <a href="{{ route('login.utente') }}" class="btn btn-success btn-custom w-100">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Entrar como Utente
                        </a>
                    </div>
                </div>
            </div>

            <!-- Clínico -->
            <div class="col-md-4">
                <div class="card profile-card h-100 text-center border-0 shadow-lg card-hover">
                    <div class="card-body">
                        <i class="bi bi-person-badge text-primary icon-large mb-3"></i>
                        <h5 class="card-title">Pessoal Clínico</h5>
                        <p class="text-muted">Acesso para médicos e profissionais gerirem atendimentos.</p>
                        <a href="{{ route('login.clinico') }}" class="btn btn-primary btn-custom w-100">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Entrar como Clínico
                        </a>
                    </div>
                </div>
            </div>

            <!-- Administrativo -->
            <div class="col-md-4">
                <div class="card profile-card h-100 text-center border-0 shadow-lg card-hover">
                    <div class="card-body">
                        <i class="bi bi-person-gear text-dark icon-large mb-3"></i>
                        <h5 class="card-title">Administrativo</h5>
                        <p class="text-muted">Acesso para gestão administrativa do sistema hospitalar.</p>
                        <a href="{{ route('login.admin') }}" class="btn btn-dark btn-custom w-100">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Entrar como Admin
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>


