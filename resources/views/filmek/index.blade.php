@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">🎬 Filmek</h1>

    {{-- Sikerüzenet --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    {{-- Új film gomb --}}
    <a href="{{ route('filmek.create') }}" class="btn btn-primary mb-3">+ Új film hozzáadása</a>

    {{-- Filmek táblázata --}}
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
                        <a href="{{ route('filmek.edit', $film->id) }}" class="btn btn-sm btn-warning">Szerkesztés</a>

                        <form action="{{ route('filmek.destroy', $film->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Biztosan törölni szeretnéd ezt a filmet?')">
                                Törlés
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
