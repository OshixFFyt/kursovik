<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use App\Models\Chicken;
use App\Models\User;
use App\Models\Workshop;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'chickenCount' => Chicken::count(),
            'breedCount' => Breed::count(),
            'workerCount' => User::where('role', 'worker')->count(),
            'workshopCount' => Workshop::count(),
        ]);
    }
}
