<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin | SIH</title>

    <!-- Bootstrap & Ícones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="login-wrapper container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                
                <!-- QUADRO AMARELO -->
                <div class="p-4 bg-warning-subtle border border-warning rounded-4 shadow-sm">
                    
                    <div class="card border-0 shadow-sm login-card bg-white">
                        <div class="card-body">
                            <h3 class="text-center mb-4 text-dark fw-bold">
                                <i class="bi bi-person-gear me-2 text-dark"></i>
                                Login do Administrador
                            </h3>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login.admin.post') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" class="form-control shadow-sm" id="email" name="email"
                                           value="{{ old('email') }}" required autofocus>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Palavra-passe</label>
                                    <input type="password" class="form-control shadow-sm" id="password" name="password" required>
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Lembrar-me</label>
                                </div>

                                <button type="submit" class="btn btn-dark w-100 btn-login shadow">
                                    <i class="bi bi-box-arrow-in-right me-1"></i> Entrar
                                </button>
                            </form>

                            <div class="mt-3 text-center">
                                <a href="{{ route('login') }}" class="text-decoration-none text-secondary">
                                    <i class="bi bi-arrow-left"></i> Voltar à escolha de perfil
                                </a>
                            </div>
                        </div>
                    </div>

                    <p class="text-center text-muted mt-4 small">
                        &copy; {{ date('Y') }} SIH - Sistema de Informação Hospitalar
                    </p>
                </div>
                <!-- FIM QUADRO -->
                
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
