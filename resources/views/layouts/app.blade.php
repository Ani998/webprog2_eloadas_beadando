<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>@yield('title', 'MoziDB')</title>

    <!-- MASSIVELY THEME CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <noscript><link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" /></noscript>
</head>
<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper" class="fade-in">

        <!-- Header -->
        <header id="header">
            <a href="/" class="logo">🎬 MoziDB</a>
        </header>

        <!-- Nav -->
        <nav id="nav">
            <ul class="links">
    <li><a href="/">Főoldal</a></li>
    <li><a href="/eloadasok">Filmek listája</a></li>
    <li><a href="{{ route('filmek.index') }}">CRUD</a></li>
    <li><a href="{{ route('diagram.index') }}">Diagram</a></li>
    <li><a href="/kapcsolat">Kapcsolat</a></li>

    @auth
        <li><a href="{{ route('uzenetek.index') }}">Üzenetek</a></li>

        @if(Auth::user()->role === 'admin')
            <li><a href="{{ route('admin.index') }}">Admin</a></li>
        @endif

        <!-- Kijelentkezés -->
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button style="background:none;border:none;color:white;cursor:pointer;">
                    {{ Auth::user()->name }} – Kijelentkezés
                </button>
            </form>
        </li>

    @else
        <li><a href="{{ route('login') }}">Bejelentkezés</a></li>
        <li><a href="{{ route('register') }}">Regisztráció</a></li>
    @endguest

</ul>

        </nav>

        <!-- Main Content -->
        <div id="main">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer id="footer">
            <section>
                <h3>MoziDB</h3>
                <p>Készített: Ondó Vivien(O4NEQB), Trinyik Anikó (EA1HYA)</p>
            </section>
        </footer>

        <!-- Copyright -->
        <div id="copyright">
            <ul><li>&copy; MoziDB</li><li>Design: HTML5UP</li></ul>
        </div>

    </div>

    <!-- MASSIVELY THEME JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
    <script src="{{ asset('assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/util.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
