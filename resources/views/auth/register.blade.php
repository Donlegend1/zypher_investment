<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Zypher Assets Limited</title>
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

	<body>
		<div class="preloader">
			<div class="preloader-inner">
				<div class="preloader-icon">
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
		<div class="account-section bg_img" data-background="/images/account-bg.jpg">
			<div class="container">
				<div class="account-title text-center">
					<a href="/" class="back-home"><i class="fas fa-angle-left"></i><span>Back <span
								class="d-none d-sm-inline-block">To Zypher Assets</span></span></a>
					<a href="#0" class="logo">
						<img src="/default-removebg-preview.png" alt="logo">
					</a>
				</div>
				<div class="account-wrapper">
					<div class="account-header">
						<h4 class="title">Let's get started</h4>
						<a href="#0" class="sign-in-with"><img src="/images/icon/google.png" alt="icon"><span>Sign Up with
								Google</span></a>
					</div>
					<div class="or"><span>OR</span></div>
					<div class="account-body">
						<span class="d-block mb-20">Sign up with your work email</span>
						<form class="account-form" action="{{ route('register') }}" method="POST">
							@csrf
							<div class="form-group">
								<label for="full-name">Full Name</label>
								<input type="text" name="name" placeholder="Enter Your Full Name" id="name" required
									class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="email">Your Email</label>
								<input type="email" name="email" placeholder="Enter Your Email" id="email" required
									class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" placeholder="Enter Your Password" id="password"
									class="form-control @error('password') is-invalid @enderror" name="password" required
									autocomplete="new-password">
								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="password">Confirm Password</label>
								<input type="password" placeholder="Confirm Password" id="confirm_password"
									class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required
									autocomplete="new-password">

							</div>

							<div class="form-group">
								<label for="referral-code">Referral Code (Optional)</label>
								<input type="text" name="referral_code" placeholder="Enter Referral Code" id="referral-code">
							</div>
							<div class="form-group text-center">
								<button type="submit">Sign Up</button>
								<span class="d-block mt-15">Already have an account? <a href="/login">Sign In</a></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
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
		<script src="/js/main.js"></script>
	</body>

</html>
