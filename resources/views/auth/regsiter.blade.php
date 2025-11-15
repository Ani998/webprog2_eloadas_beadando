@extends('layouts.app')

@section('title', 'Regisztráció')

@section('content')
<div class="container mt-5" style="max-width: 450px;">
    <h2 class="mb-4 text-center">Regisztráció</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            Hibák!<br>
            @foreach ($errors->all() as $error)
                • {{ $error }} <br>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Név:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jelszó:</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jelszó újra:</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button class="btn btn-success w-100">Regisztráció</button>
    </form>
</div>
@endsection
