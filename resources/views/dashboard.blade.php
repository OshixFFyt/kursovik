@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body text-center">
                <div class="mb-3">
                    <i class="bi bi-egg display-1 text-warning"></i>
                </div>
                <h5 class="card-title text-muted mb-3">Кур</h5>
                <h2 class="display-5 font-weight-bold text-dark mb-2">{{ $chickenCount }}</h2>
                <p class="text-muted small">Всего кур в системе</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body text-center">
                <div class="mb-3">
                    <i class="bi bi-flower1 display-1 text-success"></i>
                </div>
                <h5 class="card-title text-muted mb-3">Пород</h5>
                <h2 class="display-5 font-weight-bold text-dark mb-2">{{ $breedCount }}</h2>
                <p class="text-muted small">Различных пород кур</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body text-center">
                <div class="mb-3">
                    <i class="bi bi-people display-1 text-info"></i>
                </div>
                <h5 class="card-title text-muted mb-3">Работников</h5>
                <h2 class="display-5 font-weight-bold text-dark mb-2">{{ $workerCount }}</h2>
                <p class="text-muted small">Работающих сотрудников</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body text-center">
                <div class="mb-3">
                    <i class="bi bi-building display-1 text-primary"></i>
                </div>
                <h5 class="card-title text-muted mb-3">Цехов</h5>
                <h2 class="display-5 font-weight-bold text-dark mb-2">{{ $workshopCount }}</h2>
                <p class="text-muted small">Число производственных цехов</p>
            </div>
        </div>
    </div>
</div>
@endsection
