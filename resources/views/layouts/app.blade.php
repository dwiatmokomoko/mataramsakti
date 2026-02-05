<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO Meta Tags -->
    @hasSection('seo')
        @yield('seo')
    @else
        <x-seo />
    @endif
    
    <!-- Preload Critical Resources -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" as="style">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Critical CSS -->
    <style>
        /* Critical above-the-fold styles */
        .navbar-brand img {
            height: 40px;
            width: auto;
        }
        .hero-section {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 0;
            margin: 0;
        }
        .motor-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .motor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .price-badge {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
        }
        .carousel-item img {
            height: 400px;
            object-fit: cover;
            width: 100%;
        }
        footer {
            background-color: #1e3c72;
            color: white;
        }
        .yamaha-blue {
            background-color: #1e3c72;
        }
        .yamaha-red {
            color: #e74c3c;
        }
        
        /* Performance optimizations */
        img {
            max-width: 100%;
            height: auto;
        }
        
        /* Loading optimization */
        .lazy {
            opacity: 0;
            transition: opacity 0.3s;
        }
        .lazy.loaded {
            opacity: 1;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Skip to main content for accessibility -->
    <a class="visually-hidden-focusable" href="#main-content">Skip to main content</a>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark yamaha-blue fixed-top" role="navigation" aria-label="Main navigation">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}" aria-label="Yamaha Motor Indonesia Homepage">
                <img src="https://www.yamaha-motor.co.id/web_new/shared/image/logo-sepeda-motor-yamaha-indonesia.png?1741327215" 
                     alt="Yamaha Motor Indonesia Logo" 
                     width="120" 
                     height="40"
                     loading="eager">
            </a>
            <button class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" 
                           href="{{ route('home') }}"
                           @if(request()->routeIs('home')) aria-current="page" @endif>
                            <i class="fas fa-home me-1" aria-hidden="true"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" 
                           href="{{ route('contact') }}"
                           @if(request()->routeIs('contact')) aria-current="page" @endif>
                            <i class="fas fa-phone me-1" aria-hidden="true"></i>Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main id="main-content" style="margin-top: 56px;" role="main">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-4 mt-5" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Yamaha Motor Indonesia</h5>
                    <p class="mb-2">Revs Your Heart - Dealer Resmi Yamaha</p>
                    <address class="mb-0">
                        <i class="fas fa-map-marker-alt me-2" aria-hidden="true"></i>
                        Indonesia
                    </address>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="social-links mb-2">
                        <a href="https://www.facebook.com/YamahaMotorID" 
                           class="text-white me-3" 
                           aria-label="Facebook Yamaha Motor Indonesia"
                           target="_blank" 
                           rel="noopener noreferrer">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.instagram.com/yamaha_motor_id" 
                           class="text-white me-3" 
                           aria-label="Instagram Yamaha Motor Indonesia"
                           target="_blank" 
                           rel="noopener noreferrer">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.youtube.com/YamahaMotorID" 
                           class="text-white" 
                           aria-label="YouTube Yamaha Motor Indonesia"
                           target="_blank" 
                           rel="noopener noreferrer">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                        </a>
                    </div>
                    <p class="mb-0">&copy; {{ date('Y') }} Yamaha Motor Indonesia. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    
    <!-- Lazy Loading Script -->
    <script>
        // Lazy loading for images
        document.addEventListener('DOMContentLoaded', function() {
            const lazyImages = document.querySelectorAll('img.lazy');
            
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                            img.classList.add('loaded');
                            observer.unobserve(img);
                        }
                    });
                });
                
                lazyImages.forEach(img => imageObserver.observe(img));
            } else {
                // Fallback for older browsers
                lazyImages.forEach(img => {
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    img.classList.add('loaded');
                });
            }
        });
    </script>
    
    @stack('scripts')
    
    <!-- Google Analytics (replace with your tracking ID) -->
    @if(config('app.env') === 'production')
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_TRACKING_ID');
    </script>
    @endif
</body>
</html>