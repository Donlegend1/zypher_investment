@extends('layouts.master')
@section('content')
	<div class="row">
		<!-- Progress Table start -->
		<div class="col-12 mt-4">
			<div class="card">
				<div class="card-body">
					<h4 class="card_title">Users List</h4>
					<div class="single-table">
						<div class="table-responsive">
							<table class="table-hover progress-table table text-center">
								<thead class="text-uppercase">
									<tr>
										<th scope="col">S/N</th>
										<th scope="col">Name</th>
										<th scope="col">Email</th>
										<th scope="col">Wallet Address</th>
										<th>Total Deposit</th>
										<th>Total Withdrawal</th>
										<th>Current Balance</th>
										<th>Current Plan</th>
										<th scope="col">Referred By Name</th>
										<th scope="col">Status</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($users as $user)
										<tr>
											<th scope="row">{{ $loop->iteration }}</th>
											<td>{{ $user->full_name }}</td>
											<td>{{ $user->email }}</td>
											<td>{{ $user->wallet_address }}</td>
											<td>{{ $user->total_deposit }}</td>
											<td>{{ $user->total_withdrawal }}</td>
											<td>{{ $user->current_balance }}</td>
											<td>{{ $user->currentPlan->name ?? 'No Plan' }}</td>
											<td>{{ $user->referredBy->full_name ?? 'None' }}</td>
											<td>
												<span class="badge badge-{{ $user->suspended == 0 ? 'primary' : 'secondary' }}">
													{{ $user->suspended == 0 ? 'Active' : 'Suspended' }}
												</span>
											</td>
											<td>
												<ul class="d-flex justify-content-center">
													<li class="mr-3">
														<button type="button" class="btn btn-inverse-primary btn-sm edit-user-btn" data-toggle="modal"
															data-target="#userModal{{ $user->id }}">
															<i class="fa fa-edit"></i>
														</button>
													</li>
													<li>
														<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
															data-target="#fundModal{{ $user->id }}">
															<small>Fund Account</small>
														</button>
													</li>
													<li>
														<button type="button" class="btn btn-success btn-sm" data-toggle="modal"
															data-target="#WithModal{{ $user->id }}">
															<small>Withdrawal Request</small>
														</button>
													</li>
													<li>
														<button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
															data-target="#deductModal{{ $user->id }}">
															<small>Deduct Amount</small>
														</button>
													</li>
													<li>
														<button type="button" onclick="deleteUser({{ $user->id }})" class="btn btn-inverse-danger btn-sm">
															<i class="fa fa-trash"></i>
														</button>
													</li>
												</ul>
											</td>

										</tr>
										<div class="modal fade" id="WithModal{{ $user->id }}" tabindex="-1" role="dialog"
											aria-labelledby="WithModalLabel{{ $user->id }}" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<form id="fundForm{{ $user->id }}" action="/withdraw-request" method="post">
														@csrf
														<div class="modal-header">
															<h5 class="modal-title" id="WithModalLabel{{ $user->id }}">
																Withdrawal Request - {{ $user->full_name }}
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<input type="hidden" id="fundUserId{{ $user->id }}" name="user_id" value="{{ $user->id }}">

															<div class="form-group">
																<label for="fundAmount{{ $user->id }}"> Amount</label>
																<input type="number" class="form-control" id="fundAmount{{ $user->id }}" name="amount"
																	min="0" step="0.01" placeholder="Enter amount to fund" required>
															</div>
															<div class="form-group">
																<label for="fundAmount{{ $user->id }}"> Address </label>
																<input type="text" class="form-control" id="fundAmount{{ $user->id }}" name="address"
																	placeholder="Enter Address">
															</div>
															<div class="form-group">
																<label for="fundAmount{{ $user->id }}"> Currency </label>
																<input type="text" class="form-control" id="fundAmount{{ $user->id }}" name="currency"
																	placeholder="Enter Currency">
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Make Request</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<div class="modal fade" id="fundModal{{ $user->id }}" tabindex="-1" role="dialog"
											aria-labelledby="fundModalLabel{{ $user->id }}" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<form id="fundForm{{ $user->id }}" action="{{ route('admin.fundAccount') }}" method="post">
														@csrf
														<div class="modal-header">
															<h5 class="modal-title" id="fundModalLabel{{ $user->id }}">
																Fund Account - {{ $user->full_name }}
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<input type="hidden" id="fundUserId{{ $user->id }}" name="user_id" value="{{ $user->id }}">
															<p><span class="font-weight-bold text-uppercase">Current Plan:
																</span>{{ $user->currentPlan->name ?? 'No Plan' }}
																<span>(%{{ $user->currentPlan->interest_rate }} Daily interest)</span>
																<label for="Change Plan">Change Plan</label>
																<select name="plan" id="plan" class="form-control">
																	<option value="">--select--</option>
																	@foreach ($plans as $item)
																		<option value="{{ $item->id }}">{{ $item->name }}</option>
																	@endforeach

																</select>
															</p>
															<p><span class="font-weight-bold text-uppercase">Current Balance: </span>${{ $user->current_balance }}
															</p>
															<div class="form-group">
																<label for="fundAmount{{ $user->id }}"> Transaction Hash</label>
																<input type="text" class="form-control" id="fundAmount{{ $user->id }}" name="reference"
																	placeholder="Enter transaction hash">
															</div>

															<div class="form-group">
																<label for="fundAmount{{ $user->id }}"> Amount</label>
																<input type="number" class="form-control" id="fundAmount{{ $user->id }}" name="fund_amount"
																	min="0" step="0.01" placeholder="Enter amount to fund" required>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Fund Account</button>
														</div>
													</form>
												</div>
											</div>
										</div>

										<!-- Modal for Deducting Amount -->
										<div class="modal fade" id="deductModal{{ $user->id }}" tabindex="-1" role="dialog"
											aria-labelledby="deductModalLabel{{ $user->id }}" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<form id="deductForm{{ $user->id }}" action="{{ route('admin.deductAmount') }}" method="post">
														@csrf
														<div class="modal-header">
															<h5 class="modal-title" id="deductModalLabel{{ $user->id }}">
																Deduct Amount - {{ $user->full_name }}
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<input type="hidden" name="user_id" value="{{ $user->id }}">
															<p><span class="font-weight-bold text-uppercase">Current Plan: </span>{{ $user->currentPlan->name }}
																<span>(%{{ $user->currentPlan->interest_rate }} Daily interest)</span>

															</p>
															<p><span class="font-weight-bold text-uppercase">Current Balance: </span>${{ $user->current_balance }}
															</p>

															<div class="form-group">
																<label for="deductAmount{{ $user->id }}">Amount to Deduct</label>
																<input type="number" class="form-control" id="deductAmount{{ $user->id }}" name="deduct_amount"
																	min="0" step="0.01" placeholder="Enter amount to deduct" required>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-danger">Deduct Amount</button>
														</div>
													</form>
												</div>
											</div>
										</div>

										<!-- Modal for Editing User -->
										<div class="modal fade" id="userModal{{ $user->id }}" tabindex="-1" role="dialog"
											aria-labelledby="userModalLabel{{ $user->id }}" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<form id="userForm{{ $user->id }}" action="{{ route('user.update') }}" method="post">
														@csrf
														<div class="modal-header">
															<h5 class="modal-title" id="userModalLabel{{ $user->id }}">
																Edit User - {{ $user->full_name }}
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<input type="hidden" id="userId{{ $user->id }}" name="user_id" value="{{ $user->id }}">
															<div class="form-group">
																<label for="userName{{ $user->id }}">Name</label>
																<input type="text" class="form-control" id="userName{{ $user->id }}" name="name"
																	value="{{ $user->full_name }}" required>
															</div>
															<div class="form-group">
																<label for="userEmail{{ $user->id }}">Email</label>
																<input type="email" class="form-control" id="userEmail{{ $user->id }}" name="email"
																	value="{{ $user->email }}" required>
															</div>
															<div class="form-group">
																<label for="userWalletAddress{{ $user->id }}">Wallet Address</label>
																<input type="text" class="form-control" id="userWalletAddress{{ $user->id }}"
																	name="wallet_address" value="{{ $user->wallet_address }}" required>
															</div>
															<div class="form-group">
																<label for="userStatus{{ $user->id }}">Status</label>
																<select class="form-control" id="userStatus{{ $user->id }}" name="status" required>
																	<option value="0" {{ $user->suspended == 0 ? 'selected' : '' }}>Active</option>
																	<option value="1" {{ $user->suspended == 1 ? 'selected' : '' }}>Suspended</option>
																</select>
															</div>
															<div class="form-group">
																<label for="userReferredBy{{ $user->id }}">Referred By</label>
																<input type="text" class="form-control" id="userReferredBy{{ $user->id }}"
																	name="referred_by_name" value="{{ $user->referred_by_name ?? 'None' }}" readonly>
																<button type="button" class="btn btn-danger mt-2"
																	onclick="unlinkReferral({{ $user->id }})">Unlink Referral</button>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Save changes</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									@endforeach
								</tbody>
							</table>
							<div class="d-flex justify-content-center">
								{{ $users->links('pagination::bootstrap-4') }}
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Progress Table end -->
	</div>

	<script>
		function unlinkReferral(userId) {
			if (confirm("Are you sure you want to unlink the referral?")) {
				// AJAX request to unlink referral
				$.ajax({
					url: '{{ route('admin.unlinkReferral') }}',
					type: 'POST',
					data: {
						user_id: userId,
						_token: '{{ csrf_token() }}' // Include CSRF token
					},
					success: function(response) {
						alert("Referral unlinked successfully");
						location.reload(); // Reload the page to reflect changes
					},
					error: function(xhr, status, error) {
						alert("An error occurred while unlinking the referral: " + error);
					}
				});
			}
		}
	</script>
	<script>
		function deleteUser(userId) {
			if (confirm("Are you sure you want to delete this user?")) {
				// AJAX request to delete user
				$.ajax({
					url: '{{ route('admin.deleteUser') }}',
					type: 'DELETE',
					data: {
						id: userId,
						_token: '{{ csrf_token() }}' // Include CSRF token
					},
					success: function(response) {
						alert(response.message);
						location.reload(); // Reload the page to reflect changes
					},
					error: function(xhr, status, error) {
						alert("An error occurred while deleting the user: " + error);
					}
				});
			}
		}
	</script>
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
