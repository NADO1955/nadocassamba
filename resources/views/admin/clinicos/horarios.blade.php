<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Horário - Clínico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Editar Horário de Atendimento</h2>

        <!-- Botões Voltar e Sair -->
        <div>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary me-2">← Voltar</a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Sair</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <h5 class="mb-3">Clínico: {{ $clinico->nome }}</h5>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
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

            <form method="POST" action="{{ route('admin.clinicos.horarios.salvar', $clinico->id) }}">
                @csrf
                @method('POST')

                <!-- Data Inicial do Horário -->
                <div class="mb-3">
                    <label for="data_inicio" class="form-label">Data Inicial do Horário</label>
                    <input 
                        type="date" 
                        class="form-control" 
                        id="data_inicio" 
                        name="data_inicio"
                        value="{{ old('data_inicio', $clinico->data_inicio ?? '') }}"
                        required
                        max="{{ \Carbon\Carbon::now()->addMonth()->format('Y-m-d') }}"
                        title="Só pode alterar com até 1 mês de antecedência"
                    >
                </div>

                <!-- Hora Inicial -->
                <div class="mb-3">
                    <label for="hora_inicio" class="form-label">Hora Inicial</label>
                    <input 
                        type="time" 
                        class="form-control" 
                        id="hora_inicio" 
                        name="hora_inicio"
                        value="{{ old('hora_inicio', $clinico->hora_inicio ?? '') }}" 
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary">Guardar Horário</button>
                <a href="{{ route('admin.clinicos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>

        </div>
    </div>
</div>
</body>
</html>






