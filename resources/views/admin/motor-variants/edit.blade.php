@extends('admin.layouts.app')

@section('title', 'Edit Varian Warna')
@section('page-title', 'Edit Varian Warna')
@section('page-description', 'Edit varian warna ' . $variant->color_name . ' untuk ' . $motorModel->full_name)

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.motors.index') }}">Motor</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.motors.models.index', $motor) }}">{{ $motor->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.motors.models.variants.index', [$motor, $motorModel]) }}">{{ $motorModel->name }} - Warna</a></li>
                <li class="breadcrumb-item active">Edit {{ $variant->color_name }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-edit me-2"></i>Form Edit Varian Warna
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.motors.models.variants.update', [$motor, $motorModel, $variant]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="color_name" class="form-label">Nama Warna *</label>
                            <input type="text" class="form-control @error('color_name') is-invalid @enderror" 
                                   id="color_name" name="color_name" value="{{ old('color_name', $variant->color_name) }}" 
                                   placeholder="Contoh: Matte Black, Racing Blue" required>
                            @error('color_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="color_code" class="form-label">Kode Warna</label>
                            <input type="color" class="form-control form-control-color @error('color_code') is-invalid @enderror" 
                                   id="color_code" name="color_code" value="{{ old('color_code', $variant->color_code ?: '#000000') }}">
                            @error('color_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="price_difference" class="form-label">Selisih Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control @error('price_difference') is-invalid @enderror" 
                                   id="price_difference" name="price_difference" value="{{ old('price_difference', $variant->price_difference) }}"
                                   placeholder="0 (jika sama dengan harga dasar)">
                            @error('price_difference')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">
                            Masukkan angka positif jika lebih mahal, negatif jika lebih murah dari harga dasar
                        </small>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Motor (Warna Ini)</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if($variant->image)
                        <small class="text-muted">Gambar saat ini: {{ basename($variant->image) }}</small>
                        @endif
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_available" 
                                   name="is_available" value="1" {{ old('is_available', $variant->is_available) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_available">
                                Warna Tersedia
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.motors.models.variants.index', [$motor, $motorModel]) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Varian
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        @if($variant->image)
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-image me-2"></i>Gambar Saat Ini
                </h6>
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('storage/' . $variant->image) }}" 
                     class="img-fluid rounded" alt="{{ $variant->color_name }}">
            </div>
        </div>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Info Varian
                </h6>
            </div>
            <div class="card-body">
                <strong>Motor:</strong> {{ $motor->name }}<br>
                <strong>Model:</strong> {{ $motorModel->name }}<br>
                <strong>Warna:</strong> {{ $variant->color_name }}<br>
                <strong>Harga Final:</strong> {{ $variant->formatted_final_price }}<br>
                @if($variant->price_difference != 0)
                <strong>Selisih:</strong> {{ $variant->formatted_price_difference }}<br>
                @endif
                <strong>Status:</strong> 
                @if($variant->is_available)
                    <span class="badge bg-success">Tersedia</span>
                @else
                    <span class="badge bg-secondary">Tidak Tersedia</span>
                @endif
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-clock me-2"></i>Riwayat
                </h6>
            </div>
            <div class="card-body">
                <small class="text-muted">
                    <strong>Dibuat:</strong> {{ $variant->created_at->format('d M Y H:i') }}<br>
                    <strong>Diupdate:</strong> {{ $variant->updated_at->format('d M Y H:i') }}
                </small>
            </div>
        </div>
    </div>
</div>
@endsection