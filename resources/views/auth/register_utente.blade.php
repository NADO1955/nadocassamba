@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="text-center text-success">Registo - Utente</h3>

    <div class="row justify-content-center">
        <div class="col-md-6">

            {{-- Exibição de erros de validação --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.utente.post') }}">
                @csrf

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input id="nome" type="text" name="nome" class="form-control" required value="{{ old('nome') }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" name="email" class="form-control" required value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input id="telefone" type="text" name="telefone" class="form-control" value="{{ old('telefone') }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Palavra-passe</label>
                    <input id="password" type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Palavra-passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Registar</button>

                <div class="text-center mt-3">
                    <p>Já tem conta? <a href="{{ route('login') }}" class="btn btn-outline-primary">Entrar</a></p>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
