<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Atribuir Especialidade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Atribuir Especialidade ao Clínico</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.clinicos.especialidade.salvar', $clinico->id) }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nome do Clínico</label>
                        <input type="text" class="form-control" value="{{ $clinico->nome }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="especialidade_id" class="form-label">Especialidade</label>
                        <select class="form-select" id="especialidade_id" name="especialidade_id" required>
                            <option value="">-- Selecione uma especialidade --</option>
                            @foreach($especialidades as $especialidade)
                                <option value="{{ $especialidade->id }}" 
                                    {{ $clinico->especialidade_id == $especialidade->id ? 'selected' : '' }}>
                                    {{ $especialidade->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('especialidade_id')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('admin.clinicos.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


