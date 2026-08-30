@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h2 class="fw-bold mb-0">Bem-vindo, {{ session('user')['username'] }}!</h2>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-tags-fill fs-1 text-primary me-3"></i>
                    <div>
                        <div class="text-muted">Categorias</div>
                        <h3>{{ $categorias }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-box-seam fs-1 text-success me-3"></i>
                    <div>
                        <div class="text-muted">Produtos</div>
                        <h3>{{ $produtos }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection