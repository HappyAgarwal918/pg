@extends('dashboard.layouts.master')

@section('title', 'Edit Properties')
@section('description', 'Properties')

@section('css')
<style type="text/css">
	.hidden{
	    display: none;
	  }
</style>
@endsection

@section('content')
@php $amenities = $data['amenities'] @endphp
<div class="row">
	<div class="col-md-8 grid-margin stretch-card">
	    <div class="card">
	      	<div class="card-body">
	      		<p class="card-title">Edit Properties</p>
	      		<form action="{{ route('owner.property.update', encrypt($data->id))}}" method="POST" enctype="multipart/form-data">
				  <input name="_method" type="hidden" value="PUT">
          		@csrf
	          		<div class="form-group form_part row">
	                	<label for="locality" class="col-md-3 col-form-label">Locality</label>
	                	<div class="col-md-8">
	                    	<input type="text" class="form-control" id="locality" name="locality" placeholder="Locality" value="{{ $data->locality }}">
	                		<label id="locality-error" class="error" for="locality"></label>
	                	</div>
	              	</div>
	              	<div class="form-group form_part row d-none">
	                	<label for="latitude" class="col-md-3 col-form-label">Latitude</label>
	                	<div class="col-md-8">
	                    	<input type="text" name="latitude" id="latitude" class="form-control" placeholder="Latitude" value="{{ $data->latitude }}">
	                	</div>
	              	</div>
	              	<div class="form-group form_part row d-none">
	                	<label for="longitude" class="col-md-3 col-form-label">Longitude</label>
	                	<div class="col-md-8">
	                  		<input type="text" name="longitude" id="longitude" class="form-control" placeholder="Longitude" value="{{ $data->longitude }}">
	                	</div>
	              	</div>
	              	<div class="form-group form_part row">
	                	<label for="full_address" class="col-md-3 col-form-label">Full Address</label>
	                	<div class="col-md-8">
	                    	<input type="text" class="form-control" id="autocomplete" name="full_address" placeholder="Full Address" value="{{ $data->full_address }}">
	                		<label id="full_address-error" class="error" for="full_address"></label>
	                	</div>
	              	</div>
	              	<div class="form-group form_part row">
		                <label for="room_type" class="col-md-3 col-form-label">Types of room</label>
		                <div class="col-md-8">
		                  <div class="form-check">
		                  	<label class="form-check-label" for="room_type1">
		                    <input class="form-check-input" type="checkbox" name="room_type[]" value="single" id="room_type1" @if(in_array('single' ,$data['room_type'])) checked @endif />
		                    Single Bed</label>
		                  </div>
		                  <div class="form-check">
		                  	<label class="form-check-label" for="room_type2">
		                    <input class="form-check-input" type="checkbox" name="room_type[]" value="double" id="room_type2" @if(in_array('double' ,$data['room_type'])) checked @endif/>
		                    Double Bed</label>
		                  </div>
		                  <div class="form-check">
		                  	<label class="form-check-label" for="room_type3">
		                    <input class="form-check-input" type="checkbox" name="room_type[]" value="triple" id="room_type3" @if(in_array('triple' ,$data['room_type'])) checked @endif />
		                    Triple Bed</label>
		                  </div>
		                  <div class="form-check">
		                  	<label class="form-check-label" for="room_type4">
		                    <input class="form-check-input" type="checkbox" name="room_type[]" value="four" id="room_type4" @if(in_array('four' ,$data['room_type'])) checked @endif />
		                    Four Bed</label>
		                  </div>
		                  <label id="room_type[]-error" class="error" for="room_type[]"></label>
		                </div>
		            </div>
		            <div class="card room_type1-1  @if(!in_array('single' ,$data['room_type'])) hidden @endif">
		              <div class="row mb-3">
		                <div class="col-12">
		                  <h3 class="room_type">Single Bed</h3>
		                </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="sb_room_count" class="col-md-3 col-form-label">No. of Rooms</label>
		                  <div class="col-md-8">
		                      <input type="number" class="form-control" name="sb_room_count" id="sb_room_count" placeholder="Room Count" min="1" max="10" value="{{ $data->sb_room_count }}">
		                  <label id="sb_room_count-error" class="error" for="sb_room_count"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="sb_bathroom_count" class="col-md-3 col-form-label">No. of Bathrooms</label>
		                  <div class="col-md-8">
		                      <input type="number" class="form-control" name="sb_bathroom_count" id="sb_bathroom_count" placeholder="Bathroom Count" min="1" max="10" value="{{ $data->sb_bathroom_count }}">
		                  <label id="sb_bathroom_count-error" class="error" for="sb_bathroom_count"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="sb_room_size" class="col-md-3 col-form-label">Sq.feet/room</label>
		                  <div class="col-md-8">
		                      <input type="text" class="form-control" name="sb_room_size" id="sb_room_size" placeholder="Room Size" value="{{ $data->sb_room_size }}">
		                  <label id="sb_room_size-error" class="error" for="sb_room_size"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="sb_category" class="col-md-3 col-form-label">Category</label>
		                  <div class="col-md-8">
		                    <select name="sb_category" class="form-select form-control" id="sb_category">
		                    	<option value="">Select any one</option>
		                        <option value="AC" @if($data->sb_category == "AC") selected  @endif>AC</option>
		                        <option value="Non AC" @if($data->sb_category == "Non AC") selected  @endif>Non AC</option>
		                        <option value="Both" @if($data->sb_category == "Both") selected  @endif>Both</option>
		                    </select>
		                  <label id="sb_category-error" class="error" for="sb_category"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="sb_furnished_type" class="col-md-3 col-form-label">Furnished Type</label>
		                  <div class="col-md-8">
		                    <select name="sb_furnished_type" class="form-select form-control" id="sb_furnished_type">
		                    	<option value="">Select any one</option>
		                        <option value="Fully Furnished" @if($data->sb_furnished_type == "Fully Furnished") selected  @endif>Fully Furnished</option>
		                        <option value="Semi Furnished" @if($data->sb_furnished_type == "Semi Furnished") selected  @endif>Semi Furnished</option>
		                        <option value="Unfurnished" @if($data->sb_furnished_type == "Unfurnished") selected  @endif>Unfurnished</option>
		                    </select>
		                  <label id="sb_furnished_type-error" class="error" for="sb_furnished_type"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="sb_price" class="col-md-3 col-form-label">Estimated Price/Bed</label>
		                  <div class="col-md-8">
		                      <input type="text" class="form-control" name="sb_price" id="sb_price" placeholder="Price" value="{{ $data->sb_price }}">
		                  <label id="sb_price-error" class="error" for="sb_price"></label>
		                  </div>
		              </div>
		            </div>
		            <div class="card room_type2-1 @if(!in_array('double' ,$data['room_type'])) hidden @endif">
		              <div class="row mb-3 mt-5">
		                <div class="col-12">
		                  <h3 class="room_type">Double Bed</h3>
		                </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="db_room_count" class="col-md-3 col-form-label">No. of Rooms</label>
		                  <div class="col-md-8">
		                      <input type="number" class="form-control" name="db_room_count" id="db_room_count" placeholder="Room Count" min="1" max="10" value="{{ $data->db_room_count }}">
		                  <label id="db_room_count-error" class="error" for="db_room_count"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="db_bathroom_count" class="col-md-3 col-form-label">No. of Bathrooms</label>
		                  <div class="col-md-8">
		                      <input type="number" class="form-control" name="db_bathroom_count" id="db_bathroom_count" placeholder="Bathroom Count" min="1" max="10" value="{{ $data->db_bathroom_count }}">
		                  <label id="db_bathroom_count-error" class="error" for="db_bathroom_count"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="db_room_size" class="col-md-3 col-form-label">Sq.feet/room</label>
		                  <div class="col-md-8">
		                      <input type="text" class="form-control" name="db_room_size" id="db_room_size" placeholder="Room Size" value="{{ $data->db_room_size }}">
		                  <label id="db_room_size-error" class="error" for="db_room_size"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="db_category" class="col-md-3 col-form-label">Category</label>
		                  <div class="col-md-8">
		                    <select name="db_category" class="form-select form-control" id="db_category">
		                    	<option value="">Select any one</option>
		                        <option value="AC" @if($data->db_category == "AC") selected  @endif>AC</option>
		                        <option value="Non AC" @if($data->db_category == "Non AC") selected  @endif>Non AC</option>
		                        <option value="Both" @if($data->db_category == "Both") selected  @endif>Both</option>
		                    </select>
		                  <label id="db_category-error" class="error" for="db_category"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="db_furnished_type" class="col-md-3 col-form-label">Furnished Type</label>
		                  <div class="col-md-8">
		                    <select name="db_furnished_type" class="form-select form-control" id="db_furnished_type">
		                    	<option value="">Select any one</option>
		                        <option value="Fully Furnished" @if($data->db_furnished_type == "Fully Furnished") selected  @endif>Fully Furnished</option>
		                        <option value="Semi Furnished" @if($data->db_furnished_type == "Semi Furnished") selected  @endif>Semi Furnished</option>
		                        <option value="Unfurnished" @if($data->db_furnished_type == "Unfurnished") selected  @endif>Unfurnished</option>
		                    </select>
		                  <label id="db_furnished_type-error" class="error" for="db_furnished_type"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="db_price" class="col-md-3 col-form-label">Estimated Price/Bed</label>
		                  <div class="col-md-8">
		                      <input type="text" class="form-control" name="db_price" id="db_price" placeholder="Price" value="{{ $data->db_price }}">
		                  <label id="db_price-error" class="error" for="db_price"></label>
		                  </div>
		              </div>
		            </div>
		            <div class="card room_type3-1 @if(!in_array('triple' ,$data['room_type'])) hidden @endif">
		              <div class="row mb-3 mt-5">
		                <div class="col-12">
		                  <h3 class="room_type">Triple Bed</h3>
		                </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="tb_room_count" class="col-md-3 col-form-label">No. of Rooms</label>
		                  <div class="col-md-8">
		                      <input type="number" class="form-control" name="tb_room_count" id="tb_room_count" placeholder="Room Count" min="1" max="10" value="{{ $data->tb_room_count }}">
		                  <label id="tb_room_count-error" class="error" for="tb_room_count"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="tb_bathroom_count" class="col-md-3 col-form-label">No. of Bathrooms</label>
		                  <div class="col-md-8">
		                      <input type="number" class="form-control" name="tb_bathroom_count" id="tb_bathroom_count" placeholder="Bathroom Count" min="1" max="10" value="{{ $data->tb_bathroom_count }}">
		                  <label id="tb_bathroom_count-error" class="error" for="tb_bathroom_count"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="tb_room_size" class="col-md-3 col-form-label">Sq.feet/room</label>
		                  <div class="col-md-8">
		                      <input type="text" class="form-control" name="tb_room_size" id="tb_room_size" placeholder="Room Size" value="{{ $data->tb_room_size }}">
		                  <label id="tb_room_size-error" class="error" for="tb_room_size"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="tb_category" class="col-md-3 col-form-label">Category</label>
		                  <div class="col-md-8">
		                    <select name="tb_category" class="form-select form-control" id="tb_category">
		                    	<option value="">Select any one</option>
		                        <option value="AC" @if($data->tb_category == "AC") selected  @endif>AC</option>
		                        <option value="Non AC" @if($data->tb_category == "Non AC") selected  @endif>Non AC</option>
		                        <option value="Both" @if($data->tb_category == "Both") selected  @endif>Both</option>
		                    </select>
		                  <label id="tb_category-error" class="error" for="tb_category"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="tb_furnished_type" class="col-md-3 col-form-label">Furnished Type</label>
		                  <div class="col-md-8">
		                    <select name="tb_furnished_type" class="form-select form-control" id="tb_furnished_type">
		                    	<option value="">Select any one</option>
		                        <option value="Fully Furnished" @if($data->tb_furnished_type == "Fully Furnished") selected  @endif>Fully Furnished</option>
		                        <option value="Semi Furnished" @if($data->tb_furnished_type == "Semi Furnished") selected  @endif>Semi Furnished</option>
		                        <option value="Unfurnished" @if($data->tb_furnished_type == "Unfurnished") selected  @endif>Unfurnished</option>
		                    </select>
		                  <label id="tb_furnished_type-error" class="error" for="tb_furnished_type"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="tb_price" class="col-md-3 col-form-label">Estimated Price/Bed</label>
		                  <div class="col-md-8">
		                      <input type="text" class="form-control" name="tb_price" id="tb_price" placeholder="Price" value="{{ $data->tb_price }}">
		                  <label id="tb_price-error" class="error" for="tb_price"></label>
		                  </div>
		              </div>
		            </div>
		            <div class="card room_type4-1 @if(!in_array('four' ,$data['room_type'])) hidden @endif">
		              <div class="row mb-3 mt-5">
		                <div class="col-12">
		                  <h3 class="room_type">Four Bed</h3>
		                </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="fb_room_count" class="col-md-3 col-form-label">No. of Rooms</label>
		                  <div class="col-md-8">
		                      <input type="number" class="form-control" name="fb_room_count" id="fb_room_count" placeholder="Room Count" min="1" max="10" value="{{ $data->fb_room_count }}">
		                  <label id="fb_room_count-error" class="error" for="fb_room_count"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="fb_bathroom_count" class="col-md-3 col-form-label">No. of Bathrooms</label>
		                  <div class="col-md-8">
		                      <input type="number" class="form-control" name="fb_bathroom_count" id="fb_bathroom_count" placeholder="Bathroom Count" min="1" max="10" value="{{ $data->fb_bathroom_count }}">
		                  <label id="fb_bathroom_count-error" class="error" for="fb_bathroom_count"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="fb_room_size" class="col-md-3 col-form-label">Sq.feet/room</label>
		                  <div class="col-md-8">
		                      <input type="text" class="form-control" name="fb_room_size" id="fb_room_size" placeholder="Room Size" value="{{ $data->fb_room_size }}">
		                  <label id="fb_room_size-error" class="error" for="fb_room_size"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="fb_category" class="col-md-3 col-form-label">Category</label>
		                  <div class="col-md-8">
		                    <select name="fb_category" class="form-select form-control" id="fb_category">
		                    	<option value="">Select any one</option>
		                        <option value="AC" @if($data->fb_category == "AC") selected  @endif>AC</option>
		                        <option value="Non AC" @if($data->fb_category == "Non AC") selected  @endif>Non AC</option>
		                        <option value="Both" @if($data->fb_category == "Both") selected  @endif>Both</option>
		                    </select>
		                  <label id="fb_category-error" class="error" for="fb_category"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="fb_furnished_type" class="col-md-3 col-form-label">Furnished Type</label>
		                  <div class="col-md-8">
		                    <select name="fb_furnished_type" class="form-select form-control" id="fb_furnished_type">
		                    	<option value="">Select any one</option>
		                        <option value="Fully Furnished" @if($data->fb_furnished_type == "Fully Furnished") selected  @endif>Fully Furnished</option>
		                        <option value="Semi Furnished" @if($data->fb_furnished_type == "Semi Furnished") selected  @endif>Semi Furnished</option>
		                        <option value="Unfurnished" @if($data->fb_furnished_type == "Unfurnished") selected  @endif>Unfurnished</option>
		                    </select>
		                  <label id="fb_furnished_type-error" class="error" for="fb_furnished_type"></label>
		                  </div>
		              </div>
		              <div class="form-group form_part row mb-3">
		                  <label for="fb_price" class="col-md-3 col-form-label">Estimated Price/Bed</label>
		                  <div class="col-md-8">
		                      <input type="text" class="form-control" name="fb_price" id="fb_price" placeholder="Price" value="{{ $data->fb_price }}">
		                  <label id="fb_price-error" class="error" for="fb_price"></label>
		                  </div>
		              </div>
		            </div>
		            <div class="form-group form_part row">
		                <label for="food" class="col-md-3 col-form-label">Food Availibility</label>
		                <div class="col-md-8 d-flex">
		                  <div class="form-check">
		                  	<label class="form-check-label" for="food1">
		                    <input class="form-check-input ml-0" type="radio" name="food" id="food1" value="yes" @if($data->food == "yes") checked  @endif>
		                    Yes</label>
		                  </div>
		                  <div class="form-check mx-5">
		                  	<label class="form-check-label" for="food2">
		                    <input class="form-check-input ml-0" type="radio" name="food" id="food2" value="no" @if($data->food == "no") checked @endif>
		                    No</label>
		                  </div>
		                <label id="food-error" class="error" for="food"></label>
		                </div>
		              </div>
		              <div class="form-group form_part row food1-1 @if($data->food == 'no') hidden @endif">
		                <label for="meal_type" class="col-md-3 col-form-label">Types of Meal</label>
		                <div class="col-md-8">
		                    <select name="meal_type" class="form-select form-control" id="meal_type">
		                    	<option value="">Select any one</option>
		                        <option value="Veg" @if($data->meal_type == "Veg") selected  @endif>Only Veg</option>
		                        <option value="Non-Veg" @if($data->meal_type == "Non-Veg") selected  @endif>Only Non-veg</option>
		                        <option value="Both" @if($data->meal_type == "Both") selected  @endif>Both</option>
		                    </select>
		                <label id="meal_type-error" class="error" for="meal_type"></label>
		                </div>
		            </div>
		            <div class="form-group form_part row">
		                <label for="tenant" class="col-md-3 col-form-label">Preferred Tenant</label>
		                <div class="col-md-8">
		                    <select name="tenant" class="form-select form-control" id="tenant">
		                    	<option value="">Select any one</option>
		                        <option value="All" @if($data->tenant == "All") selected  @endif>All</option>
		                        <option value="Boys Only" @if($data->tenant == "Boys Only") selected  @endif>Boys Only</option>
		                        <option value="Girls Only" @if($data->tenant == "Girls Only") selected  @endif>Girls Only</option>
		                        <option value="Family Only" @if($data->tenant == "Family Only") selected  @endif>Family Only</option>
		                        <option value="Boys & Girls" @if($data->tenant == "Boys & Girls") selected  @endif>Boys & Girls</option>
		                        <option value="Boys & Family" @if($data->tenant == "Boys & Family") selected  @endif>Boys & Family</option>
		                        <option value="Girls & Family" @if($data->tenant == "Girls & Family") selected  @endif>Girls & Family</option>
		                    </select>
		                <label id="tenant-error" class="error" for="tenant"></label>
		                </div>
		              </div>
		              <div class="form-group form_part row">
		                <label for="amenities" class="col-md-3 col-form-label">Amenities/Common Area</label>
		                <div class="col-md-8">
		                  <div class="form-check">
		                  	<label class="form-check-label" for="parking">
		                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="parking" value="parking" @if(in_array("parking" ,$amenities)) checked @endif>
		                    Parking</label>
		                  </div>
		                  <div class="form-check">
		                  	<label class="form-check-label" for="wifi">
		                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="wifi" value="wifi" @if(in_array("wifi" ,$amenities)) checked @endif>
		                    Wifi</label>
		                  </div>
		                  <div class="form-check">
		                  	<label class="form-check-label" for="cleaning">
		                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="cleaning" value="cleaning" @if(in_array("cleaning" ,$amenities)) checked @endif>
		                    Room Cleaning</label>
		                  </div>
		                  <div class="form-check">
		                  	<label class="form-check-label" for="tv">
		                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="tv" value="tv" @if(in_array("tv" ,$amenities)) checked @endif>
		                    T.V</label>
		                  </div>
		                  <div class="form-check">
		                  	<label class="form-check-label" for="fridge">
		                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="fridge" value="fridge" @if(in_array('fridge' ,$data['amenities'])) checked @endif>
		                    Fridge</label>
		                  </div>
		                  <div class="form-check">
		                  	<label class="form-check-label" for="water-cooler">
		                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="water-cooler" value="water-cooler" @if(in_array('water-cooler' ,$data['amenities'])) checked @endif>
		                    Water Cooler</label>
		                  </div>
		                  <div class="form-check">
		                  	<label class="form-check-label" for="microwave">
		                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="microwave" value="microwave" @if(in_array('microwave' ,$data['amenities'])) checked @endif>
		                    Microwave</label>
		                  </div>
		                  <div class="form-check">
		                  	<label class="form-check-label" for="laundry">
		                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="laundry" value="laundry" @if(in_array('laundry' ,$data['amenities'])) checked @endif>
		                    Laundry</label>
		                  </div>
		                  <div class="form-check">
		                  	<label class="form-check-label" for="geyser">
		                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="geyser" value="geyser" @if(in_array('geyser' ,$data['amenities'])) checked @endif>
		                    Geyser</label>
		                  </div>
		                <label id="amenities-error" class="error" for="amenities"></label>
		                </div>
		              </div>
		              <div class="form-group form_part row parking-1 @if(!in_array('parking' ,$data['amenities'])) hidden @endif">
		                <label for="parking_area" class="col-md-3 col-form-label">Car Parking</label>
		                <div class="col-md-8">
		                    <select name="parking" class="form-select form-control" id="parking_area">
		                    	<option value="">Select any one</option>
		                        <option value="0" @if($data->parking == "0") selected  @endif>0</option>
		                        <option value="1" @if($data->parking == "1") selected  @endif>1 Car</option>
		                        <option value="2" @if($data->parking == "2") selected  @endif>2 Car</option>
		                        <option value="3" @if($data->parking == "3") selected  @endif>3 Car</option>
		                    </select>
		                <label id="parking_area-error" class="error" for="parking_area"></label>
		                </div>
		            </div>
					<div class="form-group form_part row">
	                	<label for="description" class="col-md-3 col-form-label">Description</label>
	                	<div class="col-md-8">
	                    	<textarea class="form-control" id="description" name="description" placeholder="Description">{{ $data->description }}</textarea>
	                		<label id="description-error" class="error" for="description"></label>
	                	</div>
	              	</div>
	              	<div class="form-group form_part row">
		                <label for="upload" class="col-md-3 col-form-label">Excerpt Images<br>Upload Size : <strong>(800px x 400px)</strong></label>
		                <div class="col-md-8">
		                	<div class="row">
		                		<div class="col-md-6">
		                			@if(sizeof($data['propertyimg']))
		                			<img src="{{ asset($data['propertyimg']['0']->img_src)}}" width="100">
		                			@else
			                      	<img src="{{ asset('property_img/room-sketch.jpg') }}">
			                      	@endif
		                		</div>
		                		<div class="col-md-6">
		                			<div class="drop-zone">
					                    <span class="drop-zone__prompt">Drop file here or click to change</span>
					                    <input type="file" name="excerpt_img" class="drop-zone__input">
					                 </div>
		                		</div>
		                	</div>
		                </div>
		            </div>
		            <div><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
	            </form>
	      	</div>
	  	</div>
	</div>
	<div class="col-md-4 grid-margin">
		<div class="card">
			<div class="card-body">
				<div class="wrap">
					@foreach($data['image'] as $propertyimg)
					<div class="row mb-3" id="imgdelete{{$propertyimg->id+785}}">
						<div class="col-md-8"><img src="{{ asset($propertyimg->img_src)}}" width="200"></div>
						<div class="col-md-4"><a class="btn btn-danger" onclick="deleteimg({{$propertyimg->id+785}})">delete</a></div>
					</div>
					@endforeach
					<p class="card-title">Add New Images</p>
					<form action="{{ route('upload.propertyimg',$data->id)}}" method="POST" name="form" enctype="multipart/form-data">
						@csrf
					    <div class="upload upload">
					      <div class="upload__wrap">
					        <div class="upload__btn">
					          <input class="upload__input" type="file" name="upload[]" multiple="multiple" data-max-count="8" accept="image/*"/>
					        </div>
					      </div>
					      <div class="upload__mess">
					        <p class="count_img hidden_ms">Maximum Upload Property: <strong class="count_img_var">8</strong></p>
					        <p class="size_img hidden_ms">Maximum size: <strong class="size_img_var">5 Mb</strong></p>
					        <p class="file_types hidden_ms">File Format: <strong class="file_types_var">jpg, png</strong></p>
					      </div>
					    </div>
					    <button class="btn btn-primary mt-3" type="submit">Upload</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script src="{{asset('assets/broker/js/multistep-form.js')}}"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places" ></script>
<script>
    window.addEventListener('load', initialize);

    function initialize() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            $('#latitude').val(place.geometry['location'].lat());
            $('#longitude').val(place.geometry['location'].lng());
        });
    }
</script>
@endsection