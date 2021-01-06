@extends('includes/header')
@section('header')
@stop
@extends('includes/menu')
@section('menu')

<div class="container">
    <div class="container marketing pt-3">

        <div class="d-flex flex-row justify-content-between">
            <h1>Nossas streamers online </h1>
            <img style="color: red" src="/img/circle.svg">
        </div>

        @if($response->data === [])
            <hr class="featurette-divider">
            <p>Por enquanto, não há streamers online</p>
        @endif

        @foreach($response->data as $response)

            <div class="streamers" onclick='window.open("{{"https://twitch.tv/$response->user_name" }}", "_blank");'>
                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">

                        <h2 class="featurette-heading" style="color: #de4515">{{ ucfirst($response->user_name) }}</h2>
                        <p class="lead pt-2"><strong style="font-weight: bold;">Título: </strong> {{ $response->title }}</p>
                        <p class="lead"><strong style="font-weight: bold;">Jogando: </strong> {{ $response->game_name }}</p>
                        <p class="lead"><strong style="font-weight: bold;">Pessoas assistindo: </strong> {{ $response->viewer_count }}</p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{ 'https://static-cdn.jtvnw.net/previews-ttv/live_user_' . $response->user_name . '-800x500.jpg' }}" class="img-thumbnail" alt="Imagem da {{ $response->user_name }}">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@stop

@extends('includes/footer')
@section('footer')
@stop
