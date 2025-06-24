
{{-- 
------------------------------------------------
* resources/views/admin/admin-dashboar.blade.php
* Admin Dashboard UI Layout (Syllaverse)
------------------------------------------------ 
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard • Syllaverse</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    

</body>
</html>

    
    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Custom CSS --}}
    @vite('resources/css/admin-dashboard.css')
</head>
<body class="bg-light">

    {{-- Sidebar + Header Layout --}}
    <div class="d-flex" id="wrapper">

        {{-- Sidebar --}}
        <nav id="sidebar" class="bg-white shadow-sm d-flex flex-column">
            <div class="sidebar-header text-center py-4 border-bottom">
                <img src="{{ asset('images/syllaverse-text-logo.png') }}" alt="Syllaverse Logo" class="img-fluid mb-2" style="max-width: 160px;">
                <h6 class="text-danger fw-semibold mt-2">──── Admin ────</h6>
            </div>

            <ul class="nav flex-column px-3 mt-3">

                {{-- Dashboard --}}
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center gap-2 active" href="#">
                        <i class="bi bi-speedometer2"></i> <span class="label">Dashboard</span>
                    </a>

                </li>

                {{-- Notification --}}
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <i class="bi bi-bell"></i> <span class="label"> Notification</span>
                    </a>
                </li>

                {{-- Calendar --}}
                <li class="nav-item mb-1">
                   <a class="nav-link d-flex align-items-center gap-2" href="#">
                    <i class="bi bi-calendar-event"></i> <span class="label">Calendar</span>
                </a>

                </li>

                {{-- Separator --}}
                <li><hr class="my-3 text-muted"></li>

                {{-- Syllabi --}}
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <i class="bi bi-book"></i> <span class="label"> Syllabi</span>
                    </a>
                </li>

                {{-- Faculty --}}
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <i class="bi bi-people"></i> <span class="label"> Faculty</span>
                    </a>
                </li>

                {{-- Class --}}
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <i class="bi bi-door-open"></i> <span class="label"> Class</span>
                    </a>
                </li>

                {{-- Separator --}}
                <li><hr class="my-3 text-muted"></li>

                {{-- Master Data --}}
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <i class="bi bi-gear"></i> <span class="label"> Master Data</span>
                    </a>
                </li>

            </ul>


        </nav>


        {{-- Page Content --}}
        <div id="page-content-wrapper" class="w-100">
            
            {{-- Top Navbar --}}
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
            </nav>



            {{-- Main Content --}}
            <div class="container-fluid px-4 py-4">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card stat-card shadow-sm border-0">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted">Registered Faculty</h6>
                                    <h3 class="text-dark fw-bold">32</h3>
                                </div>
                                <i class="bi bi-person-badge fs-2 text-danger"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card stat-card shadow-sm border-0">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted">Syllabi Submitted</h6>
                                    <h3 class="text-dark fw-bold">148</h3>
                                </div>
                                <i class="bi bi-journal-text fs-2 text-danger"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card stat-card shadow-sm border-0">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted">Student Users</h6>
                                    <h3 class="text-dark fw-bold">1,203</h3>
                                </div>
                                <i class="bi bi-people-fill fs-2 text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Add more content here --}}
                <div class="mt-5">
                    <h6 class="fw-bold text-secondary mb-3">System Logs</h6>
                    <div class="card border-0 shadow-sm p-3" style="min-height: 180px;">
                        <p class="text-muted">No recent activity logs to display.</p>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>
</html>
