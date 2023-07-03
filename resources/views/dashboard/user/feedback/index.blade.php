@extends('dashboard.layouts.master')

@section('title', 'User Feedback')
@section('description', 'Feedback')

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
        <p class="card-title">Feedback Table</p>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="example" class="table display expandable-table">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Vendor Name</th>
                    <th>Rating</th>
                    <th>Reviews</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key => $feedback)
                  <tr>
                    <td class="white-sp-normal">{{ $key +1 }}</td>
                    <td class="white-sp-normal">{{ $feedback['feedback_vendor']->username }}</td>
                    <td class="white-sp-normal">{{ $feedback->rating }}</td>
                    <td class="white-sp-normal">{{ $feedback->feedback }}</td>
                    <td>
                      <!-- <div class="badge badge-success badge-success-alt white-sp-normal"><a href="{{ route('feedback.edit', encrypt($feedback->id)) }}" data-toggle="modal" data-target="#modal1">Edit</a></div> -->
                      <div class="badge badge-success badge-success-alt white-sp-normal"><a href="{{ route('feedback.show', encrypt($feedback->id)) }}" data-toggle="modal" data-target="#modal2">View</a></div>
                      <div class="badge badge-success badge-success-alt white-sp-normal">
                      <a href="{{ route('feedback.destroy', encrypt($feedback->id)) }}"
                               onclick="event.preventDefault();
                                             document.getElementById('delete-feedback').submit();">
                                Delete
                            </a>
                      <form id="delete-feedback" action="{{ route('feedback.destroy', encrypt($feedback->id)) }}" method="POST" >
                      <input name="_method" type="hidden" value="DELETE">
                        @csrf
                      </form>
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
</div>

<!-- Modal1
<div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Review & Rating</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<div class="modal-body">
	        <div class="mb-3">
          <div class="form-group">
            <label for="feedback">How was your experience</label>
                <textarea class="form-control" id="feedback" name="feedback" rows="10" placeholder="Write your feedback here"></textarea>
                    </div>
                    <button type="submit" class="col-md-12 btn btn-primary mt-5">Submit Feedback</button>
	        </div>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Save changes</button>
      	</div>
    </div>
  </div>
</div> -->

<!--Modal 2--->

<div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Review & Rating</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<div class="modal-body">
	        <div class="mb-3">
	            <label for="feedback" class="form-label">Feedback</label>
	            <input type="text" class="form-control" name="feedback" value="">
	        </div>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Save changes</button>
      	</div>
    </div>
  </div>
</div>

@endsection