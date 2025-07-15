{{-- 
------------------------------------------------
* File: resources/views/layouts/faculty.blade.php
* Base layout structure for Faculty pages (Syllaverse)
------------------------------------------------ 
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Faculty • Syllaverse')</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- Custom Faculty CSS --}}
    @vite('resources/css/admin-faculty.css') {{-- reuse same style for now --}}
</head>
<body>

    <div class="d-flex" style="min-height: 100vh;">
        @include('includes.faculty-sidebar')

        <div class="flex-grow-1">
            @include('includes.faculty-navbar')

            <div class="container-fluid p-4">
                <h5 class="fw-bold text-secondary mb-4">@yield('page-title')</h5>
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
