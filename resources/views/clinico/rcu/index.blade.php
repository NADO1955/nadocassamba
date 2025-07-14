@extends('layouts.app')

@section('title', 'Registo Clínico dos Utentes')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-primary">Registo Clínico dos Utentes</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($rcus->isEmpty())
        <p class="text-muted">Nenhum registo clínico disponível.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Utente</th>
                    <th>Diagnóstico</th>
                    <th>Tratamento</th>
                    <th>Última Actualização</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rcus as $rcu)
                    <tr>
                        <td>{{ $rcu->utente->nome }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($rcu->diagnostico, 30) }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($rcu->tratamento, 30) }}</td>
                        <td>{{ $rcu->updated_at ? $rcu->updated_at->format('d/m/Y H:i') : 'N/D' }}</td>
                        <td>
                            <a href="{{ route('clinico.rcu.editar', $rcu->utente_id) }}" class="btn btn-sm btn-warning">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
