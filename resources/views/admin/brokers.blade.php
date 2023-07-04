@extends('admin.layouts.master')

@section('title', 'Admin/Brokers')
@section('page', 'Broker')
@section('description', 'Dashboard')

@section('content')
<div class="container-fluid p-0">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Broker table</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive px-5 py-0">
            <a class="btn btn-success addnew-button" target="_blank" href="{{ route('admin.newuser')}}">Add New</a>
            <table id="table_id" class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $value)
                <tr>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $key+1 }}</span>
                  </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        @if($value->profile_pic == NULL)
                        <img src="{{ asset('profilepic/default.jpg')}}" class="avatar avatar-sm me-3" alt="user1">
                        @else
                        <img src="{{ asset($value->profile_pic)}}" class="avatar avatar-sm me-3" alt="user1">
                        @endif
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $value->name }}</h6>
                        <p class="text-xs text-secondary mb-0">{{ $value->email }}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">Manager</p>
                    <p class="text-xs text-secondary mb-0">Organization</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-success">Online</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                  </td>
                  <td class="align-middle">
                    <a class="btn btn-link text-danger text-gradient mb-0" href="{{ route('admin.destroy', encrypt($value->id))}}"><i class="far fa-trash-alt me-2"></i>Delete</a>
                    <a class="btn btn-link text-dark mb-0" href="{{ route('admin.edit', encrypt($value->id))}}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection