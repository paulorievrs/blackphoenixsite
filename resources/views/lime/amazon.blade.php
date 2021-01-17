@include('lime.includes.header')
@section('limeheader')
@endsection
<style>
    .hover:hover {
        opacity: 50%;
        cursor: pointer;
        color: #f57c00;
    }
    .hover-title:hover {
        cursor: pointer;
        color: #f57c00;
    }
</style>
    <div class="lime-container">
        <div class="lime-body pt-3">
            <div class="container">
                <div class="d-flex align-items-center justify-content-center" >
                    <img width="200" class="hover" src="/img/newlogo.png" onclick="window.open('/', '_blank')">
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <h1>Nossos equipamentos</h1>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <img width="300" src="/img/Amazon-Logo.png" />
                </div>

            @foreach($users as $user)
            <h2 class="hover-title" onclick="window.open('/profile/{{ $user->twitch_username }}', '_blank')">{{ ucfirst($user->twitch_username) }}</h2>
            <hr>
            <div class="row pb-5">
                @foreach($user->amazon as $amazon)
                <div class="card col-md-3 hover" onclick="window.open('{{ $amazon->ahref }}', '_blank')">
                    <div class="card-body">
                        <h5 class="card-title">{{ $amazon->nome }}</h5>
                        <a href="{{ $amazon->ahref }}" target="_blank"><img border="0" src="{{ $amazon->imgsrc1 }}" ></a>
                    </div>
                    <p>Visualizar</p>

                </div>
                @endforeach
            </div>
            @endforeach
            <div class="d-flex align-items-center justify-content-center pb-5" style="width: 100%">
                <a href="/" class="btn btn-warning btn-lg btn-block">Voltar</a>
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
<script>$("#testLoad").load("https://ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=BR&source=ac&ref=tf_til&ad_type=product_link&tracking_id=blackphoenixcs-20&marketplace=amazon&amp;region=BR&placement=B07DDP5199&asins=B07DDP5199&linkId=4f08317c4f3c72d08b7173cda18f4f9b&show_border=false&link_opens_in_new_window=false&price_color=333333&title_color=0066c0&bg_color=ffffff");</script>
<div id="testLoad"></div>
</body>
</html>
