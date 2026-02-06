<?php

namespace App\Helpers;

class SEOHelper
{
    public static function generateTitle($title = null, $suffix = true)
    {
        $baseTitle = 'Yamaha Wates Kulon Progo - Dealer Resmi Yamaha Jogja';
        
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
        $defaultDescription = 'Dealer resmi Yamaha di Wates, Kulon Progo, Yogyakarta. Jual motor Yamaha terbaru dengan harga OTR Jogja terbaik, cicilan 0%, DP ringan, dan layanan purna jual terpercaya. Melayani wilayah Wates, Sentolo, Nanggulan, Galur, Lendah, Pengasih, Panjatan, Girimulyo, Kokap, Kalibawang, Samigaluh, dan sekitar Kulon Progo.';
        
        return $description ?: $defaultDescription;
    }
    
    public static function generateKeywords($keywords = [])
    {
        $defaultKeywords = [
            'yamaha wates',
            'dealer yamaha wates',
            'yamaha kulon progo',
            'dealer yamaha kulon progo',
            'motor yamaha jogja',
            'harga motor yamaha jogja',
            'yamaha yogyakarta',
            'dealer yamaha jogja',
            'motor yamaha wates',
            'harga otr jogja',
            'cicilan motor yamaha wates',
            'kredit motor yamaha kulon progo',
            'yamaha nmax wates',
            'yamaha aerox wates',
            'yamaha r15 kulon progo',
            'service yamaha wates',
            'spare part yamaha kulon progo',
            'dealer resmi yamaha wates',
            'showroom yamaha kulon progo'
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
            'title' => 'Yamaha Wates Kulon Progo - Dealer Resmi Yamaha Jogja',
            'description' => 'Dealer resmi Yamaha di Wates, Kulon Progo, Yogyakarta. Jual motor Yamaha terbaru dengan harga OTR Jogja terbaik, cicilan 0%, dan layanan terpercaya.',
            'image' => asset('images/yamaha-og-image.jpg'),
            'url' => request()->url(),
            'type' => 'website',
            'site_name' => 'Yamaha Wates Kulon Progo'
        ];
        
        return array_merge($defaults, $data);
    }
    
    public static function generateTwitterCardData($data = [])
    {
        $defaults = [
            'card' => 'summary_large_image',
            'title' => 'Yamaha Wates Kulon Progo - Dealer Resmi Yamaha Jogja',
            'description' => 'Dealer resmi Yamaha di Wates, Kulon Progo, Yogyakarta. Jual motor Yamaha terbaru dengan harga OTR Jogja terbaik, cicilan 0%, dan layanan terpercaya.',
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