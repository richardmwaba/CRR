@extends('layouts.hod_template')
@section('title', 'HoD Edit')

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
                    <div class="panel-heading"> Edit User</div>

                    <div class="panel-body">
                        <div class="col-md-12">
                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ url('/store_edited_user/'.$user->man_number) }}">
                                {!! csrf_field() !!}

                                <div class="row">
                                    <div class="form-group col-md-6{{ $errors->has('man_number') ? ' has-error' : '' }}">
                                        <label>Man Number</label>
                                        <input class="form-control" placeholder="{{$user->man_number}}" name="man_number" value="">
                                        @if ($errors->has('man_number'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('man_number') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6{{ $errors->has('position') ? ' has-error' : '' }}">
                                        <label>Position</label>
                                        <select class="form-control" name="position">
                                            <option value="">{{$user->position}}</option>
                                            <option> Contracts Officer</option>
                                            <option> Dean of School</option>
                                            <option> Academic Staff</option>
                                            <option> Support Staff</option>
                                        </select>
                                        @if ($errors->has('position'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label>E-mail Address</label>
                                        <input class="form-control" placeholder="{{$user->email}}" name="email" value="">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-4 col-md-5 col-xs-6" for="check">Select if application has been
                                    received:</label>
                                <div class="col-sm-2 col-md-2 col-xs-6">
                                    <label id="demo">
                                        <input type="checkbox" value="" onchange="contractUpdate()">
                                        <!--Include modal here to show after the check box is checked-->
                                    </label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-4 col-md-5 col-xs-6" for="check">Select if application has been
                                    submitted to DOS:</label>
                                <div class="col-sm-2 col-md-2 col-xs-6">
                                    <label id="demo">
                                        <input type="checkbox" value="" onchange="hasContract()">
                                        <!--Include modal here to show after the check box is checked-->
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                                <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2">
                                    <button type="submit" class="btn btn-success">Remind User</button>
                                </div>

                                <div class="col-xs-3 col-xs-offset-1 col-sm-3 col-sm-offset-1 col-md-2 col-lg-2">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                </div>
                            </div>
                        </div>
                        </form>


                    </div>
                </div>
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

    <script>
        function contractUpdate() {
            //var x;
            if (confirm("Are you sure you want to continue?") == true) {
                //Some code
                <?php event(new \App\Events\ContractReceived($user)) ?>
            } else {
                //Some other code
            }
            //confirm("Are you sure?");
        }
    </script>

    <script>
        function hasContract() {
            //var x;
            if (confirm("Are you sure you want to continue?") == true) {
                //Some code
                <?php event(new \App\Events\hasContract($user)) ?>
            } else {
                //Some other code
            }
            //confirm("Are you sure?");
        }
    </script>

@endsection