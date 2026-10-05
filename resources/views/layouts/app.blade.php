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
        @auth
    <nav class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex gap-2">
            <a href="{{ route('tasks.index') }}"
               @class(['btn btn-sm', 'btn-primary' => request()->routeIs('tasks.*'), 'btn-outline-primary' => !request()->routeIs('tasks.*')])>
                Tarefas
            </a>
            <a href="{{ route('sessao') }}"
               @class(['btn btn-sm', 'btn-primary' => request()->routeIs('sessao'), 'btn-outline-primary' => !request()->routeIs('sessao')])>
                Ver sessão
            </a>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="d-flex align-items-center gap-2">
            @csrf
            <span class="text-muted small">{{ auth()->user()->name }}</span>
            <button class="btn btn-sm btn-outline-secondary">Sair</button>
        </form>
    </nav>
@endauth
    @endauth

    <x-flash />

    @yield('content')

    <script>
    document.querySelectorAll('.alert').forEach(function (alerta) {
        setTimeout(function () {
            alerta.classList.remove('show');
            setTimeout(function () { alerta.remove(); }, 500);
        }, 4000);
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
