<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RobotsController extends Controller
{
    public function robots()
    {
        $robots = "User-agent: *\n";
        
        if (config('app.env') === 'production') {
            $robots .= "Allow: /\n";
            $robots .= "Disallow: /admin/\n";
            $robots .= "Disallow: /login\n";
            $robots .= "Disallow: /register\n";
            $robots .= "Disallow: /password/\n";
            $robots .= "Disallow: /api/\n";
            $robots .= "Disallow: /*.json$\n";
            $robots .= "Disallow: /*?*\n";
            $robots .= "\n";
            $robots .= "# Sitemap\n";
            $robots .= "Sitemap: " . route('sitemap.index') . "\n";
            $robots .= "\n";
            $robots .= "# Crawl-delay\n";
            $robots .= "Crawl-delay: 1\n";
        } else {
            $robots .= "Disallow: /\n";
        }
        
        return response($robots, 200, [
            'Content-Type' => 'text/plain'
        ]);
    }
}