@include('front.includes.header')
@section('header')
@stop
<style>
    .my-img {
        width: 240px;
        max-height: 240px;

    }

    @media only screen and (min-width: 1034px) and (max-width: 1200px){

        .my-img {
            height: 150px;
        }
    }

    @media only screen and (max-width : 768px) {

        .my-img {
            height: 180px;
        }
    }

    @media only screen and (max-width : 1200px) and (min-width: 769px) {

        .my-img {
            width: 300px;
            max-height: 230px;

        }
    }
</style>
<main id="pageContent" class="page has-sidebar">
    <div class="container-fluid relative animatedParent animateOnce no-p">
        <div class="animated fadeInUpShort">
            <!--Banner Slider-->
            <section>
                <div class="text-white">
                    <div>
                        <div class="xv-slide" data-bg-possition="top"
                             style="background-image:url('img/banner-menor.png');">

                            <div class="bottom-gradient"></div>
                        </div>
                    </div>
                </div>
                <!--slider Wrap-->
            </section>
            <!--@Banner Slider-->
            <div class="wrapper p-md-5 p-3  ">
                <!--New Releases-->
                <section class="section">
                    <div class="d-flex relative align-items-center justify-content-between">
                        <div class="mb-4">
                            <h4>Nosso time</h4>
                        </div>
                    </div>
                    <div class="lightSlider has-items-overlay playlist"
                         data-item="6"
                         data-item-lg="3"
                         data-item-md="3"
                         data-item-sm="2"
                         data-auto="true"
                         data-pager="false"
                         data-controls="true"
                         data-loop="true">
                        @foreach($users as $user)

                        <div>
                            <figure onclick="window.open('/profile/{{ $user->twitch_username }}', '_new')">
                                <div class="img-wrapper">
                                    <img class="my-img" src="{{ $user->profileimagelink === null || strlen($user->profileimagelink) === 0 ? 'assets/img/demo/a8.jpg' : '/storage/user_img/' . $user->profileimagelink }}" alt="/">

                                    <div class="img-overlay text-white">
                                        <div class="figcaption">
                                            <ul class="list-inline d-flex align-items-center justify-content-between">
                                                <li class="list-inline-item">
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="no-ajaxy media-url" target="_new" href="/profile/{{ $user->twitch_username }}" data-wave="assets/media/track2.json">
                                                        <i class="fas fa-address-card" style="font-size: 48px"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    </li>
                                            </ul>
                                            <div class="text-center mt-5">
                                                <h5>{{ explode(" ", $user->name)[0] }}</h5>
                                                <span>{{ $user->twitch_username }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="figure-title text-center p-2">
                                        <h5>{{ explode(" ", $user->name)[0]}}</h5>
                                        <span>{{ $user->twitch_username }}</span>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        @endforeach

                    </div>
                </section>


                <!--PlayList & Events-->
                <section class="section mt-4">
                    <div class="row row-eq-height">
                        <div class="col-lg-12">
                            <div class="card no-b mb-md-3 p-2">
                                <div class="card-header no-bg transparent">
                                    <div class="d-flex justify-content-between">
                                        <div class="align-self-center">
                                            <div class="d-flex">
                                                <div>
                                                    <h4>Nossos próximos jogos</h4>
                                                    <a href="/jogos">Ver todos os jogos</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body no-p">
                                    @foreach($jogos as $jogo)
                                    @php
                                        $time = \App\Models\Time::find($jogo->time_id);
                                        $campeonato = \App\Models\Campeonatos::find($jogo->campeonato_id);
                                    @endphp
                                    <div class="tab-content" id="v-pills-tabContent1">
                                        <div class="tab-pane fade show active" id="w2-tab1" role="tabpanel"
                                             aria-labelledby="w2-tab1">
                                            <div class="playlist pl-lg-3 pr-lg-3">
                                                <div class="m-1 my-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="col-md-6">
                                                            <figure class="avatar-md float-left  mr-3 mt-1">
                                                                <img class="r-3" src="{{ $time->teamLogo === '.' ? "/img/logo.png" : $time->teamLogo }}" alt="">
                                                            </figure>
                                                            <h6>Contra</h6> {{ $time->teamName }}
                                                        </div>
                                                        <div class="col-md-5 d-none d-lg-block">
                                                            <div class="d-flex">
                                                                <span class="ml-auto"><i class="fal fa-trophy pr-2"></i> {{ $campeonato->name }}</span>
                                                                <span class="ml-auto"><i class="far fa-calendar-alt pr-2"></i> {{ date('d/m', strtotime($jogo->diaDoJogo))}}</span>
                                                                <span class="ml-auto"><i class="icon-clock pr-2"></i> {{ explode(':', $jogo->horaDoJogo)[0] . ":" . explode(':', $jogo->horaDoJogo)[1] }}</span>
                                                                <div class="ml-auto">
                                                                    <a href="#" class="btn btn-outline-primary btn-sm">Assista aqui</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--@PlayLIst & Events-->

                <!--Recommend-->
                <section class="section">
                    <div class="d-flex relative align-items-center justify-content-between">
                        <div class="mb-4">
                            <h4>Nossos parceiros/afiliações</h4>
                            <p>Se puder, utilize nossos links!</p>
                        </div>
{{--                        <a href="albums.html">View Albums<i class="icon-angle-right ml-3"></i></a>--}}
                    </div>
                    <div class="lightSlider has-items-overlay playlist"
                         data-item="6"
                         data-item-lg="3"
                         data-item-md="3"
                         data-item-sm="2"
                         data-auto="false"
                         data-pager="false"
                         data-controls="true"
                         data-loop="false">
                        <div>
                            <figure onclick="window.open('https://www.exitlag.com/refer/4694679', '_new')">
                                <div class="img-wrapper">
                                    <img src="/img/exitlagphoto.png" alt="Exit Lag Logo">
                                    <div class="img-overlay text-white">
                                        <div class="figcaption">
                                            <ul class="list-inline d-flex align-items-center justify-content-between">
                                                <li class="list-inline-item">
                                                    <a href="#" class="snackbar" data-text="Added to favourites"
                                                       data-pos="top-right"
                                                       data-showAction="true"
                                                       data-actionText="ok"
                                                       data-actionTextColor="#fff"
                                                       data-backgroundColor="#0c101b">
{{--                                                        <i class="icon-heart-o s-18"></i>--}}
                                                    </a>
                                                </li>
                                                <li class="list-inline-item ">
                                                    <a class="no-ajaxy media-url">
                                                        <i style="color: black !important;" class="icon-play s-48"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
{{--                                                    <a href="album-single.html"><i--}}
{{--                                                            class="icon-more s-18 pt-3"></i></a>--}}
                                                </li>
                                            </ul>
                                            <div class="text-center mt-5">
                                                <h5 style="color: black !important;">Exit Lag</h5>
                                                <span style="color: black !important;">Teste 3 dias grátis</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="figure-title text-center p-2">
                                        <h5>Exit Lag</h5>
                                        <span>Teste 3 dias grátis</span>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div>
                            <figure onclick="window.open('/amazon', '_new')">
                                <div class="img-wrapper">
                                    <img src="/img/amazon.jpg" alt="Amazon Logo">
                                    <div class="img-overlay text-white">
                                        <div class="figcaption">
                                            <ul class="list-inline d-flex align-items-center justify-content-between">
                                                <li class="list-inline-item">
                                                    <a href="#" class="snackbar" data-text="Added to favourites"
                                                       data-pos="top-right"
                                                       data-showAction="true"
                                                       data-actionText="ok"
                                                       data-actionTextColor="#fff"
                                                       data-backgroundColor="#0c101b">
                                                        {{--                                                        <i class="icon-heart-o s-18"></i>--}}
                                                    </a>
                                                </li>
                                                <li class="list-inline-item ">
                                                    <a class="no-ajaxy media-url">
                                                        <i style="color: black !important;" class="icon-play s-48"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    {{--                                                    <a href="album-single.html"><i--}}
                                                    {{--                                                            class="icon-more s-18 pt-3"></i></a>--}}
                                                </li>
                                            </ul>
                                            <div class="text-center mt-5">
                                                <h5 style="color: black !important;">Amazon</h5>
                                                <span style="color: black !important;">Confira os setups da org</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="figure-title text-center p-2">
                                        <h5>Amazon</h5>
                                        <span>Confira os setups da org</span>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </section>

{{--            <!--@Recommend-->--}}
            </div>
        </div>
    </div>
</main><!--@Page Content-->

@include('front.includes.footer')
@section('footer')
@stop
