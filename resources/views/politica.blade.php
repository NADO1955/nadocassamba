<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Política de Privacidade</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .borda-amarela {
            border: 3px solid #ffc107;
        }
    </style>
</head>
<body class="bg-light fade-in">

<div class="container py-5">
    <div class="card shadow-lg p-5 rounded-4 borda-amarela animated-card">

        <h2 class="text-center text-primary mb-4">Política de Privacidade</h2>

        <p class="lead">
            A privacidade dos nossos utilizadores é uma prioridade. Todas as informações recolhidas são tratadas com confidencialidade e usadas exclusivamente para fins de gestão hospitalar.
        </p>

        <h5 class="mt-4 text-primary">1. Recolha de Dados</h5>
        <p>Os dados pessoais são recolhidos apenas durante o registo ou uso do sistema pelos utentes, clínicos e administradores.</p>

        <h5 class="mt-4 text-primary">2. Utilização dos Dados</h5>
        <p>Os dados recolhidos são utilizados para marcações, acesso ao registo clínico, comunicação entre utente e clínico e gestão hospitalar interna.</p>

        <h5 class="mt-4 text-primary">3. Proteção</h5>
        <p>Utilizamos técnicas modernas de segurança para proteger os dados armazenados contra acesso não autorizado.</p>

        <h5 class="mt-4 text-primary">4. Partilha</h5>
        <p>As informações não são partilhadas com terceiros, exceto quando exigido por lei ou com consentimento explícito.</p>

        <p class="text-center mt-5 text-muted small">
            Última atualização: {{ date('d/m/Y') }}<br>
            &copy; {{ date('Y') }} NADO CASSAMBA – Todos os direitos reservados.
        </p>
    </div>
</div>

<!-- JS -->
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
