@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-3xl rounded-xl bg-white p-6 shadow-sm">
    <h1 class="mb-4 text-2xl font-semibold">Добавить курицу</h1>
    <form method="POST" action="{{ route('chickens.store') }}" class="space-y-4">
        @csrf
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Вес (кг)</label>
                <input name="weight" type="number" step="0.01" value="{{ old('weight') }}" required class="w-full rounded-md border border-slate-300 px-3 py-2" />
                @error('weight')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Возраст (месяцев)</label>
                <input name="age" type="number" value="{{ old('age') }}" required class="w-full rounded-md border border-slate-300 px-3 py-2" />
                @error('age')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Порода</label>
                <select name="breed_id" required class="w-full rounded-md border border-slate-300 px-3 py-2">
                    <option value="">{{ $breeds->isEmpty() ? 'Породы не найдены. Добавьте породу.' : 'Выберите породу' }}</option>
                    @foreach($breeds as $breed)
                        <option value="{{ $breed->id }}" {{ old('breed_id') == $breed->id ? 'selected' : '' }}>{{ $breed->name }}</option>
                    @endforeach
                </select>
                @error('breed_id')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Яиц в месяц</label>
                <input name="monthly_eggs" type="number" value="{{ old('monthly_eggs') }}" required class="w-full rounded-md border border-slate-300 px-3 py-2" />
                @error('monthly_eggs')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700">Клетка</label>
            <select name="cage_id" class="w-full rounded-md border border-slate-300 px-3 py-2">
                <option value="" {{ $cages->isEmpty() ? 'disabled' : '' }}>{{ $cages->isEmpty() ? 'Нет доступных клеток' : 'Без клетки' }}</option>
                @foreach($cages as $cage)
                    <option value="{{ $cage->id }}" {{ old('cage_id') == $cage->id ? 'selected' : '' }}>{{ $cage->workshop->code }} / {{ $cage->row }} / {{ $cage->number }}</option>
                @endforeach
            </select>
            @error('cage_id')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>
        <div class="flex items-center gap-3 pt-4">
            <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-white">Сохранить</button>
            <a href="{{ route('chickens.index') }}" class="text-sm text-slate-600 hover:text-slate-900">Отмена</a>
        </div>
    </form>
</div>
@endsection
