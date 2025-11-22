@extends('layouts.app')

@section('title', 'Beérkezett üzenetek')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Beérkezett üzenetek</h1>

    @if ($uzenetek->isEmpty())
        <div class="alert alert-info">
            Még nem érkezett üzenet.
        </div>
    @else
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Név</th>
                    <th>Email</th>
                    <th>Üzenet</th>
                    <th>Küldés ideje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($uzenetek as $uzenet)
                    <tr>
                        <td>{{ $uzenet->id }}</td>
                        <td>{{ $uzenet->nev }}</td>
                        <td>{{ $uzenet->email }}</td>
                        <td>{{ $uzenet->uzenet }}</td>
                        <td>{{ $uzenet->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
