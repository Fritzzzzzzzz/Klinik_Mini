<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Klinik Sejahtera</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            🏥 Klinik Sejahtera
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                {{-- ================= GUEST ================= --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest

                {{-- ================= AUTH ================= --}}
                @auth
                    {{-- Dashboard User --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    {{-- Dashboard Admin (hanya admin) --}}
                    @can('isAdmin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                Admin
                            </a>
                        </li>
                    @endcan

                    {{-- Logout --}}
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-sm btn-light ms-3">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>

{{-- CONTENT --}}
<div class="container py-4">
    @yield('content')
</div>

{{-- FOOTER --}}
<footer class="bg-light text-center py-3 mt-5">
    <small>
        © {{ date('Y') }} Klinik Sejahtera — Rizqi & Team
    </small>
</footer>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
