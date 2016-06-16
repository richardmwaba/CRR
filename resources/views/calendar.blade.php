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
                        <div class="panel-heading"> Calender Events</div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                      <div id='calendar'></div>

                                    </div>
                                  </div>
                                </div>
                            </div>
                            </div>

                             <!-- Start Calender modal -->
                              <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">

                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                      <h4 class="modal-title" id="myModalLabel">New Calender Entry</h4>
                                    </div>
                                    <div class="modal-body">
                                      <div id="testmodal" style="padding: 5px 20px;">
                                        <form id="antoform" class="form-horizontal calender" role="form">
                                          <div class="form-group">
                                            <label class="col-sm-3 control-label">Title</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" id="title" name="title">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-9">
                                              <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                                            </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary antosubmit">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">

                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                      <h4 class="modal-title" id="myModalLabel2">Edit Calender Entry</h4>
                                    </div>
                                    <div class="modal-body">

                                      <div id="testmodal2" style="padding: 5px 20px;">
                                        <form id="antoform2" class="form-horizontal calender" role="form">
                                          <div class="form-group">
                                            <label class="col-sm-3 control-label">Title</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" id="title2" name="title2">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-9">
                                              <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                                            </div>
                                          </div>

                                        </form>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
                              <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>

                              <!-- End Calender modal -->
                            
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