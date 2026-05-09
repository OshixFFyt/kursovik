@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="rounded-3xl bg-gradient-to-r from-amber-200 via-orange-100 to-rose-100 p-6 shadow-lg shadow-amber-200/50">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-semibold text-slate-900">Месячный отчет птицефабрики</h1>
                <p class="mt-2 text-slate-700">Сводные данные о курицах, породах, работниках и производительности.</p>
            </div>
            <a href="{{ route('reports.export') }}" class="inline-flex items-center justify-center rounded-full bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-900/10 hover:bg-slate-800">Скачать отчет (CSV)</a>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-3">
        <div class="rounded-3xl bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-800">Общее количество кур</h2>
            <p class="mt-4 text-4xl font-bold text-amber-600">{{ $totalChickens }}</p>
        </div>
        <div class="rounded-3xl bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-800">Яиц в месяц</h2>
            <p class="mt-4 text-4xl font-bold text-rose-600">{{ $totalMonthlyEggs }}</p>
        </div>
        <div class="rounded-3xl bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-800">Работников</h2>
            <p class="mt-4 text-4xl font-bold text-slate-900">{{ $totalWorkers }}</p>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-2">
        <div class="rounded-3xl bg-white p-6 shadow-sm">
            <h2 class="text-xl font-semibold text-slate-900">Распределение работников по цехам</h2>
            <ul class="mt-4 space-y-3 text-slate-700">
                @foreach($workersByWorkshop as $workshop)
                    <li class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <div class="font-semibold text-slate-900">{{ $workshop->name }} ({{ $workshop->code }})</div>
                        <div class="mt-1 text-sm text-slate-600">Работников: <strong>{{ $workshop->worker_count }}</strong></div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="rounded-3xl bg-white p-6 shadow-sm">
            <h2 class="text-xl font-semibold text-slate-900">Породы и производительность</h2>
            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50 text-slate-700">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold">Порода</th>
                            <th class="px-4 py-3 text-left font-semibold">Кур</th>
                            <th class="px-4 py-3 text-left font-semibold">Среднее яиц</th>
                            <th class="px-4 py-3 text-left font-semibold">Диета</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @foreach($breeds as $breed)
                            <tr>
                                <td class="px-4 py-3">{{ $breed->name }}</td>
                                <td class="px-4 py-3">{{ $breed->chickens_count }}</td>
                                <td class="px-4 py-3">{{ number_format($breed->chickens_avg_monthly_eggs, 2) }}</td>
                                <td class="px-4 py-3">{{ $breed->diet_number }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
