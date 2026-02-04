@extends('admin.layouts.app')

@section('title', 'Model Motor - ' . $motor->name)
@section('page-title', 'Model Motor: ' . $motor->name)
@section('page-description', 'Kelola model dan varian dari motor ' . $motor->name)

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Informasi Motor</h6>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Nama Motor:</strong> {{ $motor->name }}<br>
                        <strong>Kategori:</strong> <span class="badge bg-primary">{{ $motor->category }}</span><br>
                        <strong>Status:</strong> 
                        @if($motor->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <strong>Total Model:</strong> {{ $models->total() }}<br>
                        <strong>Model Aktif:</strong> {{ $motor->activeModels->count() }}<br>
                        <strong>Model Featured:</strong> {{ $motor->featuredModels->count() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <a href="{{ route('admin.motors.models.create', $motor) }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus me-2"></i>Tambah Model Baru
                </a>
                <hr>
                <a href="{{ route('admin.motors.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Motor
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-cogs me-2"></i>Daftar Model Motor
        </h5>
        <span class="badge bg-info">{{ $models->total() }} Model</span>
    </div>
    <div class="card-body">
        @if($models->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Model</th>
                        <th>Harga OTR</th>
                        <th>Varian Warna</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($models as $model)
                    <tr>
                        <td>
                            <strong>{{ $model->name }}</strong><br>
                            <small class="text-muted">{{ $model->full_name }}</small>
                        </td>
                        <td>
                            <strong>{{ $model->formatted_price_otr }}</strong>
                            @if($model->price_dp)
                                <br><small class="text-muted">DP: {{ $model->formatted_price_dp }}</small>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-secondary">{{ $model->variants_count }} Warna</span>
                            @if($model->variants_count > 0)
                                <br>
                                <a href="{{ route('admin.motors.models.variants.index', [$motor, $model]) }}" 
                                   class="btn btn-sm btn-outline-info mt-1">
                                    <i class="fas fa-palette me-1"></i>Kelola Warna
                                </a>
                            @endif
                        </td>
                        <td>
                            @if($model->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                            @if($model->is_featured)
                                <br><span class="badge bg-warning text-dark">Featured</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.motors.models.show', [$motor, $model]) }}" 
                                   class="btn btn-sm btn-outline-primary" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.motors.models.edit', [$motor, $model]) }}" 
                                   class="btn btn-sm btn-outline-secondary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-danger" 
                                        onclick="confirmDelete('{{ $model->id }}', '{{ $model->full_name }}')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $models->links() }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-cogs fa-4x text-muted mb-3"></i>
            <h5 class="text-muted">Belum ada model untuk motor {{ $motor->name }}</h5>
            <p class="text-muted">Tambahkan model pertama untuk motor ini</p>
            <a href="{{ route('admin.motors.models.create', $motor) }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Model Pertama
            </a>
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
                <p>Apakah Anda yakin ingin menghapus model <strong id="modelName"></strong>?</p>
                <p class="text-warning"><i class="fas fa-exclamation-triangle"></i> Tindakan ini tidak dapat dibatalkan!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(modelId, modelName) {
    document.getElementById('modelName').textContent = modelName;
    document.getElementById('deleteForm').action = 
        "{{ route('admin.motors.models.destroy', [$motor, ':model']) }}".replace(':model', modelId);
    
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
@endsection