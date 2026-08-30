@extends('layouts.app')

@section('title','Editar Categoria')

@section('content')

<h2 class="page-title">Editar Categoria</h2>

<div class="glass-card">

<form method="POST"
      action="{{ route('categorias.update', Crypt::encrypt($categoria->id)) }}">

    @csrf
    @method('PUT')


    <div class="mb-3">
        <label>Nome</label>

        <input type="text"
               name="nome"
               class="form-control"
               value="{{ old('nome',$categoria->nome) }}">

        @error('nome')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>


    <div class="mb-3">
        <label>Código</label>

        <input type="text"
               name="codigo"
               class="form-control"
               value="{{ old('codigo',$categoria->codigo) }}">

        @error('codigo')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>


    <div class="mb-3">
        <label>Descrição</label>

        <textarea name="descricao"
                  rows="4"
                  class="form-control">{{ old('descricao',$categoria->descricao) }}</textarea>

        @error('descricao')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>


   <div class="form-check mb-4">
        <input type="hidden" name="ativo" value="0">

        <input
            type="checkbox"
            class="form-check-input"
            id="ativo"
            name="ativo"
            value="1"
            {{ old('ativo', $categoria->ativo) ? 'checked' : '' }}>

        <label class="form-check-label" for="ativo">
            Categoria ativa
        </label>
    </div>


    <button class="btn-purple">
        Atualizar
    </button>

    <a href="{{ route('categorias.index') }}"
       class="btn btn-light ms-2">
        Voltar
    </a>

</form>

</div>

@endsection