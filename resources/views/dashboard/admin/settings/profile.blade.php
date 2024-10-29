	@extends('layouts.master')
	@section('content')
		<div class="profile_page">
    <div class="row">
        <div class="col-lg-12">
            <div class="cover-profile">
                <div class="profile-bg-img" style="background: url('/dashboard/images/lock-bg.jpg') no-repeat;">
                    <div class="card-block user-info">
                        <div class="col-md-12">
                            <div class="media-left">
                                <a href="#" class="profile-image">
                                    <img class="user-img img-radius" src="/dashboard/images/team/member2.jpg" alt="user-img">
                                </a>
                            </div>
                            <div class="media-body row">
                                <div class="col-lg-12">
                                    <div class="user-title">
                                        <h2><?php echo htmlspecialchars($user->full_name); ?>!</h2>
                                        <!-- <span class="text-white">Web Developer</span> -->
                                    </div>
                                </div>
                                <div>
                                    <div class="pull-right cover-btn">
                                        <button type="button" class="btn btn-light m-r-10 m-b-5"><i
                                                class="icofont icofont-plus"></i> Follow</button>
                                        <button type="button" class="btn btn-light"><i
                                                class="icofont icofont-ui-messaging"></i>
                                            Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-header card mb-4">
                <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal" role="tab"
                            aria-expanded="true">Personal Info</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#user_info" role="tab" aria-expanded="false">Update
                            Info</a>
                        <div class="slide"></div>
                    </li>

                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="personal" role="tabpanel" aria-expanded="true">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card_title mb-0">About Me</h5>
                        </div>
                        <div class="card-block">
                            <div class="view-info">
                                <div class="general-info">
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-6">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Full Name</th>
                                                            <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email</th>
                                                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="tab-pane" id="user_info" role="tabpanel">
                     <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card_title mb-0">Update Profile</h5>
                        </div>
                  <div class="card-block">

                        <form action="{{ route('user.updateProfile', $user->id) }}" method="post">
                            @csrf
                            <div>
                                <label for="full_name">Full Name:</label>
                                <input type="text" id="full_name" name="full_name" class="form-control"
                                    value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
                                <input type="hidden" id="id" name="id" class="form-control"
                                    value="<?php echo htmlspecialchars($user['id']); ?>" required>
                            </div>
                            <div>
                                <label for="email">Email:</label>
                                <input type="text" id="email" name="email" class="form-control"
                                    value="<?php echo htmlspecialchars($user['email']); ?>" required>
                            </div>



                            <div>
                                <label for="password">New Password:</label>
                                <input class="form-control" type="password" id="password" name="password"
                                    placeholder="Leave blank to keep current password">
                            </div>
                             @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             <div>
                                <label for="password">Confirm Password:</label>
                                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                  </div>
                     </div>
                </div>
                    
                
            </div>
        </div>
    </div>
</div>
	@endsection
