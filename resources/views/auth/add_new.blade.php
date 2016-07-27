@extends('layouts.hod_template')
@section('title', 'Add New')

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
                    <div class="panel-heading"> Add New User</div>

                    <div class="panel-body">
                        <div class="col-md-6 col-lg-6">
                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ url('/store_new_user') }}">
                                {!! csrf_field() !!}

                                <div class="form-group{{ $errors->has('man_number') ? ' has-error' : '' }}">

                                    <label>Man Number</label>
                                    <input class="form-control" placeholder="man number" name="man_number" type="number"
                                           value="{{ old('man_number') }}">
                                    @if ($errors->has('man_number'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('man_number') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                    <label>Position</label>
                                    @if($user->position=='Contracts Officer')

                                        <select id="Positions" class="form-control" name="position">
                                            <option value="">-- select position --</option>
                                        </select>
                                    @elseif($user->position=='Dean of School')
                                        <select id="selectNumber" class="form-control" name="position">
                                            <option value="">-- select position --</option>
                                            <option value="Head of Department"> Head of Department</option>
                                            <option value="Academic Staff"> Academic Staff</option>
                                            <option value="Support Staff"> Support Staff</option>
                                        </select>
                                    @else
                                        <select id="selectNumber" class="form-control" name="position">
                                            <option value="">-- select position --</option>
                                            <option value="Academic Staff"> Academic Staff</option>
                                            <option value="Support Staff"> Support Staff</option>
                                        </select>

                                    @endif

                                    @if ($errors->has('position'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('position') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label>E-mail Address</label>
                                    <input type="email" class="form-control" placeholder="e-mail" name="email">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                @if($user->position=='Contracts Officer')

                                    <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}">
                                        <label>School</label>
                                        <select id="ddl" onchange="dropdowns(this,document.getElementById('ddl2'))"
                                                class="form-control" name="school">
                                            <option value="">-- select school --</option>
                                            <option value="Agriculture"> Agriculture</option>
                                            <option value="Education"> Education</option>
                                            <option value="Engineering"> Engineering</option>
                                            <option value="Humanities"> Humanities & Social Sciences</option>
                                            <option value="Law"> Law</option>
                                            <option value="Medicine"> Medicine</option>
                                            <option value="Mines"> Mines</option>
                                            <option value="NS"> Natural Sciences</option>
                                            <option value="Veterinary Medicine"> Veterinary Medicine</option>
                                        </select>

                                        @if ($errors->has('school'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('school') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                @else
                                    <input class="form-control" type="hidden" value="{{$user->school}}" name="school">

                                @endif


                                @if($user->position=='Contracts Officer')
                                    <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">

                                        <label>Department</label>

                                        <select id="ddl2" class="form-control" name="department">

                                        </select>


                                            <span class="help-block">
                                                @if ($errors->has('department'))
                                                    <strong>{{ $errors->first('department') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                @elseif($user->position=='Dean of School')

                                    <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">

                                        <label>Department</label>

                                        @if($user->school=='NS')
                                            <select id="ddl2" class="form-control" name="department">
                                                <option value="">-- select department --</option>
                                                <option value="Biological Sciences">Biological Sciences</option>
                                                <option value="Computer Science">Computer Science</option>
                                                <option value="Chemistry">Chemistry</option>
                                                <option value="Geography">Geography</option>
                                                <option value="Mathematics & Statistics">Mathematics & Statistics</option>
                                                <option value="Physics">Physics</option>
                                            </select>
                                                @elseif($user->school=='Humanities')
                                                <select id="ddl2" class="form-control" name="department">                                                    <option value="">-- select Department --</option>
                                                    <option value="">-- select department --</option>
                                                    <option value="Development Studies">Development Studies</option>
                                                    <option value="Economics">Economics</option>
                                                    <option value="History">History</option>
                                                    <option value="Political & Administrative Studies">Political & Administrative Studies</option>
                                                    <option value="Population Studies">Population Studies</option>
                                                    <option value="Psychology">Psychology</option>
                                                    <option value="Philosophy & Applied Ethics">Philosophy & Applied Ethics</option>
                                                    <option value="Mass Communication">Mass Communication</option>
                                                    <option value="Literature & Language">Literature & Language</option>
                                                    <option value="Gender Studies">Gender Studies</option>
                                                    <option value="Social Development Studies">Social Development Studies</option>
                                                </select>
                                                @elseif($user->school=='Education')
                                                    <option value="">-- select department --</option>
                                                    <option value="Adult Education & Extension Studies">Adult Education & Extension Studies</option>
                                                    <option value="Advisory Units for Colleges of Education">Advisory Units for Colleges of Education</option>
                                                    <option value="Education Administration & Policy Studies">Education Administration & Policy Studies</option>
                                                    <option value="Educational Psychology, Socialogy & Special Education">Educational Psychology, Socialogy & Special Education</option>
                                                    <option value="Library Information Studies">Library Information Studies</option>
                                                    <option value="Language & Social Sciences">Language & Social Sciences</option>
                                                    <option value="Mathematics & Science Education">Mathematics & Science Education</option>
                                                    <option value="Primary Education">Primary Education</option>
                                                    <option value="Religious Studies">Religious Studies</option>

                                                @elseif($user->school=='Engineering')
                                                <select id="ddl2" class="form-control" name="department">
                                                    <option value="">-- select department --</option>
                                                    <option value="Agricutural Engineering">Agricutural Engineering</option>
                                                    <option value="Civil & Enviromental Engineering">Civil & Enviromental Engineering</option>
                                                    <option value="Electrical & Electronic Engineering">Electrical & Electronic Engineering</option>
                                                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                                                    <option value="Geomatic Engineering">Geomatic Engineering</option>
                                                </select>
                                                @elseif($user->school=='Law')
                                                <select id="ddl2" class="form-control" name="department">
                                                    <option value="">-- select department --</option>
                                                    <option value="Public Law">Public Law</option>
                                                    <option value="Private Law">Private Law</option>
                                                </select>
                                                @elseif($user->school=='Agriculture')
                                                <select id="ddl2" class="form-control" name="department">
                                                    <option value="">-- select department --</option>
                                                    <option value="Agriculture Economics">Agriculture Economics</option>
                                                    <option value="Animal Science">Animal Science</option>
                                                    <option value="Food Science & Nutrition">Food Science & Nutrition</option>
                                                    <option value="Plant Science">Plant Science</option>
                                                    <option value="Soil Science">Soil Science</option>
                                                </select>
                                                @elseif($user->school=='Mines')
                                                <select id="ddl2" class="form-control" name="department">
                                                    <option value="">-- select department --</option>
                                                    <option value="Geology">Geology</option>
                                                    <option value="Mines Engineering">Mines Engineering</option>
                                                    <option value="Metarllugy & Material Processing">Metarllugy & Material Processing</option>
                                                    <option value="Specialized Units">Specialized Units</option>
                                                </select>
                                                @elseif($user->school=='Veterinary Medicine')
                                                <select id="ddl2" class="form-control" name="department">
                                                    <option value="">-- select school --</option>
                                                    <option value=" Biomedical Studies"> Biomedical Studies</option>
                                                    <option value="Clinical Studies">Clinical Studies</option>
                                                    <option value="Disease Control">Disease Control</option>
                                                    <option value="Para-Clinical Studies">Para-Clinical Studies</option>
                                                    <option value="Central Services & Supply">Central Services & Supply</option>
                                                </select>
                                                @elseif($user->school=='Medicine')
                                                <select id="ddl2" class="form-control" name="department">
                                                    <option value="">-- select department --</option>
                                                    <option value="Anatomy">Anatomy</option>
                                                    <option value="Biomedical Scinces">Biomedical Scinces</option>
                                                    <option value="Physiological Sciences">Physiological Sciences</option>
                                                    <option value="Nursing Sciences">Nursing Sciences</option>
                                                    <option value="Medical Education Development">Medical Education Development</option>
                                                    <option value="Obstetrics & Gynaecology">Obstetrics & Gynaecology</option>
                                                    <option value="Paediatrics & Child Health">Paediatrics & Child Health</option>
                                                    <option value="Pathology & Microbiology">Pathology & Microbiology</option>
                                                    <option value="Pharmacy">Pharmacy</option>
                                                    <option value="Physiotherapy">Physiotherapy</option>
                                                    <option value="Psychiatry">Psychiatry</option>
                                                    <option value="Public Health">Public Health</option>
                                                    <option value="Surgery">Surgery</option>
                                                    <option value="Internal Medicine">Internal Medicine</option>
                                                </select>
                                        @endif


                                            <span class="help-block">
                                                @if ($errors->has('department'))
                                                    <strong>{{ $errors->first('department') }}</strong>
                                            </span>
                                        @endif

                                    </div>

                                @else
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" value="{{$user->department}}"
                                               name="department">
                                    </div>
                                @endif

                                <div class="form-group">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                    </div>
                                </div>

                            </form>
                        </div>

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