@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-md rounded-xl bg-white p-6 shadow-sm">
    <h1 class="mb-4 text-2xl font-semibold">Вход</h1>
    <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
        @csrf
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full rounded-md border border-slate-300 px-3 py-2" />
            @error('email')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700">Пароль</label>
            <input type="password" name="password" required class="w-full rounded-md border border-slate-300 px-3 py-2" />
            @error('password')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>
        <div class="flex items-center gap-3">
            <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-white">Войти</button>
            <a href="{{ route('register') }}" class="text-sm text-slate-600 hover:text-slate-900">Регистрация</a>
        </div>
    </form>
</div>
@endsection
