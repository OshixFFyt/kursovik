@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">
                    <h1 class="mb-4 card-title text-center"><i class="bi bi-door-closed"></i> Вход</h1>
                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" required class="form-control" />
                            @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Пароль</label>
                            <input type="password" name="password" required class="form-control" />
                            @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="d-flex gap-2 pt-2">
                            <button type="submit" class="btn btn-primary w-100"><i class="bi bi-lock-fill"></i> Войти</button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('register') }}" class="btn btn-link">Регистрация</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
