	@extends('layouts.master')
	@section('content')
		<div class="row">
		<!-- Investment Plan Table start -->
		<div class="col-12 mt-4">
		<div class="card">
		<div class="card-body">
		<h4 class="card_title">Investment Plan List</h4>
		<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createPlanModal">
		Create New Investment Plan
		</button>
		<div class="text-right mb-2">
			<a href="{{ route('generate.profits') }}" class="btn btn-primary" onclick="return confirm('Are you sure you want to generate profits for all users?')">Generate Profits</a>
		</div>
		<div class="single-table">
		<div class="table-responsive">
		<table class="table-hover progress-table table text-center">
		<thead class="text-uppercase">
		<tr>
		<th scope="col">S/N</th>
		<th scope="col">Plan Name</th>
		<th scope="col">Description</th>
		<th scope="col">Min Investment</th>
		<th scope="col">Max Investment</th>
		<th scope="col">Interest Rate</th>
		<th scope="col">Duration (Days)</th>
		<th scope="col">Earnings Type</th>
		<th scope="col">Earning Days</th> <!-- New Column -->
		<th scope="col">Status</th>
		<th scope="col">Action</th>
		</tr>
		</thead>
		<tbody>

		@foreach ($investmentPlans as $plan)
		<tr>
		<th scope="row">{{ $loop->iteration }}</th>
		<td>{{ $plan->name }}</td>
		<td>{{ $plan->description }}</td>
		<td>{{ $plan->min_investment }}</td>
		<td>{{ $plan->max_investment }}</td>
		<td>{{ $plan->interest_rate }}%</td>
		<td>{{ $plan->duration_in_days }}</td>
		<td>{{ $plan->earnings_type }}</td>
		<td>{{ $plan->earning_days }}</td>
		<td>
		<span class="badge badge-{{ $plan->status ? 'primary' : 'secondary' }}">
		{{ $plan->status == 1 ? 'Active' : 'Inactive' }}
		</span>
		</td>
		<td>
		<ul class="d-flex justify-content-center">
		 <li class="mr-3">
                <button type="button" class="btn btn-inverse-primary edit-plan-btn" data-toggle="modal" data-target="#editPlanModal{{ $plan->id }}">
                    <i class="fa fa-edit"></i>
                </button>
            </li>
		<li>
		<button type="button" class="btn btn-inverse-danger" data-toggle="modal"
		data-target="#deleteModal{{ $plan->id }}">
		<i class="fa fa-trash"></i>
		</button>
		</li>
		</ul>
		</td>
		</tr>

	<div class="modal fade" id="editPlanModal{{ $plan->id }}" tabindex="-1" role="dialog" aria-labelledby="editPlanModalLabel{{ $plan->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('plan.edit', $plan->id) }}" method="post">
                @csrf
                {{-- @method('PUT') --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="editPlanModalLabel{{ $plan->id }}">Edit Investment Plan - {{ $plan->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                    <div class="form-group">
                        <label for="name{{ $plan->id }}">Name</label>
                        <input type="text" class="form-control" id="name{{ $plan->id }}" name="name" value="{{ $plan->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description{{ $plan->id }}">Description</label>
                        <textarea class="form-control" id="description{{ $plan->id }}" name="description" required>{{ $plan->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="minInvestment{{ $plan->id }}">Minimum Investment</label>
                        <input type="number" class="form-control" id="minInvestment{{ $plan->id }}" name="min_investment" value="{{ $plan->min_investment }}" required>
                    </div>
                    <div class="form-group">
                        <label for="maxInvestment{{ $plan->id }}">Maximum Investment</label>
                        <input type="number" class="form-control" id="maxInvestment{{ $plan->id }}" name="max_investment" value="{{ $plan->max_investment }}" required>
                    </div>
                    <div class="form-group">
                        <label for="interestRate{{ $plan->id }}">Interest Rate (%)</label>
                        <input type="number" class="form-control" id="interestRate{{ $plan->id }}" name="interest_rate" value="{{ $plan->interest_rate }}" required>
                    </div>
                    <div class="form-group">
                        <label for="durationInDays{{ $plan->id }}">Duration (in days)</label>
                        <input type="number" class="form-control" id="durationInDays{{ $plan->id }}" name="duration_in_days" value="{{ $plan->duration_in_days }}" required>
                    </div>
                    <div class="form-group">
                        <label for="earningsType{{ $plan->id }}">Earnings Type</label>
                        <input type="text" class="form-control" id="earningsType{{ $plan->id }}" name="earnings_type" value="{{ $plan->earnings_type }}" required>
                    </div>
                    <div class="form-group">
                        <label for="earningDays{{ $plan->id }}">Earning Days</label>
                        <input type="text" class="form-control" id="earningDays{{ $plan->id }}" name="earning_days" value="{{ $plan->earning_days }}" placeholder="Enter earning days, separated by commas" required>
                    </div>
                    <div class="form-group">
                        <label for="status{{ $plan->id }}">Status</label>
                        <select class="form-control" id="status{{ $plan->id }}" name="status" required>
                            <option value="1" {{ $plan->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $plan->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
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

		<!-- Modal for Deleting Investment Plan -->
		<div class="modal fade" id="deleteModal{{ $plan->id }}" tabindex="-1" role="dialog"
		aria-labelledby="deleteModalLabel{{ $plan->id }}" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
		<form id="deleteForm{{ $plan->id }}" action="{{ route('plan.delete') }}" method="post">
		@csrf
		@method('DELETE')
		<div class="modal-header">
		<h5 class="modal-title" id="deleteModalLabel{{ $plan->id }}">Delete Investment Plan -
		{{ $plan->name }}</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		<p>Are you sure you want to delete the investment plan <strong>{{ $plan->name }}</strong>?</p>
		<input type="hidden" name="plan_id" value="{{ $plan->id }}">
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-danger">Delete</button>
		</div>
		</form>
		</div>
		</div>
		</div>
		@endforeach

		</tbody>
		</table>
		<div class="d-flex justify-content-center">
		{{ $investmentPlans->links('pagination::bootstrap-4') }}
		</div>

		</div>
		</div>
		</div>
		</div>
		</div>

		<!-- Modal for Creating New Investment Plan -->
		<div class="modal fade" id="createPlanModal" tabindex="-1" role="dialog" aria-labelledby="createPlanModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
		<form id="createPlanForm" action="{{ route('plan.store') }}" method="post">
		@csrf
		<div class="modal-header">
		<h5 class="modal-title" id="createPlanModalLabel">Create New Investment Plan</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		<div class="form-group">
		<label for="createPlanName">Plan Name</label>
		<input type="text" class="form-control" id="createPlanName" name="plan_name" required>
		</div>
		<div class="form-group">
		<label for="createPlanDescription">Description</label>
		<textarea class="form-control" id="createPlanDescription" name="description" required></textarea>
		</div>
		<div class="form-row">
		<div class="form-group col-md-6">
		<label for="createMinInvestment">Min Investment</label>
		<input type="number" step="0.01" class="form-control" id="createMinInvestment" name="min_investment"
		required>
		</div>
		<div class="form-group col-md-6">
		<label for="createMaxInvestment">Max Investment</label>
		<input type="number" step="0.01" class="form-control" id="createMaxInvestment" name="max_investment">
		</div>
		</div>
		<div class="form-row">
		<div class="form-group col-md-6">
		<label for="createInterestRate">Interest Rate (%)</label>
		<input type="number" step="0.01" class="form-control" id="createInterestRate" name="interest_rate"
		required>
		</div>
		<div class="form-group col-md-6">
		<label for="createDurationInDays">Duration (Days)</label>
		<input type="number" class="form-control" id="createDurationInDays" name="duration_in_days" required>
		</div>
		</div>

		<div class="form-group">
		<label for="createEarningDays">Earning Days</label>
		<input type="text" class="form-control" id="createEarningDays" name="earning_days[]" required>
		</div>
		<div class="row">

		<div class="form-group col-md-6">
		<label for="createEarningsType">Earnings Type</label>
		<select class="form-control" id="createEarningsType" name="earnings_type" required>
		<option value="fixed">Fixed</option>
		<option value="variable">Variable</option>
		</select>
		</div>
		<div class="form-group col-md-6">
		<label for="createPlanStatus">Status</label>
		<select class="form-control" id="createPlanStatus" name="status" required>
		<option value="1">Active</option>
		<option value="0">Inactive</option>
		</select>
		</div>
		</div>
		</div>

		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Create Plan</button>
		</div>
		</form>
		</div>
		</div>
		</div>
		<script>
			document.querySelectorAll('.delete-plan').forEach(function(button) {
				button.addEventListener('click', function() {
					var planId = this.getAttribute('data-id');
					if (confirm('Are you sure you want to delete this investment plan?')) {
						fetch(`{{ url('plans') }}/${planId}`, {
								method: 'DELETE',
								headers: {
									'X-CSRF-TOKEN': '{{ csrf_token() }}',
									'Content-Type': 'application/json',
								},
							})
							.then(response => {
								if (response.ok) {

									// Optionally refresh the page or remove the plan from the DOM
									location.reload();
								} else {

									alert('Error deleting plan.');
								}
							})
							.catch(error => {
								console.error('Error:', error);
								alert('Error deleting plan.');
							});
					}
				});
			});
		</script>

		<!-- Investment Plan Table end -->
		</div>
	@endsection
