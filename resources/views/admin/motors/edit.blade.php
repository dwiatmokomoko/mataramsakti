@extends('admin.layouts.app')

@section('title', 'Edit Motor')
@section('page-title', 'Edit Motor')
@section('page-description', 'Edit data motor ' . $motor->name)

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-edit me-2"></i>Form Edit Motor
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.motors.update', $motor) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama Motor *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $motor->name) }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="model" class="form-label">Model *</label>
                            <input type="text" class="form-control @error('model') is-invalid @enderror" 
                                   id="model" name="model" value="{{ old('model', $motor->model) }}" required>
                            @error('model')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="3">{{ old('description', $motor->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="price_otr" class="form-label">Harga OTR *</label>
                            <input type="number" class="form-control @error('price_otr') is-invalid @enderror" 
                                   id="price_otr" name="price_otr" value="{{ old('price_otr', $motor->price_otr) }}" required>
                            @error('price_otr')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="price_dp" class="form-label">Harga DP</label>
                            <input type="number" class="form-control @error('price_dp') is-invalid @enderror" 
                                   id="price_dp" name="price_dp" value="{{ old('price_dp', $motor->price_dp) }}">
                            @error('price_dp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="price_installment" class="form-label">Cicilan/Bulan</label>
                            <input type="number" class="form-control @error('price_installment') is-invalid @enderror" 
                                   id="price_installment" name="price_installment" value="{{ old('price_installment', $motor->price_installment) }}">
                            @error('price_installment')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">Kategori *</label>
                            <select class="form-control @error('category') is-invalid @enderror" 
                                    id="category" name="category" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                <option value="{{ $category }}" {{ old('category', $motor->category) == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Gambar Motor</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($motor->image)
                            <small class="text-muted">Gambar saat ini: {{ basename($motor->image) }}</small>
                            @endif
                        </div>
                    </div>

                    <!-- Spesifikasi -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Spesifikasi Motor</label>
                        
                        <!-- Engine Specifications -->
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <h6 class="mb-0"><i class="fas fa-cogs me-2"></i>Mesin</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[tipe_mesin]" 
                                               placeholder="Tipe Mesin (contoh: 4 Langkah, berpendingin cairan, SOHC 4 katup, VVA)" 
                                               value="{{ old('specifications.tipe_mesin', $motor->specifications['tipe_mesin'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[jumlah_silinder]" 
                                               placeholder="Jumlah Silinder (contoh: Silinder Tunggal)" 
                                               value="{{ old('specifications.jumlah_silinder', $motor->specifications['jumlah_silinder'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[diameter_langkah]" 
                                               placeholder="Diameter x Langkah (contoh: 58 x 58,7 mm)" 
                                               value="{{ old('specifications.diameter_langkah', $motor->specifications['diameter_langkah'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[kapasitas_mesin]" 
                                               placeholder="Kapasitas Mesin (contoh: 155,09cc)" 
                                               value="{{ old('specifications.kapasitas_mesin', $motor->specifications['kapasitas_mesin'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[daya_maksimum]" 
                                               placeholder="Daya Maksimum (contoh: 11,3 kW (15,4 PS) / 8000 rpm)" 
                                               value="{{ old('specifications.daya_maksimum', $motor->specifications['daya_maksimum'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[torsi_maksimum]" 
                                               placeholder="Torsi Maksimum (contoh: 14,2 Nm / 8000 rpm)" 
                                               value="{{ old('specifications.torsi_maksimum', $motor->specifications['torsi_maksimum'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[sistem_starter]" 
                                               placeholder="Sistem Starter (contoh: Electric Starter)" 
                                               value="{{ old('specifications.sistem_starter', $motor->specifications['sistem_starter'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[sistem_pelumasan]" 
                                               placeholder="Sistem Pelumasan (contoh: Pelumasan Basah)" 
                                               value="{{ old('specifications.sistem_pelumasan', $motor->specifications['sistem_pelumasan'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[kapasitas_oli_mesin]" 
                                               placeholder="Kapasitas Oli Mesin (contoh: 1,00 L)" 
                                               value="{{ old('specifications.kapasitas_oli_mesin', $motor->specifications['kapasitas_oli_mesin'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[sistem_bahan_bakar]" 
                                               placeholder="Sistem Bahan Bakar (contoh: Fuel Injection)" 
                                               value="{{ old('specifications.sistem_bahan_bakar', $motor->specifications['sistem_bahan_bakar'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[tipe_kopling]" 
                                               placeholder="Tipe Kopling (contoh: Kopling sentrifugal, Kering)" 
                                               value="{{ old('specifications.tipe_kopling', $motor->specifications['tipe_kopling'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[tipe_transmisi]" 
                                               placeholder="Tipe Transmisi (contoh: V-Belt Otomatis / YECVT)" 
                                               value="{{ old('specifications.tipe_transmisi', $motor->specifications['tipe_transmisi'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[perbandingan_kompresi]" 
                                               placeholder="Perbandingan Kompresi (contoh: 11,6 : 1)" 
                                               value="{{ old('specifications.perbandingan_kompresi', $motor->specifications['perbandingan_kompresi'] ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Chassis Specifications -->
                        <div class="card mb-3">
                            <div class="card-header bg-success text-white">
                                <h6 class="mb-0"><i class="fas fa-motorcycle me-2"></i>Rangka</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[tipe_rangka]" 
                                               placeholder="Tipe Rangka (contoh: Underbone)" 
                                               value="{{ old('specifications.tipe_rangka', $motor->specifications['tipe_rangka'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[suspensi_depan]" 
                                               placeholder="Suspensi Depan (contoh: Telescopic with 30mm Inner Tubes)" 
                                               value="{{ old('specifications.suspensi_depan', $motor->specifications['suspensi_depan'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[suspensi_belakang]" 
                                               placeholder="Suspensi Belakang (contoh: Unit Swing)" 
                                               value="{{ old('specifications.suspensi_belakang', $motor->specifications['suspensi_belakang'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[tipe_ban]" 
                                               placeholder="Tipe Ban (contoh: Tubeless)" 
                                               value="{{ old('specifications.tipe_ban', $motor->specifications['tipe_ban'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[ban_depan]" 
                                               placeholder="Ban Depan (contoh: 110/80-14/C 53P)" 
                                               value="{{ old('specifications.ban_depan', $motor->specifications['ban_depan'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[ban_belakang]" 
                                               placeholder="Ban Belakang (contoh: 140/70-14/C 62P)" 
                                               value="{{ old('specifications.ban_belakang', $motor->specifications['ban_belakang'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[rem_depan]" 
                                               placeholder="Rem Depan (contoh: Disc Brake)" 
                                               value="{{ old('specifications.rem_depan', $motor->specifications['rem_depan'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[rem_belakang]" 
                                               placeholder="Rem Belakang (contoh: Disc Brake)" 
                                               value="{{ old('specifications.rem_belakang', $motor->specifications['rem_belakang'] ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dimension Specifications -->
                        <div class="card mb-3">
                            <div class="card-header bg-info text-white">
                                <h6 class="mb-0"><i class="fas fa-ruler-combined me-2"></i>Dimensi</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[kapasitas_tangki_bensin]" 
                                               placeholder="Kapasitas Tangki Bensin (contoh: 5,5 L)" 
                                               value="{{ old('specifications.kapasitas_tangki_bensin', $motor->specifications['kapasitas_tangki_bensin'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[pxlxt]" 
                                               placeholder="PxLxT (contoh: 1980mm x 710mm x 1170mm)" 
                                               value="{{ old('specifications.pxlxt', $motor->specifications['pxlxt'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[jarak_sumbu_roda]" 
                                               placeholder="Jarak Sumbu Roda (contoh: 1350mm)" 
                                               value="{{ old('specifications.jarak_sumbu_roda', $motor->specifications['jarak_sumbu_roda'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[jarak_terendah_tanah]" 
                                               placeholder="Jarak Terendah ke Tanah (contoh: 145mm)" 
                                               value="{{ old('specifications.jarak_terendah_tanah', $motor->specifications['jarak_terendah_tanah'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[tinggi_tempat_duduk]" 
                                               placeholder="Tinggi Tempat Duduk (contoh: 790mm)" 
                                               value="{{ old('specifications.tinggi_tempat_duduk', $motor->specifications['tinggi_tempat_duduk'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[berat_isi]" 
                                               placeholder="Berat Isi (contoh: 130 Kg)" 
                                               value="{{ old('specifications.berat_isi', $motor->specifications['berat_isi'] ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Electrical Specifications -->
                        <div class="card mb-3">
                            <div class="card-header bg-warning text-dark">
                                <h6 class="mb-0"><i class="fas fa-bolt me-2"></i>Kelistrikan</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[sistem_pengapian]" 
                                               placeholder="Sistem Pengapian (contoh: TCI)" 
                                               value="{{ old('specifications.sistem_pengapian', $motor->specifications['sistem_pengapian'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[tipe_baterai]" 
                                               placeholder="Tipe Baterai (contoh: YTZ77V)" 
                                               value="{{ old('specifications.tipe_baterai', $motor->specifications['tipe_baterai'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="specifications[tipe_busi]" 
                                               placeholder="Tipe Busi (contoh: NGK/CPR8EA-9)" 
                                               value="{{ old('specifications.tipe_busi', $motor->specifications['tipe_busi'] ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_featured" 
                                       name="is_featured" value="1" {{ old('is_featured', $motor->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    Motor Unggulan (tampil di carousel)
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" 
                                       name="is_active" value="1" {{ old('is_active', $motor->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Status Aktif
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.motors.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Motor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        @if($motor->image)
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-image me-2"></i>Gambar Saat Ini
                </h6>
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('storage/' . $motor->image) }}" 
                     class="img-fluid rounded" alt="{{ $motor->name }}">
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
                    <strong>Dibuat:</strong> {{ $motor->created_at->format('d M Y H:i') }}<br>
                    <strong>Diupdate:</strong> {{ $motor->updated_at->format('d M Y H:i') }}<br><br>
                    
                    <strong>Tips:</strong><br>
                    • Upload gambar baru akan mengganti gambar lama<br>
                    • Kosongkan field yang tidak ingin diubah<br>
                    • Motor unggulan maksimal 4 untuk carousel optimal
                </small>
            </div>
        </div>
    </div>
</div>
@endsection