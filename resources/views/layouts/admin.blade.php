{{-- 
------------------------------------------------
* File: resources/views/layouts/admin.blade.php
* Description: Base layout structure for Admin pages (Syllaverse)
------------------------------------------------ 
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin • Syllaverse')</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Custom CSS --}}
    @vite('resources/css/admin-dashboard.css')
</head>
<body class="bg-light">

    <div class="d-flex" id="wrapper">
        {{-- Sidebar --}}
        @include('includes.admin-sidebar')

        {{-- Page Content --}}
        <div id="page-content-wrapper" class="w-100">
            @include('includes.admin-navbar')

            <div class="container-fluid px-4 py-4">
                {{-- Flash Message --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Page Content --}}
                @yield('content')
            </div>
        </div>
    </div>

    {{-- Page-specific scripts --}}
    @stack('scripts')

</body>
</html>
