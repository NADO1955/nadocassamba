<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil - Clínico</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .profile-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2.5rem;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        .form-control {
            border-radius: 0.5rem;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
        }
        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        .form-group {
            position: relative;
        }
        .form-group input {
            padding-left: 2.5rem;
        }
        .btn-primary {
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('clinico.dashboard') }}">
            <i class="bi bi-arrow-left-circle me-2"></i>Voltar ao Painel
        </a>
        <form action="{{ route('logout.clinico') }}" method="POST" class="d-flex ms-auto">
            @csrf
            <button type="submit" class="btn btn-outline-light">Sair</button>
        </form>
    </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="profile-card">
                <h3 class="mb-4 text-primary"><i class="bi bi-person-circle me-2"></i>Informações do Perfil</h3>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('clinico.perfil.atualizar') }}" method="POST">
                    @csrf
                    {{-- NÃO usar @method('PUT') porque a rota só aceita POST --}}

                    <!-- Nome -->
                    <div class="mb-3 form-group">
                        <label class="form-label">Nome Completo</label>
                        <i class="bi bi-person form-icon"></i>
                        <input type="text" name="nome" value="{{ old('nome', Auth::guard('clinico')->user()->nome) }}" class="form-control" required>
                    </div>

                    <!-- Telefone -->
                    <div class="mb-3 form-group">
                        <label class="form-label">Telefone</label>
                        <i class="bi bi-telephone form-icon"></i>
                        <input type="text" name="telefone" value="{{ old('telefone', Auth::guard('clinico')->user()->telefone) }}" class="form-control">
                    </div>

                    <!-- Especialidade -->
                    <div class="mb-3 form-group">
                        <label class="form-label">Especialidade</label>
                        <i class="bi bi-heart-pulse form-icon"></i>
                        <input type="text" value="{{ Auth::guard('clinico')->user()->especialidade->nome ?? 'N/D' }}" class="form-control" disabled>
                    </div>

                    <!-- Email (só leitura) -->
                    <div class="mb-3 form-group">
                        <label class="form-label">Email</label>
                        <i class="bi bi-envelope form-icon"></i>
                        <input type="email" value="{{ Auth::guard('clinico')->user()->email }}" class="form-control" readonly>
                    </div>

                    <!-- Nova Palavra-passe -->
                    <div class="mb-3 form-group">
                        <label class="form-label">Nova Palavra-passe <small class="text-muted">(opcional)</small></label>
                        <i class="bi bi-lock form-icon"></i>
                        <input type="password" name="password" class="form-control" placeholder="Deixe em branco para manter a actual">
                    </div>

                    <!-- Confirmar Palavra-passe -->
                    <div class="mb-3 form-group">
                        <label class="form-label">Confirmar Palavra-passe</label>
                        <i class="bi bi-lock-fill form-icon"></i>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Repita a nova palavra-passe">
                    </div>

                    <!-- Botões -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('clinico.dashboard') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Voltar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i> Guardar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

