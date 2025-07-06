@extends('layouts.app')

@section('title', 'Horários de Atendimento')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Gerir Horários de Atendimento</h2>
        <a href="{{ route('clinico.dashboard') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left-circle"></i> Voltar ao Painel
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $erro)
                <div>{{ $erro }}</div>
            @endforeach
        </div>
    @endif

    @if (empty($horarios) || !$horarios->count())
        <p class="text-muted">Nenhum horário definido ainda.</p>
    @else
        <div class="card mb-4">
            <div class="card-body">
                <h5>Período de Validade:</h5>
                <p>
                    Início: <strong>{{ \Carbon\Carbon::parse($horarios['data_inicio'])->format('d/m/Y') }}</strong> |
                    Fim: <strong>{{ \Carbon\Carbon::parse($horarios['data_fim'])->format('d/m/Y') }}</strong>
                </p>

                <h5 class="mt-3">Dias da Semana:</h5>
                <ul class="mb-3">
                    @foreach(json_decode($horarios['dias_semana'], true) as $dia)
                        <li>{{ ucfirst($dia) }}</li>
                    @endforeach
                </ul>

                <h5>Horário de Atendimento:</h5>
                <p>
                    Das <strong>{{ \Carbon\Carbon::parse($horarios['horario_inicio'])->format('H:i') }}</strong>
                    às <strong>{{ \Carbon\Carbon::parse($horarios['horario_fim'])->format('H:i') }}</strong>
                </p>
            </div>
        </div>
    @endif

    <div class="text-end">
        <a href="{{ route('clinico.horarios.editar') }}" class="btn btn-primary">
            <i class="bi bi-pencil-square"></i> Definir / Actualizar Horário
        </a>
    </div>
</div>
@endsection
