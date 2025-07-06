@extends('layouts.app')

@section('title', 'Histórico de Marcações')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-primary">Histórico de Marcações</h2>

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabela de marcações --}}
    @if($marcacoes->isEmpty())
        <p class="text-muted">Ainda não existem marcações feitas.</p>
    @else
        <table class="table table-striped table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Data</th>
                    <th>Tipo</th>
                    <th>Especialidade</th>
                    <th>Médico</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marcacoes as $marcacao)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($marcacao->data)->format('d/m/Y') }}</td>
                        <td>{{ ucfirst($marcacao->tipo) }}</td>
                        <td>{{ $marcacao->especialidade->nome ?? '---' }}</td>
                        <td>{{ $marcacao->medico->nome ?? '---' }}</td>
                        <td class="text-center">
                            {{-- Ver Detalhes --}}
                            <a href="{{ route('utente.marcacoes.ver', $marcacao->id) }}"
                               class="btn btn-sm btn-info me-1">
                                Ver
                            </a>

                            {{-- Editar --}}
                            <a href="{{ route('utente.marcacoes.editar', $marcacao->id) }}"
                               class="btn btn-sm btn-warning me-1">
                                Editar
                            </a>

                            {{-- Cancelar --}}
                            <form action="{{ route('utente.marcacoes.cancelar', $marcacao->id) }}"
                                  method="POST" style="display:inline-block;"
                                  onsubmit="return confirm('Deseja realmente cancelar esta marcação?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Cancelar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- Ações --}}
    <div class="d-flex justify-content-start gap-2 mt-3">
        <a href="{{ route('utente.marcacoes') }}" class="btn btn-outline-primary">Fazer nova marcação</a>

        <form action="{{ route('utente.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Sair</button>
        </form>
    </div>
</div>
@endsection



