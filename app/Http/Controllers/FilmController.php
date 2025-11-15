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
            'ev' => 'required|integer|min:1900|max:' . date('Y'),
            'hossz' => 'required|integer|min:1|max:600',
        ]);

        Film::create($validated);

        return redirect()->route('filmek.index')->with('success', 'Film sikeresen felvéve!');
    }

  public function edit(Film $film)
{
    return view('filmek.edit', compact('film'));
}

public function update(Request $request, Film $film)
{
    $validated = $request->validate([
        'cim' => 'required|string|max:255',
        'ev' => 'required|integer|min:1900|max:' . date('Y'),
        'hossz' => 'required|integer|min:1|max:600',
    ]);

    

    $film->update($validated);

    return redirect()->route('filmek.index')->with('success', 'Film frissítve!');
}


    public function destroy(Film $film)
    {
        $film->delete();

        return redirect()->route('filmek.index')->with('success', 'Film törölve!');
    }
}
