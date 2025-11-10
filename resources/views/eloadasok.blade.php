<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Előadások - MoziDB</title>
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
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Főoldal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/eloadasok">Előadások</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kapcsolat">Kapcsolat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/crud">CRUD</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">🎬 Előadások listája</h1>

        <table class="table table-striped table-bordered shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Film címe</th>
                    <th>Év</th>
                    <th>Hossz (perc)</th>
                    <th>Mozi neve</th>
                    <th>Város</th>
                    <th>Férőhely</th>
                    <th>Dátum</th>
                    <th>Nézőszám</th>
                    <th>Bevétel (Ft)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adatok as $a)
                    <tr>
                        <td>{{ $a->film_cim }}</td>
                        <td>{{ $a->film_ev }}</td>
                        <td>{{ $a->film_hossz }}</td>
                        <td>{{ $a->mozi_nev }}</td>
                        <td>{{ $a->mozi_varos }}</td>
                        <td>{{ $a->mozi_ferohely }}</td>
                        <td>{{ $a->datum }}</td>
                        <td>{{ number_format($a->nezoszam, 0, ',', ' ') }}</td>
                        <td>{{ number_format($a->bevetel, 0, ',', ' ') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center mt-4">
            <a href="/" class="btn btn-secondary">🏠 Vissza a fő
