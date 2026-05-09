@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h1 class="mb-4 card-title"><i class="bi bi-plus-circle"></i> Добавить породу</h1>
            <form method="POST" action="{{ route('breeds.store') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Название</label>
                        <input name="name" value="{{ old('name') }}" pattern="[\u0430-\u044f\u0410-\u042f\u0451\u0401\s-]+" title="Оно может содержать только буквы" required class="form-control" />
                        @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Средний вес (кг)</label>
                        <input name="average_weight" type="number" step="0.01" min="0" value="{{ old('average_weight') }}" required class="form-control" />
                        @error('average_weight')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Яиц в месяц</label>
                        <input name="average_monthly_eggs" type="number" min="0" max="365" value="{{ old('average_monthly_eggs') }}" required class="form-control" />
                        @error('average_monthly_eggs')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Номер диеты</label>
                        <input name="diet_number" type="number" min="1" max="99" value="{{ old('diet_number') }}" required class="form-control" />
                        @error('diet_number')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Описание</label>
                    <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
                    @error('description')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="d-flex gap-2 pt-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i> Сохранить</button>
                    <a href="{{ route('breeds.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Отмена</a>
                </div>
    </form>
</div>
@endsection
