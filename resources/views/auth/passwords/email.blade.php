<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Forgot Password - N.U.E Offshore Staff Portal</title>
		
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
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<div class="account-content">
				
				<div class="container">
				
					<!-- Account Logo -->
					<div class="account-logo">
					<a href="#!"><img src="{{asset('img/logo.png')}}" alt="N.U.E Offshore Staff Portal"></a>
					</div>
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Forgot Password?</h3>
							<p class="account-subtitle">Enter your email to get a password reset link</p>

							@if (session('status'))
								<div class="alert alert-success" role="alert">
									{{ session('status') }}
								</div>
							@endif
							
							<!-- Account Form -->
							<form method="POST" action="{{ route('password.email') }}">
								@csrf

								<div class="form-group">
									<label>Email Address</label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">Send Password Reset Link</button>
								</div>
								<div class="account-footer">
									<p>Remember your password? <a href="{{route('login')}}">Login</a></p>
								</div>
							</form>
							<!-- /Account Form -->
							
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{asset('js\jquery-3.2.1.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('js\popper.min.js')}}"></script>
        <script src="{{asset('js\bootstrap.min.js')}}"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('js\app.js')}}"></script>
		
    </body>
</html>