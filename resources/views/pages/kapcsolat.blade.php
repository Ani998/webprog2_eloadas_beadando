@extends('layouts.app')
@section('title', 'Kapcsolat')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Kapcsolat</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('kapcsolat.kuldes') }}" class="shadow p-4 bg-white rounded">
        @csrf

        <div class="mb-3">
            <label class="form-label">Név</label>
            <input type="text" name="nev" class="form-control" value="{{ old('nev') }}">
            @error('nev') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Üzenet</label>
            <textarea name="uzenet" rows="5" class="form-control">{{ old('uzenet') }}</textarea>
            @error('uzenet') <p class="text-danger small">{{ $message }}</p> @enderror
        </div>

        <button class="btn btn-primary">Üzenet küldése</button>
    </form>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



