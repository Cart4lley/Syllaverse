{{-- 
------------------------------------------------
* File: resources/views/auth/superadmin-login.blade.php
* Description: Final Super Admin Login – Syllaverse (Desktop-like Tablet Layout)
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
      top: -20%;
      right: -30%;
      width: 80vw;
      height: 120vh;
      background: linear-gradient(135deg, #EE6F57, #CB3737);
      transform: rotate(30deg);
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
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
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

    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
      opacity: 0.85;
      transform: scale(0.85) translateY(-1.5rem) translateX(0.15rem);
    }

    .form-floating label {
      transition: 0.3s ease all;
    }

    .form-control {
      border-radius: 10px;
      border: 1px solid #E3E3E3;
    }

    .form-control:focus {
      border-color: #CB3737;
      box-shadow: 0 0 0 0.2rem rgba(203, 55, 55, 0.15);
    }

    .password-wrapper {
      position: relative;
    }

    .toggle-password {
      position: absolute;
      right: 1rem;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #888;
    }

    .btn-brand {
      background: #EE6F57;
      color: #fff;
      border-radius: 8px;
      padding: 12px;
      margin-top: 1rem;
      width: 100%;
      transition: background 0.3s;
      font-weight: 500;
    }

    .btn-brand:hover {
      background: #CB3737;
    }

    .loading-dots::after {
      content: " .";
      animation: dots 1s steps(5, end) infinite;
    }

    @keyframes dots {
      0%, 20% { content: " ."; }
      40% { content: " .."; }
      60% { content: " ..."; }
      80%, 100% { content: " ."; }
    }

    footer {
      font-size: 0.85rem;
      color: #777;
      margin-top: 1.5rem;
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

    @media (max-width: 991.98px) and (min-width: 577px) {
      .accent-bg {
        top: -20%;
        right: -30%;
        width: 80vw;
        height: 120vh;
        transform: rotate(30deg);
        opacity: 1;
      }

      .login-card {
        padding: 2.5rem;
        max-width: 420px;
      }
    }
  </style>
</head>

<body>
  {{-- ------------------------------------------
  | Background Shape
  ------------------------------------------ --}}
  <div class="accent-bg"></div>

  {{-- ------------------------------------------
  | Login Card
  ------------------------------------------ --}}
  <div class="login-card">
    <img src="{{ asset('images/syllaverse-logo.png') }}" alt="Syllaverse Logo" class="logo">
    <h4>Super Admin Login</h4>

    {{-- Session Error --}}
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    {{-- Form --}}
    <form method="POST" action="{{ route('superadmin.login') }}" onsubmit="handleLoginSubmit(this)">
      @csrf

      <div class="form-floating mb-3">
        <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required autofocus>
        <label for="username">Username</label>
        @error('username')
          <div class="invalid-feedback text-start">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-floating mb-3 password-wrapper">
        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
        <label for="password">Password</label>
        <i data-feather="eye" class="toggle-password" onclick="togglePassword()"></i>
        @error('password')
          <div class="invalid-feedback text-start">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-brand" id="loginBtn">
        <span id="loginText">Login</span>
      </button>
    </form>

    <footer>&copy; Batangas State University • 2025</footer>
  </div>

  {{-- ------------------------------------------
  | Scripts
  ------------------------------------------ --}}
  <script>
    function togglePassword() {
      const passwordInput = document.getElementById("password");
      const icon = document.querySelector(".toggle-password");
      const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);
      icon.setAttribute("data-feather", type === "password" ? "eye" : "eye-off");
      feather.replace();
    }

    function handleLoginSubmit(form) {
      const button = form.querySelector("#loginBtn");
      const text = button.querySelector("#loginText");
      button.disabled = true;
      text.textContent = "Logging in";
      text.classList.add("loading-dots");
    }

    feather.replace();
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
