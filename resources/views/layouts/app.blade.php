<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ✅ CSRF Token necessário para formularios POST -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'SIH - Sistema de Informação Hospitalar'))</title>

    <!-- ✅ CSS Bootstrap + Ícones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- ✅ Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>

    <!-- 🔝 Navbar principal -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-uppercase" href="{{ url('/') }}">SIH</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/servicos') }}">Serviços</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('site.contacto') }}">Contacto</a></li>

                    @if (Auth::guard('clinico')->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Terminar Sessão (Clínico)
                            </a>
                        </li>
                    @elseif (Auth::guard('admin')->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Terminar Sessão (Admin)
                            </a>
                        </li>
                    @elseif (Auth::guard('utente')->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Terminar Sessão (Utente)
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-light px-3 ms-2" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ⚙️ Conteúdo da página -->
    <main class="container py-5">
        @yield('content')
    </main>

    <!-- 🔚 Rodapé -->
    <footer class="bg-success text-white text-center py-4 mt-5">
        <p>&copy; {{ date('Y') }} SIH - Todos os direitos reservados.</p>
        <a href="{{ url('/politica') }}" class="text-white me-3">Política de Privacidade</a>
        <a href="{{ url('/sobre') }}" class="text-white">Sobre o Sistema</a>
    </footer>

    <!-- ✅ Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
