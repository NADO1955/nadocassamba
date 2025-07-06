<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Meu Registo Clínico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center mb-4">Registo Clínico do Utente</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
        $rcu = $utente->rcu;
    @endphp

    @if($rcu)
        <table class="table table-bordered">
            <tr>
                <th>Grupo Sanguíneo</th>
                <td>{{ $rcu->grupo_sanguineo ?? 'Não preenchido' }}</td>
            </tr>
            <tr>
                <th>Histórico Médico</th>
                <td>{{ $rcu->historico_medico ?? 'Não preenchido' }}</td>
            </tr>
            <tr>
                <th>Histórico Familiar</th>
                <td>{{ $rcu->historia_familiar ?? 'Não preenchido' }}</td>
            </tr>
            <tr>
                <th>Alergias</th>
                <td>{{ $rcu->alergias ?? 'Não preenchido' }}</td>
            </tr>
            <tr>
                <th>Medicações Atuais</th>
                <td>{{ $rcu->medicacoes_atuais ?? 'Não preenchido' }}</td>
            </tr>
            <tr>
                <th>Boletim de Vacinas</th>
                <td>{{ $rcu->boletim_vacinas ?? 'Não preenchido' }}</td>
            </tr>
            <tr>
                <th>Observações</th>
                <td>{{ $rcu->observacoes ?? 'Não preenchido' }}</td>
            </tr>
        </table>
    @else
        <div class="alert alert-warning text-center">
            O seu registo clínico ainda não foi criado.
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('utente.rcu.editar') }}" class="btn btn-primary">Editar RCPU</a>
        <a href="{{ route('utente.dashboard') }}" class="btn btn-secondary">Voltar ao Painel</a>
    </div>

    <!-- Botão de Sair -->
    <div class="text-center mt-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Sair</button>
        </form>
    </div>
</div>
</body>
</html>


