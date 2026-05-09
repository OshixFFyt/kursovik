<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    public function index()
    {
        $breeds = Breed::withCount('chickens')->get();

        return view('breeds.index', compact('breeds'));
    }

    public function create()
    {
        return view('breeds.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:breeds,name'],
            'average_monthly_eggs' => ['required', 'integer', 'min:0'],
            'average_weight' => ['required', 'numeric', 'min:0.1'],
            'diet_number' => ['required', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
        ]);

        Breed::create($data);

        return redirect()->route('breeds.index')->with('success', 'Порода добавлена.');
    }

    public function edit(Breed $breed)
    {
        return view('breeds.edit', compact('breed'));
    }

    public function update(Request $request, Breed $breed)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:breeds,name,' . $breed->id],
            'average_monthly_eggs' => ['required', 'integer', 'min:0'],
            'average_weight' => ['required', 'numeric', 'min:0.1'],
            'diet_number' => ['required', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
        ]);

        $breed->update($data);

        return redirect()->route('breeds.index')->with('success', 'Порода обновлена.');
    }

    public function destroy(Breed $breed)
    {
        $breed->delete();

        return redirect()->route('breeds.index')->with('success', 'Порода удалена.');
    }
}
