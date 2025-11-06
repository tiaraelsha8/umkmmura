   <style>
       .nav-link {
           position: relative;
           font-size: 1.1rem;
           font-weight: 500;
           color: #519af4 !important;
           padding: 0.3rem 0.75rem;
           transition: color 0.3s ease;
       }

       .nav-link:hover,
       .dropdown-item:hover {
           color: #ff6600 !important;
       }

       .nav-link::after {
           content: '';
           position: absolute;
           left: 50%;
           bottom: 4px;
           transform: translateX(-50%) scaleX(0);
           transform-origin: center;
           width: 60%;
           height: 3px;
           background: linear-gradient(90deg, #ff6600, #ffdd57);
           border-radius: 2px;
           box-shadow: 0 0 6px rgba(255, 193, 7, 0.6);
           transition: transform 0.35s ease, opacity 0.35s ease;
           opacity: 0;
           pointer-events: none;
       }

       .nav-link:hover:not(.dropdown-toggle)::after,
       .nav-link.active-dropdown:not(.dropdown-toggle)::after {
           transform: translateX(-50%) scaleX(1);
           opacity: 1;
       }

       .nav-link.active-dropdown:not(.dropdown-toggle)::after {
           width: 100%;
       }

       .nav-link.dropdown-toggle {
           cursor: pointer;
       }

       .nav-item.dropdown {
           position: relative;
       }
   </style>
   <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <img src="image/lambang_mura.png" alt="" style="height: 75px">
       <!-- Sidebar Toggle (Topbar) -->
       <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
           <i class="fa fa-bars"></i>
       </button>



       <!-- Topbar Navbar -->
       <ul class="navbar-nav ml-auto">
           <li class="nav-item"><a class="nav-link" href="{{ route('beranda') }}">Beranda</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ route('data-umkm') }}">Data UMKM</a></li>
           @auth
               <li class="nav-item"><a class="nav-link" href="{{ route('backend.dashboard') }}">Dashboard</a></li>
           @endauth
           <!-- Nav Item - Search Dropdown (Visible Only XS) -->
           <li class="nav-item dropdown no-arrow d-sm-none">
               <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-search fa-fw"></i>
               </a>
               <!-- Dropdown - Messages -->
               <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                   aria-labelledby="searchDropdown">
                   <form class="form-inline mr-auto w-100 navbar-search">
                       <div class="input-group">
                           <input type="text" class="form-control bg-light border-0 small"
                               placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                           <div class="input-group-append">
                               <button class="btn btn-primary" type="button">
                                   <i class="fas fa-search fa-sm"></i>
                               </button>
                           </div>
                       </div>
                   </form>
               </div>
           </li>

           <div class="topbar-divider d-none d-sm-block"></div>

           <!-- Nav Item - User Information -->
           <li class="nav-item dropdown no-arrow">

           </li>

       </ul>


   </nav>
