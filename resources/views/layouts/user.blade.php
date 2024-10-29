		<!DOCTYPE html>
		<html lang="en">

		<!-- Mirrored from pixner.net/hyipland/demo/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Sep 2022 11:00:26 GMT -->

		<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

		<title>Zypher Assets Limited.</title>

		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/all.min.css">
		<link rel="stylesheet" href="/css/animate.css">
		<link rel="stylesheet" href="/css/odometer.css">
		<link rel="stylesheet" href="/css/nice-select.css">
		<link rel="stylesheet" href="/css/owl.min.css">
		<link rel="stylesheet" href="/css/jquery-ui.min.css">
		<link rel="stylesheet" href="/css/magnific-popup.css">
		<link rel="stylesheet" href="/css/flaticon.css">
		<link rel="stylesheet" href="/css/main.css">

		<link rel="shortcut icon" href="icon-removebg-preview.png" type="image/x-icon">
		</head>

		<!--Start of Tawk.to Script-->
		<script type="text/javascript">
			var Tawk_API = Tawk_API || {},
				Tawk_LoadStart = new Date();
			(function() {
				var s1 = document.createElement("script"),
					s0 = document.getElementsByTagName("script")[0];
				s1.async = true;
				s1.src = 'https://embed.tawk.to/66c3d92a0cca4f8a7a77c73c/1i5mggl2h';
				s1.charset = 'UTF-8';
				s1.setAttribute('crossorigin', '*');
				s0.parentNode.insertBefore(s1, s0);
			})();
		</script>
		<!--End of Tawk.to Script-->

		<body>
		<div class="main--body dashboard-bg">
		<!--========== Preloader ==========-->
		<div class="loader">
		<div class="loader-inner">
		<div class="loader-line-wrap">
		<div class="loader-line"></div>
		</div>
		<div class="loader-line-wrap">
		<div class="loader-line"></div>
		</div>
		<div class="loader-line-wrap">
		<div class="loader-line"></div>
		</div>
		<div class="loader-line-wrap">
		<div class="loader-line"></div>
		</div>
		<div class="loader-line-wrap">
		<div class="loader-line"></div>
		</div>
		</div>
		</div>
		<div class="overlay"></div>
		<!--========== Preloader ==========-->

		<!--=======SideHeader-Section Starts Here=======-->
		<div class="notify-overlay"></div>
		<section class="dashboard-section">
		<div class="side-header oh">
		<div class="cross-header-bar d-xl-none">
		<span></span>
		<span></span>
		<span></span>
		</div>
		<div class="site-header-container">
		<div class="side-logo">
		<a href="/home">
		<img src="/default-removebg-preview.png" alt="logo">
		</a>
		</div>
		<ul class="dashboard-menu">
		<li>
		<a href="/home" class="active"><i class="flaticon-man"></i>Dashboard</a>
		</li>
		<li>
		<a href="/operations"><i class="flaticon-coin"></i>Operations</a>
		</li>
		<li>
		<a href="/deposit"><i class="flaticon-interest"></i>Deposits</a>
		</li>
		<li>
		<a href="/withdraw"><i class="flaticon-atm"></i>Withdraw</a>
		</li>

		<li>
		<a href="/referral"><i class="fa fa-user-friends"></i>Referral</a>
		</li>
		<li>
		<a href="/user-profile"><i class="fa fa-user-friends"></i>Profile</a>
		</li>

		<!--<li>-->
		<!--    <a href="fund-transfer.html"><i class="flaticon-exchange"></i>Fund Transfer </a>-->
		<!--</li>-->
		<!--<li>-->
		<!--    <a href="partners.html"><i class="flaticon-deal"></i>Partners</a>-->
		<!--</li>-->
		<!--<li>-->
		<!--    <a href="setting.html"><i class="flaticon-gears"></i>Settings</a>-->
		<!--</li>-->
		<!--<li>-->
		<!--    <a href="notification.html"><i class="flaticon-bell"></i>Notifications</a>-->
		<!--</li>-->
		<!--<li>-->
		<!--    <a href="ticket.html"><i class="flaticon-sms"></i>Tickets</a>-->
		<!--</li>-->
		<!--<li>-->
		<!--    <a href="promotional-metarials.html"><i class="flaticon-deal"></i>Promotional</a>-->
		<!--</li>-->
		<li>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		@csrf
		</form>
		<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
		<i class="flaticon-right-arrow"></i> Logout
		</a>
		</li>

		</ul>
		</div>
		</div>
		@yield('content')

		</section>
		<!--=======SideHeader-Section Ends Here=======-->

		</div>

		<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
		<script src="/js/jquery-3.3.1.min.js"></script>
		<script src="/js/modernizr-3.6.0.min.js"></script>
		<script src="/js/plugins.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/magnific-popup.min.js"></script>
		<script src="/js/jquery-ui.min.js"></script>
		<script src="/js/wow.min.js"></script>
		<script src="/js/odometer.min.js"></script>
		<script src="/js/viewport.jquery.js"></script>
		<script src="/js/nice-select.js"></script>
		<script src="/js/owl.min.js"></script>
		<script src="/js/paroller.js"></script>
		<script src="/js/chart.js"></script>
		<script src="/js/circle-progress.js"></script>
		<script src="/js/main.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

		<script>
			$('.progress1.circle').circleProgress({
				value: .75,
				fill: {
					gradient: ['#00cca2', '#00cca2']
				},
			}).on('circle-animation-progress', function(event, progress) {
				$(this).find('strong').html(Math.round(75 * progress) + '<i>%</i>');
			});
			$('.progress2.circle').circleProgress({
				value: .90,
				fill: {
					gradient: ['#8d16e8', '#8d16e8']
				},
			}).on('circle-animation-progress', function(event, progress) {
				$(this).find('strong').html(Math.round(90 * progress) + '<i>%</i>');
			});
			$('.progress3.circle').circleProgress({
				value: .85,
				fill: {
					gradient: ['#ef764c', '#ef764c']
				},
			}).on('circle-animation-progress', function(event, progress) {
				$(this).find('strong').html(Math.round(85 * progress) + '<i>%</i>');
			});
		</script>

		</body>

		<!-- Mirrored from pixner.net/hyipland/demo/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Sep 2022 11:00:46 GMT -->

		</html>
