@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-semibold">Куры</h1>
            <p class="text-slate-600">Управление записями о курах и их локациях.</p>
        </div>
        <a href="{{ route('chickens.create') }}" class="inline-flex items-center rounded-md bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Добавить курицу</a>
    </div>

    <div class="overflow-x-auto rounded-xl bg-white shadow-sm">
        <table class="min-w-full border-separate border-spacing-0 text-sm">
            <thead class="bg-slate-50 text-slate-700">
                <tr>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">ID</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Вес</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Возраст</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Порода</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Яиц/мес</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Клетка</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($chickens as $chicken)
                    <tr class="border-b border-slate-200 last:border-0">
                        <td class="px-4 py-3">{{ $chicken->id }}</td>
                        <td class="px-4 py-3">{{ $chicken->weight }} кг</td>
                        <td class="px-4 py-3">{{ $chicken->age }} мес.</td>
                        <td class="px-4 py-3">{{ $chicken->breed->name }}</td>
                        <td class="px-4 py-3">{{ $chicken->monthly_eggs }}</td>
                        <td class="px-4 py-3">{{ $chicken->cage ? $chicken->cage->workshop->code . ' / ' . $chicken->cage->row . ' / ' . $chicken->cage->number : 'Не назначена' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('chickens.edit', $chicken) }}" class="rounded-md bg-slate-900 px-3 py-1 text-white hover:bg-slate-800">Изменить</a>
                                <form action="{{ route('chickens.destroy', $chicken) }}" method="POST" class="inline">
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
