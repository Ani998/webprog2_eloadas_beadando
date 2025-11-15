<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        $filmek = Film::all();
        return view('filmek.index', compact('filmek'));
    }

    public function create()
    {
        return view('filmek.create');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'cim' => 'required|string|max:255',
        'ev' => 'required|integer',
        'hossz' => 'required|integer',
    ]);

    Film::create($validated);

    return redirect()->route('filmek.index')
                     ->with('success', 'Film sikeresen hozzáadva!');
}


    public function edit(Film $film)
    {
        return view('filmek.edit', compact('film'));
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'cim' => 'required|string|max:255',
            'ev' => 'required|integer',
            'hossz' => 'required|integer',
        ]);

        $film->update($request->all());

        return redirect()->route('filmek.index')
                         ->with('success', 'Film frissítve!');
    }

   public function destroy(Film $film)
{
    $film->delete();

    return redirect()->route('filmek.index')
                     ->with('success', 'Film törölve!');
}

}
