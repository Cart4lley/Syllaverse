{{-- 
------------------------------------------------
* File: resources/views/includes/admin-navbar.blade.php
* Description: Responsive, glassmorphic Admin Navbar (Syllaverse)
------------------------------------------------ 
--}}
<nav class="navbar navbar-expand-lg shadow-sm bg-white border-bottom px-4 py-3 glass-navbar sticky-top" role="navigation" aria-label="Admin Navbar" style="z-index:1000;">
  <div class="container-fluid d-flex justify-content-between align-items-center">

    {{-- Sidebar Toggle (Mobile Only) --}}
    <button id="sidebarToggle" class="btn d-lg-none hamburger-btn" type="button" aria-label="Toggle sidebar">
      <i class="bi bi-list fs-3 text-dark"></i>
    </button>

    {{-- Page Title --}}
    <h5 class="mb-0 fw-bold navbar-title flex-grow-1">@yield('page-title', 'Dashboard')</h5>

    {{-- Profile Dropdown --}}
    <div class="dropdown d-flex align-items-center">
      <a class="d-flex align-items-center text-decoration-none dropdown-toggle admin-dropdown" href="#" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="fw-semibold text-dark d-none d-lg-inline">{{ Auth::user()->name }}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-end shadow-sm animate__animated animate__fadeIn" aria-labelledby="profileDropdown" style="min-width: 180px;">
        <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <form action="{{ route('admin.logout') }}" method="POST" class="d-inline w-100">
            @csrf
            <button type="submit" class="dropdown-item d-flex align-items-center text-danger w-100">
              <i class="bi bi-box-arrow-right me-2"></i> Logout
            </button>
          </form>
        </li>
      </ul>
    </div>

  </div>
</nav>
