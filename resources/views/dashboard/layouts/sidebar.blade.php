<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    @if(Auth()->user()->type == "broker")
    <li class="nav-item">
      <a class="nav-link" href="{{ route('broker.index')}}">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Properties</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('broker.feedback')}}">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Feedback</span>
      </a>
    </li>
    @elseif(Auth()->user()->type == "owner")
    <li class="nav-item">
      <a class="nav-link" href="{{ route('property.index')}}">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Properties</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('owner.feedback')}}">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Feedback</span>
      </a>
    </li>
    @elseif(Auth()->user()->type == "user")
    <li class="nav-item">
      <a class="nav-link" href="{{ route('feedback.index')}}">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Feedback</span>
      </a>
    </li>
    @endif
    <li class="nav-item">
      <a class="nav-link" href="{{ route('profile.settings')}}">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Settings</span>
      </a>
    </li>
  </ul>
  <div class="col-md-12 text-center">
    <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
    <button type="submit" class="col-md-8 btn btn-primary center">Logout</button>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
    </form>
  </div>
</nav>