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
    
    <!-- Search and Filter Section -->
    <div class="card-body border-bottom">
        <form method="GET" action="{{ route('admin.motors.index') }}" class="row g-3">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" name="search" 
                           placeholder="Cari nama motor, kategori, atau deskripsi..." 
                           value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="category">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="status">
                    <option value="">Semua Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="sort">
                    <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Tanggal Dibuat</option>
                    <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama Motor</option>
                    <option value="category" {{ request('sort') == 'category' ? 'selected' : '' }}>Kategori</option>
                </select>
            </div>
            <div class="col-md-2">
                <div class="btn-group w-100" role="group">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                    <a href="{{ route('admin.motors.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times"></i> Reset
                    </a>
                </div>
            </div>
        </form>
    </div>
    
    <div class="card-body">
        @if($motors->count() > 0)
        <!-- Results Info -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="text-muted">
                Menampilkan {{ $motors->firstItem() }} - {{ $motors->lastItem() }} 
                dari {{ $motors->total() }} motor
                @if(request('search'))
                    untuk pencarian "<strong>{{ request('search') }}</strong>"
                @endif
            </div>
            <div class="text-muted">
                <small>
                    <i class="fas fa-sort"></i>
                    Diurutkan berdasarkan {{ request('sort', 'created_at') == 'created_at' ? 'Tanggal Dibuat' : (request('sort') == 'name' ? 'Nama Motor' : 'Kategori') }}
                </small>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'order' => request('sort') == 'name' && request('order') == 'asc' ? 'desc' : 'asc']) }}" 
                               class="text-decoration-none text-dark">
                                Motor
                                @if(request('sort') == 'name')
                                    <i class="fas fa-sort-{{ request('order') == 'asc' ? 'up' : 'down' }} ms-1"></i>
                                @else
                                    <i class="fas fa-sort ms-1 text-muted"></i>
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'category', 'order' => request('sort') == 'category' && request('order') == 'asc' ? 'desc' : 'asc']) }}" 
                               class="text-decoration-none text-dark">
                                Kategori
                                @if(request('sort') == 'category')
                                    <i class="fas fa-sort-{{ request('order') == 'asc' ? 'up' : 'down' }} ms-1"></i>
                                @else
                                    <i class="fas fa-sort ms-1 text-muted"></i>
                                @endif
                            </a>
                        </th>
                        <th>Models</th>
                        <th>Status</th>
                        <th>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'created_at', 'order' => request('sort') == 'created_at' && request('order') == 'asc' ? 'desc' : 'asc']) }}" 
                               class="text-decoration-none text-dark">
                                Dibuat
                                @if(request('sort') == 'created_at' || !request('sort'))
                                    <i class="fas fa-sort-{{ request('order', 'desc') == 'asc' ? 'up' : 'down' }} ms-1"></i>
                                @else
                                    <i class="fas fa-sort ms-1 text-muted"></i>
                                @endif
                            </a>
                        </th>
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
                                    <small class="text-muted">{{ Str::limit($motor->description, 50) }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-primary">{{ $motor->category }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-info me-2">{{ $motor->models_count }}</span>
                                <small class="text-muted">models</small>
                            </div>
                        </td>
                        <td>
                            @if($motor->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <small class="text-muted">{{ $motor->created_at->format('d M Y') }}</small>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.motors.show', $motor) }}" 
                                   class="btn btn-sm btn-outline-info" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.motors.models.index', $motor) }}" 
                                   class="btn btn-sm btn-outline-secondary" title="Kelola Models">
                                    <i class="fas fa-cogs"></i>
                                </a>
                                <a href="{{ route('admin.motors.edit', $motor) }}" 
                                   class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-danger" 
                                        title="Hapus" onclick="confirmDelete('{{ $motor->id }}', '{{ $motor->name }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Enhanced Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
                <small>
                    Halaman {{ $motors->currentPage() }} dari {{ $motors->lastPage() }}
                    ({{ $motors->total() }} total motor)
                </small>
            </div>
            <div>
                {{ $motors->links('pagination::bootstrap-4') }}
            </div>
        </div>
        @else
        <div class="text-center py-5">
            @if(request()->hasAny(['search', 'category', 'status']))
                <i class="fas fa-search fa-5x text-muted mb-3"></i>
                <h5 class="text-muted">Tidak ada motor yang ditemukan</h5>
                <p class="text-muted">
                    Coba ubah kriteria pencarian atau filter Anda
                </p>
                <a href="{{ route('admin.motors.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-times me-2"></i>Reset Pencarian
                </a>
            @else
                <i class="fas fa-motorcycle fa-5x text-muted mb-3"></i>
                <h5 class="text-muted">Belum ada motor</h5>
                <p class="text-muted">Mulai tambahkan motor Yamaha ke dalam sistem</p>
                <a href="{{ route('admin.motors.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Motor Pertama
                </a>
            @endif
        </div>
        @endif
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus motor <strong id="motorName"></strong>?</p>
                <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmDelete(motorId, motorName) {
    document.getElementById('motorName').textContent = motorName;
    document.getElementById('deleteForm').action = 
        "{{ route('admin.motors.destroy', ':motor') }}".replace(':motor', motorId);
    
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}

// Auto-submit form on filter change
document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.querySelector('select[name="category"]');
    const statusSelect = document.querySelector('select[name="status"]');
    const sortSelect = document.querySelector('select[name="sort"]');
    
    [categorySelect, statusSelect, sortSelect].forEach(select => {
        if (select) {
            select.addEventListener('change', function() {
                this.form.submit();
            });
        }
    });
    
    // Clear search on Escape key
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                this.value = '';
                this.form.submit();
            }
        });
    }
});
</script>
@endpush
@endsection