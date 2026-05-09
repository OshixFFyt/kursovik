@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-3xl rounded-xl bg-white p-6 shadow-sm">
    <h1 class="mb-4 text-2xl font-semibold">Редактировать работника</h1>
    <form method="POST" action="{{ route('workers.update', $worker) }}" class="space-y-4">
        @csrf
        @method('PUT')
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Имя</label>
                <input name="name" value="{{ old('name', $worker->name) }}" required class="w-full rounded-md border border-slate-300 px-3 py-2" />
                @error('name')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Email</label>
                <input name="email" type="email" value="{{ old('email', $worker->email) }}" required class="w-full rounded-md border border-slate-300 px-3 py-2" />
                @error('email')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Новая пароль</label>
                <input name="password" type="password" class="w-full rounded-md border border-slate-300 px-3 py-2" />
                @error('password')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Подтверждение пароля</label>
                <input name="password_confirmation" type="password" class="w-full rounded-md border border-slate-300 px-3 py-2" />
            </div>
        </div>
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Серия паспорта</label>
                <input name="passport_series" value="{{ old('passport_series', $worker->passport_series) }}" class="w-full rounded-md border border-slate-300 px-3 py-2" />
                @error('passport_series')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Номер паспорта</label>
                <input name="passport_number" value="{{ old('passport_number', $worker->passport_number) }}" class="w-full rounded-md border border-slate-300 px-3 py-2" />
                @error('passport_number')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700">Зарплата</label>
            <input name="salary" type="number" step="0.01" value="{{ old('salary', $worker->salary) }}" required class="w-full rounded-md border border-slate-300 px-3 py-2" />
            @error('salary')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700">Закрепленные клетки</label>
            <div class="grid gap-3 md:grid-cols-2">
                @foreach($cages as $cage)
                    <label class="flex items-center gap-3 rounded-md border border-slate-200 bg-slate-50 p-3">
                        <input type="checkbox" name="cage_ids[]" value="{{ $cage->id }}" {{ in_array($cage->id, old('cage_ids', $worker->cages->pluck('id')->toArray())) ? 'checked' : '' }} class="h-4 w-4 rounded" />
                        <span>{{ $cage->workshop->code }} / {{ $cage->row }} / {{ $cage->number }}</span>
                    </label>
                @endforeach
            </div>
            @error('cage_ids')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>
        <div class="flex items-center gap-3 pt-4">
            <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-white">Сохранить</button>
            <a href="{{ route('workers.index') }}" class="text-sm text-slate-600 hover:text-slate-900">Отмена</a>
        </div>
    </form>
</div>
@endsection
