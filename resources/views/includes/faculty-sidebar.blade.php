{{-- 
------------------------------------------------
* File: resources/views/includes/faculty-sidebar.blade.php
* Description: Responsive and collapsible sidebar for Faculty – Syllaverse
------------------------------------------------ 
--}}
<nav id="sidebar" class="bg-sv-light shadow-sm d-flex flex-column" role="navigation" aria-label="Faculty Sidebar">
  
  <div class="sidebar-header text-center border-bottom border-sv-muted d-flex flex-column align-items-center justify-content-center" style="height: 72px;">
    <img src="{{ asset('images/syllaverse-text-logo.png') }}" alt="Syllaverse Logo" class="img-fluid sidebar-logo-expanded fade-logo" style="max-height: 36px;">
    <img src="{{ asset('images/favicon.png') }}" alt="Syllaverse Icon" class="img-fluid sidebar-logo-collapsed fade-logo" style="max-height: 36px; display: none;">
  </div>

  <div class="px-3 mt-2 d-none d-lg-block">
    <button id="sidebarCollapseBtn" class="btn btn-sm text-sv-primary w-100 d-flex justify-content-center align-items-center ripple-btn" title="Collapse Sidebar">
      <i class="bi bi-chevron-left rotate-icon"></i>
    </button>
  </div>

  <div class="sidebar-separator border-bottom border-sv-muted"></div>

  <ul class="nav flex-column px-3 mt-3">
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center @if(request()->is('faculty/dashboard')) active @endif" href="{{ route('faculty.dashboard') }}">
        <i class="bi bi-speedometer2"></i> <span class="label">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center" href="#">
        <i class="bi bi-journals"></i> <span class="label">My Classes</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center" href="#">
        <i class="bi bi-files-alt"></i> <span class="label">Syllabi</span>
      </a>
    </li>
  </ul>
</nav>
