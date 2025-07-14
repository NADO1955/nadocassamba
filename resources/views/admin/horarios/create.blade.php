@extends('layouts.app')

@section('title', 'Novo Horário')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Novo Horário</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.horarios.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="clinico_id" class="form-label">Clínico</label>
            <select name="clinico_id" id="clinico_id" class="form-select" required>
                <option value="">-- Selecionar --</option>
                @foreach($clinicos as $clinico)
                    <option value="{{ $clinico->id }}">{{ $clinico->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" id="data" name="data" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora de Início</label>
            <input type="time" id="hora_inicio" name="hora_inicio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hora_fim" class="form-label">Hora de Fim</label>
            <input type="time" id="hora_fim" name="hora_fim" class="form-control" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('admin.horarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
