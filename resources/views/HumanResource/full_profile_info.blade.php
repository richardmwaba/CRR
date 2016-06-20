@extends('layouts.hod_template')
@section('title', 'Contract_Info')
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
                                <label class="text-danger" for="status">@if($diff>=6)<p style="color:green">
                                        Valid</p>@elseif($diff<=0)<p style="color:red">Expired</p> @else<p
                                            style="color:orange"> Expires Soon </p>@endif</label>
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
                            <label class="col-sm-4 col-md-2 col-xs-6" for="status">Expired on:</label>
                            <div class="col-sm-8 col-md-10 col-xs-6">
                                <label class="text-primary" for="status">{{$user->expires_on}}</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-md-2 col-xs-6" for="check">Received for renewal?:</label>
                            <div class="col-sm-8 col-md-10 col-xs-6">
                                <label id="demo">
                                    <input type="checkbox" value="" onchange="contractUpdate(this)"
                                    <?php
                                            $position = Auth()->user()->position;
                                            $tracking = $user->contract_tracking;
                                            switch($position){

                                                case "Contracts Officer":
                                                    if($tracking == "Dean's Office" OR $tracking == "Contracts Office" OR $tracking=="Waiting for Dean's approval")
                                                        echo 'checked';
                                                    break;
                                                case "Head of Department":
                                                    if($tracking=="HOD's Office" OR $tracking == "Contracts Office" OR $tracking == "Dean's Office" OR $tracking=="Waiting for Dean's approval" OR $tracking == "Waiting for Contract's approval" )
                                                        echo 'checked';
                                                    break;
                                                case "Dean of School":
                                                    if($tracking=="Dean's Office")
                                                        echo 'checked';
                                                    break;
                                                default :
                                                    if($tracking != "Not available")
                                                        echo 'checked';
                                                    break;
                                            }
                                            ?> >
                                    <script>
                                        function contractUpdate(cb) {
                                            //var x;
                                             var xhttp;
                                            if (window.XMLHttpRequest) {
                                                xhttp = new XMLHttpRequest();
                                            } else {
                                                // code for IE6, IE5
                                                xhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                            }

                                            if(confirm("Are you sure you want to continue?")) {

                                                if(cb.checked) {
                                                    xhttp.open("GET", "{{url('/contract_received/'.$user->man_number)}}", true);
                                                    xhttp.send();
                                                    document.getElementById('contract_tracking').innerHTML = "In progress...";
                                                }else {
                                                    xhttp.open("GET", "{{url('/contract_not_received/'.$user->man_number)}}", true);
                                                    xhttp.send();
                                                    document.getElementById('contract_tracking').innerHTML = "In progress...";
                                                }

                                            } else {
                                                //Some other code
                                            }
                                            //confirm("Are you sure?");
                                        }

                                    </script>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-md-2 col-xs-6" for="tracking">Contract Tracking:</label>
                            <div class="col-sm-8 col-md-10 col-xs-6">
                                <label id="contract_tracking" class="text-primary" for="progress">{{$user->contract_tracking}}</label>
                            </div>

                                <a href="{{url('/contract/'.$user->man_number)}}" class="btn btn-link">Update contract</a>

                        </div>

                    </form>
                    <div class="panel-body">

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

@endsection