<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../assets/img/basic/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css" />
    <title>Black Phoenix Team</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/app.css">
</head>

<body class="sidebar-mini sidebar-collapse theme-dark  sidebar-expanded-on-hover has-preloader" style="display: none;">
<!-- Pre loader
  To disable preloader remove 'has-preloader' from body
 -->

<div id="loader" class="loader">
    <div class="loader-container">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- @Pre loader-->
<div id="app">

    <aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
        <div class="sidebar">
            <ul class="sidebar-menu">
                <li><a class="ajaxifyPage" href="/novoindex">
                        <i class="icon icon-home-1 s-24"></i> <span>Home</span>

                    </a>
                </li>
                <li><a class="ajaxifyPage" href="/novostreams">
                        <i class="icon icon-video-player-2 s-24"></i> <span>Streams</span>
                    </a>
                </li>
                <li><a class="ajaxifyPage" href="/novojogos">
                        <i class="icon icon-calendar-6 s-24"></i> <span>Jogos</span>
                    </a>
                </li>

                <li><a class="ajaxifyPage" href="/news">
                        <i class="icon icon-newspaper s-24"></i> <span>Noticías</span>
                    </a>
                </li>
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

    <main id="pageContent" class="page has-sidebar">


    <div class="container-fluid relative animatedParent animateOnce no-p">
        <div class="animated fadeInUpShorts">
            <div class="row p-3">
                <div class="col-lg-8 offset-lg-2 p-3">
                    <div class="my-5 d-lg-flex align-items-center">
                        @php
                            $user = \App\Models\User::find($news->user_id);
                        @endphp
                        <figure class="avatar avatar-md float-left mr-3 mt-1">
                            <img src="{{ $user->profileimagelink === null || strlen($user->profileimagelink) === 0 ? 'assets/img/demo/u7.jpg' : '/storage/user_img/' . $user->profileimagelink }}" alt="">
                        </figure>

                        <div>
                            <h6>{{ $user->name }}</h6>
                            {{ $user->email }}
                        </div>
                    </div>

                    <article>
                        <h1 class="font-weight-lighter" style="color: #f57c00;">{{ ucfirst($news->title) }} </h1>

                        <div class="cardx video-responsive">

                            <div class="card-bodyz my-5">
                                <p>{{ ucfirst($news->text) }}</p>

                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

</main><!--@Page Content-->

<script src="../assets/js/app.js"></script>


</body>
</html>
