@include('lime.edit.includes.header')
@section('limeheader')
@endsection
<style>
    img {
        width: 200px;
        height: 200px;
    }
</style>
<div class="container">
    <h1 class="pb-5">{{ ucfirst($tatic->name) }}</h1>

    <p class="pb-5">
        {{ ucfirst($tatic->description) }}
    </p>

    <div class="row pb-5">
        @foreach($tatic->taticimage as $taticimage)
        <div class="col-6 pb-2">
            <h5>{{ ucfirst($taticimage->imagename) }}</h5>
            <img src="{{ '/storage/tatics_img/' . $taticimage->imagelink }}"  />
        </div>

        @endforeach
    </div>

    <div style="padding-bottom: 300px"></div>

</div>

<script src="../lime/assets/assets/plugins/jquery/jquery-3.1.0.min.js"></script>
<script src="../lime/assets/assets/plugins/bootstrap/popper.min.js"></script>
<script src="../lime/assets/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../lime/assets/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../lime/assets/assets/plugins/chartjs/chart.min.js"></script>
<script src="../lime/assets/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
<script src="../lime/assets/assets/plugins/toastr/toastr.min.js"></script>
<script src="../lime/assets/assets/plugins/elevatezoom/jquery.elevatezoom-3.0.8.min.js"></script>
<script src="../lime/assets/assets/js/lime.min.js"></script>
<script src="../lime/assets/assets/js/pages/dashboard.js"></script>
<script src="../lime/assets/assets/js/pages/image_zoom.js"></script>
</body>
</html>
