<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = User::where('role', 'worker')->withCount('cages')->get();

        return view('workers.index', compact('workers'));
    }

    public function create()
    {
        return view('workers.create', [
            'cages' => Cage::with('workshop')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'passport_series' => ['nullable', 'string', 'max:32'],
            'passport_number' => ['nullable', 'string', 'max:32'],
            'salary' => ['required', 'numeric', 'min:0'],
            'cage_ids' => ['array'],
            'cage_ids.*' => ['integer', 'exists:cages,id'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'worker',
            'passport_series' => $data['passport_series'] ?? null,
            'passport_number' => $data['passport_number'] ?? null,
            'salary' => $data['salary'],
        ]);

        $user->cages()->sync($data['cage_ids'] ?? []);

        return redirect()->route('workers.index')->with('success', 'Работник создан.');
    }

    public function edit(User $worker)
    {
        return view('workers.edit', [
            'worker' => $worker,
            'cages' => Cage::with('workshop')->get(),
        ]);
    }

    public function update(Request $request, User $worker)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . (int)$worker->id],
            'passport_series' => ['nullable', 'string', 'max:32'],
            'passport_number' => ['nullable', 'string', 'max:32'],
            'salary' => ['required', 'numeric', 'min:0'],
            'password' => ['nullable', 'confirmed', 'min:8'],
            'cage_ids' => ['array'],
            'cage_ids.*' => ['integer', 'exists:cages,id'],
        ]);

        $worker->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'passport_series' => $data['passport_series'] ?? null,
            'passport_number' => $data['passport_number'] ?? null,
            'salary' => $data['salary'],
        ]);

        if (!empty($data['password'])) {
            $worker->update(['password' => Hash::make($data['password'])]);
        }

        $worker->cages()->sync($data['cage_ids'] ?? []);

        return redirect()->route('workers.index')->with('success', 'Работник обновлен.');
    }

    public function destroy(User $worker)
    {
        $worker->cages()->detach();
        $worker->delete();

        return redirect()->route('workers.index')->with('success', 'Работник удален.');
    }
}
