<header class="navbar navbar-grey sticky-top bg-grey flex-md-nowrap p- shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{ route('home') }}">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      @if(Auth::guard('admin')->check())
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="inline-block text-gray-600 hover:text-black my-4 w-full">
              Logout
          </a>    
          <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          @elseif(Auth::guard('user')->check())
          <a href="{{ route('logoutUser') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="inline-block text-gray-600 hover:text-black my-4 w-full">
              Logout
          </a>    
          <form id="frm-logout" action="{{ route('logoutUser') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          @endif
    </div>
  </div>
</header>