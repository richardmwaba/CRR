@extends('layouts.visitor')
@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading"><strong>Log in</strong></div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <fieldset>
                            <div class="form-group{{ $errors->has('man_number') ? ' has-error' : '' }}">
                                <label>Man Number:</label>
                                <input class="form-control" placeholder="Man number" name="man_number" type="number" autofocus="">

                                @if ($errors->has('man_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('man_number') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>Password:</label>
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" > Remember Me
                                </label>
                            </div>
                                <div class="form-group">
                                        <button type="submit" class="btn btn-info">
                                            <!--<i class="fa fa-btn fa-sign-in"></i>Login -->
                                            <span class="glyphicon glyphicon-log-in"></span> Login
                                        </button>

                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div>
@endsection
