@foreach (['success', 'error', 'warning', 'info'] as $type)
    @if (session($type))
        <div class="alert alert-{{ $type === 'error' ? 'danger' : $type }} alert-dismissible fade show" role="alert">
            {{ session($type) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
        <script>setTimeout(() => {
        document.querySelectorAll('.alert').forEach(a => bootstrap.Alert.getOrCreateInstance(a).close());}, 4000);
</script>
    @endif
@endforeach
