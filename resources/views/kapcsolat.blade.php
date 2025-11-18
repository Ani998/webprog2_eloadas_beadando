<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapcsolat - MoziDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">MoziDB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Navigáció váltása">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Főoldal</a></li>
                <li class="nav-item"><a class="nav-link" href="/eloadasok">Filmek listája</a></li>
                <li class="nav-item"><a class="nav-link" href="/crud">CRUD</a></li>
                <li class="nav-item"><a class="nav-link active" href="/kapcsolat">Kapcsolat</a></li>
                <li class="nav-item"><a class="nav-link" href="/authentication">Autentikáció</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1 class="text-center mb-4">Kapcsolat</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('kapcsolat.kuldes') }}" class="shadow p-4 bg-white rounded">
        @csrf

        <div class="mb-3">
            <label class="form-label">Név</label>
            <input type="text" name="nev" class="form-control" value="{{ old('nev') }}">
            @error('nev') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Üzenet</label>
            <textarea name="uzenet" rows="5" class="form-control">{{ old('uzenet') }}</textarea>
            @error('uzenet') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <button class="btn btn-primary">Üzenet küldése</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
