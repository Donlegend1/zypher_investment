<!DOCTYPE html>
<html class="no-js" lang="zxx">

	<head>

		<!--=========================*
																Met Data
				*===========================-->
		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Zypher Asserts Admin">

		<!--=========================*
														Page Title
				*===========================-->
		<title>Zypher Asserts Admin</title>

		<!--=========================*
																Favicon
				*===========================-->
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

		<!--=========================*
												Bootstrap Css
				*===========================-->
		<link rel="stylesheet" href="/dashboard/admin/css/bootstrap.min.css">

		<!--=========================*
														Custom CSS
				*===========================-->
		<link rel="stylesheet" href="/dashboard/admin/css/style.css">

		<!--=========================*
															Owl CSS
				*===========================-->
		<link href="/dashboard/admin/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
		<link href="/dashboard/admin/css/owl.theme.default.min.css" rel="stylesheet" type="text/css">

		<!--=========================*
												Font Awesome
				*===========================-->

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
			integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />

		<!--=========================*
													Themify Icons
				*===========================-->
		<link rel="stylesheet" href="/dashboard/admin/css/themify-icons.css">

		<!--=========================*
															Ionicons
				*===========================-->
		<link href="/dashboard/admin/css/ionicons.min.css" rel="stylesheet" />

		<!--=========================*
														EtLine Icons
				*===========================-->
		<link href="/dashboard/admin/css/et-line.css" rel="stylesheet" />

		<!--=========================*
														Feather Icons
				*===========================-->
		<link href="/dashboard/admin/css/feather.css" rel="stylesheet" />

		<!--=========================*
														Flag Icons
				*===========================-->
		<link href="/dashboard/admin/css/flag-icon.min.css" rel="stylesheet" />

		<!--=========================*
														Modernizer
				*===========================-->
		<script src="/dashboard/admin/js/modernizr-2.8.3.min.js"></script>

		<!--=========================*
															Metis Menu
				*===========================-->
		<link rel="stylesheet" href="/dashboard/admin/css/metisMenu.css">

		<!--=========================*
															Slick Menu
				*===========================-->
		<link rel="stylesheet" href="/dashboard/admin/css/slicknav.min.css">

		<!--=========================*
															AM Chart
				*===========================-->
		<link rel="stylesheet" href="/dashboard/admin/vendors/am-charts/css/am-charts.css" type="text/css" media="all" />

		<!--=========================*
															Morris Css
				*===========================-->
		<link rel="stylesheet" href="/dashboard/admin/vendors/charts/morris-bundle/morris.css">

		<!--=========================*
												Google Fonts
				*===========================-->

		<!-- Montserrat USE: font-family: 'Montserrat', sans-serif;-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	</head>

	<body>

		<!--=========================*
									Page Container
*===========================-->
		<div class="page-container">

			<!--=========================*
													Side Bar Menu
				*===========================-->
			<div class="sidebar-menu">
				<div class="sidebar-header">
					<!--=========================*
																										Logo
												*===========================-->
					<div class="logo">
						<a href="/home" class="text-white">Admin Panel</a>
					</div>
					<!--=========================*
																								End Logo
												*===========================-->
				</div>
				<!--=========================*
																			Main Menu
								*===========================-->
				<div class="main-menu">
					<div class="menu-inner" id="sidebar_menu">
						<nav>
							<ul class="metismenu" id="menu">
								<li class="active">
									<a href="/home">
										<i class="fas fa-home"></i>
										<span>Dashboard</span>
									</a>
								</li>

								<li class="dropdown">
									<a href="javascript:void(0)" aria-expanded="true">
										<i class="fas fa-user"></i>
										<span>User</span>
									</a>
									<ul class="collapse">
										<li><a href="/user-list"><i class="fas fa-user"></i> <span>Users
													List</span></a>
										</li>
										<li><a href="/admin-list"><i class="fas fa-user"></i> <span>
													Admin</span></a>
										</li>

										<!-- <li><a href="toastr.html"><i class="fas fa-user"></i> <span> Suspended Users
																																		</span></a>
																										</li> -->

									</ul>
								</li>

								<li>
									<a href="javascript:void(0)" aria-expanded="true">
										<i class="fas fa-chart-line"></i>
										<span>Referrals</span>
									</a>
									<ul class="collapse">
										<li><a href="/referral-list"><i class="fas fa-money-check-alt"></i> <span>
													Referrals List</span></a>
										</li>

									</ul>

								</li>
								<li>
									<a href="javascript:void(0)" aria-expanded="true">
										<i class="fas fa-money-check-alt"></i>
										<span>Deposits</span>
									</a>
									<ul class="collapse">
										<li><a href="/deposit-list"><i class="fas fa-money-check-alt"></i> <span>
													Deposit List</span></a>
										</li>

									</ul>
								</li>
								<li>
									<a href="javascript:void(0)" aria-expanded="true">
										<i class="fas fa-money-check-alt"></i>
										<span>Withdrawals</span>
									</a>
									<ul class="collapse">
										<li><a href="/withdrawal-list"><i class="fas fa-money-check-alt"></i> <span>All
													Withdrawals</span></a>
										</li>

									</ul>
								</li>
								<li>
									<a href="javascript:void(0)" aria-expanded="true">
										<i class="fas fa-money-check-alt"></i>
										<span>Investment Plans</span>
									</a>
									<ul class="collapse">
										<li><a href="/investment-plans/list"><i class="fas fa-money-check-alt"></i>
												<span>Investment
													List
													Plans</span></a>
										</li>

									</ul>
								</li>
								<li>
									<a href="javascript:void(0)" aria-expanded="true">
										<i class="fas fa-message"></i>
										<span>Mail</span>
									</a>
									<ul class="collapse">
										<li><a href="/send-mail"><i class="fas fa-message"></i>
												<span>Send Mail</span></a>
										</li>
										<li><a href="/sent-mails"><i class="fas fa-mail"></i>
												<span>Mail List</span></a>
										</li>

									</ul>
								</li>
								<li>
									<a href="javascript:void(0)" aria-expanded="true">
										<i class="fas fa-cogs"></i>
										<span>Settings</span>
									</a>
									<ul class="collapse">
										<li><a href="/profile"><i class="fas fa-user"></i>
												<span>Profile</span></a>
										</li>
										<li>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												@csrf
											</form>
											<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
												<i class="fas fa-sign-out-alt"></i> Logout
											</a>
										</li>

									</ul>
								</li>

						</nav>
					</div>
				</div>
				<!--=========================*
																		End Main Menu
								*===========================-->
			</div>
			<!--=========================*
											End Side Bar Menu
				*===========================-->

			<!--==================================*
															Main Content Section
				*====================================-->
			<div class="main-content page-content">

				<!--==================================*
																			Header Section
								*====================================-->
				<div class="header-area pt-3">
					<div class="row align-items-center">

						<!--==================================*
																									Navigation and Search
																*====================================-->
						<div class="col-md-6 d_none_sm d-flex align-items-center">
							<div class="mobile-logo d_none_lg">
								<a href="admindashboard.php">Admin Panel</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<ul class="notification-area pull-right">
								<li>
									<span class="nav-btn pull-left d_none_lg">
										<span></span>
										<span></span>
										<span></span>
									</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!--==================================*
																			End Header Section
								*====================================-->

				<!--==================================*
																			Main Section
								*====================================-->
				@if (session('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
				@endif

				@if (session('error'))
					<div class="alert alert-danger">
						{{ session('error') }}
					</div>
				@endif

				@if (session('message'))
					<div class="alert alert-info">
						{{ session('message') }}
					</div>
				@endif

				<div class="main-content-inner">
					<div class="col-md-12 rt_subheader">
						<div class="rt_subheader_main">
							<h3 class="rt_subheader_title mb-mob-2"> Hello {{ Auth::user()->full_name }}!
							</h3>
							<div class="rt_breadcrumb mb-mob-2">
								<a href="#" class="rt_breadcrumb_home_icon"><i class="feather ft-home"></i></a>
								<span class="rt_breadcrumb_separator"><i class="fa fa-chevrons-right"></i></span>
								<a href="" class="breadcrumb_link"> Home </a>
								<span class="rt_breadcrumb_separator"><i class="feather ft-chevrons-right"></i></span>
								<a href="" class="breadcrumb_link"> Main Dashboard </a>
							</div>
						</div>
						<div class="subheader_btns">
							<a href="#" class="btn btn-sm btn-primary btn-inverse-primary"><i class="feather ft-edit mr-0"></i></a>
							<a href="#" class="btn btn-sm btn-primary btn-inverse-primary"><i class="feather ft-watch mr-0"></i></a>
							<a href="#" class="btn btn-sm btn-primary btn-inverse-primary">
								<span>Today:</span>&nbsp;
								<span><?php echo date('F j'); ?></span>
								<i class="feather ft-calendar ml-2"></i>
							</a>
						</div>
					</div>

					@yield('content')
					<footer>
						<div class="footer-area">
							<!-- <p>&copy; Copyright 2019. All right reserved. Template by Raventhemez.</p> -->
						</div>
					</footer>
					<!--=================================*
																End Footer Section
				*===================================-->

			</div>

				<!--=========================*
												Scripts
*===========================-->

				<!--=========================*
												Scripts
*===========================-->

				<!-- Jquery Js -->
				<script src="/dashboard/admin/js/jquery.min.js"></script>
				<!-- bootstrap 4 js -->
				<script src="/dashboard/admin/js/popper.min.js"></script>
				<script src="/dashboard/admin/js/bootstrap.min.js"></script>
				<!-- Owl Carousel Js -->
				<script src="/dashboard/admin/js/owl.carousel.min.js"></script>
				<!-- Metis Menu Js -->
				<script src="/dashboard/admin/js/metisMenu.min.js"></script>
				<!-- SlimScroll Js -->
				<script src="/dashboard/admin/js/jquery.slimscroll.min.js"></script>
				<!-- Slick Nav -->
				<script src="/dashboard/admin/js/jquery.slicknav.min.js"></script>
				<!-- start amchart js -->
				<script src="/dashboard/admin/vendors/am-charts/js/ammap.js"></script>
				<script src="/dashboard/admin/vendors/am-charts/js/worldLow.js"></script>
				<script src="/dashboard/admin/vendors/am-charts/js/continentsLow.js"></script>
				<script src="/dashboard/admin/vendors/am-charts/js/light.js"></script>
				<!-- maps js -->
				<script src="/dashboard/admin/js/am-maps.js"></script>

				<!--Morris Chart-->
				<script src="/dashboard/admin/vendors/charts/morris-bundle/raphael.min.js"></script>
				<script src="/dashboard/admin/vendors/charts/morris-bundle/morris.js"></script>

				<!--Chart Js-->
				<script src="/dashboard/admin/vendors/charts/charts-bundle/Chart.bundle.js"></script>

				<!--Sparkline Chart-->
				<script src="/dashboard/admin/vendors/charts/sparkline/jquery.sparkline.js"></script>

				<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

				<!--Home Script-->
				<script src="/dashboard/admin/js/home.js"></script>

				<!-- Main Js -->
				<script src="/dashboard/admin/js/main.js"></script>
				<script>
					$(document).ready(function() {
						$('#recipient-select').select2({
							placeholder: 'Select recipients'
						});
					});
				</script>
				<script>
					$(document).ready(function() {
						// Handle delete user
						$('.delete-user-btn').click(function() {
							var userId = $(this).data('id');
							if (confirm(
									'Are you sure you want to delete this user?'
								)) {
								$.ajax({
									url: 'admin_delete_user.php',
									type: 'POST',
									data: {
										id: userId
									},
									success: function(response) {
										alert(
											'User deleted successfully.');
										location.reload();
									}
								});
							}
						});
					});
				</script>

	</body>

</html>
