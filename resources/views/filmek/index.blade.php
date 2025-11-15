@extends('layouts.app')

@section('title', 'Filmek')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Filmek</h1>
        <a href="{{ route('filmek.create') }}" class="btn btn-success">+ Új film hozzáadása</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Cím</th>
                <th>Év</th>
                <th>Hossz (perc)</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filmek as $film)
                <tr>
                    <td>{{ $film->id }}</td>
                    <td>{{ $film->cim }}</td>
                    <td>{{ $film->ev }}</td>
                    <td>{{ $film->hossz }}</td>
                    <td>
                        <a href="{{ route('filmek.edit', $film) }}"
                           class="btn btn-primary btn-sm">Szerkesztés</a>

                      <a href="{{ route('filmek.delete', $film) }}"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Biztosan törölni szeretnéd ezt a filmet?')">
    Törlés
</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
