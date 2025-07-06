@extends('layouts.app')

@section('title', 'Editar Marcação')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary mb-4">Editar Marcação</h2>

    {{-- Mensagens --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Erros --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('utente.marcacoes.atualizar', $marcacao->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Especialidade --}}
        <div class="mb-3">
            <label for="especialidade_id" class="form-label">Especialidade</label>
            <select name="especialidade_id" id="especialidade_id" class="form-select" required>
                @foreach($especialidades as $especialidade)
                    <option value="{{ $especialidade->id }}"
                        {{ $especialidade->id == $marcacao->especialidade_id ? 'selected' : '' }}>
                        {{ $especialidade->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Médico --}}
        <div class="mb-3">
            <label for="medico_id" class="form-label">Médico</label>
            <select name="medico_id" id="medico_id" class="form-select" required>
                @foreach($medicos as $medico)
                    <option value="{{ $medico->id }}"
                        {{ $medico->id == $marcacao->medico_id ? 'selected' : '' }}>
                        {{ $medico->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Data --}}
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" id="data" class="form-control"
                   value="{{ \Illuminate\Support\Carbon::parse($marcacao->data)->format('Y-m-d') }}"
                   required min="{{ date('Y-m-d') }}">
        </div>

        {{-- Tipo --}}
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-select" required>
                <option value="consulta" {{ $marcacao->tipo == 'consulta' ? 'selected' : '' }}>Consulta</option>
                <option value="exame" {{ $marcacao->tipo == 'exame' ? 'selected' : '' }}>Exame</option>
            </select>
        </div>

        {{-- Botões --}}
        <div class="d-flex justify-content-between">
            <a href="{{ route('utente.marcacoes.historico') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Atualizar Marcação</button>
        </div>
    </form>
</div>
@endsection

