@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contract</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/updateContract') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('renewed_on') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Renewed on</label>
                            <div class="col-md-6">
                        <input type="date" name="renewed_on" value="{{ old('renewed_on' , $contract->renewed_on)}}">

                                @if ($errors->has('renewed_on'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('renewed_on') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('expires_on') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Expires on</label>

                            <div class="col-md-6">

                                <input type="date" name="expires_on" value="{{ old('expires_on' , $contract->expires_on)}}">

                                @if ($errors->has('expires_on'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('expires_on') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
