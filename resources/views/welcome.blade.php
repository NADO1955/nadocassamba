<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo - Sistema de Saúde</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- CSS Personalizado --}}
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<div class="container py-5">
    <div class="welcome-box mt-5">
        <h1 class="mb-3">👨‍⚕️ Sistema de Informação de Saúde</h1>
        <p class="lead">Bem-vindo ao SIS do grupo Kerubim.AO</p>
        <hr class="my-4">

        <div class="d-grid gap-2 mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Entrar</a>
            <a href="{{ route('register') }}" class="btn btn-outline-secondary">Criar Conta de Utente</a>
        </div>
    </div>
</div>

{{-- jQuery offline --}}
<script src="/js/jquery.js"></script>

{{-- JS personalizado --}}
<script src="/js/script.js"></script>

</body>
</html>

