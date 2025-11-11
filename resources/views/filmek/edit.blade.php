<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Film szerkesztése</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-3">Film szerkesztése: {{ $film->cim }}</h1>

    <form action="{{ route('filmek.update', $film) }}" method="POST">
        @method('PUT')
        @include('filmek._form', ['buttonText' => 'Frissítés'])
    </form>

    <a href="{{ route('filmek.index') }}" class="btn btn-secondary mt-3">Vissza</a>
</div>
</body>
</html>
