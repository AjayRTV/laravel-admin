  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="dist/img/rtv.png" alt="Not Found Logo" class="brand-image" ><br> -->
      <span class="brand-text font-weight-light">R.T.V.</span>
    </a>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
            <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Analytics
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          <!-- =---------------------------- [ For Org ] ------------------------------= -->
          <li class="nav-item {{ (request()->is('org*')) ||  (request()->is('org*')) ||   (request()->is('userrole*'))  ? 'active menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('org*')) ||  (request()->is('org*')) ||  (request()->is('userrole*'))  ? 'active' : '' }}">
                <i class="fa fa-globe"></i>
                <p>
                  Org
                  <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('org')}}" class="nav-link {{ (request()->is('org*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>org</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link {{ (request()->is('userrole*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Role</p>
                  </a>
                </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
