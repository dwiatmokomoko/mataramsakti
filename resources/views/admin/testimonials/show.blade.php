@extends('admin.layouts.app')

@section('title', 'Detail Testimonial')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Testimonial</h1>
        <div>
            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-warning me-2">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Testimonial</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Nama Pelanggan:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $testimonial->customer_name }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Lokasi:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $testimonial->customer_location ?: '-' }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Motor:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $testimonial->motor ? $testimonial->motor->name . ' - ' . $testimonial->motor->model : '-' }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Rating:</strong>
                        </div>
                        <div class="col-sm-9">
                            {!! $testimonial->stars_html !!}
                            ({{ $testimonial->rating }}/5)
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Testimonial:</strong>
                        </div>
                        <div class="col-sm-9">
                            <div class="bg-light p-3 rounded">
                                <i class="fas fa-quote-left text-muted me-2"></i>
                                {{ $testimonial->testimonial }}
                                <i class="fas fa-quote-right text-muted ms-2"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Status:</strong>
                        </div>
                        <div class="col-sm-9">
                            @if($testimonial->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Tidak Aktif</span>
                            @endif
                            @if($testimonial->is_featured)
                                <span class="badge bg-warning text-dark ms-2">Featured</span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Dibuat:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $testimonial->created_at->format('d M Y H:i') }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Diperbarui:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $testimonial->updated_at->format('d M Y H:i') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Foto Pelanggan</h6>
                </div>
                <div class="card-body text-center">
                    @if($testimonial->customer_photo)
                        <img src="{{ asset('storage/' . $testimonial->customer_photo) }}" 
                             class="img-fluid rounded-circle mb-3" 
                             alt="{{ $testimonial->customer_name }}"
                             style="max-width: 200px; max-height: 200px;">
                    @else
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" 
                             style="width: 150px; height: 150px;">
                            <i class="fas fa-user fa-4x text-white"></i>
                        </div>
                        <p class="text-muted">Tidak ada foto</p>
                    @endif
                </div>
            </div>

            @if($testimonial->motor)
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Motor Terkait</h6>
                </div>
                <div class="card-body text-center">
                    @php
                        $motorImage = $testimonial->motor->main_image ?: $testimonial->motor->image;
                    @endphp
                    @if($motorImage)
                        <img src="{{ asset('storage/' . $motorImage) }}" 
                             class="img-fluid rounded mb-3" 
                             alt="{{ $testimonial->motor->name }}"
                             style="max-height: 150px;">
                    @endif
                    <h6>{{ $testimonial->motor->name }}</h6>
                    <p class="text-muted">{{ $testimonial->motor->model }}</p>
                    <p class="text-primary fw-bold">{{ $testimonial->motor->formatted_price_otr }}</p>
                    <a href="{{ route('admin.motors.show', $testimonial->motor) }}" class="btn btn-outline-primary btn-sm">
                        Lihat Motor
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection