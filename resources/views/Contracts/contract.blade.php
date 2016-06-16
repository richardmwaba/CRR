@extends('layouts.hod_template')
@section('title', 'Contracts')

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
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Update Contract</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/update_contract')}}">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Length </label>

                                    <div class="col-md-6">

                                        <input type="number" name="contract_length" value="{{old('contract_length' , $contract->contract_length)}}"> Days

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i>Submit
                                        </button>
                                    </div>
                                </div>
                                <input name="man_number" type="hidden" value="{{$man_number}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection