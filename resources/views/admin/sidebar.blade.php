<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          @auth('admin')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('article') }}">
              <span data-feather="file" class="align-text-bottom"></span>
              articles
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('book') }}">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Books
            </a>
          </li>
          @endauth
        </ul>
      </div>
    </nav>