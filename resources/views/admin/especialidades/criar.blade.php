@extends('layouts.app') {{-- Corrigido para o layout existente --}}

@section('title', 'Nova Especialidade')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Nova Especialidade</h2>

    {{-- Mensagem de erro --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulário de criação --}}
    <form action="{{ route('admin.especialidades.salvar') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Especialidade</label>
            <input type="text" id="nome" name="nome" class="form-control" required value="{{ old('nome') }}">
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('admin.especialidades.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection

