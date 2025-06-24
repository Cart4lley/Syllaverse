{{-- 
------------------------------------------------
* resources/views/auth/student-login.blade.php
* Enhanced Student Login Page (Syllaverse)
------------------------------------------------ 
--}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Course Calendar</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    {{-- Custom CSS --}}
    @vite('resources/css/student.css')
</head>

<body class="bg-light">

    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center px-3">
        <div class="card shadow-lg rounded-4 p-5 w-100" style="max-width: 480px; background-color: #FAFAFA;">
            
            {{-- Logo --}}
            <div class="text-center mb-4">
                <img src="{{ asset('images/syllaverse-logo.png') }}" alt="Syllaverse Logo" style="max-width: 200px;" />
            </div>

            {{-- Headings --}}
            <div class="text-center mb-4">
                <h2 class="fw-bold" style="color: #CB3737;">Course Calendar</h2>
                <p class="text-muted">
                    Sign in with your <strong>BSU GSuite account</strong> to view your syllabus and track progress.
                </p>
            </div>

            {{-- Google Login Button --}}
            <div class="d-grid mb-3">
                <button class="btn google-btn d-flex align-items-center justify-content-center rounded-3 py-3" role="button" aria-label="Sign in with Google">
                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo" />
                    <span class="ms-2">Sign in with Google</span>
                </button>
            </div>

            {{-- Divider --}}
            <div class="text-center mt-4">
                <small class="text-muted">Need help? <a href="mailto:support@bsu.edu.ph">Contact Support</a></small>
            </div>
        </div>

        {{-- Footer --}}
        <footer class="mt-4 text-center text-muted small" style="font-size: 0.85rem;">
            <div>Syllaverse v1.0 &bullet; © {{ now()->year }} Batangas State University</div>
            <div class="mt-1">All rights reserved. Powered by CICS – ARASOF Nasugbu</div>
        </footer>
    </div>

</body>

</html>
