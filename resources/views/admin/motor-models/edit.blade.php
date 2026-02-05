@extends('admin.layouts.app')

@section('title', 'Edit Model - ' . $motorModel->full_name)
@section('page-title', 'Edit Model')
@section('page-description', 'Edit model ' . $motorModel->full_name)

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-edit me-2"></i>Form Edit Model
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.motors.models.update', [$motor, $motorModel]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Basic Information -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="text-primary border-bottom pb-2">Informasi Dasar</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Model <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $motorModel->name) }}" 
                                       placeholder="contoh: Standard, Turbo, Connected">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror" 
                                       id="full_name" name="full_name" value="{{ old('full_name', $motorModel->full_name) }}" 
                                       placeholder="contoh: {{ $motor->name }} Standard">
                                @error('full_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="3" 
                                          placeholder="Deskripsi singkat tentang model ini">{{ old('description', $motorModel->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Pricing Information -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="text-primary border-bottom pb-2">Informasi Harga</h6>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="price_otr" class="form-label">Harga OTR <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control @error('price_otr') is-invalid @enderror" 
                                           id="price_otr" name="price_otr" value="{{ old('price_otr', $motorModel->price_otr) }}">
                                    @error('price_otr')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="price_dp" class="form-label">Harga DP</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control @error('price_dp') is-invalid @enderror" 
                                           id="price_dp" name="price_dp" value="{{ old('price_dp', $motorModel->price_dp) }}">
                                    @error('price_dp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="price_installment" class="form-label">Cicilan per Bulan</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control @error('price_installment') is-invalid @enderror" 
                                           id="price_installment" name="price_installment" value="{{ old('price_installment', $motorModel->price_installment) }}">
                                    @error('price_installment')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Current Image & Upload -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="text-primary border-bottom pb-2">Gambar Model</h6>
                        </div>
                        @if($motorModel->image)
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Gambar Saat Ini</label>
                                <div class="border rounded p-2 text-center">
                                    <img src="{{ asset('storage/' . $motorModel->image) }}" 
                                         alt="{{ $motorModel->full_name }}" 
                                         class="img-fluid" style="max-height: 200px;">
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">
                                    {{ $motorModel->image ? 'Ganti Gambar' : 'Upload Gambar' }}
                                </label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                       id="image" name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                            </div>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="text-primary border-bottom pb-2">Status & Pengaturan</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                       value="1" {{ old('is_active', $motorModel->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    <strong>Aktif</strong>
                                    <br><small class="text-muted">Model akan ditampilkan di website</small>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" 
                                       value="1" {{ old('is_featured', $motorModel->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    <strong>Featured</strong>
                                    <br><small class="text-muted">Tampil di hero carousel</small>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="row">
                        <div class="col-12">
                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.motors.models.index', $motor) }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Update Model
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <!-- Model Info -->
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">Informasi Model</h6>
            </div>
            <div class="card-body">
                <strong>{{ $motorModel->full_name }}</strong><br>
                <span class="badge bg-primary">{{ $motor->category }}</span><br>
                <small class="text-muted">Motor: {{ $motor->name }}</small><br>
                <small class="text-muted">Dibuat: {{ $motorModel->created_at->format('d M Y') }}</small>
            </div>
        </div>

        <!-- Variants Info -->
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">Varian Warna</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span>Total Warna:</span>
                    <span class="badge bg-secondary">{{ $motorModel->variants->count() }}</span>
                </div>
                @if($motorModel->variants->count() > 0)
                    <a href="{{ route('admin.motors.models.variants.index', [$motor, $motorModel]) }}" 
                       class="btn btn-sm btn-outline-info w-100">
                        <i class="fas fa-palette me-1"></i>Kelola Warna
                    </a>
                @else
                    <a href="{{ route('admin.motors.models.variants.create', [$motor, $motorModel]) }}" 
                       class="btn btn-sm btn-primary w-100">
                        <i class="fas fa-plus me-1"></i>Tambah Warna
                    </a>
                @endif
            </div>
        </div>

        <!-- Help Card -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Panduan
                </h6>
            </div>
            <div class="card-body">
                <small>
                    <strong>Tips:</strong><br>
                    • Pastikan harga sesuai dengan kebijakan dealer<br>
                    • Featured model akan tampil di halaman utama<br>
                    • Tambahkan varian warna setelah menyimpan model<br>
                    • Gunakan gambar berkualitas tinggi untuk tampilan terbaik
                </small>
            </div>
        </div>
    </div>
</div>
@endsection
