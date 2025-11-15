<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FilmController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Minden oldal innen töltődik be.
|--------------------------------------------------------------------------
*/

/* -----------------------------
   FŐOLDAL
------------------------------ */
Route::get('/', function () {
    return view('pages.home');
});


/* -----------------------------
   ELŐADÁSOK TABLA (3 táblás lekérdezés)
------------------------------ */
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
            'eloadas.filmid',
            'eloadas.moziid',
            'eloadas.datum',
            'eloadas.nezoszam',
            'eloadas.bevetel'
        )
        ->orderBy('eloadas.datum', 'desc')
        ->get();

    return view('pages.eloadasok', ['adatok' => $adatok]);
});

// Rekord törlése
Route::get('/filmek/{film}/delete', [FilmController::class, 'destroy'])
     ->name('filmek.delete');

     //Rekord update

     Route::resource('filmek', FilmController::class)->parameters([
    'filmek' => 'film'
]);



Route::resource('filmek', \App\Http\Controllers\FilmController::class);

// Autentikációhoz
Route::get('/auth', function () {
    return view('pages.auth');
})->name('auth.page');

require __DIR__.'/auth.php';
/* -----------------------------
   KAPCSOLAT (később kerül megírásra)
------------------------------ */
// Route::get('/kapcsolat', [...]);
// Route::post('/kapcsolat', [...]);


/* -----------------------------
   ÜZENETEK (auth után)
------------------------------ */
// Route::get('/uzenetek', [...])->middleware('auth');


/* -----------------------------
   DIAGRAM (Chart.js)
------------------------------ */
// Route::get('/diagram', [...]);


/* -----------------------------
   ADMIN MENÜ (később role=admin middleware)
------------------------------ */
// Route::get('/admin', [...]);

require __DIR__.'/settings.php'; 
require __DIR__.'/auth.php'; 

