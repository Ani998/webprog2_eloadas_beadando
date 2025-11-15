@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-3">Új film hozzáadása</h1>

    <form action="{{ route('filmek.store') }}" method="POST">
        @include('filmek._form', ['buttonText' => 'Mentés'])
    </form>

    <a href="{{ route('filmek.index') }}" class="btn btn-secondary mt-3">Vissza</a>
</div>
@endsection
