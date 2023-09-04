@extends('dashboard.layouts.master')

@section('title', 'Property Page')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
            <div class="app-card shadow-sm p-4">
        <div class="app-card-body">
        <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">House Name:</label></div>
                <div class="col-md-9"><p>{{ $property->name }}</p></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Full Address:</label></div>
                <div class="col-md-9"><p>{{ $property->full_address }}</p></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Room Type:</label></div>
                @isset($property['room_type'])
                <div class="col-md-9"><p>@foreach($property['room_type'] as $key => $value) {{ $value }} <br> @endforeach</p></div>
                @endisset
            </div>
            @if(in_array('single', $property['room_type']))
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">No of Single Room :</label></div>
                <div class="col-md-9"><p>{{ $property->sb_room_count }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">No of Single Washroom :</label></div>
                <div class="col-md-9"><p>{{ $property->sb_bathroom_count }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">No of Single Room Size :</label></div>
                <div class="col-md-9"><p>{{ $property->sb_room_size }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Single Room Category :</label></div>
                <div class="col-md-9"><p>{{ $property->sb_category }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Furnished Type:</label></div>
                <div class="col-md-9"><p>{{ $property->sb_furnished_type }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Single Room Price:</label></div>
                <div class="col-md-9"><p>{{ $property->sb_price }}</p></div>  
            </div>
            @endif
            @if(in_array('double', $property['room_type']))
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">No of Double Room :</label></div>
                <div class="col-md-9"><p>{{ $property->db_room_count }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">No of Double Washroom :</label></div>
                <div class="col-md-9"><p>{{ $property->db_bathroom_count }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">No of Double Room Size :</label></div>
                <div class="col-md-9"><p>{{ $property->db_room_size }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Double Room Category :</label></div>
                <div class="col-md-9"><p>{{ $property->db_category }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Furnished Type:</label></div>
                <div class="col-md-9"><p>{{ $property->db_furnished_type }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Double Room Price:</label></div>
                <div class="col-md-9"><p>{{ $property->db_price }}</p></div>  
            </div>
            @endif
            @if(in_array('triple', $property['room_type']))
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">No of Triple Room :</label></div>
                <div class="col-md-9"><p>{{ $property->tb_room_count }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">No of Triple Washroom :</label></div>
                <div class="col-md-9"><p>{{ $property->tb_bathroom_count }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">No of Triple Room Size :</label></div>
                <div class="col-md-9"><p>{{ $property->tb_room_size }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Triple Room Category :</label></div>
                <div class="col-md-9"><p>{{ $property->tb_category }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Furnished Type:</label></div>
                <div class="col-md-9"><p>{{ $property->tb_furnished_type }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Triple Room Price:</label></div>
                <div class="col-md-9"><p>{{ $property->tb_price }}</p></div>  
            </div>
            @endif
            @if(in_array('four', $property['room_type']))
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">No of Fourbed Room :</label></div>
                <div class="col-md-9"><p>{{ $property->fb_room_count }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">No of Fourbed Washroom :</label></div>
                <div class="col-md-9"><p>{{ $property->fb_bathroom_count }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">No of Fourbed Room Size :</label></div>
                <div class="col-md-9"><p>{{ $property->fb_room_size }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Fourbed Room Category :</label></div>
                <div class="col-md-9"><p>{{ $property->fb_category }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Furnished Type:</label></div>
                <div class="col-md-9"><p>{{ $property->fb_furnished_type }}</p></div>  
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Fourbed Room Price:</label></div>
                <div class="col-md-9"><p>{{ $property->fb_price }}</p></div>  
            </div>
            @endif
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Food Availability:</label></div>
                <div class="col-md-9"><p>{{ $property->food}}</p></div>
            </div>
            @if($property->food == 'yes')
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Meal Type:</label></div>
                <div class="col-md-9"><p>{{ $property->meal_type}}</p></div>
            </div>
            @endif
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Tenant:</label></div>
                <div class="col-md-9"><p>{{ $property->tenant}}</p></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Amenties:</label></div>
                <div class="col-md-9"><p>@foreach($property['amenities'] as $key => $value) {{ $value }}<br> @endforeach</p></div>
            </div>
            @if(in_array('parking', $property['amenities']))
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">No of Parking:</label></div>
                <div class="col-md-9"><p>{{ $property->parking}}</p></div>
            </div>
            @endif
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Description:</label></div>
                <div class="col-md-9"><p>{{ $property->description}}</p></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Excerpt Image:</label></div>
                <div class="col-md-9"><a class="image-link" href="">
                    @if(sizeof($properties['propertyimg']))
                    <img src="{{ asset($property['propertyimg']['0']->img_src)}}" width="100">
                    @else
                    <img src="{{ asset('property_img/room-sketch.jpg') }}">
                    @endif
                </a>&emsp;<a><img src="" width="100"></a></div>
            </div>
            <div class="row mb-3 border-bottom">
                <div class="col-md-3"><label class="form-label">Images:</label></div>
                <div class="col-md-9">
                    @foreach($property['image'] as $images)
                    <img src="{{ asset($images->img_src) }}" width="100" class="mr-3">
                    @endforeach
                </div>
            </div>
            <div class="badge badge-success badge-success-alt white-sp-normal px-3">
                <a href="{{ route('owner.property.edit', encrypt($property->id)) }}">Edit</a>
            </div>
        </div><!--//app-card-body-->
    </div><!--//app-card-->
            </div>
        </div>
    </div>
</div>
@endsection