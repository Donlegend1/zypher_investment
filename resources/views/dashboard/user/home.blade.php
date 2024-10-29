@extends('layouts.user')
@section('content')
	<div class="dasboard-body">
		<div class="dashboard-hero">
			<div class="header-top">
				<div class="container">
					<div class="mobile-header d-flex justify-content-between d-lg-none align-items-center">
						<!--<div class="author">-->
						<!--    <img src="/images/dashboard/author.png" alt="dashboard">-->
						<!--</div>-->
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
										data-cfemail="bfd6d1d9d0ffd7c6d6cfd3ded1db91dcd0d2">[email&#160;protected]</span>
								</a>
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
								<!--<li>-->
								<!--    <a href="#0">-->
								<!--        <i class="flaticon-email-1"></i>-->
								<!--        <span class="number bg-theme-2">4</span>-->
								<!--    </a>-->
								<!--<div class="notification-area">-->
								<!--    <div class="notifacation-header d-flex justify-content-between flex-wrap">-->
								<!--        <span>4 New Notifications</span>-->
								<!--        <a href="#0">Clear</a>-->
								<!--    </div>-->
								<!--    <ul class="notification-body">-->
								<!--        <li>-->
								<!--            <a href="#0">-->
								<!--                <div class="icon">-->
								<!--                    <img src="/images/dashboard/author.png" alt="dashboard">-->
								<!--                </div>-->
								<!--                <div class="cont">-->
								<!--                    <span class="title">Robinhood Pandey</span>-->
								<!--                    <div class="message">Electus rem placeat perspiciatis saepe</div>-->
								<!--                    <span class="info">2 Sec ago</span>-->
								<!--                </div>-->
								<!--            </a>-->
								<!--        </li>-->
								<!--<li>-->
								<!--    <a href="#0">-->
								<!--        <div class="icon">-->
								<!--            <img src="/images/dashboard/author.png" alt="dashboard">-->
								<!--        </div>-->
								<!--        <div class="cont">-->
								<!--            <span class="title">Robinhood Pandey</span>-->
								<!--            <div class="message">Electus rem placeat perspiciatis saepe</div>-->
								<!--            <span class="info">2 Sec ago</span>-->
								<!--        </div>-->
								<!--    </a>-->
								<!--</li>-->
								<!--        <li>-->
								<!--            <a href="#0">-->
								<!--                <div class="icon">-->
								<!--                    <img src="/images/dashboard/author.png" alt="dashboard">-->
								<!--                </div>-->
								<!--                <div class="cont">-->
								<!--                    <span class="title">Robinhood Pandey</span>-->
								<!--                    <div class="message">Electus rem placeat perspiciatis saepe</div>-->
								<!--                    <span class="info">2 Sec ago</span>-->
								<!--                </div>-->
								<!--            </a>-->
								<!--        </li>-->
								<!--    </ul>-->
								<!--    <div class="notifacation-footer text-center">-->
								<!--        <a href="#0" class="view-all">View All</a>-->
								<!--    </div>-->
								<!--</div>-->
								<!--</li>-->
								<!--<li>-->
								<!--    <a href="#0">-->
								<!--        <i class="flaticon-notification"></i>-->
								<!--        <span class="number bg-theme">4</span>-->
								<!--    </a>-->
								<!--    <div class="notification-area">-->
								<!--        <div class="notifacation-header d-flex justify-content-between flex-wrap">-->
								<!--            <span>4 New Notifications</span>-->
								<!--            <a href="#0">Clear</a>-->
								<!--        </div>-->
								<!--        <ul class="notification-body">-->
								<!--            <li>-->
								<!--                <a href="#0">-->
								<!--                    <div class="icon">-->
								<!--                        <i class="flaticon-man"></i>-->
								<!--                    </div>-->
								<!--                    <div class="cont">-->
								<!--                        <span class="subtitle">New Affiliate Registered</span>-->
								<!--                        <span class="info">2 Sec ago</span>-->
								<!--                    </div>-->
								<!--                </a>-->
								<!--            </li>-->
								<!--            <li>-->
								<!--                <a href="#0">-->
								<!--                    <div class="icon">-->
								<!--                        <i class="flaticon-atm"></i>-->
								<!--                    </div>-->
								<!--                    <div class="cont">-->
								<!--                        <span class="subtitle">New deposit completed</span>-->
								<!--                        <span class="info">2 Sec ago</span>-->
								<!--                    </div>-->
								<!--                </a>-->
								<!--            </li>-->
								<!--            <li>-->
								<!--                <a href="#0">-->
								<!--                    <div class="icon">-->
								<!--                        <i class="flaticon-wallet"></i>-->
								<!--                    </div>-->
								<!--                    <div class="cont">-->
								<!--                        <span class="subtitle">New Withdraw completed</span>-->
								<!--                        <span class="info">2 Sec ago</span>-->
								<!--                    </div>-->
								<!--                </a>-->
								<!--            </li>-->
								<!--            <li>-->
								<!--                <a href="#0">-->
								<!--                    <div class="icon">-->
								<!--                        <i class="flaticon-exchange"></i>-->
								<!--                    </div>-->
								<!--                    <div class="cont">-->
								<!--                        <span class="subtitle">Fund Transfer Completed</span>-->
								<!--                        <span class="info">2 Sec ago</span>-->
								<!--                    </div>-->
								<!--                </a>-->
								<!--            </li>-->
								<!--        </ul>-->
								<!--        <div class="notifacation-footer text-center">-->
								<!--            <a href="#0" class="view-all">View All</a>-->
								<!--        </div>-->
								<!--    </div>-->
								<!--</li>-->
								<!--<li>-->
								<!--    <a href="#0" class="author">-->
								<!--        <div class="thumb">-->
								<!--            <img src="/images/dashboard/author.png" alt="dashboard">-->
								<!--            <span class="checked">-->
								<!--                <i class="flaticon-checked"></i>-->
								<!--            </span>-->
								<!--        </div>-->
								<!--        <div class="content">-->
								<!--            <h6 class="title">John Doe</h6>-->
								<!--            <span class="country">Indonesia</span>-->
								<!--        </div>-->
								<!--    </a>-->
								<!--    <div class="notification-area">-->
								<!--        <div class="author-header">-->
								<!--            <div class="thumb">-->
								<!--                <img src="/images/dashboard/author.png" alt="dashboard">-->
								<!--            </div>-->
								<!--            <h6 class="title">John Doe</h6>-->
								<!--            <a href="#mailto:johndoe@gmail.com"><span class="__cf_email__" data-cfemail="460c292e2822292306212b272f2a6825292b">[email&#160;protected]</span></a>-->
								<!--        </div>-->
								<!--        <div class="author-body">-->
								<!--            <ul>-->
								<!--                <li>-->
								<!--                    <a href="#0"><i class="far fa-user"></i>Profile</a>-->
								<!--                </li>-->
								<!--                <li>-->
								<!--                    <a href="#0"><i class="fas fa-user-edit"></i>Edit Profile</a>-->
								<!--                </li>-->
								<!--                <li>-->
								<!--                    <a href="#0"><i class="fas fa-sign-out-alt"></i>Log Out</a>-->
								<!--                </li>-->
								<!--            </ul>-->
								<!--        </div>-->
								<!--    </div>-->
								<!--</li>-->
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="dashboard-hero-content text-white">
				<h3 class="title">Dashboard</h3>
				<ul class="breadcrumb">
					<li>
						<a href="/home">Home</a>
					</li>
					<li>
						Dashboard
					</li>
				</ul>
				<!-- Personalized greeting -->
				<h1>Welcome,{{ $user->full_name }}!</h1>

				@if ($user->current_plan)
					<p>Your current deposit plan: <strong>{{ $user->currentPlan }}</strong>
					</p>
				@else
					<p>You have not made any deposits yet.</p>
				@endif

			</div>

			<div class="container-fluid">
				<div class="row justify-content-center mt--85">
					<div class="col-sm-6 col-lg-3">
						<div class="dashboard-item">
							<div class="dashboard-inner">
								<div class="cont">
									<span class="title">Deposit Balance</span>
									<h5 class="amount">{{ $user->current_balance ?? '0' }}USD</h5>
								</div>

								<div class="thumb">
									<img src="/images/dashboard/dashboard1.png" alt="dasboard">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row pb-30">
					<div class="col-lg-6">
						<div class="total-earning-item">
							<div class="total-earning-heading">
								<h5 class="title">Total earning </h5>
								<h4 class="amount cl-1">${{ $Totalearnings }}</h4>
							</div>
							<div class="d-flex justify-content-between flex-wrap">
								<div class="item">
									<div class="cont">
										<h4 class="cl-theme">+{{ $Totalearnings / 12 }}%</h4>
										<span class="month">{{ date('F') }} Profit</span>
									</div>
									<div class="thumb">
										<img src="/images/dashboard/graph1.png" alt="dashboard">
									</div>
								</div>
								<div class="item">
									<div class="cont">
										<h4 class="cl-1">+{{ $Totalearnings / 12 }}%</h4>
										<span class="month">Year Profit</span>
									</div>
									<div class="thumb">
										<img src="/images/dashboard/graph2.png" alt="dashboard">
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="col-xl-6">
						<div class="earn-item mb-30">
							<div class="earn-thumb">
								<img src="/images/dashboard/earn/01.png" alt="dashboard-earn">
							</div>
							<div class="earn-content">
								<h6 class="title">Active deposits in the amount of</h6>
								<ul class="mb--5">
									<li>
										<div class="icon">
											<img src="/images/dashboard/earn/usd.png" alt="dashboard-earn">
										</div>
										<div class="cont">
											<span class="cl-1">{{ $user->total_deposit }}</span>
											<span class="cl-4">USD</span>
										</div>
									</li>

								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="earn-item mb-30">
							<div class="earn-thumb">
								<img src="/images/dashboard/earn/02.png" alt="dashboard-earn">
							</div>
							<div class="earn-content partner-content d-flex align-items-start justify-content-between flex-wrap">
								<h6 class="title w-100">All partners</h6>
								<ul class="mb--5">
									<li>
										<div class="icon">
											<img src="/images/dashboard/earn/active.png" alt="dashboard-earn">
										</div>
										<div class="cont">
											<span class="cl-4">Active :</span>
											<span class="cl-1">{{ $referralsWithDepositsCount }}</span>
										</div>
									</li>
									<li>
										<div class="icon">
											<img src="/images/dashboard/earn/inactive.png" alt="dashboard-earn">
										</div>
										<div class="cont">
											<span class="cl-4">Inactive :</span>
											<span class="cl-1">{{ $referralsActiveCount - $referralsWithDepositsCount }}</span>
										</div>
									</li>
								</ul>
								<div class="total-partner">
									<span class="total-title">{{ $referralsActiveCount }}</span>
									<span>Total</span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-xl-4">
						<div class="earn-item mb-30">
							<div class="earn-thumb">
								<img src="/images/dashboard/earn/04.png" alt="dashboard-earn">
							</div>
							<div class="earn-content">
								<h6 class="title">Earned Deposits</h6>
								<ul class="mb--5">
									<li>
										<div class="icon">
											<img src="/images/dashboard/earn/usd.png" alt="dashboard-earn">
										</div>
										<div class="cont">
											<span class="cl-1">{{ $Totalearnings }}</span>
											<span class="cl-4">USD</span>
										</div>
									</li>

								</ul>
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="earn-item small-thumbs mb-30">
							<div class="earn-thumb">
								<img src="/images/dashboard/earn/06.png" alt="dashboard-earn">
							</div>
							<div class="earn-content">
								<h6 class="title">Latest Registered Partner</h6>
								<ul class="mb--5">
									<li>
										<div class="cont w-100 p-0">
											<span class="cl-1">{{$lastReferredUser->full_name??"No referrals"}}</span>
											<a href="Mailto:demo@mail.com" class="cl-4">Email: <span class="__cf_email__"
													data-cfemail="d6b2b3bbb996bbb7bfbaf8b5b9bb">[email&#160;protected]</span></a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-xl-4">
						<div class="earn-item mb-30">
							<div class="earn-thumb">
								<img src="/images/dashboard/earn/04.png" alt="dashboard-earn">
							</div>
							<div class="earn-content">
								<h6 class="title">Referral Bonus</h6>
								<ul class="mb--5">
									<li>
										<div class="icon">
											<img src="/images/dashboard/earn/usd.png" alt="dashboard-earn">
										</div>
										<div class="cont">
											<span class="cl-1">{{ $totalProfit }}</span>
											<span class="cl-4">USD</span>
										</div>
									</li>

								</ul>
							</div>
						</div>
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
	</div>
@endsection
