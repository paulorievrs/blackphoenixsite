@include('lime.includes.header')
@section('limeheader')
@endsection
<div class="container pt-5">

    <div class="d-flex align-items-center justify-content-center p-5">
        <img src="/img/newlogo.png" style="width: 200px; cursor: pointer;" onclick="window.open('/', '_self')"/>
    </div>
    <div class="login-container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 lfh">
                <div class="card login-box">
                    <div class="card-body">
                        <h5 class="card-title">Login</h5>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                            </div>

                            <div class="d-flex flex-row justify-content-between">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                                <a href="/" class="btn btn-outline-dark" >Voltar</a>
                            </div>

                        </form>
                    </div>
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
