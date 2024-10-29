@extends('layouts.master')
@section('content')
	<div class="row">
		<!-- Progress Table start -->
		<div class="col-12 mt-4">
			<div class="card">
				<div class="card-body">
					<h4 class="card_title">Admin List</h4>
					<div class="d-flex justify-content-end my-3">

						<button type="button" class="btn btn-inverse-primary edit-user-btn" data-toggle="modal" data-target="#userModal">
							Create <i class="fa fa-person"> </i>

							</li>
					</div>
					<div class="single-table">
						<div class="table-responsive">

							<table class="table-hover progress-table table text-center">

								<thead class="text-uppercase">
									<tr>
										<th scope="col">S/N</th>
										<th scope="col">Name</th>
										<th scope="col">Email</th>
										<th scope="col">Status</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($admins as $user)
										<tr>
											<th scope="row">{{ $loop->iteration }}</th>
											<td><?php echo htmlspecialchars($user['full_name']); ?></td>
											<td><?php echo htmlspecialchars($user['email']); ?></td>

											<td>
												<span class="badge badge-<?php echo $user['suspended'] == 0 ? 'primary' : 'secondary'; ?>">
													<?php echo htmlspecialchars($user['suspended'] == 0 ? 'Active' : 'Suspended'); ?>
												</span>
											</td>
											<td>
												<ul class="d-flex justify-content-center">
													<li class="mr-3">
														<button type="button" class="btn btn-inverse-primary edit-user-btn" data-toggle="modal"
															data-target="#userModal<?php echo $user['id']; ?>">
															<i class="fa fa-edit"></i>
														</button>
													</li>

													<li>
														<button type="button" onclick="deleteUser({{ $user->id }})" class="btn btn-inverse-danger">
															<i class="fa fa-trash"></i>
														</button>
													</li>
												</ul>
											</td>
										</tr>

										<!-- Modal for Editing User -->
										<div class="modal fade" id="userModal<?php echo $user['id']; ?>" tabindex="-1" role="dialog"
											aria-labelledby="userModalLabel<?php echo $user['id']; ?>" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<form id="userForm<?php echo $user['id']; ?>" action="{{ route('user.update') }}" method="post">
														@csrf
														<div class="modal-header">
															<h5 class="modal-title" id="userModalLabel<?php echo $user['id']; ?>">
																Edit Admin -
																<?php echo htmlspecialchars($user['full_name']); ?>
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<input type="hidden" id="userId<?php echo $user['id']; ?>" name="user_id" value="<?php echo $user['id']; ?>">
															<div class="form-group">
																<label for="userName<?php echo $user['id']; ?>">Name</label>
																<input type="text" class="form-control" id="userName<?php echo $user['id']; ?>" name="name"
																	value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
															</div>
															<div class="form-group">
																<label for="userEmail<?php echo $user['id']; ?>">Email</label>
																<input type="email" class="form-control" id="userEmail<?php echo $user['id']; ?>" name="email"
																	value="<?php echo htmlspecialchars($user['email']); ?>" required>
															</div>
															<div class="form-group">
																<label for="Password<?php echo $user['id']; ?>">Password</label>
																<input type="password" class="form-control" id="userEmail<?php echo $user['id']; ?>" name="password"
																	value="" >
															</div>

															<div class="form-group">
																<label for="userStatus<?php echo $user['id']; ?>">Status</label>
																<select class="form-control" id="userStatus<?php echo $user['id']; ?>" name="status" required>
																	<option value="0" <?php echo $user['suspended'] == 0 ? 'selected' : ''; ?>>
																		Active</option>
																	<option value="1" <?php echo $user['suspended'] == 1 ? 'selected' : ''; ?>>
																		Suspended</option>
																</select>
															</div>

														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Save
																changes</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									@endforeach
									<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
										aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<form id="userForm" action="{{ route('create.admin') }}" method="post">
													@csrf
													<div class="modal-header">
														<h5 class="modal-title" id="userModalLabel">
															Create Admin -

														</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">

														<div class="form-group">
															<label for="userName">Name</label>
															<input type="text" class="form-control" id="userName" name="name" value="" required>
															@error('name')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
														<div class="form-group">
															<label for="userEmail">Email</label>
															<input type="email" class="form-control" id="userEmail" name="email" value="" required>
                                                            @error('email')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
                                                        <div class="form-group">
															<label for="userPassword">Password</label>
															<input type="password" class="form-control" id="userPassword" name="password" value="" required>
                                                            @error('password')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>

														<div class="form-group">
															<label for="userStatus">Status</label>
															<select class="form-control" id="userStatus" name="status" required>
																<option value="0">
																	Active</option>
																<option value="1">
																	Suspended</option>
															</select>
														</div>

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Save
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</tbody>
							</table>
							<div class="d-flex justify-content-center">
								{{ $admins->links('pagination::bootstrap-4') }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Progress Table end -->
	</div>
	</div>

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
	</div>
@endsection
