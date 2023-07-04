@extends('admin.layouts.master')

@section('title', 'Settings')
@section('page', 'Settings')
@section('description', 'Dashboard')

@section('content')
<div class="container-fluid p-0">
	<div class="row">
		<div class="col-md-5 mt-4">
			<h5 class="font-weight-bolder mt-4 mx-3">Personal Information</h5>
		</div>
        <div class="col-md-7 mt-4">
		    <div class="card">
        		<div class="card-body pt-4 p-3">
	              	<ul class="list-group">
	                	<li class="list-group-item border-0 d-flex align-items-center p-4 mb-2 bg-gray-100 border-radius-lg">
		                  	<div class="">
		                    	<span class="text-sm">Name: <span class="text-dark font-weight-bold ms-sm-2">{{ $data->username }}</span></span>
			                </div>
		                  	<div class="ms-auto text-end">
		                    	<a class="btn btn-link text-dark mb-0" id="myBtn" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
		                  	</div>
	                	</li>
	                	<li class="list-group-item border-0 d-flex align-items-center p-4 mb-2 bg-gray-100 border-radius-lg">
		                  	<div class="">
		                    	<span class="text-sm">Email: <span class="text-dark font-weight-bold ms-sm-2">{{ $data->email }}</span></span>
			                </div>
		                  	<div class="ms-auto text-end">
		                    	<a class="btn btn-link text-dark mb-0" id="myBtn2" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
		                  	</div>
	                	</li>
	                	<li class="list-group-item border-0 d-flex align-items-center p-4 mb-2 bg-gray-100 border-radius-lg">
		                  	<div class="">
		                    	<span class="text-sm">Password: <span class="text-dark font-weight-bold ms-sm-2">********</span></span>
			                </div>
		                  	<div class="ms-auto text-end">
		                    	<!-- <a class="btn btn-link text-danger text-gradient mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a> -->
		                    	<a class="btn btn-link text-dark mb-0" id="myBtn3" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
		                  	</div>
	                	</li>
	          		</ul>
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
              <h5 class="modal-title">Edit Username</h5>
          </div>
          <form class="" id="myform" action="{{ route('admin.update_name')}}" method="POST">
	        @csrf
            <div class="modal-body">
            	<div class="mb-3 d-none">
                    <input type="text" class="form-control" name="user_id" value="{{ $data->id }}">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $data->username }}">
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
              <h5 class="modal-title">Edit Email</h5>
          </div>
          <form class="" id="myform2" action="{{ route('admin.update_email')}}" method="POST">
	        @csrf
            <div class="modal-body">
            	<div class="mb-3 d-none">
                    <input type="text" class="form-control" name="user_id" value="{{ $data->id }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $data->email }}">
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
    $("#myBtn2").click(function() {
        $("#myModal2").modal("show");
    });
});
</script>
@endsection