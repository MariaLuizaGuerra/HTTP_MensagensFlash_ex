<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>@yield('title') | Sistema de Vendas</title>

    <link rel='icon' type='image/svg+xml' href='{{ asset('assets/images/favicon.svg') }}'>
    <link rel='alternate icon' href='{{ asset('favicon.ico') }}'>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='{{ asset('css/style.css') }}'>
</head>
<body class='bg-light'>

    @include('layouts.includes.navbar')

    <main class='container py-4'>
        @include('layouts.includes.alerts')
        @yield('content')
    </main>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>