@extends('layouts.app')

@section('title', 'Autentikáció')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4">Autentikáció</h1>

    @auth
        <div class="alert alert-success">
            Be vagy jelentkezve mint <strong>{{ auth()->user()->name }}</strong>
            ({{ auth()->user()->email }}).
        </div>
    @endauth

    <div class="row g-4">

        {{-- Bejelentkezés kártya --}}
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Bejelentkezés</h5>
                    <p class="card-text">
                        Ha már rendelkezel felhasználói fiókkal, itt tudsz belépni az oldalra.
                    </p>
                    <a href="{{ route('login') }}" class="btn btn-primary mt-auto">
                        Tovább a bejelentkezéshez
                    </a>
                </div>
            </div>
        </div>

        {{-- Regisztráció kártya --}}
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Regisztráció</h5>
                    <p class="card-text">
                        Ha még nincs fiókod, itt tudsz újat létrehozni.
                    </p>
                    <a href="{{ route('register') }}" class="btn btn-success mt-auto">
                        Tovább a regisztrációhoz
                    </a>
                </div>
            </div>
        </div>

    </div>

    @auth
        <hr class="my-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">
                Kijelentkezés
            </button>
        </form>
    @endauth

</div>
@endsection
