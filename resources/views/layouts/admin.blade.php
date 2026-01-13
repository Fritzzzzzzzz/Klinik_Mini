<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Klinik Sejahtera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">
    <div class="bg-dark text-white p-3" style="width:250px; min-height:100vh">
        <h4 class="text-center">Admin Klinik</h4>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">🏠 Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="/admin/poli" class="nav-link text-white">🏥 Poli</a>
            </li>
            <li class="nav-item">
                <a href="/admin/doctor" class="nav-link text-white">👨‍⚕️ Dokter</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-sm btn-danger w-100 mt-3">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <div class="flex-fill p-4">
        @yield('content')
    </div>
</div>

</body>
</html>
