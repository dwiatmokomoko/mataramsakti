@extends('layouts.app')

@section('title', $seoTitle)
@section('meta_description', $seoDescription)
@section('meta_keywords', implode(', ', $seoKeywords))

@section('content')
<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="text-white mb-3">Dealer Yamaha {{ $location['name'] }}</h1>
                <p class="text-white-50 lead mb-4">
                    {{ $seoDescription }}
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="https://wa.me/6285641956326?text=Halo%20Yamaha%20Mataram%20Sakti,%20saya%20dari%20{{ $location['name'] }}%20ingin%20bertanya%20tentang%20motor%20Yamaha" 
                       class="btn btn-success btn-lg" target="_blank">
                        <i class="fab fa-whatsapp me-2"></i>Chat WhatsApp
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-map-marker-alt me-2"></i>Lihat Lokasi
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center mt-4 mt-lg-0">
                <div class="bg-white rounded-3 p-4 shadow">
                    <h5 class="mb-3">Informasi Lokasi</h5>
                    <p class="mb-2"><strong>Wilayah:</strong> {{ $location['full_name'] }}</p>
                    <p class="mb-2"><strong>Jarak:</strong> {{ $location['distance'] }}</p>
                    <p class="mb-0"><strong>Dealer:</strong> Yamaha Mataram Sakti Wates</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Motor Yamaha Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-3">Motor Yamaha untuk {{ $location['name'] }}</h2>
            <p class="text-muted">Pilihan motor Yamaha terbaik dengan harga OTR {{ $location['kabupaten'] }} 2026</p>
        </div>
        
        <div class="row g-4">
            @forelse($motors as $motor)
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('motor.detail', $motor->id) }}" class="text-decoration-none">
                    <div class="motor-card">
                        @php
                            $hasImage = false;
                            $imageUrl = '';
                            
                            // Try to get image from motor's models
                            if (method_exists($motor, 'models') && $motor->models && $motor->models->isNotEmpty()) {
                                $firstModel = $motor->models->first();
                                if ($firstModel && $firstModel->variants && $firstModel->variants->isNotEmpty()) {
                                    $firstVariant = $firstModel->variants->first();
                                    if ($firstVariant && $firstVariant->image) {
                                        $hasImage = true;
                                        $imageUrl = asset('storage/' . $firstVariant->image);
                                    }
                                }
                            }
                            
                            // Fallback to motor's own image
                            if (!$hasImage && $motor->image) {
                                $hasImage = true;
                                $imageUrl = asset('storage/' . $motor->image);
                            }
                        @endphp
                        
                        <div class="motor-image-container">
                            @if($hasImage)
                                <img src="{{ $imageUrl }}" 
                                     class="motor-main-image" 
                                     alt="{{ $motor->name }}">
                            @else
                                <div class="text-center text-muted">
                                    <i class="fas fa-motorcycle fa-4x mb-2"></i>
                                    <p>No Image</p>
                                </div>
                            @endif
                        </div>
                        
                        <div class="card-body">
                            <h5 class="motor-title">{{ $motor->name }}</h5>
                            <p class="motor-model">{{ $motor->category }}</p>
                            <p class="motor-location">{{ $location['kabupaten'] }}</p>
                            
                            @if($motor->price_otr)
                            <p class="motor-price">Rp {{ number_format($motor->price_otr, 0, ',', '.') }}</p>
                            @endif
                        </div>
                        
                        <span class="btn-details">Details</span>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada motor yang ditampilkan. Silakan hubungi kami untuk informasi lebih lanjut.
                </div>
            </div>
            @endforelse
        </div>
        
        <!-- Tombol Lihat Motor Lainnya -->
        <div class="text-center mt-5">
            <a href="{{ route('home') }}" class="btn btn-outline-primary btn-lg px-5">
                <i class="fas fa-motorcycle me-2"></i>Lihat Semua Motor Yamaha
            </a>
        </div>
    </div>
</section>

<style>
/* ========================= 
   CARD DESIGN (SESUAI HOME)
   ========================= */
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

/* TOMBOL STYLE POJOK KANAN BAWAH */
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

/* Responsive */
@media (max-width: 768px) {
    .motor-card {
        margin-bottom: 20px;
    }
    
    .motor-image-container {
        height: 180px;
    }
    
    .motor-title {
        font-size: 1.1rem;
    }
}
</style>

<!-- Keunggulan Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-3">Kenapa Pilih Yamaha Mataram Sakti?</h2>
            <p class="text-muted">Dealer resmi Yamaha terpercaya melayani {{ $location['full_name'] }}</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <div class="mb-3">
                        <i class="fas fa-certificate fa-3x text-primary"></i>
                    </div>
                    <h5>Dealer Resmi</h5>
                    <p class="text-muted small mb-0">Dealer resmi Yamaha dengan garansi resmi dan layanan terpercaya</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <div class="mb-3">
                        <i class="fas fa-tags fa-3x text-success"></i>
                    </div>
                    <h5>Harga Terbaik</h5>
                    <p class="text-muted small mb-0">Harga OTR {{ $location['kabupaten'] }} terbaik dengan promo menarik</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <div class="mb-3">
                        <i class="fas fa-credit-card fa-3x text-info"></i>
                    </div>
                    <h5>Kredit Mudah</h5>
                    <p class="text-muted small mb-0">DP murah, cicilan ringan, proses cepat untuk warga {{ $location['name'] }}</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <div class="mb-3">
                        <i class="fas fa-tools fa-3x text-warning"></i>
                    </div>
                    <h5>Service Berkala</h5>
                    <p class="text-muted small mb-0">Layanan service berkala dan spare part original Yamaha</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);">
    <div class="container text-center">
        <h2 class="text-white mb-3">Siap Beli Motor Yamaha di {{ $location['name'] }}?</h2>
        <p class="text-white-50 mb-4">Hubungi kami sekarang untuk konsultasi gratis dan penawaran terbaik</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="https://wa.me/6285641956326?text=Halo%20Yamaha%20Mataram%20Sakti,%20saya%20dari%20{{ $location['name'] }}%20ingin%20bertanya%20tentang%20motor%20Yamaha" 
               class="btn btn-success btn-lg" target="_blank">
                <i class="fab fa-whatsapp me-2"></i>Chat via WhatsApp
            </a>
            <a href="tel:+6285641956326" class="btn btn-outline-light btn-lg">
                <i class="fas fa-phone me-2"></i>Telepon Sekarang
            </a>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-3">Pertanyaan Umum</h2>
            <p class="text-muted">Jawaban untuk pertanyaan seputar dealer Yamaha {{ $location['name'] }}</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Apakah Yamaha Mataram Sakti melayani wilayah {{ $location['name'] }}?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, Yamaha Mataram Sakti melayani wilayah {{ $location['full_name'] }} dan sekitarnya. Kami siap membantu Anda dengan pembelian motor, kredit, service, dan spare part.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Berapa jarak dealer dari {{ $location['name'] }}?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Dealer Yamaha Mataram Sakti berjarak {{ $location['distance'] }}. Lokasi kami mudah dijangkau dan strategis.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Apakah bisa kredit motor untuk warga {{ $location['name'] }}?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Tentu bisa! Kami melayani kredit motor Yamaha untuk warga {{ $location['name'] }} dengan DP murah dan cicilan ringan. Proses cepat dan mudah.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Bagaimana cara menghubungi dealer?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Anda bisa menghubungi kami via WhatsApp di +62 856-4195-6326 atau telepon langsung. Tim kami siap melayani Anda.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
