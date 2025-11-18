@extends('layouts.app')

@section('title', 'Jelszó visszaállítás')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Jelszó visszaállítás</h1>

    <form method="POST" action="{{ route('password.store') }}" class="shadow p-4 bg-white rounded">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $request->email) }}" required>
            @error('email') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Új jelszó</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Új jelszó újra</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Jelszó visszaállítása</button>
    </form>
</div>
@endsection
