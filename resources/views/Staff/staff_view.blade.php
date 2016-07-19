@extends('layouts.hod_template')
@section('title', 'Staff view')
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
                    <div class="panel-heading"> Staff Details</div>

                    <div class="panel-body">
                        <table class="table-striped responsive-utilities" data-toggle="table" data-show-refresh="false"
                               data-show-toggle="true" data-show-columns="true" data-search="true"
                               data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
                               data-sort-order="desc" style="font-size: small">
                            <thead>
                            <tr>
                                <!--<th data-field="state" data-checkbox="true">Count</th>-->
                                <th data-field="name" data-sortable="true">Name</th>
                                <th data-field="id" data-sortable="true">Man #</th>
                                <th data-field="position" data-sortable="true">Position</th>
                                <th data-field="department" data-sortable="true">Department</th>
                                <th data-field="school" data-sortable="true">School</th>
                                <th data-field="renew by" data-sortable="true">Renew By</th>
                                <th data-field="contract status" data-sortable="true">Contract Status</th>
                                <th data-field="application stage" data-sortable="true">Application Stage</th>
                                <th data-field="edit/delete" data-sortable="true">Edit | Delete</th>
                            </tr>
                            </thead>

                            @foreach($user as $staff)

                                <tr>

                                    <!--<td data-field="state" data-checkbox="true">{{$staff->id}}</td>-->
                                    <td>{{$staff->first_name}} {{$staff->last_name}}</td>
                                    <td>{{$staff->man_number}}</td>
                                    <td>{{$staff->position}}</td>
                                    <td>{{$staff->department}}</td>
                                    <td>{{$staff->school}}</td>
                                    <td>{{\Carbon\Carbon::parse($staff->expires_on)->subMonths(6)->toFormattedDateString()}}</td>
                                    <td class="text-success">@if($staff->contract_status=="Valid"){{$staff->contract_status}}@elseif($staff->contract_status=="Expired")
                                            <p style="color:red">{{$staff->contract_status}}</p> @else<p
                                                    style="color:orange">{{$staff->contract_status}}</p>@endif</td>
                                    <td class="text-success">{{$staff->contract_tracking}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{url('/edit_user/'.$staff->man_number)}}" class="btn btn-sm btn-link">Edit</a>
                                            <!--<a onclick="delete_user('$staff->first_name}}', '$staff->man_number}}')"
                                               class="btn btn-sm btn-link">Delete</a>-->
                                            <!--<a class="btn btn-default btn-xs" type="button" title="edit">
                                                <i href="url('/edit_user/'.$staff->man_number)}}" class="glyphicon glyphicon glyphicon-edit"></i>
                                            </a>-->
                                            <button class="btn btn-default btn-xs" onclick="delete_user('{{$staff->first_name}}', '{{$staff->man_number}}')" type="button" name="toggle" title="delete">
                                                <i class="glyphicon glyphicon glyphicon-trash"></i>
                                            </button>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        <script>
                            $(function () {
                                $('#hover, #striped, #condensed').click(function () {
                                    var classes = 'table';

                                    if ($('#hover').prop('checked')) {
                                        classes += ' table-hover';
                                    }
                                    if ($('#condensed').prop('checked')) {
                                        classes += ' table-condensed';
                                    }
                                    $('#table-style').bootstrapTable('destroy')
                                            .bootstrapTable({
                                                classes: classes,
                                                striped: $('#striped').prop('checked')
                                            });
                                });
                            });

                            function rowStyle(row, index) {
                                var classes = ['active', 'success', 'info', 'warning', 'danger'];

                                if (index % 2 === 0 && index / 2 < classes.length) {
                                    return {
                                        classes: classes[index / 2]
                                    };
                                }
                                return {};
                            }
                        </script> <!--/. script-->

                        <script>
                            function delete_user(user, man) {
                                var xhttp;
                                if (window.XMLHttpRequest) {
                                    xhttp = new XMLHttpRequest();
                                } else {
                                    // code for IE6, IE5
                                    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                }
                                if (confirm("Are you sure you want to delete " + user + "?")) {
                                    xhttp.open("GET", "{{url('delete_user')}}/" + man, false);
                                    xhttp.send();
                                    alert(user + " has been deleted!");
                                    location.reload();
                                }

                            }
                        </script>


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
    @section('scripts')

    @parent

            <!-- Custom Table JavaScript -->
    <script>
        !function ($) {
            $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
            if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        });
        $(window).on('resize', function () {
            if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>
    <!-- /.Custom Table JavaScript -->
@endsection
