
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Todos os jogos</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Contra</th>
                                        <th scope="col">Dia</th>
                                        <th scope="col">Campeonato</th>
                                        <th scope="col">Resultado</th>
                                        <th scope="col">Editar</th>
                                        <th scope="col">Excluir</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($jogos as $jogo)
                                        @php
                                          $time = (App\Models\Time::find($jogo->time_id));
                                          $campeonato = (App\Models\Campeonatos::find($jogo->campeonato_id));
                                          $win = $jogo->resultadoBlackPhoenix > $jogo->resultadoDoTime;
                                        @endphp
                                        <tr>
                                            <td>{{ $time->teamName }}</td>
                                            <td>{{ date('d/m/Y', strtotime($jogo->diaDoJogo)) }}</td>
                                            <td>{{ $campeonato->name }}</td>
                                            <td><span class="badge badge-{{ $win ? 'success' : 'danger' }}">{{ $win ? 'Vitória' : 'Derrota' }}</span></td>
                                            <td scope="col" style="cursor: pointer"><a href="/edit-jogo/{{ $jogo->id }}"><i class="material-icons" style="color: orange;">create</i></a></td>
                                            <td>
                                                <form action="/delete-jogo/{{ $jogo->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button style="background: none"><i class="material-icons" style="color: red;">delete</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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

    <script src="lime/assets/assets/plugins/jquery/jquery-3.1.0.min.js"></script>
    <script src="lime/assets/assets/plugins/bootstrap/popper.min.js"></script>
    <script src="lime/assets/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="lime/assets/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="lime/assets/assets/plugins/chartjs/chart.min.js"></script>
    <script src="lime/assets/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
    <script src="lime/assets/assets/plugins/toastr/toastr.min.js"></script>
    <script src="lime/assets/assets/js/lime.min.js"></script>
    <script src="lime/assets/assets/js/pages/dashboard.js"></script>
    </body>
</html>
