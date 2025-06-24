{{-- 
------------------------------------------------
* resources/views/auth/faculty-login.blade.php
* Faculty Login Page (Syllaverse) with logo-only branding
------------------------------------------------ 
--}}
<!DOCTYPE html>
<html lang="en">

<head>
    {{-- 
    ------------------------------------------------
    * Page setup with Bootstrap, title, and favicon
    ------------------------------------------------ 
    --}}
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> Faculty</title>
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

                    {{-- Background Decorative Icon --}}
                    <div class="position-absolute top-0 start-0 opacity-10" style="z-index: 0;">
                        <img src="{{ asset('images/decor-academic.svg') }}" alt="" style="width: 180px;" />
                    </div>

                    {{-- Logo --}}
                    <img src="{{ asset('images/syllaverse-logo.png') }}" alt="Syllaverse Logo"
                        class="mb-4 position-relative logo" />

                    {{-- Divider --}}
                    <hr class="border-light opacity-50 mb-4" style="max-width: 400px; margin-inline: auto; z-index: 1;" />

                    {{-- Tagline --}}
                    <h2 class="fw-bold mb-3 position-relative tagline">
                        Streamline Your Syllabus Management
                    </h2>

                    {{-- Description --}}
                    <p class="px-3 position-relative description">
                        Syllaverse helps faculty members easily <strong>create, organize, and track</strong> syllabi and class progress for a smooth academic experience.
                    </p>

                    {{-- Quote --}}
                    <blockquote class="text-light mt-4 fst-italic position-relative quote">
                        "Empowering educators, one syllabus at a time."
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
                    <h5 class="mb-4 text-muted fw-semibold">Faculty Login</h5>

                    {{-- Google Login Button --}}
                    <button class="btn google-btn d-flex align-items-center justify-content-center rounded-3 p-2">
                        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo" />
                        Sign in with Google
                    </button>

                    <p class="text-muted mt-3 mb-0" style="font-size: 13px;">
                        Use your BSU GSuite account to access the faculty dashboard.
                    </p>

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
