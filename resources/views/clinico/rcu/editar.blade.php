@extends('layouts.app')

@section('title', 'Editar Registo Clínico')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-primary">Editar Registo Clínico do Utente</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('clinico.rcu.atualizar', $rcu->utente_id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome do Utente</label>
            <input type="text" class="form-control" value="{{ $rcu->utente->nome }}" disabled>
        </div>

        <div class="mb-3">
            <label for="diagnostico" class="form-label">Diagnóstico</label>
            <textarea name="diagnostico" id="diagnostico" class="form-control" rows="3" required>{{ old('diagnostico', $rcu->diagnostico) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tratamento" class="form-label">Tratamento</label>
            <textarea name="tratamento" id="tratamento" class="form-control" rows="3" required>{{ old('tratamento', $rcu->tratamento) }}</textarea>
        </div>

        

        <button type="submit" class="btn btn-success">Guardar Alterações</button>
        <a href="{{ route('clinico.rcu.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
