@extends('layouts.hod_template')
@section('title', 'Add New')

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
                    <div class="panel-heading"> Add New User</div>

                    <div class="panel-body">
                        <div class="col-md-6">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/store_new_user') }}">
                                    {!! csrf_field() !!}

                                        <div class="form-group{{ $errors->has('man_number') ? ' has-error' : '' }}">

                                            <label>Man Number</label>
                                            <input class="form-control" placeholder="man number" name="man_number" type="text" value="{{ old('man_number') }}">
                                                @if ($errors->has('man_number'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('man_number') }}</strong>
                                            </span>
                                                @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                            <label>Position</label>
                                            <select class="form-control" name="position">
                                               <option value="">-- select one --</option>
                                                    <option value="CO"> Contracts Officer</option>
                                                    <option value="DoS"> Dean of School</option>
                                                    <option value="HoD"> Head of Department</option>
                                                    <option value="Academic Staff"> Academic Staff</option>
                                                    <option value="Support Staff"> Support Staff</option>
                                            </select>

                                            @if ($errors->has('position'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('position') }}</strong>
                                            </span>
                                            @endif

                                        </div>
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label>E-mail Address</label>
                                            <input type="email" class="form-control" placeholder="e-mail" name="email">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                                @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label>Temporal Password</label>

                                                <input type="password" class="form-control" name="password" placeholder="password">

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                                @endif
                                        </div>

                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-4">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-4">
                                            <button type="reset" class="btn btn-default">Cancel</button>
                                        </div>

                            </form>
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


@endsection