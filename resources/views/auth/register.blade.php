@extends('layouts.hod_template')
@section('title', 'Register')

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
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                {!! csrf_field() !!}

                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label>First Name</label>

                                    <input type="text" class="form-control" name="first_name"
                                           value="{{ old('first_name') }}">

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
				                                        <strong>{{ $errors->first('first_name') }}</strong>
				                                    </span>
                                    @endif

                                </div>

                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label>Last Name</label>

                                    <input type="text" class="form-control" name="last_name"
                                           value="{{ old('last_name') }}">

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
				                                        <strong>{{ $errors->first('last_name') }}</strong>
				                                    </span>
                                    @endif

                                </div>

                                <div class="form-group{{ $errors->has('man_number') ? ' has-error' : '' }}">

                                    <label>Man Number</label>
                                    <input class="form-control" placeholder="man number" name="man_number" type="text"
                                           value="{{ old('man_number') }}">
                                    @if ($errors->has('man_number'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('man_number') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                    <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                                        <label>Department</label>
                                        <select class="form-control" name="department">
                                            <option value="">-- select department --</option>
                                            <option value="Computer Science"> Computer Science</option>
                                            <option value="Biology"> Biology</option>
                                            <option value="Chemistry"> Chemistry</option>
                                            <option value="Physics"> Physics</option>
                                        </select>

                                        @if ($errors->has('department'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('department') }}</strong>
                                            </span>
                                        @endif

                                    </div>

                                    <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}">
                                        <label>School</label>
                                        <select class="form-control" name="school">
                                            <option value="">-- select school --</option>
                                            <option value="Natural Sciences">Natural Sciences</option>
                                            <option value="Education">Education</option>
                                            <option value="Engineering">Engineering</option>
                                            <option value="Mines">Mines</option>
                                            <option value="Veterinary Medicine">Veterinary Medicine</option>
                                            <option value="Humanities">Humanities</option>
                                            <option value="Agriculture">Agriculture</option>
                                        </select>

                                        @if ($errors->has('school'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('school') }}</strong>
                                            </span>
                                            @endif

                                    </div>

                                <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                    <label>Position</label>
                                    <select class="form-control" name="position">
                                        <option value="">-- select one --</option>
                                        <option value="Contracts Officer"> Contracts Officer</option>
                                        <option value="Dean of School"> Dean of School</option>
                                        <option value="Head of Department"> Head of Department</option>
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

                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
				                                        <strong>{{ $errors->first('password') }}</strong>
				                                    </span>
                                    @endif
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-4">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="fa fa-btn fa-user"></span>Register
                                    </button>
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