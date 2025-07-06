<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIH - Sistema de Informação Hospitalar</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Animate.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        html {
            scroll-behavior: smooth;
        }
        header {
            background: linear-gradient(135deg, #e9f7ef, #ffffff);
        }
        .section-title {
            font-size: 2.4rem;
        }
        .shadow-sm i {
            transition: transform 0.3s ease;
        }
        .shadow-sm:hover i {
            transform: scale(1.2) rotate(5deg);
        }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbarNav">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-uppercase animate__animated animate__fadeInLeft" href="{{ route('home') }}">
            <i class="bi bi-hospital-fill me-1"></i> SIH
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse animate__animated animate__fadeIn" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Início</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('site.servicos') }}">Serviços</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('site.contacto') }}">Contacto</a></li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-light px-3 ms-2 btn-login" href="{{ route('login') }}" data-bs-toggle="tooltip" title="Entrar no sistema">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Cabeçalho -->
<header class="text-center py-5 animate__animated animate__fadeInDown">
    <h2 class="section-title text-success">SISTEMA DE INFORMAÇÃO HOSPITALAR</h2>
    <p class="text-muted">Gestão moderna e eficaz da saúde.</p>
</header>

<main class="container py-5">
    <!-- Cartões -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 card-hover text-center h-100 p-4 animate__animated animate__zoomIn">
                <i class="bi bi-person-vcard text-success fs-1 mb-3"></i>
                <h5 class="card-title">Registo de Utentes</h5>
                <p class="card-text text-muted">Adicione e consulte informações dos utentes com segurança e rapidez.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 card-hover text-center h-100 p-4 animate__animated animate__zoomIn delay-1s">
                <i class="bi bi-calendar2-check text-success fs-1 mb-3"></i>
                <h5 class="card-title">Consultas</h5>
                <p class="card-text text-muted">Marque, edite ou visualize consultas médicas de forma intuitiva.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 card-hover text-center h-100 p-4 animate__animated animate__zoomIn delay-2s">
                <i class="bi bi-hospital text-success fs-1 mb-3"></i>
                <h5 class="card-title">Nossos Serviços</h5>
                <p class="card-text text-muted">Visualize os principais serviços hospitalares disponíveis para si.</p>
            </div>
        </div>
    </div>

    <!-- Funcionalidades -->
    <section class="py-5 bg-white">
        <div class="container">
            <h3 class="text-center text-success mb-5 animate__animated animate__fadeInUp">
                <i class="bi bi-grid-fill me-2"></i>Funcionalidades
            </h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 text-center">
                @foreach([
                    ['bi-shield-lock', 'Segurança', 'Proteção de dados.'],
                    ['bi-clock-history', 'Eficiência', 'Agilidade no atendimento.'],
                    ['bi-bar-chart-line', 'Relatórios', 'Análises detalhadas.'],
                    ['bi-robot', 'IA Médica', 'Triagem inteligente.'],
                    ['bi-people', 'Equipa', 'Gestão de turnos.'],
                    ['bi-prescription2', 'Prescrição', 'Receitas digitais.']
                ] as [$icon, $title, $desc])
                <div class="col">
                    <div class="shadow-sm border rounded-4 bg-light p-4 h-100 animate__animated animate__fadeInUp">
                        <i class="bi {{ $icon }} fs-1 text-success mb-3 d-block"></i>
                        <h5 class="text-success mb-2">{{ $title }}</h5>
                        <p class="text-muted small mb-0">{{ $desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testemunhos -->
    <section class="my-5">
        <h3 class="text-center text-success mb-4 animate__animated animate__fadeIn">Testemunhos</h3>
        <div id="testemunhosCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                @foreach([
                    ['"Excelente sistema, melhorou muito o atendimento."', 'Maria João'],
                    ['"Fácil de usar e muito completo. Recomendo."', 'Carlos Silva'],
                    ['"O suporte técnico é rápido e eficiente."', 'Ana Tavares']
                ] as [$text, $author])
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <blockquote class="blockquote text-center">
                        <p class="mb-3 fst-italic">{{ $text }}</p>
                        <footer class="blockquote-footer">{{ $author }}</footer>
                    </blockquote>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testemunhosCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testemunhosCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Seguinte</span>
            </button>
        </div>
    </section>

    <!-- Mapa -->
    <section class="py-5 bg-light">
        <div class="container">
            <h3 class="text-center text-success mb-4 animate__animated animate__fadeIn">
                <i class="bi bi-geo-alt-fill me-2"></i>Localização
            </h3>
            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <iframe src="https://maps.google.com/maps?q=Luanda&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            width="100%" height="240" class="w-100 border-0" loading="lazy"
                            style="border-radius: 0 0 10px 10px;"></iframe>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Rodapé -->
<footer class="bg-success text-white text-center py-4 mt-5">
    <div class="container">
        <p class="mb-2">&copy; 2025 SIH - Todos os direitos reservados.</p>
        <a href="/politica" class="text-white me-3">Política de Privacidade</a>
        <a href="/sobre" class="text-white">Sobre o Sistema</a>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(el => new bootstrap.Tooltip(el));
    });
</script>

</body>
</html>

