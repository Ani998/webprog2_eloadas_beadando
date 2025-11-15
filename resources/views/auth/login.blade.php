@extends('layouts.app')

@section('title', 'Bejelentkezés')

@section('content')
<div class="container mt-5" style="max-width: 420px;">
    <h2 class="mb-4 text-center">Bejelentkezés</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            Hibás adatok!<br>
            @foreach ($errors->all() as $error)
                • {{ $error }} <br>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jelszó:</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Bejelentkezés</button>
    </form>
</div>
@endsection
