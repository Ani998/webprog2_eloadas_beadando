<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoziDB - Főoldal</title>
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
                        <a class="nav-link" href="/filmek">CRUD</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

   
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="fw-bold mb-4">Üdvözlünk a mozis oldalunkon!</h1>
            <p class="lead">
                Ez az oldal a magyar mozik és filmvetítések világát mutatja be.
                Megtekintheted az aktuális előadásokat, böngészhetsz a filmek között,
                és akár saját bejegyzéseket is létrehozhatsz az admin felületen.
            </p>
            <a href="/eloadasok" class="btn btn-primary btn-lg mt-3">
                Előadások megtekintése
            </a>
        </div>

        <hr class="my-5">

        <div class="row text-center">
            <div class="col-md-4">
                <h4> Filmek</h4>
                <p>Fedezd fel a moziban futó legnépszerűbb filmeket és klasszikusokat.</p>
            </div>
            <div class="col-md-4">
                <h4> Mozik</h4>
                <p>Tekintsd meg, hol vetítik a kedvenc filmedet az ország különböző városaiban.</p>
            </div>
            <div class="col-md-4">
                <h4> Statisztikák</h4>
                <p>Részletes nézőszám- és bevételadatok diagramokon keresztül.</p>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">&copy; {{ date('Y') }} MoziDB – Készítette: <strong>Ondó Vivien (O4NEQB) és Trinyik Anikó (EA1HYA)</strong></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstra
