@extends('layouts.app')

@section('title', 'Mozielőadások')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Mozielőadások listája</h1>

    @if ($adatok->isEmpty())
        <div class="alert alert-info">
            Nincs megjeleníthető előadás az adatbázisban.
        </div>
    @else
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Film címe</th>
                    <th>Év</th>
                    <th>Hossz (perc)</th>
                    <th>Mozi neve</th>
                    <th>Város</th>
                    <th>Férőhely</th>
                    <th>Előadás dátuma</th>
                    <th>Nézőszám</th>
                    <th>Bevétel (Ft)</th>
                    <th>Film ID</th>
                    <th>Mozi ID</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($adatok as $a)
                    <tr>
                        <td>{{ $a->film_cim }}</td>
                        <td>{{ $a->film_ev }}</td>
                        <td>{{ $a->film_hossz }}</td>
                        <td>{{ $a->mozi_nev }}</td>
                        <td>{{ $a->mozi_varos }}</td>
                        <td>{{ $a->mozi_ferohely }}</td>
                        <td>{{ $a->datum }}</td>
                        <td>{{ number_format($a->nezoszam, 0, ',', ' ') }}</td>
                        <td>{{ number_format($a->bevetel, 0, ',', ' ') }}</td>
                        <td>{{ $a->filmid }}</td>
                        <td>{{ $a->moziid }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
