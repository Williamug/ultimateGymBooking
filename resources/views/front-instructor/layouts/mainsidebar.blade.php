<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{ route('instructor-dashboard') }}" class="brand-link">
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
					<a href="{{ route('instructor-dashboard') }}"
						class="nav-link {{ Route::current()->getName() == 'instructor-dashboard' ? 'active' : '' }}">
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
					<a href="{{ route('instructor-services.index') }}"
						class="nav-link {{ Route::current()->getName() == 'instructor-services.index' ? 'active' : '' }}">
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
					<a href="{{ route('instructor-bookings.index') }}"
						class="nav-link {{ Route::current()->getName() == 'instructor-bookings.index' ? 'active' : '' }}">
						<i class="nav-icon fas fa-calendar-alt"></i>
						<p>
							Bookings
							{{-- <span class="right badge badge-danger">New</span> --}}
						</p>
					</a>
				</li>
				<!-- / .Bookings -->

				<!-- tip of the day -->
				<li class="nav-item">
					<a href="{{ route('instructor-post.index') }}"
						class="nav-link {{ Route::current()->getName() == 'instructor-post.index' ? 'active' : '' }}">
						<i class="nav-icon fas fa-newspaper"></i>
						<p>
							Tip of the day
							{{-- <span class="right badge badge-danger">New</span> --}}
						</p>
					</a>
				</li>
				<!-- / .tip of the day -->


				<!-- Reports -->
				{{-- <li class="nav-item">
					<a href="{{ route('reports.index') }}" class="nav-link {{ Route::current()->getName() == 'reports.index' ? 'active' : '' }}">
						<i class="nav-icon fas fa-chart-pie"></i>
						<p>
							Reports --}}
							{{-- <span class="right badge badge-danger">New</span> --}}
					{{-- 	</p>
					</a>
				</li> --}}
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
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>