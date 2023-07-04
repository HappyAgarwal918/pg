@extends('admin.layouts.master')

@section('title', 'Admin')
@section('page', 'About Us Edit')
@section('description', 'Dashboard')

@section('content')
<div class="container-fluid p-0">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>About Us</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive px-5 py-0">
            <a class="btn btn-success addnew-button" id="myBtn">Add New</a>
            <table id="table_id" class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($data['sponser'] as $key => $sponser)
                <tr>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $key+1 }}</span>
                  </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $sponser->name }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0"><img src="{{ asset(''.$sponser->path) }}" width="150px"></p>
                  </td>
                  <td class="align-middle">
                    <a class="btn btn-link text-danger text-gradient mb-0" href="{{ route('admin.destroysponser', encrypt($sponser->id))}}"><i class="far fa-trash-alt me-2"></i>Delete</a>
                    <!-- <a class="btn btn-link text-dark mb-0" href=""><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a> -->
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
<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Sponser</h5>
            </div>
            <form action="{{ route('admin.sponser')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="">
                  </div>
                <div class="mb-3">
                  <label for="image" class="form-label">Image</label>
                  <input type="file" class="form-control" name="image" value="">
                </div>
                <div class="mb-3">
                  <h4 id="imagesize">Image size is 200 x 100</h4>
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