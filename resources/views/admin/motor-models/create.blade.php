@extends('admin.layouts.app')

@section('title', 'Tambah Model - ' . $motor->name)
@section('page-title', 'Tambah Model Baru')
@section('page-description', 'Tambah model baru untuk motor ' . $motor->name)

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-plus me-2"></i>Form Tambah Model
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.motors.models.store', $motor) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Basic Information -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="text-primary border-bottom pb-2">Informasi Dasar</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Model <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" 
                                       placeholder="contoh: Standard, Turbo, Connected">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Nama singkat model (akan digabung dengan nama motor)</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror" 
                                       id="full_name" name="full_name" value="{{ old('full_name') }}" 
                                       placeholder="contoh: {{ $motor->name }} Standard">
                                @error('full_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Nama lengkap yang akan ditampilkan</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="3" 
                                          placeholder="Deskripsi singkat tentang model ini">{{ old('description') }}</textarea>
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
                                           id="price_otr" name="price_otr" value="{{ old('price_otr') }}" 
                                           placeholder="32650000">
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
                                           id="price_dp" name="price_dp" value="{{ old('price_dp') }}" 
                                           placeholder="6530000">
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
                                           id="price_installment" name="price_installment" value="{{ old('price_installment') }}" 
                                           placeholder="1500000">
                                    @error('price_installment')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="text-primary border-bottom pb-2">Gambar Model</h6>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Gambar</label>
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
                                       value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    <strong>Aktif</strong>
                                    <br><small class="text-muted">Model akan ditampilkan di website</small>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" 
                                       value="1" {{ old('is_featured') ? 'checked' : '' }}>
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
                                        <i class="fas fa-save me-2"></i>Simpan Model
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
        <!-- Motor Info -->
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">Informasi Motor</h6>
            </div>
            <div class="card-body">
                <strong>{{ $motor->name }}</strong><br>
                <span class="badge bg-primary">{{ $motor->category }}</span><br>
                <small class="text-muted">{{ $motor->description }}</small>
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
                    • Nama Model: Singkat dan jelas (Standard, Turbo, dll)<br>
                    • Nama Lengkap: Gabungan nama motor + model<br>
                    • Harga OTR: Harga jual resmi<br>
                    • Featured: Maksimal 4 model untuk hero carousel<br>
                    • Gambar: Gunakan foto berkualitas tinggi
                </small>
            </div>
        </div>
    </div>
</div>

<script>
// Auto-generate full name
document.getElementById('name').addEventListener('input', function() {
    const motorName = '{{ $motor->name }}';
    const modelName = this.value;
    const fullNameField = document.getElementById('full_name');
    
    if (modelName && !fullNameField.value) {
        fullNameField.value = motorName + ' ' + modelName;
    }
});

// Auto-calculate DP (20% of OTR)
document.getElementById('price_otr').addEventListener('input', function() {
    const otrPrice = parseInt(this.value) || 0;
    const dpField = document.getElementById('price_dp');
    
    if (otrPrice && !dpField.value) {
        dpField.value = Math.round(otrPrice * 0.2);
    }
});
</script>
@endsection