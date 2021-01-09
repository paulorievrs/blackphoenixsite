
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
                            <h5 class="card-title">Todos as noticías</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Texto</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Criado Por</th>
                                        <th scope="col">Editar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($news as $new)
                                        @php
                                          $user = (App\Models\User::find($new->user_id));
                                        @endphp
                                        <tr>
                                            <td>{{ $new->title }}</td>
                                            <td>{{ Str::limit($new->text, 30) }}</td>
                                            <td>{{ date('d/m/Y', strtotime($new->postDate)) }}</td>
                                            <td>{{ $user->name}}</td>
                                            <td scope="col" style="cursor: pointer"><a href="/edit-news/{{ $new->id }}"><i class="material-icons" style="color: orange;">create</i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $news->links() }}
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
