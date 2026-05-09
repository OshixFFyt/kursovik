<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Птицефабрика') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.4/dist/tailwind.min.css">
    @endif
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-100 via-white to-slate-100 text-slate-900">
    <div class="min-h-screen flex flex-col">
        <header class="bg-white/90 backdrop-blur border-b border-slate-200 shadow-sm shadow-slate-200/50">
            <div class="mx-auto flex flex-col gap-4 px-4 py-5 md:flex-row md:items-center md:justify-between md:px-8">
                <div>
                    <a href="{{ route('dashboard') }}" class="text-2xl font-semibold tracking-tight text-slate-900">Птицефабрика</a>
                    <p class="mt-1 text-sm text-slate-500">Управление сотрудниками, породами и отчетами.</p>
                </div>
                <nav class="flex flex-wrap items-center gap-3 text-sm">
                    @auth
                        <a href="{{ route('dashboard') }}" class="rounded-md px-3 py-2 hover:bg-slate-100">Панель</a>
                        <a href="{{ route('chickens.index') }}" class="rounded-md px-3 py-2 hover:bg-slate-100">Куры</a>
                        <a href="{{ route('breeds.index') }}" class="rounded-md px-3 py-2 hover:bg-slate-100">Породы</a>
                        <a href="{{ route('reports.index') }}" class="rounded-md px-3 py-2 hover:bg-slate-100">Отчеты</a>
                        @if (Auth::user()->isAdmin())
                            <a href="{{ route('workers.index') }}" class="rounded-md px-3 py-2 hover:bg-slate-100">Работники</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="rounded-md bg-slate-900 px-3 py-2 text-white hover:bg-slate-800">Выйти</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 hover:bg-slate-100">Войти</a>
                        <a href="{{ route('register') }}" class="rounded-md px-3 py-2 hover:bg-slate-100">Регистрация</a>
                    @endauth
                </nav>
            </div>
        </header>

        <main class="flex-1 mx-auto w-full max-w-7xl px-4 py-6 md:px-8">
            @if(session('success'))
                <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 p-4 text-emerald-900">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mb-6 rounded-lg border border-rose-200 bg-rose-50 p-4 text-rose-900">{{ session('error') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
