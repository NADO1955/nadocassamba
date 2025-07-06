@extends('layouts.app') {{-- Corrigido para usar o layout existente --}}

@section('title', 'Editar Especialidade')

@section('content')
<div class="container mt-4">
    <h2>Editar Especialidade</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.especialidades.atualizar', $especialidade->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Especialidade</label>
            <input type="text" name="nome" class="form-control" required value="{{ old('nome', $especialidade->nome) }}">
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('admin.especialidades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

