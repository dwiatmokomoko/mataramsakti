@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Testimonial</h1>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Testimonial</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Nama Pelanggan *</label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" 
                                   id="customer_name" name="customer_name" 
                                   value="{{ old('customer_name', $testimonial->customer_name) }}" required>
                            @error('customer_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="customer_location" class="form-label">Lokasi</label>
                            <input type="text" class="form-control @error('customer_location') is-invalid @enderror" 
                                   id="customer_location" name="customer_location" 
                                   value="{{ old('customer_location', $testimonial->customer_location) }}">
                            @error('customer_location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="motor_id" class="form-label">Motor</label>
                            <select class="form-control @error('motor_id') is-invalid @enderror" 
                                    id="motor_id" name="motor_id">
                                <option value="">Pilih Motor (Opsional)</option>
                                @foreach($motors as $motor)
                                    <option value="{{ $motor->id }}" 
                                            {{ old('motor_id', $testimonial->motor_id) == $motor->id ? 'selected' : '' }}>
                                        {{ $motor->name }} - {{ $motor->model }}
                                    </option>
                                @endforeach
                            </select>
                            @error('motor_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating *</label>
                            <select class="form-control @error('rating') is-invalid @enderror" 
                                    id="rating" name="rating" required>
                                <option value="">Pilih Rating</option>
                                <option value="5" {{ old('rating', $testimonial->rating) == '5' ? 'selected' : '' }}>5 Bintang</option>
                                <option value="4" {{ old('rating', $testimonial->rating) == '4' ? 'selected' : '' }}>4 Bintang</option>
                                <option value="3" {{ old('rating', $testimonial->rating) == '3' ? 'selected' : '' }}>3 Bintang</option>
                                <option value="2" {{ old('rating', $testimonial->rating) == '2' ? 'selected' : '' }}>2 Bintang</option>
                                <option value="1" {{ old('rating', $testimonial->rating) == '1' ? 'selected' : '' }}>1 Bintang</option>
                            </select>
                            @error('rating')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="testimonial" class="form-label">Testimonial *</label>
                    <textarea class="form-control @error('testimonial') is-invalid @enderror" 
                              id="testimonial" name="testimonial" rows="4" required>{{ old('testimonial', $testimonial->testimonial) }}</textarea>
                    @error('testimonial')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="customer_photo" class="form-label">Foto Pelanggan</label>
                    @if($testimonial->customer_photo)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $testimonial->customer_photo) }}" 
                                 class="rounded" width="100" height="100" alt="Current Photo">
                            <small class="d-block text-muted">Foto saat ini</small>
                        </div>
                    @endif
                    <input type="file" class="form-control @error('customer_photo') is-invalid @enderror" 
                           id="customer_photo" name="customer_photo" accept="image/*">
                    @error('customer_photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</small>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="is_featured" 
                                   name="is_featured" value="1" 
                                   {{ old('is_featured', $testimonial->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">
                                Tampilkan di Featured
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="is_active" 
                                   name="is_active" value="1" 
                                   {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Aktif
                            </label>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection