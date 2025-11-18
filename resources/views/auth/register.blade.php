@extends('layouts.app')

@section('title', 'Regisztráció')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Regisztráció</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Név -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Név</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email cím</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jelszó -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Jelszó</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        @error('password')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jelszó megerősítése -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Jelszó újra</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Regisztráció</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
