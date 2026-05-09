@extends('layouts.app')

@section('content')
<div class="mb-5">
    <div class="row align-items-center mb-4">
        <div class="col">
            <h1 class="mb-2"><i class="bi bi-dove"></i> Куры</h1>
            <p class="text-muted">Управление записями о курах и их локациях.</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('chickens.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Добавить курицу
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover table-sm mb-0">
                <thead class="table-light">
                    <tr>
                        <th><i class="bi bi-hash"></i> ID</th>
                        <th>Вес</th>
                        <th>Возраст</th>
                        <th>Порода</th>
                        <th>Яиц/мес</th>
                        <th>Клетка</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($chickens as $chicken)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $chicken->id }}</span></td>
                            <td>{{ $chicken->weight }} кг</td>
                            <td>{{ $chicken->age }} мес.</td>
                            <td>{{ $chicken->breed->name }}</td>
                            <td>{{ $chicken->monthly_eggs }}</td>
                            <td>{{ $chicken->cage ? $chicken->cage->workshop->code . ' / ' . $chicken->cage->row . ' / ' . $chicken->cage->number : 'Не назначена' }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('chickens.edit', $chicken) }}" class="btn btn-warning" title="Изменить">
                                        <i class="bi bi-pencil"></i> Изменить
                                    </a>
                                    <form action="{{ route('chickens.destroy', $chicken) }}" method="POST" class="d-inline" onsubmit="return confirm('Вы уверены?');">
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
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="bi bi-inbox"></i> Нет записей о курах
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
