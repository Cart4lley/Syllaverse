{{-- 
------------------------------------------------
* File: resources/views/auth/faculty-login.blade.php
* Description: Faculty Login Page (Syllaverse) with Google OAuth and session alerts
------------------------------------------------ 
--}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Faculty Login • Syllaverse</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    {{-- Custom CSS via Vite --}}
    @vite('resources/css/admin-faculty.css')
</head>

<body>
    <div class="container-fluid">
        <div class="row g-0">

            {{-- Left Branding --}}
            <div class="col-md-6 left-section d-none d-md-flex flex-column justify-content-center align-items-center text-center px-5 position-relative overflow-hidden">
                <div class="w-100 position-relative">

                    <div class="position-absolute top-0 start-0 opacity-10" style="z-index: 0;">
                        <img src="{{ asset('images/decor-academic.svg') }}" alt="Decor" style="width: 180px;" />
                    </div>

                    <img src="{{ asset('images/syllaverse-logo.png') }}" alt="Syllaverse Logo" class="mb-4 logo position-relative" />

                    <hr class="border-light opacity-50 mb-4" style="max-width: 400px; margin-inline: auto; z-index: 1;" />

                    <h2 class="fw-bold mb-3 position-relative">Streamline Your Syllabus Management</h2>
                    <p class="px-3 position-relative">
                        Syllaverse helps faculty members <strong>create, organize, and track</strong> syllabi and class progress for a smooth academic experience.
                    </p>

                    <blockquote class="text-light mt-4 fst-italic position-relative">
                        "Empowering educators, one syllabus at a time."
                    </blockquote>

                    <small class="d-block mt-5 text-light opacity-75 position-relative">
                        © Batangas State University • 2025
                    </small>
                </div>
            </div>

            {{-- Right Login Panel --}}
            <div class="col-md-6 d-flex align-items-center justify-content-center p-4">
                <div class="login-box text-center w-100" style="max-width: 360px;">

                    <h5 class="mb-4 text-muted fw-semibold">Faculty Login</h5>

                    {{-- Alerts --}}
                    @if(session('error'))
                        <div class="alert alert-danger d-flex align-items-center gap-2">
                            <i class="bi bi-exclamation-circle-fill"></i> {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                        </div>
                    @endif

                    {{-- Google Sign In --}}
                    <a href="{{ route('faculty.google.login') }}" class="btn google-btn d-flex align-items-center justify-content-center rounded-3 p-2 text-decoration-none">
                        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo" class="me-2" />
                        <span class="fw-semibold text-dark">Sign in with Google</span>
                    </a>

                    <p class="text-muted mt-3 mb-0" style="font-size: 13px;">
                        Use your BSU GSuite account to access the faculty dashboard.
                    </p>

                    <footer class="mt-4">
                        <hr />
                        Syllaverse v1.0 • BSU IT Capstone 2025
                    </footer>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
