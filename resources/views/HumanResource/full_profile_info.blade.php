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
                                    <input type="checkbox" value="" onchange="myFunction()">
                                    <!--Include modal here to show after the check box is checked-->
                                </label>

                                <script>
                                    function myFunction() {
                                        //var x;
                                        if (confirm("Are you sure you want to save this?") == true) {
                                            //Some code
                                        } else {
                                            //Some other code
                                        }
                                        //confirm("Are you sure?");
                                    }

                                </script>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-md-2 col-xs-6" for="tracking">Contract Tracking:</label>
                            <div class="col-sm-8 col-md-10 col-xs-6">
                                <label class="text-primary" for="progress">Contracts Office</label>
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