<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Clínico</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .icon-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.8rem;
        }

        .card {
            transition: all 0.3s ease;
            border-radius: 1rem;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
        }

        .navbar-brand {
            font-size: 1.25rem;
        }

        .btn {
            border-radius: 0.5rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">🩺 Sistema Hospitalar</a>
        <form action="{{ route('logout.clinico') }}" method="POST" class="ms-auto">
            @csrf
            <button type="submit" class="btn btn-outline-light">Sair</button>
        </form>
    </div>
</nav>

<!-- CONTEÚDO -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-dark">Bem-vindo(a), {{ Auth::guard('clinico')->user()->nome }}</h2>
        <p class="text-muted">Abaixo estão os acessos principais para gerir suas atividades no sistema.</p>
    </div>

    <div class="row g-4">
        <!-- Marcações -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 text-center p-4">
                <div class="icon-circle bg-primary text-white mx-auto">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <h5 class="fw-semibold">Minhas Marcações</h5>
                <p class="text-muted">Consulte todas as consultas atribuídas a si.</p>
                <a href="{{ route('clinico.marcacoes') }}" class="btn btn-primary">Ver Marcações</a>
            </div>
        </div>

        <!-- Horários -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 text-center p-4">
                <div class="icon-circle bg-success text-white mx-auto">
                    <i class="bi bi-clock-history"></i>
                </div>
                <h5 class="fw-semibold">Horário de Atendimento</h5>
                <p class="text-muted">Altere o seu horário com 1 mês de antecedência e sem marcações.</p>
                <a href="{{ route('clinico.horarios.editar') }}" class="btn btn-success">Gerir Horário</a>
            </div>
        </div>

        <!-- Perfil -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 text-center p-4">
                <div class="icon-circle bg-info text-white mx-auto">
                    <i class="bi bi-person-circle"></i>
                </div>
                <h5 class="fw-semibold">Meu Registo</h5>
                <p class="text-muted">Actualize os seus dados de perfil pessoal.</p>
                <a href="{{ route('clinico.perfil') }}" class="btn btn-info text-white">Ver/Editar Perfil</a>
            </div>
        </div>

        <!-- Gestão RCU -->
        <div class="col-md-6 col-lg-6">
            <div class="card border-0 shadow-sm h-100 text-center p-4">
                <div class="icon-circle bg-warning text-dark mx-auto">
                    <i class="bi bi-journal-medical"></i>
                </div>
                <h5 class="fw-semibold">Gestão de RCU</h5>
                <p class="text-muted">Aceda aos registos clínicos dos utentes (dados não pessoais).</p>
                <a href="{{ route('clinico.rcu.index') }}" class="btn btn-warning">Gerir RCU</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


