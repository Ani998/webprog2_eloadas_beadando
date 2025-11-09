<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/eloadasok', function () {
    try {
        $adatok = DB::table('eloadas')
            ->join('film', 'eloadas.filmid', '=', 'film.id')
            ->join('mozi', 'eloadas.moziid', '=', 'mozi.id')
            ->select(
                'film.cim as film_cim',
                'film.ev as film_ev',
                'film.hossz as film_hossz',
                'mozi.neve as mozi_nev',
                'mozi.varos as mozi_varos',
                'mozi.ferohely as mozi_ferohely',
                DB::raw('SUM(eloadas.nezoszam) as osszes_nezo'),
                DB::raw('SUM(eloadas.bevetel) as osszes_bevetel')
            )
            ->groupBy(
                'film.cim',
                'film.ev',
                'film.hossz',
                'mozi.neve',
                'mozi.varos',
                'mozi.ferohely'
            )
            ->get();

        return response()->json($adatok);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
});
