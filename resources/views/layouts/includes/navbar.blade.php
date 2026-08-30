<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="bi bi-shop me-2"></i>Vendinhas
        </a>

        <div class="navbar-nav ms-auto align-items-center">
            <a class="nav-link" href="{{ route('categorias.index') }}">
                <i class="bi bi-tags"></i> Categorias
            </a>
            <a class="nav-link" href="{{ route('produtos.index') }}">
                <i class="bi bi-box-seam"></i> Produtos
            </a>
            <span class="navbar-text text-white me-3">
                <i class="bi bi-person-circle"></i> {{ session('user')['username'] ?? '' }}
            </span>
            <a class="btn btn-light btn-sm" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
            </a>
        </div>
    </div>
</nav>