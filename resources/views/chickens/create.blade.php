@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h1 class="mb-4 card-title"><i class="bi bi-plus-circle"></i> Добавить курицу</h1>
            <form method="POST" action="{{ route('chickens.store') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Вес (кг)</label>
                        <input name="weight" type="number" step="0.01" min="0" value="{{ old('weight') }}" required class="form-control" />
                        @error('weight')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Возраст (месяцев)</label>
                        <input name="age" type="number" min="0" max="120" value="{{ old('age') }}" required class="form-control" />
                        @error('age')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Порода</label>
                        <select name="breed_id" required class="form-select">
                            <option value="">{{ $breeds->isEmpty() ? 'Породы не найдены. Добавьте породу.' : 'Выберите породу' }}</option>
                            @foreach($breeds as $breed)
                                <option value="{{ $breed->id }}" {{ old('breed_id') == $breed->id ? 'selected' : '' }}>{{ $breed->name }}</option>
                            @endforeach
                        </select>
                        @error('breed_id')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Яиц в месяц</label>
                        <input name="monthly_eggs" type="number" min="0" max="365" value="{{ old('monthly_eggs') }}" required class="form-control" />
                        @error('monthly_eggs')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Клетка</label>
                    <select name="cage_id" class="form-select">
                        <option value="" {{ $cages->isEmpty() ? 'disabled' : '' }}>{{ $cages->isEmpty() ? 'Нет доступных клеток' : 'Без клетки' }}</option>
                        @foreach($cages as $cage)
                            <option value="{{ $cage->id }}" {{ old('cage_id') == $cage->id ? 'selected' : '' }}>{{ $cage->workshop->code }} / {{ $cage->row }} / {{ $cage->number }}</option>
                        @endforeach
                    </select>
                    @error('cage_id')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="d-flex gap-2 pt-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i> Сохранить</button>
                    <a href="{{ route('chickens.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Отмена</a>
                </div>
    </form>
</div>
@endsection
