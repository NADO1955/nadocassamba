@extends('layouts.app')

@section('title', 'Registo Clínico')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Registo Clínico do Utente</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($rcu)
                <div class="mb-3">
                    <label class="form-label"><strong>Diagnóstico:</strong></label>
                    <p class="form-control-plaintext">{{ $rcu->diagnostico ?? 'Não disponível' }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Tratamento:</strong></label>
                    <p class="form-control-plaintext">{{ $rcu->tratamento ?? 'Não disponível' }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Prescrição:</strong></label>
                    <p class="form-control-plaintext">{{ $rcu->prescricao ?? 'Não disponível' }}</p>
                </div>
            @else
                <p class="text-muted">Não existe registo clínico para este utente.</p>
            @endif

            <a href="{{ route('clinico.rcu.index') }}" class="btn btn-secondary mt-3">← Voltar</a>
        </div>
    </div>
</div>
@endsection
