@extends('layouts.app')

@section('title', 'Bejelentkezés')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Bejelentkezés</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="shadow p-4 bg-white rounded">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
            @error('email') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Jelszó</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Bejelentkezés</button>
    </form>
</div>
@endsection
