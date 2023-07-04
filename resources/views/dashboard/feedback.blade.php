@extends('dashboard.layouts.master')

@section('title', 'Feedback')
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
                    <!-- <th>Option</th> -->
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key => $feedback)
                  <tr>
                    <td class="white-sp-normal">{{ $key +1 }}</td>
                    <td class="white-sp-normal">{{ $feedback['feedbackuser']->username }}</td>
                    <td class="white-sp-normal">{{ $feedback->rating }}</td>
                    <td class="white-sp-normal">{{ $feedback->feedback }}</td>
                    <!-- <td><div class="badge badge-success badge-success-alt white-sp-normal"><a href="">View</a></div></td> -->
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
@endsection