<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{ route('home') }}" class="brand-link">
		@if(!empty($setting->logo))
			<img src="{{ asset('storage/' . $setting->logo) }}" alt="company logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		@else
			<img src="{{ asset('images/logo/default.png') }}" alt="company logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		@endif
		<span class="brand-text font-weight-light">{{ !empty($setting->company_name) ? $setting->company_name : '' }}</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

				<!-- Dashboard -->
				<li class="nav-item">
					<a href="{{ route('home') }}"
						class="nav-link {{ Route::current()->getName() == 'home' ? 'active' : '' }}">
						<i class="nav-icon fas fa-tv"></i>
						<p>
							Dashboard
							{{-- <span class="right badge badge-danger">New</span> --}}
						</p>
					</a>
				</li>
				<!-- / .Dashboard -->

				<!-- Instructor -->
				<li class="nav-item">
					<a href="{{ route('instructors.index') }}"
						class="nav-link {{ Route::current()->getName() == 'instructors.index' ? 'active' : '' }}">
						<i class="nav-icon fas fa-running"></i>
						<p>
							Instructor
							{{-- <span class="right badge badge-danger">New</span> --}}
						</p>
					</a>
				</li>
				<!-- / .Instructor -->

				<!-- Services -->
				<li class="nav-item">
					<a href="{{ route('services.index') }}"
						class="nav-link {{ Route::current()->getName() == 'services.index' ? 'active' : '' }}">
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
					<a href="{{ route('bookings.index') }}"
						class="nav-link {{ Route::current()->getName() == 'bookings.index' ? 'active' : '' }}">
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
					<a href="{{ route('clients.index') }}"
						class="nav-link {{ Route::current()->getName() == 'clients.index' ? 'active' : '' }}">
						<i class="nav-icon fas fa-users"></i>
						<p>
							Clients
							{{-- <span class="right badge badge-danger">New</span> --}}
						</p>
					</a>
				</li>
				<!-- / .Clients -->

				<!-- Administrators -->
				<li class="nav-item">
					<a href="{{ route('admins.index') }}"
						class="nav-link {{ Route::current()->getName() == 'admins.index' ? 'active' : '' }}">
						<i class="nav-icon fas fa-key"></i>
						<p>
							Administrators
							{{-- <span class="right badge badge-danger">New</span> --}}
						</p>
					</a>
				</li>
				<!-- / .Administrators -->

				<!-- Reports -->
				<li class="nav-item has-treeview">
            		<a href="#" class="nav-link">
              			<i class="nav-icon fas fa-chart-pie"></i>
						<p>
							Reports
							{{-- <span class="right badge badge-danger">New</span> --}}
						</p>
            		</a>
            		<ul class="nav nav-treeview" style="display: none;">
              			<li class="nav-item">
                			<a href="{{ route('income.index') }}" class="nav-link {{ Route::current()->getName() == 'income.index' ? 'active' : '' }}">
                  				<i class="far fa-circle nav-icon"></i>
                  				<p>Income/Sales</p>
                			</a>
              			</li>
              			<li class="nav-item">
                			<a href="{{ route('booking-report.index') }}" class="nav-link {{ Route::current()->getName() == 'booking-report.index' ? 'active' : '' }}">
                  				<i class="far fa-circle nav-icon"></i>
                  				<p>Booking</p>
                			</a>
              			</li>
              			<li class="nav-item">
                			<a href="{{ route('client-report.index') }}" class="nav-link {{ Route::current()->getName() == 'client-report.index' ? 'active' : '' }}">
                  				<i class="far fa-circle nav-icon"></i>
                  				<p>Clients</p>
                			</a>
              			</li>
            		</ul>
          		</li>
				<!-- / .Reports -->

				<!-- Email -->
				{{-- <li class="nav-item has-treeview">
            		<a href="#" class="nav-link">
              			<i class="nav-icon fas fa-envelope"></i>
              			<p>
                			Mailbox
                			<i class="fas fa-angle-left right"></i>
              			</p>
            		</a>
            		<ul class="nav nav-treeview" style="display: none;">
              			<li class="nav-item">
                			<a href="{{ route('inbox.index') }}" class="nav-link {{ Route::current()->getName() == 'inbox.index' ? 'active' : '' }}">
                  				<i class="far fa-circle nav-icon"></i>
                  				<p>Inbox</p>
                			</a>
              			</li>
              			<li class="nav-item">
                			<a href="{{ route('compose.index') }}" class="nav-link {{ Route::current()->getName() == 'compose.index' ? 'active' : '' }}">
                  				<i class="far fa-circle nav-icon"></i>
                  				<p>Compose</p>
                			</a>
              			</li>
              			<li class="nav-item">
                			<a href="{{ route('read.index') }}" class="nav-link {{ Route::current()->getName() == 'read.index' ? 'active' : '' }}">
                  				<i class="far fa-circle nav-icon"></i>
                  				<p>Read</p>
                			</a>
              			</li>
            		</ul>
          		</li> --}}
          		<!-- /.email -->

				<!-- Settings -->
				<li class="nav-item">
					<a href="{{ route('settings.index') }}"
						class="nav-link {{ Route::current()->getName() == 'settings.index' ? 'active' : '' }}">
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