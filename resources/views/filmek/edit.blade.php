@extends('layouts.app')

@section('title', 'Film szerkesztése')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4">Film szerkesztése</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('filmek.update', $film) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        {{-- Cím --}}
        <div class="mb-3">
            <label class="form-label">Cím:</label>
            <input type="text" name="cim" class="form-control" value="{{ old('cim', $film->cim) }}" required>
        </div>

        {{-- Év --}}
        <div class="mb-3">
            <label class="form-label">Év:</label>
            <input type="number" name="ev" class="form-control" value="{{ old('ev', $film->ev) }}" required>
        </div>

        {{-- Hossz --}}
        <div class="mb-3">
            <label class="form-label">Hossz (perc):</label>
            <input type="number" name="hossz" class="form-control" value="{{ old('hossz', $film->hossz) }}" required>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('filmek.index') }}" class="btn btn-secondary">Vissza</a>
            <button type="submit" class="btn btn-primary">Mentés</button>
        </div>

    </form>

</div>
@endsection
