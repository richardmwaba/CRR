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
                                        {{$staff->other_names}} {{$staff->last_name}}

                                        <!-- finds the contract status of the current current iteration-->

                                        <?php $contract = App\Contract::firstOrNew(array('man_number' =>$staff->man_number));
                                        $diff = \Carbon\Carbon::parse($contract->expires_on)->diffInMonths(Carbon\Carbon::now()); ?>

                                        @if($diff<=0)
                                            contract is expired
                                            @else
                                            contract is valid
                                            @endif

                                    </a></li>

                                @endforeach
                                <li><a href="{{ url('/add_new') }}">Add new</a></li>
                        </div>
            </div>
        </div>
    </div>
</div>
    </div>
@endsection
