@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')
@section('page-description', 'Overview website dealer Yamaha Motor Indonesia')

@section('content')
<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <i class="fas fa-motorcycle fa-2x mb-2"></i>
                <h3 class="mb-0">{{ $totalMotors }}</h3>
                <small>Total Motor</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white">
            <div class="card-body text-center">
                <i class="fas fa-cogs fa-2x mb-2"></i>
                <h3 class="mb-0">{{ $totalModels }}</h3>
                <small>Total Model</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-success text-white">
            <div class="card-body text-center">
                <i class="fas fa-check-circle fa-2x mb-2"></i>
                <h3 class="mb-0">{{ $activeModels }}</h3>
                <small>Model Aktif</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-warning text-white">
            <div class="card-body text-center">
                <i class="fas fa-star fa-2x mb-2"></i>
                <h3 class="mb-0">{{ $featuredModels }}</h3>
                <small>Model Unggulan</small>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card bg-info text-white">
            <div class="card-body text-center">
                <i class="fas fa-tags fa-2x mb-2"></i>
                <h3 class="mb-0">{{ $categories }}</h3>
                <small>Kategori Motor</small>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title mb-3">Distribusi Kategori</h6>
                <div class="row text-center">
                    @php
                        $categoryStats = \App\Models\Motor::selectRaw('category, count(*) as total')
                            ->groupBy('category')
                            ->get();
                    @endphp
                    @foreach($categoryStats as $stat)
                    <div class="col-md-3">
                        <div class="border rounded p-2">
                            <strong>{{ $stat->total }}</strong><br>
                            <small class="text-muted">{{ $stat->category }}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Motors -->
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-motorcycle me-2"></i>Motor Terbaru
                </h5>
                <a href="{{ route('admin.motors.index') }}" class="btn btn-sm btn-outline-primary">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body">
                @if($recentMotors->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Motor</th>
                                <th>Kategori</th>
                                <th>Harga Mulai</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentMotors as $motor)
                            <tr>
                                <td>
                                    <strong>{{ $motor->name }}</strong><br>
                                    <small class="text-muted">{{ $motor->models->count() }} model tersedia</small>
                                </td>
                                <td>
                                    <span class="badge bg-primary">{{ $motor->category }}</span>
                                </td>
                                <td>
                                    @if($motor->main_model)
                                        {{ $motor->main_model->formatted_price_otr }}
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($motor->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                    @if($motor->featuredModels->count() > 0)
                                        <span class="badge bg-warning text-dark">Ada Featured</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.motors.show', $motor) }}" 
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.motors.edit', $motor) }}" 
                                       class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4">
                    <i class="fas fa-motorcycle fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada motor yang ditambahkan</p>
                    <a href="{{ route('admin.motors.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Motor
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-bolt me-2"></i>Aksi Cepat
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.motors.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Motor Baru
                    </a>
                    <a href="{{ route('admin.company.edit') }}" class="btn btn-outline-primary">
                        <i class="fas fa-edit me-2"></i>Edit Info Dealer
                    </a>
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-success">
                        <i class="fas fa-external-link-alt me-2"></i>Lihat Website
                    </a>
                </div>
            </div>
        </div>

        <!-- System Info -->
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Informasi Sistem
                </h5>
            </div>
            <div class="card-body">
                <small class="text-muted">
                    <strong>Laravel:</strong> {{ app()->version() }}<br>
                    <strong>PHP:</strong> {{ PHP_VERSION }}<br>
                    <strong>Database:</strong> PostgreSQL<br>
                    <strong>Last Update:</strong> {{ now()->format('d M Y H:i') }}
                </small>
            </div>
        </div>
    </div>
</div>
@endsection