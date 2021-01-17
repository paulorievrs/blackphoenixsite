@include('front.includes.header')
@section('header')
@stop
<style>
    .card-opacity {
        background: rgba(1,1,1,0.6);
        transition: background .5s ease-out;
    }
    .card-opacity:hover {

        background: rgba(1,1,1,1);

    }
</style>
<main id="pageContent" class="page has-sidebar">
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="wrapper animated fadeInUpShort p-md-5 p-3">
            <section class="section">
                <h1 class="my-5 text-primary">Streams</h1>
                <p>Aqui você pode interagir com nosssas jogadoras e parceiros streamers, entrem lá e ajudem!
                </p>
            </section>
            @if($response->data === [])
            <section class="section">
                <div class="row has-items-overlay">
                @foreach($twitch_names as $name)
                    <div class="col-lg-3 col-md-6 pb-3">
                            <div class="card">
                                <figure class="card-img figure">
                                    <div class="img-wrapper">
{{--                                        <img src="assets/img/demo/v4.jpg" alt="Card image">--}}
                                        <img src="/img/newlogo.png" class="p-3" alt="Card image">
                                    </div>
                                    <div class="img-overlay"></div>
                                    <div class="has-bottom-gradient">
                                        <div class="d-flex">
                                            <div class="card-img-overlay card-opacity">
                                                <div class="pt-3 pb-3">
                                                    <a target="_new" href="https://twitch.tv/{{ $name }}">
                                                        <div class="pb-2">
                                                            <figure class="float-left mr-3 mt-1">
                                                                <i class="icon-play s-36"></i>
                                                            </figure>
                                                            <h4>{{ ucfirst($name) }}</h4>
                                                        </div>

                                                        <div class="d-flex flex-column">
                                                            <p>Estou offline agora, mas se quiser clique aqui para me seguir!</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                                <div class="bottom-gradient bottom-gradient-thumbnail"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            @endif
            <section class="section">
                <div class="row has-items-overlay">
                    @foreach($response->data as $response)
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <figure class="card-img figure">
                                    <div class="img-wrapper">

                                        <img src="{{ 'https://static-cdn.jtvnw.net/previews-ttv/live_user_' . $response->user_name . '-800x500.jpg' }}" alt="Imagem da {{ $response->user_name }}">
{{--                                        <img src="assets/img/demo/v4.jpg" alt="Card image">--}}
                                    </div>
                                    <div class="img-overlay"></div>
                                    <div class="has-bottom-gradient">
                                        <div class="d-flex">
                                            <div class="card-img-overlay">
                                                <div class="pt-3 pb-3">
                                                    <a target="_new" href="https://twitch.tv/{{ $response->user_name }}">
                                                        <div class="pb-2">
                                                            <figure class="float-left mr-3 mt-1">
                                                                <i class="icon-play s-36"></i>
                                                            </figure>
                                                            <h4>{{ ucfirst($response->user_name) }}</h4>
                                                        </div>

                                                        <div class="d-flex flex-column">
                                                            <p>Título: {{ $response->title }}</p>
                                                            <p>Jogo: {{ $response->game_name }}</p>
                                                            <p>Viewers: {{ $response->viewer_count }}</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                                <div class="bottom-gradient bottom-gradient-thumbnail"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <section class="section">
                <h1 class="text-primary">Outros conteúdos</h1>
            </section>
            <div>
                <div>
                    <h2>Canal da nossa jogadora Coala - Universo Incrivel</h2>
                    <span style="font-size: 12px">Não é de CS, porém, o conteúdo é muito bom!</span>
                </div>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/CkRHZO5M-Ms" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</main><!--@Page Content-->

@include('front.includes.footer')
@section('footer')
@stop

