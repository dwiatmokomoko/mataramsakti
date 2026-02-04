@extends('admin.layouts.app')

@section('title', 'Tambah Varian Warna')
@section('page-title', 'Tambah Varian Warna')
@section('page-description', 'Tambah varian warna untuk ' . $motorModel->full_name)

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.motors.index') }}">Motor</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.motors.models.index', $motor) }}">{{ $motor->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.motors.models.variants.index', [$motor, $motorModel]) }}">{{ $motorModel->name }} - Warna</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-plus me-2"></i>Form Tambah Varian Warna
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.motors.models.variants.store', [$motor, $motorModel]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="color_name" class="form-label">Nama Warna *</label>
                            <input type="text" class="form-control @error('color_name') is-invalid @enderror" 
                                   id="color_name" name="color_name" value="{{ old('color_name') }}" 
                                   placeholder="Contoh: Matte Black, Racing Blue" required>
                            @error('color_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="color_code" class="form-label">Kode Warna</label>
                            <input type="color" class="form-control form-control-color @error('color_code') is-invalid @enderror" 
                                   id="color_code" name="color_code" value="{{ old('color_code', '#000000') }}">
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
                                   id="price_difference" name="price_difference" value="{{ old('price_difference', 0) }}"
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
                        <small class="text-muted">Upload gambar motor dengan warna ini (opsional)</small>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_available" 
                                   name="is_available" value="1" {{ old('is_available', true) ? 'checked' : '' }}>
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
                            <i class="fas fa-save me-2"></i>Simpan Varian
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Info Model
                </h6>
            </div>
            <div class="card-body">
                <strong>{{ $motorModel->full_name }}</strong><br>
                <small class="text-muted">{{ $motor->name }} - {{ $motorModel->name }}</small><br><br>
                
                <strong>Harga Dasar:</strong><br>
                {{ $motorModel->formatted_price_otr }}<br><br>
                
                <strong>Kategori:</strong><br>
                <span class="badge bg-primary">{{ $motor->category }}</span>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-lightbulb me-2"></i>Tips
                </h6>
            </div>
            <div class="card-body">
                <small class="text-muted">
                    <strong>Contoh Nama Warna:</strong><br>
                    • Matte Black<br>
                    • Racing Blue<br>
                    • Pearl White<br>
                    • Metallic Red<br><br>
                    
                    <strong>Selisih Harga:</strong><br>
                    • 0 = sama dengan harga dasar<br>
                    • 500000 = lebih mahal Rp 500rb<br>
                    • -200000 = lebih murah Rp 200rb
                </small>
            </div>
        </div>
    </div>
</div>
@endsection