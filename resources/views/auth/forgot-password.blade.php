@extends('layouts.app')

@section('title', 'Elfelejtett jelszó')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Elfelejtett jelszó</h1>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="shadow p-4 bg-white rounded">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            @error('email') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Jelszóemlékeztető küldése</button>
    </form>
</div>
@endsection
