@extends('layouts.app') {{-- Usa o layout principal do sistema --}}

@section('title', 'Login - Pessoal Clínico')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center text-primary mb-4">Login do Pessoal Clínico</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ⚠️ Corrigido: Nome da rota atualizado para clinico.login.post --}}
            <form method="POST" action="{{ route('clinico.login.post') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" required autofocus value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Palavra-passe</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Lembrar-me</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
