<!doctype html>
<html lang="en">
<head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--  Fonts and icons  -->
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <!-- Black Dashboard CSS -->
    <link href="/../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <link href="/../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/../assets/css/nucleo-icons.css" rel="stylesheet" />
</head>
<body class="white-content">
<div class="wrapper ">

    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " data-color="blue">
            <div class="container-fluid">
                <div class="navbar-wrapper">

                    <a class="navbar-brand" href="#pablo">sdfsdfds</a>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#pablo">
                                <i class="tim-icons icon-bell-55"></i>  Notifications
                            </a>
                        </li>
                        <!-- your navbar here -->
                    </ul>
                </div>
            </div>
        </nav>
        <div class="sidebar" data-color="blue" data-background-color="white">
            <!--
              Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

              Tip 2: you can also add an image using data-image tag
          -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                    CT
                </a>

                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    Creative Tim
                </a>
            </div>

            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="tim-icons icon-chart-pie-36"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/idiomas" id="idiomaslink">
                            <i class="tim-icons icon-caps-small"></i>
                            <p>Idiomas</p>
                        </a>
                    </li>

                    <!-- your sidebar here -->
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <!-- your content here -->
                @yield('contenido')
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="/../assets/js/core/jquery.min.js" type="text/javascript">

</script>
<script type="text/javascript">
    {{--$(function(){--}}
        {{--$.ajaxSetup({--}}
            {{--headers: {--}}
                {{--'Content-Type': 'application/json',--}}
                {{--'Accept': 'application/json',--}}
                {{--'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
            {{--}--}}
        {{--});--}}
    {{--});--}}
</script>
<script src="/../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="/../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="/../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
{{--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>--}}
<!-- Chartist JS -->
<script src="/../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/../assets/js/black-dashboard.js?v=1.0.0" type="text/javascript"></script>
<script src="/../assets/js/core/customjs.js" type="text/javascript"></script>

@yield('custom_js')
</body>
</html>