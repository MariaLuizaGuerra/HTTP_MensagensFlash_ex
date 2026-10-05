@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-3">Criar conta</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                   class="form-control @error('name') is-invalid @enderror" required autofocus>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Usuário</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}"
                   class="form-control @error('username') is-invalid @enderror" required>
            @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" id="password" name="password"
                   class="form-control @error('password') is-invalid @enderror" required>
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar senha</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   class="form-control" required>
        </div>

        <button class="btn btn-primary">Cadastrar</button>
        <a href="{{ route('login') }}" class="btn btn-link">Já tenho conta</a>
    </form>
@endsection