@extends('layouts.app')

@section('title', 'Főoldal')

@section('content')
    <div class="p-5 mb-4 bg-white rounded-3 shadow-sm">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Üdvözöl a MoziDB 🎬</h1>
            <p class="col-md-8 fs-5 mt-3">
                Ez egy Laravel alapú webalkalmazás, amely mozifilmeket, mozikat és előadásokat kezel.
                A menüben megtalálod az adatbázis lekérdezéseket, a CRUD funkciót, az üzenetküldést
                és egy diagramot is az adatok alapján.
            </p>
            <a href="{{ url('/eloadasok') }}" class="btn btn-primary btn-lg mt-3">
                Nézd meg az előadásokat
            </a>
        </div>
    </div>
@endsection
