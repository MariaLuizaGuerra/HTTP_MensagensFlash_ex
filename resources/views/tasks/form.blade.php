@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-3">{{ $task->exists ? 'Editar tarefa' : 'Nova tarefa' }}</h1>

    <form method="POST"
          action="{{ $task->exists ? route('tasks.update', $task->id) : route('tasks.store') }}">
        @csrf
        @if ($task->exists)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}"
                   class="form-control @error('title') is-invalid @enderror" required autofocus>
            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        @if ($task->exists)
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="done" name="done" value="1"
                       @checked(old('done', $task->done))>
                <label class="form-check-label" for="done">Concluída</label>
            </div>
        @endif

        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-link">Cancelar</a>
    </form>
@endsection
