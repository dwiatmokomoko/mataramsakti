<?php

namespace App\Helpers;

class SEOHelper
{
    public static function generateTitle($title = null, $suffix = true)
    {
        $baseTitle = 'Dealer Resmi Yamaha Jogja - Harga OTR Motor Yamaha 2026 Termurah';
        
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
        $defaultDescription = 'Dealer Resmi Yamaha Jogja - Showroom Motor Yamaha Terdekat. Harga OTR 2026 NMAX, Aerox, Fazzio, R15, XSR155 termurah. Promo DP 0%, kredit tanpa survey, cicilan ringan. Melayani Sleman, Bantul, Wates, Kulon Progo, Gunung Kidul. Sales Yamaha Jogja 24 Jam via WA. Ready stock semua tipe!';
        
        return $description ?: $defaultDescription;
    }
    
    public static function generateKeywords($keywords = [])
    {
        $defaultKeywords = [
            // I. KATA KUNCI UTAMA (High Volume & Buying Intent)
            'dealer resmi yamaha jogja',
            'showroom motor yamaha terdekat',
            'pusat penjualan yamaha yogyakarta',
            'dealer yamaha 3s jogja',
            'yamaha motor indonesia jogja',
            'marketing yamaha jogja online',
            'sales resmi yamaha jogja 24 jam',
            'kontak wa sales yamaha jogja',
            'alamat dealer yamaha paling lengkap di jogja',
            
            // Harga & Promo 2026
            'harga otr yamaha jogja 2026',
            'promo yamaha jogja 2026',
            'diskon akhir tahun yamaha jogja',
            'promo lebaran motor yamaha jogja',
            'voucher diskon pembelian motor yamaha jogja',
            'potongan harga cash yamaha jogja',
            'harga motor yamaha plat ab',
            'biaya balik nama yamaha jogja',
            
            // II. KATA KUNCI PRODUK (Model Specific)
            // MAXI
            'yamaha nmax turbo jogja',
            'harga nmax neo jogja',
            'kredit nmax turbo tech max jogja',
            'nmax generasi terbaru jogja',
            'aerox 155 connected abs jogja',
            'aerox cyber city jogja',
            'harga aerox standard jogja',
            'yamaha xmax tech max jogja',
            'harga xmax 250 connected jogja',
            'yamaha lexi lx 155 jogja',
            
            // CLASSY
            'yamaha fazzio hybrid connected jogja',
            'fazzio neo vs lux jogja',
            'harga fazzio warna mint jogja',
            'kredit fazzio dp ringan jogja',
            'yamaha grand filano hybrid connected jogja',
            'grand filano lux jogja',
            
            // SPORT
            'yamaha r15m connected abs jogja',
            'harga r25 jogja',
            'yamaha r15 v4 jogja',
            'yamaha mt-25 jogja',
            'yamaha mt-15 jogja',
            'yamaha xsr 155 jogja',
            'yamaha wr 155 r jogja',
            'harga motor trail yamaha jogja',
            
            // MOPED & MATIC ENTRY
            'yamaha gear 125 s version jogja',
            'yamaha mio m3 125 cw jogja',
            'yamaha fino grande 125 jogja',
            'yamaha x-ride 125 jogja',
            'yamaha jupiter z1 jogja',
            'yamaha vega force jogja',
            
            // III. KATA KUNCI GEO-SPATIAL (Micro-Local SEO)
            // Kabupaten & Kota
            'yamaha sleman',
            'yamaha bantul',
            'yamaha kulon progo',
            'yamaha wates',
            'yamaha gunung kidul',
            'yamaha wonosari',
            'yamaha kota yogyakarta',
            
            // Kecamatan/Area Padat
            'yamaha depok',
            'yamaha seturan',
            'yamaha gejayan',
            'yamaha godean',
            'yamaha kalasan',
            'yamaha jalan magelang',
            'yamaha jalan kaliurang',
            'yamaha jakal',
            'yamaha umbulharjo',
            'yamaha kotagede',
            'yamaha jetis',
            'yamaha malioboro',
            'yamaha gondokusuman',
            'yamaha sewon',
            'yamaha kasihan',
            'yamaha jalan parangtritis',
            'yamaha banguntapan',
            'yamaha imogiri',
            'yamaha prambanan',
            'yamaha tempel',
            'yamaha piyungan',
            
            // IV. KATA KUNCI FINANSIAL & KREDIT
            'kredit motor yamaha jogja',
            'cash tempo motor yamaha jogja',
            'arisan motor yamaha jogja',
            'kredit motor dp 0 jogja',
            'dp 500rb motor yamaha jogja',
            'angsuran 500 ribuan yamaha jogja',
            'tabel angsuran yamaha jogja terbaru',
            'kredit yamaha via baf jogja',
            'kredit yamaha adira jogja',
            'kredit yamaha wom finance jogja',
            'syarat kredit motor bca finance',
            'kredit motor ktp luar jogja',
            'kredit motor untuk anak kos jogja',
            'kredit motor tanpa slip gaji jogja',
            
            // V. KATA KUNCI BERBASIS PENGGUNA (Persona)
            'motor yamaha terbaik untuk mahasiswa jogja',
            'diskon motor mahasiswa ugm',
            'diskon motor mahasiswa uny',
            'diskon motor mahasiswa uii',
            'motor irit untuk kuliah jogja',
            'motor yamaha paling irit untuk grab jogja',
            'motor yamaha paling irit untuk gojek jogja',
            'skema kredit motor khusus ojol jogja',
            'motor yamaha untuk kurir paket jogja',
            'motor bagasi besar untuk belanja pasar jogja',
            'motor yamaha ringan untuk wanita jogja',
            'pilihan warna motor cewek yamaha jogja',
            
            // VI. KATA KUNCI SEMANTIK & LSI
            'teknologi blue core hybrid yamaha',
            'fitur y-connect yamaha',
            'vva variable valve actuation',
            'garansi rangka 5 tahun yamaha',
            'bengkel service injeksi yamaha jogja',
            'sparepart asli yamaha jogja',
            'oli yamalube asli jogja',
            'smart key system keyless yamaha',
            
            // VII. KATA KUNCI PERBANDINGAN
            'nmax vs pcx jogja',
            'fazzio vs scoopy jogja',
            'grand filano vs stylo jogja',
            'aerox vs vario 160 jogja',
            'kelebihan dan kekurangan yamaha gear 125',
            'perbandingan bunga leasing motor jogja',
            
            // VIII. LONG TAIL KEYWORDS
            'dealer yamaha terdekat yang buka hari minggu di jogja',
            'persyaratan kredit motor yamaha untuk karyawan kontrak di jogja',
            'berapa lama indent yamaha fazzio di jogja',
            'cara servis kunjung yamaha ke rumah di area sleman',
            'daftar harga motor matic yamaha termurah di jogja 2026',
            
            // TYPO KEYWORDS (untuk meta tag)
            'yamaha yogya',
            'diler yamaha jogja',
            'kredit ymaha jogja',
            'motor yamah jogja'
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