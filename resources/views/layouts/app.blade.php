<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tarefas - Sessões e Flash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4" style="max-width: 760px;">
    @auth
        <nav class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <a href="{{ route('tasks.index') }}" class="me-3">Tarefas</a>
                <a href="{{ route('sessao') }}">Ver sessão</a>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="d-flex align-items-center gap-2">
                @csrf
                <span class="text-muted small">{{ auth()->user()->name }}</span>
                <button class="btn btn-sm btn-outline-secondary">Sair</button>
            </form>
        </nav>
    @endauth

    <x-flash />

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
