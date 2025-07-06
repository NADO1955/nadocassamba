@extends('layouts.app')

@section('title', 'Editar Marcação')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Editar Marcação</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.marcacoes.atualizar', $marcacao->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="utente_id" class="form-label">Utente</label>
            <select class="form-select" name="utente_id" id="utente_id" required>
                <option value="">-- Selecionar Utente --</option>
                @foreach($utentes as $utente)
                    <option value="{{ $utente->id }}" {{ $marcacao->utente_id == $utente->id ? 'selected' : '' }}>
                        {{ $utente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="medico_id" class="form-label">Clínico</label>
            <select class="form-select" name="medico_id" id="medico_id" required>
                <option value="">-- Selecionar Clínico --</option>
                @foreach($clinicos as $clinico)
                    <option value="{{ $clinico->id }}" {{ $marcacao->medico_id == $clinico->id ? 'selected' : '' }}>
                        {{ $clinico->nome }} - {{ $clinico->especialidade->nome ?? 'Sem especialidade' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data da Marcação</label>
            <input type="date" class="form-control" name="data" id="data" value="{{ old('data', $marcacao->data) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Alterações</button>
        <a href="{{ route('admin.marcacoes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
