{{--
------------------------------------------------
* File: resources/views/layouts/superadmin.blade.php
* Description: Base layout for all Super Admin pages
------------------------------------------------
--}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Super Admin • Syllaverse')</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Custom CSS --}}
    
    @vite('resources/css/superadmin/superadmin-sidebar.css')
    @vite('resources/css/superadmin/superadmin-navbar.css')
    @vite('resources/css/superadmin/superadmin-mobile.css')
    @vite('resources/css/superadmin/superadmin-layout.css')

    @vite('resources/css/superadmin/manage-account.css')
    @vite('resources/css/superadmin/master-data.css')


    @vite('resources/css/syllaverse-colors.css')
    
    @stack('styles')
</head>

<body class="bg-sv-light">
    <div class="d-flex" id="wrapper">
        @include('includes.superadmin-sidebar')

        <div id="page-content-wrapper" class="w-100">
            @include('includes.superadmin-navbar')

            {{-- Page Content --}}
            <main class="container-fluid px-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>

</html>
