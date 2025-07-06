@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-success text-center">
        Bem-vindo, {{ Auth::guard('utente')->user()->nome ?? 'Utente' }}!
    </h2>

    <div class="row mt-4 justify-content-center">
        <div class="col-md-8">
            <div class="list-group">
                <a href="{{ route('utente.registo') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-person-plus"></i> Atualizar Dados Pessoais
                </a>
                <a href="{{ route('utente.rcu') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-clipboard-pulse"></i> Ver/Atualizar RCU
                </a>
                <a href="{{ route('utente.marcacoes') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-calendar-plus"></i> Marcar Consulta ou Exame
                </a>
                <a href="{{ route('utente.marcacoes.historico') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-clock-history"></i> Histórico de Marcações
                </a>
                <a href="{{ route('utente.disponiveis') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-eye"></i> Ver Especialidades, Médicos e Exames Disponíveis
                </a>
            </div>
        </div>
    </div>
</div>
@endsection


