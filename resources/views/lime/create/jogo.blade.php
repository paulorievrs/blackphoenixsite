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
                            <h5 class="card-title">Criar um jogo</h5>
                            <form action="/jogo" method="POST">

                                {{ csrf_field() }}

                                <div class="form-row">
                                    <div class="col-md-12 form-group pb-2">
                                        <select class="custom-select" name="time_id">
                                            <option selected>Qual o time?</option>
                                            @foreach($times as $time)
                                                <option value="{{ $time->id }}">{{ $time->teamName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row d-flex flex-row">
                                    <div class="col-md-6 form-group pb-2">
                                        <input type="date" class="form-control" name="diaDoJogo" />
                                    </div>
                                    <div class="col-md-6 form-group pb-2">
                                        <input type="time" name="horaDoJogo" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 form-group pb-2">
                                        <input type="text" name="linkParaAssistir" class="form-control" placeholder="Link para assistir"/>
                                    </div>
                                </div>

                                <div class="form-row d-flex flex-row">
                                    <div class="col-md-6 form-group pb-2">
                                        <input type="number" min="0" class="form-control" name="resultadoBlackPhoenix" placeholder="Resultado Black Phoenix"/>
                                    </div>
                                    <div class="col-md-6 form-group pb-2">
                                        <input type="number" min="0" name="resultadoDoTime" class="form-control" placeholder="Resultado do Time"/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 form-group pb-2">
                                        <select class="custom-select" name="campeonato_id">
                                            <option selected>Qual o campeonato?</option>
                                            @foreach($campeonatos as $campeonato)
                                                <option value="{{ $campeonato->id }}">{{ $campeonato->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Criar</button>
                            </form>
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
<script src="/lime/assets/assets/plugins/jquery/jquery-3.1.0.min.js"></script>
<script src="/lime/assets/assets/plugins/bootstrap/popper.min.js"></script>
<script src="/lime/assets/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/lime/assets/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/lime/assets/assets/js/lime.min.js"></script>
</body>
</html>
