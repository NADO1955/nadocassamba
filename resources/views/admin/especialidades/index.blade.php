@extends('layouts.app') {{-- Layout base corrigido --}}

@section('title', 'Especialidades')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Lista de Especialidades</h2>
        <a href="{{ route('admin.especialidades.criar') }}" class="btn btn-primary">+ Nova Especialidade</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($especialidades->count())
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nome da Especialidade</th>
                    <th>Criada em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($especialidades as $especialidade)
                    <tr>
                        <td>{{ $especialidade->id }}</td>
                        <td>{{ $especialidade->nome }}</td>
                        <td>{{ $especialidade->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.especialidades.editar', $especialidade->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('admin.especialidades.deletar', $especialidade->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Tens a certeza que queres eliminar esta especialidade?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $especialidades->links() }} {{-- Paginação --}}
    @else
        <div class="alert alert-info">Nenhuma especialidade encontrada.</div>
    @endif
</div>
@endsection


