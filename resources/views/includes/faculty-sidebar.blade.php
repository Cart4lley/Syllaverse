{{-- 
------------------------------------------------
* File: resources/views/includes/faculty-sidebar.blade.php
* Sidebar navigation for Faculty Dashboard (Syllaverse)
------------------------------------------------ 
--}}
<nav id="sidebar" class="bg-white shadow-sm d-flex flex-column" style="width: 240px;">
    <div class="sidebar-header text-center py-4 border-bottom">
        <img src="{{ asset('images/syllaverse-text-logo.png') }}" alt="Syllaverse Logo" class="img-fluid mb-2" style="max-width: 160px;">
        <h6 class="text-danger fw-semibold mt-2">──── Faculty ────</h6>
    </div>

    <ul class="nav flex-column px-3 mt-3">
        {{-- Dashboard --}}
        <li class="nav-item mb-1">
            <a class="nav-link d-flex align-items-center gap-2 active" href="{{ route('faculty.dashboard') }}">
                <i class="bi bi-speedometer2"></i> <span class="label">Dashboard</span>
            </a>
        </li>

        {{-- My Classes --}}
        <li class="nav-item mb-1">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
                <i class="bi bi-journals"></i> <span class="label">My Classes</span>
            </a>
        </li>

        {{-- Syllabi --}}
        <li class="nav-item mb-1">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
                <i class="bi bi-files-alt"></i> <span class="label">Syllabi</span>
            </a>
        </li>

        {{-- Logout --}}
        <li class="nav-item mt-auto mb-3">
            <form action="{{ route('faculty.logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</nav>
