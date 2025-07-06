<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Utente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7-beta.30/inputmask.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Editar Utente</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('admin.utentes.update', $utente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $utente->nome) }}" required>
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="numero_documento" class="form-label">Número do Documento</label>
                <input type="text" class="form-control @error('numero_documento') is-invalid @enderror" id="numero_documento" name="numero_documento" value="{{ old('numero_documento', $utente->numero_documento) }}">
                @error('numero_documento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $utente->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{ old('telefone', $utente->telefone) }}">
                @error('telefone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ativo" class="form-label">Estado</label>
                <select class="form-select @error('ativo') is-invalid @enderror" id="ativo" name="ativo" required>
                    <option value="" disabled selected>-- Selecione o estado --</option>
                    <option value="1" {{ old('ativo', $utente->ativo) == 1 ? 'selected' : '' }}>Ativo</option>
                    <option value="0" {{ old('ativo', $utente->ativo) == 0 ? 'selected' : '' }}>Inativo</option>
                </select>
                @error('ativo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="{{ route('admin.utentes.index') }}" class="btn btn-secondary">Cancelar</a>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-info text-white">Voltar ao Painel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        Inputmask("99999999[A]").mask(document.getElementById("numero_documento"));
        Inputmask({"mask": "(99) 9999-9999[9]"}).mask(document.getElementById("telefone"));
    </script>
</body>
</html>


