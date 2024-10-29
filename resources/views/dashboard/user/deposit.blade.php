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
										data-cfemail="f39a9d959cb39b8a9a839f929d97dd909c9e">[email&#160;protected]</span> </a>
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

						</div>
					</div>
				</div>
				<div class="dashboard-hero-content text-white">
					<h3 class="title">Deposits</h3>
					<ul class="breadcrumb">
						<li>
							<a href="/home">Home</a>
						</li>
						<li>
							Deposit
						</li>
					</ul>
				</div>
			</div>

			<div class="container-fluid">
				<div class="row justify-content-center mt--85">

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
				@if (session('message'))
					<div class="alert alert-success">
						{{ session('message') }}
					</div>
				@endif

				<div class="deposit">
					<h3 class="main-title">Make Deposits</h3>
					<h4 class="main-subtitle">01. Select the Plan</h4>
					<div class="deposit-wrapper">

						<!-- Deposit Plan 1 -->

						@foreach ($investmentPlans as $plan)
							<div class="deposit-item">
								<div class="deposit-inner">
									<div class="deposit-header">
										<h3 class="title">{{ $plan->interest_rate }}%</h3>
										<span><b>daily</b></span>
									</div>
									<div class="deposit-body">
										<div class="item">
											<div class="item-thumb">
												<img src="/images/offer/offer1.png" alt="offer">
											</div>
											<div class="item-content">
												<h5 class="title">Deposit</h5>
												<h5 class="subtitle"><span class="min">${{ $plan->min_investment }}</span><span class="to"> to
													</span><span class="max">${{ $plan->max_investment }}</span></h5>
											</div>
										</div>
										<span class="bal-shape"></span>
										<div class="item">
											<div class="item-thumb">
												<img src="/images/offer/offer2.png" alt="offer">
											</div>
											<div class="item-content">
												<h5 class="title">Terms</h5>
												<h5 class="subtitle">{{ $plan->duration_in_days }} days</h5>
											</div>
											<div class="item-content">
												<h5 class="title">Earning Days</h5>
												@foreach ($plan->earningsSchedules as $item)
													<p class="subtitle">{{ $item->earning_day }}</p>
												@endforeach
											</div>
										</div>
									</div>
									<!-- Centered Invest Button with Modal Trigger -->
									<div class="mt-3 text-center">
										<button class="btn btn-primary" data-bs-toggle="modal"
											data-bs-target="#investmentModal{{ $plan->id }}">Invest</button>
									</div>
								</div>
							</div>

							<!-- Modal Structure for Each Plan -->
							<div class="modal fade" id="investmentModal{{ $plan->id }}" tabindex="-1"
								aria-labelledby="investmentModalLabel{{ $plan->id }}" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="investmentModalLabel{{ $plan->id }}">Investment Plan Details</h5>
											{{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
										</div>
										<form action="/main-deposit" method="post">
											@csrf
											<div class="modal-body">

												<h3>{{ $plan->interest_rate }}%</h3>
												<p><b>Investment Range:</b> ${{ $plan->min_investment }} to ${{ $plan->max_investment }}</p>
												<p><b>Duration:</b> {{ $plan->duration_in_days }} days</p>
												<p><b>Earning Days:</b></p>
												@foreach ($plan->earningsSchedules as $item)
													<p>{{ $item->earning_day }}</p>
												@endforeach
												<div class="my-3">
													<label for="Amount"> Amount</label>
													<input type="number" name='amount' class="form-control">
												</div>
												<div class="my-3">
													<label for="address"> Wallet Address</label>
													<input type="text" name='address' class="form-control">
												</div>
												<input type="hidden" name="plan_id" value="{{ $plan->id }}">

											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Proceed to Invest</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						@endforeach

					</div>

				</div>
				<div class="bg-white" style="padding-bottom: 40px">
					<h3 class="main-title mx-3"> Deposits</h3>

					<div class="table-wrapper">
						<table class="transaction-table">
							<thead>
								<tr>
									<th>S/N</th>
									<th>Amount</th>
									<th>Payment Method</th>
									<th scope="col">Days Remaining</th>
									<th>STATUS</th>
								</tr>
							</thead>
							<tbody id="transaction-body">
								@foreach ($deposits as $deposit)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $deposit->amount }}</td>
										<td>{{ $deposit->payment_method }}</td>
										<td> {{ $deposit->remaining_days }} day(s)</td>

										<td>{{ $deposit->status }}</td>

									</tr>
								@endforeach

							</tbody>
						</table>
					</div>
				</div>

				<div class="container-fluid sticky-bottom">
					<div class="dashboard-footer">
						<div class="d-flex justify-content-between m-0-15-none flex-wrap">
							<div class="left">
								&copy; 2024 <a href="index.html">Zypher Assets Ltd</a> | All right reserved.
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
