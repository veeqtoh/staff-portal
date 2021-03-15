<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
		<meta name="robots" content="noindex, nofollow">
		<meta name="csrf-token" content="{{csrf_token()}}">	

        @yield('title')
	
		<!-- Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href=" {{asset('img/favicons/apple-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{asset('img/favicons/apple-icon-60x60.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/favicons/apple-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/favicons/apple-icon-76x76.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/favicons/apple-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/favicons/apple-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset('img/favicons/apple-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/favicons/apple-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicons/apple-icon-180x180.png')}}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('img/favicons/android-icon-192x192.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicons/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/favicons/favicon-96x96.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicons/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('img/favicons/manifest.json')}}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{asset('img/favicons/ms-icon-144x144.png')}}">
        <meta name="theme-color" content="#ffffff">		

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{{asset('css/line-awesome.min.css')}}">
		<!-- Chart CSS -->
		<link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">

		@yield('style')
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    </head>

    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<!-- Header -->
            <div class="header">
				<!-- Logo -->
                <div class="header-left">
                    <a href="{{route('hr.home')}}" class="logo">
						<img src="{{asset('img/logo.png')}}" width="40" height="40" alt="">
					</a>
                </div>
				<!-- /Logo -->
				<a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>

				<!-- Header Title -->
                <div class="page-title-box">
					<h3>N.U.E Offshore Staff Portal</h3>
                </div>
				<!-- /Header Title -->			
				<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
				<!-- Header Menu -->
				<ul class="nav user-menu">
					<!-- Search 
					<li class="nav-item">
						<div class="top-nav-search">
							<a href="javascript:void(0);" class="responsive-search">
								<i class="fa fa-search"></i>
						   </a>
							<form action="search">
								<input class="form-control" type="text" placeholder="Search here">
								<button class="btn" type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</li>
					<!-- /Search -->							
					<!-- Notifications -->
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i> <span class="badge badge-pill">{{sizeof($notification ?? '')}}</span>
                        </a>
                        <div class="dropdown-menu notifications">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Notifications</span>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    @foreach($notification ?? '' as $row)
                                    <li class="notification-message">
                                        @if($row->type == 'Requisition')
                                        <a href="{{route('req_status',$row->mid)}}">
                                            <div class="media">
                                                <span class="avatar">
                                                    <img src="{{asset('img\profiles\avatar-02.jpg')}}">
                                                </span>
                                                <div class="media-body">
                                                    <p class="noti-details">You have a {{$row->message}} from
                                                        <span class="noti-title">
                                                    {{App\User::where('id',$row->sender)->value('f_name')}} {{App\User::where('id',$row->sender)->value('l_name')}}
                                                    </span></p>

                                                    <p class="noti-time"><span class="notification-time">{{$row->created_at->diffForHumans()}}</span></p>
                                                </div>
                                            </div>
                                        </a>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="topnav-dropdown-footer">
                                <a href="#">View all Notifications</a>
                            </div>
                        </div>
                    </li>
                    <!-- /Notifications -->

					<li class="nav-item dropdown has-arrow main-drop">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img src="{{Auth::user()->profile->avatar}}" alt="">
							<span class="status online"></span></span>
							<span>{{Auth::user()->f_name}}</span>
						</a>

						<div class="dropdown-menu">
							<a class="dropdown-item" href="profile.html">My Profile</a>
							<a class="dropdown-item" href="settings.html">Settings</a>
							<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
				</ul>

				<!-- /Header Menu -->
		
				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="{{route('hr.profile')}}">My Profile</a>
						<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
					</div>
				</div>

				<!-- /Mobile Menu -->		

            </div>
			<!-- /Header -->			

			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
						
							<li><a class="@if (Route::current()->getName() == 'hr.home') {{'active'}}@endif" href="{{route('hr.home')}}"><i class="la la-dashboard"></i> <span> Dashboard</span> </a></li>													
							<li><a class="@if (Route::current()->getName() == 'hr.profile') {{'active'}}@endif" href="{{route('hr.profile')}}"><i class="la la-user"></i> <span> My Profile</span> </a></li>
							<li><a class="@if (Route::current()->getName() == 'hr.salary' || Route::current()->getName() == 'hr.mypayslip') {{'active'}}@endif" href="{{route('hr.salary')}}"><i class="la la-money"></i> <span> My Salary </span> </a></li>
							<li class="menu-title"> 
								<span>HR Duties</span>
							</li>
							<li class="submenu"> 
                                <a class="@if (Route::current()->getName() == 'hr.employees'|| Route::current()->getName() == 'hr.employee.profile' || Route::current()->getName() == 'hr.employees.trashed') {{'active'}} @endif" href="#"><i class="la la-user"></i> <span>Employees</span> 
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul style="display: none;">
									<li><a href="{{route('hr.employees')}}" class="noti-dot">All Employees</a></li>
									<li><a href="{{route('hr.employees.trashed')}}">Disabled Accounts</a></li>
								</ul>
							</li>
							<li class="submenu"> 
                                <a href="#"><i class="la la-ticket"></i> <span>Requisition</span> 
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul style="display: none;">
                                <li><a href="{{route('req_new')}}">New</a></li>
                                <li><a href="{{route('req_myrequsitions')}}">My requisitions</a></li>
                                <li><a href="{{route('req_all')}}">All requisitions</a></li>
                                <li><a href="{{route('req_accounts')}}">Accounts</a></li>
                                </ul>
                            </li>
							<li class="submenu">
								<a href="#" class="@if (Route::current()->getName() == 'hr.payroll'|| Route::current()->getName() == 'hr.payroll.details'|| Route::current()->getName() == 'hr.payslip') {{'active'}}@endif"><i class="la la-money"></i> <span> Generate Salaries </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('hr.payroll', ['cat' => '6'] )}}"> Staff Payroll </a></li>
									<li><a href="{{route('hr.payroll', ['cat' => '1'] )}}"> NUE Defender Payroll</a></li>
									<li><a href="{{route('hr.payroll', ['cat' => '2'] )}}"> SVS Guardsman Payroll</a></li>
									<li><a href="{{route('hr.payroll', ['cat' => '3'] )}}"> NUE Defender I Payroll</a></li>
									<li><a href="{{route('hr.payroll', ['cat' => '4'] )}}"> NUE Swift Payroll</a></li>
									<li><a href="{{route('hr.payroll', ['cat' => '5'] )}}"> NUE Strider Payroll</a></li>
									<li><a href="{{route('hr.payroll', ['cat' => '7'] )}}"> NUE Lince Payroll</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-external-link-square"></i> <span> Manage Leave </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
								    <li><a class="" href="#!">Pending Request</a></li>	
                                    <li><a class="" href="#!">Approved Leaves</a></li>	
                                    <li><a class="" href="#!">Declined Leaves</a></li>	
								</ul>
							</li>
							<li><a class="@if (Route::current()->getName() == 'hr.reports' || Route::current()->getName() == 'hr.reports.details') {{'active'}}@endif" href="{{route('hr.reports')}}"><i class="la la-pie-chart"></i> <span>Weekly Reports</span> </a></li>
							<li> 
								<a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="la la-cog"></i> <span>Logout</span></a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			@yield('body')
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <!--<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>-->
		<script src="{{asset('js/choosen.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		
		@yield('js')
		
		<script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
		<!--<script src="{{asset('plugins/morris/morris.min.js')}}"></script>-->
		<script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
		<!--<script src="{{asset('js/chart.js')}}"></script>-->
        <script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>

		<!-- Custom JS -->
		<script src="{{asset('js/app.js')}}"></script>
		
    </body>
    <script>
        @if(Session::has('success'))
                toastr.success('{{ Session::get('success') }}')
        @endif
        @if(Session::has('info'))
                toastr.info('{{ Session::get('info') }}')
        @endif
		@if(Session::has('warning'))
                toastr.warning('{{ Session::get('warning') }}')
        @endif
		@if(Session::has('error'))
                toastr.error('{{ Session::get('error') }}')
        @endif
    </script>
</html>