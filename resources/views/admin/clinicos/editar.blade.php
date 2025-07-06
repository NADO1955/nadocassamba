<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Clínico</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- CSS Personalizado --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow rounded-4 p-4">

                <h3 class="mb-3 text-primary text-center">Editar Dados do Clínico</h3>
                <p class="text-center">Clínico: <strong>{{ $clinico->nome }}</strong></p>

                {{-- Mensagens de erro --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Erros encontrados:</strong>
                        <ul class="mb-0">
                            @foreach($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Sessão de sucesso --}}
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{-- Sessão de erro --}}
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('admin.clinicos.atualizar', $clinico->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" id="nome" value="{{ old('nome', $clinico->nome) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $clinico->email) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" name="telefone" id="telefone" value="{{ old('telefone', $clinico->telefone) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="especialidade_id" class="form-label">Especialidade</label>
                        <select name="especialidade_id" id="especialidade_id" class="form-select" required>
                            <option value="">-- Seleciona uma especialidade --</option>
                            @foreach($especialidades as $especialidade)
                                <option value="{{ $especialidade->id }}"
                                    {{ old('especialidade_id', $clinico->especialidade_id) == $especialidade->id ? 'selected' : '' }}>
                                    {{ $especialidade->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="ativo" class="form-label">Estado</label>
                        <select name="ativo" id="ativo" class="form-select" required>
                            <option value="1" {{ old('ativo', $clinico->ativo) == 1 ? 'selected' : '' }}>Ativo</option>
                            <option value="0" {{ old('ativo', $clinico->ativo) == 0 ? 'selected' : '' }}>Inativo</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.clinicos.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

{{-- Scripts --}}
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

