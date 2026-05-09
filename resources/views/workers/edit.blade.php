@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h1 class="mb-4 card-title"><i class="bi bi-pencil-square"></i> Редактировать работника</h1>
            <form method="POST" action="{{ route('workers.update', $worker) }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Имя</label>
                        <input name="name" value="{{ old('name', $worker->name) }}" pattern="[\u0430-\u044f\u0410-\u042f\u0451\u0401\s-]+" title="Оно может содержать только буквы" required class="form-control" />
                        @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" value="{{ old('email', $worker->email) }}" required class="form-control" />
                        @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Новый пароль</label>
                        <input name="password" type="password" class="form-control" />
                        @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Подтверждение пароля</label>
                        <input name="password_confirmation" type="password" class="form-control" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Серия паспорта</label>
                        <input name="passport_series" value="{{ old('passport_series', $worker->passport_series) }}" inputmode="numeric" pattern="[0-9]+" title="Оно должно содержать только цифры" class="form-control" />
                        @error('passport_series')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Номер паспорта</label>
                        <input name="passport_number" value="{{ old('passport_number', $worker->passport_number) }}" inputmode="numeric" pattern="[0-9]+" title="Оно должно содержать только цифры" class="form-control" />
                        @error('passport_number')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Зарплата</label>
                    <input name="salary" type="number" step="0.01" min="0" value="{{ old('salary', $worker->salary) }}" required class="form-control" />
                    @error('salary')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Закрепленные клетки</label>
                    <div class="row">
                        @foreach($cages as $cage)
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input type="checkbox" name="cage_ids[]" value="{{ $cage->id }}" {{ in_array($cage->id, old('cage_ids', $worker->cages->pluck('id')->toArray())) ? 'checked' : '' }} class="form-check-input" id="cage_{{ $cage->id }}" />
                                    <label class="form-check-label" for="cage_{{ $cage->id }}">
                                        {{ $cage->workshop->code }} / {{ $cage->row }} / {{ $cage->number }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @error('cage_ids')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="d-flex gap-2 pt-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i> Сохранить</button>
                    <a href="{{ route('workers.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Отмена</a>
                </div>
    </form>
</div>
@endsection
