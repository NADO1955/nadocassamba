@extends('layouts.app')

@section('title', 'Especialidades, Médicos e Exames')

@section('content')
<div class="container mt-4">
    <h2 class="text-center text-success mb-4">Especialidades, Médicos e Exames Disponíveis</h2>

    <div class="row">
        {{-- Especialidades --}}
        <div class="col-md-6">
            <h4 class="text-success">Especialidades</h4>
            @forelse($especialidades as $especialidade)
                <ul class="list-group mb-4">
                    <li class="list-group-item">{{ $especialidade->nome }}</li>
                </ul>
            @empty
                <p class="text-muted">Nenhuma especialidade registada.</p>
            @endforelse
        </div>

        {{-- Médicos --}}
        <div class="col-md-6">
            <h4 class="text-success">Médicos Disponíveis</h4>
            @forelse($medicos as $medico)
                <ul class="list-group mb-4">
                    <li class="list-group-item">
                        {{ $medico->nome }} - {{ $medico->especialidade->nome ?? 'Sem especialidade' }}
                    </li>
                </ul>
            @empty
                <p class="text-muted">Nenhum médico registado.</p>
            @endforelse
        </div>
    </div>

    {{-- Exames --}}
    <div class="row mt-4">
        <div class="col-12">
            <h4 class="text-success">Exames Complementares</h4>
            @forelse($exames as $exame)
                <ul class="list-group">
                    <li class="list-group-item">{{ $exame }}</li>
                </ul>
            @empty
                <p class="text-muted">Nenhum exame disponível.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
