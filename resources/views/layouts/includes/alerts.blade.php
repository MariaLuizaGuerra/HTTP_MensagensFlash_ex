@if(session('successo'))

<div class="alert alert-success shadow-sm border-0 rounded-4">
    {{ session('successo') }}
</div>

@endif


@if(session('error'))

<div class="alert alert-danger shadow-sm border-0 rounded-4">
    {{ session('error') }}
</div>

@endif