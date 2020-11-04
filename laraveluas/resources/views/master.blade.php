<!doctype html>
<html lang="en">

<head>
    <title>Pendaftaran UKM </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/demo.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-ui.theme.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery.timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/dropzone.css')}} ">

    <link rel=" icon" href="{{ URL::asset('assets/img/polinema.png') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <style>
        .act-btn {
            background: green;
            display: block;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            color: white;
            font-size: 30px;
            font-weight: bold;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            text-decoration: none;
            transition: ease all 0.3s;
            position: fixed;
            right: 30px;
            bottom: 30px;
            z-index: 100;
        }

        .act-btn:hover {
            background: blue
        }
    </style>
</head>

<body>


    <!-- WRAPPER -->
<div id="wrapper">
	<!-- NAVBAR -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="brand">
			<img src="{{ URL::asset('assets/img/polinema.png') }}"style="width:2rem; margin-right:1rem"><a href="#"><b>Pendaftaran Unit Kegiatan Mahasiswa </b></a>
		</div>
		<div class="container-fluid">
			<div class="navbar-btn">
				<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
			</div>

			<div id="navbar-menu">
				<ul class="nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                    </form>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- LEFT SIDEBAR -->
	<div id="sidebar-nav" class="sidebar">
		<div class="sidebar-scroll">
			<nav>
				<ul class="nav">
					@if (Auth::user()->role == 0) 
                        <li><a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i> <span>Dashboard</span></a></li>
                        <li><a href="{{ route('dataMhs') }}"><i class="fa fa-users fa-lg"></i> <span>Data Mahasiiswa</span></a></li>
                        <li><a href="{{ route('datauser') }}"><i class="fa fa-user fa-lg"></i> <span>Data Pengguna</span></a></li>
                        <li><a href="{{ route('dataukm') }}"><i class="fa fa-tags fa-lg"></i><span>Data UKM</span></a></li>
					@else
						<li><a href="{{ route('register') }}"><i class="fa fa-list fa-lg"></i><span>Registrasi UKM</span></a></li>
						<li><a href="{{ route('dataukmuser')}}"><i class="fa fa-image fa-lg"></i><span>Galeri UKM</span></a></li>
					@endif
				</ul>
			</nav>
		</div>
	</div>
    <!-- END LEFT SIDEBAR -->
    
    @yield('content')

    <div class="clearfix"></div>
    <footer>

    </footer>
    </div>
    <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js')  }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/klorofil-common.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>
    <script src="{{ URL::asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dropzone.js') }}"></script>
    <script type="text/javascript">

        