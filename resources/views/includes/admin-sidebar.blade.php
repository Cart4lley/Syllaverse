{{-- 
------------------------------------------------
* resources/views/includes/admin-sidebar.blade.php
* Sidebar navigation for Admin Dashboard (Syllaverse)
------------------------------------------------ 
--}}
<nav id="sidebar" class="bg-white shadow-sm d-flex flex-column">
    <div class="sidebar-header text-center py-4 border-bottom">
        <img src="{{ asset('images/syllaverse-text-logo.png') }}" alt="Syllaverse Logo" class="img-fluid mb-2" style="max-width: 160px;">
        <h6 class="text-danger fw-semibold mt-2">──── Admin ────</h6>
    </div>

    <ul class="nav flex-column px-3 mt-3">
        {{-- Dashboard --}}
        <li class="nav-item mb-1">
            <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2"></i> <span class="label">Dashboard</span>
            </a>
        </li>

        {{-- Syllabi --}}
        <li class="nav-item mb-1">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
                <i class="bi bi-book"></i> <span class="label">Syllabi</span>
            </a>
        </li>

        {{-- Manage Accounts --}}
        <li class="nav-item mb-1">
            <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.manage-accounts') ? 'active' : '' }}" 
                href="{{ route('admin.manage-accounts') }}">
                <i class="bi bi-person-lines-fill"></i> <span class="label">Manage Accounts</span>
            </a>
        </li>

        {{-- Separator --}}
        <li><hr class="my-3 text-muted"></li>

        {{-- Master Data --}}
        <li class="nav-item mb-1">
            <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.master-data.index') ? 'active' : '' }}" 
                href="{{ route('admin.master-data.index') }}">
                <i class="bi bi-gear"></i> <span class="label">Master Data</span>
            </a>
        </li>
    </ul>
</nav>
