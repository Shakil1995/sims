<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->profile_photo_path ?? '' }}" class="img-circle elevation-2"  style="height: 35px; width:35px; alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('dashboard') }}" class="d-block">{{ Auth::user()->name ?? ''}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>  Dashboard  </p>
            </a>  
          </li>

          <li class="nav-item">
            <a href="{{ route('stores.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Sotre Name</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Categories</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('brands.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Bands</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('sizes.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Size</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{ route('colors.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Color</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Product</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('sells.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Sell Product</p>
            </a>
          </li>
          <li class="nav-item">
            {{-- <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p> Logout </p>
            </a> --}}
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <i class="nav-icon fas fa-th"></i>
              <x-jet-dropdown-link href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                              this.closest('form').submit();">
                  {{ __('Log Out') }}
              </x-jet-dropdown-link>
          </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>