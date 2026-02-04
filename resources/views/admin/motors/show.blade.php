@extends('admin.layouts.app')

@section('title', 'Detail Motor')
@section('page-title', 'Detail Motor')
@section('page-description', $motor->name . ' - ' . $motor->model)

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-motorcycle me-2"></i>{{ $motor->name }}
                </h5>
                <div>
                    <a href="{{ route('admin.motors.variants.index', $motor) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-palette me-2"></i>Kelola Warna
                    </a>
                    <a href="{{ route('admin.motors.edit', $motor) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <form action="{{ route('admin.motors.destroy', $motor) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Yakin ingin menghapus motor ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash me-2"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Nama Motor:</strong><br>
                        {{ $motor->name }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Model:</strong><br>
                        {{ $motor->model }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Kategori:</strong><br>
                        <span class="badge bg-primary">{{ $motor->category }}</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Status:</strong><br>
                        @if($motor->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                        @if($motor->is_featured)
                            <span class="badge bg-warning text-dark">Featured</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <strong>Deskripsi:</strong><br>
                        {{ $motor->description ?: 'Tidak ada deskripsi' }}
                    </div>
                </div>

                <hr>

                <h6><i class="fas fa-money-bill-wave me-2"></i>Informasi Harga</h6>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Harga OTR:</strong><br>
                        <span class="h5 text-primary">{{ $motor->formatted_price_otr }}</span>
                    </div>
                    @if($motor->price_dp)
                    <div class="col-md-4 mb-3">
                        <strong>DP Mulai:</strong><br>
                        <span class="h6 text-success">{{ $motor->formatted_price_dp }}</span>
                    </div>
                    @endif
                    @if($motor->price_installment)
                    <div class="col-md-4 mb-3">
                        <strong>Cicilan/Bulan:</strong><br>
                        <span class="h6 text-info">{{ $motor->formatted_price_installment }}</span>
                    </div>
                    @endif
                </div>

                @if($motor->specifications)
                <hr>
                <h6><i class="fas fa-cogs me-2"></i>Spesifikasi</h6>
                <div class="row">
                    @if(isset($motor->specifications['engine']))
                    <div class="col-md-6 mb-2">
                        <strong>Engine:</strong> {{ $motor->specifications['engine'] }}
                    </div>
                    @endif
                    @if(isset($motor->specifications['power']))
                    <div class="col-md-6 mb-2">
                        <strong>Power:</strong> {{ $motor->specifications['power'] }}
                    </div>
                    @endif
                    @if(isset($motor->specifications['transmission']))
                    <div class="col-md-6 mb-2">
                        <strong>Transmission:</strong> {{ $motor->specifications['transmission'] }}
                    </div>
                    @endif
                    @if(isset($motor->specifications['fuel_system']))
                    <div class="col-md-6 mb-2">
                        <strong>Fuel System:</strong> {{ $motor->specifications['fuel_system'] }}
                    </div>
                    @endif
                </div>
                @endif

                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <small class="text-muted">
                            <strong>Dibuat:</strong> {{ $motor->created_at->format('d M Y H:i') }}
                        </small>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted">
                            <strong>Diupdate:</strong> {{ $motor->updated_at->format('d M Y H:i') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-image me-2"></i>Gambar Motor
                </h6>
            </div>
            <div class="card-body text-center">
                @if($motor->image)
                    <img src="{{ asset('storage/' . $motor->image) }}" 
                         class="img-fluid rounded" alt="{{ $motor->name }}">
                @else
                    <div class="bg-light rounded p-5">
                        <i class="fas fa-motorcycle fa-5x text-muted"></i>
                        <p class="text-muted mt-3">Tidak ada gambar</p>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-tools me-2"></i>Aksi
                </h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.motors.edit', $motor) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Motor
                    </a>
                    <a href="{{ route('admin.motors.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-success">
                        <i class="fas fa-external-link-alt me-2"></i>Lihat di Website
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection