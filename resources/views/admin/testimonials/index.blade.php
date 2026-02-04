@extends('admin.layouts.app')

@section('title', 'Kelola Testimonial')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Testimonial</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Testimonial
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Testimonial</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Lokasi</th>
                            <th>Motor</th>
                            <th>Rating</th>
                            <th>Testimonial</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonials as $testimonial)
                        <tr>
                            <td class="text-center">
                                @if($testimonial->customer_photo)
                                    <img src="{{ asset('storage/' . $testimonial->customer_photo) }}" 
                                         class="rounded-circle" width="40" height="40" 
                                         alt="{{ $testimonial->customer_name }}">
                                @else
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                                         style="width: 40px; height: 40px;">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $testimonial->customer_name }}</td>
                            <td>{{ $testimonial->customer_location ?: '-' }}</td>
                            <td>{{ $testimonial->motor->name ?? '-' }}</td>
                            <td>
                                {!! $testimonial->stars_html !!}
                            </td>
                            <td>{{ Str::limit($testimonial->testimonial, 50) }}</td>
                            <td>
                                @if($testimonial->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Tidak Aktif</span>
                                @endif
                                @if($testimonial->is_featured)
                                    <span class="badge bg-warning text-dark">Featured</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.testimonials.show', $testimonial) }}" 
                                       class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" 
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus testimonial ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada testimonial.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{ $testimonials->links() }}
        </div>
    </div>
</div>
@endsection