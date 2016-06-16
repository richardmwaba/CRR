<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('../bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{URL::asset('../bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::asset('../dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::asset('../bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Datatables CSS -->
    <link href="{{URL::asset('../dist/css/bootstrap-table.css')}}" rel="stylesheet">

     <!-- Calendar CSS -->
    <link href="{{URL::asset('../dist/css/calendar/fullcalendar.css')}}" rel="stylesheet">
    <link href="{{URL::asset('../dist/css/calendar/fullcalendar.print.css')}}" rel="stylesheet" media="print">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{URL::asset('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
    <script src="{{URL::asset('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
    <script>$('div.alert').not('.alert_important').(300).slideUp(300)</script>
    <![endif]-->

</head>
<body>

<div id="wrapper">

    @if(session()->has('flash_message'))

            <div class="alert alert-success{{session()->has('flash_message_important')? session('flash_message') : ''}}">
                {{session()->get('flash_message')}}

                @if(session()->has('flash_message_important'))

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    @endif

            </div>

            @endif

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::asset('hod_home.html')}}"><span><img src="{{URL::asset('../img/unza.png')}}" alt="Unza logo" height="35" width="35" style="padding-bottom:5px"></span> Contract Renewal Reminder</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                @if (Auth::guest())
                    <ul class="dropdown-menu dropdown-user">

                        <li><a href="{{url('/register')}}"><i class="fa fa-user fa-fw"></i>Register</a>
                        </li>
                        <li><a href="{{url('/login')}}"><i class="fa fa-user-md fa-fw"></i>Login</a>
                        </li>
                        <li class="divider"></li>

                    </ul>
                @else
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                @endif
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">

                    </li>
                    @if (Auth::guest())

                        <li>
                            <a href="{{URL::asset('/about')}}"><i class="fa fa-files-o fa-fw"></i> About</a>
                        </li>

                    @else
                            @if(Auth()->user()->position=='Dean of School')

                            @elseif(Auth()->user()->position=='Head of Department')

                                <li>
                                <a href="{{URL::asset('home')}}"><i class="fa fa-home fa-fw"></i>Home</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i> Staff<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="{{URL::asset('staff_view')}}">Staff View</a>
                                            <a href="{{URL::asset('add_new')}}"> Add New Staff</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-second-level -->
                                </li>

                            @elseif(Auth()->user()->position=='Contracts Officer')

                                <li>
                                    <a href="{{URL::asset('home')}}"><i class="fa fa-home fa-fw"></i>Home</a>
                                </li>

                            @else

                                <!--future menus for other users can be included here-->

                            @endif

                            <li>
                                <a href="{{URL::asset('contract_info')}}"><i class="fa fa-info fa-fw"></i>My Contract Information</a>
                            </li>

                            <li>
                                <a href="{{URL::asset('calendar')}}"><i class="fa fa-calendar fa-fw"></i> Calendar</a>
                            </li>
                            <li class="divider" role="presentation"> </li>
                            <li class="divider" role="presentation"> </li>
                            <li>
                                <a href="{{URL::asset('help')}}"><i class="fa fa-question fa-fw"></i> Help</a>
                            </li>
                            <li>
                                <a href="{{URL::asset('/about')}}"><i class="fa fa-files-o fa-fw"></i> About</a>
                            </li>

                    @endif

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    @section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- content injected here -->
    </div>
        <!-- /#page-wrapper -->
        @show


</div>
<!-- /#wrapper -->

<!-- Footer -->
<footer class="footer footer-fixed-bottom">
      <div class="container" style="text-align:center">
        <p class="text-muted"> <span class="glyphicon glyphicon-copyright-mark"></span> - 2016 The University of Zambia <br> All rights reserved.</p>
      </div>
</footer>
<!-- ./footer -->
 @section('scripts')


<!-- jQuery -->
<script src="{{URL::asset('../bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{URL::asset('../bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{URL::asset('../bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{URL::asset('../dist/js/sb-admin-2.js')}}"></script>

<!-- Datatables JavaScript -->
<script src="{{URL::asset('../dist/js/bootstrap-table.js')}}"></script>

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

<!-- Calendar JavaScript -->
<script src="{{URL::asset('../dist/js/calendar/moment.min.js')}}"></script>
<script src="../dist/js/calendar/fullcalendar.min.js"></script>
<script src="../dist/js/calendar/pace.min.js"></script>

<!-- Custom Calendar JavaScript -->
<script>
    $(window).load(function() {

      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();
      var started;
      var categoryClass;

      var calendar = $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
          $('#fc_create').click();

          started = start;
          ended = end

          $(".antosubmit").on("click", function() {
            var title = $("#title").val();
            if (end) {
              ended = end
            }
            categoryClass = $("#event_type").val();

            if (title) {
              calendar.fullCalendar('renderEvent', {
                  title: title,
                  start: started,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            $('#title').val('');
            calendar.fullCalendar('unselect');

            $('.antoclose').click();

            return false;
          });
        },
        eventClick: function(calEvent, jsEvent, view) {
          //alert(calEvent.title, jsEvent, view);

          $('#fc_edit').click();
          $('#title2').val(calEvent.title);
          categoryClass = $("#event_type").val();

          $(".antosubmit2").on("click", function() {
            calEvent.title = $("#title2").val();

            calendar.fullCalendar('updateEvent', calEvent);
            $('.antoclose2').click();
          });
          calendar.fullCalendar('unselect');
        },
        editable: true,
        events: [

        ]
      });
     });
</script>

</body>

</html>
