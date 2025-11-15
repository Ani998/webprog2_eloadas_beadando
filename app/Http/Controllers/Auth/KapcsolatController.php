<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uzenet;

class KapcsolatController extends Controller
{
    public function index()
    {
        return view('kapcsolat');
    }

    public function kuldes(Request $request)
    {
        $request->validate([
            'nev' => 'required|min:3|max:50',
            'email' => 'required|email',
            'uzenet' => 'required|min:5',
        ]);

        Uzenet::create([
            'nev' => $request->nev,
            'email' => $request->email,
            'uzenet' => $request->uzenet,
        ]);

        return back()->with('success', 'Üzenet sikeresen elküldve!');
    }
}
