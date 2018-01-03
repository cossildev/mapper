<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Process Mapper | Admin</title>

	<link href="{{ asset("admin/css/bootstrap.min.css ") }}" rel="stylesheet">
	<link href="{{ asset("css/font-awesome.css ") }}" rel="stylesheet">
	<link href="{{ asset("admin/css/plugins/toastr/toastr.min.css ") }}" rel="stylesheet">
	<link href="{{ asset("admin/css/animate.css ") }}" rel="stylesheet">
	<link href="{{ asset("admin/css/style.css ") }}" rel="stylesheet">
	<link href="{{ asset("admin/css/TimeCircles.css") }}" rel="stylesheet">

	@stack('stylesheets')

</head>

<body class="pace-done skin-1">
	<div id="wrapper">

		@include('layouts.sidebar')

		<div id="page-wrapper" class="gray-bg dashbard-1">
			<div class="row border-bottom">
				<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
					<div class="navbar-header">
						<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
							<i class="fa fa-bars"></i>
						</a>
						<form role="search" class="navbar-form-custom" method="get" action="#">
							<div class="form-group">
								<input type="text" placeholder="Pesquise por algo..." class="form-control" name="top-search" id="top-search">
							</div>
						</form>
					</div>
					<ul class="nav navbar-top-links navbar-right">
						<!--<li class="dropdown">
							<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
								<i class="fa fa-bell"></i>
								<span class="label label-primary">8</span>
							</a>
							<ul class="dropdown-menu dropdown-alerts">
								<li>
									<a href="mailbox.html">
										<div>
											<i class="fa fa-envelope fa-fw"></i> You have 16 messages
											<span class="pull-right text-muted small">4 minutes ago</span>
										</div>
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="profile.html">
										<div>
											<i class="fa fa-twitter fa-fw"></i> 3 New Followers
											<span class="pull-right text-muted small">12 minutes ago</span>
										</div>
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="grid_options.html">
										<div>
											<i class="fa fa-upload fa-fw"></i> Server Rebooted
											<span class="pull-right text-muted small">4 minutes ago</span>
										</div>
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<div class="text-center link-block">
										<a href="notifications.html">
											<strong>See All Alerts</strong>
											<i class="fa fa-angle-right"></i>
										</a>
									</div>
								</li>
							</ul>
						</li>-->
						<li>
							<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<div>
									<i class="fa fa-sign-out"></i> Sair
								</div>
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
						</li>

					</ul>
				</nav>
			</div>

			@yield('content')

		</div>

	</div>

	<script src="{{asset('admin/js/jquery-2.1.1.js')}}"></script>
	<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
	<script src="{{asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

	<script src="{{asset('admin/js/plugins/flot/jquery.flot.js')}}"></script>
	<script src="{{asset('admin/js/plugins/flot/jquery.flot.tooltip.min.j')}}s"></script>
	<script src="{{asset('admin/js/plugins/flot/jquery.flot.spline.js')}}"></script>
	<script src="{{asset('admin/js/plugins/flot/jquery.flot.resize.js')}}"></script>
	<script src="{{asset('admin/js/plugins/flot/jquery.flot.pie.js')}}"></script>

	<script src="{{asset('admin/js/plugins/peity/jquery.peity.min.js')}}"></script>
	<script src="{{asset('admin/js/inspinia.js')}}"></script>
	<script src="{{asset('admin/js/plugins/pace/pace.min.js')}}"></script>

	<script src="{{asset('admin/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{asset('admin/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('admin/js/plugins/chartJs/Chart.min.js')}}"></script>
	<script src="{{asset('admin/js/plugins/toastr/toastr.min.js')}}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touch/1.1.0/jquery.touch.min.js"></script>

	<script src="{{asset('admin/js/TimeCircles.js')}}"></script>

	<script>

		$(document).ready(function() {

			/** add active class and stay opened when selected */
			var url = window.location;

			// for sidebar menu entirely but not cover treeview
			$('ul#side-menu a').filter(function() {
			 return this.href == url;
			}).parent().addClass('active');

			// for treeview
			/*$('ul.treeview-menu a').filter(function() {
			 return this.href == url;
			}).parentsUntil(".side-menu > .treeview-menu").addClass('active');
*/

		});

	</script>

	@yield('scripts')

</body>

</html>
