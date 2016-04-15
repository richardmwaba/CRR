@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contract</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('contractStatus') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Position</label>

                            <div class="col-md-6">
                        <input type="radio" name="contractStatus" value="HOD"> HOD
                                <input type="radio" name="contractStatus" value="Senior Lecturer"> Senior Lecturer
                        <input type="radio" name="contractStatus" value="Lecturer"> Lecturer
                        <input type="radio" name="contractStatus" value="General Worker">General Worker<br>

                                @if ($errors->has('contractStatus'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contractStatus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('applicationStage') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Position</label>

                            <div class="col-md-6">
                                <input type="radio" name="applicationStage" value="HOD"> HOD
                                <input type="radio" name="applicationStage" value="Senior Lecturer"> Senior Lecturer
                                <input type="radio" name="applicationStage" value="Lecturer"> Lecturer
                                <input type="radio" name="applicationStage" value="General Worker">General Worker<br>

                                @if ($errors->has('applicationStage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('applicationStage') }}</strong>
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
