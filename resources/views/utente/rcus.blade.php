<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Registo Clínico do Utente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Registo Clínico do Utente</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('utente.rcu.atualizar') }}">
            @csrf

            <!-- Grupo Sanguíneo -->
            <div class="mb-3">
                <label for="grupo_sanguineo" class="form-label">Grupo Sanguíneo</label>
                <input type="text" class="form-control @error('grupo_sanguineo') is-invalid @enderror" name="grupo_sanguineo" value="{{ old('grupo_sanguineo', $rcu->grupo_sanguineo ?? '') }}">
                @error('grupo_sanguineo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Histórico Médico -->
            <div class="mb-3">
                <label for="historico_medico" class="form-label">Histórico Médico</label>
                <textarea class="form-control @error('historico_medico') is-invalid @enderror" name="historico_medico" rows="3">{{ old('historico_medico', $rcu->historico_medico ?? '') }}</textarea>
                @error('historico_medico')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Histórico Familiar -->
            <div class="mb-3">
                <label for="historia_familiar" class="form-label">Histórico Familiar</label>
                <textarea class="form-control @error('historia_familiar') is-invalid @enderror" name="historia_familiar" rows="3">{{ old('historia_familiar', $rcu->historia_familiar ?? '') }}</textarea>
                @error('historia_familiar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Alergias -->
            <div class="mb-3">
                <label for="alergias" class="form-label">Alergias</label>
                <textarea class="form-control @error('alergias') is-invalid @enderror" name="alergias" rows="2">{{ old('alergias', $rcu->alergias ?? '') }}</textarea>
                @error('alergias')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Medicações Atuais -->
            <div class="mb-3">
                <label for="medicacoes_atuais" class="form-label">Medicações Atuais</label>
                <textarea class="form-control @error('medicacoes_atuais') is-invalid @enderror" name="medicacoes_atuais" rows="2">{{ old('medicacoes_atuais', $rcu->medicacoes_atuais ?? '') }}</textarea>
                @error('medicacoes_atuais')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Boletim de Vacinas -->
            <div class="mb-3">
                <label for="boletim_vacinas" class="form-label">Boletim de Vacinas</label>
                <textarea class="form-control @error('boletim_vacinas') is-invalid @enderror" name="boletim_vacinas" rows="2">{{ old('boletim_vacinas', $rcu->boletim_vacinas ?? '') }}</textarea>
                @error('boletim_vacinas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Observações -->
            <div class="mb-3">
                <label for="observacoes" class="form-label">Observações</label>
                <textarea class="form-control @error('observacoes') is-invalid @enderror" name="observacoes" rows="2">{{ old('observacoes', $rcu->observacoes ?? '') }}</textarea>
                @error('observacoes')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Guardar Registo</button>
                <a href="{{ route('utente.dashboard') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>

        <!-- Botão de Logout -->
        <div class="text-center mt-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Sair</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
