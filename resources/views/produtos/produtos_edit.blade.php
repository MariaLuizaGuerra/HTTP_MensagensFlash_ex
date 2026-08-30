@extends('layouts.app')

@section('title','Editar Produto')

@section('content')

<h2 class="page-title">Editar Produto</h2>

<div class="glass-card">

<form method="POST"
      action="{{ route('produtos.update', Crypt::encrypt($produto->id)) }}">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nome</label>

        <input type="text"
               name="nome"
               class="form-control"
               value="{{ old('nome',$produto->nome) }}">

        @error('nome')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="mb-3">
        <label>Categoria</label>

        <select name="categoria_id" class="form-select">

            @foreach($categorias as $categoria)

            <option value="{{ $categoria->id }}"
                {{ old('categoria_id',$produto->categoria_id)==$categoria->id ? 'selected' : '' }}>

                {{ $categoria->nome }}

            </option>

            @endforeach

        </select>

        @error('categoria_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="mb-3">
        <label>Preço</label>

        <input type="number"
               step="0.01"
               name="preco"
               class="form-control"
               value="{{ old('preco',$produto->preco) }}">

        @error('preco')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="mb-3">
        <label>Estoque</label>

        <input type="number"
               name="estoque"
               class="form-control"
               value="{{ old('estoque',$produto->estoque) }}">

        @error('estoque')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="mb-4">
        <label>Descrição</label>

        <textarea name="descricao"
                  rows="4"
                  class="form-control">{{ old('descricao',$produto->descricao) }}</textarea>

        @error('descricao')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <button class="btn-purple">
        Atualizar Produto
    </button>

    <a href="{{ route('produtos.index') }}"
       class="btn btn-light ms-2">
        Voltar
    </a>

</form>

</div>

@endsection