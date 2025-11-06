  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('backend.dashboard') }}">
          <div class="sidebar-brand-icon">
              <img src="{{ asset('image/lambang_mura.png') }}" alt="Logo UMKM"
                  style="width: 40px; height: 40px; border-radius: 8px;">
          </div>
          <div class="sidebar-brand-text mx-3">
              <span style="font-weight: 700;">Admin UMKM</span>
          </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
          <a class="nav-link" href="{{ route('backend.dashboard') }}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
      </li>

      <!-- Menu untuk Admin -->
      @if (Auth::check() && Auth::user()->role === 'admin')
          <li class="nav-item">
              <a class="nav-link" href="{{ route('kbli.index') }}">
                  <i class="fas fa-fw fa-book"></i>
                  <span>Kelola KBLI</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link" href="{{ route('dataumum.index') }}">
                  <i class="fas fa-fw fa-book"></i>
                  <span>Kelola Data Umum</span>
              </a>
          </li>
      @endif

      <!-- Menu untuk Superadmin -->
      @if (Auth::check() && Auth::user()->role === 'superadmin')
          <li class="nav-item">
              <a class="nav-link" href="{{ route('kbli.index') }}">
                  <i class="fas fa-fw fa-book"></i>
                  <span>Kelola KBLI</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link" href="{{ route('dataumum.index') }}">
                  <i class="fas fa-fw fa-book"></i>
                  <span>Kelola Data Umum</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link" href="{{ route('user.index') }}">
                  <i class="fas fa-fw fa-users"></i>
                  <span>Kelola User</span>
              </a>
          </li>
      @endif

      <!-- Menu untuk Viewer -->
      @if (Auth::check() && Auth::user()->role === 'viewer')
          <li class="nav-item">
              <a class="nav-link" href="{{ route('dataumum.index') }}">
                  <i class="fas fa-fw fa-book"></i>
                  <span>Data Umum</span>
              </a>
          </li>
      @endif


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

      {{-- <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> --}}

  </ul>
