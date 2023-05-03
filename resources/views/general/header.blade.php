<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('home') }}">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                

                @if(Auth::guard('admin')->check())
                  <a href="{{ route('admin.dashboard') }}">
                   <button type="button" class="btn btn-success" >Dashboard</button>
                 </a>
                  @elseif(Auth::guard('user')->check())
                  <a href="{{ route('admin.dashboard') }}">
                   <button type="button" class="btn btn-success" >Dashboard</button>
                 </a>
                  @else
                <a href="{{ route('signin') }}" class="btn btn-success" data-toggle="modal"><span>Login</span></a>
                <div style="width: 10px;"></div>
                <a href="{{ route('signup') }}" class="btn btn-success" data-toggle="modal"><span>Register</span></a>
                @endif
            </ul>
        </div>
    </div>
</nav>