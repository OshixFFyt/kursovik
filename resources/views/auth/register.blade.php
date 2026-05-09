@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">
                    <h1 class="mb-4 card-title text-center"><i class="bi bi-person-plus-fill"></i> Регистрация</h1>
                    <form method="POST" action="{{ route('register.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Имя</label>
                            <input type="text" name="name" value="{{ old('name') }}" pattern="[\u0430-\u044f\u0410-\u042f\u0451\u0401\s-]+" title="Оно может содержать только буквы" required class="form-control" />
                            @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
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
                        <div class="mb-3">
                            <label class="form-label">Подтверждение пароля</label>
                            <input type="password" name="password_confirmation" required class="form-control" />
                        </div>
                        <div class="d-flex gap-2 pt-2">
                            <button type="submit" class="btn btn-primary w-100"><i class="bi bi-person-check-fill"></i> Зарегистрироваться</button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}" class="btn btn-link">Уже есть аккаунт?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
