@extends("layouts.master")
@section('content')
@include('layouts.homemenu')

<div class="row">
    <!-- Progress Table start -->
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Users List</h4>
                <div class="text-right pb-3">
                <a href="/user-list" class="btn btn-primary">View all</a>
                </div>
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>

                                    <th scope="col">Wallet Address</th>
                                    <th scope="col">Referred By</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($users as $user)
                                  
                            
                                <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td>{{$user['full_name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>{{$user['wallet_address']}}</td>
                                    <td>{{$user['referred_by_name'] ?? 'None' }} </td>
                                    <td>
                                        <span
                                            class="badge badge-{{ $user['suspended'] == 0 ? 'primary' : 'secondary';}}">
                                            {{$user['suspended'] == 0 ? "Active" : "Suspended"}}
                                        </span>
                                    </td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3">
                                                <button type="button" class="btn btn-inverse-primary edit-user-btn"
                                                    data-toggle="modal"
                                                    data-target="#userModal{{$user->id}}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" class="btn btn-inverse-danger delete-user-btn"
                                                    data-id="<?php echo $user['id']; ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>


                                <!-- Modal for Editing User -->
                                <div class="modal fade" id="userModal<?php echo $user['id']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="userModalLabel<?php echo $user['id']; ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form id="userForm<?php echo $user['id']; ?>" action="{{ route('user.update') }}"
                                                method="post">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="userModalLabel<?php echo $user['id']; ?>">
                                                        Edit User -
                                                        {{$user['full_name']}}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" id="userId<?php echo $user['id']; ?>"
                                                        name="user_id" value="<?php echo $user['id']; ?>">
                                                    <div class="form-group">
                                                        <label for="userName<?php echo $user['id']; ?>">Name</label>
                                                        <input type="text" class="form-control"
                                                            id="userName<?php echo $user['id']; ?>" name="name"
                                                            value="{{$user['full_name'] }}"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="userEmail<?php echo $user['id']; ?>">Email</label>
                                                        <input type="email" class="form-control"
                                                            id="userEmail<?php echo $user['id']; ?>" name="email"
                                                            value="{{$user['email']}}"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="userWalletAddress<?php echo $user['id']; ?>">Wallet
                                                            Address</label>
                                                        <input type="text" class="form-control"
                                                            id="userWalletAddress<?php echo $user['id']; ?>"
                                                            name="wallet_address"
                                                            value="<?php echo $user['wallet_address']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="userStatus<?php echo $user['id']; ?>">Status</label>
                                                        <select class="form-control"
                                                            id="userStatus<?php echo $user['id']; ?>" name="status"
                                                            required>
                                                            <option value="0"
                                                                <?php echo $user['suspended'] == 0 ? 'selected' : ''; ?>>
                                                                Active</option>
                                                            <option value="1"
                                                                <?php echo $user['suspended'] == 1 ? 'selected' : ''; ?>>
                                                                Suspended</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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