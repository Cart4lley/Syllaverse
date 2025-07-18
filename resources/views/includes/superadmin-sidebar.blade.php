{{-- 
------------------------------------------------
* File: resources/views/includes/superadmin-sidebar.blade.php
* Description: Static sidebar with consistent border separators above and below collapse button – Syllaverse
------------------------------------------------ 
--}}
<nav id="sidebar" class="bg-sv-light shadow-sm d-flex flex-column" role="navigation" aria-label="Main sidebar">

  {{-- Logo Header --}}
  <div class="sidebar-header text-center border-bottom border-sv-muted d-flex flex-column align-items-center justify-content-center" style="height: 72px;">
    <img src="{{ asset('images/syllaverse-text-logo.png') }}"
         alt="Syllaverse Logo"
         class="img-fluid sidebar-logo-expanded fade-logo"
         style="max-height: 36px;">
    <img src="{{ asset('images/favicon.png') }}"
         alt="Syllaverse Icon"
         class="img-fluid sidebar-logo-collapsed fade-logo"
         style="max-height: 36px; display: none;">
  </div>

  {{-- Collapse Button (desktop only) --}}
  <div class="px-3 mt-2 d-none d-lg-block">
    <button id="sidebarCollapseBtn"
            class="btn btn-sm text-sv-primary w-100 d-flex justify-content-center align-items-center ripple-btn"
            title="Collapse Sidebar">
      <i class="bi bi-chevron-left rotate-icon"></i>
    </button>
  </div>
  {{-- Separator below collapse button, matches header --}}
  <div class="sidebar-separator border-bottom border-sv-muted"></div>

  {{-- Navigation --}}
  <ul class="nav flex-column px-3 mt-3">
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center @if(request()->is('superadmin/dashboard')) active @endif"
         href="/superadmin/dashboard"
         aria-current="@if(request()->is('superadmin/dashboard')) page @endif">
        <i class="bi bi-speedometer2"></i>
        <span class="label">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center @if(request()->is('superadmin/departments')) active @endif"
         href="/superadmin/departments"
         aria-current="@if(request()->is('superadmin/departments')) page @endif">
        <i class="bi bi-diagram-3"></i>
        <span class="label">Departments</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center @if(request()->is('superadmin/manage-accounts')) active @endif"
         href="/superadmin/manage-accounts"
         aria-current="@if(request()->is('superadmin/manage-accounts')) page @endif">
        <i class="bi bi-people"></i>
        <span class="label">Manage Accounts</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center @if(request()->is('superadmin/master-data')) active @endif"
         href="/superadmin/master-data"
         aria-current="@if(request()->is('superadmin/master-data')) page @endif">
        <i class="bi bi-journals"></i>
        <span class="label">Master Data</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center @if(request()->is('superadmin/system-logs')) active @endif"
         href="/superadmin/system-logs"
         aria-current="@if(request()->is('superadmin/system-logs')) page @endif">
        <i class="bi bi-clock-history"></i>
        <span class="label">Activity Logs</span>
      </a>
    </li>
  </ul>
</nav>
