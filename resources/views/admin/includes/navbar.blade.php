<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Black Phoenix</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link {{(Route::current()->uri === '/' ? "active" : "")}}" aria-current="page"  href="/admin">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{(Route::current()->uri === 'admin/jogos' ? "active" : "")}}" href="/admin/jogos" tabindex="-1" aria-disabled="true">Jogos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{(Route::current()->uri === 'admin/createjogos' ? "active" : "")}}" href="/admin/createjogos" tabindex="-1" aria-disabled="true">Criar jogos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>

@if(session('response') !== null)
    <div class="container alerta2" style="position: absolute; padding-top: 80px">
        <div class="alert alert-info" id="alerta" role="alert">
            <strong class="d-flex justify-content-between">
                {{ session('response') }}
                <button style="background: none; " class="btn-close" onclick="{ document.getElementById('alerta').remove() } ">X</button>
            </strong>
        </div>
    </div>
@endif

@error('nomeDoTime' || 'diaDoJogo' || 'horaDoJogo')
    <div class="container alerta2">
        <div class="alert alert-danger" id="alerta" role="alert">
            <strong class="d-flex justify-content-between">
                {{ $message }}
                <button style="background: none; " class="btn-close" onclick="{ document.getElementById('alerta').remove() } ">X</button>
            </strong>
        </div>
    </div>
@enderror

@yield('menu')
