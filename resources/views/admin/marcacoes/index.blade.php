@extends('layouts.app')

@section('title', 'Marcações')

@section('content')
<div class="container mt-4">
    <h2>Lista de Marcações</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($marcacoes->count())
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Utente</th>
                    <th>Médico</th>
                    <th>Data</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marcacoes as $marcacao)
                    <tr>
                        <td>{{ $marcacao->id }}</td>
                        <td>{{ $marcacao->utente->nome ?? 'N/D' }}</td>
                        <td>{{ $marcacao->medico->nome ?? 'N/D' }}</td>
                        <td>{{ \Carbon\Carbon::parse($marcacao->data)->format('d/m/Y') }}</td>
                        <td>{{ ucfirst($marcacao->estado ?? 'pendente') }}</td>
                        <td>
                            <a href="{{ route('admin.marcacoes.show', $marcacao->id) }}" class="btn btn-sm btn-info">Detalhes</a>
                            <a href="{{ route('admin.marcacoes.edit', $marcacao->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('admin.marcacoes.destroy', $marcacao->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tens a certeza que queres cancelar esta marcação?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Cancelar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $marcacoes->links() }} {{-- Paginação --}}
    @else
        <div class="alert alert-info">Nenhuma marcação encontrada.</div>
    @endif
</div>
@endsection
