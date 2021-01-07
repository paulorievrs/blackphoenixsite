@extends('../includes/header')
@section('header')
@stop

@extends('admin/includes/navbar')
@section('menu')

    <div class="container" style="padding-top: 100px">
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <h1>Jogos</h1>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome Do Time</th>
                        <th scope="col">Dia Do Jogo</th>
                        <th scope="col">Hora Do Jogo</th>
                        <th scope="col">Link para Assistir</th>
                        <th>Logo do Time</th>
                        <th>BlackPhoenix</th>
                        <th>Time</th>
                        <th>Campeonato</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jogos as $jogo)
                        {{ $ganhou = $jogo->resultadoBlackPhoenix > $jogo->resultadoDoTime }}
                        <tr>
                            <td scope="row">{{ $jogo->id }}</td>
                            <td>{{ $jogo->nomeDoTime }}</td>
                            <td>{{ date('d/m/Y', strtotime($jogo->diaDoJogo)) }}</td>
                            <td>{{ explode(":", $jogo->horaDoJogo)[0] . ":" . explode(":", $jogo->horaDoJogo)[1]}}</td>
                            <td><a target="_blank"  href="{{ $jogo->linkParaAssistir }}">{{ Str::limit($jogo->linkParaAssistir, 10, $end = '...') }}</a></td>
                            <td><a target="_blank" href="{{ $jogo->logoDoTime }}">{{ Str::limit($jogo->logoDoTime, 10) }}</a></td>
                            <td class="{{ $ganhou ? "text-success" : "text-danger"}}" >{{ $jogo->resultadoBlackPhoenix  }}</td>
                            <td class="{{ $ganhou ?  "text-danger" : "text-success"}}" >{{ $jogo->resultadoDoTime  }}</td>
                            <td>{{ $jogo->campeonato }}</td>
                            <td><a href="/editjogo/{{ $jogo->id }}">E</a></td>
                            <td>
                                <form action="/jogos/{{ $jogo->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button>D</button>
                                </form>
                            </td>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-center">
                    {{ $jogos->links() }}
                </div>
            </div>
        </div>
    </div>

@stop

@extends('../includes/footer')
@section('footer')
@stop

