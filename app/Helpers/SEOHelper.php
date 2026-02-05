<?php

namespace App\Helpers;

class SEOHelper
{
    public static function generateTitle($title = null, $suffix = true)
    {
        $baseTitle = 'Yamaha Motor Indonesia - Dealer Resmi Yamaha';
        
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
        $defaultDescription = 'Dealer resmi Yamaha Motor Indonesia. Jual motor Yamaha terbaru dengan harga terbaik, cicilan 0%, dan layanan purna jual terpercaya. Temukan NMAX, R15, Aerox, dan motor Yamaha lainnya.';
        
        return $description ?: $defaultDescription;
    }
    
    public static function generateKeywords($keywords = [])
    {
        $defaultKeywords = [
            'yamaha motor indonesia',
            'dealer yamaha',
            'motor yamaha',
            'harga motor yamaha',
            'yamaha nmax',
            'yamaha r15',
            'yamaha aerox',
            'cicilan motor yamaha',
            'kredit motor yamaha',
            'service yamaha',
            'spare part yamaha'
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
            'title' => 'Yamaha Motor Indonesia - Dealer Resmi Yamaha',
            'description' => 'Dealer resmi Yamaha Motor Indonesia. Jual motor Yamaha terbaru dengan harga terbaik dan layanan terpercaya.',
            'image' => asset('images/yamaha-og-image.jpg'),
            'url' => request()->url(),
            'type' => 'website',
            'site_name' => 'Yamaha Motor Indonesia'
        ];
        
        return array_merge($defaults, $data);
    }
    
    public static function generateTwitterCardData($data = [])
    {
        $defaults = [
            'card' => 'summary_large_image',
            'title' => 'Yamaha Motor Indonesia - Dealer Resmi Yamaha',
            'description' => 'Dealer resmi Yamaha Motor Indonesia. Jual motor Yamaha terbaru dengan harga terbaik dan layanan terpercaya.',
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
                    'name' => 'Yamaha Motor Indonesia',
                    'url' => config('app.url'),
                    'logo' => asset('images/yamaha-logo.png'),
                    'description' => 'Dealer resmi Yamaha Motor Indonesia',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'addressCountry' => 'ID',
                        'addressLocality' => 'Indonesia'
                    ],
                    'contactPoint' => [
                        '@type' => 'ContactPoint',
                        'telephone' => '+62-21-12345678',
                        'contactType' => 'customer service'
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
                    'name' => 'Yamaha Motor Indonesia',
                    'url' => config('app.url'),
                    'description' => 'Dealer resmi Yamaha Motor Indonesia',
                    'priceRange' => 'Rp 15.000.000 - Rp 500.000.000'
                ], $data);
                
            default:
                return $data;
        }
    }
}