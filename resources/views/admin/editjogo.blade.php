@extends('../includes/header')
@section('header')
@stop

@extends('admin/includes/navbar')
@section('menu')

<div class="container" style="padding-top: 100px">
    <div class="col-lg-12">
        <h1>Criar um jogo</h1>
        <hr>
        <form action="/jogos/{{ $jogo->id }}" method="POST" role="form" class="php-email-form">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-row">
                <div class="col-md-12 form-group pb-2">
                    <input type="text" name="nomeDoTime" class="form-control" placeholder="Nome do Time" value="{{ $jogo->nomeDoTime }}"/>
                </div>
            </div>
            <div class="form-row d-flex flex-row">
                <div class="col-md-6 form-group pb-2">
                    <input type="date" class="form-control" name="diaDoJogo" value="{{ $jogo->diaDoJogo }}"/>
                </div>
                <div class="col-md-6 form-group pb-2">
                    <input type="time" name="horaDoJogo" class="form-control" value="{{ $jogo->horaDoJogo }}"/>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 form-group pb-2">
                    <input type="text" name="linkParaAssistir" class="form-control" placeholder="Link para assistir" value="{{ $jogo->linkParaAssistir }}"/>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 form-group pb-2">
                    <input type="text" name="logoDoTime" class="form-control" placeholder="Logo Do time" value="{{ $jogo->logoDoTime }}"/>
                </div>
            </div>

            <div class="form-row d-flex flex-row">
                <div class="col-md-6 form-group pb-2">
                    <input type="number" min="0" class="form-control" name="resultadoBlackPhoenix" placeholder="Resultado Black Phoenix" value="{{ $jogo->resultadoBlackPhoenix }}"/>
                </div>
                <div class="col-md-6 form-group pb-2">
                    <input type="number" min="0" name="resultadoDoTime" class="form-control" placeholder="Resultado do Time" value="{{ $jogo->resultadoDoTime }}"/>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 form-group pb-2">
                    <input type="text" name="campeonato" class="form-control" placeholder="Campeonato" value="{{ $jogo->campeonato }}"/>
                </div>
            </div>

            <div class="text-center" style="margin-top: 10px;">
                <button type="submit" class="btn btn-success">Editar</button>
                <a type="button" href="/admin/jogos" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@stop

@extends('../includes/footer')
@section('footer')
@stop
