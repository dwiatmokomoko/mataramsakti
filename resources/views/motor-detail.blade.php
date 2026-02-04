@extends('layouts.app')

@section('title', $motor->name . ' - Detail Motor Yamaha')

@section('content')
<style>
/* Custom Styles untuk Meniru Tampilan Yamaha */
.yamaha-header {
    text-align: center;
    margin-bottom: 2rem;
}

/* VARIANT & PRICE Section */
.variant-price-section {
    background: #f8f9fa;
    padding: 60px 0;
}

.variant-price-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: #1e3c72;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 40px;
}

/* Variant Tabs Style */
.variant-tabs-wrapper {
    margin-bottom: 50px;
}

.variant-tab {
    display: inline-block;
    padding: 12px 30px;
    background: #e9ecef;
    color: #6c757d;
    margin: 0 -2px;
    cursor: pointer;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s;
    border: none;
    text-decoration: none;
    position: relative;
    min-width: 140px;
    text-align: center;
    /* Trapezoid shape using clip-path */
    clip-path: polygon(15px 0%, 100% 0%, calc(100% - 15px) 100%, 0% 100%);
}

.variant-tab span {
    display: block;
    white-space: nowrap;
}

.variant-tab.active {
    background: #1e3c72; /* Yamaha Dark Blue */
    color: #fff;
    z-index: 2;
    position: relative;
}

.variant-tab:hover {
    background: #1e3c72;
    color: #fff;
    z-index: 1;
}

/* Navigation Buttons */
#prevVariant,
#nextVariant {
    background: none;
    border: none;
    font-size: 1.5rem;
    padding: 10px;
    transition: all 0.3s ease;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
}

#prevVariant:hover,
#nextVariant:hover {
    color: #1e3c72;
    transform: scale(1.1);
}

#prevVariant:disabled,
#nextVariant:disabled {
    opacity: 0.3;
    cursor: not-allowed;
}

#prevVariant:disabled:hover,
#nextVariant:disabled:hover {
    color: #6c757d;
    transform: none;
}

/* Motor Display */
.motor-display-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 60px 20px;
    border-radius: 20px;
    position: relative;
    overflow: hidden;
}

.motor-image-main {
    max-height: 450px;
    width: auto;
    object-fit: contain;
    transition: opacity 0.3s ease, transform 0.3s ease;
    filter: drop-shadow(0 20px 40px rgba(0,0,0,0.15));
}

/* Motor Model Name Animation */
.motor-model-name {
    font-size: 1.8rem;
    font-weight: 700;
    color: #1e3c72;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: opacity 0.3s ease;
}

/* Price Display Animation */
.price-tag-large {
    font-size: 2.8rem;
    font-weight: 800;
    color: #1e3c72;
    margin-bottom: 10px;
    transition: transform 0.3s ease, opacity 0.3s ease;
}

/* Color Options Animation */
.color-options-wrapper {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 25px;
    transition: opacity 0.4s ease;
}

/* Color Selection */
.color-selection-section {
    padding: 40px 0;
}

.color-selection-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 30px;
}

.color-variant-detail {
    cursor: pointer;
    transition: transform 0.3s ease;
}

.color-variant-detail:hover {
    transform: scale(1.1);
}

.color-swatch {
    width: 80px;
    height: 30px;
    border-radius: 5px;
    border: 3px solid #ddd;
    transition: all 0.3s ease;
    position: relative;
    transform: skew(-10deg);
}

.color-swatch.active {
    border-color: #1e3c72;
    box-shadow: 0 0 0 3px rgba(30, 60, 114, 0.3);
    transform: skew(-10deg) scale(1.1);
}

.selected-color-name {
    font-size: 1.3rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 10px;
}

.motor-model-name {
    font-size: 1.8rem;
    font-weight: 700;
    color: #1e3c72;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Price Display */
.price-display-section {
    padding: 30px 0;
}

.price-tag-large {
    font-size: 2.8rem;
    font-weight: 800;
    color: #1e3c72;
    margin-bottom: 10px;
}

.price-subtitle {
    font-size: 1rem;
    color: #6c757d;
    margin-bottom: 0;
}

/* Action Buttons */
.action-buttons-section {
    padding: 30px 0;
}

.btn-lg {
    padding: 15px 40px;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 50px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Specs Section Dark Theme */
.specs-section {
    background-color: #1e3c72; /* Dark Blue Background */
    color: white;
    padding: 80px 0;
    margin-top: 0;
}

.specs-title {
    border-bottom: 1px solid rgba(255,255,255,0.3);
    padding-bottom: 15px;
    margin-bottom: 25px;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 1rem;
    color: #fff;
}

.spec-row {
    display: flex;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    padding: 12px 0;
    font-size: 0.9rem;
}

.spec-label {
    width: 45%;
    font-weight: 600;
    color: #aebceb;
}

.spec-value {
    width: 55%;
    color: #fff;
}

.spec-icon {
    color: #fff;
    margin-right: 12px;
    font-size: 1.1rem;
}

/* Related Motors */
.related-section {
    background: #f8f9fa;
    padding: 80px 0;
}

/* Motor Card Styles (same as home page) */
.motor-card {
    background: white;
    border: none;
    border-radius: 25px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    overflow: hidden;
    position: relative;
    height: 100%;
    display: flex;
    flex-direction: column;
    padding-bottom: 10px;
}

.motor-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 50px rgba(0,0,0,0.12);
}

.motor-image-container {
    padding: 30px 20px 10px 20px;
    height: 220px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.motor-main-image {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.motor-card:hover .motor-main-image {
    transform: scale(1.08);
}

.card-body {
    text-align: center;
    padding: 15px 20px 50px 20px;
    flex-grow: 1;
}

.motor-title {
    font-size: 1.3rem;
    font-weight: 800;
    color: #2c3e50;
    margin-bottom: 5px;
}

.motor-model {
    color: #1e3c72;
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 8px;
}

.motor-location {
    color: #95a5a6;
    font-size: 0.8rem;
    margin-bottom: 8px;
    font-weight: 400;
}

.motor-price {
    font-size: 1.15rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0;
}

.btn-details {
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: #1e3a8a;
    color: white;
    border: none;
    padding: 12px 35px;
    font-weight: 600;
    font-size: 0.9rem;
    border-top-left-radius: 25px; 
    border-bottom-right-radius: 0;
    transition: background 0.3s ease;
    text-decoration: none;
}

.btn-details:hover {
    background-color: #152c6b;
    color: white;
}

.related-card {
    transition: transform 0.3s ease;
    border: none;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.related-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

/* Responsive */
@media (max-width: 768px) {
    .variant-price-title {
        font-size: 2rem;
    }
    
    .variant-tab {
        padding: 10px 20px;
        margin: 0 2px;
        font-size: 0.8rem;
        min-width: 100px;
    }
    
    .price-tag-large {
        font-size: 2.2rem;
    }
    
    .motor-image-main {
        max-height: 300px;
    }
    
    .color-swatch {
        width: 60px;
        height: 25px;
    }
    
    .motor-display-section {
        padding: 40px 15px;
    }
    
    .btn-lg {
        padding: 12px 30px;
        font-size: 1rem;
        margin-bottom: 10px;
    }
    
    .action-buttons-section .btn {
        display: block;
        width: 100%;
        margin-bottom: 15px;
    }
}

@media (max-width: 576px) {
    .variant-tab {
        padding: 8px 15px;
        font-size: 0.7rem;
        min-width: 80px;
    }
    
    .color-options-wrapper {
        gap: 10px;
    }
    
    .motor-model-name {
        font-size: 1.5rem;
    }
}
</style>

{{-- VARIANT & PRICE Section --}}
<div class="variant-price-section">
    <div class="container">
        {{-- Header --}}
        <div class="text-center mb-4">
            <h2 class="variant-price-title">VARIANT & PRICE</h2>
        </div>

        {{-- Variant Tabs --}}
        <div class="variant-tabs-wrapper text-center mb-5">
            <div class="d-flex justify-content-center align-items-center">
                <button class="btn btn-link text-dark me-3 d-none d-md-block" id="prevVariant">
                    <i class="fas fa-chevron-left"></i>
                </button>
                
                @if($motor->models->count() > 0)
                    @foreach($motor->models as $index => $model)
                    <div class="variant-tab {{ $index === 0 ? 'active' : '' }}" 
                         data-variant="{{ $model->name }}"
                         data-fullname="{{ $model->full_name }}"
                         data-price="{{ $model->price_otr }}"
                         data-price-formatted="{{ $model->formatted_price_otr }}"
                         data-image="{{ $model->main_image }}"
                         data-colors="{{ json_encode($model->availableVariants->map(function($variant) {
                             return ['name' => $variant->color_name, 'code' => $variant->color_code];
                         })->toArray()) }}"
                         data-model-id="{{ $model->id }}">
                        <span>{{ $model->name }}</span>
                    </div>
                    @endforeach
                @else
                    <div class="variant-tab active" 
                         data-variant="{{ $motor->name }}"
                         data-fullname="{{ $motor->name }}"
                         data-price="{{ $motor->price_otr }}"
                         data-price-formatted="{{ $motor->formatted_price_otr }}"
                         data-image="{{ $motor->main_image }}"
                         data-colors="[]"
                         data-model-id="0">
                        <span>Standard</span>
                    </div>
                @endif
                
                <button class="btn btn-link text-dark ms-3 d-none d-md-block" id="nextVariant">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        {{-- Main Motor Display --}}
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                
                {{-- Motor Image --}}
                <div class="motor-display-section mb-5">
                    @php
                        $firstModel = $motor->models->first();
                        $displayImage = $firstModel ? ($firstModel->main_image ?: $firstModel->image) : $motor->main_image;
                    @endphp
                    <img id="mainMotorImage" 
                         src="{{ $displayImage ? asset('storage/' . $displayImage) : asset('images/no-image.jpg') }}" 
                         class="motor-image-main" 
                         alt="{{ $motor->name }}">
                </div>

                {{-- Color Selection --}}
                @php
                    $firstModel = $motor->models->first();
                    $availableVariants = $firstModel ? $firstModel->availableVariants : collect();
                @endphp
                @if($availableVariants->count() > 0)
                <div class="color-selection-section mb-5">
                    <h5 class="color-selection-title mb-4">Pilih Warna</h5>
                    
                    {{-- Color Options --}}
                    <div class="color-options-wrapper mb-4">
                        @foreach($availableVariants as $index => $variant)
                        <div class="color-variant-detail" 
                             data-image="{{ $variant->image ? asset('storage/' . $variant->image) : '' }}"
                             data-price="{{ $variant->final_price }}"
                             data-price-formatted="{{ $variant->formatted_final_price }}"
                             data-name="{{ $variant->color_name }}"
                             title="{{ $variant->color_name }}">
                            <div class="color-swatch {{ $index == 0 ? 'active' : '' }}" 
                                 style="background: {{ $variant->color_code ?? '#000' }};"></div>
                        </div>
                        @endforeach
                    </div>
                    
                    {{-- Selected Color Name --}}
                    <h4 class="selected-color-name" id="colorNameDisplay">
                        {{ $availableVariants->first()->color_name ?? 'Standard Color' }}
                    </h4>
                    
                    {{-- Motor Model Name --}}
                    <h3 class="motor-model-name mt-3">{{ $firstModel ? $firstModel->full_name : $motor->name }}</h3>
                </div>
                @else
                <div class="color-selection-section mb-5">
                    <h4 class="selected-color-name">{{ $firstModel ? $firstModel->full_name : $motor->name }}</h4>
                </div>
                @endif

                {{-- Price Display --}}
                <div class="price-display-section mb-5">
                    <div class="price-tag-large" id="currentPrice">{{ $firstModel ? $firstModel->formatted_price_otr : $motor->formatted_price_otr }}</div>
                    <p class="price-subtitle">Harga Rekomendasi OTR Yogyakarta</p>
                </div>

                {{-- Action Buttons --}}
                <div class="action-buttons-section">
                    <button class="btn btn-outline-primary btn-lg px-5 me-3" 
                            data-bs-toggle="modal" 
                            data-bs-target="#creditModal">
                        <i class="fas fa-calculator me-2"></i>Simulasi Kredit
                    </button>
                    <a href="https://wa.me/6285641956326?text=Halo%20Yamaha%20Mataram%20Sakti,%20saya%20lihat%20di%20web%20dan%20ingin%20bertanya%20tentang%20{{ urlencode($motor->name) }}" target="_blank" class="btn btn-primary btn-lg px-5">
                        <i class="fab fa-whatsapp me-2"></i>Konsultasi Pembelian
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Specifications Section --}}
@php
    $firstModel = $motor->models->first();
    $specifications = $firstModel ? $firstModel->specifications : $motor->specifications;
@endphp
@if($specifications && count($specifications) > 0)
<div class="specs-section">
    <div class="container">
        <h3 class="text-center mb-5 text-uppercase fw-bold">SPECIFICATIONS</h3>
        
        {{-- Engine Specs --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="specs-title">
                    <i class="fas fa-cogs spec-icon"></i> Mesin
                </div>
            </div>
            <div class="col-md-12">
                @foreach([
                    'Tipe Mesin' => 'tipe_mesin',
                    'Jumlah Silinder' => 'jumlah_silinder', 
                    'Diameter x Langkah' => 'diameter_langkah',
                    'Kapasitas Mesin' => 'kapasitas_mesin',
                    'Daya Maksimum' => 'daya_maksimum',
                    'Torsi Maksimum' => 'torsi_maksimum',
                    'Sistem Starter' => 'sistem_starter',
                    'Sistem Pelumasan' => 'sistem_pelumasan',
                    'Kapasitas Oli Mesin' => 'kapasitas_oli_mesin',
                    'Sistem Bahan Bakar' => 'sistem_bahan_bakar',
                    'Tipe Kopling' => 'tipe_kopling',
                    'Tipe Transmisi' => 'tipe_transmisi',
                    'Perbandingan Kompresi' => 'perbandingan_kompresi'
                ] as $label => $key)
                    @if(isset($specifications[$key]) && !empty($specifications[$key]))
                    <div class="spec-row">
                        <div class="spec-label">{{ $label }}</div>
                        <div class="spec-value">: {{ $specifications[$key] }}</div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- Chassis Specs --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="specs-title">
                    <i class="fas fa-motorcycle spec-icon"></i> Rangka
                </div>
            </div>
            <div class="col-md-12">
                @foreach([
                    'Tipe Rangka' => 'tipe_rangka',
                    'Suspensi Depan' => 'suspensi_depan',
                    'Suspensi Belakang' => 'suspensi_belakang',
                    'Tipe Ban' => 'tipe_ban',
                    'Ban Depan' => 'ban_depan',
                    'Ban Belakang' => 'ban_belakang',
                    'Rem Depan' => 'rem_depan',
                    'Rem Belakang' => 'rem_belakang'
                ] as $label => $key)
                    @if(isset($specifications[$key]) && !empty($specifications[$key]))
                    <div class="spec-row">
                        <div class="spec-label">{{ $label }}</div>
                        <div class="spec-value">: {{ $specifications[$key] }}</div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- Dimensions --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="specs-title">
                    <i class="fas fa-ruler-combined spec-icon"></i> Dimensi
                </div>
            </div>
            <div class="col-md-12">
                @foreach([
                    'Kapasitas Tangki Bensin' => 'kapasitas_tangki_bensin',
                    'PxLxT' => 'pxlxt',
                    'Jarak Sumbu Roda' => 'jarak_sumbu_roda',
                    'Jarak Terendah ke Tanah' => 'jarak_terendah_tanah',
                    'Tinggi Tempat Duduk' => 'tinggi_tempat_duduk',
                    'Berat Isi' => 'berat_isi'
                ] as $label => $key)
                    @if(isset($specifications[$key]) && !empty($specifications[$key]))
                    <div class="spec-row">
                        <div class="spec-label">{{ $label }}</div>
                        <div class="spec-value">: {{ $specifications[$key] }}</div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- Electrical --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="specs-title">
                    <i class="fas fa-bolt spec-icon"></i> Kelistrikan
                </div>
            </div>
            <div class="col-md-12">
                @foreach([
                    'Sistem Pengapian' => 'sistem_pengapian',
                    'Tipe Baterai' => 'tipe_baterai',
                    'Tipe Busi' => 'tipe_busi'
                ] as $label => $key)
                    @if(isset($specifications[$key]) && !empty($specifications[$key]))
                    <div class="spec-row">
                        <div class="spec-label">{{ $label }}</div>
                        <div class="spec-value">: {{ $specifications[$key] }}</div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@else
{{-- Debug section to see what's in specifications --}}
<div class="specs-section">
    <div class="container">
        <h3 class="text-center mb-5 text-uppercase fw-bold">SPECIFICATIONS</h3>
        <div class="text-center text-white">
            <p>Spesifikasi belum tersedia untuk motor ini.</p>
            @if(config('app.debug'))
            <small>Debug: {{ json_encode($specifications) }}</small>
            @endif
        </div>
    </div>
</div>
@endif

{{-- Related Motors --}}
<div class="related-section">
    <div class="container">
        <h4 class="text-center mb-5 fw-bold">Lihat Koleksi Lainnya</h4>
        <div class="row g-4">
            @foreach($relatedMotors as $related)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="{{ route('motor.detail', $related->motor) }}" class="text-decoration-none">
                    <div class="motor-card">
                        <div class="motor-image-container">
                            @php $image = $related->main_image ?: $related->image; @endphp
                            @if($image)
                                <img src="{{ asset('storage/'.$image) }}" class="motor-main-image" alt="{{ $related->full_name }}">
                            @else
                                <i class="fas fa-motorcycle fa-4x text-muted"></i>
                            @endif
                        </div>
                        
                        <div class="card-body">
                            <h5 class="motor-title">{{ $related->motor->name }}</h5>
                            <p class="motor-model">{{ $related->name }}</p>
                            <p class="motor-location">OTR Yogyakarta, Mulai Dari</p>
                            <p class="motor-price">{{ $related->formatted_price_otr }}</p>
                        </div>

                        <div class="btn-details">
                            Details
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Credit Calculator Modal --}}
<div class="modal fade" id="creditModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-calculator me-2"></i>Simulasi Kredit - {{ $motor->name }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="creditForm">
                    @php
                        $firstModel = $motor->models->first();
                        $motorPrice = $firstModel ? $firstModel->price_otr : $motor->price_otr;
                        $motorFormattedPrice = $firstModel ? $firstModel->formatted_price_otr : $motor->formatted_price_otr;
                        $motorDp = $firstModel ? $firstModel->price_dp : ($motorPrice * 0.2);
                    @endphp
                    <input type="hidden" id="motorPriceInput" value="{{ $motorPrice }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="motorPrice" class="form-label">Harga Motor</label>
                            <input type="text" class="form-control" id="motorPrice" 
                                   value="{{ $motorFormattedPrice }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="dpAmount" class="form-label">Uang Muka (DP)</label>
                            <input type="number" class="form-control" id="dpAmount" 
                                   value="{{ $motorDp ?: ($motorPrice * 0.2) }}" 
                                   min="0" max="{{ $motorPrice }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tenor" class="form-label">Tenor (Bulan)</label>
                            <select class="form-control" id="tenor">
                                <option value="12">12 Bulan</option>
                                <option value="24" selected>24 Bulan</option>
                                <option value="36">36 Bulan</option>
                                <option value="48">48 Bulan</option>
                                <option value="60">60 Bulan</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="button" class="btn btn-primary w-100 mt-4" onclick="calculateCredit()">
                                <i class="fas fa-calculator me-2"></i>Hitung
                            </button>
                        </div>
                    </div>
                </form>

                <div id="creditResult" class="mt-4" style="display: none;">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6 class="card-title">Hasil Simulasi:</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Cicilan per Bulan:</strong><br>
                                    <span class="text-primary h5" id="monthlyPayment">-</span>
                                </div>
                                <div class="col-md-4">
                                    <strong>Total Pembayaran:</strong><br>
                                    <span class="text-info h6" id="totalPayment">-</span>
                                </div>
                                <div class="col-md-4">
                                    <strong>Total Bunga:</strong><br>
                                    <span class="text-warning h6" id="totalInterest">-</span>
                                </div>
                            </div>
                            <small class="text-muted">
                                *Simulasi ini hanya perkiraan. Untuk informasi akurat, hubungi dealer.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="https://wa.me/6285641956326?text=Halo%20Yamaha%20Mataram%20Sakti,%20saya%20lihat%20di%20web%20dan%20ingin%20bertanya%20tentang%20simulasi%20kredit%20{{ urlencode($motor->name) }}" target="_blank" class="btn btn-success">
                    <i class="fab fa-whatsapp me-2"></i>Hubungi Dealer
                </a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentMotorPrice = {{ $firstModel ? $firstModel->price_otr : $motor->price_otr }};

    // Variant Navigation
    const variantTabs = document.querySelectorAll('.variant-tab');
    const prevBtn = document.getElementById('prevVariant');
    const nextBtn = document.getElementById('nextVariant');
    let currentActiveIndex = 0;

    // Find current active tab index
    variantTabs.forEach((tab, index) => {
        if (tab.classList.contains('active')) {
            currentActiveIndex = index;
        }
    });

    // Update navigation buttons visibility
    function updateNavButtons() {
        if (prevBtn && nextBtn) {
            prevBtn.style.opacity = currentActiveIndex === 0 ? '0.3' : '1';
            nextBtn.style.opacity = currentActiveIndex === variantTabs.length - 1 ? '0.3' : '1';
            
            prevBtn.disabled = currentActiveIndex === 0;
            nextBtn.disabled = currentActiveIndex === variantTabs.length - 1;
        }
    }

    // Previous variant
    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            if (currentActiveIndex > 0) {
                variantTabs[currentActiveIndex].classList.remove('active');
                currentActiveIndex--;
                variantTabs[currentActiveIndex].classList.add('active');
                updateNavButtons();
                
                // Trigger variant content update
                triggerVariantUpdate(variantTabs[currentActiveIndex]);
                
                // Add animation effect
                variantTabs[currentActiveIndex].style.transform = 'scale(1.05)';
                setTimeout(() => {
                    variantTabs[currentActiveIndex].style.transform = 'scale(1)';
                }, 200);
            }
        });
    }

    // Next variant
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            if (currentActiveIndex < variantTabs.length - 1) {
                variantTabs[currentActiveIndex].classList.remove('active');
                currentActiveIndex++;
                variantTabs[currentActiveIndex].classList.add('active');
                updateNavButtons();
                
                // Trigger variant content update
                triggerVariantUpdate(variantTabs[currentActiveIndex]);
                
                // Add animation effect
                variantTabs[currentActiveIndex].style.transform = 'scale(1.05)';
                setTimeout(() => {
                    variantTabs[currentActiveIndex].style.transform = 'scale(1)';
                }, 200);
            }
        });
    }

    // Initialize navigation buttons
    updateNavButtons();

    // Function to trigger variant content update (used by both tab clicks and navigation)
    function triggerVariantUpdate(tabElement) {
        // Get variant data from data attributes
        const variantName = tabElement.getAttribute('data-variant');
        const variantFullName = tabElement.getAttribute('data-fullname');
        const variantPrice = parseInt(tabElement.getAttribute('data-price'));
        const variantPriceFormatted = tabElement.getAttribute('data-price-formatted');
        const variantImage = tabElement.getAttribute('data-image');
        const variantColors = JSON.parse(tabElement.getAttribute('data-colors') || '[]');
        
        // Update motor image with fade effect
        const imgElement = document.getElementById('mainMotorImage');
        if (imgElement && variantImage) {
            imgElement.style.opacity = '0.3';
            setTimeout(() => {
                // Check if image starts with 'motors/' (placeholder) or is actual storage path
                if (variantImage.startsWith('motors/')) {
                    // Use current motor image as fallback for placeholder variants
                    imgElement.src = imgElement.src; // Keep current image
                } else {
                    imgElement.src = "{{ asset('storage/') }}/" + variantImage;
                }
                imgElement.style.opacity = '1';
            }, 300);
        }
        
        // Update motor name
        const motorNameElement = document.querySelector('.motor-model-name');
        if (motorNameElement && variantFullName) {
            motorNameElement.style.opacity = '0.5';
            setTimeout(() => {
                motorNameElement.textContent = variantFullName;
                motorNameElement.style.opacity = '1';
            }, 200);
        }
        
        // Update price
        const priceElement = document.getElementById('currentPrice');
        if (priceElement && variantPriceFormatted) {
            priceElement.style.transform = 'scale(0.8)';
            priceElement.style.opacity = '0.5';
            setTimeout(() => {
                priceElement.textContent = variantPriceFormatted;
                priceElement.style.transform = 'scale(1)';
                priceElement.style.opacity = '1';
                
                // Update credit calculator values
                document.getElementById('motorPrice').value = variantPriceFormatted;
                document.getElementById('motorPriceInput').value = variantPrice;
                document.getElementById('dpAmount').value = Math.round(variantPrice * 0.2);
                currentMotorPrice = variantPrice;
            }, 300);
        }
        
        // Update color options
        const colorOptionsWrapper = document.querySelector('.color-options-wrapper');
        const colorNameDisplay = document.getElementById('colorNameDisplay');
        
        if (colorOptionsWrapper && variantColors.length > 0) {
            // Fade out current colors
            colorOptionsWrapper.style.opacity = '0.3';
            
            setTimeout(() => {
                // Clear existing colors
                colorOptionsWrapper.innerHTML = '';
                
                // Add new colors
                variantColors.forEach((color, colorIndex) => {
                    const colorDiv = document.createElement('div');
                    colorDiv.className = 'color-variant-detail';
                    colorDiv.setAttribute('data-name', color.name);
                    colorDiv.setAttribute('data-price', variantPrice);
                    colorDiv.setAttribute('data-price-formatted', variantPriceFormatted);
                    colorDiv.title = color.name;
                    colorDiv.style.cursor = 'pointer';
                    
                    const colorSwatch = document.createElement('div');
                    colorSwatch.className = `color-swatch ${colorIndex === 0 ? 'active' : ''}`;
                    
                    // Handle gradient colors
                    if (color.code.includes('linear-gradient')) {
                        colorSwatch.style.background = color.code;
                    } else {
                        colorSwatch.style.backgroundColor = color.code;
                    }
                    
                    colorDiv.appendChild(colorSwatch);
                    colorOptionsWrapper.appendChild(colorDiv);
                    
                    // Add click event for new color
                    colorDiv.addEventListener('click', function() {
                        // Update color name
                        if (colorNameDisplay) {
                            colorNameDisplay.textContent = color.name;
                        }
                        
                        // Update active state
                        document.querySelectorAll('.color-swatch').forEach(swatch => swatch.classList.remove('active'));
                        colorSwatch.classList.add('active');
                    });
                });
                
                // Update color name to first color
                if (colorNameDisplay && variantColors[0]) {
                    colorNameDisplay.textContent = variantColors[0].name;
                }
                
                // Fade in new colors
                colorOptionsWrapper.style.opacity = '1';
            }, 400);
        }
    }

    // Variant tab click functionality with dynamic content update
    variantTabs.forEach((tab, index) => {
        tab.addEventListener('click', function() {
            // Remove active state from current tab
            variantTabs[currentActiveIndex].classList.remove('active');
            currentActiveIndex = index;
            this.classList.add('active');
            updateNavButtons();
            
            // Trigger variant content update
            triggerVariantUpdate(this);
            
            // Add animation effect to clicked tab
            this.style.transform = 'scale(1.05)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 200);
        });
    });

    // Color variant interaction
    document.querySelectorAll('.color-variant-detail').forEach(variant => {
        variant.addEventListener('click', function() {
            const newImage = this.getAttribute('data-image');
            const newPrice = this.getAttribute('data-price');
            const newPriceFormatted = this.getAttribute('data-price-formatted');
            const colorName = this.getAttribute('data-name');

            // 1. Update Image with fade effect
            if (newImage) {
                const imgElement = document.getElementById('mainMotorImage');
                imgElement.style.opacity = 0;
                setTimeout(() => {
                    imgElement.src = newImage;
                    imgElement.style.opacity = 1;
                }, 200);
            }

            // 2. Update Price
            if (newPrice) {
                document.getElementById('currentPrice').textContent = newPriceFormatted;
                document.getElementById('motorPrice').value = newPriceFormatted;
                document.getElementById('motorPriceInput').value = newPrice;
                document.getElementById('dpAmount').value = Math.round(newPrice * 0.2);
                currentMotorPrice = newPrice;
            }

            // 3. Update Color Name
            if(colorName) {
                document.getElementById('colorNameDisplay').textContent = colorName;
            }

            // 4. Update Active State
            document.querySelectorAll('.color-swatch').forEach(swatch => swatch.classList.remove('active'));
            this.querySelector('.color-swatch').classList.add('active');
        });
    });

    // Add smooth hover effects for variant tabs
    document.querySelectorAll('.variant-tab').forEach(tab => {
        tab.addEventListener('mouseenter', function() {
            if (!this.classList.contains('active')) {
                this.style.transform = 'scale(1.05)';
            }
        });
        
        tab.addEventListener('mouseleave', function() {
            if (!this.classList.contains('active')) {
                this.style.transform = 'scale(1)';
            }
        });
    });
});

function calculateCredit() {
    const motorPrice = parseInt(document.getElementById('motorPriceInput').value);
    const dpAmount = parseInt(document.getElementById('dpAmount').value);
    const tenor = parseInt(document.getElementById('tenor').value);
    
    // Simple calculation (you can adjust the interest rate)
    const interestRate = 0.12; // 12% per year
    const monthlyRate = interestRate / 12;
    const loanAmount = motorPrice - dpAmount;
    
    const monthlyPayment = loanAmount * (monthlyRate * Math.pow(1 + monthlyRate, tenor)) / (Math.pow(1 + monthlyRate, tenor) - 1);
    const totalPayment = (monthlyPayment * tenor) + dpAmount;
    const totalInterest = totalPayment - motorPrice;
    
    document.getElementById('monthlyPayment').textContent = 'Rp ' + Math.round(monthlyPayment).toLocaleString('id-ID');
    document.getElementById('totalPayment').textContent = 'Rp ' + Math.round(totalPayment).toLocaleString('id-ID');
    document.getElementById('totalInterest').textContent = 'Rp ' + Math.round(totalInterest).toLocaleString('id-ID');
    document.getElementById('creditResult').style.display = 'block';
}
</script>

@endsection