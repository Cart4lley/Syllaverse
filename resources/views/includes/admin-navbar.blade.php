{{-- 
------------------------------------------------
* resources/views/includes/admin-navbar.blade.php
* Top Navbar for Admin Dashboard (Syllaverse)
------------------------------------------------ 
--}}
<nav class="navbar navbar-expand-lg shadow-sm bg-white border-bottom px-4 py-3">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        {{-- Page Title --}}
        <h5 class="mb-0 fw-semibold text-dark">Dashboard</h5>

        {{-- Right-side Profile --}}
        <div class="d-flex align-items-center gap-3">

            {{-- Admin Name + Dropdown --}}
            <div class="dropdown">
                <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://i.pravatar.cc/40" class="rounded-circle me-2 border" width="40" alt="Profile">
                    <span class="fw-semibold text-dark">Admin</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm animate__animated animate__fadeIn" aria-labelledby="profileDropdown" style="min-width: 180px;">
                    <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-archive me-2"></i> Archives</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item d-flex align-items-center text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
