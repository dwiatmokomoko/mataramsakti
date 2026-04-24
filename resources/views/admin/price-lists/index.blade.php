@extends('admin.layouts.app')

@section('title', 'Daftar Harga')
@section('page-title', 'Manajemen Daftar Harga')
@section('page-description', 'Kelola file PDF daftar harga untuk pelanggan')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-file-pdf me-2"></i>Daftar Harga yang Diupload
                </h5>
            </div>
            <div class="card-body">
                @if($priceLists->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Nama File</th>
                                <th>Ukuran</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Upload</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($priceLists as $priceList)
                            <tr>
                                <td>
                                    <i class="fas fa-file-pdf text-danger me-2"></i>
                                    {{ $priceList->filename }}
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ number_format($priceList->file_size / 1024, 2) }} KB
                                    </small>
                                </td>
                                <td>
                                    @if($priceList->description)
                                        <small>{{ Str::limit($priceList->description, 50) }}</small>
                                    @else
                                        <small class="text-muted">-</small>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ $priceList->created_at->format('d M Y H:i') }}
                                    </small>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('download-price-list', $priceList->id) }}" 
                                           class="btn btn-outline-primary" 
                                           title="Download">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-outline-warning" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editModal{{ $priceList->id }}"
                                                title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('admin.price-lists.destroy', $priceList->id) }}" 
                                              method="POST" 
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-outline-danger" 
                                                    title="Hapus"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus file ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $priceList->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Daftar Harga</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="{{ route('admin.price-lists.update', $priceList->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">File PDF (Opsional)</label>
                                                    <input type="file" name="file" class="form-control" accept=".pdf">
                                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti file</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea name="description" class="form-control" rows="3">{{ $priceList->description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-5">
                    <i class="fas fa-file-pdf fa-5x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada daftar harga</h5>
                    <p class="text-muted">Upload daftar harga pertama Anda menggunakan form di samping</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-cloud-upload-alt me-2"></i>Upload Daftar Harga
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.price-lists.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">File PDF <span class="text-danger">*</span></label>
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" accept=".pdf" required>
                        @error('file')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Contoh: Daftar harga Januari 2026"></textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-upload me-2"></i>Upload
                    </button>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Informasi
                </h6>
            </div>
            <div class="card-body">
                <small class="text-muted">
                    <strong>Persyaratan File:</strong><br>
                    • Format: PDF<br>
                    • Ukuran maksimal: 5MB<br>
                    • Nama file akan disimpan otomatis<br><br>
                    
                    <strong>Total File:</strong><br>
                    {{ $priceLists->count() }} file<br><br>
                    
                    <strong>Ukuran Total:</strong><br>
                    {{ number_format($priceLists->sum('file_size') / 1024 / 1024, 2) }} MB
                </small>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-link me-2"></i>Link Download Publik
                </h6>
            </div>
            <div class="card-body">
                <small class="text-muted">
                    Pelanggan dapat mengunduh daftar harga melalui link publik tanpa perlu login.
                </small>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    <strong>Terjadi Kesalahan:</strong>
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
@endsection
