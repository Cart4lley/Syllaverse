{{-- 
------------------------------------------------
* File: resources/views/auth/admin-login.blade.php
* Description: Admin Login Page (Syllaverse) – Super Admin UI with Google Login and responsive triangle background
------------------------------------------------ 
--}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login • Syllaverse</title>
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png" />

  {{-- Bootstrap & Fonts --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  {{-- Feather Icons --}}
  <script src="https://unpkg.com/feather-icons"></script>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #FAFAFA;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      overflow: hidden;
    }

    .accent-bg {
      position: absolute;
      bottom: 0;
      right: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #EE6F57, #CB3737);
      clip-path: polygon(100% 100%, 100% 0%, 0% 100%);
      z-index: -1;
    }

    .login-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
      max-width: 420px;
      width: 90%;
      padding: 2.5rem;
      text-align: center;
      animation: fadeInUp 0.8s ease both;
      z-index: 2;
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .login-card img.logo {
      max-width: 120px;
      margin-bottom: 0.5rem;
    }

    .login-card h4 {
      color: #CB3737;
      margin-bottom: 1.5rem;
      font-weight: 600;
    }

    .btn-google {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      border: 1px solid #E3E3E3;
      border-radius: 10px;
      padding: 10px;
      width: 100%;
      transition: 0.3s;
      font-weight: 500;
      background: #fff;
      text-decoration: none;
      color: #333;
    }

    .btn-google:hover {
      border-color: #CB3737;
      background-color: #fef3f2;
      color: #CB3737;
    }

    footer {
      font-size: 0.85rem;
      color: #777;
      margin-top: 1.5rem;
    }

    input:focus,
    button:focus,
    a:focus,
    select:focus,
    textarea:focus {
      outline: none !important;
      box-shadow: none !important;
      border-color: #CB3737 !important;
    }

    ::selection {
      background: #FFE5E0;
      color: #CB3737;
    }

    @media (max-width: 576px) {
      .accent-bg {
        display: none;
      }
      .login-card {
        padding: 2rem 1.5rem;
      }
      .login-card h4 {
        font-size: 1.2rem;
      }
    }
  </style>
</head>
<body>
  {{-- Triangle Background --}}
  <div class="accent-bg"></div>

  {{-- Admin Login Card --}}
  <div class="login-card">
    <img src="{{ asset('images/syllaverse-logo.png') }}" alt="Syllaverse Logo" class="logo">
    <h4>Admin Login</h4>

    {{-- Error Alerts --}}
    @if ($errors->has('email'))
      <div class="alert alert-danger">{{ $errors->first('email') }}</div>
    @endif
    @if ($errors->has('rejected'))
      <div class="alert alert-danger">{{ $errors->first('rejected') }}</div>
    @endif
    @if ($errors->has('approval'))
      <div class="alert alert-warning">{{ $errors->first('approval') }}</div>
    @endif

    {{-- Google Login --}}
    <a href="{{ route('admin.google.login') }}" class="btn-google" aria-label="Login with Google (Admin)">
      <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo" width="20" height="20">
      Sign in with Google
    </a>

    <p class="text-muted mt-3 mb-0" style="font-size: 13px;">
      Use your BSU GSuite account to access the dashboard.
    </p>

    <footer>&copy; Batangas State University • 2025</footer>
  </div>

  <script>
    feather.replace();
  </script>
</body>
</html>
