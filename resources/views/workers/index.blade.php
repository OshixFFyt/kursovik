@extends('layouts.app')

@section('content')
<div class="mb-5">
    <div class="row align-items-center mb-4">
        <div class="col">
            <h1 class="mb-2"><i class="bi bi-people"></i> Работники</h1>
            <p class="text-muted">Управление сотрудниками птицефабрики и их цехами.</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('workers.create') }}" class="btn btn-primary">
                <i class="bi bi-person-plus"></i> Добавить работника
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover table-sm mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Паспорт</th>
                        <th>Зарплата</th>
                        <th>Цехов</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($workers as $worker)
                        <tr>
                            <td><strong>{{ $worker->name }}</strong></td>
                            <td><small>{{ $worker->email }}</small></td>
                            <td><small>{{ $worker->passport_series }} {{ $worker->passport_number }}</small></td>
                            <td>{{ number_format($worker->salary, 0) }} руб.</td>
                            <td><span class="badge bg-success">{{ $worker->workshops_count ?? 0 }}</span></td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('workers.edit', $worker) }}" class="btn btn-warning" title="Изменить">
                                        <i class="bi bi-pencil"></i> Изменить
                                    </a>
                                    <form action="{{ route('workers.destroy', $worker) }}" method="POST" class="d-inline" onsubmit="return confirm('Вы уверены?');">
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
                                <i class="bi bi-inbox"></i> Нет записей о работниках
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
