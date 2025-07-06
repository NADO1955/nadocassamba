<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Clínicos - Administração</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-3 d-flex justify-content-between align-items-center">
    <h2 class="mb-4">Lista de Pessoal Clínico</h2>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-outline-danger">Sair</button>
    </form>
</div>

<div class="container">

    <!-- Formulário de Novo Clínico -->
    <div class="card mb-4">
        <div class="card-header">Registar Novo Clínico</div>
        <div class="card-body">
            <form action="{{ route('admin.clinicos.salvar') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-3">
                    <input type="text" name="nome" class="form-control" placeholder="Nome completo" required>
                </div>
                <div class="col-md-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="col-md-2">
                    <select name="especialidade_id" class="form-select" required>
                        <option value="">-- Especialidade --</option>
                        @foreach($especialidades as $especialidade)
                            <option value="{{ $especialidade->id }}">{{ $especialidade->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="text" name="telefone" class="form-control" placeholder="Telefone">
                </div>
                <div class="col-md-2">
                    <select name="ativo" class="form-select" required>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="password" name="password" class="form-control" placeholder="Palavra-passe" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success w-100">Adicionar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Mensagens -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Lista de Clínicos -->
    @if($clinicos->isEmpty())
        <div class="alert alert-warning">Nenhum clínico registado.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Especialidade</th>
                    <th>Telefone</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clinicos as $clinico)
                    <tr>
                        <td>{{ $clinico->nome }}</td>
                        <td>{{ $clinico->email }}</td>
                        <td>{{ $clinico->especialidade->nome ?? 'Não atribuída' }}</td>
                        <td>{{ $clinico->telefone ?? '---' }}</td>
                        <td>
                            @if($clinico->ativo)
                                <span class="badge bg-success">Ativo</span>
                            @else
                                <span class="badge bg-secondary">Inativo</span>
                            @endif
                        </td>
                        <td class="d-flex flex-wrap gap-1">
                            <a href="{{ route('admin.clinicos.editar', $clinico->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="{{ route('admin.clinicos.especialidade', $clinico->id) }}" class="btn btn-sm btn-info">Especialidade</a>
                            <a href="{{ route('admin.clinicos.horarios', $clinico->id) }}" class="btn btn-sm btn-secondary">Horários</a>
                            <form action="{{ route('admin.clinicos.deletar', $clinico->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente apagar este clínico?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Apagar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginação -->
        <div class="mt-3">
            {{ $clinicos->links() }}
        </div>
    @endif
</div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>


