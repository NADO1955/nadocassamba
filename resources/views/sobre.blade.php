<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Sobre o Sistema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .borda-amarela {
            border: 3px solid #ffc107; /* Amarelo Bootstrap */
        }
    </style>
</head>
<body class="bg-light fade-in">

<div class="container py-5">
    <div class="card shadow-lg p-5 rounded-4 borda-amarela animated-card">

        <h2 class="text-center text-primary mb-4">Sistema de Informação Hospitalar</h2>

        <p class="lead text-center mb-4">
            O <strong>SIH</strong> é um sistema moderno, seguro e escalável que apoia a gestão hospitalar, 
            permitindo o registo de utentes, agendamento de consultas, gestão de clínicos e visualização de registos clínicos.
        </p>

        <hr class="my-4">

        <h4 class="text-primary mt-4">Funcionalidades Principais:</h4>
        <ul class="list-group list-group-flush mb-4">
            <li class="list-group-item">✔️ Registo e gestão de utentes</li>
            <li class="list-group-item">✔️ Agendamento de consultas e exames</li>
            <li class="list-group-item">✔️ Gestão de clínicos e horários</li>
            <li class="list-group-item">✔️ Consulta e atualização de Registos Clínicos (RCU)</li>
            <li class="list-group-item">✔️ Separação de perfis: utente, clínico e administrador</li>
            <li class="list-group-item">✔️ Segurança reforçada e acesso autenticado</li>
        </ul>

        <h4 class="text-primary">Objetivo:</h4>
        <p>
            Melhorar a qualidade dos serviços de saúde, garantir maior organização hospitalar
            e proporcionar uma melhor experiência aos utentes e profissionais de saúde.
        </p>

        <p class="text-center mt-5 text-muted small">
            Desenvolvido por <strong>NADO CASSAMBA</strong><br>
            &copy; {{ date('Y') }} Todos os direitos reservados.
        </p>
    </div>
</div>

<!-- JS -->
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

