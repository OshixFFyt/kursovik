@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-3xl rounded-xl bg-white p-6 shadow-sm">
    <h1 class="mb-4 text-2xl font-semibold">Добавить породу</h1>
    <form method="POST" action="{{ route('breeds.store') }}" class="space-y-4">
        @csrf
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Название</label>
                <input name="name" value="{{ old('name') }}" required class="w-full rounded-md border border-slate-300 px-3 py-2" />
                @error('name')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Средний вес (кг)</label>
                <input name="average_weight" type="number" step="0.01" value="{{ old('average_weight') }}" required class="w-full rounded-md border border-slate-300 px-3 py-2" />
                @error('average_weight')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Яиц в месяц</label>
                <input name="average_monthly_eggs" type="number" value="{{ old('average_monthly_eggs') }}" required class="w-full rounded-md border border-slate-300 px-3 py-2" />
                @error('average_monthly_eggs')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Номер диеты</label>
                <input name="diet_number" type="number" value="{{ old('diet_number') }}" required class="w-full rounded-md border border-slate-300 px-3 py-2" />
                @error('diet_number')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700">Описание</label>
            <textarea name="description" rows="4" class="w-full rounded-md border border-slate-300 px-3 py-2">{{ old('description') }}</textarea>
            @error('description')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>
        <div class="flex items-center gap-3 pt-4">
            <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-white">Сохранить</button>
            <a href="{{ route('breeds.index') }}" class="text-sm text-slate-600 hover:text-slate-900">Отмена</a>
        </div>
    </form>
</div>
@endsection
