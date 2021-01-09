@include('lime.includes.header')
@section('limeheader')
@endsection
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script>
    $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: 'https://api.twitch.tv/helix/streams?user_login={{ Auth::user()->twitch_username }}',
        headers: {
            'client-id': 'gp762nuuoqcoxypju8c569th9wz7q5',
            'Authorization': 'Bearer cl2p8lx2y758g3vat3t6wsqzs7qmcy'
        },
        success: function (data) {
            let you_html = "";
            if(Object.keys(data.data).length === 0) {
                you_html = '<span>Live: Offline</span><i class="material-icons" style="color: gray; margin-left: 5px"> fiber_manual_record</i>'
            } else {
                you_html = '<span>Live: Ao vivo</span><i class="material-icons" style="color: red; margin-left: 5px;">fiber_manual_record</i>'
            }
            console.log(you_html);
            document.getElementById('ajaxrequest').innerHTML= " - " + you_html;
            // $("#ajaxrequest").append(you_html); //// For Append
        },
        error: function() {
            console.log(data);
        }
    });
</script>

<div class="lime-container">
    <div class="lime-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="profile-cover"></div>
                    <div class="profile-header">
                        <div class="profile-img">
                            <img src="{{ Auth::user()->profileimagelink === null || strlen(Auth::user()->profileimagelink) === 0 ? 'https://filestore.community.support.microsoft.com/api/images/6061bd47-2818-4f2b-b04a-5a9ddb6f6467?upload=true'  : '/storage/user_img/' . Auth::user()->profileimagelink }}" />
                        </div>
                        <div class="profile-name">
                            <h3>{{ Auth::user()->name }}
                            <span id="ajaxrequest"></span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sobre</h5>
                            <p>{{ (Auth::user()->bio) }}</p>
{{--                            <ul class="list-unstyled profile-about-list">--}}
{{--                                <li><i class="material-icons">school</i><span>Studied Mechanical Engineering at <a href="#">Carnegie Mellon University</a></span></li>--}}
{{--                                <li><i class="material-icons">work</i><span>Former manager at <a href="#">Stacks</a></span></li>--}}
{{--                                <li><i class="material-icons">my_location</i><span>From <a href="#">Boston, Massachusetts</a></span></li>--}}
{{--                                <li><i class="material-icons">rss_feed</i><span>Online</span></li>--}}
{{--                            </ul>--}}
                            <ul class="list-unstyled profile-about-list">
                                 @foreach(Auth::user()->links as $link)
                                <li>{{ $link->name }}: <a target="_blank" href="{{ $link->link }}">{{ $link->link }}</a></li>
                                @endforeach
                                 <li>Twitch: <a target="_blank" href="https://twitch.tv/{{ Auth::user()->twitch_username }}">https://twitch.tv/{{ Auth::user()->twitch_username }}</a></li>
{{--                                <li><i class="material-icons" style="color: red;">fiber_manual_record</i><span>Live: Ao vivo</span></li>--}}
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Informações</h5>
                            <ul class="list-unstyled profile-about-list">
                                <li><i class="material-icons">mail_outline</i><span>{{ Auth::user()->email }}</span></li>
                                <li><i class="material-icons">home</i><span>{{ Auth::user()->local }}</a></span></li>
{{--                                <li><i class="material-icons">local_phone</i><span>+1 (678) 290 1680</span></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lime-footer">
        <div class="container-fluid">
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
<script src="lime/assets/assets/js/lime.min.js"></script>
</body>
</html>
