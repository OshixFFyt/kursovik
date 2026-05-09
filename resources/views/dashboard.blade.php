@extends('layouts.app')

@section('content')
<div class="grid gap-6 lg:grid-cols-4">
    <div class="rounded-3xl bg-gradient-to-br from-amber-50 via-white to-rose-50 p-6 shadow-lg shadow-amber-200/30">
        <h2 class="text-sm font-semibold uppercase tracking-[0.2em] text-amber-700">Кур</h2>
        <p class="mt-5 text-4xl font-bold text-slate-900">{{ $chickenCount }}</p>
        <p class="mt-3 text-sm text-slate-500">Всего кур в системе</p>
    </div>
    <div class="rounded-3xl bg-gradient-to-br from-slate-50 via-white to-slate-100 p-6 shadow-lg shadow-slate-200/30">
        <h2 class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-700">Пород</h2>
        <p class="mt-5 text-4xl font-bold text-slate-900">{{ $breedCount }}</p>
        <p class="mt-3 text-sm text-slate-500">Различных пород кур</p>
    </div>
    <div class="rounded-3xl bg-gradient-to-br from-emerald-50 via-white to-cyan-50 p-6 shadow-lg shadow-emerald-200/30">
        <h2 class="text-sm font-semibold uppercase tracking-[0.2em] text-emerald-700">Работников</h2>
        <p class="mt-5 text-4xl font-bold text-slate-900">{{ $workerCount }}</p>
        <p class="mt-3 text-sm text-slate-500">Работающих сотрудников</p>
    </div>
    <div class="rounded-3xl bg-gradient-to-br from-violet-50 via-white to-slate-100 p-6 shadow-lg shadow-violet-200/30">
        <h2 class="text-sm font-semibold uppercase tracking-[0.2em] text-violet-700">Цехов</h2>
        <p class="mt-5 text-4xl font-bold text-slate-900">{{ $workshopCount }}</p>
        <p class="mt-3 text-sm text-slate-500">Число производственных цехов</p>
    </div>
</div>
@endsection
