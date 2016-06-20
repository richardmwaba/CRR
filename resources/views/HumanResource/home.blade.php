@extends('layouts.hod_template')
@section('title', 'Home')
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
                <div class="panel panel-default col-md-9 col-lg-9 col-sm-8">
                    <div class="panel-heading"><span class="text-primary">Expiring in 6 months </span></div>

                    <div class="panel-body">
                        <table class="table-striped responsive-utilities" data-toggle="table" data-show-refresh="false"
                               data-show-toggle="true" data-show-columns="true" data-search="true"
                               data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
                               data-sort-order="desc">
                            <thead>

                            <tr>
                                <th data-field="id" data-sortable="true">Man #</th>
                                <th data-field="name" data-sortable="true">Name</th>
                                <th data-field="position" data-sortable="true">Position</th>
                                <th data-field="renew by" data-sortable="true">Renew By</th>
                                <th data-field="add/delete" data-sortable="true">Edit</th>

                            </tr>
                            </thead>


                            @foreach($user as $staff)

                                <?php $diff = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($staff->expires_on), false) ?>

                                @if($diff<6 AND $diff>0)
                                    <tr>
                                        <td>{{$staff->man_number}}</td>
                                        <td>{{$staff->first_name}} {{$staff->last_name}}</td>
                                        <td>{{$staff->position}}</td>
                                        <td>{{\Carbon\Carbon::parse($staff->expires_on)->subMonths(6)->toFormattedDateString()}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{url('/contract/'.$staff->man_number)}}" class="btn btn-link">Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                            @endforeach
                        </table>

                    </div>
                    <!-- /.panel-body -->
                </div>

                <div class="panel panel-default col-md-3 col-lg-3 col-sm-4">
                    <div class="panel-heading "><span class="text-danger">Expired</span></div>

                    <div class="panel-body">
                        <ol>
                            @foreach($user as $staff)
                                <?php $diff = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($staff->expires_on), false) ?>
                                @if($diff<=0)
                                    <li>
                                        <div class="btn-group">
                                            <a href="{{url('/full_profile/'.$staff->man_number)}}"
                                               class="btn btn-link">{{$staff->first_name}} {{$staff->last_name}}</a>
                                        </div>
                                    </li>
                                @endif

                            @endforeach
                        </ol>
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