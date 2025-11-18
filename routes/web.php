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

// rekord törlése
Route::get('/filmek/{film}/delete', [FilmController::class, 'destroy'])
     ->name('filmek.delete');

     //rekord update

     Route::resource('filmek', FilmController::class)->parameters([
    'filmek' => 'film'
]);


/* -----------------------------
   CRUD – FILMEK
   /filmek
------------------------------ */
Route::resource('filmek', \App\Http\Controllers\FilmController::class);


/* -----------------------------
   KAPCSOLAT (később kerül megírásra)
------------------------------ */
// Route::get('/kapcsolat', [...]);
// Route::post('/kapcsolat', [...]);
use App\Http\Controllers\KapcsolatController;

Route::get('/kapcsolat', [KapcsolatController::class, 'index'])->name('kapcsolat');
Route::post('/kapcsolat', [KapcsolatController::class, 'kuldes'])->name('kapcsolat.kuldes');
require __DIR__.'/auth.php';
Route::get('/admin', function() {
    return view('pages.admin_dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::get('/profil', function() {
    return view('pages.user_profile');
})->middleware(['auth', 'role:regisztrált látogató,admin'])->name('user.profile');
/* -----------------------------
   ÜZENETEK (auth után)
------------------------------ */
// Route::get('/uzenetek', [...])->middleware('auth');
Route::get('/uzenetek', function() {
    $uzenetek = DB::table('uzenetek')->orderBy('created_at', 'desc')->get();
    return view('pages.uzenetek', ['uzenetek' => $uzenetek]);
})->middleware(['auth', 'role:admin'])->name('uzenetek.index');

/* -----------------------------
   DIAGRAM (Chart.js)
------------------------------ */
// Route::get('/diagram', [...]);


/* -----------------------------
   ADMIN MENÜ (később role=admin middleware)
------------------------------ */
// Route::get('/admin', [...]);

