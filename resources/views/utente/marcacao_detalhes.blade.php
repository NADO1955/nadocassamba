@extends('layouts.app')

@section('title', 'Detalhes da Marcação')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-primary">Detalhes da Marcação</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Especialidade:</strong> {{ $marcacao->especialidade->nome }}</p>
            <p><strong>Médico:</strong> {{ $marcacao->medico->nome }}</p>
            <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($marcacao->data)->format('d/m/Y') }}</p>
            <p><strong>Tipo:</strong> {{ ucfirst($marcacao->tipo) }}</p>
        </div>
    </div>

    <a href="{{ route('utente.marcacoes.historico') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
