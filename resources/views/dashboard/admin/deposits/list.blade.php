@extends('layouts.master')
@section('content')
	<div class="row">
		<!-- Investment Plan Table start -->
		<div class="col-12 mt-4">
			<div class="card">
				<div class="card-body">
					<h4 class="card_title">Deposit List</h4>

					<div class="single-table">
						<div class="table-responsive">
							<table class="table-hover progress-table table text-center">
								<thead class="text-uppercase">
									<tr>
										<th scope="col">S/N</th>
										<th scope="col">User Name</th>
										<th scope="col">Amount</th>
										<th scope="col">Payment Method</th>
										<th scope="col">Date</th>
										<th scope="col">Status</th>
										<th scope="col">Days Remaining</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($deposits as $deposit)
										<tr>
											<th scope="row">{{ $loop->iteration }}</th>
											<td>{{ $deposit->user->full_name }}</td>
											<td>{{ $deposit->amount }}</td>
											<td>{{ $deposit->payment_method }}</td>
											<td>{{ $deposit->date }}</td>
											<td>
												<span class="badge badge-{{ $deposit->status == 'completed' ? 'primary' : 'secondary' }}">
													{{ ucfirst($deposit->status) }}
												</span>
											</td>
											<td>
												{{ $deposit->remaining_days }} days remaining
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>

							<div class="d-flex justify-content-center">
								{{ $deposits->links('pagination::bootstrap-4') }}
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- Investment Plan Table end -->
	</div>
	</div>
	<!--==================================*
																						End Main Section
											*====================================-->
	</div>
	<!--=================================*
														End Main Content Section
							*===================================-->

	<!--=================================*
																					Footer Section
							*===================================-->
@endsection
