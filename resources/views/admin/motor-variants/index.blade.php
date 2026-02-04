@extends('admin.layouts.app')

@section('title', 'Kelola Warna - ' . $motorModel->full_name)
@section('page-title', 'Varian Warna')
@section('page-description', 'Kelola varian warna untuk ' . $motorModel->full_name)

@section('content')
<div class="row mb-3">
    <div class="col-md-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.motors.index') }}">Motor</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.motors.models.index', $motor) }}">{{ $motor->name }}</a></li>
                <li class="breadcrumb-item active">{{ $motorModel->name }} - Warna</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('admin.motors.models.variants.create', [$motor, $motorModel]) }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Warna
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-palette me-2"></i>Varian Warna - {{ $motorModel->full_name }}
        </h5>
    </div>
    <div class="card-body">
        @if($variants->count() > 0)
        <div class="row">
            @foreach($variants as $variant)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            @if($variant->color_code)
                            <div class="me-2" style="width: 20px; height: 20px; background: {{ $variant->color_code }}; border-radius: 50%; border: 1px solid #ddd;"></div>
                            @endif
                            <strong>{{ $variant->color_name }}</strong>
                        </div>
                        @if($variant->is_available)
                            <span class="badge bg-success">Tersedia</span>
                        @else
                            <span class="badge bg-secondary">Tidak Tersedia</span>
                        @endif
                    </div>
                    <div class="card-body text-center">
                        @if($variant->image)
                            <img src="{{ asset('storage/' . $variant->image) }}" 
                                 class="img-fluid rounded mb-3" 
                                 alt="{{ $variant->color_name }}"
                                 style="height: 150px; width: 100%; object-fit: cover;">
                        @else
                            <div class="bg-light rounded p-3 mb-3">
                                <i class="fas fa-motorcycle fa-3x text-muted"></i>
                            </div>
                        @endif
                        
                        <div class="mb-2">
                            <strong>Harga:</strong><br>
                            {{ $variant->formatted_final_price }}
                            @if($variant->price_difference != 0)
                                <small class="text-muted d-block">
                                    ({{ $variant->formatted_price_difference }})
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group w-100" role="group">
                            <a href="{{ route('admin.motors.models.variants.edit', [$motor, $motorModel, $variant]) }}" 
                               class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.motors.models.variants.destroy', [$motor, $motorModel, $variant]) }}" 
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus varian warna ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-palette fa-5x text-muted mb-3"></i>
            <h5 class="text-muted">Belum ada varian warna</h5>
            <p class="text-muted">Tambahkan varian warna untuk {{ $motorModel->full_name }}</p>
            <a href="{{ route('admin.motors.models.variants.create', [$motor, $motorModel]) }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Warna Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection