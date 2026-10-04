@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-3">Demonstração de sessão HTTP</h1>

    <p>Você visitou esta página <strong>{{ $visitas }}</strong> vez(es) nesta sessão.
       Recarregue para ver o contador subir; ao sair e entrar de novo, ele reinicia.</p>

    <h2 class="h5">Conteúdo atual da sessão</h2>
    <pre class="bg-light border rounded p-3 small">{{ json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
@endsection
