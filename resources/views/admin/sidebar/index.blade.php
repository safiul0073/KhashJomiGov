
<aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{url('/')}}" class="brand-link">
                {{-- <img src="{{asset('assets')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                <span class="brand-text font-weight-light">সম্পত্তি লিজ নবায়ন</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    <img src="{{ auth()->user()->avater != null? auth()->user()->avater : "http://ssl.gstatic.com/accounts/ui/avatar_2x.png" }}" class="img-circle rounded-circle elevation-2 avatar" alt="User Image">
                    </div>
                    <div class="info">
                    <a href="" class="d-block">{!! auth()->user()->name !!}</a>
                    </div>
                </div>

              <!-- Sidebar Menu -->
              <nav class="mt-5 ">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                  {{-- <li class="nav-item ">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Dashboard
                      </p>
                    </a> --}}
                  {{-- </li> --}}
                  @can('isAcland', auth()->user())
                  <li class="nav-item ">
                    <a href="{{ route('ac-land') }}" class="nav-link {{ request()->routeIs('ac-land') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        আবেদন ডাটা
                      </p>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('user') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                      <p>
                        ব্যবহারকারী
                      </p>
                    </a>
                  </li>
                  @endcan

                  @can('isTowshildeer', auth()->user())
                  <li class="nav-item ">
                    <a href="{{ route('towshilder') }}" class="nav-link {{ request()->routeIs('towshilder') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        আবেদন ডাটা
                      </p>
                    </a>
                  </li>
                  @endcan
                  @can('isUno', auth()->user())
                  <li class="nav-item ">
                    <a href="{{ route('uno') }}" class="nav-link {{ request()->routeIs('uno') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        আবেদন ডাটা
                      </p>
                    </a>
                  </li>
                  @endcan
                  @can('isDc', auth()->user())
                  <li class="nav-item ">
                    <a href="{{ route('dc') }}" class="nav-link {{ request()->routeIs('dc') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        আবেদন ডাটা
                      </p>
                    </a>
                  </li>
                  @endcan
                  @can('isAdc', auth()->user())
                  <li class="nav-item ">
                    <a href="{{ route('adc') }}" class="nav-link {{ request()->routeIs('adc') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        আবেদন ডাটা
                      </p>
                    </a>
                  </li>
                  @endcan
                  @can('isAdcRevinew', auth()->user())
                  <li class="nav-item ">
                    <a href="{{ route('adc-revinew') }}" class="nav-link {{ request()->routeIs('adc-revinew') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        আবেদন ডাটা
                      </p>
                    </a>
                  </li>
                  @endcan
                  <li class="nav-item ">
                    <a href="{{ route('profile.show',auth()->id()) }}" class="nav-link {{ request()->routeIs('profile.show') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                      <p>
                        প্রোফাইল
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                      <p>
                        Log Out
                      </p>
                    </a>
                  </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </ul>
                </ul>
              </nav>
              <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
          </aside>
