@extends('layouts.app')

@section('content')
<div class="mb-5">
    <div class="row align-items-center mb-4">
        <div class="col">
            <h1 class="mb-2"><i class="bi bi-flower1"></i> Породы</h1>
            <p class="text-muted">Справочная информация о породах и производительности.</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('breeds.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Добавить породу
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover table-sm mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Название</th>
                        <th>Яиц/мес</th>
                        <th>Средний вес</th>
                        <th>Диета</th>
                        <th>Кур</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($breeds as $breed)
                        <tr>
                            <td><strong>{{ $breed->name }}</strong></td>
                            <td>{{ $breed->average_monthly_eggs }}</td>
                            <td>{{ $breed->average_weight }} кг</td>
                            <td><span class="badge bg-info">{{ $breed->diet_number }}</span></td>
                            <td>{{ $breed->chickens_count }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('breeds.edit', $breed) }}" class="btn btn-warning" title="Изменить">
                                        <i class="bi bi-pencil"></i> Изменить
                                    </a>
                                    <form action="{{ route('breeds.destroy', $breed) }}" method="POST" class="d-inline" onsubmit="return confirm('Вы уверены?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Удалить">
                                            <i class="bi bi-trash"></i> Удалить
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="bi bi-inbox"></i> Нет записей о породах
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
