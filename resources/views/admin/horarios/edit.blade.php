@extends('layouts.app')

@section('title', 'Editar Horário')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Editar Horário</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.horarios.update', $horario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="clinico_id" class="form-label">Clínico</label>
            <select name="clinico_id" id="clinico_id" class="form-select" required>
                @foreach ($clinicos as $clinico)
                    <option value="{{ $clinico->id }}" {{ $horario->clinico_id == $clinico->id ? 'selected' : '' }}>
                        {{ $clinico->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" id="data" class="form-control" required value="{{ $horario->data }}">
        </div>

        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora de Início</label>
            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" required value="{{ $horario->hora_inicio }}">
        </div>

        <div class="mb-3">
            <label for="hora_fim" class="form-label">Hora de Fim</label>
            <input type="time" name="hora_fim" id="hora_fim" class="form-control" required value="{{ $horario->hora_fim }}">
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('admin.horarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
