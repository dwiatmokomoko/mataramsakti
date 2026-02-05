@extends('admin.layouts.app')

@section('title', 'Detail Model - ' . $motorModel->full_name)
@section('page-title', 'Detail Model')
@section('page-description', $motorModel->full_name)

@section('content')
<div class="row">
    <div class="col-md-8">
        <!-- Model Information -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Informasi Model
                </h5>
                <div>
                    <a href="{{ route('admin.motors.models.edit', [$motor, $motorModel]) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit me-1"></i>Edit
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @if($motorModel->image)
                        <div class="text-center mb-3">
                            <img src="{{ asset('storage/' . $motorModel->image) }}" 
                                 alt="{{ $motorModel->full_name }}" 
                                 class="img-fluid rounded" style="max-height: 300px;">
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Motor:</strong></td>
                                <td>{{ $motor->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Model:</strong></td>
                                <td>{{ $motorModel->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Nama Lengkap:</strong></td>
                                <td>{{ $motorModel->full_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Kategori:</strong></td>
                                <td><span class="badge bg-primary">{{ $motor->category }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td>
                                    @if($motorModel->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                    @if($motorModel->is_featured)
                                        <span class="badge bg-warning text-dark">Featured</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Dibuat:</strong></td>
                                <td>{{ $motorModel->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Diupdate:</strong></td>
                                <td>{{ $motorModel->updated_at->format('d M Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                @if($motorModel->description)
                <div class="row mt-3">
                    <div class="col-12">
                        <h6>Deskripsi:</h6>
                        <p class="text-muted">{{ $motorModel->description }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Pricing Information -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-money-bill-wave me-2"></i>Informasi Harga
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center p-3 border rounded">
                            <h6 class="text-muted">Harga OTR</h6>
                            <h4 class="text-primary">{{ $motorModel->formatted_price_otr }}</h4>
                        </div>
                    </div>
                    @if($motorModel->price_dp)
                    <div class="col-md-4">
                        <div class="text-center p-3 border rounded">
                            <h6 class="text-muted">Uang Muka (DP)</h6>
                            <h4 class="text-success">{{ $motorModel->formatted_price_dp }}</h4>
                        </div>
                    </div>
                    @endif
                    @if($motorModel->price_installment)
                    <div class="col-md-4">
                        <div class="text-center p-3 border rounded">
                            <h6 class="text-muted">Cicilan/Bulan</h6>
                            <h4 class="text-info">{{ $motorModel->formatted_price_installment }}</h4>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Specifications -->
        @if($motorModel->specifications && count($motorModel->specifications) > 0)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-cogs me-2"></i>Spesifikasi
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($motorModel->specifications as $key => $value)
                    <div class="col-md-6 mb-2">
                        <strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="col-md-4">
        <!-- Quick Actions -->
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">Aksi Cepat</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.motors.models.edit', [$motor, $motorModel]) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Model
                    </a>
                    <a href="{{ route('admin.motors.models.variants.index', [$motor, $motorModel]) }}" class="btn btn-info">
                        <i class="fas fa-palette me-2"></i>Kelola Warna
                    </a>
                    <a href="{{ route('motor.detail', $motor) }}" target="_blank" class="btn btn-success">
                        <i class="fas fa-external-link-alt me-2"></i>Lihat di Website
                    </a>
                    <hr>
                    <a href="{{ route('admin.motors.models.index', $motor) }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>

        <!-- Color Variants -->
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Varian Warna</h6>
                <span class="badge bg-secondary">{{ $motorModel->variants->count() }}</span>
            </div>
            <div class="card-body">
                @if($motorModel->variants->count() > 0)
                    @foreach($motorModel->variants as $variant)
                    <div class="d-flex align-items-center mb-2 p-2 border rounded">
                        <div class="me-3">
                            <div style="width: 30px; height: 30px; background: {{ $variant->color_code }}; border-radius: 5px; border: 1px solid #ddd;"></div>
                        </div>
                        <div class="flex-grow-1">
                            <strong>{{ $variant->color_name }}</strong>
                            @if($variant->price_difference != 0)
                                <br><small class="text-muted">{{ $variant->formatted_price_difference }}</small>
                            @endif
                        </div>
                        <div>
                            @if($variant->is_available)
                                <span class="badge bg-success">Tersedia</span>
                            @else
                                <span class="badge bg-secondary">Habis</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    <a href="{{ route('admin.motors.models.variants.index', [$motor, $motorModel]) }}" class="btn btn-sm btn-outline-info w-100">
                        <i class="fas fa-palette me-1"></i>Kelola Semua Warna
                    </a>
                @else
                    <div class="text-center py-3">
                        <i class="fas fa-palette fa-2x text-muted mb-2"></i>
                        <p class="text-muted mb-2">Belum ada varian warna</p>
                        <a href="{{ route('admin.motors.models.variants.create', [$motor, $motorModel]) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i>Tambah Warna
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Statistics -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Statistik</h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <h4 class="text-primary">{{ $motorModel->variants->count() }}</h4>
                        <small class="text-muted">Total Warna</small>
                    </div>
                    <div class="col-6">
                        <h4 class="text-success">{{ $motorModel->variants->where('is_available', true)->count() }}</h4>
                        <small class="text-muted">Warna Tersedia</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
