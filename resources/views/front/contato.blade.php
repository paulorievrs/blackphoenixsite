@include('front.includes.header')
@section('header')
@stop
<main>
    <div id="primary" class="p-t-b-100 height-full">
        <div class="container">
            @if(session('response') !== null)
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-secondary" style="font-weight: bold; font-size: 15px" role="alert">
                            {{ session('response') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="text-center s-14 l-s-2">
                <img src="/img/newlogo.png" alt="" width="170">
            </div>
            <div class="row">
                <div class="col-md-12 mx-md-auto">
                    <div class="mt-5">
                        <div class="row grid">
                            <div class="col-md-12 card p-5">
                                <form class="form-material" action="/contato-send" method="POST">
                                    @csrf
                                    <!-- Input -->
                                    <div class="body">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="name" class="form-control">
                                                <label class="form-label">Nome</label>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="email" class="form-control">
                                                <label class="form-label">E-mail</label>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea rows="5" name="mensagem" class="form-control"></textarea>
                                                <label class="form-label">Mensagem</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-outline-primary btn-sm pl-4 pr-4" value="Enviar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('front.includes.footer')
@section('footer')
@stop

