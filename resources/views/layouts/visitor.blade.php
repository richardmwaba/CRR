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
    <link href="{{URL::asset('../bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
          type="text/css">

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
    <script src="{{URL::asset('../dist/js/jquery-3.1.0 .js')}}"></script>
    <script>$('div.alert').not('.alert_important').(300).slideUp(300)</script>
    <![endif]-->

</head>
<body>
    <div class="">

        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('/login')}}"><span><img
                                    src="{{URL::asset('../img/unza.png')}}" alt="Unza logo" height="35" width="35"
                                    style="padding-bottom:5px"></span> Contract Renewal Reminder</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <!--<li class="dropdown">
                        <a class="dropdown-toggle"  title="Login" href="">
                            <i class="fa fa-user fa-fw"></i>
                        </a>-->
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle"  title="About" href="{{url('/About')}}">
                            About
                        </a>
                    </li>

                </ul>
            </nav>

            @section('content')
            <div class="row">

            </div>

            @show

        </div>

        <!-- Footer -->
        <footer class="footer footer-fixed-bottom">
            <div class="container" style="text-align:center">
                <p class="text-muted"><span class="glyphicon glyphicon-copyright-mark"></span> - 2016 The University of Zambia
                    <br> All rights reserved.</p>
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

        <!-- Custom JavaScript -->
        <script src="{{URL::asset('../dist/js/custom.js')}}"></script>

        <!-- Calendar JavaScript -->
        <script src="{{URL::asset('../dist/js/calendar/moment.min.js')}}"></script>
        <script src="{{URL::asset('../dist/js/calendar/fullcalendar.min.js')}}"></script>
        <script src="{{URL::asset('../dist/js/calendar/pace.min.js')}}"></script>

        <!-- IMage cropping-->
        <script src="{{URL::asset('../dist/js/cropping/cropper.min.js')}}"></script>
        <script src="{{URL::asset('../dist/js/cropping/main.js')}}"></script>

    </div>

</body>

</html>