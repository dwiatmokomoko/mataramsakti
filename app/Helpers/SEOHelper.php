<?php

namespace App\Helpers;

class SEOHelper
{
    public static function generateTitle($title = null, $suffix = true)
    {
        $baseTitle = 'Dealer Yamaha Jogja Wates - Harga Motor 2026 OTR Jogja';
        
        if (!$title) {
            return $baseTitle;
        }
        
        if ($suffix) {
            return $title . ' | ' . $baseTitle;
        }
        
        return $title;
    }
    
    public static function generateDescription($description = null)
    {
        $defaultDescription = 'Dealer Yamaha Jogja Wates Kulon Progo - Jual motor Yamaha 2026 harga OTR Jogja termurah, promo DP 0%, cicilan ringan tanpa survey. Melayani Sleman, Bantul, Kulon Progo, Gunung Kidul. NMAX, Aerox, R15, Fazzio, XSR155 ready stock. Showroom Yamaha terlengkap di Yogyakarta.';
        
        return $description ?: $defaultDescription;
    }
    
    public static function generateKeywords($keywords = [])
    {
        $defaultKeywords = [
            // PRIMARY KEYWORDS - Paling Penting
            'dealer yamaha jogja',
            'yamaha jogja',
            'dealer yamaha wates',
            'yamaha wates',
            'dealer yamaha kulon progo',
            'yamaha kulon progo',
            
            // SECONDARY KEYWORDS - Lokasi Spesifik
            'dealer yamaha sleman',
            'dealer yamaha bantul',
            'dealer yamaha gunung kidul',
            'yamaha sleman',
            'yamaha bantul',
            'yamaha gunung kidul',
            'yamaha jogja kota',
            'yamaha yogyakarta',
            'dealer yamaha yogyakarta',
            
            // HARGA & TAHUN - Sangat Penting
            'harga motor yamaha jogja 2026',
            'harga motor yamaha wates 2026',
            'harga yamaha jogja 2026',
            'motor yamaha jogja 2026',
            'motor yamaha wates 2026',
            'harga otr yamaha jogja',
            'harga otr yamaha wates',
            'pricelist yamaha jogja 2026',
            'daftar harga yamaha jogja',
            
            // MODEL SPECIFIC + LOKASI
            'harga nmax jogja',
            'harga nmax wates',
            'harga aerox jogja',
            'harga aerox wates',
            'harga r15 jogja',
            'harga fazzio jogja',
            'harga xsr155 jogja',
            'harga lexi jogja',
            'harga xmax jogja',
            'harga mt15 jogja',
            
            // PROMO & KREDIT + LOKASI
            'promo yamaha jogja',
            'promo yamaha wates',
            'promo motor yamaha jogja 2026',
            'kredit motor yamaha jogja',
            'kredit motor yamaha wates',
            'dp motor yamaha jogja',
            'cicilan motor yamaha jogja',
            'kredit yamaha jogja tanpa survey',
            
            // SHOWROOM & DEALER
            'showroom yamaha jogja',
            'showroom yamaha wates',
            'dealer resmi yamaha jogja',
            'dealer resmi yamaha wates',
            'pusat yamaha jogja',
            'toko motor yamaha jogja',
            
            // AREA SPESIFIK JOGJA
            'yamaha jalan magelang',
            'yamaha jalan kaliurang',
            'yamaha depok sleman',
            'yamaha godean',
            'yamaha sewon bantul',
            'yamaha sentolo',
            'yamaha nanggulan',
            
            // LONG TAIL KEYWORDS
            'dealer yamaha terdekat jogja',
            'dealer yamaha terdekat wates',
            'beli motor yamaha di jogja',
            'beli motor yamaha di wates',
            'motor yamaha murah jogja',
            'motor yamaha murah wates',
            'yamaha jogja dp murah',
            'yamaha wates dp murah',
            
            // SERVICE & SPARE PART
            'service yamaha jogja',
            'service yamaha wates',
            'spare part yamaha jogja',
            'spare part yamaha wates',
            'bengkel yamaha jogja',
            'bengkel yamaha wates',
            
            // TARGET MARKET
            'motor yamaha untuk mahasiswa jogja',
            'kredit motor yamaha pns jogja',
            'motor yamaha ojol jogja',
            'motor yamaha karyawan jogja'
        ];
        
        $allKeywords = array_merge($defaultKeywords, $keywords);
        return implode(', ', array_unique($allKeywords));
    }
    
    public static function generateCanonicalUrl($url = null)
    {
        return $url ?: request()->url();
    }
    
    public static function generateOpenGraphData($data = [])
    {
        $defaults = [
            'title' => 'Dealer Yamaha Jogja Resmi - Harga Promo & Kredit Murah 2026',
            'description' => 'Dealer resmi Yamaha Jogja. Jual motor Yamaha terbaru 2026 dengan harga OTR Jogja terbaik, promo DP murah, cicilan 0%. Melayani Sleman, Bantul, Kulon Progo, Gunung Kidul.',
            'image' => asset('images/yamaha-og-image.jpg'),
            'url' => request()->url(),
            'type' => 'website',
            'site_name' => 'Yamaha Jogja'
        ];
        
        return array_merge($defaults, $data);
    }
    
    public static function generateTwitterCardData($data = [])
    {
        $defaults = [
            'card' => 'summary_large_image',
            'title' => 'Dealer Yamaha Jogja Resmi - Harga Promo & Kredit Murah 2026',
            'description' => 'Dealer resmi Yamaha Jogja. Jual motor Yamaha terbaru 2026 dengan harga OTR Jogja terbaik, promo DP murah, cicilan 0%.',
            'image' => asset('images/yamaha-twitter-card.jpg'),
            'site' => '@YamahaMotorID'
        ];
        
        return array_merge($defaults, $data);
    }
    
    public static function generateStructuredData($type = 'Organization', $data = [])
    {
        switch ($type) {
            case 'Organization':
                return [
                    '@context' => 'https://schema.org',
                    '@type' => 'Organization',
                    'name' => 'Yamaha Wates Kulon Progo',
                    'alternateName' => 'Dealer Yamaha Wates',
                    'url' => config('app.url'),
                    'logo' => asset('images/yamaha-logo.png'),
                    'description' => 'Dealer resmi Yamaha di Wates, Kulon Progo, Yogyakarta. Melayani penjualan motor Yamaha, service, spare part, dan aksesoris.',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => 'Jl. Raya Wates',
                        'addressLocality' => 'Wates',
                        'addressRegion' => 'Kulon Progo, D.I. Yogyakarta',
                        'postalCode' => '55611',
                        'addressCountry' => 'ID'
                    ],
                    'geo' => [
                        '@type' => 'GeoCoordinates',
                        'latitude' => '-7.8567',
                        'longitude' => '110.1594'
                    ],
                    'contactPoint' => [
                        '@type' => 'ContactPoint',
                        'telephone' => '+62-856-4195-6326',
                        'contactType' => 'customer service',
                        'areaServed' => 'ID',
                        'availableLanguage' => ['Indonesian', 'Javanese']
                    ],
                    'sameAs' => [
                        'https://www.facebook.com/YamahaMotorID',
                        'https://www.instagram.com/yamaha_motor_id',
                        'https://www.youtube.com/YamahaMotorID'
                    ]
                ];
                
            case 'Product':
                return array_merge([
                    '@context' => 'https://schema.org',
                    '@type' => 'Product',
                    'brand' => [
                        '@type' => 'Brand',
                        'name' => 'Yamaha'
                    ],
                    'manufacturer' => [
                        '@type' => 'Organization',
                        'name' => 'Yamaha Motor Co., Ltd.'
                    ]
                ], $data);
                
            case 'LocalBusiness':
                return array_merge([
                    '@context' => 'https://schema.org',
                    '@type' => 'MotorcycleDealer',
                    'name' => 'Yamaha Wates Kulon Progo',
                    'alternateName' => 'Dealer Yamaha Wates',
                    'url' => config('app.url'),
                    'description' => 'Dealer resmi Yamaha di Wates, Kulon Progo, Yogyakarta. Jual motor Yamaha terbaru, service berkala, spare part original, dan aksesoris.',
                    'image' => asset('images/yamaha-showroom.jpg'),
                    'priceRange' => 'Rp 15.000.000 - Rp 500.000.000',
                    'telephone' => '+62-856-4195-6326',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => 'Jl. Raya Wates',
                        'addressLocality' => 'Wates',
                        'addressRegion' => 'Kulon Progo, D.I. Yogyakarta',
                        'postalCode' => '55611',
                        'addressCountry' => 'ID'
                    ],
                    'geo' => [
                        '@type' => 'GeoCoordinates',
                        'latitude' => '-7.8567',
                        'longitude' => '110.1594'
                    ],
                    'openingHoursSpecification' => [
                        [
                            '@type' => 'OpeningHoursSpecification',
                            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                            'opens' => '08:00',
                            'closes' => '17:00'
                        ]
                    ],
                    'areaServed' => [
                        ['@type' => 'City', 'name' => 'Wates'],
                        ['@type' => 'City', 'name' => 'Sentolo'],
                        ['@type' => 'City', 'name' => 'Nanggulan'],
                        ['@type' => 'City', 'name' => 'Galur'],
                        ['@type' => 'City', 'name' => 'Lendah'],
                        ['@type' => 'City', 'name' => 'Pengasih'],
                        ['@type' => 'City', 'name' => 'Panjatan'],
                        ['@type' => 'City', 'name' => 'Girimulyo'],
                        ['@type' => 'City', 'name' => 'Kokap'],
                        ['@type' => 'City', 'name' => 'Kalibawang'],
                        ['@type' => 'City', 'name' => 'Samigaluh'],
                        ['@type' => 'City', 'name' => 'Kulon Progo']
                    ],
                    'paymentAccepted' => 'Cash, Credit Card, Bank Transfer, Leasing',
                    'currenciesAccepted' => 'IDR'
                ], $data);
                
            default:
                return $data;
        }
    }
}