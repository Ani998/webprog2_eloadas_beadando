@extends('layouts.app')

@section('title', 'Admin felület')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Admin felület</h1>
    <p>Csak <strong>admin</strong> szerepkörű felhasználók láthatják ezt az oldalt.</p>

    <ul class="list-group mt-3">
        <li class="list-group-item">
            <a href="{{ route('uzenetek.index') }}">Beérkezett üzenetek megtekintése</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('filmek.index') }}">Filmek CRUD kezelése</a>
        </li>
    </ul>
</div>
@endsection
