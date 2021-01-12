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
                            <h5 class="card-title">Criar uma Imagem Tatica</h5>
                            <form action="/taticimage" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-md-12 form-group pb-2">
                                        <input type="text" name="imagename" class="form-control" placeholder="Nome da imagem" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 form-group">
                                        <select class="custom-select" name="tatic_id">
                                            <option selected>Selecione uma tática</option>
                                            @foreach($tatics as $taticselect)
                                                <option value="{{ $taticselect->id }}">{{ $taticselect->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 form-group pb-2">
                                        <input type="file" name="image">
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
