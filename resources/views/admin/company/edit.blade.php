@extends('admin.layouts.app')

@section('title', 'Edit Info Dealer')
@section('page-title', 'Edit Informasi Dealer')
@section('page-description', 'Update informasi dealer Yamaha')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-edit me-2"></i>Form Edit Info Dealer
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.company.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama Dealer *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $company->name ?? '') }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $company->email ?? '') }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Telepon *</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" name="phone" value="{{ old('phone', $company->phone ?? '') }}" required>
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="url" class="form-control @error('website') is-invalid @enderror" 
                                   id="website" name="website" value="{{ old('website', $company->website ?? '') }}">
                            @error('website')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat *</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" 
                                  id="address" name="address" rows="3" required>{{ old('address', $company->address ?? '') }}</textarea>
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4" required>{{ old('description', $company->description ?? '') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="vision" class="form-label">Visi</label>
                            <textarea class="form-control @error('vision') is-invalid @enderror" 
                                      id="vision" name="vision" rows="3">{{ old('vision', $company->vision ?? '') }}</textarea>
                            @error('vision')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="mission" class="form-label">Misi</label>
                            <textarea class="form-control @error('mission') is-invalid @enderror" 
                                      id="mission" name="mission" rows="3">{{ old('mission', $company->mission ?? '') }}</textarea>
                            @error('mission')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo Dealer</label>
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" 
                               id="logo" name="logo" accept="image/*">
                        @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if($company && $company->logo)
                        <small class="text-muted">Logo saat ini: {{ basename($company->logo) }}</small>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.company.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        @if($company && $company->logo)
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-image me-2"></i>Logo Saat Ini
                </h6>
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('storage/' . $company->logo) }}" 
                     class="img-fluid rounded" alt="Logo {{ $company->name }}">
            </div>
        </div>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Panduan
                </h6>
            </div>
            <div class="card-body">
                <small class="text-muted">
                    <strong>Tips:</strong><br>
                    • Nama dealer akan tampil di footer website<br>
                    • Email dan telepon untuk kontak pelanggan<br>
                    • Alamat lengkap dengan landmark<br>
                    • Deskripsi singkat tentang dealer<br>
                    • Logo maksimal 2MB, format JPG/PNG<br>
                    • Visi dan misi bersifat opsional
                </small>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-clock me-2"></i>Jam Operasional
                </h6>
            </div>
            <div class="card-body">
                <small class="text-muted">
                    Jam operasional saat ini:<br>
                    <strong>Senin - Sabtu:</strong> 08.00 - 17.00 WIB<br>
                    <strong>Minggu:</strong> 08.00 - 15.00 WIB<br><br>
                    <em>Jam operasional ditampilkan otomatis di halaman contact</em>
                </small>
            </div>
        </div>
    </div>
</div>
@endsection