@php
use Illuminate\Support\Facades\Crypt;
use App\Services\Operations;
@endphp

@extends('layouts.app')

@section('title','Produtos')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="page-title mb-0">Produtos</h2>
        <small class="text-muted">Estoque total: {{ $estoqueTotal }} unidades</small>
    </div>

    <a href="{{ route('produtos.create') }}" class="btn-purple">
        + Novo Produto
    </a>
</div>

<div class="glass-card">

    <div class="table-box">

        <table class="table align-middle">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th width="180">Ações</th>
                </tr>
            </thead>

            <tbody>

                @forelse($produtos as $produto)

                <tr>

                    <td>{{ $produto->id }}</td>

                    <td>{{ $produto->nome }}</td>

                    <td>{{ $produto->descricao }}</td>

                    <td>{{ $produto->categoria->nome }}</td>

                    <td>{{ Operations::dinheiro($produto->preco) }}</td>

                    <td>{{ $produto->estoque }}</td>

                    <td>{{ $produto->created_at?->format('d/m/Y H:i') }}</td>

                    <td>{{ $produto->updated_at?->format('d/m/Y H:i') }}</td>

                    <td>

                        <a class="action-btn edit"
                           href="{{ route('produtos.edit', Crypt::encrypt($produto->id)) }}">
                            Editar
                        </a>

                        <button type="button"
                                class="btn btn-link p-0 action-btn delete"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal"
                                data-delete-url="{{ route('produtos.destroy', Crypt::encrypt($produto->id)) }}"
                                data-item-name="{{ $produto->nome }}">
                            Excluir
                        </button>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="9" class="text-center p-4">
                        Nenhum produto cadastrado.
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
                Tem certeza que deseja excluir o produto
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