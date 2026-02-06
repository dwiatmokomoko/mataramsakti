<?php

namespace App\Helpers;

class SEOHelper
{
    public static function generateTitle($title = null, $suffix = true)
    {
        $baseTitle = 'Dealer Yamaha Wates Kulon Progo Jogja Sleman Bantul - Harga Motor 2026 Termurah OTR Jogja - Promo DP 0% Kredit Tanpa Survey';
        
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
        $defaultDescription = 'Dealer Yamaha Wates Kulon Progo Jogja - Showroom Motor Yamaha Terdekat di Wates. Harga OTR 2026 NMAX, Aerox, Fazzio, R15, XSR155 termurah se-Jogja. Promo DP 0%, kredit tanpa survey, cicilan ringan. Melayani Wates, Sentolo, Nanggulan, Galur, Pengasih, Sleman, Bantul, Gunung Kidul. Sales Yamaha 24 Jam WA 0856-4195-6326. Ready stock!';
        
        return $description ?: $defaultDescription;
    }
    
    public static function generateKeywords($keywords = [])
    {
        $defaultKeywords = [
            // ========================================
            // TIER 1: ULTRA HIGH PRIORITY - WATES & KULON PROGO
            // ========================================
            'dealer yamaha wates',
            'yamaha wates',
            'showroom yamaha wates',
            'motor yamaha wates',
            'dealer resmi yamaha wates',
            'dealer yamaha kulon progo',
            'yamaha kulon progo',
            'showroom yamaha kulon progo',
            'motor yamaha kulon progo',
            'dealer resmi yamaha kulon progo',
            'harga motor yamaha wates 2026',
            'harga motor yamaha kulon progo 2026',
            'harga otr yamaha wates',
            'harga otr yamaha kulon progo',
            'promo yamaha wates',
            'promo yamaha kulon progo',
            'kredit motor yamaha wates',
            'kredit motor yamaha kulon progo',
            'yamaha wates terdekat',
            'yamaha kulon progo terdekat',
            
            // Kecamatan di Kulon Progo (EXHAUSTIVE)
            'yamaha sentolo',
            'dealer yamaha sentolo',
            'yamaha nanggulan',
            'dealer yamaha nanggulan',
            'yamaha galur',
            'dealer yamaha galur',
            'yamaha lendah',
            'dealer yamaha lendah',
            'yamaha pengasih',
            'dealer yamaha pengasih',
            'yamaha panjatan',
            'dealer yamaha panjatan',
            'yamaha girimulyo',
            'dealer yamaha girimulyo',
            'yamaha kokap',
            'dealer yamaha kokap',
            'yamaha kalibawang',
            'dealer yamaha kalibawang',
            'yamaha samigaluh',
            'dealer yamaha samigaluh',
            'yamaha temon',
            'dealer yamaha temon',
            
            // ========================================
            // TIER 2: HIGH PRIORITY - JOGJA GENERAL
            // ========================================
            'dealer yamaha jogja',
            'yamaha jogja',
            'dealer resmi yamaha jogja',
            'showroom motor yamaha jogja',
            'showroom yamaha jogja',
            'pusat yamaha jogja',
            'motor yamaha jogja',
            'yamaha motor jogja',
            'dealer yamaha yogyakarta',
            'yamaha yogyakarta',
            'showroom yamaha yogyakarta',
            'harga motor yamaha jogja 2026',
            'harga otr yamaha jogja 2026',
            'promo yamaha jogja 2026',
            'kredit motor yamaha jogja',
            'yamaha jogja terdekat',
            
            // ========================================
            // TIER 3: SLEMAN AREA (EXHAUSTIVE)
            // ========================================
            'dealer yamaha sleman',
            'yamaha sleman',
            'showroom yamaha sleman',
            'yamaha depok sleman',
            'dealer yamaha depok',
            'yamaha seturan',
            'dealer yamaha seturan',
            'yamaha gejayan',
            'dealer yamaha gejayan',
            'yamaha godean',
            'dealer yamaha godean',
            'yamaha kalasan',
            'dealer yamaha kalasan',
            'yamaha jalan magelang',
            'dealer yamaha jalan magelang',
            'yamaha jalan kaliurang',
            'dealer yamaha jalan kaliurang',
            'yamaha jakal',
            'dealer yamaha jakal',
            'yamaha mlati',
            'dealer yamaha mlati',
            'yamaha gamping',
            'dealer yamaha gamping',
            'yamaha ngaglik',
            'dealer yamaha ngaglik',
            'yamaha seyegan',
            'dealer yamaha seyegan',
            'yamaha minggir',
            'dealer yamaha minggir',
            'yamaha moyudan',
            'dealer yamaha moyudan',
            'yamaha tempel',
            'dealer yamaha tempel',
            'yamaha turi',
            'dealer yamaha turi',
            'yamaha pakem',
            'dealer yamaha pakem',
            'yamaha cangkringan',
            'dealer yamaha cangkringan',
            'yamaha prambanan',
            'dealer yamaha prambanan',
            
            // ========================================
            // TIER 4: BANTUL AREA (EXHAUSTIVE)
            // ========================================
            'dealer yamaha bantul',
            'yamaha bantul',
            'showroom yamaha bantul',
            'yamaha sewon',
            'dealer yamaha sewon',
            'yamaha kasihan',
            'dealer yamaha kasihan',
            'yamaha jalan parangtritis',
            'dealer yamaha jalan parangtritis',
            'yamaha banguntapan',
            'dealer yamaha banguntapan',
            'yamaha imogiri',
            'dealer yamaha imogiri',
            'yamaha pandak',
            'dealer yamaha pandak',
            'yamaha bambanglipuro',
            'dealer yamaha bambanglipuro',
            'yamaha piyungan',
            'dealer yamaha piyungan',
            'yamaha pleret',
            'dealer yamaha pleret',
            'yamaha jetis bantul',
            'dealer yamaha jetis bantul',
            'yamaha sanden',
            'dealer yamaha sanden',
            'yamaha kretek',
            'dealer yamaha kretek',
            'yamaha pundong',
            'dealer yamaha pundong',
            'yamaha dlingo',
            'dealer yamaha dlingo',
            
            // ========================================
            // TIER 5: GUNUNG KIDUL AREA
            // ========================================
            'dealer yamaha gunung kidul',
            'yamaha gunung kidul',
            'yamaha wonosari',
            'dealer yamaha wonosari',
            'yamaha playen',
            'dealer yamaha playen',
            'yamaha gedangsari',
            'dealer yamaha gedangsari',
            'yamaha nglipar',
            'dealer yamaha nglipar',
            'yamaha semanu',
            'dealer yamaha semanu',
            
            // ========================================
            // TIER 6: KOTA YOGYAKARTA
            // ========================================
            'yamaha kota yogyakarta',
            'dealer yamaha kota yogyakarta',
            'yamaha umbulharjo',
            'dealer yamaha umbulharjo',
            'yamaha kotagede',
            'dealer yamaha kotagede',
            'yamaha jetis',
            'dealer yamaha jetis',
            'yamaha malioboro',
            'dealer yamaha malioboro',
            'yamaha gondokusuman',
            'dealer yamaha gondokusuman',
            'yamaha mergangsan',
            'dealer yamaha mergangsan',
            'yamaha mantrijeron',
            'dealer yamaha mantrijeron',
            'yamaha kraton',
            'dealer yamaha kraton',
            'yamaha pakualaman',
            'dealer yamaha pakualaman',
            'yamaha danurejan',
            'dealer yamaha danurejan',
            'yamaha gedongtengen',
            'dealer yamaha gedongtengen',
            'yamaha ngampilan',
            'dealer yamaha ngampilan',
            'yamaha wirobrajan',
            'dealer yamaha wirobrajan',
            'yamaha tegalrejo',
            'dealer yamaha tegalrejo',
            
            // ========================================
            // TIER 7: HARGA & PROMO (ULTRA SPECIFIC)
            // ========================================
            'harga nmax wates',
            'harga nmax kulon progo',
            'harga nmax jogja',
            'harga aerox wates',
            'harga aerox kulon progo',
            'harga aerox jogja',
            'harga fazzio wates',
            'harga fazzio kulon progo',
            'harga fazzio jogja',
            'harga r15 wates',
            'harga r15 kulon progo',
            'harga r15 jogja',
            'harga xsr155 wates',
            'harga xsr155 kulon progo',
            'harga xsr155 jogja',
            'harga lexi wates',
            'harga lexi kulon progo',
            'harga lexi jogja',
            'harga xmax wates',
            'harga xmax kulon progo',
            'harga xmax jogja',
            'harga mt15 wates',
            'harga mt15 kulon progo',
            'harga mt15 jogja',
            'harga grand filano wates',
            'harga grand filano kulon progo',
            'harga grand filano jogja',
            'harga gear 125 wates',
            'harga gear 125 kulon progo',
            'harga gear 125 jogja',
            'harga mio m3 wates',
            'harga mio m3 kulon progo',
            'harga mio m3 jogja',
            
            // Promo Spesifik
            'promo motor yamaha wates',
            'promo motor yamaha kulon progo',
            'promo motor yamaha jogja',
            'diskon yamaha wates',
            'diskon yamaha kulon progo',
            'diskon yamaha jogja',
            'cashback yamaha wates',
            'cashback yamaha kulon progo',
            'cashback yamaha jogja',
            
            // ========================================
            // TIER 8: KREDIT & FINANSIAL (ULTRA DETAILED)
            // ========================================
            'kredit motor yamaha wates',
            'kredit motor yamaha kulon progo',
            'kredit motor yamaha jogja',
            'kredit nmax wates',
            'kredit nmax kulon progo',
            'kredit nmax jogja',
            'kredit aerox wates',
            'kredit aerox kulon progo',
            'kredit aerox jogja',
            'dp 0 yamaha wates',
            'dp 0 yamaha kulon progo',
            'dp 0 yamaha jogja',
            'dp 500rb yamaha wates',
            'dp 500rb yamaha kulon progo',
            'dp 500rb yamaha jogja',
            'dp 1 juta yamaha wates',
            'dp 1 juta yamaha kulon progo',
            'dp 1 juta yamaha jogja',
            'angsuran 500rb yamaha wates',
            'angsuran 500rb yamaha kulon progo',
            'angsuran 500rb yamaha jogja',
            'angsuran 1 juta yamaha wates',
            'angsuran 1 juta yamaha kulon progo',
            'angsuran 1 juta yamaha jogja',
            'cicilan ringan yamaha wates',
            'cicilan ringan yamaha kulon progo',
            'cicilan ringan yamaha jogja',
            'kredit tanpa survey wates',
            'kredit tanpa survey kulon progo',
            'kredit tanpa survey jogja',
            'kredit motor ktp luar wates',
            'kredit motor ktp luar kulon progo',
            'kredit motor ktp luar jogja',
            
            // Leasing Spesifik
            'kredit yamaha baf wates',
            'kredit yamaha baf kulon progo',
            'kredit yamaha baf jogja',
            'kredit yamaha adira wates',
            'kredit yamaha adira kulon progo',
            'kredit yamaha adira jogja',
            'kredit yamaha wom finance wates',
            'kredit yamaha wom finance kulon progo',
            'kredit yamaha wom finance jogja',
            'kredit yamaha bca finance wates',
            'kredit yamaha bca finance kulon progo',
            'kredit yamaha bca finance jogja',
            
            // ========================================
            // TIER 9: MODEL SPECIFIC (EXHAUSTIVE)
            // ========================================
            // NMAX Series
            'yamaha nmax turbo wates',
            'yamaha nmax turbo kulon progo',
            'yamaha nmax turbo jogja',
            'nmax connected wates',
            'nmax connected kulon progo',
            'nmax connected jogja',
            'nmax tech max wates',
            'nmax tech max kulon progo',
            'nmax tech max jogja',
            
            // Aerox Series
            'aerox 155 connected wates',
            'aerox 155 connected kulon progo',
            'aerox 155 connected jogja',
            'aerox s version wates',
            'aerox s version kulon progo',
            'aerox s version jogja',
            
            // Fazzio Series
            'fazzio hybrid connected wates',
            'fazzio hybrid connected kulon progo',
            'fazzio hybrid connected jogja',
            'fazzio neo wates',
            'fazzio neo kulon progo',
            'fazzio neo jogja',
            
            // R Series
            'r15 connected wates',
            'r15 connected kulon progo',
            'r15 connected jogja',
            'r15 v4 wates',
            'r15 v4 kulon progo',
            'r15 v4 jogja',
            'r25 wates',
            'r25 kulon progo',
            'r25 jogja',
            
            // ========================================
            // TIER 10: PERSONA & USE CASE
            // ========================================
            'motor yamaha untuk mahasiswa wates',
            'motor yamaha untuk mahasiswa kulon progo',
            'motor yamaha untuk mahasiswa jogja',
            'motor yamaha untuk ojol wates',
            'motor yamaha untuk ojol kulon progo',
            'motor yamaha untuk ojol jogja',
            'motor yamaha untuk wanita wates',
            'motor yamaha untuk wanita kulon progo',
            'motor yamaha untuk wanita jogja',
            'motor yamaha irit wates',
            'motor yamaha irit kulon progo',
            'motor yamaha irit jogja',
            'motor yamaha matic wates',
            'motor yamaha matic kulon progo',
            'motor yamaha matic jogja',
            'motor yamaha sport wates',
            'motor yamaha sport kulon progo',
            'motor yamaha sport jogja',
            
            // ========================================
            // TIER 11: LONG TAIL QUESTIONS
            // ========================================
            'dealer yamaha terdekat dari wates',
            'dealer yamaha terdekat dari kulon progo',
            'dealer yamaha terdekat dari jogja',
            'alamat dealer yamaha di wates',
            'alamat dealer yamaha di kulon progo',
            'alamat dealer yamaha di jogja',
            'nomor telepon dealer yamaha wates',
            'nomor telepon dealer yamaha kulon progo',
            'nomor telepon dealer yamaha jogja',
            'jam buka dealer yamaha wates',
            'jam buka dealer yamaha kulon progo',
            'jam buka dealer yamaha jogja',
            'cara ke dealer yamaha wates',
            'cara ke dealer yamaha kulon progo',
            'cara ke dealer yamaha jogja',
            
            // ========================================
            // TIER 12: SERVICE & SPARE PART
            // ========================================
            'service yamaha wates',
            'service yamaha kulon progo',
            'service yamaha jogja',
            'bengkel yamaha wates',
            'bengkel yamaha kulon progo',
            'bengkel yamaha jogja',
            'spare part yamaha wates',
            'spare part yamaha kulon progo',
            'spare part yamaha jogja',
            'oli yamalube wates',
            'oli yamalube kulon progo',
            'oli yamalube jogja',
            
            // ========================================
            // TIER 13: COMPARISON KEYWORDS
            // ========================================
            'nmax vs pcx wates',
            'nmax vs pcx kulon progo',
            'nmax vs pcx jogja',
            'aerox vs vario wates',
            'aerox vs vario kulon progo',
            'aerox vs vario jogja',
            'fazzio vs scoopy wates',
            'fazzio vs scoopy kulon progo',
            'fazzio vs scoopy jogja',
            
            // ========================================
            // TIER 14: TYPO & VARIATIONS
            // ========================================
            'yamaha yogya',
            'yamaha yogyakarta',
            'diler yamaha wates',
            'diler yamaha kulon progo',
            'diler yamaha jogja',
            'dealer yama wates',
            'dealer yama kulon progo',
            'dealer yama jogja',
            
            // ========================================
            // TIER 15: BRAND & TRUST SIGNALS
            // ========================================
            'dealer resmi yamaha wates',
            'dealer resmi yamaha kulon progo',
            'dealer resmi yamaha jogja',
            'dealer 3s yamaha wates',
            'dealer 3s yamaha kulon progo',
            'dealer 3s yamaha jogja',
            'yamaha motor indonesia wates',
            'yamaha motor indonesia kulon progo',
            'yamaha motor indonesia jogja',
            'sales yamaha wates',
            'sales yamaha kulon progo',
            'sales yamaha jogja',
            'marketing yamaha wates',
            'marketing yamaha kulon progo',
            'marketing yamaha jogja',
            
            // ========================================
            // TIER 16: CONTACT & URGENCY
            // ========================================
            'wa dealer yamaha wates',
            'wa dealer yamaha kulon progo',
            'wa dealer yamaha jogja',
            'whatsapp yamaha wates',
            'whatsapp yamaha kulon progo',
            'whatsapp yamaha jogja',
            'kontak yamaha wates',
            'kontak yamaha kulon progo',
            'kontak yamaha jogja',
            'sales yamaha 24 jam wates',
            'sales yamaha 24 jam kulon progo',
            'sales yamaha 24 jam jogja',
            'ready stock yamaha wates',
            'ready stock yamaha kulon progo',
            'ready stock yamaha jogja',
            'indent yamaha wates',
            'indent yamaha kulon progo',
            'indent yamaha jogja'
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