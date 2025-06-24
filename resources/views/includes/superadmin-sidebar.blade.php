{{-- ------------------------------------------------
* File: resources/views/includes/superadmin-sidebar.blade.php
* Description: Sidebar for Super Admin Panel (Syllaverse)
------------------------------------------------ --}}
<nav id="sidebar" class="bg-sv-light shadow-sm d-flex flex-column">
    <div class="sidebar-header text-center py-4 border-bottom border-sv-muted">
        <img src="{{ asset('images/syllaverse-text-logo.png') }}" alt="Syllaverse Logo" class="img-fluid mb-2" style="max-width: 160px;">
        <h6 class="text-sv-primary fw-semibold mt-2">─── Super Admin ───</h6>
    </div>

    <ul class="nav flex-column px-3 mt-3">
        <li class="nav-item mb-1">
            <a class="nav-link d-flex align-items-center gap-2 @if(request()->is('superadmin/dashboard')) active text-sv-primary @endif" href="/superadmin/dashboard">
                <i class="bi bi-speedometer2 text-sv-primary"></i> <span class="label">Dashboard</span>
            </a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link d-flex align-items-center gap-2 @if(request()->is('superadmin/departments')) active text-sv-primary @endif" href="/superadmin/departments">
                <i class="bi bi-diagram-3 text-sv-primary"></i> <span class="label">Departments</span>
            </a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link d-flex align-items-center gap-2 @if(request()->is('superadmin/manage-accounts')) active text-sv-primary @endif" href="/superadmin/manage-accounts">
                <i class="bi bi-people text-sv-primary"></i> <span class="label">Manage Accounts</span>
            </a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link d-flex align-items-center gap-2 @if(request()->is('superadmin/master-data')) active text-sv-primary @endif" href="/superadmin/master-data">
                <i class="bi bi-journals text-sv-primary"></i> <span class="label">Master Data</span>
            </a>
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link d-flex align-items-center gap-2 @if(request()->is('superadmin/system-logs')) active text-sv-primary @endif" href="/superadmin/system-logs">
                <i class="bi bi-clock-history text-sv-primary"></i> <span class="label">System Logs</span>
            </a>
        </li>
    </ul>
</nav>
