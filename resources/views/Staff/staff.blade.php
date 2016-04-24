@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contract</div>
                <div class="panel-body">
                        {!! csrf_field() !!}
                        <div>

                            @foreach($user as $staff)

                                <li><a href="{{ url('/contract/'.$staff->man_number) }}">{{$staff->first_name}}
                                        {{$staff->other_names}} {{$staff->last_name}}</a></li>

                                @endforeach

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
