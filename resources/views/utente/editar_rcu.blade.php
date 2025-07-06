<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Registo Clínico</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container bg-white p-4 shadow rounded" style="max-width: 600px; width: 100%;">
        <h2 class="text-center mb-4 text-primary">
            <i class="bi bi-clipboard2-pulse"></i> Editar Registo Clínico
        </h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('utente.rcu.atualizar') }}">
            @csrf

            <!-- Grupo Sanguíneo -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-droplet-half"></i> Grupo Sanguíneo</label>
                <input type="text" name="grupo_sanguineo" class="form-control @error('grupo_sanguineo') is-invalid @enderror"
                       value="{{ old('grupo_sanguineo', $rcu->grupo_sanguineo ?? '') }}">
                @error('grupo_sanguineo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Histórico Médico -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-hospital"></i> Histórico Médico</label>
                <textarea name="historico_medico" class="form-control @error('historico_medico') is-invalid @enderror" rows="2">{{ old('historico_medico', $rcu->historico_medico ?? '') }}</textarea>
                @error('historico_medico')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Histórico Familiar -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-people-fill"></i> Histórico Familiar</label>
                <textarea name="historia_familiar" class="form-control @error('historia_familiar') is-invalid @enderror" rows="2">{{ old('historia_familiar', $rcu->historia_familiar ?? '') }}</textarea>
                @error('historia_familiar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Alergias -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-exclamation-triangle-fill"></i> Alergias</label>
                <textarea name="alergias" class="form-control @error('alergias') is-invalid @enderror" rows="2">{{ old('alergias', $rcu->alergias ?? '') }}</textarea>
                @error('alergias')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Medicações Atuais -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-capsule-pill"></i> Medicações Atuais</label>
                <textarea name="medicacoes_atuais" class="form-control @error('medicacoes_atuais') is-invalid @enderror" rows="2">{{ old('medicacoes_atuais', $rcu->medicacoes_atuais ?? '') }}</textarea>
                @error('medicacoes_atuais')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Boletim de Vacinas -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-shield-plus"></i> Boletim de Vacinas</label>
                <textarea name="boletim_vacinas" class="form-control @error('boletim_vacinas') is-invalid @enderror" rows="2">{{ old('boletim_vacinas', $rcu->boletim_vacinas ?? '') }}</textarea>
                @error('boletim_vacinas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Observações -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-card-text"></i> Observações</label>
                <textarea name="observacoes" class="form-control @error('observacoes') is-invalid @enderror" rows="2">{{ old('observacoes', $rcu->observacoes ?? '') }}</textarea>
                @error('observacoes')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success px-4">
                    <i class="bi bi-check-circle"></i> Guardar Alterações
                </button>
                <a href="{{ route('utente.rcu') }}" class="btn btn-secondary px-4">
                    <i class="bi bi-x-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS personalizado -->
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>



