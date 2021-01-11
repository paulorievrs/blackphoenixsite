@include('front.includes.header')
@section('header')
@stop


<main id="pageContent" class="page has-sidebar">
    <div class="container-fluid relative animatedParent animateOnce">
        <!--Banner-->
        @if($jogo !== null)

            <section class="relative xv-slide" data-bg-possition="left" data-bg-repeat="false">
                <div class="wrapper has-bottom-gradient p-md-5 p-5">
                    <div class="row">
                        <div class="col-md-10 mt-5">
                            <div class="relative mb-5 text-white">
                                <h1 class="mb-2">Próximo jogo</h1>
                                <hr color="#FFF">
                                @php
                                    $time = \App\Models\Time::find($jogo->time_id);
                                    $campeonato = \App\Models\Campeonatos::find($jogo->campeonato_id);
                                @endphp
                                <h2 class="mb-2">Contra {{ $time->teamName }}</h2>
                                <div class="d-flex align-items-center mt-4">
                                    <div>
                                        <i class="fal fa-trophy pr-2"></i>
                                        <span>{{ $campeonato->name }}</span>
                                    </div>
                                    <div class="ml-3">
                                         <i class="far fa-calendar-alt mr-1"></i> <span>{{ date('d/m/Y', strtotime($jogo->diaDoJogo)) }} <i class="icon-clock mr-1 ml-2"></i> {{ explode(":", $jogo->horaDoJogo)[0] . ":" . explode(":", $jogo->horaDoJogo)[1] }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="countDown text-white" data-date="{{ date('Y/m/d', strtotime($jogo->diaDoJogo)) }}">
                                <div class="bg-primary"><span class="weeks">0</span> <span class="count-type">Semanas</span>
                                </div>
                                <div class="bg-primary"><span class="days">317</span> <span class="count-type">Dias</span>
                                </div>
                                <div class="bg-primary"><span class="hours">04</span> <span class="count-type">Horas</span>
                                </div>
                                <div class="bg-primary"><span class="minutes">57</span> <span
                                        class="count-type">Minutos</span></div>
                                <div class="bg-primary"><span class="seconds">11</span> <span
                                        class="count-type">Segundos</span></div>
                            </div>
                            <div class="pt-3">
                                <a href="{{ $jogo->linkParaAssistir }}" class="btn btn-lg r-0 btn-outline-primary">Clique aqui para assitir</a>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="bottom-gradient"></div>
        </section>
        @endif
        <div style="padding-top: 100px"></div>
        @foreach($jogos as $jogo)
            @php
                $time = \App\Models\Time::find($jogo->time_id);
                $campeonato = \App\Models\Campeonatos::find($jogo->campeonato_id);
                $ganhou = $jogo->resultadoBlackPhoenix > $jogo->resultadoDoTime;
            @endphp
            <div class="wrapper animated fadeInUpShort">
                <div>
                    <ul class="list-group">
                        <li class="list-group-item my-1">
                            <div class="row">
                            <div class="col-xl">

                                <div class="col-md-2">
                                    <div class="text-lg-center">
                                        <div class="s-24">{{ explode('-', $jogo->diaDoJogo)[2] }}</div>
                                        <span>{{ (DateTime::createFromFormat('!m', explode('-', $jogo->diaDoJogo)[1] ))->format('F') }}, <small>{{ explode('-', $jogo->diaDoJogo)[0] }}</small></span>
                                    </div>
                                </div>
                                <div class="col-lg-5 my-3 my-lg-0">

                                    <h5 class="text-primary my-1">{{ $time->teamName }}</h5>
                                    <i class="fal fa-trophy pr-2"></i>{{ $campeonato->name }}
                                </div>

                                <div class="col-lg-2">
                                    <div class="avatar-group my-3">
                                        <figure class="avatar">
                                            <img src="{{ $time->teamLogo === '.' ? "/img/logo.png" : $time->teamLogo }}" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class=" col-lg-3 ml-auto my-3 text-lg-right">
                                    <p href="#" class="badge badge-{{ $ganhou ? 'success' : 'danger' }} ">{{ $ganhou ? 'Vitória' : 'Derrota' }}</p>
                                </div>
                            </div>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
    <div style="display: flex; align-items: center; justify-content: center; padding-top: 20px; padding-bottom: 80px">
        {{ $jogos->links() }}
    </div>


</main><!--@Page Content-->

@include('front.includes.footer')
@section('footer')
@stop
