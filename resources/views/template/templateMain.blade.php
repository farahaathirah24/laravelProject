
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Laravel Project</title>

	<!-- Global stylesheets -->
	<link href="{{asset('assets/fonts/inter/inter.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/icons/material/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/icons/phosphor/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/ltr/all.min.css')}}" id="stylesheet" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/app.css')}}" id="stylesheet" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('assets/js/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/vendor/notifications/noty.min.js')}}"></script>
	
	<!-- <script src="{{asset('assets/js/vendor/pickers/datepicker.min.js')}}"></script> -->
	<script src="{{asset('assets/js/app.js')}}"></script>
	<!-- <script src="{{asset('assets/demo/pages/picker_date.js')}}"></script> -->

	<!-- /theme JS files -->

</head>

<body>

	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		@include('template.templateNav')
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">
		@auth
			<!-- Main navbar -->
			<div class="navbar navbar-dark navbar-expand-lg navbar-static shadow shadow-lg my-2 rounded-3 mb-0 bg-theme" style="width: calc(100% - (1.325rem * 2));margin:auto">
				<div class="container-fluid">
					<div class="d-flex d-lg-none">
						<button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded">
							<i class="ph-list"></i>
						</button>
					</div>

					<ul class="nav gap-sm-2 order-1 order-lg-2 ms-auto">
						<li class="nav-item nav-item-dropdown-lg dropdown">
							<a href="#" class="navbar-nav-link align-items-center rounded p-1" data-bs-toggle="dropdown" aria-expanded="false">
								<div class="status-indicator-container">
									<img src="{{asset('assets/images/demo/users/face11.jpg')}}" class="w-32px h-32px rounded" alt="">
									<span class="status-indicator bg-success"></span>
								</div>
								<span class="d-none d-lg-inline-block mx-lg-2">{{ Auth::user()->name }}</span>
							</a>

							<div class="dropdown-menu dropdown-menu-end">
							    <a href="{{ route('profile') }}" class="dropdown-item">User Profile</a>
						     	<a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
			@endauth
			<!-- /main navbar -->


			<!-- Inner content -->
			<div class="content-inner">

				<!-- Page header -->
				{{-- <div class="page-header">
					<div class="page-header-content d-lg-flex">
						<div class="d-flex">
							<h4 class="page-title mb-0">
								Seed - <span class="fw-normal">Fixed Footer</span>
							</h4>
						</div>
					</div>
				</div> --}}
				<!-- /page header -->


				<!-- Content area -->
				<div class="content pt-3 mt-3">
					<div id="noty-msg" data-session-value="{{ (null !== session('noty-msg')) ? session('noty-msg') : '' }}"></div>
					<div id="noty-type" data-session-value="{{ (null !== session('noty-type')) ? session('noty-type') : 'info' }}"></div>

                    @yield('content')
                </div>
				<!-- /content area -->

			</div>
			<!-- /inner content -->


			<!-- Footer -->
			@include('template.templateFooter')
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>

<script>
	// noty-alert
	Noty.overrideDefaults({
            theme: 'limitless',
            layout: 'topRight',
            type: 'alert',
            timeout: 2500
        });

	$(document).ready(function() {
		const noty_msg = $('#noty-msg').data('session-value');
		const noty_type = $('#noty-type').data('session-value');
		if (noty_msg != '') {
			new Noty({
                    text: noty_msg,
                    type: noty_type
                }).show();
		}
		// noty-alert
	});
</script>