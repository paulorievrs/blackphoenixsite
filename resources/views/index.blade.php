@extends('includes/header')
@section('header')
@stop
@extends('includes/menu')
@section('menu')

<link href="/css/css.css" rel="stylesheet">
<main class="container">
        <div class="d-flex align-items-center p-3 my-3 text-white bg-color rounded shadow-sm">
            <img class="me-3" src="/img/logo.png" alt="" width="48" height="48">
            <div class="lh-1">
                <h1 class="h6 mb-0 text-white lh-1">Black Phoenix</h1>
            </div>
        </div>

        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">Próximos jogos</h6>
            @if($jogos[0] === null)

                <div class="d-flex text-muted pt-3">
                    <p class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <strong class="d-block text-gray-dark">Sem próximos jogos</strong>
                    </p>
                    <div class="border-bottom w-100"></div>
                </div>
            @endif
            @foreach($jogos as $jogo)
                @php
                    $time = (App\Models\Time::find($jogo->time_id));
                    $campeonato = (App\Models\Campeonatos::find($jogo->campeonato_id));
                    $win = $jogo->resultadoBlackPhoenix > $jogo->resultadoDoTime;
                @endphp
            <div class="d-flex text-muted pt-3">
{{--                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#6f42c1"/></svg>--}}
                    <img class="bd-placeholder-img flex-shrink-0 me-2 rounded" src="{{ $time->teamLogo === '.' ? "/img/logo.png" : $time->teamLogo }}" alt="" width="40" height="40">
                <p class="pb-3 mb-0 small lh-sm border-bottom w-100">
                    <strong class="d-block text-dark">Black Phoenix vs {{ $time->teamName }}</strong>
                    <strong class="text-dark">Dia:</strong> {{ date('d/m', strtotime($jogo->diaDoJogo)) }} <strong class="text-dark"> - Hora:</strong> {{ explode(":", $jogo->horaDoJogo)[0] . ":" . explode(":", $jogo->horaDoJogo)[1] }}
                    <strong class="text-dark">- Assista em: </strong><a target={{ $jogo->linkParaAssistir === null ? "" : "_blank" }} href="{{ $jogo->linkParaAssistir }}">{{ $jogo->linkParaAssistir === null ? "Não há transmissão definida ainda." : $jogo->linkParaAssistir}}</a>
                    <br><strong class="text-dark">Campeonato: </strong> {{ $campeonato->name }}

                </p>
                <div class="border-bottom w-100"></div>
            </div>
            @endforeach
            <small class="d-block text-end mt-3">
                <a href="/jogos">Todos os jogos</a>
            </small>
        </div>

        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">Nossas redes - clique em alguma para seguir</h6>
            <div class="d-flex text-muted pt-3 goto" onclick="goto('https://instagram.com/blackphoenixcsgo')">
                <img class="bd-placeholder-img flex-shrink-0 me-2 rounded" src="/img/instagram-icon.png" alt="" width="32" height="32">

                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                    <div class="d-flex justify-content-between">
                        <strong class="text-gray-dark">Instagram</strong>
                    </div>
                    <span class="d-block">@blackphoenixcsgo</span>
                </div>
            </div>
            <div class="d-flex text-muted pt-3 goto" onclick="goto('https://twitter.com/BlackPhoenixCS')">
                <img class="bd-placeholder-img flex-shrink-0 me-2 rounded" src="/img/twitter-icon.png" alt="" width="32" height="32">

                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                    <div class="d-flex justify-content-between">
                        <strong class="text-gray-dark">Twitter</strong>

                    </div>
                    <span class="d-block">@blackphoenixcs</span>
                </div>
            </div>
            <div class="d-flex text-muted pt-3 goto" onclick="goto('https://gamersclub.com.br/time/202993')"_>
{{--                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>--}}
                <img class="bd-placeholder-img flex-shrink-0 me-2 rounded" src="/img/gc-icon.jpg" alt="" width="32" height="32">

                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                    <div class="d-flex justify-content-between">
                        <strong class="text-gray-dark">Gamers Club</strong>
                    </div>
                    <span class="d-block">Black Phoenix</span>
                </div>
            </div>

            <div class="d-flex text-muted pt-3 goto" onclick="goto('https://discord.gg/CuXNJb4kfp')"_>
                {{--                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>--}}
                <img class="bd-placeholder-img flex-shrink-0 me-2 rounded" src="/img/discord-icon.jpg" alt="" width="32" height="32">

                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                    <div class="d-flex justify-content-between">
                        <strong class="text-gray-dark">Discord</strong>
                    </div>
                    <span class="d-block">Black Phoenix</span>
                </div>
            </div>
        </div>
    </main>
<script src="/js/script.js"></script>

@stop

@extends('includes/footer')
@section('footer')
@stop
