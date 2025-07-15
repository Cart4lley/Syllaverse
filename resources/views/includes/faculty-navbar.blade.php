{{-- 
------------------------------------------------
* File: resources/views/includes/faculty-navbar.blade.php
* Top Navbar for Faculty Dashboard (Syllaverse)
------------------------------------------------ 
--}}
<nav class="navbar navbar-expand navbar-light bg-light shadow-sm px-4 py-2">
    <div class="container-fluid justify-content-between">
        <span class="navbar-text text-muted small">
            Welcome, {{ Auth::user()->name ?? 'Faculty' }}
        </span>

        {{-- Profile Dropdown (optional, expandable later) --}}
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle me-1"></i> Profile
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('faculty.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
