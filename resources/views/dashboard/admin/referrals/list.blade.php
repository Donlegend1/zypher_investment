@extends('layouts.master')
@section('content')
	<div class="row">
		<!-- Investment Plan Table start -->
		<div class="col-12 mt-4">
			<div class="card">
				<div class="card-body">
					<h4 class="card_title">Referrals List</h4>

					<div class="single-table">
						<div class="table-responsive">
							<table class="table-hover progress-table table text-center">
								<thead class="text-uppercase">
									<tr>
										<th scope="col">S/N</th>
										<th scope="col">Name</th>
										<th scope="col">Referrals</th>
										<th scope="col">Date</th>
										{{-- <th scope="col">Gain</th> --}}
										<th scope="col">Total Gain</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($referrals as $user)
										<tr>
											<th scope="row" rowspan="{{ max($user->referrals->count(), 1) }}">{{ $loop->iteration }}</th>
											<td rowspan="{{ max($user->referrals->count(), 1) }}">{{ $user->full_name }}</td>
											@if ($user->referrals->isEmpty())
												<td colspan="5">No Referrals</td>
											@else
												@foreach ($user->referrals as $index => $referral)
													@if ($index > 0)
										<tr>
									@endif
									<td>{{ $referral->full_name }}</td>
									<td>{{ $referral->created_at->format('d M Y') }}</td>
									{{-- <td>
										@foreach ($referral->gains as $gain)
											{{ number_format($gain, 2) }} NGN<br>
										@endforeach
									</td> --}}
									@if ($index == 0)
										<td rowspan="{{ $user->referrals->count() }}">
											${{ number_format($user->totalGain, 2) }} 
										</td>
										<td rowspan="{{ $user->referrals->count() }}">
											<!-- Add your action button or link here -->
											<a href="#" class="btn btn-primary">Action</a>
										</td>
									@endif
									@if ($index > 0)
										</tr>
									@endif
									@endforeach
									@endif
									</tr>
									@endforeach
								</tbody>
							</table>

							{{-- <div class="d-flex justify-content-center">
								{{ $deposits->links('pagination::bootstrap-4') }}
							</div> --}}
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
