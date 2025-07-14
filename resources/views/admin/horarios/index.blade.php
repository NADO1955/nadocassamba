@extends('layouts.app')

@section('title', 'Horários do Clínico')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Meus Horários</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(isset($horarios) && $horarios->count())
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Data</th>
                    <th>Hora de Início</th>
                    <th>Hora de Fim</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horarios as $horario)
                    <tr>
                        <td>{{ $horario->data ? \Carbon\Carbon::parse($horario->data)->format('d/m/Y') : '-' }}</td>
                        <td>{{ $horario->hora_inicio ?? '-' }}</td>
                        <td>{{ $horario->hora_fim ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Nenhum horário disponível.</div>
    @endif
</div>
@endsection

