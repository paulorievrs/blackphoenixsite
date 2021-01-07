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
            <h6 class="border-bottom pb-2 mb-0">Todos os jogos</h6>
            @foreach($jogos as $jogo)
                {{ $ganhou = $jogo->resultadoBlackPhoenix > $jogo->resultadoDoTime }}
                <div class="d-flex text-muted pt-3">
                    {{--                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#6f42c1"/></svg>--}}
                    <img class="bd-placeholder-img flex-shrink-0 me-2 rounded" src="{{ $jogo->logoDoTime === null || strlen($jogo->logoDoTime) === 0 ? "/img/logo.png" : $jogo->logoDoTime }}" alt="" width="40"  height="40">
                    <p class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <strong class="d-block text-dark pb-3">Black Phoenix <span class="{{ $ganhou ? "text-success" : "text-danger" }}">({{ $jogo->resultadoBlackPhoenix === null ? 0 : $jogo->resultadoBlackPhoenix }})</span> vs {{ $jogo->nomeDoTime }} <span class="{{ $ganhou ? "text-danger" : "text-success" }}">({{ $jogo->resultadoDoTime === null ? 0 : $jogo->resultadoDoTime }})</span></strong>
                        <strong class="text-dark">Dia:</strong> {{ date('d/m/Y', strtotime($jogo->diaDoJogo)) }} <strong class="text-dark"> - Hora:</strong> {{ explode(":", $jogo->horaDoJogo)[0] . ":" . explode(":", $jogo->horaDoJogo)[1] }}
                        <br><br><strong class="text-dark">Campeonato: </strong> {{ $jogo->campeonato }}
                    </p>
                    <div class="border-bottom w-100"></div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center pt-2">
                {{ $jogos->links() }}
            </div>
        </div>
</main>
<script src="/js/script.js"></script>
