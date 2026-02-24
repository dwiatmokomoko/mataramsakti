@extends('layouts.app')

@section('seo')
    @php
        use App\Helpers\SEOHelper;
        
        $nmaxTitle = 'NMAX Jogja 2026 - Harga OTR Termurah Yamaha NMAX Jogja | DP 0% Cicilan Ringan | Yamaha Mataram Sakti';
        
        $nmaxDescription = '🏍️ NMAX JOGJA 2026 - Dealer Yamaha Mataram Sakti Jogja Wates Sleman Bantul Gunungkidul. ' .
                          '✅ Harga OTR NMAX Jogja Termurah mulai Rp 30 Jutaan. ' .
                          '✅ NMAX Turbo, NMAX Connected, NMAX Tech Max Ready Stock Semua Warna. ' .
                          '✅ Promo NMAX DP 0%, DP 500rb, DP 1 Juta, Kredit Tanpa Survey, Cicilan Ringan 500rb/bulan. ' .
                          '✅ Spesifikasi Lengkap NMAX 2026: Mesin 155cc VVA, ABS, Smart Key, Keyless, Connected Technology. ' .
                          '✅ Review NMAX Jogja, Perbandingan NMAX vs PCX, Test Drive Gratis, Trade-In Motor Lama. ' .
                          '✅ Melayani Wates, Sentolo, Nanggulan, Kulon Progo, Sleman, Depok, Godean, Bantul, Sewon, Kasihan, Gunungkidul, Wonosari. ' .
                          '📱 Sales Yamaha Mataram Sakti 24 Jam: 0856-4195-6326. Showroom Buka Setiap Hari 08:00-17:00. Garansi Resmi Yamaha Indonesia!';
        
        $nmaxKeywords = [
            // ULTRA HIGH PRIORITY - NMAX JOGJA
            'nmax jogja',
            'yamaha nmax jogja',
            'nmax jogja 2026',
            'yamaha nmax jogja 2026',
            'harga nmax jogja',
            'harga nmax jogja 2026',
            'harga otr nmax jogja',
            'harga otr nmax jogja 2026',
            'nmax mataram sakti',
            'nmax mataram sakti jogja',
            'yamaha nmax mataram sakti',
            
            // NMAX VARIANTS
            'nmax turbo jogja',
            'nmax connected jogja',
            'nmax tech max jogja',
            'yamaha nmax turbo jogja',
            'yamaha nmax connected jogja',
            
            // NMAX LOCATIONS
            'nmax wates',
            'nmax sleman',
            'nmax bantul',
            'nmax gunungkidul',
            'nmax kulon progo',
            'nmax wonosari',
            'dealer nmax jogja',
            'dealer yamaha nmax jogja',
            'showroom nmax jogja',
            
            // NMAX BUYING INTENT
            'beli nmax jogja',
            'beli yamaha nmax jogja',
            'jual nmax jogja',
            'kredit nmax jogja',
            'kredit yamaha nmax jogja',
            'cicilan nmax jogja',
            'dp nmax jogja',
            'dp 0 nmax jogja',
            'dp murah nmax jogja',
            'angsuran nmax jogja',
            'promo nmax jogja',
            'promo yamaha nmax jogja',
            'diskon nmax jogja',
            
            // NMAX SPECS & REVIEWS
            'spesifikasi nmax 2026',
            'review nmax jogja',
            'warna nmax 2026',
            'fitur nmax 2026',
            'teknologi nmax 2026',
            'nmax vs pcx jogja',
            'perbandingan nmax pcx jogja',
            'kelebihan nmax',
            'test drive nmax jogja',
            'simulasi kredit nmax jogja',
            'trade in nmax jogja',
            
            // LONG-TAIL NMAX
            'berapa harga nmax jogja',
            'berapa dp nmax jogja',
            'berapa cicilan nmax jogja',
            'dimana beli nmax jogja',
            'dealer nmax terdekat jogja',
            'nmax ready stock jogja',
            'nmax terbaru 2026 jogja',
        ];
    @endphp
    
    <x-seo 
        :title="$nmaxTitle"
        :suffix="false"
        :description="$nmaxDescription"
        :keywords="$nmaxKeywords"
        :image="$nmaxMotor->models->first()?->main_image ? asset('storage/' . $nmaxMotor->models->first()->main_image) : asset('images/nmax-jogja.jpg')"
        type="product"
    />
@endsection

@section('content')
<style>
.nmax-hero {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    color: white;
    padding: 80px 0 60px;
}
.nmax-badge {
    background: #ffd700;
    color: #1e3c72;
    padding: 8px 20px;
    border-radius: 50px;
    font-weight: 700;
    display: inline-block;
    margin-bottom: 20px;
}
.nmax-title {
    font-size: 3.5rem;
    font-weight: 900;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}
.nmax-subtitle {
    font-size: 1.5rem;
    opacity: 0.95;
    margin-bottom: 30px;
}
.nmax-price-box {
    background: rgba(255,255,255,0.15);
    border: 2px solid rgba(255,255,255,0.3);
    padding: 20px 40px;
    border-radius: 15px;
    display: inline-block;
    backdrop-filter: blur(10px);
    margin-bottom: 30px;
}
.nmax-price {
    font-size: 2.5rem;
    font-weight: 800;
    margin: 0;
}
.nmax-image {
    max-height: 450px;
    filter: drop-shadow(0 20px 40px rgba(0,0,0,0.4));
}
.feature-box {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    margin-bottom: 30px;
    transition: transform 0.3s;
}
.feature-box:hover {
    transform: translateY(-5px);
}
.feature-icon {
    font-size: 3rem;
    color: #1e3c72;
    margin-bottom: 15px;
}
.section-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: #1e3c72;
    margin-bottom: 40px;
    text-align: center;
}
.spec-table {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}
.spec-row {
    display: flex;
    border-bottom: 1px solid #e9ecef;
    padding: 15px 20px;
}
.spec-row:last-child {
    border-bottom: none;
}
.spec-label {
    width: 40%;
    font-weight: 600;
    color: #6c757d;
}
.spec-value {
    width: 60%;
    color: #2c3e50;
}
.promo-card {
    background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
    padding: 30px;
    border-radius: 15px;
    text-align: center;
    margin-bottom: 20px;
}
.promo-title {
    font-size: 1.8rem;
    font-weight: 800;
    color: #1e3c72;
    margin-bottom: 10px;
}
.faq-item {
    background: white;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 15px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}
.faq-question {
    font-weight: 700;
    color: #1e3c72;
    margin-bottom: 10px;
    font-size: 1.1rem;
}
.faq-answer {
    color: #6c757d;
    line-height: 1.6;
}
@media (max-width: 768px) {
    .nmax-title { font-size: 2.5rem; }
    .nmax-subtitle { font-size: 1.2rem; }
    .nmax-price { font-size: 2rem; }
}
</style>

{{-- NMAX HERO SECTION --}}
<section class="nmax-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-start">
                <div class="nmax-badge">
                    <i class="fas fa-star me-2"></i>BEST SELLER JOGJA
                </div>
                <h1 class="nmax-title">NMAX JOGJA 2026</h1>
                <p class="nmax-subtitle">Yamaha NMAX - Maxi Scooter Terlaris di Jogja</p>
                
                @php
                    $minPrice = $nmaxModels->min('price_otr');
                    $maxPrice = $nmaxModels->max('price_otr');
                @endphp
                
                <div class="nmax-price-box">
                    <p class="nmax-price">
                        @if($minPrice)
                            Rp {{ number_format($minPrice, 0, ',', '.') }}
                            @if($minPrice != $maxPrice)
                                - Rp {{ number_format($maxPrice, 0, ',', '.') }}
                            @endif
                        @else
                            Hubungi Dealer
                        @endif
                    </p>
                    <p class="mb-0" style="font-size: 1rem; opacity: 0.9;">Harga OTR Yogyakarta</p>
                </div>
                
                <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                    <a href="https://wa.me/6285641956326?text=Halo%20Yamaha%20Mataram%20Sakti,%20saya%20ingin%20bertanya%20tentang%20NMAX%20Jogja" 
                       target="_blank" 
                       class="btn btn-warning btn-lg px-5 fw-bold">
                        <i class="fab fa-whatsapp me-2"></i>Hubungi Dealer
                    </a>
                    <a href="#harga-nmax" class="btn btn-outline-light btn-lg px-5 fw-bold">
                        <i class="fas fa-tag me-2"></i>Lihat Harga
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center mt-4 mt-lg-0">
                @if($nmaxModels->first() && ($nmaxModels->first()->main_image || $nmaxModels->first()->image))
                    <img src="{{ asset('storage/' . ($nmaxModels->first()->main_image ?: $nmaxModels->first()->image)) }}" 
                         class="nmax-image img-fluid" 
                         alt="NMAX Jogja 2026">
                @endif
            </div>
        </div>
    </div>
</section>

{{-- PROMO SECTION --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">PROMO NMAX JOGJA 2026</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="promo-card">
                    <i class="fas fa-percent fa-3x mb-3" style="color: #1e3c72;"></i>
                    <h3 class="promo-title">DP 0%</h3>
                    <p class="mb-0">Kredit NMAX tanpa DP, langsung bawa pulang!</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="promo-card">
                    <i class="fas fa-money-bill-wave fa-3x mb-3" style="color: #1e3c72;"></i>
                    <h3 class="promo-title">DP 500rb</h3>
                    <p class="mb-0">Cicilan ringan mulai 500rb/bulan</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="promo-card">
                    <i class="fas fa-handshake fa-3x mb-3" style="color: #1e3c72;"></i>
                    <h3 class="promo-title">Kredit Tanpa Survey</h3>
                    <p class="mb-0">Proses cepat, approval mudah</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- HARGA NMAX SECTION --}}
<section class="py-5" id="harga-nmax">
    <div class="container">
        <h2 class="section-title">HARGA NMAX JOGJA 2026</h2>
        <div class="row justify-content-center">
            @foreach($nmaxModels as $model)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="feature-box text-center">
                    @if($model->main_image || $model->image)
                        <img src="{{ asset('storage/' . ($model->main_image ?: $model->image)) }}" 
                             class="img-fluid mb-3" 
                             style="max-height: 200px;"
                             alt="{{ $model->full_name }}">
                    @endif
                    <h4 class="fw-bold mb-3" style="color: #1e3c72;">{{ $model->name }}</h4>
                    <p class="text-muted mb-3">{{ $model->full_name }}</p>
                    <h3 class="fw-bold mb-3" style="color: #1e3c72;">{{ $model->formatted_price_otr }}</h3>
                    <a href="{{ route('motor.detail', $nmaxMotor) }}" class="btn btn-primary">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SPESIFIKASI NMAX SECTION --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">SPESIFIKASI NMAX 2026</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @php
                    $firstModel = $nmaxModels->first();
                    $specs = $firstModel ? $firstModel->specifications : [];
                @endphp
                @if($specs && count($specs) > 0)
                <div class="spec-table">
                    @foreach([
                        'Tipe Mesin' => 'tipe_mesin',
                        'Kapasitas Mesin' => 'kapasitas_mesin',
                        'Daya Maksimum' => 'daya_maksimum',
                        'Torsi Maksimum' => 'torsi_maksimum',
                        'Sistem Starter' => 'sistem_starter',
                        'Sistem Bahan Bakar' => 'sistem_bahan_bakar',
                        'Tipe Transmisi' => 'tipe_transmisi',
                        'Tipe Rangka' => 'tipe_rangka',
                        'Rem Depan' => 'rem_depan',
                        'Rem Belakang' => 'rem_belakang',
                        'Kapasitas Tangki' => 'kapasitas_tangki'
                    ] as $label => $key)
                        @if(isset($specs[$key]) && !empty($specs[$key]))
                        <div class="spec-row">
                            <div class="spec-label">{{ $label }}</div>
                            <div class="spec-value">{{ $specs[$key] }}</div>
                        </div>
                        @endif
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- FITUR UNGGULAN SECTION --}}
<section class="py-5">
    <div class="container">
        <h2 class="section-title">FITUR UNGGULAN NMAX 2026</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="feature-box text-center">
                    <i class="fas fa-microchip feature-icon"></i>
                    <h4 class="fw-bold mb-3">Smart Key System</h4>
                    <p class="text-muted">Sistem kunci pintar dengan teknologi keyless untuk kemudahan berkendara</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box text-center">
                    <i class="fas fa-wifi feature-icon"></i>
                    <h4 class="fw-bold mb-3">Y-Connect</h4>
                    <p class="text-muted">Konektivitas smartphone untuk monitoring motor secara real-time</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box text-center">
                    <i class="fas fa-shield-alt feature-icon"></i>
                    <h4 class="fw-bold mb-3">ABS System</h4>
                    <p class="text-muted">Anti-lock Braking System untuk keamanan pengereman maksimal</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box text-center">
                    <i class="fas fa-bolt feature-icon"></i>
                    <h4 class="fw-bold mb-3">VVA Engine</h4>
                    <p class="text-muted">Variable Valve Actuation untuk performa dan efisiensi optimal</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box text-center">
                    <i class="fas fa-tachometer-alt feature-icon"></i>
                    <h4 class="fw-bold mb-3">TFT Display</h4>
                    <p class="text-muted">Layar digital full color dengan informasi lengkap dan modern</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box text-center">
                    <i class="fas fa-box feature-icon"></i>
                    <h4 class="fw-bold mb-3">Bagasi Luas</h4>
                    <p class="text-muted">Kapasitas bagasi 25 liter, muat helm full face</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- WARNA NMAX SECTION --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">WARNA NMAX 2026</h2>
        <div class="row justify-content-center">
            @php
                $allVariants = collect();
                foreach($nmaxModels as $model) {
                    $allVariants = $allVariants->merge($model->availableVariants);
                }
                $uniqueColors = $allVariants->unique('color_name');
            @endphp
            @foreach($uniqueColors as $variant)
            <div class="col-md-3 col-6 mb-4">
                <div class="feature-box text-center">
                    @if($variant->image)
                        <img src="{{ asset('storage/' . $variant->image) }}" 
                             class="img-fluid mb-3" 
                             style="max-height: 150px;"
                             alt="{{ $variant->color_name }}">
                    @endif
                    <div class="mb-2">
                        <div style="width: 60px; height: 30px; background: {{ $variant->color_code ?? '#000' }}; border-radius: 5px; margin: 0 auto; border: 2px solid #ddd;"></div>
                    </div>
                    <h5 class="fw-bold mb-0">{{ $variant->color_name }}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ SECTION --}}
<section class="py-5">
    <div class="container">
        <h2 class="section-title">FAQ NMAX JOGJA</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-question-circle me-2"></i>Berapa harga NMAX Jogja 2026?
                    </div>
                    <div class="faq-answer">
                        Harga NMAX Jogja 2026 mulai dari Rp {{ $minPrice ? number_format($minPrice, 0, ',', '.') : '30 jutaan' }} untuk tipe standar. Harga bervariasi tergantung varian yang dipilih (NMAX Turbo, NMAX Connected, NMAX Tech Max).
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-question-circle me-2"></i>Berapa DP NMAX Jogja?
                    </div>
                    <div class="faq-answer">
                        DP NMAX Jogja sangat fleksibel! Tersedia promo DP 0%, DP 500rb, DP 1 juta, atau DP sesuai kemampuan Anda. Cicilan ringan mulai 500rb/bulan.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-question-circle me-2"></i>Dimana beli NMAX di Jogja?
                    </div>
                    <div class="faq-answer">
                        Beli NMAX di Yamaha Mataram Sakti, dealer resmi Yamaha di Jogja. Melayani Wates, Sleman, Bantul, Kulon Progo, Gunungkidul. Hubungi WA: 0856-4195-6326.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-question-circle me-2"></i>Apa kelebihan NMAX dibanding PCX?
                    </div>
                    <div class="faq-answer">
                        NMAX unggul di performa mesin VVA 155cc yang lebih bertenaga, fitur Smart Key System, Y-Connect, desain sporty, dan harga lebih terjangkau. Bagasi juga lebih luas untuk helm full face.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-question-circle me-2"></i>Apakah NMAX irit BBM?
                    </div>
                    <div class="faq-answer">
                        Ya! NMAX sangat irit dengan konsumsi BBM sekitar 35-40 km/liter berkat teknologi VVA dan Blue Core. Cocok untuk harian maupun touring jarak jauh.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-question-circle me-2"></i>Apakah NMAX ready stock di Jogja?
                    </div>
                    <div class="faq-answer">
                        NMAX ready stock semua varian dan warna di Yamaha Mataram Sakti Jogja. Bisa langsung test drive dan bawa pulang hari ini juga!
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-question-circle me-2"></i>Bagaimana cara kredit NMAX di Jogja?
                    </div>
                    <div class="faq-answer">
                        Kredit NMAX sangat mudah! Syarat: KTP, KK, Slip Gaji/Usaha. Proses cepat, approval dalam 1 hari. Tersedia leasing BAF, Adira, WOM Finance, BCA Finance. Kredit tanpa survey juga tersedia.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-question-circle me-2"></i>Apakah bisa trade-in motor lama untuk beli NMAX?
                    </div>
                    <div class="faq-answer">
                        Bisa! Yamaha Mataram Sakti menerima trade-in motor lama dengan harga terbaik. Motor lama Anda bisa jadi DP untuk NMAX baru.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- KENAPA PILIH NMAX SECTION --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">KENAPA PILIH NMAX JOGJA?</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="feature-box">
                    <h4 class="fw-bold mb-3" style="color: #1e3c72;">
                        <i class="fas fa-trophy me-2"></i>Best Seller Maxi Scooter
                    </h4>
                    <p class="text-muted mb-0">NMAX adalah maxi scooter terlaris di Indonesia dan Jogja. Terbukti kualitas dan kepercayaan ribuan pengguna.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="feature-box">
                    <h4 class="fw-bold mb-3" style="color: #1e3c72;">
                        <i class="fas fa-cogs me-2"></i>Teknologi Canggih
                    </h4>
                    <p class="text-muted mb-0">Dilengkapi Smart Key, Y-Connect, ABS, VVA, TFT Display. Teknologi terdepan untuk kenyamanan maksimal.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="feature-box">
                    <h4 class="fw-bold mb-3" style="color: #1e3c72;">
                        <i class="fas fa-gas-pump me-2"></i>Irit BBM
                    </h4>
                    <p class="text-muted mb-0">Konsumsi BBM 35-40 km/liter. Hemat untuk harian, cocok untuk touring jarak jauh.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="feature-box">
                    <h4 class="fw-bold mb-3" style="color: #1e3c72;">
                        <i class="fas fa-paint-brush me-2"></i>Desain Sporty & Elegan
                    </h4>
                    <p class="text-muted mb-0">Desain modern sporty dengan pilihan warna menarik. Tampil percaya diri di jalanan Jogja.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="feature-box">
                    <h4 class="fw-bold mb-3" style="color: #1e3c72;">
                        <i class="fas fa-wrench me-2"></i>Spare Part Mudah
                    </h4>
                    <p class="text-muted mb-0">Spare part original Yamaha tersedia lengkap. Service berkala di bengkel resmi Yamaha Mataram Sakti.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="feature-box">
                    <h4 class="fw-bold mb-3" style="color: #1e3c72;">
                        <i class="fas fa-chart-line me-2"></i>Nilai Jual Tinggi
                    </h4>
                    <p class="text-muted mb-0">NMAX memiliki resale value tinggi. Investasi motor yang menguntungkan untuk jangka panjang.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="feature-box">
                    <h4 class="fw-bold mb-3" style="color: #1e3c72;">
                        <i class="fas fa-users me-2"></i>Komunitas Besar
                    </h4>
                    <p class="text-muted mb-0">Bergabung dengan komunitas NMAX Jogja yang solid. Touring, gathering, dan event seru setiap bulan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA SECTION --}}
<section class="py-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
    <div class="container text-center text-white">
        <h2 class="fw-bold mb-4" style="font-size: 2.5rem;">Siap Miliki NMAX Jogja 2026?</h2>
        <p class="mb-4" style="font-size: 1.2rem; opacity: 0.9;">
            Hubungi Yamaha Mataram Sakti sekarang juga! Dapatkan promo terbaik dan test drive gratis.
        </p>
        <div class="d-flex flex-wrap gap-3 justify-content-center">
            <a href="https://wa.me/6285641956326?text=Halo%20Yamaha%20Mataram%20Sakti,%20saya%20ingin%20bertanya%20tentang%20NMAX%20Jogja" 
               target="_blank" 
               class="btn btn-warning btn-lg px-5 fw-bold">
                <i class="fab fa-whatsapp me-2"></i>Chat WhatsApp
            </a>
            <a href="tel:+6285641956326" class="btn btn-outline-light btn-lg px-5 fw-bold">
                <i class="fas fa-phone me-2"></i>Telepon Sekarang
            </a>
            <a href="{{ route('motor.detail', $nmaxMotor) }}" class="btn btn-outline-light btn-lg px-5 fw-bold">
                <i class="fas fa-info-circle me-2"></i>Info Lengkap
            </a>
        </div>
        <div class="mt-4">
            <p class="mb-2" style="font-size: 1.1rem;">
                <i class="fas fa-map-marker-alt me-2"></i>Yamaha Mataram Sakti Jogja
            </p>
            <p class="mb-2">
                <i class="fas fa-clock me-2"></i>Buka Setiap Hari: 08:00 - 17:00 WIB
            </p>
            <p class="mb-0">
                <i class="fas fa-phone me-2"></i>Sales 24 Jam: 0856-4195-6326
            </p>
        </div>
    </div>
</section>

{{-- RELATED MOTORS --}}
@if($relatedMotors->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Motor Yamaha Lainnya</h2>
        <div class="row">
            @foreach($relatedMotors as $motorModel)
            <div class="col-md-4 mb-4">
                <a href="{{ route('motor.detail', $motorModel->motor) }}" class="text-decoration-none">
                    <div class="feature-box text-center">
                        @if($motorModel->main_image || $motorModel->image)
                            <img src="{{ asset('storage/' . ($motorModel->main_image ?: $motorModel->image)) }}" 
                                 class="img-fluid mb-3" 
                                 style="max-height: 200px;"
                                 alt="{{ $motorModel->full_name }}">
                        @endif
                        <h4 class="fw-bold mb-2" style="color: #1e3c72;">{{ $motorModel->motor->name }}</h4>
                        <p class="text-muted mb-2">{{ $motorModel->name }}</p>
                        <h5 class="fw-bold" style="color: #1e3c72;">{{ $motorModel->formatted_price_otr }}</h5>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
