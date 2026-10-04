@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Minhas tarefas</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm">Nova tarefa</a>
    </div>

    @forelse ($tasks as $task)
        <div class="d-flex justify-content-between align-items-center border rounded p-2 mb-2">
            <span @class(['text-decoration-line-through text-muted' => $task->done])>
                {{ $task->title }}
            </span>
            <div class="d-flex gap-2">
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                <form method="POST" action="{{ route('tasks.destroy', $task->id) }}"
                      onsubmit="return confirm('Remover esta tarefa?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Excluir</button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-muted">Nenhuma tarefa ainda. Crie a primeira!</p>
    @endforelse
@endsection
