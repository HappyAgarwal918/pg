@extends('admin.layouts.master')

@section('title', 'Edit Profile')
@section('page', 'EditUser')
@section('description', 'Dashboard')

@section('content')
<div class="container-fluid p-0">
  <div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if($data->profile_pic == NULL)
                <div class="profile_pic" 
                    style="background-image: url({{ asset('profilepic/default.jpg')}});">
                </div>
                @else
                <div class="profile_pic" style="background-image: url({{ asset($data->profile_pic) }});">
                </div>
                @endif
          </div>
        </div>
    </div>
    <div class="col-md-4 mb-lg-0 mb-4">
      <div class="card p-3">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">User Profile</h6> 
        </div>
        <div class="card-body p-3">
          <div class="form-group">
            <label for="first_name" class="col-form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" placeholder="First Name" value="{{ $data->first_name }}" readonly>
          </div>
          <div class="form-group">
            <label for="last_name" class="col-form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" placeholder="Last Name" value="{{ $data->last_name }}" readonly>
          </div>
          <div class="form-group">
            <label for="InputUsername2" class="col-form-label">Username</label>
            <input type="text" class="form-control" id="InputUsername2" placeholder="Username" value="{{ $data->username }}" readonly>
          </div>
          <div class="form-group">
            <label for="InputEmail2" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="InputEmail2" placeholder="Email" value="{{ $data->email }}" readonly>
          </div>
          <div class="form-group">
            <label for="InputMobile" class="col-form-label">Mobile</label>
            <input type="text" class="form-control" id="InputMobile" placeholder="Mobile number" value="{{ $data->mobile }}" readonly>
          </div>
          <div class="form-group">
            <label class="col-form-label">Gender</label>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" id="gender1" @if($data->gender == 'Male') checked @endif>
                    Male
                  </label>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" id="gender2" @if($data->gender == 'Female') checked @endif>
                    Female
                  </label>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input"name="gender" id="gender3" @if($data->gender == 'Other') checked @endif>
                    Other
                  </label>
                </div>
              </div>
            </div>
          </div>
          <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal1">Edit Profile</a>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Password Update</h4>
          <form action="{{ route('user.password', encrypt($data->id))}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="password" class="col-form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Enter the new password" name="password" value="">
            </div>
            <div class="form-group">
              <label for="confirm_password" class="col-form-label">Confirm Password</label>
              <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" value="">
            </div>
            <div>
            <button type="submit" class="btn btn-primary">Update Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Basic Profile Modal -->
<div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('user.update',encrypt($data->id))}}" method="POST">
        <input name="_method" type="hidden" value="PUT">
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--Basic Profile End -->

@endsection