@extends('dashboard.layouts.master')

@section('title', 'Broker Dashboard')
@section('description', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Welcome {{ Auth()->user()->first_name }}</h3>
          <!-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> -->
        </div>
        <!-- <div class="col-12 col-xl-4">
         <div class="justify-content-end d-flex">
          <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
             <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
              <a class="dropdown-item" href="#">January - March</a>
              <a class="dropdown-item" href="#">March - June</a>
              <a class="dropdown-item" href="#">June - August</a>
              <a class="dropdown-item" href="#">August - November</a>
            </div>
          </div>
         </div>
        </div> -->
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card tale-bg">
        <div class="card-people mt-auto">
          <img src="{{ asset('assets/broker/images/dashboard/people.svg')}}" alt="people">
          <div class="weather-info">
            <div class="d-flex">
              <div>
                <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
              </div>
              <!-- <div class="ml-2">
                <h4 class="location font-weight-normal">Bangalore</h4>
                <h6 class="font-weight-normal">India</h6>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin transparent">
      <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
        	<div class="card data-icon-card-primary card-tale">
	            <div class="card-body">
	              <div class="row">
	                <div class="col-8 text-white">
	                  <h3 class="card-title text-white">Properties</h3>
	                  <a class="btn btn-light" type="button" href="{{ route('broker.property.create') }}">Add Property</a>
	                </div>
	                <div class="col-4"><img width="100" src="{{ asset('assets/broker/images/dashboard/property.png')}}">
	                </div>
	              </div>
	            </div>
	        </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
        	<div class="card data-icon-card-primary card-light-blue">
	            <div class="card-body">                     
	              <div class="row">
	                <div class="col-8 text-white">
	                  <h3 class="card-title text-white">Feedback</h3>
	                  <a class="btn btn-light" type="button" href="{{ route('broker.feedback')}}">Feedback</a>
	                </div>
	                <div class="col-4"><img width="100" src="{{ asset('assets/broker/images/dashboard/feedback.png')}}">
	                </div>
	              </div>
	            </div>
	        </div>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
        	<div class="card data-icon-card-primary card-dark-blue">
	            <div class="card-body">                 
	              <div class="row">
	                <div class="col-8 text-white">
	                  <h3 class="card-title text-white">Properties</h3>
	                  <a class="btn btn-light" type="button" href="{{ route('broker.property.index')}}">Add Property</a>
	                </div>
	                <div class="col-4"><img width="100" src="{{ asset('assets/broker/images/dashboard/people.svg')}}">
	                </div>
	              </div>
	            </div>
	        </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
        	<div class="card data-icon-card-primary card-light-danger">
	            <div class="card-body">               
	              <div class="row">
	                <div class="col-8 text-white">
	                  <h3 class="card-title text-white">Properties</h3>
	                  <a class="btn btn-light" type="button" href="{{ route('broker.property.index')}}">Add Property</a>
	                </div>
	                <div class="col-4"><img width="100" src="{{ asset('assets/broker/images/dashboard/people.svg')}}">
	                </div>
	              </div>
	            </div>
	        </div>
        </div>
      </div> -->
    </div>
  </div>

@endsection