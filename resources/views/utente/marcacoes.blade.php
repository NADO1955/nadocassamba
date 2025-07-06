@extends('layouts.app')

@section('title', 'Marcar Consulta ou Exame')

@section('content')
<div class="container mt-4">
    <h2 class="text-success mb-4">Marcar Consulta ou Exame</h2>

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Mensagem de erro geral --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Formulário de marcação --}}
    <form action="{{ route('utente.marcacoes.store') }}" method="POST">
        @csrf

        {{-- Especialidade --}}
        <div class="mb-3">
            <label for="especialidade_id" class="form-label">Especialidade</label>
            <select name="especialidade_id" id="especialidade_id" class="form-select" required>
                <option value="">Selecione a especialidade</option>
                @foreach($especialidades as $especialidade)
                    <option value="{{ $especialidade->id }}">{{ $especialidade->nome }}</option>
                @endforeach
            </select>
            @error('especialidade_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Médico --}}
        <div class="mb-3">
            <label for="medico_id" class="form-label">Médico</label>
            <select name="medico_id" id="medico_id" class="form-select" required>
                <option value="">Selecione o médico</option>
                @foreach($medicos as $medico)
                    <option value="{{ $medico->id }}">{{ $medico->nome }}</option>
                @endforeach
            </select>
            @error('medico_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Data --}}
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" id="data" class="form-control" required min="{{ date('Y-m-d') }}">
            @error('data')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tipo --}}
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-select" required>
                <option value="">Selecione o tipo</option>
                <option value="consulta">Consulta</option>
                <option value="exame">Exame</option>
            </select>
            @error('tipo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Botão --}}
        <button type="submit" class="btn btn-success">Confirmar Marcação</button>
    </form>
</div>
@endsection



