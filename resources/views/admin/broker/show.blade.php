@extends('admin.layouts.master')

@section('title', 'Edit Profile')
@section('page', 'EditUser')
@section('description', 'Dashboard')

@section('content')
<div class="container-fluid p-0">
  <div class="row">
    <div class="col-md-6 mb-lg-0 mb-4">
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
          <a type="button" class="btn btn-primary" href="{{ route('broker.edit', encrypt($data->id))}}">Edit Profile</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection