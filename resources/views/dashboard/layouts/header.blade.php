<!-- header.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo mx-auto" href="{{ route('index')}}" style="font-size: 1.2rem; font-weight: bold;"><img src="{{ asset($frontend['logo'][0]->path) }}" class="mr-2" alt="logo"/> HAPPI TO HELP</a>
    <a class="navbar-brand brand-logo-mini" href="{{ route('index')}}"><img src="{{ asset($frontend['logo'][2]->path) }}" alt="logo"/></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav mr-lg-2">
      <li class="nav-item nav-search d-none d-lg-block">
        <div class="input-group">
          <!-- <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
            <span class="input-group-text" id="search">
              <i class="icon-search"></i>
            </span>
          </div>
          <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search"> -->
        </div>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="icon-bell mx-0"></i>
          <span class="count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
          <a class="dropdown-item preview-item">
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">Coming Soon</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                Just now
              </p>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item nav-profile dropdown">
        @if(Auth()->user()->profile_pic == NULL && Auth()->user()->gender == "Male")
        <a class="nav-link dropdown-toggle nav-profile-img" href="#" data-toggle="dropdown" id="profileDropdown" style="background-image: url({{ asset('profilepic/defaultmale.jpg')}});">
        <!-- <img src="{{ asset('assets/broker/images/faces/face28.jpg')}}" alt="profile"/> -->
        </a>
        @elseif(Auth()->user()->profile_pic == NULL && Auth()->user()->gender == "Female")
          <a class="nav-link dropdown-toggle nav-profile-img" href="#" data-toggle="dropdown" id="profileDropdown" style="background-image: url({{ asset('profilepic/defaultfemale.jpg')}});"></a>
        @elseif(Auth()->user()->profile_pic == NULL && Auth()->user()->gender == "Other")
          <a class="nav-link dropdown-toggle nav-profile-img" href="#" data-toggle="dropdown" id="profileDropdown" style="background-image: url({{ asset('profilepic/default.jpg')}});"></a>
        @else
        <a class="nav-link dropdown-toggle nav-profile-img" href="#" data-toggle="dropdown" id="profileDropdown" style="background-image: url({{ asset(Auth()->user()->profile_pic) }});">
        </a>
        @endif
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="{{ route('profile.settings')}}">
            <i class="ti-settings text-primary"></i>
            Settings
          </a>
          <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
            <i class="ti-power-off text-primary"></i>
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
      </li>
      <!-- <li class="nav-item nav-settings d-none d-lg-flex">
        <a class="nav-link" href="#">
          <i class="icon-ellipsis"></i>
        </a>
      </li> -->
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>
<!-- header.html end -->