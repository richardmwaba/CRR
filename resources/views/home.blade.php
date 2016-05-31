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
                            <table class="table-striped responsive-utilities" data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>

                            <tr>
                                <th data-field="state" data-checkbox="true" >Item ID</th>
                                <th data-field="id" data-sortable="true">Man #</th>
                                <th data-field="name"  data-sortable="true">Name</th>
                                <th data-field="position" data-sortable="true">Position</th>
                                <th data-field="renew by" data-sortable="true">Renew By</th>
                                
                            </tr>
                            </thead>

                                <tr>

                                    @foreach($user as $staff)
                                        <?php $contract = App\Contract::firstOrNew(array('man_number' =>$staff->man_number));
                                        $today = \Carbon\Carbon::today();
                                        $expires = \Carbon\Carbon::parse($contract->expires_on);
                                        $diff = $today->diffInMonths($expires, false);
                                        ?>

                                        @if($diff<6 AND $diff>0)
                                            <td data-field="state" data-checkbox="true" >{{$staff->id}}</td>
                                            <td>{{$staff->man_number}}</td>
                                            <td>{{$staff->first_name}} {{$staff->last_name}}</td>
                                            <td>{{$staff->position}}</td>
                                            <td>{{$expires->subMonths(6)}}</td>
                                        @endif
                                </tr>
                                    @endforeach
                            </table>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>

                    <div class="panel panel-default col-md-3 col-lg-3 col-sm-4">
                        <div class="panel-heading "> <span class="text-danger">Expired </span></div>
                        
                        <div class="panel-body">
                            <ol>
                                @foreach($user as $staff)
                                    <?php $contract = App\Contract::firstOrNew(array('man_number' =>$staff->man_number));
                                    $today = \Carbon\Carbon::today();
                                    $expires = \Carbon\Carbon::parse($contract->expires_on);
                                    $diff = $today->diffInMonths($expires, false);
                                    ?>

                                        @if($diff<=0)<li>{{$staff->first_name}} {{$staff->last_name}}</li> @endif

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