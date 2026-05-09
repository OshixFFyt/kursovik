<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use App\Models\Cage;
use App\Models\Chicken;
use Illuminate\Http\Request;

class ChickenController extends Controller
{
    public function index()
    {
        $chickens = Chicken::with(['breed', 'cage.workshop'])->get();

        return view('chickens.index', compact('chickens'));
    }

    public function create()
    {
        return view('chickens.create', [
            'breeds' => Breed::orderBy('name')->get(),
            'cages' => Cage::with('workshop')
                ->doesntHave('chicken')
                ->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'weight' => ['required', 'numeric', 'min:0.1'],
            'age' => ['required', 'integer', 'min:0'],
            'breed_id' => ['required', 'exists:breeds,id'],
            'monthly_eggs' => ['required', 'integer', 'min:0'],
            'cage_id' => ['nullable', 'exists:cages,id', 'unique:chickens,cage_id'],
        ]);

        Chicken::create($data);

        return redirect()->route('chickens.index')->with('success', 'Курица добавлена.');
    }

    public function edit(Chicken $chicken)
    {
        return view('chickens.edit', [
            'chicken' => $chicken->load(['breed', 'cage.workshop']),
            'breeds' => Breed::orderBy('name')->get(),
            'cages' => Cage::with('workshop')->get(),
        ]);
    }

    public function update(Request $request, Chicken $chicken)
    {
        $data = $request->validate([
            'weight' => ['required', 'numeric', 'min:0.1'],
            'age' => ['required', 'integer', 'min:0'],
            'breed_id' => ['required', 'exists:breeds,id'],
            'monthly_eggs' => ['required', 'integer', 'min:0'],
            'cage_id' => ['nullable', 'exists:cages,id', 'unique:chickens,cage_id,' . $chicken->id],
        ]);

        $chicken->update($data);

        return redirect()->route('chickens.index')->with('success', 'Данные курицы обновлены.');
    }

    public function destroy(Chicken $chicken)
    {
        $chicken->delete();

        return redirect()->route('chickens.index')->with('success', 'Курица удалена.');
    }
}
