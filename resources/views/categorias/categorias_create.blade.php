@extends('layouts.app')

@section('title','Nova Categoria')

@section('content')

<h2 class="page-title">Nova Categoria</h2>

<div class="glass-card">

<form method="POST" action="{{ route('categorias.store') }}">

    @csrf

    <div class="mb-3">
        <label>Nome</label>

        <input type="text"
               name="nome"
               class="form-control"
               value="{{ old('nome') }}">

        @error('nome')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>


    <div class="mb-3">
        <label>Código</label>

        <input type="text"
               name="codigo"
               class="form-control"
               value="{{ old('codigo') }}">

        @error('codigo')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>


    <div class="mb-3">
        <label>Descrição</label>

        <textarea name="descricao"
                  rows="4"
                  class="form-control">{{ old('descricao') }}</textarea>

        @error('descricao')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>


    <div class="form-check mb-4">

        <input class="form-check-input"
               type="checkbox"
               name="ativo"
               checked>

        <label class="form-check-label">
            Categoria ativa
        </label>

    </div>


    <button class="btn-purple">
        Salvar
    </button>

    <a href="{{ route('categorias.index') }}"
       class="btn btn-light ms-2">
        Cancelar
    </a>

</form>

</div>

@endsection