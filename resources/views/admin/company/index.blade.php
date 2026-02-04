@extends('admin.layouts.app')

@section('title', 'Info Dealer')
@section('page-title', 'Informasi Dealer')
@section('page-description', 'Kelola informasi dealer Yamaha')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-building me-2"></i>Data Dealer
                </h5>
                <a href="{{ route('admin.company.edit') }}" class="btn btn-primary">
                    <i class="fas fa-edit me-2"></i>Edit Info
                </a>
            </div>
            <div class="card-body">
                @if($company)
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Nama Dealer:</strong><br>
                        {{ $company->name }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Email:</strong><br>
                        <a href="mailto:{{ $company->email }}">{{ $company->email }}</a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Telepon:</strong><br>
                        <a href="tel:{{ $company->phone }}">{{ $company->phone }}</a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Website:</strong><br>
                        @if($company->website)
                        <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                        @else
                        <span class="text-muted">Tidak ada</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <strong>Alamat:</strong><br>
                        {{ $company->address }}
                    </div>
                    <div class="col-12 mb-3">
                        <strong>Deskripsi:</strong><br>
                        {{ $company->description }}
                    </div>
                    @if($company->vision)
                    <div class="col-md-6 mb-3">
                        <strong>Visi:</strong><br>
                        {{ $company->vision }}
                    </div>
                    @endif
                    @if($company->mission)
                    <div class="col-md-6 mb-3">
                        <strong>Misi:</strong><br>
                        {{ $company->mission }}
                    </div>
                    @endif
                </div>
                @else
                <div class="text-center py-5">
                    <i class="fas fa-building fa-5x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada informasi dealer</h5>
                    <p class="text-muted">Tambahkan informasi dealer untuk ditampilkan di website</p>
                    <a href="{{ route('admin.company.edit') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Info Dealer
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        @if($company && $company->logo)
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-image me-2"></i>Logo Dealer
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
                    <i class="fas fa-info-circle me-2"></i>Informasi
                </h6>
            </div>
            <div class="card-body">
                <small class="text-muted">
                    @if($company)
                    <strong>Terakhir diupdate:</strong><br>
                    {{ $company->updated_at->format('d M Y H:i') }}<br><br>
                    @endif
                    
                    <strong>Catatan:</strong><br>
                    • Informasi ini akan ditampilkan di halaman Contact<br>
                    • Pastikan data selalu up-to-date<br>
                    • Logo akan ditampilkan di navbar website
                </small>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-external-link-alt me-2"></i>Preview
                </h6>
            </div>
            <div class="card-body">
                <a href="{{ route('contact') }}" target="_blank" class="btn btn-outline-primary btn-sm w-100">
                    <i class="fas fa-eye me-2"></i>Lihat di Website
                </a>
            </div>
        </div>
    </div>
</div>
@endsection