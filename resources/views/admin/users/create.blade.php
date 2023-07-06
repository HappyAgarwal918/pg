@extends('admin.layouts.master')

@section('title', 'Add User')
@section('page', 'Add/User')
@section('description', 'Dashboard')

@section('content')

<div class="container-fluid p-0">
  	<div class="row">
	    <div class="col-xxl-6">
	      	<div class="card mb-4">
		        <div class="card-header pb-0">
		          <h6>Register New</h6>
		        </div>
		        <div class="card-body p-4">
		        	<form action="{{ route('user.store')}}" method="POST">
					    <div class="row mb-3">
					        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
					        <div class="col-sm-9">
					            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
					        </div>
					    </div>
					    <div class="row mb-3">
					        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
					        <div class="col-sm-9">
					            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
					        </div>
					    </div>
					    <div class="row mb-3">
					        <div class="col-sm-10 offset-sm-2">
					            <div class="form-check">
					                <input class="form-check-input" type="checkbox" id="checkRemember">
					                <label class="form-check-label" for="checkRemember">Remember me</label>
					            </div>
					        </div>
					    </div>
					    <div class="row">
					        <div class="col-sm-10 offset-sm-2">
					            <button type="submit" class="btn btn-primary">Create User</button>
					        </div>
					    </div>
					</form>
		        </div>
	    	</div>
	    </div>
	</div>
</div>
@endsection