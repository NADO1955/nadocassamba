<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Horários dos Clínicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

    <div class="container">
        <h2 class="mb-4 text-center">Horários dos Clínicos</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($horarios->isEmpty())
            <div class="alert alert-warning text-center">Nenhum horário disponível.</div>
        @else
            <table class="table table-bordered table-hover bg-white">
                <thead class="table-light">
                    <tr>
                        <th>Clínico</th>
                        <th>Especialidade</th>
                        <th>Dia</th>
                        <th>Hora de Início</th>
                        <th>Hora de Término</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($horarios as $horario)
                        <tr>
                            <td>{{ $horario->clinico->nome }}</td>
                            <td>{{ $horario->clinico->especialidade->nome ?? 'N/A' }}</td>
                            <td>{{ $horario->dia }}</td>
                            <td>{{ $horario->hora_inicio }}</td>
                            <td>{{ $horario->hora_fim }}</td>
                            <td>
                                <a href="{{ route('admin.clinicos.horarios', $horario->clinico_id) }}" class="btn btn-sm btn-primary">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('admin.clinicos.index') }}" class="btn btn-secondary mt-3">Voltar para Clínicos</a>
    </div>

</body>
</html>
