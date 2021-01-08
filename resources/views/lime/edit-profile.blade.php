@include('lime.includes.header')
@section('limeheader')
@endsection


<div class="lime-container">
    <div class="lime-body">
        <div class="container">
            @if(session('response') !== null)
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-primary" role="alert">
                            {{ session('response') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-xl">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Editar perfil</h5>
                            <form action="/profile" method="POST">
                                {{ csrf_field() }}
                                @method('PUT')

                                <div class="form-row">
                                    <div class="col-md-12 form-group pb-2">
                                        <label for="name"><strong>Nome completo</strong></label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Nome Completo" value="{{ Auth::user()->name }}"/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 form-group pb-2">
                                        <label for="name"><strong>E-mail</strong></label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="E-mail" value="{{ Auth::user()->email }}"/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 form-group pb-2">
                                        <label for="twitch_username"><strong>Twitch Username </strong></label>
                                        <input type="text" id="twitch_username" name="twitch_username" class="form-control" placeholder="Twitch Username" value="{{ Auth::user()->twitch_username }}"/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 form-group pb-2">
                                        <label for="local"><strong>Local (Aonde mora)</strong></label>
                                        <input type="text" id="local" name="local" class="form-control" placeholder="Local" value="{{ Auth::user()->local }}"/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 form-group pb-2">
                                        <label for="bio"><strong>Biografia</strong></label>
                                        <textarea type="text" id="bio" name="bio" class="form-control" placeholder="Biografia">{{ Auth::user()->bio }}</textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Alterar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Editar imagem do perfil</h5>
                            <form action="/edit-profileimagelink" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="form-row">
                                    <div class="col-md-12 form-group pb-2">
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Alterar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-xl">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Editar senha do perfil</h5>
                                <form action="/edit-password" method="POST">
                                    {{ csrf_field() }}
                                    @method('PUT')
                                    <div class="form-row pb-4">
                                        <input type="password" name="password" class="form-control" placeholder="Senha nova" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Meus links</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Link</th>
                                            <th scope="col">Excluir</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($links as $link)
                                            <tr>
                                                <td>{{ $link->name }}</td>
                                                <td><a target="_blank" href="{{ $link->link }}">{{ $link->link }}</a></td>
                                                <td scope="col" style="cursor: pointer">
                                                    <form action="/delete-link/{{ $link->id }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button style="background: none;"><i class="material-icons" style="color: red;">delete</i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-xl">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="/link" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-row d-flex flex-row">
                                                        <div class="col-md-6 form-group pb-2">
                                                            <input type="text" class="form-control" name="name" placeholder="Nome do Link"/>
                                                        </div>
                                                        <div class="col-md-6 form-group pb-2">
                                                            <input type="text" class="form-control" name="link" placeholder="Link"/>

                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Adicionar</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div class="lime-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="footer-text">2021 © Black Phoenix</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Javascripts -->
<script src="lime/assets/assets/plugins/jquery/jquery-3.1.0.min.js"></script>
<script src="lime/assets/assets/plugins/bootstrap/popper.min.js"></script>
<script src="lime/assets/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="lime/assets/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="lime/assets/assets/js/lime.min.js"></script>
</body>
</html>
