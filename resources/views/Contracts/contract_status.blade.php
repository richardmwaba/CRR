@extends('layouts.hod_template')
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
                        <div class="panel-heading"> Contract details</div>
                            <form class="form-horizontal" role="form" style="margin-left: 20px;margin-top: 20px">
                                <div class="form-group">
                                  <label class="col-sm-4 col-md-2 col-xs-6" for="status">Contract Status:</label>
                                  <div class="col-sm-8 col-md-10 col-xs-6">
                                    <label class="text-danger" for="status">Expired</label>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-sm-4 col-md-2 col-xs-6" for="status">Contract Exp Date:</label>
                                  <div class="col-sm-8 col-md-10 col-xs-6">
                                    <label class="text-primary" for="status">29.03.2016</label>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-sm-4 col-md-4 col-xs-6" for="check">Click here if application has been submitted:</label>
                                  <div class="col-sm-8 col-md-8 col-xs-6">
                                    <label id="demo">
                                        <input type="checkbox" value="" onchange="myFunction()"> <!--Include modal here to show after the check box is checked-->   
                                    </label>

                                    <script>
                                            function myFunction() {
                                                //var x;
                                                if (confirm("Are you sure you want to save this?") == true) {
                                                   //Some code
                                                } else {
                                                   //Some other code
                                                }
                                                //confirm("Are you sure?");
                                            }

                                        </script>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-sm-4 col-md-3 col-xs-6" for="tracking">Application Progress/Tracking:</label>
                                  <div class="col-sm-8 col-md-9 col-xs-6">
                                    <label class="text-primary" for="progress">Contracts Office</label>
                                  </div>
                                </div>
                            
                            </form>
                        <div class="panel-body">
                            
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