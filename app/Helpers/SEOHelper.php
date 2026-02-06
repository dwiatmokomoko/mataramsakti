<?php

namespace App\Helpers;

class SEOHelper
{
    public static function generateTitle($title = null, $suffix = true)
    {
        $baseTitle = 'Dealer Yamaha Jogja Resmi - Harga Promo & Kredit Murah 2026';
        
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
        $defaultDescription = 'Dealer resmi Yamaha Jogja - Jual motor Yamaha terbaru 2026 dengan harga OTR Jogja terbaik, promo DP murah, cicilan 0%, kredit tanpa survey. Melayani Sleman, Bantul, Kulon Progo, Gunung Kidul. Showroom Yamaha terlengkap di Yogyakarta dengan layanan purna jual terpercaya.';
        
        return $description ?: $defaultDescription;
    }
    
    public static function generateKeywords($keywords = [])
    {
        $defaultKeywords = [
            // Core Keywords
            'dealer yamaha jogja',
            'yamaha jogja',
            'motor yamaha jogja',
            'showroom yamaha jogja',
            'dealer resmi yamaha yogyakarta',
            'pusat motor yamaha jogja',
            
            // Geo-Targeting - Kota & Kabupaten
            'dealer yamaha sleman',
            'dealer yamaha bantul',
            'dealer yamaha kulon progo',
            'dealer yamaha gunung kidul',
            'yamaha jogja kota',
            
            // Geo-Targeting - Area Spesifik
            'yamaha wates',
            'dealer yamaha wates',
            'yamaha depok sleman',
            'yamaha jalan magelang',
            'yamaha jalan kaliurang',
            'yamaha godean',
            'yamaha sewon bantul',
            
            // Harga & Brosur
            'daftar harga motor yamaha jogja 2026',
            'pricelist yamaha jogja terbaru',
            'brosur kredit yamaha jogja',
            'harga otr yamaha jogja',
            'harga motor yamaha jogja 2026',
            
            // Promo & Diskon
            'promo motor yamaha jogja',
            'promo motor yamaha jogja bulan ini',
            'diskon dealer yamaha jogja',
            'cashback beli motor yamaha jogja',
            'promo yamaha jogja 2026',
            
            // Kredit & Angsuran
            'kredit motor murah jogja',
            'simulasi kredit motor yamaha jogja',
            'dp minim motor yamaha jogja',
            'angsuran ringan yamaha jogja',
            'kredit motor yamaha tanpa survey jogja',
            'syarat kredit motor yamaha jogja',
            'cicilan motor yamaha jogja',
            'kredit motor yamaha jogja',
            
            // Target Pasar Khusus
            'kredit motor mahasiswa jogja',
            'promo yamaha untuk mahasiswa jogja',
            'kredit motor untuk pns jogja',
            'kredit motor untuk karyawan jogja',
            'motor yamaha cocok untuk ojol jogja',
            'kredit syariah motor yamaha jogja',
            
            // Model Specific - MAXI
            'harga nmax jogja',
            'kredit yamaha nmax jogja',
            'harga aerox connected jogja',
            'yamaha xmax jogja',
            'yamaha lexi lx 155 jogja',
            'promo yamaha nmax jogja',
            
            // Model Specific - Classy
            'yamaha fazzio jogja',
            'harga grand filano jogja',
            'warna baru fazzio jogja',
            'indent grand filano jogja',
            
            // Model Specific - Sport & Moped
            'yamaha r15 connected jogja',
            'yamaha mt-15 jogja',
            'yamaha xsr 155 jogja',
            'yamaha wr 155 jogja',
            'yamaha jupiter z1 jogja',
            'yamaha vega force jogja',
            
            // Model Specific - Matic Entry
            'yamaha mio m3 jogja',
            'yamaha gear 125 jogja',
            'yamaha fino jogja',
            
            // Long-tail Keywords
            'dealer yamaha terdekat dari lokasi saya',
            'perbandingan nmax dan pcx jogja',
            'alamat dealer yamaha terlengkap di jogja',
            'cara pengajuan kredit motor yamaha online jogja',
            'testimoni pembelian di yamahajogja',
            'layanan service kunjung yamaha jogja',
            'bengkel resmi yamaha jogja',
            'service yamaha jogja',
            'spare part yamaha jogja',
            'spare part original yamaha jogja'
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