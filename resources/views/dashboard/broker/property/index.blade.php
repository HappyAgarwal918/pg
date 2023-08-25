@extends('dashboard.layouts.master')

@section('title', 'All Properties')
@section('description', 'Properties')
@section('css')
<style type="text/css">
  .dt-buttons .btn-secondary{
    background-color: #fff !important;
    border: 1px solid #000;
  }
  .dt-buttons .btn-secondary:hover{
    color: #4b49ac !important;
  }
  .btn-group > .btn:not(:first-child){
    margin-left: 0px !important;
  }
</style>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Advanced Table</p>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="example" class="table display expandable-table">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Image</th>
                    <th>Full Address</th>
                    <th>Room type</th>
                    <th>Meal Type</th>
                    <th>Tenant</th>
                    <th>Amenities</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data1 as $key => $properties)
                  <tr>
                    <!-- <td>
                      <a href="#">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-blue mr-3">EB</div>

                          <div class="">
                            <p class="font-weight-bold mb-0">Ethan Black</p>
                            <p class="text-muted mb-0">ethan-black@example.com</p>
                          </div>
                        </div>
                      </a>
                    </td> -->
                    <td class="white-sp-normal">{{ $key +1 }}</td>
                    <td class="white-sp-normal"><img src="{{ asset($properties['propertyimg']['0']->img_src) }}"></td>
                    <td class="white-sp-normal">{{ $properties->full_address }}</td>
                    <td class="white-sp-normal">{{ $properties->room_type }}</td>
                    <td class="white-sp-normal">{{ $properties->meal_type }}</td>
                    <td class="white-sp-normal">{{ $properties->tenant }}</td>
                    <td class="white-sp-normal">{{ $properties->amenities }}</td>
                    <td>
                        <div class="badge badge-success badge-success-alt white-sp-normal"><a href="{{ route('broker.property.edit', encrypt($properties->id)) }}">Edit</a></div>
                        <div class="badge badge-success badge-success-alt white-sp-normal"><a href="{{ route('broker.property.show',encrypt($properties->id)) }}">View</a></div>
                        <div class="badge badge-success badge-success-alt white-sp-normal">
                        <a href="{{ route('broker.property.destroy', encrypt($properties->id)) }}"
                            onclick="event.preventDefault();
                            document.getElementById('delete-property').submit();">
                            Delete
                        </a>
                        <form id="delete-property" action="{{ route('broker.property.destroy', encrypt($properties->id)) }}" method="POST" >
                        <input name="_method" type="hidden" value="DELETE">
                          @csrf
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <a class="btn btn-primary mt-3" href="{{ route('broker.property.create') }}">Add Property</a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection