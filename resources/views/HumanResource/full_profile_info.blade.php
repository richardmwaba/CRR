@extends('layouts.hod_template')
@section('title', 'Expired contract')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile brief</div>
                    <form class="form-horizontal" role="form" style="margin-left: 20px;margin-top: 20px">
                        <div class="form-group">
                            <label class="col-sm-4 col-md-2 col-xs-6" for="status">State:</label>
                            <div class="col-sm-8 col-md-10 col-xs-6">
                                <label class="text-danger" for="status">@if($user->contract_status!=null AND $user->contract_status=="Valid"){{$user->contract_status}}
                                    @elseif($user->contract_status!=null AND $staff->contract_status=="Expired")
                                        <p style="color:red">{{$user->contract_status}}</p> @else<p
                                                style="color:orange">{{$user->contract_status}}</p>@endif</label>
                            </div>

                            <label class="col-sm-4 col-md-2 col-xs-6" for="status">man#:</label>
                            <div class="col-sm-8 col-md-10 col-xs-6">
                                <label for="status">{{$user->man_number}}</label>
                            </div>
                            <label class="col-sm-4 col-md-2 col-xs-6" for="status">Names:</label>
                            <div class="col-sm-8 col-md-10 col-xs-6">
                                <label for="status">{{$user->first_name}} {{$user->last_name}}</label>
                            </div>
                            <label class="col-sm-4 col-md-2 col-xs-6" for="status">Position:</label>
                            <div class="col-sm-8 col-md-10 col-xs-6">
                                <label for="status">{{$user->position}}</label>
                            </div>
                            <label class="col-sm-4 col-md-2 col-xs-6" for="status">Department:</label>
                            <div class="col-sm-8 col-md-10 col-xs-6">
                                <label for="status">{{$user->department}}</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-md-2 col-xs-6" for="status">Expiration date:</label>
                            <div class="col-sm-8 col-md-10 col-xs-6">
                                <label class="text-primary" for="status">{{\Carbon\Carbon::parse($user->expires_on)->toFormattedDateString()}}</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-md-2 col-xs-6" for="tracking">Contract Tracking:</label>
                            <div class="col-sm-8 col-md-10 col-xs-6">
                                <label id="contract_tracking" class="text-primary"
                                       for="progress">{{$user->contract_tracking}}</label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-md-2 col-xs-6" for="check">Received for renewal?:</label>
                            <div class="col-sm-4 col-md-2 col-xs-6">
                                <label id="demo">
                                    <input type="checkbox" value="" onchange="contractUpdate(this)"
                                    <?php
                                            $position = Auth()->user()->position;
                                            $tracking = $user->contract_tracking;
                                            switch ($position) {

                                                case "Contracts Officer":
                                                    if ($tracking == "Dean's Office" OR $tracking == "Contracts Office" OR $tracking == "Waiting for Dean's approval")
                                                        echo 'checked';
                                                    break;
                                                case "Head of Department":
                                                    if ($tracking == "HOD's Office" OR $tracking == "Contracts Office" OR $tracking == "Dean's Office" OR $tracking == "Waiting for Dean's approval" OR $tracking == "Waiting for Contract's approval")
                                                        echo 'checked';
                                                    break;
                                                case "Dean of School":
                                                    if ($tracking == "Dean's Office")
                                                        echo 'checked';
                                                    break;
                                                default :
                                                    if ($tracking != "Not available")
                                                        echo 'checked';
                                                    break;
                                            }
                                            ?> >
                                    <!--Include modal here to show after the check box is checked-->
                                </label>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-4 col-md-2 col-xs-6" for="check">Submitted to Dean?:</label>
                            <div class="col-sm-4 col-md-2 col-xs-6">
                                <label id="demo">
                                    <input type="checkbox" id="submitted" value="" onchange="contractUpdate(this)"
                                    <?php
                                            $position = Auth()->user()->position;
                                            $tracking = $user->contract_tracking;

                                            switch($position){

                                                case "Contracts Officer":
                                                    echo 'checked';
                                                    break;
                                                case "Head of Department":
                                                    if($tracking == "Contracts Office" OR $tracking == "Dean's Office" OR $tracking == "Waiting for Dean's acknowledgement")
                                                        echo 'checked';
                                                    break;
                                                case "Dean of School":
                                                    if($tracking == "Contracts Office"OR $tracking == "Waiting for Contracts Officer's acknowledgement")
                                                        echo 'checked';
                                                    break;
                                                default :
                                                    break;

                                            } ?> >
                                    <!--Include modal here to show after the check box is checked-->
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
                                    <a href="{{url('/contract/'.$user->man_number)}}" class="btn btn-primary">Update
                                        contract</a>
                                </div>

                                <div class="col-xs-3 col-xs-offset-1 col-sm-3 col-sm-offset-1 col-md-2 col-lg-2">
                                    <button onclick="delete_user()" class="btn btn-danger">Delete user</button>
                                    <script>
                                        function delete_user() {
                                            var xhttp;
                                            if (window.XMLHttpRequest) {
                                                xhttp = new XMLHttpRequest();
                                            } else {
                                                // code for IE6, IE5
                                                xhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                            }
                                            if (confirm("Are you sure you want to delete {{$user->man_number}}?")) {
                                                xhttp.open("GET", "{{url('delete_user/'.$user->man_number)}}", true);
                                                xhttp.send();
                                                alert({{$user->first_name}} "has been deleted!");
                                            } else {

                                            }

                                        }
                                    </script>
                                </div>
                                <div class="panel-body">

                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                        <!-- /.row -->
                        <!-- /#page-wrapper -->

@endsection