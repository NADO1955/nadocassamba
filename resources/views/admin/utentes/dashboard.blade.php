<!-- resources/views/admin/utentes/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Painel do Utente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Painel do Utente</h2>

        <div class="row">
            <div class="col-md-12">
                <h4>Detalhes do Utente</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Nome</th>
                        <td>{{ $utente->nome }}</td>
                    </tr>
                    <tr>
                        <th>Número do Documento</th>
                        <td>{{ $utente->numero_documento }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $utente->email }}</td>
                    </tr>
                    <tr>
                        <th>Telefone</th>
                        <td>{{ $utente->telefone }}</td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td>{{ $utente->ativo ? 'Ativo' : 'Inativo' }}</td>
                    </tr>
                    <tr>
                        <th>Data de Registo</th>
                        <td>{{ $utente->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Ações -->
        <div class="text-center mt-4">
            <a href="{{ route('admin.utentes.index') }}" class="btn btn-secondary">Voltar para a Lista</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

