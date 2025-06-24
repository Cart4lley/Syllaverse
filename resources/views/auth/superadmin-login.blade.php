{{-- 
------------------------------------------------
* resources/views/auth/superadmin-login.blade.php
* Super Admin Login Page (Full UI - like Admin)
------------------------------------------------ 
--}}
<!DOCTYPE HTML>
<html lang="en">

<head>
    {{-- 
    ------------------------------------------------
    * Page setup with Bootstrap, title, and favicon
    ------------------------------------------------ 
    --}}
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Super Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    {{-- Link to compiled CSS via Vite --}}
    @vite('resources/css/admin-faculty.css')
</head>

<body>
    <div class="container-fluid">
        <div class="row g-0">

            {{-- Left branding panel --}}
            <div
                class="col-md-6 left-section d-flex flex-column justify-content-center align-items-center text-center px-5 position-relative overflow-hidden">
                <div class="w-100">

                    {{-- Logo --}}
                    <img src="{{ asset('images/syllaverse-logo.png') }}" alt="Syllaverse Logo"
                        class="mb-4 position-relative logo" />

                    {{-- Divider --}}
                    <hr class="border-light opacity-50 mb-4" style="max-width: 400px; margin-inline: auto; z-index: 1;" />

                    {{-- Tagline --}}
                    <h2 class="fw-bold mb-3 position-relative tagline">
                        Syllaverse Admin Access
                    </h2>

                    {{-- Description --}}
                    <p class="px-3 position-relative description">
                        The Super Admin portal is exclusively for the Vice Chancellor for Academic Affairs.
                        Monitor university-wide academic performance and policies with ease.
                    </p>

                    {{-- Quote --}}
                    <blockquote class="text-light mt-4 fst-italic position-relative quote">
                        "Empowered leadership shapes empowered learning."
                    </blockquote>

                    {{-- Footer Note --}}
                    <small class="d-block mt-5 text-light opacity-75 position-relative footer-note">
                        © Batangas State University • 2025
                    </small>
                </div>
            </div>

            {{-- Right login panel --}}
            <div class="col-md-6 d-flex align-items-center justify-content-center p-4">
                <div class="login-box text-center">
                    <h5 class="mb-4 text-muted fw-semibold">Super Admin Login</h5>

                    {{-- Google Login Button --}}
                    <button class="btn google-btn d-flex align-items-center justify-content-center rounded-3 p-2">
                        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo" />
                        Sign in with Google
                    </button>

                    <footer>
                        <hr class="my-4" />
                        Syllaverse v1.0 • BSU IT Capstone 2025
                    </footer>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
