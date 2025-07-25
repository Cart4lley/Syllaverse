{{--
------------------------------------------------
* File: resources/views/includes/superadmin-sidebar.blade.php
* Description: Sidebar with improved layout structure: flex-grow nav section and fixed collapse section for consistent UI/UX (Syllaverse)
------------------------------------------------
--}}  
<nav id="sidebar" class="bg-sv-light shadow-sm d-flex flex-column" role="navigation" aria-label="Main sidebar">  

  {{-- Logo Header (no bottom border) --}}  
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



      {{-- Collapse Section (fixed bottom) --}}  
  <div class="px-3 py-2 d-none d-lg-flex flex-column align-items-center mt-auto">  
    <div class="sidebar-separator"></div>  
    <button id="sidebarCollapseBtn"  
            class="btn btn-sm text-sv-primary w-100 d-flex justify-content-center align-items-center ripple-btn"  
            title="Toggle Sidebar"  
            aria-controls="sidebar" aria-expanded="true">  
      <i class="bi bi-chevron-left rotate-icon"></i>  
    </button>  
    <div class="sidebar-separator"></div>  
  </div>  

  {{-- Navigation Section (scrollable) --}}  
  <div class="flex-grow-1 overflow-auto mt-3">  
    <ul class="nav flex-column px-3">  
      <li class="nav-item">
        <a class="nav-link d-flex align-items-center @if(request()->is('superadmin/dashboard')) active @endif"
           href="{{ route('superadmin.dashboard') }}"
           aria-current="@if(request()->is('superadmin/dashboard')) page @endif">
          <i class="bi bi-speedometer2"></i>
          <span class="label">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link d-flex align-items-center @if(request()->is('superadmin/departments')) active @endif"
           href="{{ route('superadmin.departments.index') }}"
           aria-current="@if(request()->is('superadmin/departments')) page @endif">
          <i class="bi bi-diagram-3"></i>
          <span class="label">Departments</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link d-flex align-items-center @if(request()->is('superadmin/manage-accounts')) active @endif"
           href="{{ route('superadmin.manage-accounts') }}"
           aria-current="@if(request()->is('superadmin/manage-accounts')) page @endif">
          <i class="bi bi-people"></i>
          <span class="label">Manage Accounts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link d-flex align-items-center @if(request()->is('superadmin/master-data')) active @endif"
           href="{{ route('superadmin.master-data') }}"
           aria-current="@if(request()->is('superadmin/master-data')) page @endif">
          <i class="bi bi-journals"></i>
          <span class="label">Master Data</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link d-flex align-items-center @if(request()->is('superadmin/system-logs')) active @endif"
           href="{{ route('superadmin.system-logs') }}"
           aria-current="@if(request()->is('superadmin/system-logs')) page @endif">
          <i class="bi bi-clock-history"></i>
          <span class="label">Activity Logs</span>
        </a>
      </li>
    </ul>  
  </div>  



</nav>
