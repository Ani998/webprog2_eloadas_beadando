<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Uzenet;

class KapcsolatController extends Controller
{
    // űrlap megjelenítése
    public function index()
    {
        return view('kapcsolat');
    }

    // űrlap elküldése
    public function kuldes(Request $request)
    {
        // szerver oldali validáció
        $request->validate([
            'nev' => 'required|min:3|max:50',
            'email' => 'required|email',
            'uzenet' => 'required|min:5',
        ]);

        // adat mentése az adatbázisba
        Uzenet::create([
            'nev' => $request->nev,
            'email' => $request->email,
            'uzenet' => $request->uzenet,
        ]);

        // visszajelzés a felhasználónak
        return back()->with('success', 'Üzenet sikeresen elküldve!');
    }
}
