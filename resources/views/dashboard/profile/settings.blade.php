@extends('dashboard.layouts.master')
@section('title', 'Settings')
@section('description', 'Settings')

@section('content')
<div class="row">
	<div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Basic Profile</h4>
            <div class="form-group row">
              <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="first_name" placeholder="First Name" value="{{ $data->first_name }}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="last_name" placeholder="Last Name" value="{{ $data->last_name }}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="InputUsername2" class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="InputUsername2" placeholder="Username" value="{{ $data->username }}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="InputEmail2" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="InputEmail2" placeholder="Email" value="{{ $data->email }}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="InputMobile" class="col-sm-3 col-form-label">Mobile</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="InputMobile" placeholder="Mobile number" value="{{ $data->mobile }}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Gender</label>
              <div class="col-sm-3">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="gender1" @if($data->gender == 'Male') checked @endif>
                    Male
                  </label>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="gender2" @if($data->gender == 'Female') checked @endif>
                    Female
                  </label>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="gender3" @if($data->gender == 'Other') checked @endif>
                    Other
                  </label>
                </div>
              </div>
            </div>
            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">Edit Profile</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Password Update</h4>
          <form action="{{ route('update.password')}}" method="POST">
            @csrf
            <div class="form-group row">
              <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="current_password" placeholder="Enter your current password" name="current_password" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="new_password" class="col-sm-3 col-form-label">New Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="new_password" placeholder="Enter the new password" name="new_password" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="confirm_password" class="col-sm-3 col-form-label">Confirm Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" value="">
              </div>
            </div>
            <div>
            <button type="submit" class="btn btn-primary">Update Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('profile.edit')}}" method="POST">
            @csrf
      	<div class="modal-body">
          <div class="mb-3">
	            <label for="first_name" class="form-label">First Name</label>
	            <input type="text" class="form-control" name="first_name" value="{{ $data->first_name }}">
	        </div>
          <div class="mb-3">
	            <label for="last_name" class="form-label">Last Name</label>
	            <input type="text" class="form-control" name="last_name" value="{{ $data->last_name }}">
	        </div>
	        <div class="mb-3">
	            <label for="username" class="form-label">Username</label>
	            <input type="text" class="form-control" name="username" value="{{ $data->username }}">
	        </div>
	        <div class="mb-3">
	            <label for="email" class="form-label">Email</label>
	            <input type="email" class="form-control" name="email" value="{{ $data->email }}">
	        </div>
	        <div class="mb-3">
	            <label for="mobile" class="form-label">Phone Number</label>
	            <input type="text" class="form-control" name="mobile" value="{{ $data->mobile }}">
	        </div>
          <div class="mb-3">
	            <label for="recent_password" class="form-label">Recent Password</label>
	            <input type="password" class="form-control" name="recent_password" value="">
	        </div>
          <div class="mb-3">
              <label class="form-label">Gender</label>
              <div class="row">
              <div class="col-sm-3">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" id="gender1" value="Male" @if($data->gender == 'Male') checked @endif readonly>
                    Male
                  </label>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" id="gender2" value="Female" @if($data->gender == 'Female') checked @endif readonly>
                    Female
                  </label>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" id="gender3" value="Other" @if($data->gender == 'Other') checked @endif readonly>
                    Other
                  </label>
                </div>
              </div>
              </div>
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
<!--Basic Profile End -->

<!--Profile Pic Updation--->

<div class="row">
	<div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Profile Picture</h4>
            @if($data->profile_pic == NULL)
            <div class="profile_pic" style="background-image: url({{ asset('assets/broker/images/faces/face2.jpg')}});">
            </div>
            @else
            <div class="profile_pic" style="background-image: url({{ $data->profile_pic }});">
            </div>
            @endif              
            <a type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#modal2">Edit Profile Picture</a>
      </div>
    </div>
  </div>
  <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Feedback</h4>
          <form action="{{ route('app.feedback')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="feedback">How was your experience</label>
              <textarea class="form-control" id="feedback" name="feedback" rows="20" placeholder="Write your feedback here"></textarea>
            </div>
            <button type="submit" class="col-md-12 btn btn-primary">Submit Feedback</button>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('update.profilepic')}}" method="POST" enctype="multipart/form-data">
            @csrf
      	<div class="modal-body">
	        <div class="mb-3">
	            <label for="profile_pic" class="form-label">Profile Picture</label>
	            <input type="file" class="form-control" name="profile_pic" value="">
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

<!--End Modal-->

@endsection