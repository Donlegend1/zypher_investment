@extends('layouts.user')
@section('content')
	<div class="dasboard-body">
		<div class="dashboard-hero">
			<div class="header-top">
				<div class="container">
					<div class="mobile-header d-flex justify-content-between d-lg-none align-items-center">
						<!--<div class="author">-->
						<!--    <img src="assets/images/dashboard/author.png" alt="dashboard">-->
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
										data-cfemail="d0b9beb6bf90b8a9b9a0bcb1beb4feb3bfbd">[email&#160;protected]</span> </a>
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
							<!--<ul class="dashboard-right-menus">-->
							<!--    <li>-->
							<!--        <a href="#0">-->
							<!--            <i class="flaticon-email-1"></i>-->
							<!--            <span class="number bg-theme-2">4</span>-->
							<!--        </a>-->
							<!--        <div class="notification-area">-->
							<!--            <div class="notifacation-header d-flex justify-content-between flex-wrap">-->
							<!--                <span>4 New Notifications</span>-->
							<!--                <a href="#0">Clear</a>-->
							<!--            </div>-->
							<!--            <ul class="notification-body">-->
							<!--<li>-->
							<!--    <a href="#0">-->
							<!--        <div class="icon">-->
							<!--            <img src="assets/images/dashboard/author.png" alt="dashboard">-->
							<!--        </div>-->
							<!--        <div class="cont">-->
							<!--            <span class="title">Robinhood Pandey</span>-->
							<!--            <div class="message">Electus rem placeat perspiciatis saepe</div>-->
							<!--            <span class="info">2 Sec ago</span>-->
							<!--        </div>-->
							<!--    </a>-->
							<!--</li>-->
							<!--<li>-->
							<!--    <a href="#0">-->
							<!--        <div class="icon">-->
							<!--            <img src="assets/images/dashboard/author.png" alt="dashboard">-->
							<!--        </div>-->
							<!--        <div class="cont">-->
							<!--            <span class="title">Robinhood Pandey</span>-->
							<!--            <div class="message">Electus rem placeat perspiciatis saepe</div>-->
							<!--            <span class="info">2 Sec ago</span>-->
							<!--        </div>-->
							<!--    </a>-->
							<!--</li>-->
							<!--                <li>-->
							<!--                    <a href="#0">-->
							<!--                        <div class="icon">-->
							<!--                            <img src="assets/images/dashboard/author.png" alt="dashboard">-->
							<!--                        </div>-->
							<!--                        <div class="cont">-->
							<!--                            <span class="title">Robinhood Pandey</span>-->
							<!--                            <div class="message">Electus rem placeat perspiciatis saepe</div>-->
							<!--                            <span class="info">2 Sec ago</span>-->
							<!--                        </div>-->
							<!--                    </a>-->
							<!--                </li>-->
							<!--            </ul>-->
							<!--            <div class="notifacation-footer text-center">-->
							<!--                <a href="#0" class="view-all">View All</a>-->
							<!--            </div>-->
							<!--        </div>-->
							<!--    </li>-->
							<!--    <li>-->
							<!--        <a href="#0">-->
							<!--            <i class="flaticon-notification"></i>-->
							<!--            <span class="number bg-theme">4</span>-->
							<!--        </a>-->
							<!--        <div class="notification-area">-->
							<!--            <div class="notifacation-header d-flex justify-content-between flex-wrap">-->
							<!--                <span>4 New Notifications</span>-->
							<!--                <a href="#0">Clear</a>-->
							<!--            </div>-->
							<!--            <ul class="notification-body">-->
							<!--                <li>-->
							<!--                    <a href="#0">-->
							<!--                        <div class="icon">-->
							<!--                            <i class="flaticon-man"></i>-->
							<!--                        </div>-->
							<!--                        <div class="cont">-->
							<!--                            <span class="subtitle">New Affiliate Registered</span>-->
							<!--                            <span class="info">2 Sec ago</span>-->
							<!--                        </div>-->
							<!--                    </a>-->
							<!--                </li>-->
							<!--                <li>-->
							<!--                    <a href="#0">-->
							<!--                        <div class="icon">-->
							<!--                            <i class="flaticon-atm"></i>-->
							<!--                        </div>-->
							<!--                        <div class="cont">-->
							<!--                            <span class="subtitle">New deposit completed</span>-->
							<!--                            <span class="info">2 Sec ago</span>-->
							<!--                        </div>-->
							<!--                    </a>-->
							<!--                </li>-->
							<!--                <li>-->
							<!--                    <a href="#0">-->
							<!--                        <div class="icon">-->
							<!--                            <i class="flaticon-wallet"></i>-->
							<!--                        </div>-->
							<!--                        <div class="cont">-->
							<!--                            <span class="subtitle">New Withdraw completed</span>-->
							<!--                            <span class="info">2 Sec ago</span>-->
							<!--                        </div>-->
							<!--                    </a>-->
							<!--                </li>-->
							<!--                <li>-->
							<!--                    <a href="#0">-->
							<!--                        <div class="icon">-->
							<!--                            <i class="flaticon-exchange"></i>-->
							<!--                        </div>-->
							<!--                        <div class="cont">-->
							<!--                            <span class="subtitle">Fund Transfer Completed</span>-->
							<!--                            <span class="info">2 Sec ago</span>-->
							<!--                        </div>-->
							<!--                    </a>-->
							<!--                </li>-->
							<!--            </ul>-->
							<!--            <div class="notifacation-footer text-center">-->
							<!--                <a href="#0" class="view-all">View All</a>-->
							<!--            </div>-->
							<!--        </div>-->
							<!--    </li>-->
							<!--    <li>-->
							<!--        <a href="#0" class="author">-->
							<!--            <div class="thumb">-->
							<!--                <img src="assets/images/dashboard/author.png" alt="dashboard">-->
							<!--                <span class="checked">-->
							<!--                    <i class="flaticon-checked"></i>-->
							<!--                </span>-->
							<!--            </div>-->
							<!--            <div class="content">-->
							<!--                <h6 class="title">John Doe</h6>-->
							<!--                <span class="country">Indonesia</span>-->
							<!--            </div>-->
							<!--        </a>-->
							<!--        <div class="notification-area">-->
							<!--            <div class="author-header">-->
							<!--                <div class="thumb">-->
							<!--                    <img src="assets/images/dashboard/author.png" alt="dashboard">-->
							<!--                </div>-->
							<!--                <h6 class="title">John Doe</h6>-->
							<!--                <a href="#mailto:johndoe@gmail.com"><span class="__cf_email__" data-cfemail="78321710161c171d381f15191114561b1715">[email&#160;protected]</span></a>-->
							<!--            </div>-->
							<!--            <div class="author-body">-->
							<!--                <ul>-->
							<!--                    <li>-->
							<!--                        <a href="#0"><i class="far fa-user"></i>Profile</a>-->
							<!--                    </li>-->
							<!--                    <li>-->
							<!--                        <a href="#0"><i class="fas fa-user-edit"></i>Edit Profile</a>-->
							<!--                    </li>-->
							<!--                    <li>-->
							<!--                        <a href="#0"><i class="fas fa-sign-out-alt"></i>Log Out</a>-->
							<!--                    </li>-->
							<!--                </ul>-->
							<!--            </div>-->
							<!--        </div>-->
							<!--    </li>-->
							<!--</ul>-->
						</div>
					</div>
				</div>
			</div>
			<div class="dashboard-hero-content text-white">
				<h3 class="title">Withdraw Funds</h3>
				<ul class="breadcrumb">
					<li>
						<a href="/home">Home</a>
					</li>
					<li>
						Withdraw Funds
					</li>
				</ul>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row justify-content-center mt--85">
				<div class="col-sm-6 col-lg-3">
					<div class="dashboard-item">
						<div class="dashboard-inner">
							<!--<div class="cont">-->
							<!--    <span class="title">Balance</span>-->
							<!--    <h5 class="amount">0 USD</h5>-->
							<!--</div>-->
							<div class="thumb">
								<img src="/images/dashboard/dashboard2.png" alt="dasboard">
							</div>
							<div class="thumb">
								<img src="/images/dashboard/dashboard1.png" alt="dasboard">
							</div>
						</div>
					</div>
				</div>
				<!--<div class="col-sm-6 col-lg-3">-->
				<!--    <div class="dashboard-item">-->
				<!--        <div class="dashboard-inner">-->
				<!--            <div class="cont">-->
				<!--                <span class="title">Balance</span>-->
				<!--                <h5 class="amount">0 BTC</h5>-->
				<!--            </div>-->
				<!--            <div class="thumb">-->
				<!--                <img src="/images/dashboard/dashboard2.png" alt="dasboard">-->
				<!--            </div>-->
				<!--        </div>-->
				<!--    </div>-->
			</div>
			<!--<div class="col-sm-6 col-lg-3">-->
			<!--    <div class="dashboard-item">-->
			<!--        <div class="dashboard-inner">-->
			<!--            <div class="cont">-->
			<!--                <span class="title">Balance</span>-->
			<!--                <h5 class="amount">0 ETH</h5>-->
			<!--            </div>-->
			<!--            <div class="thumb">-->
			<!--                <img src="/images/dashboard/dashboard3.png" alt="dasboard">-->
			<!--            </div>-->
			<!--        </div>-->
			<!--    </div>-->
			<!--</div>-->
			<!--<div class="col-sm-6 col-lg-3">-->
			<!--    <div class="dashboard-item">-->
			<!--        <div class="dashboard-inner">-->
			<!--            <div class="cont">-->
			<!--                <span class="title">Balance</span>-->
			<!--                <h5 class="amount">0 XRP</h5>-->
			<!--            </div>-->
			<!--            <div class="thumb">-->
			<!--                <img src="/images/dashboard/dashboard4.png" alt="dasboard">-->
			<!--            </div>-->
			<!--        </div>-->
			<!--    </div>-->
			<!--</div>-->
		</div>
		<div class="deposit">
			<h3 class="main-title">Withdraw Funds</h3>
			<!--<div class="deposit-system pt-0">-->
			<!--    <h4 class="main-subtitle">01. Choose Payment  System</h4>-->
			<!--    <div class="deposit-method-slider owl-theme owl-carousel text-center">-->
			<!--        <a href="#0" class="deposit-method-item active">-->
			<!--            <div class="thumb">-->
			<!--                <div class="check">-->
			<!--                    <img src="/images/dashboard/payment/check.png" alt="payment">-->
			<!--                </div>-->
			<!--                <img src="/images/dashboard/payment/01.png" alt="payment">-->
			<!--            </div>-->
			<!--        </a>-->
			<!--        <a href="#0" class="deposit-method-item">-->
			<!--            <div class="thumb">-->
			<!--                <div class="check">-->
			<!--                    <img src="/images/dashboard/payment/check.png" alt="payment">-->
			<!--                </div>-->
			<!--                <img src="/images/dashboard/payment/02.png" alt="payment">-->
			<!--            </div>-->
			<!--        </a>-->
			<!--        <a href="#0" class="deposit-method-item">-->
			<!--            <div class="thumb">-->
			<!--                <div class="check">-->
			<!--                    <img src="/images/dashboard/payment/check.png" alt="payment">-->
			<!--                </div>-->
			<!--                <img src="/images/dashboard/payment/03.png" alt="payment">-->
			<!--            </div>-->
			<!--        </a>-->
			<!--        <a href="#0" class="deposit-method-item">-->
			<!--            <div class="thumb">-->
			<!--                <div class="check">-->
			<!--                    <img src="/images/dashboard/payment/check.png" alt="payment">-->
			<!--                </div>-->
			<!--                <img src="/images/dashboard/payment/04.png" alt="payment">-->
			<!--            </div>-->
			<!--        </a>-->
			<!--        <a href="#0" class="deposit-method-item">-->
			<!--            <div class="thumb">-->
			<!--                <div class="check">-->
			<!--                    <img src="/images/dashboard/payment/check.png" alt="payment">-->
			<!--                </div>-->
			<!--                <img src="/images/dashboard/payment/05.png" alt="payment">-->
			<!--            </div>-->
			<!--        </a>-->
			<!--        <a href="#0" class="deposit-method-item">-->
			<!--            <div class="thumb">-->
			<!--                <div class="check">-->
			<!--                    <img src="/images/dashboard/payment/check.png" alt="payment">-->
			<!--                </div>-->
			<!--                <img src="/images/dashboard/payment/06.png" alt="payment">-->
			<!--            </div>-->
			<!--        </a>-->
			<!--        <a href="#0" class="deposit-method-item">-->
			<!--            <div class="thumb">-->
			<!--                <div class="check">-->
			<!--                    <img src="/images/dashboard/payment/check.png" alt="payment">-->
			<!--                </div>-->
			<!--                <img src="/images/dashboard/payment/07.png" alt="payment">-->
			<!--            </div>-->
			<!--        </a>-->
			<!--        <a href="#0" class="deposit-method-item">-->
			<!--            <div class="thumb">-->
			<!--                <div class="check">-->
			<!--                    <img src="/images/dashboard/payment/check.png" alt="payment">-->
			<!--                </div>-->
			<!--                <img src="/images/dashboard/payment/01.png" alt="payment">-->
			<!--            </div>-->
			<!--        </a>-->
			<!--        <a href="#0" class="deposit-method-item">-->
			<!--            <div class="thumb">-->
			<!--                <div class="check">-->
			<!--                    <img src="/images/dashboard/payment/check.png" alt="payment">-->
			<!--                </div>-->
			<!--                <img src="/images/dashboard/payment/02.png" alt="payment">-->
			<!--            </div>-->
			<!--        </a>-->
			<!--        <a href="#0" class="deposit-method-item">-->
			<!--            <div class="thumb">-->
			<!--                <div class="check">-->
			<!--                    <img src="/images/dashboard/payment/check.png" alt="payment">-->
			<!--                </div>-->
			<!--                <img src="/images/dashboard/payment/03.png" alt="payment">-->
			<!--            </div>-->
			<!--        </a>-->
			<!--        <a href="#0" class="deposit-method-item">-->
			<!--            <div class="thumb">-->
			<!--                <div class="check">-->
			<!--                    <img src="/images/dashboard/payment/check.png" alt="payment">-->
			<!--                </div>-->
			<!--                <img src="/images/dashboard/payment/04.png" alt="payment">-->
			<!--            </div>-->
			<!--        </a>-->
			<!--        <a href="#0" class="deposit-method-item">-->
			<!--            <div class="thumb">-->
			<!--                <div class="check">-->
			<!--                    <img src="/images/dashboard/payment/check.png" alt="payment">-->
			<!--                </div>-->
			<!--                <img src="/images/dashboard/payment/05.png" alt="payment">-->
			<!--            </div>-->
			<!--        </a>-->
			<!--        <a href="#0" class="deposit-method-item">-->
			<!--            <div class="thumb">-->
			<!--                <div class="check">-->
			<!--                    <img src="/images/dashboard/payment/check.png" alt="payment">-->
			<!--                </div>-->
			<!--                <img src="/images/dashboard/payment/06.png" alt="payment">-->
			<!--            </div>-->
			<!--        </a>-->
			<!--        <a href="#0" class="deposit-method-item">-->
			<!--            <div class="thumb">-->
			<!--                <div class="check">-->
			<!--                    <img src="/images/dashboard/payment/check.png" alt="payment">-->
			<!--                </div>-->
			<!--                <img src="/images/dashboard/payment/07.png" alt="payment">-->
			<!--            </div>-->
			<!--        </a>-->
			<!--    </div>-->
			<!--</div>-->
			<div class="deposit-system">
				<h4 class="main-subtitle">Enter the amount of Withdraw:</h4>
				<form class="make-deposit" action="/withdraw-request" method="post">
					@csrf
					<input type="hidden" name="action" value="create_payout">
					<div class="form-group">
						<input type="text" name="amount" placeholder="Enter your amount" class="make-amount" required>
					</div>
					<div class="form-group">
						<label for="currency">Currency:</label>
						<input type="text" name="currency" placeholder="USDT" required>
					</div>
					<div class="form-group">
						<label for="address">Recipient USDT Address:</label>
						<input type="text" name="address" placeholder="Enter recipient address" required>
					</div>
					<div class="form-group">
						<button type="submit" class="custom-button border-0">Withdraw Funds</button>
					</div>
				</form>
			</div>
			<div class="card mx-1 mt-5 rounded bg-white pt-5" style="padding-bottom: 40px">
				<h3 class="main-title mx-3"> Withdrawals</h3>

				<div class="table-wrapper">
					<table class="transaction-table">
						<thead>
							<tr>
								<th>S/N</th>
								<th>Amount</th>
								<th>Currency</th>
								<th>STATUS</th>
							</tr>
						</thead>
						<tbody id="transaction-body">
							@foreach ($withdrawals as $deposit)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $deposit->amount }}</td>
									<td>{{ $deposit->currency }}</td>
									<td>{{ $deposit->status }}</td>

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
