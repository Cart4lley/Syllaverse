{{-- ------------------------------------------------
* File: resources/views/includes/superadmin-navbar.blade.php
* Description: Top Navbar for Super Admin Panel (Syllaverse)
------------------------------------------------ --}}
<nav class="navbar navbar-expand-lg shadow-sm bg-white border-bottom px-4 py-3">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-semibold text-dark">@yield('page-title', 'Syllaverse')</h5>
        <div class="d-flex align-items-center gap-3">
            <div class="dropdown">
                <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="fw-semibold text-dark">Super Admin</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm animate__animated animate__fadeIn" aria-labelledby="profileDropdown" style="min-width: 180px;">
                    <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                    {{-- Archives removed --}}
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item d-flex align-items-center text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
