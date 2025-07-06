<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Minhas Marcações</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .table th {
            background-color: #f1f1f1;
        }
        .table td, .table th {
            vertical-align: middle;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary"><i class="bi bi-calendar-check-fill me-2"></i> Minhas Marcações</h3>
        <a href="{{ route('clinico.dashboard') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left-circle"></i> Voltar ao Painel
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        </div>
    @endif

    @if($marcacoes->isEmpty())
        <div class="alert alert-info">
            <i class="bi bi-info-circle-fill me-2"></i> Nenhuma marcação encontrada no momento.
        </div>
    @else
        <div class="card">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th><i class="bi bi-person-fill"></i> Utente</th>
                                <th><i class="bi bi-calendar-event-fill"></i> Data</th>
                                <th><i class="bi bi-clock-fill"></i> Hora</th>
                                <th><i class="bi bi-stethoscope"></i> Especialidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($marcacoes as $marcacao)
                                <tr>
                                    <td>{{ $marcacao->utente->nome ?? 'N/D' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($marcacao->data)->format('d/m/Y') }}</td>
                                    <td>{{ $marcacao->hora }}</td>
                                    <td>{{ $marcacao->especialidade->nome ?? 'N/D' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
