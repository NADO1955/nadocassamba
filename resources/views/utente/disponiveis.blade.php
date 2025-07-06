@extends('layouts.app')

@section('title', 'Serviços Disponíveis')

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">
        <i class="bi bi-building"></i> Serviços Disponíveis na Instituição
    </h2>

    {{-- Especialidades --}}
    <div class="mb-5">
        <h4 class="text-success">
            <i class="bi bi-hospital"></i> Especialidades Médicas
        </h4>
        @if($especialidades->isEmpty())
            <p class="text-muted">Nenhuma especialidade registada.</p>
        @else
            <ul class="list-group">
                @foreach($especialidades as $especialidade)
                    <li class="list-group-item">
                        {{ $especialidade->nome }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    {{-- Médicos --}}
    <div class="mb-5">
        <h4 class="text-success">
            <i class="bi bi-person-badge"></i> Médicos Disponíveis
        </h4>
        @if($medicos->isEmpty())
            <p class="text-muted">Nenhum médico registado.</p>
        @else
            <ul class="list-group">
                @foreach($medicos as $medico)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $medico->nome }}
                        @if($medico->especialidade)
                            <span class="badge bg-primary">
                                {{ $medico->especialidade->nome }}
                            </span>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    {{-- Exames (opcional) --}}
    @isset($exames)
    <div class="mb-5">
        <h4 class="text-success">
            <i class="bi bi-clipboard2-pulse"></i> Exames Complementares de Diagnóstico
        </h4>
        @if($exames->isEmpty())
            <p class="text-muted">Nenhum exame disponível.</p>
        @else
            <ul class="list-group">
                @foreach($exames as $exame)
                    <li class="list-group-item">
                        {{ $exame->nome }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    @endisset

    <a href="{{ route('utente.dashboard') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left-circle"></i> Voltar ao Painel
    </a>
</div>
@endsection


