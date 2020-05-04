<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('images/logo/logo.png') }}" alt="Ultimate Gym" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Ultimate Gym</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/logo/user.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            @guest
            <div class="login-again">Please login again</div>
                {{-- <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
                </li>
                @if(Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a>
                    </li>
                @endif --}}
            @else
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            @endguest
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <!-- Dashboard -->
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ Route::current()->getName() == 'home' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tv"></i>
              <p>
                Dashboard
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <!-- / .Dashboard -->

               <!-- Services -->
          <li class="nav-item">
            <a href="{{ route('services.index') }}" class="nav-link {{ Route::current()->getName() == 'services.index' ? 'active' : '' }}">
              <i class="nav-icon fas fa-globe-americas"></i>
              <p>
                Services
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <!-- / .Services -->

               <!-- Bookings -->
          <li class="nav-item">
            <a href="{{ route('bookings.index') }}" class="nav-link {{ Route::current()->getName() == 'bookings.index' ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Bookings
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <!-- / .Bookings -->

               <!-- Clients -->
          <li class="nav-item">
            <a href="{{ route('clients.index') }}" class="nav-link {{ Route::current()->getName() == 'clients.index' ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clients
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <!-- / .Clients -->

               <!-- Reports -->
          <li class="nav-item">
            <a href="{{ route('reports.index') }}" class="nav-link {{ Route::current()->getName() == 'reports.index' ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Reports
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <!-- / .Reports -->

               <!-- Settings -->
          <li class="nav-item">
            <a href="{{ route('settings.index') }}" class="nav-link {{ Route::current()->getName() == 'settings.index' ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <!-- / .Settings -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>