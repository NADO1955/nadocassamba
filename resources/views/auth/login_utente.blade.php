@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0"><i class="bi bi-person-circle me-2"></i>Login do Utente</h4>
                </div>
                <div class="card-body p-4">

                    {{-- Alerta de erro --}}
                    @if(session('error'))
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Alerta de incentivo para registro --}}
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle me-1"></i>
                        Ainda não tens conta? <br>
                        <a href="{{ route('utente.registo') }}" class="btn btn-sm btn-outline-primary mt-2">
                            <i class="bi bi-person-plus-fill me-1"></i> Cadastrar-se
                        </a>
                    </div>

                    {{-- Formulário --}}
                    <form method="POST" action="{{ route('login.utente.post') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Palavra-passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                       name="password" required>
                            </div>
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <input type="hidden" name="role" value="utente">

                        <button type="submit" class="btn btn-success w-100 fw-bold">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Entrar no Sistema
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection


