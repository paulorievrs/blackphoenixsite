<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/basic/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css" />
    <title>Black Phoenix Team</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body class="sidebar-mini sidebar-collapse theme-dark  sidebar-expanded-on-hover has-preloader" style="display: none;">

<div id="app">


    <aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
        <div class="sidebar">
            <ul class="sidebar-menu">
                <li><a class="{{(Route::current()->uri === '/' ? 'active' : '')}}" href="/">
                        <i class="icon icon-home-1 s-24"></i> <span>Home</span>

                    </a>
                </li>
                <li><a class="{{(Route::current()->uri === 'streams' ? 'active' : '')}}" href="/streams">
                        <i class="icon icon-video-player-2 s-24"></i> <span>Streams</span>
                    </a>
                </li>
                <li><a class="{{(Route::current()->uri === 'jogos' ? 'active' : '')}}" href="/jogos">
                        <i class="icon icon-calendar-6 s-24"></i> <span>Jogos</span>
                    </a>
                </li>

                <li><a class="{{(Route::current()->uri === 'news' ? 'active' : '')}}" href="/news">
                        <i class="icon icon-newspaper s-24"></i> <span>Noticías</span>
                    </a>
                </li>

                <li><a class="" href="/dashboard">
                        <i class="icon icon-dashboard s-24"></i> <span>Administração</span>
                    </a>
                </li>

                {{--                <li><a class="ajaxifyPage" href="/contato">--}}
                {{--                        <i class="icon icon-user s-24"></i> <span>Contato</span>--}}

                {{--                    </a>--}}
                {{--                </li>--}}
            </ul>

        </div>
    </aside>
    <!--Sidebar End-->

    <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
    <div class="control-sidebar-bg shadow  fixed"></div>


    <!--navbar-->
    <nav class="navbar-wrapper navbar-bottom-fixed shadow">
        <div class="navbar navbar-expand player-header justify-content-between  bd-navbar">
            <div class="d-flex align-items-center">
                <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle  paper-nav-toggle-sidenav ml-2 mr-2">
                    <i></i>
                </a>
                <a class="navbar-brand" data-toggle="push-menu">
                    <div class="d-flex align-items-center s-14 l-s-2">
                        <img src="/img/newlogo.png" alt="" width="120" style="position: absolute; bottom: 0;">
                    </div>
                </a>
            </div>
            <!--Top Menu Start -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- Right Sidebar Toggle Button -->
                    <li>
                        <a href="https://instagram.com/blackphoenixcsgo" target="_new" class="nav-link"><i class="fab fa-instagram" style="font-size: 30px;"></i></a>
                    </li>

                    <li>
                        <a href="https://twitter.com/blackphoenixcs"target="_new" class="nav-link"><i class="fab fa-twitter" style="font-size: 30px;"></i></a>
                    </li>

                    <li>
                        <a href="https://discord.gg/5pGfzSbnQ3" target="_new" class="nav-link"><i class="fab fa-discord" style="font-size: 30px;"></i></a>
                    </li>
                    <!-- User Account-->
                </ul>
            </div>
        </div>
    </nav>
</div>

@yield('header')

