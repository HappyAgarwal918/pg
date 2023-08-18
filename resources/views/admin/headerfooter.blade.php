@extends('admin.layouts.master')

@section('title', 'Header/Footer')
@section('page', 'Header/Footer')
@section('description', 'Dashboard')

@section('content')
<div class="container-fluid p-0">
  <div class="row">
    <div class="col-md-4 col-12 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header pb-0 pt-2">
          <h6>Primary Logo</h6>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <img src="{{ asset($frontend['logo'][0]->path)}}" style="height: 48px;">
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <a href="#" class="myBtn3" data-id="1" data-name="Main" data-size="logo size is 180x70"><i class="fas fa-pencil-alt text-lg opacity-10" aria-hidden="true"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-12 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header pb-0 pt-2">
          <h6>Sticky Menu Logo</h6>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <img src="{{ asset($frontend['logo'][1]->path)}}" style="height: 48px;">
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <a href="#" class=" myBtn3" data-id="2" data-name="sticky menu" data-size="logo size is 100x40"><i class="fas fa-pencil-alt text-lg opacity-10" aria-hidden="true"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-12 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header pb-0 pt-2">
          <h6>Small Logo</h6>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <img src="{{ asset($frontend['logo'][2]->path)}}" style="height: 48px;">
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <a href="#" class=" myBtn3" data-id="3" data-name="Small" data-size="logo size is 100x100"><i class="fas fa-pencil-alt text-lg opacity-10" aria-hidden="true"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-12 col-md-6 col-xl-4">
      <div class="card h-100">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">Primary Menu</h6>
        </div>
        <div class="card-body p-3">
          <h6 class="text-uppercase text-body text-xs font-weight-bolder">Items</h6>
          <ul class="list-group">
            @foreach($pages as $primarymenu)
            <li class="list-group-item border-0 px-0">
              <div class="form-check form-switch ps-0">
                <input class="form-check-input ms-auto" type="checkbox" onclick="headerlink({{$primarymenu->id}})" role="switch" @if($primarymenu->primary_menu == 1) checked @endif>
                <label class="form-check-label text-body ms-3 mb-0" >{{ $primarymenu->name }}</label>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-xl-4 mt-4 mt-md-0">
      <div class="card h-100">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">Footer Menu</h6>
        </div>
        <div class="card-body p-3">
          <h6 class="text-uppercase text-body text-xs font-weight-bolder">Items</h6>
          <ul class="list-group">
            @foreach($pages as $footermenu)
            <li class="list-group-item border-0 px-0">
              <div class="form-check form-switch ps-0">
                <input class="form-check-input ms-auto" type="checkbox" onclick="footerlink({{$footermenu->id}})" role="switch" @if($footermenu->footer_links == 1) checked @endif>
                <label class="form-check-label text-body ms-3 mb-0" >{{ $footermenu->name }}</label>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-xl-4 mt-4 mt-xl-0">
      <div class="card h-100">
        <div class="card-header pb-0 d-flex">
          <h6>Social Sites</h6>
          <a id="myBtn2" class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit About"></a>
        </div>
        <div class="card-body p-3">
          <div class="timeline timeline-one-side">
            <div class="timeline-block mb-3">
              <span class="timeline-step">
                <i class="fa fa-facebook text-info text-gradient"></i>
              </span>
              <div class="timeline-content">
                <h6 class="text-dark font-weight-bold mb-0 text-truncate">@if($footer->facebook){{ $footer->facebook }}@else NULL @endif</h6>
              </div>
            </div>
            <div class="timeline-block mb-3">
              <span class="timeline-step">
                <i class="fa fa-instagram text-danger text-gradient"></i>
              </span>
              <div class="timeline-content">
                <h6 class="text-dark font-weight-bold mb-0 text-truncate">@if($footer->instagram){{ $footer->instagram }}@else NULL @endif</h6>
              </div>
            </div>
            <div class="timeline-block mb-3">
              <span class="timeline-step">
                <i class="fa fa-twitter text-info text-gradient"></i>
              </span>
              <div class="timeline-content">
                <h6 class="text-dark font-weight-bold mb-0 text-truncate">@if($footer->twitter){{ $footer->twitter }}@else NULL @endif</h6>
              </div>
            </div>
            <div class="timeline-block mb-3">
              <span class="timeline-step">
                <i class="fa fa-pinterest-p text-danger text-gradient"></i>
              </span>
              <div class="timeline-content">
                <h6 class="text-dark font-weight-bold mb-0 text-truncate">@if($footer->pinterest){{ $footer->pinterest }}@else NULL @endif</h6>
              </div>
            </div>
            <div class="timeline-block mb-3">
              <span class="timeline-step">
                <i class="fa fa-linkedin text-info text-gradient"></i>
              </span>
              <div class="timeline-content">
                <h6 class="text-dark font-weight-bold mb-0 text-truncate">@if($footer->linkedin){{ $footer->linkedin }}@else NULL @endif</h6>
              </div>
            </div>
            <div class="timeline-block">
              <span class="timeline-step">
                <i class="fa fa-dribbble text-dark text-gradient"></i>
              </span>
              <div class="timeline-content">
                <h6 class="text-dark font-weight-bold mb-0 text-truncate">@if($footer->dribbble){{ $footer->dribbble }}@else NULL @endif</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-xl-12 col-xxl-6 mt-4">
      <div class="card h-100">
        <div class="card-header pb-0 p-3 d-flex">
          <h6 class="mb-0">Footer About</h6>
          <a id="myBtn1" class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit About"></a>
        </div>
        <div class="card-body p-3">
          <h6 class="text-body">{{$footer->about}}</h6>
        </div>
      </div>
    </div>
    <div class="col-12 col-xxl-6 mt-4">
      <div class="card">
        <div class="card-header pb-0 p-3 d-flex">
          <h6 class="mb-0">Contact Info</h6>
          <a id="myBtn1" class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Contact Info"></a>
        </div>
        <div class="card-body p-3 pb-0">
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-truncate">Email -</label>
            <div class="col-sm-9">
              <h6 class="form-control-plaintext">{{$footer->email}}</h6>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-truncate">Phone -</label>
            <div class="col-sm-9">
              <h6 class="form-control-plaintext">{{$footer->phone}}</h6>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-truncate">Address -</label>
            <div class="col-sm-9">
              <h6 class="form-control-plaintext">{{$footer->address}}</h6>
            </div>
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
              <h5 class="modal-title">Update Name</h5>
          </div>
          <form action="{{ route('admin.footerabout')}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                  <textarea type="text" class="form-control" name="about" rows="5" maxlength="300">{{ $footer->about }}</textarea>
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
<!-- Modal 1 HTML -->
<div id="myModal1" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Contact Information</h5>
            </div>
            <form action="{{ route('admin.footercontact')}}" method="post">
              @csrf
              <div class="modal-body">
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $footer->email }}">
                  </div>
                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ $footer->phone }}">
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea type="text" class="form-control" name="address" rows="2" maxlength="70">{{ $footer->address }}</textarea>
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
<!-- Modal 2 HTML -->
<div id="myModal2" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Social Links</h5>
            </div>
            <form action="{{ route('admin.sociallinks')}}" method="post">
              @csrf
              <div class="modal-body">
                  <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $footer->facebook }}">
                  </div>
                  <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $footer->instagram }}">
                  </div>
                  <div class="mb-3">
                    <label for="twitter" class="form-label">Twitter</label>
                    <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $footer->twitter }}">
                  </div>
                  <div class="mb-3">
                    <label for="pinterest" class="form-label">Pinterest</label>
                    <input type="text" class="form-control" id="pinterest" name="pinterest" value="{{ $footer->pinterest }}">
                  </div>
                  <div class="mb-3">
                    <label for="linkedin" class="form-label">Linkedin</label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ $footer->linkedin }}">
                  </div>
                  <div class="mb-3">
                    <label for="dribbble" class="form-label">Dribbble</label>
                    <input type="text" class="form-control" id="dribbble" name="dribbble" value="{{ $footer->dribbble }}">
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
<!-- Modal 3 HTML -->
<div id="myModal3" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Update <span id="logoname"></span> Logo</h5>
          </div>
          <form action="{{ route('admin.logochange')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                  <input type="hidden" class="form-control" name="id" id="logoid" value="">
                </div>
                <div class="mb-3">
                  <input type="file" class="form-control" name="logo" value="">
                </div>
                <div class="mb-3">
                  <h4 id="logosize"></h4>
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
@section('js')
<script>
$(document).ready(function() {
    $("#myBtn1").click(function() { $("#myModal1").modal("show"); });
    $("#myBtn2").click(function() { $("#myModal2").modal("show"); });
    $(".myBtn3").click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var size = $(this).data('size');
        $(".modal-body #logoid").val( id );
        $(".modal-header #logoname").text( name );
        $(".modal-body #logosize").text( size );
        $("#myModal3").modal("show"); 
    });
});
</script>
<script type="text/javascript">
  function headerlink(id){        
    $.ajax({
        url: "{{ route('admin.primarymenu') }}",
        type: "POST",
        data: {id:id, _token: '{{csrf_token()}}'},

        success: function(data){
            Success = true;
        },
        error: function(data){
            Success = false;
        } 
    });
  }
  function footerlink(id){        
    $.ajax({
        url: "{{ route('admin.footermenu') }}",
        type: "POST",
        data: {id:id, _token: '{{csrf_token()}}'},

        success: function(data){
            Success = true;
        },
        error: function(data){
            Success = false;
        } 
    });
  }
</script>

@endsection