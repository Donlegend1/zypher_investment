<div class="row mt-4">
	<div class="col-lg-3 col-md-6 stretched_card pl-mob-3 mb-mob-4">
		<div class="card bg-primary analytics_card">
			<div class="card-body">
				<div class="d-flex flex-md-column flex-xl-row align-items-center justify-content-between flex-wrap">
					<div class="icon-rounded">
						<i class="fas fa-users text-dark" aria-hidden="true"></i>
					</div>
					<div class="text-white">
						<p class="mt-xl-0 text-xl-left mb-2">Total Users</p>
						<div
							class="d-flex flex-md-column flex-xl-row align-items-baseline align-items-md-center align-items-xl-baseline flex-wrap">
							<h3 class="mb-md-1 mb-lg-0 mb-0 mr-1 text-white">{{ $totalUsers }}
							</h3>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-6 stretched_card mb-xs-mob-4">
		<div class="card bg-danger analytics_card">
			<div class="card-body">
				<div class="d-flex flex-md-column flex-xl-row align-items-center justify-content-between flex-wrap">
					<div class="icon-rounded">
						<i class="fas fa-chart-pie text-dark"></i>
					</div>
					<div class="text-white">
						<p class="mt-xl-0 text-xl-left mb-2">Visitors</p>
						<div
							class="d-flex flex-md-column flex-xl-row align-items-baseline align-items-md-center align-items-xl-baseline flex-wrap">
							<h3 class="mb-md-1 mb-lg-0 mb-0 mr-1 text-white">
								{{ $totalVisitors }}</h3>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 stretched_card mb-mob-4">
		<div class="card bg-success analytics_card">
			<div class="card-body">
				<div class="d-flex flex-md-column flex-xl-row align-items-center justify-content-between flex-wrap">
					<div class="icon-rounded">
						<i class="fas fa-chart-bar"></i>
					</div>
					<div class="text-white">
						<p class="mt-xl-0 text-xl-left mb-2">Total Investment</p>
						<div
							class="d-flex flex-md-column flex-xl-row align-items-baseline align-items-md-center align-items-xl-baseline flex-wrap">
							<h3 class="mb-md-1 mb-lg-0 mb-0 mr-1 text-white">
								$<?php echo number_format($totalSales, 2); ?></h3>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 stretched_card mb-mob-4">
		<div class="card bg-success analytics_card">
			<div class="card-body">
				<div class="d-flex flex-md-column flex-xl-row align-items-center justify-content-between flex-wrap">
					<div class="icon-rounded">
						<i class="fas fa-chart-bar"></i>
					</div>
					<div class="text-white">
						<p class="mt-xl-0 text-xl-left mb-2">Total Withdrawals</p>
						<div
							class="d-flex flex-md-column flex-xl-row align-items-baseline align-items-md-center align-items-xl-baseline flex-wrap">
							<h3 class="mb-md-1 mb-lg-0 mb-0 mr-1 text-white">
								$<?php echo number_format($totalWithdrwals, 2); ?></h3>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
