@extends('layouts.master')
@section('content')
<div class="row">
    <!-- Progress Table start -->
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Withdraw Request</h4>
                <p>Manage withdrawal requests by clicking the update button below to open the modal.</p>

                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table-hover progress-table table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th>User</th>
                                    <th>Amount</th>
                                    <th>Currency</th>
                                    <th>Withdrawal Address</th>
                                    <th>Transaction Hash</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdrawals as $withdrawal)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $withdrawal->user->full_name }}</td>
                                    <td>{{ $withdrawal->amount }}</td>
                                    <td>{{ $withdrawal->currency }}</td>
                                    <td>{{ $withdrawal->address }}</td>
                                    <td>{{ $withdrawal->reference }}</td>
                                    <td>
                                        <span class="badge badge-primary">
                                            {{ $withdrawal->status }}
                                        </span>
                                    </td>
                                    <td>{{ formatDateTime($withdrawal->created_at) }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-flat mt-2" 
                                            data-toggle="modal" data-target="#withdrawalModal{{ $withdrawal->id }}">
                                            Update
                                        </button>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Progress Table end -->
</div>

<!-- Modals for each withdrawal request -->
@foreach ($withdrawals as $withdrawal)
<div class="modal fade" id="withdrawalModal{{ $withdrawal->id }}" tabindex="-1" role="dialog"
    aria-labelledby="withdrawalModalLabel{{ $withdrawal->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Withdrawal - {{ $withdrawal->user->full_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.updateWithdrawalStatus') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="withdrawal_id" value="{{ $withdrawal->id }}">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" class="form-control" 
                            value="{{ $withdrawal->amount }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="currency">Currency</label>
                        <input type="text" name="currency" class="form-control" 
                            value="{{ $withdrawal->currency }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="address">Withdrawal Address</label>
                        <input type="text" name="address" class="form-control" 
                            value="{{ $withdrawal->address }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="Pending" {{ $withdrawal->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Completed" {{ $withdrawal->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            <option value="Denied" {{ $withdrawal->status == 'Denied' ? 'selected' : '' }}>Denied</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transaction_reference">Transaction Hash</label>
                        <input type="text" name="transaction_reference" class="form-control"
                            value="{{ $withdrawal->transaction_reference }}" placeholder="Enter transaction reference">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
