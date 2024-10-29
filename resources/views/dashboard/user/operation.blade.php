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
										data-cfemail="e58c8b838aa58d9c8c9589848b81cb868a88">[email&#160;protected]</span> </a>
							</li>
							<li>
								<i class="flaticon-globe"></i>
								<div class="select-area">
									<select class="select-bar" style="display: none;">
										<option value="en">English</option>
										<!--<option value="bn">Bangla</option>-->
										<!--<option value="sp">Spanish</option>-->
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
								<!--    <div class="notification-area">-->
								<!--        <div class="notifacation-header d-flex justify-content-between flex-wrap">-->
								<!--            <span>4 New Notifications</span>-->
								<!--            <a href="#0">Clear</a>-->
								<!--        </div>-->
								<!--        <ul class="notification-body">-->
								<!--            <li>-->
								<!--                <a href="#0">-->
								<!--                    <div class="icon">-->
								<!--                        <img src="assets/images/dashboard/author.png" alt="dashboard">-->
								<!--                    </div>-->
								<!--                    <div class="cont">-->
								<!--                        <span class="title">Robinhood Pandey</span>-->
								<!--                        <div class="message">Electus rem placeat perspiciatis saepe</div>-->
								<!--                        <span class="info">2 Sec ago</span>-->
								<!--                    </div>-->
								<!--                </a>-->
								<!--            </li>-->
								<!--            <li>-->
								<!--                <a href="#0">-->
								<!--                    <div class="icon">-->
								<!--                        <img src="assets/images/dashboard/author.png" alt="dashboard">-->
								<!--                    </div>-->
								<!--                    <div class="cont">-->
								<!--                        <span class="title">Robinhood Pandey</span>-->
								<!--                        <div class="message">Electus rem placeat perspiciatis saepe</div>-->
								<!--                        <span class="info">2 Sec ago</span>-->
								<!--                    </div>-->
								<!--                </a>-->
								<!--            </li>-->
								<!--            <li>-->
								<!--                <a href="#0">-->
								<!--                    <div class="icon">-->
								<!--                        <img src="assets/images/dashboard/author.png" alt="dashboard">-->
								<!--                    </div>-->
								<!--                    <div class="cont">-->
								<!--                        <span class="title">Robinhood Pandey</span>-->
								<!--                        <div class="message">Electus rem placeat perspiciatis saepe</div>-->
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
								<!--            <img src="assets/images/dashboard/author.png" alt="dashboard">-->
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
								<!--                <img src="assets/images/dashboard/author.png" alt="dashboard">-->
								<!--            </div>-->
								<!--            <h6 class="title">John Doe</h6>-->
								<!--            <a href="#mailto:johndoe@gmail.com"><span class="__cf_email__" data-cfemail="b4fedbdcdad0dbd1f4d3d9d5ddd89ad7dbd9">[email&#160;protected]</span></a>-->
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
				<h3 class="title">Operations</h3>
				<ul class="breadcrumb">
					<li>
						<a href="/home">Home</a>
					</li>
					<li>
						Operations
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

							<img src="/images/dashboard/dashboard3.png" class="thumb">
							<img src="/images/dashboard/dashboard1.png" alt="dasboard">
						</div>
					</div>
				</div>
			</div>
			<!--<div class="col-sm-6 col-lg-3">-->
			<!--    <div class="dashboard-item">-->
			<!--        <div class="dashboard-inner">-->
			<!--<div class="cont">-->
			<!--    <span class="title">Balance</span>-->
			<!--    <h5 class="amount">0 BTC</h5>-->
			<!--            </div>-->
			<!--            <div class="thumb">-->
			<!--                <img src="assets/images/dashboard/dashboard2.png" alt="dasboard">-->
			<!--            </div>-->
			<!--        </div>-->
			<!--    </div>-->
			<!--</div>-->
			<!--<div class="col-sm-6 col-lg-3">-->
			<!--    <div class="dashboard-item">-->
			<!--        <div class="dashboard-inner">-->
			<!--            <div class="cont">-->
			<!--                <span class="title">Balance</span>-->
			<!--                <h5 class="amount">0 ETH</h5>-->
			<!--            </div>-->
			<!--            <div class="thumb">-->
			<!--                <img src="assets/images/dashboard/dashboard3.png" alt="dasboard">-->
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
			<!--                <img src="assets/images/dashboard/dashboard4.png" alt="dasboard">-->
			<!--            </div>-->
			<!--        </div>-->
			<!--    </div>-->
			<!--</div>-->
			<div class="operations">
				<h3 class="main-title">Operations</h3>
				<form id="operation-filter" class="operation-filter">
					<div class="filter-item">
						<label for="date-from">Date from:</label>
						<input type="date" id="date-from" name="date_from" placeholder="Date from">
					</div>
					<div class="filter-item">
						<label for="date-to">Date To:</label>
						<input type="date" id="date-to" name="date_to" placeholder="Date to">
					</div>
					<div class="filter-item">
						<label>Operation:</label>
						<div class="select-item">
							<select id="operation" name="operation" class="select-bar">
								<option value="">Select operation</option>
								<option value="Add funds">Add funds</option>
								<option value="Withdraw funds">Withdraw funds</option>
								<option value="Deposit funds">Deposit funds</option>
								<option value="Transfer funds">Transfer funds</option>
							</select>
						</div>
					</div>
					<div class="filter-item">
						<label>Status:</label>
						<div class="select-item">
							<select id="status" name="status" class="select-bar">
								<option value="">Select status</option>
								<option value="Prepared">Prepared</option>
								<option value="Completed">Completed</option>
								<option value="Failed">Failed</option>
							</select>
						</div>
					</div>
					<div class="filter-item">
						<button type="button" class="custom-button" onclick="filterTransactions()">Filter</button>
					</div>
				</form>
				<div class="table-wrapper">
					<table class="transaction-table">
						<thead>
							<tr>
								<th>DATE AND TIME</th>
								<th>OPERATION</th>
								<th>Payment Method</th>
								<th>Amount</th>
								<th>STATUS</th>
							</tr>
						</thead>
						<tbody id="transaction-body">
							<!-- Transaction rows will be inserted here -->
						</tbody>
					</table>
				</div>
			</div>

			<!--=======SideHeader-Section Ends Here=======-->
		</div>
	@endsection
