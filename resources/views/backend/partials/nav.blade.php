<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="{{ route('admin.index') }}">
      Admin Panel
    </a>
    <a class="navbar-brand brand-logo-mini" href="{{ route('admin.index') }}">
      Admin Panel
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">
    <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
      <li class="nav-item">
        <a href="{{ route('admin.index') }}" class="nav-link"><i class="mdi mdi-image-filter"></i>Admin</a>
      </li>

    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link" href="{{ route('admin.index') }}">
          <img class="img-xs rounded-circle" src="{{ asset('images/faces/face4.jpg') }}" alt="">
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>