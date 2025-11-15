@extends('layouts.app')

@section('title', 'Új film')

@section('content')
    <h1>Új film felvétele</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $hiba)
                    <li>{{ $hiba }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('filmek.store') }}" method="POST">
        @include('filmek._form')
        <button type="submit" class="btn btn-success">Mentés</button>
        <a href="{{ route('filmek.index') }}" class="btn btn-secondary">Mégse</a>
    </form>
@endsection
