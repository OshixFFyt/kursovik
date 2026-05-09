@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-semibold">Работники</h1>
            <p class="text-slate-600">Управление сотрудниками птицефабрики и закрепленными за ними клетками.</p>
        </div>
        <a href="{{ route('workers.create') }}" class="inline-flex items-center rounded-md bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Добавить работника</a>
    </div>

    <div class="overflow-x-auto rounded-xl bg-white shadow-sm">
        <table class="min-w-full border-separate border-spacing-0 text-sm">
            <thead class="bg-slate-50 text-slate-700">
                <tr>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Имя</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Email</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Паспорт</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Зарплата</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Клеток</th>
                    <th class="border-b border-slate-200 px-4 py-3 text-left">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($workers as $worker)
                    <tr class="border-b border-slate-200 last:border-0">
                        <td class="px-4 py-3">{{ $worker->name }}</td>
                        <td class="px-4 py-3">{{ $worker->email }}</td>
                        <td class="px-4 py-3">{{ $worker->passport_series }} {{ $worker->passport_number }}</td>
                        <td class="px-4 py-3">{{ number_format($worker->salary, 2) }}</td>
                        <td class="px-4 py-3">{{ $worker->cages_count }}</td>
                        <td class="px-4 py-3">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('workers.edit', $worker) }}" class="rounded-md bg-slate-900 px-3 py-1 text-white hover:bg-slate-800">Изменить</a>
                                <form action="{{ route('workers.destroy', $worker) }}" method="POST" class="inline">
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
