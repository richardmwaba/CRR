@extends('layouts.hod_template')
@section('title')
    <title>Staff | Add New User</title>
    @endsection

@section('body')    <div class="form-group">
                    <div class="panel panel-default">
                        <div class="panel-heading"> Add New User</div>


                        <div class="panel-body">
                            <div class="col-md-6">
                                <form role="form">
                                
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input class="form-control" placeholder="first name">
                                    </div>

                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input class="form-control" placeholder="middle name">
                                    </div>

                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" placeholder="last name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Man Number</label>
                                        <input class="form-control" placeholder="man number">
                                    </div>
                                    <div class="form-group">
                                        <label>Position</label>
                                        <select class="form-control">
                                            <option>Lecturer</option>
                                            <option>HoD</option>
                                            <option>Dean of School</option>
                                            <option>Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>E-mail Address</label>
                                        <input class="form-control" placeholder="e-mail">
                                    </div>

                                    <div class="form-group">
                                        <label>Nationality</label>
                                        <select class="form-control">
                                            <option>Zambian</option>
                                            <option>South African</option>
                                            <option>American</option>
                                            <option>Egyptian</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-4">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-4">
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                    </div>
                                    
                                </form>
                            </div>
                            
                        </div>
                        </div>
    </div>
                        @endsection
                        <!-- /.panel-body -->