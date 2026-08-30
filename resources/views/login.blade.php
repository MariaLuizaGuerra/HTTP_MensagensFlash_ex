<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/favicon.svg') }}">
    <link rel="alternate icon" href="{{ asset('favicon.ico') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body class="login-bg d-flex align-items-center justify-content-center">

<div class="card shadow-lg p-4" style="max-width:420px;width:100%">

    <div class="text-center mb-3">
        <i class="bi bi-shop display-4 text-primary"></i>
        <h3 class="fw-bold">Vendinhas</h3>
        <p class="text-muted">Faça login para continuar</p>
    </div>

    @if(session('login_error'))
        <div class="alert alert-danger">
            {{ session('login_error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <div class="form-floating mb-3">
            <input
                type="text"
                name="text_username"
                class="form-control @error('text_username') is-invalid @enderror"
                id="text_username"
                value="{{ old('text_username') }}"
                placeholder="Email">
            <label for="text_username">Email</label>
            @error('text_username')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-floating mb-4">
            <input
                type="password"
                name="text_password"
                class="form-control @error('text_password') is-invalid @enderror"
                id="text_password"
                placeholder="Senha">
            <label for="text_password">Senha</label>
            @error('text_password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-box-arrow-in-right me-2"></i>Entrar
        </button>

    </form>

</div>

</body>
</html>