{{-- 
------------------------------------------------
* File: resources/views/includes/superadmin-navbar.blade.php
* Description: Responsive, glassmorphic Super Admin Navbar – Syllaverse
------------------------------------------------ 
--}}
<nav class="navbar navbar-expand-lg shadow-sm bg-white border-bottom px-4 py-3 glass-navbar sticky-top" role="navigation" aria-label="Top navbar" style="z-index:1000;">
  <div class="container-fluid d-flex justify-content-between align-items-center">

    {{-- Sidebar Toggle (Mobile Only) --}}
    <button id="sidebarToggle" class="btn d-lg-none hamburger-btn" type="button" aria-label="Toggle sidebar">
      <i class="bi bi-list fs-3 text-dark"></i>
    </button>

    {{-- Page Title --}}
    <h5 class="mb-0 fw-bold navbar-title flex-grow-1">@yield('page-title', 'Dashboard')</h5>

    {{-- Profile Dropdown --}}
    <div class="dropdown d-flex align-items-center">
      <a class="d-flex align-items-center text-decoration-none dropdown-toggle superadmin-dropdown" href="#" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="fw-semibold text-dark d-none d-lg-inline">Super Admin</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-end shadow-sm animate__animated animate__fadeIn" aria-labelledby="profileDropdown" style="min-width: 180px;">
        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-person me-2"></i> Profile
          </a>
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-question-circle me-2"></i> Help
          </a>
        </li>
        <li>
          <button class="dropdown-item d-flex align-items-center" id="themeToggleBtn" type="button">
            <i class="bi bi-moon me-2"></i> Toggle Theme
          </button>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <form action="{{ route('superadmin.logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="dropdown-item d-flex align-items-center text-danger" style="border: none; background: none;">
              <i class="bi bi-box-arrow-right me-2"></i> Logout
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>

@push('scripts')
<script>
  document.getElementById('themeToggleBtn')?.addEventListener('click', function () {
    document.body.classList.toggle('dark-theme');
    const icon = this.querySelector('i');
    icon.classList.toggle('bi-moon');
    icon.classList.toggle('bi-brightness-high');
    icon.classList.add('theme-anim');
    setTimeout(() => icon.classList.remove('theme-anim'), 300);
  });
</script>
@endpush
