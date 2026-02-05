@extends('layouts.app')

@section('title', 'Yamaha Motor Indonesia - Dealer Resmi')

@section('content')
<style>
/* =========================
   GLOBAL & HERO
   ========================= */
.hero-section {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #1e3c72 100%);
    background-size: 200% 200%;
    animation: subtleGradientShift 20s ease infinite;
    color: #fff;
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 30%, rgba(255,255,255,0.05) 0%, transparent 40%),
        radial-gradient(circle at 80% 70%, rgba(255,255,255,0.03) 0%, transparent 40%),
        linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.02) 50%, transparent 70%);
    animation: subtleOverlayMove 25s ease infinite;
    pointer-events: none;
}

.hero-section::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: repeating-linear-gradient(
        45deg,
        transparent,
        transparent 100px,
        rgba(255,255,255,0.01) 100px,
        rgba(255,255,255,0.01) 102px
    );
    animation: subtlePatternMove 30s linear infinite;
    pointer-events: none;
}

@keyframes subtleGradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

@keyframes subtleOverlayMove {
    0% { transform: translateX(0) translateY(0); }
    25% { transform: translateX(-10px) translateY(-5px); }
    50% { transform: translateX(5px) translateY(-10px); }
    75% { transform: translateX(-5px) translateY(5px); }
    100% { transform: translateX(0) translateY(0); }
}

@keyframes subtlePatternMove {
    0% { transform: translateX(0) translateY(0); }
    100% { transform: translateX(50px) translateY(50px); }
}

.hero-title {
    font-size: 2.8rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 15px;
    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
}

.hero-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
    font-weight: 500;
    text-shadow: 0 1px 5px rgba(0,0,0,0.2);
}

.hero-description {
    font-size: 1rem;
    opacity: 0.85;
    margin-bottom: 25px;
    max-width: 500px;
    text-shadow: 0 1px 3px rgba(0,0,0,0.2);
}

.hero-price-main {
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.2);
    padding: 10px 25px;
    border-radius: 50px;
    font-weight: 700;
    display: inline-block;
    backdrop-filter: blur(10px);
    margin-bottom: 20px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.hero-price-main:hover {
    background: rgba(255,255,255,0.2);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.hero-motor-image {
    max-height: 400px;
    width: auto;
    filter: drop-shadow(0 20px 40px rgba(0,0,0,0.3));
    animation: gentleFloat 8s ease-in-out infinite;
    transition: transform 0.3s ease;
}

.hero-motor-image:hover {
    transform: scale(1.02);
}

@keyframes gentleFloat {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    25% { transform: translateY(-10px) rotate(0.5deg); }
    50% { transform: translateY(-15px) rotate(0deg); }
    75% { transform: translateY(-10px) rotate(-0.5deg); }
}

/* Carousel Controls Enhancement */
.carousel-control-prev,
.carousel-control-next {
    width: 60px;
    height: 60px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.3);
    transition: all 0.3s ease;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
    background: rgba(255,255,255,0.3);
    transform: translateY(-50%) scale(1.1);
}

.carousel-control-prev {
    left: 20px;
}

.carousel-control-next {
    right: 20px;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 20px;
    height: 20px;
}

/* Carousel Indicators */
.carousel-indicators {
    bottom: 30px;
    margin-bottom: 0;
}

.carousel-indicators [data-bs-target] {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: rgba(255,255,255,0.4);
    border: 2px solid rgba(255,255,255,0.6);
    transition: all 0.3s ease;
    margin: 0 5px;
}

.carousel-indicators .active {
    background-color: #fff;
    border-color: #fff;
    transform: scale(1.2);
}

/* Carousel Item Animation */
.carousel-item {
    transition: transform 0.8s ease-in-out;
}

.carousel-item-next,
.carousel-item-prev,
.carousel-item.active {
    display: block;
}

.carousel-item-next:not(.carousel-item-start),
.active.carousel-item-end {
    transform: translateX(100%);
}

.carousel-item-prev:not(.carousel-item-end),
.active.carousel-item-start {
    transform: translateX(-100%);
}

/* =========================
   CARD DESIGN (SESUAI GAMBAR)
   ========================= */
.motor-card {
    background: white;
    border: none;
    border-radius: 25px; /* Radius besar sesuai gambar */
    box-shadow: 0 10px 40px rgba(0,0,0,0.08); /* Shadow lembut */
    transition: all 0.3s ease;
    overflow: hidden; /* Penting agar tombol tidak keluar border */
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
    padding: 15px 20px 50px 20px; /* Padding bawah besar untuk space tombol */
    flex-grow: 1;
}

.motor-title {
    font-size: 1.3rem;
    font-weight: 800; /* Bold tebal */
    color: #2c3e50;
    margin-bottom: 5px;
}

.motor-model {
    color: #1e3c72; /* Yamaha Blue */
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
    background-color: #1e3a8a; /* Biru Yamaha Gelap */
    color: white;
    border: none;
    padding: 12px 35px;
    font-weight: 600;
    font-size: 0.9rem;
    /* Membuat bentuk melengkung di kiri atas saja */
    border-top-left-radius: 25px; 
    border-bottom-right-radius: 0;
    transition: background 0.3s ease;
    text-decoration: none;
}

.btn-details:hover {
    background-color: #152c6b;
    color: white;
}

/* =========================
   FILTER & RESPONSIVE
   ========================= */
.category-filter {
    border-radius: 50px;
    padding: 8px 20px;
    font-size: 0.9rem;
    margin: 5px;
}

@media (max-width: 768px) {
    .hero-title { font-size: 2rem; }
    .motor-image-container { height: 180px; }
    .hero-motor-image { max-height: 250px; }
}
</style>

{{-- =======================
     HERO CAROUSEL
     ======================= --}}
@if($featuredMotors->count())
<section class="hero-section">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="8000">
        {{-- Carousel Indicators --}}
        <div class="carousel-indicators">
            @foreach($featuredMotors as $index => $motorModel)
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" 
                    class="{{ $index === 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>

        <div class="carousel-inner">
            @foreach($featuredMotors as $index => $motorModel)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 text-center text-lg-start z-1">
                            <span class="badge bg-warning text-dark mb-2 rounded-pill px-3">
                                <i class="fas fa-star me-1"></i>Unggulan
                            </span>
                            <h1 class="hero-title">{{ $motorModel->motor->name }}</h1>
                            <p class="hero-subtitle mb-3">{{ $motorModel->name }}</p>
                            <p class="hero-description d-none d-md-block">{{ Str::limit($motorModel->description, 100) }}</p>
                            
                            <div class="hero-price-main">
                                {{ $motorModel->formatted_price_otr }}
                            </div>
                            
                            <div class="d-block">
                                <a href="{{ route('motor.detail', $motorModel->motor) }}" class="btn btn-light rounded-pill px-4 fw-bold me-2">
                                    <i class="fas fa-eye me-2"></i>Lihat Detail
                                </a>
                                <a href="https://wa.me/6285641956326?text=Halo%20Yamaha%20Mataram%20Sakti,%20saya%20lihat%20di%20web%20dan%20ingin%20bertanya%20tentang%20{{ urlencode($motorModel->full_name) }}" target="_blank" class="btn btn-outline-light rounded-pill px-4 fw-bold">
                                    <i class="fab fa-whatsapp me-2"></i>Hubungi Dealer
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center mt-4 mt-lg-0">
                             @php $image = $motorModel->main_image ?: $motorModel->image; @endphp
                             @if($image)
                                <img src="{{ asset('storage/'.$image) }}" class="hero-motor-image" alt="{{ $motorModel->full_name }}">
                             @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        {{-- Carousel Controls --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
@endif

{{-- =======================
     SEARCH & FILTER SECTION
     ======================= --}}
<section class="py-5 bg-white border-bottom">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="input-group shadow-sm rounded-pill overflow-hidden">
                    <input type="text" class="form-control border-0 px-4 py-3" id="searchMotor" placeholder="Cari motor impian Anda...">
                    <select class="form-select border-0 bg-light" id="priceFilter" style="max-width: 200px;">
                        <option value="">Semua Harga</option>
                        <option value="0-25000000">< 25 Juta</option>
                        <option value="25000000-50000000">25 - 50 Juta</option>
                        <option value="50000000-999999999">> 50 Juta</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center flex-wrap" id="categoryButtons">
            <button class="btn btn-outline-dark category-filter active" data-category="all">Semua</button>
            <button class="btn btn-outline-dark category-filter" data-category="Maxi">Maxi</button>
            <button class="btn btn-outline-dark category-filter" data-category="Classy">Classy</button>
            <button class="btn btn-outline-dark category-filter" data-category="Matic">Matic</button>
            <button class="btn btn-outline-dark category-filter" data-category="Sport">Sport</button>
            <button class="btn btn-outline-dark category-filter" data-category="Moped">Moped</button>
        </div>
        
        <div id="filterLoading" class="text-center mt-3" style="display: none;">
            <div class="spinner-border spinner-border-sm text-primary" role="status"></div>
        </div>
    </div>
</section>

{{-- =======================
     MOTOR GRID (UPDATED)
     ======================= --}}
<section class="py-5 bg-light" id="motors">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Koleksi Motor Yamaha</h2>
            <p class="text-muted">Temukan motor yang sesuai gaya hidup Anda</p>
        </div>
        
        <div class="row g-4" id="motorsGrid">
            @foreach($allMotors as $motorModel)
            <div class="col-lg-4 col-md-6 motor-item" data-category="{{ $motorModel->motor->category }}" data-price="{{ $motorModel->price_otr }}">
                
                <a href="{{ route('motor.detail', $motorModel->motor) }}" class="text-decoration-none">
                    <div class="motor-card">
                        <div class="motor-image-container">
                            @php $image = $motorModel->main_image ?: $motorModel->image; @endphp
                            @if($image)
                                <img src="{{ asset('storage/'.$image) }}" class="motor-main-image" alt="{{ $motorModel->full_name }}">
                            @else
                                <i class="fas fa-motorcycle fa-4x text-muted"></i>
                            @endif
                        </div>
                        
                        <div class="card-body">
                            <h5 class="motor-title">{{ $motorModel->motor->name }}</h5>
                            <p class="motor-model">{{ $motorModel->name }}</p>
                            <p class="motor-location">OTR Yogyakarta, Mulai Dari</p>
                            <p class="motor-price">{{ $motorModel->formatted_price_otr }}</p>
                        </div>

                        <div class="btn-details">
                            Details
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div id="noResultsMessage" class="text-center py-5 d-none">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h5 class="text-muted">Motor tidak ditemukan</h5>
            <button class="btn btn-primary mt-2" onclick="resetFilters()">Reset Filter</button>
        </div>
    </div>
</section>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilters = document.querySelectorAll('.category-filter');
    const motorItems = document.querySelectorAll('.motor-item');
    const searchInput = document.getElementById('searchMotor');
    const priceFilter = document.getElementById('priceFilter');
    const noResultsMsg = document.getElementById('noResultsMessage');
    
    // Initialize Carousel
    const heroCarousel = document.getElementById('heroCarousel');
    if (heroCarousel) {
        const carousel = new bootstrap.Carousel(heroCarousel, {
            interval: 8000,
            wrap: true,
            keyboard: true,
            pause: 'hover'
        });

        // Add smooth transition effects
        heroCarousel.addEventListener('slide.bs.carousel', function (e) {
            const activeItem = e.target.querySelector('.carousel-item.active');
            const nextItem = e.relatedTarget;
            
            if (activeItem) {
                activeItem.style.opacity = '0.8';
            }
            if (nextItem) {
                nextItem.style.opacity = '1';
            }
        });

        heroCarousel.addEventListener('slid.bs.carousel', function (e) {
            const activeItem = e.target.querySelector('.carousel-item.active');
            if (activeItem) {
                activeItem.style.opacity = '1';
            }
        });
    }
    
    // Smooth Scroll
    function scrollToMotors() {
        const motorsSection = document.getElementById('motors');
        const offset = 80;
        const bodyRect = document.body.getBoundingClientRect().top;
        const elementRect = motorsSection.getBoundingClientRect().top;
        const elementPosition = elementRect - bodyRect;
        const offsetPosition = elementPosition - offset;

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }

    // Main Filter Function
    function filterMotors() {
        const activeCategory = document.querySelector('.category-filter.active')?.getAttribute('data-category') || 'all';
        const searchTerm = searchInput.value.toLowerCase();
        const priceRange = priceFilter.value;
        let visibleCount = 0;

        motorItems.forEach(item => {
            const category = item.getAttribute('data-category');
            const motorTitle = item.querySelector('.motor-title').textContent.toLowerCase();
            const motorModel = item.querySelector('.motor-model').textContent.toLowerCase();
            const name = motorTitle + ' ' + motorModel; // Gabungkan nama motor dan model untuk pencarian
            const price = parseInt(item.getAttribute('data-price') || 0);
            
            let show = true;

            // Filter Category
            if (activeCategory !== 'all' && category !== activeCategory) show = false;

            // Filter Search (cari di nama motor dan model)
            if (searchTerm && !name.includes(searchTerm)) show = false;

            // Filter Price
            if (priceRange) {
                const [min, max] = priceRange.split('-').map(Number);
                if (price < min || price > max) show = false;
            }

            if (show) {
                item.style.display = 'block';
                // Trigger reflow for animation
                setTimeout(() => item.style.opacity = '1', 50);
                visibleCount++;
            } else {
                item.style.display = 'none';
                item.style.opacity = '0';
            }
        });

        // Show/Hide No Results
        if (visibleCount === 0) {
            noResultsMsg.classList.remove('d-none');
        } else {
            noResultsMsg.classList.add('d-none');
        }
    }

    // Event Listeners
    categoryFilters.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            categoryFilters.forEach(b => b.classList.remove('active', 'btn-dark'));
            categoryFilters.forEach(b => b.classList.add('btn-outline-dark'));
            
            this.classList.remove('btn-outline-dark');
            this.classList.add('active', 'btn-dark'); // Highlight active button
            
            // Loading effect
            document.getElementById('filterLoading').style.display = 'block';
            setTimeout(() => {
                document.getElementById('filterLoading').style.display = 'none';
                filterMotors();
                scrollToMotors(); // Auto scroll to motors section
            }, 300);
        });
    });

    searchInput.addEventListener('input', filterMotors);
    priceFilter.addEventListener('change', filterMotors);

    window.resetFilters = function() {
        searchInput.value = '';
        priceFilter.value = '';
        document.querySelector('[data-category="all"]').click();
        scrollToMotors();
    };

    // Add fade-in animation for motor cards
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    motorItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(30px)';
        item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(item);
    });
});
</script>