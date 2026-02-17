@extends('layouts.app')

@section('seo')
    @php
        use App\Helpers\SEOHelper;
        
        // Generate location-specific title with 2026
        $motorTitle = $motor->name . ' Jogja - Harga OTR & Kredit Murah 2026';
        
        // Get price range
        $minPrice = $motor->models->min('price_otr');
        $maxPrice = $motor->models->max('price_otr');
        $priceText = $minPrice ? 'Rp ' . number_format($minPrice, 0, ',', '.') : 'harga terbaik';
        if ($minPrice && $maxPrice && $minPrice != $maxPrice) {
            $priceText .= ' - Rp ' . number_format($maxPrice, 0, ',', '.');
        }
        
        // Rich description with comprehensive info
        $motorDescription = "Jual {$motor->name} Yamaha di Jogja - Harga OTR Jogja 2026 mulai {$priceText}. " .
                           "Dealer resmi Yamaha Jogja melayani Sleman, Bantul, Kulon Progo, Gunung Kidul. " .
                           "Promo DP murah, cicilan 0%, kredit tanpa survey, angsuran ringan. " .
                           "Spesifikasi lengkap {$motor->name}, test drive gratis, trade-in, garansi resmi, dan layanan purna jual terpercaya. " .
                           "Showroom Yamaha terlengkap di Yogyakarta.";
        
        // Comprehensive location-specific keywords
        $motorKeywords = [
            // Model + Lokasi Utama
            strtolower($motor->name) . ' jogja',
            'yamaha ' . strtolower($motor->name) . ' jogja',
            'harga ' . strtolower($motor->name) . ' jogja',
            'harga ' . strtolower($motor->name) . ' jogja 2026',
            'harga otr ' . strtolower($motor->name) . ' jogja',
            'harga otr ' . strtolower($motor->name) . ' jogja 2026',
            
            // Model + Kabupaten
            strtolower($motor->name) . ' sleman',
            strtolower($motor->name) . ' bantul',
            strtolower($motor->name) . ' kulon progo',
            strtolower($motor->name) . ' wates',
            'yamaha ' . strtolower($motor->name) . ' sleman',
            'yamaha ' . strtolower($motor->name) . ' bantul',
            
            // Buying Intent
            'kredit ' . strtolower($motor->name) . ' jogja',
            'kredit yamaha ' . strtolower($motor->name) . ' jogja',
            'cicilan ' . strtolower($motor->name) . ' jogja',
            'dp ' . strtolower($motor->name) . ' jogja',
            'dp minim ' . strtolower($motor->name) . ' jogja',
            'angsuran ' . strtolower($motor->name) . ' jogja',
            'promo ' . strtolower($motor->name) . ' jogja',
            'promo yamaha ' . strtolower($motor->name) . ' jogja',
            'promo yamaha ' . strtolower($motor->name) . ' jogja 2026',
            'diskon ' . strtolower($motor->name) . ' jogja',
            
            // Specifications
            'spesifikasi ' . strtolower($motor->name),
            'spesifikasi ' . strtolower($motor->name) . ' 2026',
            'review ' . strtolower($motor->name) . ' jogja',
            'warna ' . strtolower($motor->name) . ' jogja',
            'warna baru ' . strtolower($motor->name) . ' 2026',
            
            // Category
            strtolower($motor->category) . ' yamaha jogja',
            'motor ' . strtolower($motor->category) . ' jogja',
            'motor ' . strtolower($motor->category) . ' terbaik jogja',
            
            // Dealer
            'dealer yamaha jogja',
            'dealer resmi yamaha jogja',
            'showroom yamaha jogja',
            
            // Long-tail
            'beli ' . strtolower($motor->name) . ' di jogja',
            'indent ' . strtolower($motor->name) . ' jogja',
            'test drive ' . strtolower($motor->name) . ' jogja',
            'simulasi kredit ' . strtolower($motor->name) . ' jogja',
            'syarat kredit ' . strtolower($motor->name) . ' jogja'
        ];
        
        $motorImage = $motor->models->first()?->image ? 
                     asset('storage/' . $motor->models->first()->image) : 
                     asset('images/yamaha-' . strtolower($motor->name) . '.jpg');
        
        // Enhanced structured data with location and offers
        $structuredData = [
            [
                '@context' => 'https://schema.org',
                '@type' => 'Product',
                'name' => $motor->name . ' Yamaha',
                'description' => $motorDescription,
                'brand' => [
                    '@type' => 'Brand',
                    'name' => 'Yamaha'
                ],
                'manufacturer' => [
                    '@type' => 'Organization',
                    'name' => 'Yamaha Motor Co., Ltd.'
                ],
                'category' => $motor->category,
                'image' => $motorImage,
                'url' => request()->url(),
                'sku' => 'YAMAHA-' . strtoupper($motor->name) . '-2026',
                'mpn' => strtoupper($motor->name),
                'releaseDate' => '2026-01-01'
            ],
            [
                '@context' => 'https://schema.org',
                '@type' => 'MotorcycleDealer',
                'name' => 'Dealer Yamaha Jogja',
                'description' => 'Dealer resmi Yamaha di Yogyakarta',
                'url' => config('app.url'),
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => 'Yogyakarta',
                    'addressRegion' => 'D.I. Yogyakarta',
                    'addressCountry' => 'ID',
                    'postalCode' => '55000'
                ],
                'geo' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => '-7.7956',
                    'longitude' => '110.3695'
                ],
                'areaServed' => [
                    'Yogyakarta', 'Sleman', 'Bantul', 'Kulon Progo', 'Gunung Kidul',
                    'Wates', 'Godean', 'Depok', 'Sewon', 'Sentolo', 'Nanggulan'
                ],
                'priceRange' => 'Rp 15.000.000 - Rp 500.000.000',
                'telephone' => '+62-856-4195-6326',
                'openingHours' => 'Mo-Su 08:00-17:00'
            ]
        ];
        
        // Add offers for each model
        if ($motor->models->count() > 0) {
            $offers = [];
            foreach ($motor->models as $model) {
                $offer = [
                    '@type' => 'Offer',
                    'name' => $model->full_name,
                    'price' => $model->price_otr,
                    'priceCurrency' => 'IDR',
                    'availability' => $model->is_active ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
                    'priceValidUntil' => '2026-12-31',
                    'itemCondition' => 'https://schema.org/NewCondition',
                    'seller' => [
                        '@type' => 'Organization',
                        'name' => 'Dealer Yamaha Jogja'
                    ],
                    'areaServed' => [
                        '@type' => 'City',
                        'name' => 'Yogyakarta, Sleman, Bantul, Kulon Progo, Gunung Kidul'
                    ]
                ];
                
                // Add specifications if available
                if ($model->specifications && count($model->specifications) > 0) {
                    $specs = $model->specifications;
                    if (isset($specs['kapasitas_mesin'])) {
                        $offer['additionalProperty'][] = [
                            '@type' => 'PropertyValue',
                            'name' => 'Kapasitas Mesin',
                            'value' => $specs['kapasitas_mesin']
                        ];
                    }
                    if (isset($specs['daya_maksimum'])) {
                        $offer['additionalProperty'][] = [
                            '@type' => 'PropertyValue',
                            'name' => 'Daya Maksimum',
                            'value' => $specs['daya_maksimum']
                        ];
                    }
                    if (isset($specs['torsi_maksimum'])) {
                        $offer['additionalProperty'][] = [
                            '@type' => 'PropertyValue',
                            'name' => 'Torsi Maksimum',
                            'value' => $specs['torsi_maksimum']
                        ];
                    }
                }
                
                $offers[] = $offer;
            }
            $structuredData[0]['offers'] = $offers;
        }
    @endphp
    
    <x-seo 
        :title="$motorTitle"
        :description="$motorDescription"
        :keywords="$motorKeywords"
        :image="$motorImage"
        type="product"
        :structured-data="$structuredData"
    />
@endsection

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
        <!-- Breadcrumb -->
        <x-breadcrumb :items="[
            ['title' => 'Motor Yamaha', 'url' => route('home') . '#motors'],
            ['title' => $motor->category],
            ['title' => $motor->name]
        ]" />
        
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-calculator me-2"></i>Simulasi Kredit - {{ $motor->name }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                @php
                    $firstModel = $motor->models->first();
                    $motorPrice = $firstModel ? $firstModel->price_otr : $motor->price_otr;
                    $motorFormattedPrice = $firstModel ? $firstModel->formatted_price_otr : $motor->formatted_price_otr;
                @endphp
                <input type="hidden" id="motorPriceInput" value="{{ $motorPrice }}">
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="motorPrice" class="form-label fw-bold">Harga Motor (OTR)</label>
                        <input type="text" class="form-control form-control-lg" id="motorPrice" 
                               value="{{ $motorFormattedPrice }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="dpAmount" class="form-label fw-bold">Uang Muka (DP)</label>
                        <input type="number" class="form-control form-control-lg" id="dpAmount" 
                               value="0" 
                               min="0" max="{{ $motorPrice }}"
                               placeholder="Masukkan DP">
                    </div>
                </div>

                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Pilih Paket Kredit:</strong> Klik pada salah satu paket di bawah untuk melihat detail cicilan
                </div>

                <div id="creditPackages" class="row g-3">
                    <!-- Paket kredit akan ditampilkan di sini -->
                </div>

                <div id="creditResult" class="mt-4" style="display: none;">
                    <div class="card border-primary">
                        <div class="card-header bg-primary text-white">
                            <h6 class="mb-0"><i class="fas fa-file-invoice-dollar me-2"></i>Detail Cicilan</h6>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-md-3">
                                    <div class="p-3 bg-light rounded">
                                        <small class="text-muted d-block mb-1">Tenor</small>
                                        <strong class="h5 text-primary" id="selectedTenor">-</strong>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 bg-light rounded">
                                        <small class="text-muted d-block mb-1">Cicilan/Bulan</small>
                                        <strong class="h5 text-success" id="monthlyPayment">-</strong>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 bg-light rounded">
                                        <small class="text-muted d-block mb-1">Total Bayar</small>
                                        <strong class="h6 text-info" id="totalPayment">-</strong>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 bg-light rounded">
                                        <small class="text-muted d-block mb-1">Total Bunga</small>
                                        <strong class="h6 text-warning" id="totalInterest">-</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <small class="text-muted">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    *Simulasi ini hanya perkiraan berdasarkan skema kredit Yamaha. Untuk informasi akurat dan proses pengajuan, silakan hubungi dealer kami.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Tutup
                </button>
                <a href="https://wa.me/6285641956326?text=Halo%20Yamaha%20Mataram%20Sakti,%20saya%20lihat%20di%20web%20dan%20ingin%20bertanya%20tentang%20simulasi%20kredit%20{{ urlencode($motor->name) }}" 
                   target="_blank" class="btn btn-success">
                    <i class="fab fa-whatsapp me-2"></i>Hubungi Dealer
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.credit-package-card {
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid #e0e0e0;
}

.credit-package-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-color: #1e3c72;
}

.credit-package-card.selected {
    border-color: #1e3c72;
    background-color: #f0f4ff;
}

.credit-package-card .badge {
    font-size: 0.9rem;
    padding: 0.5rem 1rem;
}

.credit-package-card .installment-amount {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e3c72;
}
</style>

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

// Tabel angsuran Yamaha berdasarkan PL YMS - JAN 2026
// Format: { dp: nilai_dp, installments: { 11: angsuran_11bln, 17: angsuran_17bln, ... } }
const installmentTables = {
    // Tabel untuk AEROX 155 (28.550.000)
    '28550000': [
        { dp: 2900000, installments: { 11: 2798000, 17: 1917000, 23: 1498000, 29: 1247000, 35: 1089000 } },
        { dp: 3000000, installments: { 11: 2788000, 17: 1910000, 23: 1492000, 29: 1243000, 35: 1085000 } },
        { dp: 3500000, installments: { 11: 2737000, 17: 1875000, 23: 1465000, 29: 1220000, 35: 1065000 } },
        { dp: 4000000, installments: { 11: 2686000, 17: 1848000, 23: 1438000, 29: 1198000, 35: 1046000 } },
        { dp: 4500000, installments: { 11: 2636000, 17: 1806000, 23: 1411000, 29: 1175000, 35: 1026000 } },
        { dp: 5000000, installments: { 11: 2585000, 17: 1771000, 23: 1384000, 29: 1153000, 35: 1007000 } },
        { dp: 5500000, installments: { 11: 2534000, 17: 1736000, 23: 1357000, 29: 1130000, 35: 987000 } },
        { dp: 6000000, installments: { 11: 2483000, 17: 1701000, 23: 1330000, 29: 1108000, 35: 967000 } },
        { dp: 6500000, installments: { 11: 2432000, 17: 1667000, 23: 1303000, 29: 1085000, 35: 948000 } },
        { dp: 7000000, installments: { 11: 2381000, 17: 1632000, 23: 1276000, 29: 1063000, 35: 928000 } },
        { dp: 7500000, installments: { 11: 2330000, 17: 1597000, 23: 1249000, 29: 1040000, 35: 909000 } },
        { dp: 8000000, installments: { 11: 2280000, 17: 1562000, 23: 1222000, 29: 1018000, 35: 889000 } },
        { dp: 8500000, installments: { 11: 2229000, 17: 1528000, 23: 1195000, 29: 995000, 35: 869000 } },
        { dp: 9000000, installments: { 11: 2178000, 17: 1493000, 23: 1167000, 29: 973000, 35: 850000 } },
        { dp: 9500000, installments: { 11: 2127000, 17: 1458000, 23: 1140000, 29: 950000, 35: 830000 } },
        { dp: 10000000, installments: { 11: 2076000, 17: 1423000, 23: 1113000, 29: 928000, 35: 811000 } },
        { dp: 10500000, installments: { 11: 2025000, 17: 1389000, 23: 1086000, 29: 905000, 35: 791000 } },
        { dp: 11000000, installments: { 11: 1975000, 17: 1354000, 23: 1059000, 29: 883000, 35: 771000 } },
        { dp: 11500000, installments: { 11: 1924000, 17: 1319000, 23: 1032000, 29: 860000, 35: 752000 } },
        { dp: 12000000, installments: { 11: 1873000, 17: 1284000, 23: 1005000, 29: 838000, 35: 732000 } },
        { dp: 12500000, installments: { 11: 1822000, 17: 1250000, 23: 978000, 29: 815000, 35: 712000 } },
        { dp: 13000000, installments: { 11: 1771000, 17: 1215000, 23: 951000, 29: 793000, 35: 693000 } },
        { dp: 13500000, installments: { 11: 1720000, 17: 1180000, 23: 924000, 29: 770000, 35: 673000 } },
        { dp: 14000000, installments: { 11: 1669000, 17: 1145000, 23: 897000, 29: 748000, 35: 654000 } },
        { dp: 14500000, installments: { 11: 1619000, 17: 1111000, 23: 869000, 29: 725000, 35: 634000 } },
        { dp: 15000000, installments: { 11: 1568000, 17: 1076000, 23: 842000, 29: 703000, 35: 614000 } },
        { dp: 15500000, installments: { 11: 1517000, 17: 1041000, 23: 815000, 29: 680000, 35: 595000 } },
        { dp: 16000000, installments: { 11: 1466000, 17: 1006000, 23: 788000, 29: 658000, 35: 575000 } },
        { dp: 16500000, installments: { 11: 1415000, 17: 972000, 23: 761000, 29: 635000, 35: 556000 } }
    ],
    // Tabel untuk AEROX 155 CYBERCITY (28.840.000)
    '28840000': [
        { dp: 2900000, installments: { 11: 2828000, 17: 1937000, 23: 1514000, 29: 1261000, 35: 1101000 } },
        { dp: 3000000, installments: { 11: 2818000, 17: 1930000, 23: 1508000, 29: 1256000, 35: 1097000 } },
        { dp: 3500000, installments: { 11: 2767000, 17: 1895000, 23: 1481000, 29: 1234000, 35: 1077000 } },
        { dp: 4000000, installments: { 11: 2716000, 17: 1861000, 23: 1454000, 29: 1211000, 35: 1057000 } },
        { dp: 4500000, installments: { 11: 2665000, 17: 1826000, 23: 1427000, 29: 1189000, 35: 1038000 } },
        { dp: 5000000, installments: { 11: 2614000, 17: 1791000, 23: 1400000, 29: 1166000, 35: 1018000 } },
        { dp: 5500000, installments: { 11: 2564000, 17: 1756000, 23: 1373000, 29: 1144000, 35: 999000 } },
        { dp: 6000000, installments: { 11: 2513000, 17: 1722000, 23: 1346000, 29: 1121000, 35: 979000 } },
        { dp: 6500000, installments: { 11: 2462000, 17: 1687000, 23: 1319000, 29: 1098000, 35: 959000 } },
        { dp: 7000000, installments: { 11: 2411000, 17: 1652000, 23: 1292000, 29: 1076000, 35: 940000 } },
        { dp: 7500000, installments: { 11: 2360000, 17: 1617000, 23: 1265000, 29: 1053000, 35: 920000 } },
        { dp: 8000000, installments: { 11: 2309000, 17: 1583000, 23: 1237000, 29: 1031000, 35: 901000 } },
        { dp: 8500000, installments: { 11: 2258000, 17: 1548000, 23: 1210000, 29: 1008000, 35: 881000 } },
        { dp: 9000000, installments: { 11: 2208000, 17: 1513000, 23: 1183000, 29: 986000, 35: 861000 } },
        { dp: 9500000, installments: { 11: 2157000, 17: 1478000, 23: 1156000, 29: 963000, 35: 842000 } },
        { dp: 10000000, installments: { 11: 2106000, 17: 1444000, 23: 1129000, 29: 941000, 35: 822000 } },
        { dp: 10500000, installments: { 11: 2055000, 17: 1409000, 23: 1102000, 29: 918000, 35: 802000 } },
        { dp: 11000000, installments: { 11: 2004000, 17: 1374000, 23: 1075000, 29: 896000, 35: 783000 } },
        { dp: 11500000, installments: { 11: 1953000, 17: 1339000, 23: 1048000, 29: 873000, 35: 763000 } },
        { dp: 12000000, installments: { 11: 1903000, 17: 1305000, 23: 1021000, 29: 860000, 35: 744000 } },
        { dp: 12500000, installments: { 11: 1860000, 17: 1270000, 23: 994000, 29: 828000, 35: 724000 } },
        { dp: 13000000, installments: { 11: 1809000, 17: 1235000, 23: 967000, 29: 806000, 35: 704000 } },
        { dp: 13500000, installments: { 11: 1758000, 17: 1200000, 23: 940000, 29: 783000, 35: 685000 } },
        { dp: 14000000, installments: { 11: 1707000, 17: 1166000, 23: 912000, 29: 761000, 35: 665000 } },
        { dp: 14500000, installments: { 11: 1656000, 17: 1131000, 23: 885000, 29: 738000, 35: 646000 } },
        { dp: 15000000, installments: { 11: 1605000, 17: 1096000, 23: 858000, 29: 716000, 35: 626000 } },
        { dp: 15500000, installments: { 11: 1554000, 17: 1062000, 23: 831000, 29: 693000, 35: 606000 } },
        { dp: 16000000, installments: { 11: 1503000, 17: 1027000, 23: 804000, 29: 671000, 35: 587000 } },
        { dp: 16500000, installments: { 11: 1452000, 17: 992000, 23: 777000, 29: 648000, 35: 567000 } }
    ]
};

function getInstallmentTable(motorPrice) {
    // Cari tabel yang exact match atau paling mendekati harga motor
    const priceStr = motorPrice.toString();
    
    // Cek exact match dulu
    if (installmentTables[priceStr]) {
        return installmentTables[priceStr];
    }
    
    // Jika tidak ada exact match, cari yang paling dekat
    const priceKey = Object.keys(installmentTables).reduce((prev, curr) => {
        return Math.abs(parseInt(curr) - motorPrice) < Math.abs(parseInt(prev) - motorPrice) ? curr : prev;
    });
    
    return installmentTables[priceKey];
}

function findClosestDP(table, dpAmount) {
    // Cari DP yang paling mendekati dari tabel
    return table.reduce((prev, curr) => {
        return Math.abs(curr.dp - dpAmount) < Math.abs(prev.dp - dpAmount) ? curr : prev;
    });
}

function calculateInstallment(motorPrice, dp) {
    const table = getInstallmentTable(motorPrice);
    const closestEntry = findClosestDP(table, dp);
    
    return closestEntry;
}

function displayCreditPackages() {
    const motorPrice = parseInt(document.getElementById('motorPriceInput').value);
    const dpAmount = parseInt(document.getElementById('dpAmount').value) || 0;
    const packagesContainer = document.getElementById('creditPackages');
    
    // Validasi DP
    if (dpAmount < 0 || dpAmount > motorPrice) {
        packagesContainer.innerHTML = `
            <div class="col-12">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Mohon masukkan DP yang valid (0 - ${formatRupiah(motorPrice)})
                </div>
            </div>
        `;
        document.getElementById('creditResult').style.display = 'none';
        return;
    }
    
    // Cek DP minimum
    const table = getInstallmentTable(motorPrice);
    const minDP = table[0].dp;
    
    if (dpAmount < minDP) {
        packagesContainer.innerHTML = `
            <div class="col-12">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    DP minimum untuk motor ini adalah ${formatRupiah(minDP)}
                </div>
            </div>
        `;
        document.getElementById('creditResult').style.display = 'none';
        return;
    }
    
    // Dapatkan data angsuran berdasarkan DP
    const installmentData = calculateInstallment(motorPrice, dpAmount);
    const tenors = [11, 17, 23, 29, 35];
    
    packagesContainer.innerHTML = '';
    
    tenors.forEach((tenor) => {
        const installment = installmentData.installments[tenor];
        const totalPayment = (installment * tenor) + dpAmount;
        const totalInterest = totalPayment - motorPrice;
        const interestRate = 8.99; // Fixed rate 8.99%
        
        const packageCard = `
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="credit-package-card card h-100 p-3" 
                     onclick="selectPackage(${tenor}, ${installment}, ${totalPayment}, ${totalInterest})">
                    <div class="card-body text-center">
                        <div class="badge bg-primary mb-3">${tenor} Bulan</div>
                        <div class="installment-amount mb-2">
                            ${formatRupiah(installment)}
                        </div>
                        <small class="text-muted d-block mb-3">per bulan</small>
                        <hr>
                        <div class="small text-start">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Bunga:</span>
                                <strong>${interestRate}%</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Total Bayar:</span>
                                <strong class="text-primary">${formatRupiah(totalPayment)}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        packagesContainer.innerHTML += packageCard;
    });
    
    // Info DP yang digunakan
    if (installmentData.dp !== dpAmount) {
        const infoDiv = `
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Perhitungan menggunakan DP terdekat: ${formatRupiah(installmentData.dp)}
                </div>
            </div>
        `;
        packagesContainer.innerHTML = infoDiv + packagesContainer.innerHTML;
    }
}

function selectPackage(tenor, monthly, total, interest) {
    document.getElementById('selectedTenor').textContent = tenor + ' Bulan';
    document.getElementById('monthlyPayment').textContent = formatRupiah(monthly);
    document.getElementById('totalPayment').textContent = formatRupiah(total);
    document.getElementById('totalInterest').textContent = formatRupiah(interest);
    document.getElementById('creditResult').style.display = 'block';
    
    // Highlight selected package
    document.querySelectorAll('.credit-package-card').forEach(card => {
        card.classList.remove('selected');
    });
    event.currentTarget.classList.add('selected');
    
    // Smooth scroll to result
    document.getElementById('creditResult').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

function formatRupiah(amount) {
    return 'Rp ' + Math.round(amount).toLocaleString('id-ID');
}

// Event listener untuk perubahan DP
document.getElementById('dpAmount').addEventListener('input', function() {
    displayCreditPackages();
    document.getElementById('creditResult').style.display = 'none';
});

// Tampilkan paket kredit saat modal dibuka
document.getElementById('creditModal').addEventListener('shown.bs.modal', function() {
    displayCreditPackages();
});
</script>

{{-- Load Credit Simulator --}}
<script src="{{ asset('js/credit-simulator.js') }}"></script>

@endsection