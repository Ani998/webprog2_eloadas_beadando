<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FilmController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/eloadasok', function () {
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
            'eloadas.datum',
            'eloadas.nezoszam',
            'eloadas.bevetel'
        )
        ->orderBy('eloadas.datum', 'desc')
        ->get();



    return view('eloadasok', ['adatok' => $adatok]);
});





Route::get('/', function () {
    return view('welcome');
});

Route::resource('filmek', FilmController::class);
