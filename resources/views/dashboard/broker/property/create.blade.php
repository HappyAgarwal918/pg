@extends('dashboard.layouts.master')

@section('title', 'Add Properties')
@section('description', 'Properties')

@section('content')
<div class="row">
  <div class="col-xl-7 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title mb-5">Add Properties</p>
        <!-- MultiStep Form -->
        <form action="{{ route('broker.property.store')}}" method="POST" id="multistep_form" enctype="multipart/form-data" class="prevent_multiple_submit">
          @csrf
          <div id="form1" class="tab">
            <div class="panel-body">
              <div class="progress">
                <div class="progress-bar progress-bar-striped color progress-bar-animated" role="progressbar" style="width: 2%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
              <div class="form-group form_part row">
                <label for="locality" class="col-md-3 col-form-label">Locality</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="locality" name="locality" placeholder="Locality">
                <label id="locality-error" class="error" for="locality"></label>
                </div>
              </div>
              <div class="form-group form_part row d-none">
                <label for="latitude" class="col-md-3 col-form-label">Latitude</label>
                <div class="col-md-8">
                    <input type="text" name="latitude" id="latitude" class="form-control" placeholder="Latitude">
                </div>
              </div>
              <div class="form-group form_part row d-none">
                <label for="longitude" class="col-md-3 col-form-label">Longitude</label>
                <div class="col-md-8">
                  <input type="text" name="longitude" id="longitude" class="form-control" placeholder="Longitude">
                </div>
              </div>
              <div class="form-group form_part row">
                <label for="name" class="col-md-3 col-form-label">House Name</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="name" name="name" placeholder="House Name">
                <label id="name-error" class="error" for="name"></label>
                </div>
              </div>
              <div class="form-group form_part row">
                <label for="full_address" class="col-md-3 col-form-label">Full Address</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="autocomplete" name="full_address" placeholder="Full Address">
                <label id="full_address-error" class="error" for="full_address"></label>
                </div>
              </div>
            </div>
          </div>
            
          <div id="form2" class="tab">
            <div class="panel-body">
              <div class="progress">
                <div class="progress-bar progress-bar-striped color progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
              </div>
              <div class="form-group form_part row">
                <label for="room_type" class="col-md-3 col-form-label">Types of room</label>
                <div class="col-md-8">
                  <div class="form-check">
                    <label class="form-check-label" for="room_type1">
                    <input class="form-check-input" type="checkbox" name="room_type[]" value="single" id="room_type1" />
                    Single Bed</label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label" for="room_type2">
                    <input class="form-check-input" type="checkbox" name="room_type[]" value="double" id="room_type2" />
                    Double Bed</label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label" for="room_type3">
                    <input class="form-check-input" type="checkbox" name="room_type[]" value="triple" id="room_type3" />
                    Triple Bed</label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label" for="room_type4">
                    <input class="form-check-input" type="checkbox" name="room_type[]" value="four" id="room_type4" />
                    Four Bed</label>
                  </div>
                  <label id="room_type[]-error" class="error" for="room_type[]"></label>
                </div>
              </div>
            <div class="card room_type1-1 hidden">
              <div class="row mb-3">
                <div class="col-12">
                  <h3 class="room_type">Single Bed</h3>
                </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="sb_room_count" class="col-md-3 col-form-label">No. of Rooms</label>
                  <div class="col-md-8">
                      <input type="number" class="form-control" name="sb_room_count" id="sb_room_count" placeholder="Room Count" min="1" max="10">
                  <label id="sb_room_count-error" class="error" for="sb_room_count"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="sb_bathroom_count" class="col-md-3 col-form-label">No. of Bathrooms</label>
                  <div class="col-md-8">
                      <input type="number" class="form-control" name="sb_bathroom_count" id="sb_bathroom_count" placeholder="Bathroom Count" min="1" max="10">
                  <label id="sb_bathroom_count-error" class="error" for="sb_bathroom_count"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="sb_room_size" class="col-md-3 col-form-label">Sq.feet/room</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="sb_room_size" id="sb_room_size" placeholder="Room Size">
                  <label id="sb_room_size-error" class="error" for="sb_room_size"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="sb_category" class="col-md-3 col-form-label">Category</label>
                  <div class="col-md-8">
                    <select name="sb_category" class="form-select form-control" id="sb_category">
                        <option value="">Select any one</option>
                        <option value="AC">AC</option>
                        <option value="Non AC">Non AC</option>
                        <option value="Both">Both</option>
                    </select>
                  <label id="sb_category-error" class="error" for="sb_category"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="sb_furnished_type" class="col-md-3 col-form-label">Furnished Type</label>
                  <div class="col-md-8">
                    <select name="sb_furnished_type" class="form-select form-control" id="sb_furnished_type">
                        <option value="">Select any one</option>
                        <option value="Fully Furnished">Fully Furnished</option>
                        <option value="Semi Furnished">Semi Furnished</option>
                        <option value="Unfurnished">Unfurnished</option>
                    </select>
                  <label id="sb_furnished_type-error" class="error" for="sb_furnished_type"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="sb_price" class="col-md-3 col-form-label">Estimated Price/Bed</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="sb_price" id="sb_price" placeholder="Price">
                  <label id="sb_price-error" class="error" for="sb_price"></label>
                  </div>
              </div>
            </div>
            <div class="card room_type2-1 hidden">
              <div class="row mb-3 mt-5">
                <div class="col-12">
                  <h3 class="room_type">Double Bed</h3>
                </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="db_room_count" class="col-md-3 col-form-label">No. of Rooms</label>
                  <div class="col-md-8">
                      <input type="number" class="form-control" name="db_room_count" id="db_room_count" placeholder="Room Count" min="1" max="10">
                  <label id="db_room_count-error" class="error" for="db_room_count"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="db_bathroom_count" class="col-md-3 col-form-label">No. of Bathrooms</label>
                  <div class="col-md-8">
                      <input type="number" class="form-control" name="db_bathroom_count" id="db_bathroom_count" placeholder="Bathroom Count" min="1" max="10">
                  <label id="db_bathroom_count-error" class="error" for="db_bathroom_count"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="db_room_size" class="col-md-3 col-form-label">Sq.feet/room</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="db_room_size" id="db_room_size" placeholder="Room Size">
                  <label id="db_room_size-error" class="error" for="db_room_size"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="db_category" class="col-md-3 col-form-label">Category</label>
                  <div class="col-md-8">
                    <select name="db_category" class="form-select form-control" id="db_category">
                        <option value="">Select any one</option>
                        <option value="AC">AC</option>
                        <option value="Non AC">Non AC</option>
                        <option value="Both">Both</option>
                    </select>
                  <label id="db_category-error" class="error" for="db_category"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="db_furnished_type" class="col-md-3 col-form-label">Furnished Type</label>
                  <div class="col-md-8">
                    <select name="db_furnished_type" class="form-select form-control" id="db_furnished_type">
                        <option value="">Select any one</option>
                        <option value="Fully Furnished">Fully Furnished</option>
                        <option value="Semi Furnished">Semi Furnished</option>
                        <option value="Unfurnished">Unfurnished</option>
                    </select>
                  <label id="db_furnished_type-error" class="error" for="db_furnished_type"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="db_price" class="col-md-3 col-form-label">Estimated Price/Bed</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="db_price" id="db_price" placeholder="Price">
                  <label id="db_price-error" class="error" for="db_price"></label>
                  </div>
              </div>
            </div>
            <div class="card room_type3-1 hidden">
              <div class="row mb-3 mt-5">
                <div class="col-12">
                  <h3 class="room_type">Triple Bed</h3>
                </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="tb_room_count" class="col-md-3 col-form-label">No. of Rooms</label>
                  <div class="col-md-8">
                      <input type="number" class="form-control" name="tb_room_count" id="tb_room_count" placeholder="Room Count" min="1" max="10">
                  <label id="tb_room_count-error" class="error" for="tb_room_count"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="tb_bathroom_count" class="col-md-3 col-form-label">No. of Bathrooms</label>
                  <div class="col-md-8">
                      <input type="number" class="form-control" name="tb_bathroom_count" id="tb_bathroom_count" placeholder="Bathroom Count" min="1" max="10">
                  <label id="tb_bathroom_count-error" class="error" for="tb_bathroom_count"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="tb_room_size" class="col-md-3 col-form-label">Sq.feet/room</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="tb_room_size" id="tb_room_size" placeholder="Room Size">
                  <label id="tb_room_size-error" class="error" for="tb_room_size"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="tb_category" class="col-md-3 col-form-label">Category</label>
                  <div class="col-md-8">
                    <select name="tb_category" class="form-select form-control" id="tb_category">
                        <option value="">Select any one</option>
                        <option value="AC">AC</option>
                        <option value="Non AC">Non AC</option>
                        <option value="Both">Both</option>
                    </select>
                  <label id="tb_category-error" class="error" for="tb_category"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="tb_furnished_type" class="col-md-3 col-form-label">Furnished Type</label>
                  <div class="col-md-8">
                    <select name="tb_furnished_type" class="form-select form-control" id="tb_furnished_type">
                        <option value="">Select any one</option>
                        <option value="Fully Furnished">Fully Furnished</option>
                        <option value="Semi Furnished">Semi Furnished</option>
                        <option value="Unfurnished">Unfurnished</option>
                    </select>
                  <label id="tb_furnished_type-error" class="error" for="tb_furnished_type"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="tb_price" class="col-md-3 col-form-label">Estimated Price/Bed</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="tb_price" id="tb_price" placeholder="Price">
                  <label id="tb_price-error" class="error" for="tb_price"></label>
                  </div>
              </div>
            </div>
            <div class="card room_type4-1 hidden">
              <div class="row mb-3 mt-5">
                <div class="col-12">
                  <h3 class="room_type">Four Bed</h3>
                </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="fb_room_count" class="col-md-3 col-form-label">No. of Rooms</label>
                  <div class="col-md-8">
                      <input type="number" class="form-control" name="fb_room_count" id="fb_room_count" placeholder="Room Count" min="1" max="10">
                  <label id="fb_room_count-error" class="error" for="fb_room_count"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="fb_bathroom_count" class="col-md-3 col-form-label">No. of Bathrooms</label>
                  <div class="col-md-8">
                      <input type="number" class="form-control" name="fb_bathroom_count" id="fb_bathroom_count" placeholder="Bathroom Count" min="1" max="10">
                  <label id="fb_bathroom_count-error" class="error" for="fb_bathroom_count"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="fb_room_size" class="col-md-3 col-form-label">Sq.feet/room</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="fb_room_size" id="fb_room_size" placeholder="Room Size">
                  <label id="fb_room_size-error" class="error" for="fb_room_size"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="fb_category" class="col-md-3 col-form-label">Category</label>
                  <div class="col-md-8">
                    <select name="fb_category" class="form-select form-control" id="fb_category">
                        <option value="">Select any one</option>
                        <option value="AC">AC</option>
                        <option value="Non AC">Non AC</option>
                        <option value="Both">Both</option>
                    </select>
                  <label id="fb_category-error" class="error" for="fb_category"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="fb_furnished_type" class="col-md-3 col-form-label">Furnished Type</label>
                  <div class="col-md-8">
                    <select name="fb_furnished_type" class="form-select form-control" id="fb_furnished_type">
                        <option value="">Select any one</option>
                        <option value="Fully Furnished">Fully Furnished</option>
                        <option value="Semi Furnished">Semi Furnished</option>
                        <option value="Unfurnished">Unfurnished</option>
                    </select>
                  <label id="fb_furnished_type-error" class="error" for="fb_furnished_type"></label>
                  </div>
              </div>
              <div class="form-group form_part row mb-3">
                  <label for="fb_price" class="col-md-3 col-form-label">Estimated Price/Bed</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="fb_price" id="fb_price" placeholder="Price">
                  <label id="fb_price-error" class="error" for="fb_price"></label>
                  </div>
              </div>
            </div>
            </div>
          </div>
            
          <div id="form3" class="tab">
            <div class="panel-body">
              <div class="progress">
                <div class="progress-bar progress-bar-striped color progress-bar-animated" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
              </div>
              <div class="form-group form_part row">
                <label for="food" class="col-md-3 col-form-label">Food Availibility</label>
                <div class="col-md-8">
                  <div class="d-flex">
                  <div class="form-check">
                    <label class="form-check-label" for="food1">
                    <input class="form-check-input ml-0" type="radio" name="food" id="food1" value="yes">
                    Yes</label>
                  </div>
                  <div class="form-check mx-5">
                    <label class="form-check-label" for="food2">
                    <input class="form-check-input ml-0" type="radio" name="food" id="food2" value="no">
                    No</label>
                  </div>
                  </div>
                <label id="food-error" class="error" for="food"></label>
                </div>
              </div>
              <div class="form-group form_part row food1-1 hidden">
                <label for="meal_type" class="col-md-3 col-form-label">Types of Meal</label>
                <div class="col-md-8">
                    <select name="meal_type" class="form-select form-control" id="meal_type">
                        <option value="">Select any one</option>
                        <option value="Veg">Only Veg</option>
                        <option value="Non-Veg">Only Non-veg</option>
                        <option value="Both">Both</option>
                    </select>
                <label id="meal_type-error" class="error" for="meal_type"></label>
                </div>
              </div>
            </div>
          </div>
          <div id="form4" class="tab">
            <div class="panel-body">
              <div class="progress">
                <div class="progress-bar progress-bar-striped color progress-bar-animated" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
              </div>
              <div class="form-group form_part row">
                <label for="tenant" class="col-md-3 col-form-label">Preferred Tenant</label>
                <div class="col-md-8">
                    <select name="tenant" class="form-select form-control" id="tenant">
                        <option value="">Select any one</option>
                        @foreach($tenants as $tenant)
                        <option value="{{$tenant->value}}">{{$tenant->name}}</option>
                        @endforeach
                    </select>
                <label id="tenant-error" class="error" for="tenant"></label>
                </div>
              </div>
              <div class="form-group form_part row">
                <label for="amenities" class="col-md-3 col-form-label">Amenities/Common Area</label>
                <div class="col-md-8">
                  <div class="form-check">
                    <label class="form-check-label" for="parking">
                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="parking" value="parking">
                    Parking</label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label" for="wifi">
                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="wifi" value="wifi">
                    Wifi</label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label" for="cleaning">
                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="cleaning" value="cleaning">
                    Room Cleaning</label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label" for="tv">
                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="tv" value="tv">
                    T.V</label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label" for="fridge">
                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="fridge" value="fridge">
                    Fridge</label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label" for="water-cooler">
                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="water-cooler" value="water-cooler">
                    Water Cooler</label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label" for="microwave">
                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="microwave" value="microwave">
                    Microwave</label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label" for="laundry">
                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="laundry" value="laundry">
                    Laundry</label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label" for="geyser">
                    <input class="form-check-input ml-0" type="checkbox" name="amenities[]" id="geyser" value="geyser">
                    Geyser</label>
                  </div>
                  <label id="amenities[]-error" class="error" for="amenities[]"></label>
                </div>
              </div>
              <div class="form-group form_part row parking-1 hidden">
                <label for="parking_area" class="col-md-3 col-form-label">Car Parking</label>
                <div class="col-md-8">
                    <select name="parking" class="form-select form-control" id="parking_area">
                        <option value="">Select any one</option>
                        <option value="0">0</option>
                        <option value="1">1 Car</option>
                        <option value="2">2 Car</option>
                        <option value="3">3 Car</option>
                    </select>
                <label id="parking_area-error" class="error" for="parking_area"></label>
                </div>
              </div>
              <div class="form-group form_part row">
                <label for="description" class="col-md-3 col-form-label">Description</label>
                <div class="col-md-8">
                  <textarea class="form-control" id="description" name="description" rows="4" cols="20"></textarea>
                </div>
              </div>

            </div>
          </div>
          <div id="form5" class="tab">
            <div class="panel-body">
              <div class="progress">
                <div class="progress-bar progress-bar-striped color progress-bar-animated" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
              </div>
              <div class="form-group form_part row">
                <label for="upload" class="col-md-3 col-form-label">Excerpt Images<br>Upload Size : <strong>(800px x 400px)</strong></label>
                <div class="col-md-8">
                  <div class="drop-zone">
                    <span class="drop-zone__prompt">Drop file here or click to upload</span>
                    <input type="file" name="excerpt_img" class="drop-zone__input">
                  </div>
                </div>
              </div>
              <div class="form-group form_part row">
                <label for="upload" class="col-md-3 col-form-label">Property Images<br>Upload Size : <strong>(800px x 400px)</strong></label>
                <div class="col-md-8">
                    <div class="upload upload">
                      <div class="upload__wrap">
                        <div class="upload__btn">
                          <input class="upload__input" type="file" name="upload[]" id="upload" multiple="multiple" data-max-count="8" accept="image/*"/>
                        </div>
                      </div>
                      <div class="upload__mess">
                        <p class="count_img hidden_ms">Maximum Upload Property: <strong class="count_img_var">8</strong></p>
                        <p class="size_img hidden_ms">Maximum size: <strong class="size_img_var">5 Mb</strong></p>
                        <p class="file_types hidden_ms">File Format: <strong class="file_types_var">jpg, png</strong></p>
                      </div>
                    </div>
                <label id="upload-error" class="error" for="upload"></label>
                </div>
              </div>
            </div>
          </div>
          <div style="overflow:auto;">
            <div>
                <button type="button" name="previous" class="previous btn btn-light">Previous</button>
                <button type="button" name="next" class="next btn btn-primary">Next</button>
                <button type="submit" name="submit" class="prevent_multiple_submit submit btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
        <!-- /.MultiStep Form -->
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script src="{{asset('assets/broker/js/multistep-form.js')}}"></script>
<script>
    $(window).ready(function() {
    $("#multistep_form").on("keypress", function (event) {
        var keyPressed = event.keyCode || event.which;
        if (keyPressed === 13) {
            // alert("You pressed the Enter key!!");
            event.preventDefault();
            return false;
        }
    });
    });
</script> 
@endsection