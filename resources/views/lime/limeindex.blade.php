
@include('lime.includes.header')
@section('limeheader')
@endsection
<div class="lime-container">
    <div class="lime-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Meus últimos jogos</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Contra</th>
                                        <th scope="col">Dia</th>
                                        <th scope="col">Campeonato</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($recents as $jogo)
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
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Meus próximos jogos</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Contra</th>
                                        <th scope="col">Dia</th>
                                        <th scope="col">Campeonato</th>
                                        <th scope="col">Horário</th>
                                        <th scope="col">Dias faltantes</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($nextDays as $jogo)
                                        @php
                                            $time = (App\Models\Time::find($jogo->time_id));
                                            $campeonato = (App\Models\Campeonatos::find($jogo->campeonato_id));
                                            $win = $jogo->resultadoBlackPhoenix > $jogo->resultadoDoTime;
                                        @endphp
                                        <tr>
                                            <td>{{ $time->teamName }}</td>
                                            <td>{{ date('d/m/Y', strtotime($jogo->diaDoJogo)) }}</td>
                                            <td>{{ $campeonato->name }}</td>
                                            <td>{{ explode(":", $jogo->horaDoJogo)[0] . ":" . explode(":", $jogo->horaDoJogo)[1] }}</td>
                                            <td><span
                                                    class="badge badge-{{ date_diff(new DateTime($jogo->diaDoJogo), new DateTime(date('Y-m-d')))->format('%a') > 15 ? 'success' : 'danger' }}">
                                                    {{ date_diff(new DateTime($jogo->diaDoJogo), new DateTime(date('Y-m-d')))->format('%a') }}
                                                </span>
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
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Relação vitórias/derrotas 2021</h5>
                            <div id="apex3" style="color: white"></div>
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
<script src="lime/assets/assets/plugins/chartjs/chart.min.js"></script>
<script src="lime/assets/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
<script src="lime/assets/assets/plugins/toastr/toastr.min.js"></script>
<script src="lime/assets/assets/js/lime.min.js"></script>
<script src="lime/assets/assets/js/pages/dashboard.js"></script>
<script>
    let options3 = {
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Vitória',
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
            name: 'Derrota',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }],
        xaxis: {
            categories: ['Feveveiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        },
        yaxis: {
            title: {
                text: ''
            }
        },
        fill: {
            opacity: 1

        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val
                }
            }
        }
    }

    var chart3 = new ApexCharts(
        document.querySelector("#apex3"),
        options3
    );

    chart3.render();
</script>
</body>
</html>
