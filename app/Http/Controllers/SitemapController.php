<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        // Main sitemap
        $sitemap .= $this->addSitemapEntry(route('sitemap.main'), now());
        
        // Motors sitemap
        $sitemap .= $this->addSitemapEntry(route('sitemap.motors'), now());
        
        $sitemap .= '</sitemapindex>';
        
        return response($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
    
    public function main()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";
        
        // Homepage
        $sitemap .= $this->addUrlEntry(route('home'), now(), 'daily', '1.0');
        
        // Contact page
        $sitemap .= $this->addUrlEntry(route('contact'), now(), 'monthly', '0.8');
        
        $sitemap .= '</urlset>';
        
        return response($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
    
    public function motors()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";
        
        $motors = Motor::with(['models.variants'])->where('is_active', true)->get();
        
        foreach ($motors as $motor) {
            $motorUrl = route('motor.detail', $motor);
            $lastmod = $motor->updated_at;
            
            $sitemap .= $this->addUrlEntry($motorUrl, $lastmod, 'weekly', '0.9');
            
            // Add images for this motor
            foreach ($motor->models as $model) {
                if ($model->image) {
                    $imageUrl = asset('storage/' . $model->image);
                    $sitemap .= $this->addImageEntry($imageUrl, $model->full_name);
                }
            }
            
            $sitemap .= '</url>' . "\n";
        }
        
        $sitemap .= '</urlset>';
        
        return response($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
    
    private function addSitemapEntry($url, $lastmod)
    {
        return '<sitemap>' . "\n" .
               '<loc>' . htmlspecialchars($url) . '</loc>' . "\n" .
               '<lastmod>' . $lastmod->toAtomString() . '</lastmod>' . "\n" .
               '</sitemap>' . "\n";
    }
    
    private function addUrlEntry($url, $lastmod, $changefreq = 'weekly', $priority = '0.5')
    {
        return '<url>' . "\n" .
               '<loc>' . htmlspecialchars($url) . '</loc>' . "\n" .
               '<lastmod>' . $lastmod->toAtomString() . '</lastmod>' . "\n" .
               '<changefreq>' . $changefreq . '</changefreq>' . "\n" .
               '<priority>' . $priority . '</priority>' . "\n";
    }
    
    private function addImageEntry($imageUrl, $caption)
    {
        return '<image:image>' . "\n" .
               '<image:loc>' . htmlspecialchars($imageUrl) . '</image:loc>' . "\n" .
               '<image:caption>' . htmlspecialchars($caption) . '</image:caption>' . "\n" .
               '</image:image>' . "\n";
    }
}