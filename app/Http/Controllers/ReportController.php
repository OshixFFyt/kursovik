<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use App\Models\Chicken;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    public function index()
    {
        $breeds = Breed::withCount('chickens')
            ->withAvg('chickens', 'monthly_eggs')
            ->get();

        $totalChickens = Chicken::count();
        $totalMonthlyEggs = Chicken::sum('monthly_eggs');
        $workersByWorkshop = Workshop::withCount(['cages as worker_count' => function ($query) {
            $query->whereHas('workers');
        }])->get();

        return view('reports.index', [
            'breeds' => $breeds,
            'totalChickens' => $totalChickens,
            'totalMonthlyEggs' => $totalMonthlyEggs,
            'totalWorkers' => User::where('role', 'worker')->count(),
            'workersByWorkshop' => $workersByWorkshop,
        ]);
    }

    public function export(): Response|StreamedResponse
    {
        $breeds = Breed::withCount('chickens')
            ->withAvg('chickens', 'monthly_eggs')
            ->get();

        $csvData = [];
        $csvData[] = ['Порода', 'Количество кур', 'Средняя продуктивность', 'Номер диеты'];

        foreach ($breeds as $breed) {
            $csvData[] = [
                $breed->name,
                $breed->chickens_count,
                number_format($breed->chickens_avg_monthly_eggs, 2),
                $breed->diet_number,
            ];
        }

        $csvData[] = [];
        $csvData[] = ['Общее количество кур', Chicken::count()];
        $csvData[] = ['Общее количество яиц в месяц', Chicken::sum('monthly_eggs')];
        $csvData[] = ['Общее количество работников', User::where('role', 'worker')->count()];

        $callback = function () use ($csvData) {
            $handle = fopen('php://output', 'w');
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }
            fclose($handle);
        };

        return response()->streamDownload($callback, 'report_cursovaya.csv', [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="report_cursovaya.csv"',
        ]);
    }
}
