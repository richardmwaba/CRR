@extends('layouts.hod_template')

@section('content')
    <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <p>
                        Please tap on the top right conner to login
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="{{URL::asset('//js.pusher.com/3.0/pusher.min.js')}}"></script>
    <script>
        var pusher = new Pusher("{{env("PUSHER_KEY")}}")
        var channel = pusher.subscribe('test-channel');
        channel.bind('test-event', function(data) {
            alert(data.text);

            //client side debug console config
            Pusher.log = function(msg) {
                console.log(msg);
            };

            var pusher = new Pusher("{{env("PUSHER_KEY")}}")
        });
    </script>
@endsection
