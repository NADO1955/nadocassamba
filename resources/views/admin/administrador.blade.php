<!-- resources/views/ADMINISTRADOR/administrador.blade.php -->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Painel do Administrador - SIH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="#">SIH</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="#">Início</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Gestão de Utentes</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Especialidades</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Horários</a></li>
            </ul>
            <form method="POST" action="{{ route('logout.admin') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light">Sair</button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Bem-vindo ao Painel do Administrador</h2>
        <p>Utilize o menu para gerir os recursos do sistema hospitalar.</p>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
