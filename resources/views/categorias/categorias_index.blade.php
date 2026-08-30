@extends('layouts.app')

@section('title','Categorias')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title">Categorias</h2>

    <a href="{{ route('categorias.create') }}" class="btn-purple">
        + Nova Categoria
    </a>
</div>

<div class="glass-card">

    <div class="table-box">

        <table class="table align-middle">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Ativo</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th width="180">Ações</th>
                </tr>
            </thead>

            <tbody>

                @forelse($categorias as $categoria)

                <tr>

                    <td>{{ $categoria->id }}</td>

                    <td>{{ $categoria->nome }}</td>

                    <td>
                        <span class="badge-purple">
                            {{ $categoria->codigo }}
                        </span>
                    </td>

                    <td>{{ $categoria->descricao }}</td>

                    <td>
                        @if($categoria->ativo)
                            ✅ Ativa
                        @else
                            ❌ Desativada
                        @endif
                    </td>

                    <td>{{ $categoria->created_at?->format('d/m/Y H:i') }}</td>

                    <td>{{ $categoria->updated_at?->format('d/m/Y H:i') }}</td>

                    <td>

                        <a class="action-btn edit"
                           href="{{ route('categorias.edit', Crypt::encrypt($categoria->id)) }}">
                            Editar
                        </a>

                        <button type="button"
                                class="btn btn-link p-0 action-btn delete"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal"
                                data-delete-url="{{ route('categorias.destroy', Crypt::encrypt($categoria->id)) }}"
                                data-item-name="{{ $categoria->nome }}">
                            Excluir
                        </button>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="8" class="text-center p-4">
                        Nenhuma categoria cadastrada.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header border-0">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                    Confirmar exclusão
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>

            <div class="modal-body">
                Tem certeza que deseja excluir a categoria
                <strong id="deleteModalItemName"></strong>?
                <br>
                <span class="text-muted small">Esta ação não poderá ser desfeita.</span>
            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancelar
                </button>

                <form id="deleteModalForm" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-1"></i> Excluir
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    const deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const deleteUrl = button.getAttribute('data-delete-url');
        const itemName = button.getAttribute('data-item-name');

        document.getElementById('deleteModalForm').setAttribute('action', deleteUrl);
        document.getElementById('deleteModalItemName').textContent = itemName;
    });
</script>

@endsection