@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="text-center text-success">Registo de Utente</h3>

    <div class="row justify-content-center">
        <div class="col-md-6">

            {{-- Mensagem de sucesso --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Erros de validação --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.utente.post') }}">
                @csrf

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input id="nome" type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" required value="{{ old('nome') }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input id="telefone" type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror" value="{{ old('telefone') }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Palavra-passe</label>
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Palavra-passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Registar</button>
            </form>

            {{-- Link de redirecionamento para login --}}
            <div class="text-center mt-3">
                <p>Já tem conta? <a href="{{ route('login.utente') }}">Entrar aqui</a></p>
            </div>

        </div>
    </div>
</div>
@endsection
