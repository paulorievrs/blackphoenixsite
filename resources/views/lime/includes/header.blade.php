<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Dashboard</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="lime/assets/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="lime/assets/assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="lime/assets/assets/plugins/toastr/toastr.min.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="lime/assets/assets/css/lime.min.css" rel="stylesheet">
    <link href="lime/assets/assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class='loader'>
    <div class='spinner-grow text-primary' role='status'>
        <span class='sr-only'>Loading...</span>
    </div>
</div>
@if(Route::current()->uri !== 'login')
<div class="lime-sidebar">
    <div class="lime-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Menu
            </li>
            <li>
                <a href="/dashboard" class="{{(Route::current()->uri === 'limeindex' ? 'active' : '')}}"><i class="material-icons">dashboard</i>Dashboard</a>
            </li>
            <li>
                <a href="/profile" class="{{(Route::current()->uri === 'limeprofile' ? 'active' : '')}}"><i class="material-icons">person_outline</i>Profile</a>
            </li>
            <li class="sidebar-title">
                Opções
            </li>
            <li>
                <a href="#"><i class="material-icons">videogame_asset</i>Jogos<i class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="/create-jogo">Novo Jogo</a>
                    </li>

                    <li>
                        <a href="/admin-jogos">Todos os jogos</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="material-icons">emoji_events</i>Campeonatos<i class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">

                    <li>
                        <a href="/create-campeonato">Novo Campeonato</a>
                    </li>

                    <li>
                        <a href="/admin-campeonatos">Todos os campeonatos</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="material-icons">group_add</i>Times<i class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">

                    <li>
                        <a href="/create-time">Novo Time</a>
                    </li>

                    <li>
                        <a href="/admin-times">Todos os Times</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href=""><i class="material-icons">account_box</i>Meu menu<i class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="edit-profile">Alterar perfil</a>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="lime-header">
    <nav class="navbar navbar-expand-lg">
        <section class="material-design-hamburger navigation-toggle">
            <a href="javascript:void(0)" class="button-collapse material-design-hamburger__icon">
                <span class="material-design-hamburger__layer"></span>
            </a>
        </section>
        <a class="navbar-brand" href="#"> {{(Route::current()->uri === 'dashboard' ? 'Bem vindo(a) de volta, ' . Auth::user()->name : '')}} </a>
    </nav>
</div>
@endif
@yield('limeheader')
