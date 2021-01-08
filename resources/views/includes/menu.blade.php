<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Black Phoenix</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link {{(Route::current()->uri === '/' ? "active" : "")}}" aria-current="page"  href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{(Route::current()->uri === 'streamers' ? "active" : "")}}"  href="/streamers">Streamers Online</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{(Route::current()->uri === 'jogos' ? "active" : "")}}" href="/jogos" tabindex="-1" aria-disabled="true">Nossos jogos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{(Route::current()->uri === 'contato' ? "active" : "")}}" href="/contato" tabindex="-1" aria-disabled="true">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard" tabindex="-1" aria-disabled="true">Admin</a>
                </li>

            </ul>

        </div>
    </div>
</nav>
@yield('menu')
