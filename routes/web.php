<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\KapcsolatController;

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
   KAPCSOLAT
------------------------------ */
Route::get('/kapcsolat', [KapcsolatController::class, 'index'])
    ->name('kapcsolat.index');

Route::post('/kapcsolat', [KapcsolatController::class, 'store'])
    ->name('kapcsolat.store');


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
Route::get('/uzenetek', function () {
    $uzenetek = \App\Models\Uzenet::orderBy('created_at', 'desc')->get();
    return view('pages.uzenetek', compact('uzenetek'));
})->middleware('auth')->name('uzenetek.index');



/* -----------------------------
   ADMIN MENÜ 
------------------------------ */


Route::get('/admin', function () {
    return view('pages.admin');
})->middleware(['auth', 'role:admin'])->name('admin.index');


/* -----------------------------
   DIAGRAM (Chart.js)
------------------------------ */
use App\Models\Eloadas;
use App\Models\Mozi;

Route::get('/diagram', function () {
    // Bevétel mozinként összesítve
    $adatok = Eloadas::selectRaw('moziid, SUM(bevetel) as ossz_bevetel')
        ->groupBy('moziid')
        ->with('mozi')
        ->get();

    $labels = $adatok->map(fn($e) => $e->mozi->neve ?? ('Mozi #' . $e->moziid));
    $values = $adatok->map(fn($e) => $e->ossz_bevetel);

    return view('pages.diagram', [
        'labels' => $labels,
        'values' => $values,
    ]);
})->name('diagram.index');


require __DIR__.'/settings.php'; 
require __DIR__.'/auth.php';

