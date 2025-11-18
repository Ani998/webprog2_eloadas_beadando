@extends('layouts.app')

@section('title', 'Email ellenőrzés')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Email ellenőrzés szükséges</h1>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            Új ellenőrző link elküldve a megadott email címre!
        </div>
    @endif

    <p>Kérlek, ellenőrizd az email fiókodat az aktiváló linkért.</p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Új ellenőrző link küldése</button>
    </form>
</div>
@endsection
