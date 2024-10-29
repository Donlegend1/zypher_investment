@extends('layouts.user')
@section('content')
	<div class="dasboard-body">
		<div class="dashboard-hero">
			<div class="header-top">
				<div class="container">
					<div class="mobile-header d-flex justify-content-between d-lg-none align-items-center">

						<div class="cross-header-bar">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>
					<div class="mobile-header-content d-lg-flex justify-content-lg-between align-items-center flex-wrap">
						<ul class="support-area">
							<li>
								<a href="#0"><i class="flaticon-support"></i>Support</a>
							</li>
							<li>
								<a href="Mailto:admin@zypherassets.com"><i class="flaticon-email"></i><span class="__cf_email__"
										data-cfemail="bfd6d1d9d0ffd7c6d6cfd3ded1db91dcd0d2">[email&#160;protected]</span> </a>
							</li>
							<li>
								<i class="flaticon-globe"></i>
								<div class="select-area">
									<select class="select-bar" style="display: none;">
										<option value="en">English</option>
										<option value="bn">Bangla</option>
										<option value="sp">Spanish</option>
									</select>
								</div>
							</li>
						</ul>
						<div
							class="dashboard-header-right d-flex justify-content-center justify-content-sm-between justify-content-lg-end align-items-center flex-wrap">
							<form class="dashboard-header-search mr-sm-4">
								<label for="search"><i class="flaticon-magnifying-glass"></i></label>
								<input type="text" placeholder="Search...">
							</form>
							<ul class="dashboard-right-menus">

							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="dashboard-hero-content text-white" style="color: white">
				<h3 class="title text-white">Invite Friends and Earn Rewards</h3>

				<ul class="breadcrumb">
					<li>
						<a href="/home">Home</a>
					</li>
					<li>Referral Program</li>

				</ul>

			</div>
			<div class="container">
				<div class="referral-info text-white">
					<p>Invite your friends to join Zypher Assets and earn rewards for every successful referral. Share your unique
						referral code below:</p>
					<p class="text-white"><strong>Your Referral Link: {{ Auth::user()->referral_code }}</strong> </p>
				</div>

			</div>

			<div class="card mx-1 mt-5 rounded bg-white pt-5" style="padding-bottom: 40px">
				<h3 class="main-title mx-3"> Referrals</h3>

				<div class="table-wrapper">
					<table class="transaction-table">
						<thead>
							<tr>
								<th>S/N</th>
								<th>Name</th>
								<th>Referred Date</th>
								<th>Profit</th>
							</tr>
						</thead>
						<tbody id="transaction-body">
							@foreach ($users as $user)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $user->full_name }}</td>
									<td>{{ $user->created_at->format('d M Y') }}</td>
									<td>${{ number_format($user->profit, 2) }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>

				</div>
			</div>
		</div>

		<div class="container-fluid sticky-bottom">
			<div class="dashboard-footer">
				<div class="d-flex justify-content-between m-0-15-none flex-wrap">
					<div class="left">
						&copy; 2024 <a href="#0">Zypher Assets Ltd</a> | All right reserved.
					</div>
					<div class="right">
						<ul>
							<li>
								<a href="#0">Terms of use</a>
							</li>
							<li>
								<a href="#0">Privacy policy</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
