@extends('admin.layouts.app')

@section('title', 'Kelola Motor')
@section('page-title', 'Kelola Motor')
@section('page-description', 'Manajemen data motor Yamaha')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-motorcycle me-2"></i>Daftar Motor
        </h5>
        <a href="{{ route('admin.motors.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Motor
        </a>
    </div>
    <div class="card-body">
        @if($motors->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Motor</th>
                        <th>Kategori</th>
                        <th>Harga OTR</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motors as $motor)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    @if($motor->image)
                                        <img src="{{ asset('storage/' . $motor->image) }}" 
                                             class="rounded" width="50" height="50" 
                                             style="object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-motorcycle text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <strong>{{ $motor->name }}</strong><br>
                                    <small class="text-muted">{{ $motor->model }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-primary">{{ $motor->category }}</span>
                        </td>
                        <td>{{ $motor->formatted_price_otr }}</td>
                        <td>
                            @if($motor->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                            @if($motor->is_featured)
                                <span class="badge bg-warning text-dark">Featured</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.motors.show', $motor) }}" 
                                   class="btn btn-sm btn-outline-info" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.motors.variants.index', $motor) }}" 
                                   class="btn btn-sm btn-outline-secondary" title="Kelola Warna">
                                    <i class="fas fa-palette"></i>
                                </a>
                                <a href="{{ route('admin.motors.edit', $motor) }}" 
                                   class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.motors.destroy', $motor) }}" 
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus motor ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            {{ $motors->links() }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-motorcycle fa-5x text-muted mb-3"></i>
            <h5 class="text-muted">Belum ada motor</h5>
            <p class="text-muted">Mulai tambahkan motor Yamaha ke dalam sistem</p>
            <a href="{{ route('admin.motors.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Motor Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection