<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Gestão de Utentes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .wider-column {
            width: 150px;
        }
    </style>
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4 text-center">Gestão de Utentes</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th class="wider-column">Número do Documento</th>
                <th>Email</th>
                <th>Contacto</th>
                <th>Estado</th>
                <th>Registado em</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($utentes as $utente)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $utente->nome }}</td>
                    <td class="wider-column">{{ $utente->numero_documento }}</td>
                    <td>{{ $utente->email }}</td>
                    <td>{{ $utente->telefone }}</td>
                    <td>
                        @if((int) $utente->ativo === 1)
                            <span class="badge bg-success">Ativo</span>
                        @else
                            <span class="badge bg-danger">Inativo</span>
                        @endif
                    </td>
                    <td>{{ $utente->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.utentes.dashboard', $utente->id) }}" class="btn btn-sm btn-primary">Ver</a>
                        <a href="{{ route('admin.utentes.edit', $utente->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <button class="btn btn-sm btn-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#confirmModal"
                                data-action="{{ route('admin.utentes.destroy', $utente->id) }}"
                                data-title="Deletar Utente">
                            Deletar
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Nenhum utente encontrado.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $utentes->links() }}
    </div>

    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-info">Voltar à Página Principal</a>
    </div>

    <!-- Modal de Confirmação -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmar Ação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja realizar esta ação? <span id="modal-action-title"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="modalForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var modal = document.getElementById('confirmModal');
    modal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var action = button.getAttribute('data-action');
        var title = button.getAttribute('data-title');
        var form = document.getElementById('modalForm');
        form.action = action;
        var modalTitle = document.getElementById('modal-action-title');
        modalTitle.textContent = title;
    });
</script>
</body>
</html>





