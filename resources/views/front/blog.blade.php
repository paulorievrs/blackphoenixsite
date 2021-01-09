@include('front.includes.header')
@section('header')
@stop

<main id="pageContent" class="page has-sidebar">
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="wrapper animated fadeInUpShort p-md-5 p-3">
            <section>
                <div class="relative mb-5">
                    <h1 class="mb-2 text-primary">Noticías</h1>
                    <p>Notícias sobre o time</p>
                </div>
                <div class="row">
                    @foreach($news as $new)
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="p-3">
                                <div class="d-md-flex align-items-center">
                                    <div class="mr-3 ml-md-4 text-md-center">
                                        <div class="s-24">{{ explode('-', $new->postDate)[2] }}</div>
                                        <small>{{ (DateTime::createFromFormat('!m', explode('-', $new->postDate)[1] ))->format('F') }}, </small><small> {{ explode('-', $new->postDate)[0] }}</small>
                                    </div>
                                    <div>
                                        <a href="/news/{{ $new->id }}"><h2 class="font-weight-lighter h3 my-3 text-primary">
                                            {{ ucfirst($new->title) }}
                                            </h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <p>{{ ucfirst(Str::limit($new->text, 100, $end = '...')) }}</p>
                                </div>
                                @php
                                    $user = App\Models\User::find($new->user_id);
                                @endphp
                                <div class="d-flex align-items-center mt-4">
                                    <div>
                                        <div class="avatar avatar-sm mr-2"><img src="{{ $user->profileimagelink === null || strlen($user->profileimagelink) === 0 ? 'assets/img/demo/u7.jpg' : '/storage/user_img/' . $user->profileimagelink }}" alt=""></div>
                                        {{ $user->name }}
                                    </div>
                                    <a href="/news/{{ $new->id }}" class="ml-auto"><i class="icon icon-link mr-2 "></i>Leia mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    {{ $news->links() }}

                </div>
            </section>
        </div>
    </div>
</main><!--@Page Content-->
@include('front.includes.footer')
@section('footer')
@stop
