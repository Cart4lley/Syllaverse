{{-- 
------------------------------------------------
* File: resources/views/auth/superadmin-login.blade.php
* Description: Clean Super Admin Login – Syllaverse
------------------------------------------------ 
--}}
<!DOCTYPE html>
<html lang="en">

<head>
  {{-- ------------------------------------------
  | META & HEAD RESOURCES
  ------------------------------------------ --}}
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Super Admin Login • Syllaverse</title>
  <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

  {{-- Bootstrap & Fonts --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  {{-- ------------------------------------------
  | CUSTOM STYLES
  ------------------------------------------ --}}
  <style>
    /* ----- Global Body Setup ----- */
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #FAFAFA;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow: hidden;
    }

    /* ----- Static Red Background ----- */
    .accent-bg {
      position: absolute;
      top: -20%;
      right: -30%;
      width: 80vw;
      height: 120vh;
      background: linear-gradient(135deg, #EE6F57, #CB3737);
      transform: rotate(30deg);
      z-index: -1;
    }

    /* ----- Login Card ----- */
    .login-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
      max-width: 400px;
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
      margin-bottom: 1rem;
    }

    .login-card h4 {
      color: #CB3737;
      margin-bottom: 1.5rem;
      font-weight: 600;
    }

    .form-control {
      border-radius: 8px;
      padding: 12px;
      border: 1px solid #E3E3E3;
      transition: border-color 0.3s;
    }

    .form-control:focus {
      border-color: #CB3737;
      box-shadow: 0 0 0 0.2rem rgba(203, 55, 55, 0.2);
    }

    .btn-brand {
      background: #EE6F57;
      color: #fff;
      border-radius: 8px;
      padding: 12px;
      margin-top: 1rem;
      width: 100%;
      transition: background 0.3s;
    }

    .btn-brand:hover {
      background: #CB3737;
    }

    .error-box {
      background: #ffe5e5;
      color: #b30000;
      padding: 0.75rem;
      border-radius: 6px;
      margin-bottom: 1rem;
      font-size: 0.9rem;
    }

    footer {
      font-size: 0.85rem;
      color: #777;
      margin-top: 1.5rem;
    }

    /* ----- Responsive Tweaks ----- */
    @media (min-width: 700px) and (max-width: 1024px) {
      .accent-bg {
        top: -40%;
        right: -60%;
        width: 90vw;
        height: 90vh;
        transform: rotate(25deg);
      }
    }

    @media (min-width: 577px) and (max-width: 699px) {
      .accent-bg {
        top: -70%;
        right: -90%;
        width: 100vw;
        height: 100vh;
        transform: rotate(20deg);
      }

      .login-card {
        margin-top: 4rem;
      }
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

      .form-label {
        font-size: 0.9rem;
      }
    }
  </style>
</head>

<body>
  {{-- ------------------------------------------
  | Background
  ------------------------------------------ --}}
  <div class="accent-bg"></div>

  {{-- ------------------------------------------
  | Login Card UI
  ------------------------------------------ --}}
  <div class="login-card">
    <img src="{{ asset('images/syllaverse-logo.png') }}" alt="Syllaverse Logo" class="logo">
    <h4>Super Admin Login</h4>

    <form method="POST" action="{{ route('superadmin.login') }}" onsubmit="this.querySelector('button').disabled = true;">
      @csrf
      <div class="mb-3 text-start">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" class="form-control" required autofocus
          aria-label="Username" autocomplete="username">
      </div>
      <div class="mb-3 text-start">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" required
          aria-label="Password" autocomplete="current-password">
      </div>

      @if(session('error'))
        <div class="error-box">{{ session('error') }}</div>
      @endif

      <button type="submit" class="btn btn-brand">Login</button>
    </form>

    <footer>&copy; Batangas State University • 2025</footer>
  </div>
</body>

</html>
