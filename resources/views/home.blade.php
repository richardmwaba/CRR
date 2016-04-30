@extends('layouts.hod_template')
@section('title', 'Staff View')
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
                        <table class="table-striped responsive-utilities" data-toggle="table" data-url="../dist/js/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true" >Item ID</th>
                                <th data-field="id" data-sortable="true">Man #</th>
                                <th data-field="name"  data-sortable="true">Name</th>
                                <th data-field="position" data-sortable="true">Position</th>
                                <th data-field="renew by" data-sortable="true">Renew By</th>
                                <th data-field="contract status"  data-sortable="true">Contract Status</th>
                                <th data-field="application stage" data-sortable="true">Application Stage</th>
                                <th data-field="add/delete" data-sortable="true">Edit | Delete</th>
                            </tr>
                            </thead>

                            <tr>
                                <td data-field="state" data-checkbox="true" >Item ID</td>
                                <td>1111201</td>
                                <td>George Owens</td>
                                <td>Intern</td>
                                <td>12.04.17</td>
                                <td class="text-success">Renewed</td>
                                <td class="text-success">Not available</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-link">Edit</a>
                                        <a href="#" class="btn btn-link">Delete</a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-field="state" data-checkbox="true" >Item ID</td>
                                <td>1111201</td>
                                <td>George Owens</td>
                                <td>Intern</td>
                                <td>12.04.17</td>
                                <td class="text-danger">Expired</td>
                                <td class="text-danger">Not available</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-link">Edit</a>
                                        <a href="#" class="btn btn-link">Delete</a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-field="state" data-checkbox="true" >Item ID</td>
                                <td>1111201</td>
                                <td>George Owens</td>
                                <td>Intern</td>
                                <td>12.04.17</td>
                                <td class="text-warning">Renewal in progress</td>
                                <td class="text-warning">HoD's office</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-link">Edit</a>
                                        <a href="#" class="btn btn-link">Delete</a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-field="state" data-checkbox="true" >Item ID</td>
                                <td>1111201</td>
                                <td>George Owens</td>
                                <td>Intern</td>
                                <td>12.04.17</td>
                                <td class="text-info">Pending approval</td>
                                <td class="text-info">Contracts Office</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-link">Edit</a>
                                        <a href="#" class="btn btn-link">Delete</a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-field="state" data-checkbox="true" >Item ID</td>
                                <td>1111201</td>
                                <td>George Owens</td>
                                <td>Intern</td>
                                <td>12.04.17</td>
                                <td class="text-success">Renewed</td>
                                <td class="text-success">Not available</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-link">Edit</a>
                                        <a href="#" class="btn btn-link">Delete</a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-field="state" data-checkbox="true" >Item ID</td>
                                <td>1111201</td>
                                <td>George Owens</td>
                                <td>Intern</td>
                                <td>12.04.17</td>
                                <td class="text-success">Renewed</td>
                                <td class="text-success">Not available</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-link">Edit</a>
                                        <a href="#" class="btn btn-link">Delete</a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-field="state" data-checkbox="true" >Item ID</td>
                                <td>1111201</td>
                                <td>George Owens</td>
                                <td>Intern</td>
                                <td>12.04.17</td>
                                <td class="text-success">Renewed</td>
                                <td class="text-success">Not available</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-link">Edit</a>
                                        <a href="#" class="btn btn-link">Delete</a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-field="state" data-checkbox="true" >Item ID</td>
                                <td>1111201</td>
                                <td>George Owens</td>
                                <td>Intern</td>
                                <td>12.04.17</td>
                                <td class="text-success">Renewed</td>
                                <td class="text-success">Not available</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-link">Edit</a>
                                        <a href="#" class="btn btn-link">Delete</a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-field="state" data-checkbox="true" >Item ID</td>
                                <td>1111201</td>
                                <td>George Owens</td>
                                <td>Intern</td>
                                <td>12.04.17</td>
                                <td class="text-success">Renewed</td>
                                <td class="text-success">Not available</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-link">Edit</a>
                                        <a href="#" class="btn btn-link">Delete</a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-field="state" data-checkbox="true" >Item ID</td>
                                <td>1111201</td>
                                <td>George Owens</td>
                                <td>Intern</td>
                                <td>12.04.17</td>
                                <td class="text-success">Renewed</td>
                                <td class="text-success">Not available</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-link">Edit</a>
                                        <a href="#" class="btn btn-link">Delete</a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-field="state" data-checkbox="true" >Item ID</td>
                                <td>1111201</td>
                                <td>George Owens</td>
                                <td>Intern</td>
                                <td>12.04.17</td>
                                <td class="text-danger">Expired</td>
                                <td class="text-danger">Not available</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-link">Edit</a>
                                        <a href="#" class="btn btn-link">Delete</a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-field="state" data-checkbox="true" >Item ID</td>
                                <td>1111201</td>
                                <td>George Owens</td>
                                <td>Intern</td>
                                <td>12.04.17</td>
                                <td class="text-warning">Renewal in progress</td>
                                <td class="text-warning">HoD's office</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-link">Edit</a>
                                        <a href="#" class="btn btn-link">Delete</a>

                                    </div>
                                </td>
                            </tr>
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
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
            if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
            if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>
    <!-- /.Custom Table JavaScript -->
@endsection
