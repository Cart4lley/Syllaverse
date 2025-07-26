{{-- 
------------------------------------------------
* File: resources/views/includes/admin-sidebar.blade.php
* Description: Collapsible + responsive Admin Sidebar with disabled Syllabi link (Syllaverse)
------------------------------------------------ 
--}}
<nav id="sidebar" class="bg-white shadow-sm d-flex flex-column" role="navigation" aria-label="Admin Sidebar">

  {{-- Logo Section (expands/collapses) --}}
  <div class="sidebar-header text-center d-flex flex-column align-items-center justify-content-center" style="height: 72px;">
    <img src="{{ asset('images/syllaverse-text-logo.png') }}"
         alt="Syllaverse Logo"
         class="img-fluid sidebar-logo-expanded fade-logo"
         style="max-height: 36px;">
    <img src="{{ asset('images/favicon.png') }}"
         alt="Syllaverse Icon"
         class="img-fluid sidebar-logo-collapsed fade-logo"
         style="max-height: 36px; display: none;">
  </div>

  {{-- Collapse Button (Desktop Only) --}}
  <div class="px-3 py-2 d-none d-lg-flex flex-column align-items-center mt-auto">
    <div class="sidebar-separator"></div>
    <button id="sidebarCollapseBtn"
            class="btn btn-sm text-danger w-100 d-flex justify-content-center align-items-center ripple-btn"
            title="Toggle Sidebar"
            aria-controls="sidebar" aria-expanded="true">
      <i class="bi bi-chevron-left rotate-icon"></i>
    </button>
    <div class="sidebar-separator"></div>
  </div>

  {{-- Navigation --}}
  <div class="flex-grow-1 overflow-auto mt-3">
    <ul class="nav flex-column px-3">

      {{-- Dashboard --}}
      <li class="nav-item">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/dashboard') ? 'active' : '' }}"
           href="{{ route('admin.dashboard') }}">
          <i class="bi bi-speedometer2"></i>
          <span class="label">Dashboard</span>
        </a>
      </li>

      {{-- Syllabi (Disabled/Unlinked) --}}
      <li class="nav-item">
        <span class="nav-link d-flex align-items-center text-muted" style="cursor: not-allowed;">
          <i class="bi bi-book"></i>
          <span class="label">Syllabi</span>
        </span>
      </li>

      {{-- Manage Accounts --}}
      <li class="nav-item">
        <a class="nav-link d-flex align-items-center {{ request()->routeIs('admin.manage-accounts') ? 'active' : '' }}"
           href="{{ route('admin.manage-accounts') }}">
          <i class="bi bi-person-lines-fill"></i>
          <span class="label">Manage Accounts</span>
        </a>
      </li>

      <li><hr class="my-3 text-muted"></li>

      {{-- Master Data --}}
      <li class="nav-item">
        <a class="nav-link d-flex align-items-center {{ request()->routeIs('admin.master-data.index') ? 'active' : '' }}"
           href="{{ route('admin.master-data.index') }}">
          <i class="bi bi-gear"></i>
          <span class="label">Master Data</span>
        </a>
      </li>

    </ul>
  </div>
</nav>
