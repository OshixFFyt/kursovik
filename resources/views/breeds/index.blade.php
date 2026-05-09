@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-semibold">Породы</h1>
            <p class="text-slate-600">Справочная информация о породах и производительности.</p>
        </div>
        <a href="{{ route('breeds.create') }}" class="inline-flex items-center rounded-md bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Добавить породу</a>
    </div>

    <div class="overflow-x-auto rounded-xl bg-white shadow-sm">
        <table class="min-w-full border-separate border-spacing-0 text-sm">
            <thead class="bg-slate-50 text-slate-700">
                <tr>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Название</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Яиц/мес</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Средний вес</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Диета</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Кур</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($breeds as $breed)
                    <tr class="border-b border-slate-200 last:border-0">
                        <td class="px-4 py-3">{{ $breed->name }}</td>
                        <td class="px-4 py-3">{{ $breed->average_monthly_eggs }}</td>
                        <td class="px-4 py-3">{{ $breed->average_weight }} кг</td>
                        <td class="px-4 py-3">{{ $breed->diet_number }}</td>
                        <td class="px-4 py-3">{{ $breed->chickens_count }}</td>
                        <td class="px-4 py-3">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('breeds.edit', $breed) }}" class="rounded-md bg-slate-900 px-3 py-1 text-white hover:bg-slate-800">Изменить</a>
                                <form action="{{ route('breeds.destroy', $breed) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-md bg-rose-600 px-3 py-1 text-white hover:bg-rose-500">Удалить</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
