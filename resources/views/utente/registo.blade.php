@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <h3 class="text-center text-success mb-4">
                        <i class="bi bi-person-plus-fill me-2"></i>Registo de Utente
                    </h3>

                    {{-- Alertas --}}
                    @if(session('success'))
                        <div class="alert alert-success text-center">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $erro)
                                    <li>{{ $erro }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Formulário --}}
                    <form action="{{ route('utente.store') }}" method="POST" novalidate>
                        @csrf

                        <div class="row">
                            <!-- Nome -->
                            <div class="col-md-6 mb-3">
                                <label for="nome" class="form-label">Nome Completo</label>
                                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
                            </div>

                            <!-- E-mail -->
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                            </div>

                            <!-- Telefone -->
                            <div class="col-md-6 mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" name="telefone" id="telefone" class="form-control" value="{{ old('telefone') }}">
                            </div>

                            <!-- Tipo de Documento -->
                            <div class="col-md-6 mb-3">
                                <label for="documento_identificacao" class="form-label">Tipo de Documento</label>
                                <select name="documento_identificacao" id="documento_identificacao" class="form-select" required>
                                    <option value="">-- Selecionar --</option>
                                    <option value="BI" {{ old('documento_identificacao') == 'BI' ? 'selected' : '' }}>BI</option>
                                    <option value="Passaporte" {{ old('documento_identificacao') == 'Passaporte' ? 'selected' : '' }}>Passaporte</option>
                                </select>
                            </div>

                            <!-- Número do Documento -->
                            <div class="col-md-6 mb-3">
                                <label for="numero_documento" id="label_numero_documento" class="form-label">Número do Documento</label>
                                <input type="text" name="numero_documento" id="numero_documento" class="form-control" value="{{ old('numero_documento') }}">
                            </div>

                            <!-- Data de Nascimento -->
                            <div class="col-md-6 mb-3">
                                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="{{ old('data_nascimento') }}">
                            </div>

                            <!-- Género -->
                            <div class="col-md-6 mb-3">
                                <label for="genero" class="form-label">Género</label>
                                <select name="genero" id="genero" class="form-select">
                                    <option value="">-- Selecionar --</option>
                                    <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="Feminino" {{ old('genero') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                                    <option value="Outro" {{ old('genero') == 'Outro' ? 'selected' : '' }}>Outro</option>
                                </select>
                            </div>

                            <!-- Endereço -->
                            <div class="col-12 mb-3">
                                <label for="endereco" class="form-label">Endereço</label>
                                <textarea name="endereco" id="endereco" rows="3" class="form-control rounded-3">{{ old('endereco') }}</textarea>
                            </div>

                            <!-- Entidade Financeira -->
                            <div class="col-md-6 mb-3">
                                <label for="entidade_financeira" class="form-label">Entidade Financeira Responsável</label>
                                <input type="text" name="entidade_financeira" id="entidade_financeira" class="form-control" value="{{ old('entidade_financeira') }}" placeholder="Ex: ENSA, Fidelidade, etc.">
                            </div>

                            <!-- Número de Utente -->
                            <div class="col-md-6 mb-3">
                                <label for="numero_utente_entidade" class="form-label">N.º de Utente na Entidade</label>
                                <input type="text" name="numero_utente_entidade" id="numero_utente_entidade" class="form-control" value="{{ old('numero_utente_entidade') }}">
                            </div>

                            <!-- Histórico Familiar -->
                            <div class="col-12 mb-3">
                                <label for="historico_familiar" class="form-label">Histórico Familiar</label>
                                <textarea name="historico_familiar" id="historico_familiar" rows="3" class="form-control rounded-3" placeholder="Ex: Doenças hereditárias">{{ old('historico_familiar') }}</textarea>
                            </div>

                            <!-- Boletim de Vacinas -->
                            <div class="col-12 mb-3">
                                <label for="boletim_vacinas" class="form-label">Boletim de Vacinas</label>
                                <textarea name="boletim_vacinas" id="boletim_vacinas" rows="3" class="form-control rounded-3" placeholder="Vacinas recebidas, datas, etc.">{{ old('boletim_vacinas') }}</textarea>
                            </div>

                            <!-- Observações -->
                            <div class="col-12 mb-3">
                                <label for="observacoes" class="form-label">Observações Clínicas</label>
                                <textarea name="observacoes" id="observacoes" rows="3" class="form-control rounded-3" placeholder="Alergias, limitações ou outras observações">{{ old('observacoes') }}</textarea>
                            </div>

                            <!-- Senha -->
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <!-- Confirmar Senha -->
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success px-5 py-2 fw-bold">
                                <i class="bi bi-check-circle me-2"></i>Submeter Registo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script para alterar rótulo dinamicamente --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tipoDocumento = document.getElementById('documento_identificacao');
        const labelNumero = document.getElementById('label_numero_documento');

        function atualizarRotulo() {
            const tipo = tipoDocumento.value;
            if (tipo === 'BI') {
                labelNumero.textContent = 'Número do BI';
            } else if (tipo === 'Passaporte') {
                labelNumero.textContent = 'Número do Passaporte';
            } else {
                labelNumero.textContent = 'Número do Documento';
            }
        }

        tipoDocumento.addEventListener('change', atualizarRotulo);
        atualizarRotulo();
    });
</script>
@endsection




