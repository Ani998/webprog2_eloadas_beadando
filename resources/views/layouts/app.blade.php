<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MoziDB')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            🎬 MoziDB
        </a>

        <!-- MOBILE MENU BUTTON -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">

                <!-- Főoldal -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Főoldal</a>
                </li>

                <!-- Filmek listája -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/eloadasok') }}">Filmek listája</a>
                </li>

                <!-- CRUD -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('filmek.index') }}">CRUD</a>
                </li>

                <!-- Diagram -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('diagram.index') }}">Diagram</a>
                </li>

                <!-- Kapcsolat -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/kapcsolat') }}">Kapcsolat</a>
                </li>

                @auth
                    <!-- Üzenetek -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('uzenetek.index') }}">Üzenetek</a>
                    </li>

                    @if(Auth::user()->role === 'admin')
                        <!-- Admin -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index') }}">Admin</a>
                        </li>
                    @endif
                @endauth

                <!-- LOGIN / REGISTER vagy USER DROPDOWN -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Bejelentkezés</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Regisztráció</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                           role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item">Kijelentkezés</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest

            </ul>
        </div>

    </div>
</nav>

<!-- OLDAL TARTALOM -->
<div class="container mt-4">
    @yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
