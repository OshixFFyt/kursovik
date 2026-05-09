@extends('layouts.app')

@section('content')
<div class="mb-5">
    <div class="card bg-light border-0 mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="mb-2"><i class="bi bi-bar-chart"></i> Месячный отчет птицефабрики</h1>
                    <p class="text-muted mb-0">Сводные данные о курицах, породах, работниках и производительности.</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('reports.export') }}" class="btn btn-success">
                        <i class="bi bi-download"></i> Скачать отчет (CSV)
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Общее количество кур</h5>
                    <h2 class="display-5 text-warning">{{ $totalChickens }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Яиц в месяц</h5>
                    <h2 class="display-5 text-danger">{{ $totalMonthlyEggs }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Работников</h5>
                    <h2 class="display-5 text-info">{{ $totalWorkers }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-people"></i> Распределение работников по цехам</h5>
                </div>
                <div class="card-body">
                    @forelse($workersByWorkshop as $workshop)
                        <div class="row mb-3 pb-3 border-bottom">
                            <div class="col">
                                <h6 class="mb-1">{{ $workshop->name }} <span class="badge bg-secondary">{{ $workshop->code }}</span></h6>
                                <small class="text-muted">Работников: <strong>{{ $workshop->workers_count ?? 0 }}</strong></small>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center">Нет данных</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-flower1"></i> Породы и производительность</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Порода</th>
                                    <th>Кур</th>
                                    <th>Яиц/мес</th>
                                    <th>Диета</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($breeds as $breed)
                                    <tr>
                                        <td>{{ $breed->name }}</td>
                                        <td>{{ $breed->chickens_count }}</td>
                                        <td>{{ round($breed->chickens_avg_monthly_eggs) }}</td>
                                        <td><span class="badge bg-info">{{ $breed->diet_number }}</span></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Нет данных</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
