@extends('admin.layouts.master')

@section('title', 'Edit Profile')
@section('page', 'EditUser')
@section('description', 'Dashboard')

@section('content')
<div class="container-fluid p-0">
  <div class="row">
    <div class="col-lg-12">
      <div class="row">            
        <div class="col-md-12 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">User Profile</h6>
                </div>
                <!-- <div class="col-6 text-end">
                  <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Card</a>
                </div> -->
              </div>
            </div>
            <div class="card-body p-3">
              <div class="row">
                <div class="col-md-4 mb-md-0 mb-4">
                  <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                    <h6 class="mb-0">Username - <span class="fw-normal">{{ $data->username }}</span></h6>
                    <a id="myBtn" href="#" class="ms-auto"><i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Name"></i></a>
                  </div>
                </div>
                <div class="col-md-4 mb-md-0 mb-4">
                  <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                    <h6 class="mb-0">Email - <span class="fw-normal">{{ $data->email }}</span></h6>
                    <a id="myBtn1" href="#" class="ms-auto"><i class="fas fa-pencil-alt text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Email"></i></a>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                    <h6 class="mb-0">Password - <span class="fw-normal">*********</span></h6>
                    <a id="myBtn2" href="#" class="ms-auto"><i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Password"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Name</h5>
            </div>
            <form action="{{ route('admin.update_name')}}" method="post">
              @csrf
              <div class="modal-body">
                  <div class="mb-3">
                    <input type="hidden" class="form-control" name="user_id" value="{{ $data->id }}">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal 1 HTML -->
<div id="myModal1" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Email</h5>
            </div>
            <form action="{{ route('admin.update_email')}}" method="post">
              @csrf
              <div class="modal-body">
                  <div class="mb-3">
                    <input type="hidden" class="form-control" name="user_id" value="{{ $data->id }}">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal 2 HTML -->
<div id="myModal2" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Password</h5>
            </div>
            <form action="{{ route('admin.update_pass')}}" method="post">
              @csrf
              <div class="modal-body">
                  <div class="mb-3">
                    <input type="hidden" class="form-control" name="user_id" value="{{ $data->id }}">
                    <label for="password" class="form-label">New Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" value="">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
$(document).ready(function() {
    $("#myBtn1").click(function() { $("#myModal1").modal("show"); });
    $("#myBtn2").click(function() { $("#myModal2").modal("show"); });
});
</script>
@endsection