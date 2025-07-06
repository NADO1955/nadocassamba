@extends('layouts.app')

@section('title', 'Contacto')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card border-warning shadow-sm p-4">
                <h2 class="text-center text-success mb-4 section-title">
                    <i class="bi bi-envelope-paper icon-hover me-2"></i> Fale Connosco
                </h2>

                {{-- Mensagem de sucesso --}}
                @if(session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row g-5">
                    {{-- Informações de contacto --}}
                    <div class="col-md-6">
                        <h5 class="text-success">Informações de Contacto</h5>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2">
                                <i class="bi bi-geo-alt-fill text-success me-2"></i>
                                Rua do Hospital Central, Luanda, Angola
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-envelope-fill text-success me-2"></i>
                                Bernardocassamba@gmail.com
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-telephone-fill text-success me-2"></i>
                                +244 929 298 019
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-clock-fill text-success me-2"></i>
                                Segunda a Sexta, 08:00 - 17:00
                            </li>
                        </ul>

                        <h6 class="mt-4 text-success">Siga-nos:</h6>
                        <div class="d-flex mt-2">
                            <a href="#" class="text-success text-decoration-none me-3 icon-hover">
                                <i class="bi bi-facebook fs-4"></i>
                            </a>
                            <a href="#" class="text-success text-decoration-none icon-hover">
                                <i class="bi bi-twitter fs-4"></i>
                            </a>
                        </div>
                    </div>

                    {{-- Formulário --}}
                    <div class="col-md-6">
                        <h5 class="text-success mb-3">Envie-nos uma Mensagem</h5>
                        <form method="POST" action="{{ route('site.contacto.enviar') }}">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                                <label for="nome">Nome</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                                <label for="email">E-mail</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="mensagem" name="mensagem" placeholder="Mensagem" style="height: 140px;" required></textarea>
                                <label for="mensagem">Mensagem</label>
                            </div>

                            <button type="submit" class="btn btn-success w-100 btn-login">
                                <i class="bi bi-send me-1"></i> Enviar
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


