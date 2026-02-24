<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use App\Models\Motor;
use App\Models\MotorModel;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil motor models yang featured untuk hero carousel
        $featuredMotors = MotorModel::with(['motor', 'availableVariants'])
            ->where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Ambil semua motor models untuk grid
        $allMotors = MotorModel::with(['motor', 'availableVariants'])
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        $testimonials = Testimonial::with('motor')
            ->where('is_active', true)
            ->where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('featuredMotors', 'allMotors', 'testimonials'));
    }

    public function show(Motor $motor)
    {
        // Load motor dengan semua models dan variants
        $motor->load(['models.variants', 'models' => function($query) {
            $query->where('is_active', true)->orderBy('price_otr', 'asc');
        }]);
        
        // Ambil motor terkait berdasarkan kategori (ambil MotorModel, bukan Motor)
        $relatedMotors = MotorModel::with(['motor', 'availableVariants'])
            ->whereHas('motor', function($query) use ($motor) {
                $query->where('category', $motor->category)
                      ->where('id', '!=', $motor->id);
            })
            ->where('is_active', true)
            ->take(4)
            ->get();
            
        return view('motor-detail', compact('motor', 'relatedMotors'));
    }

    public function contact()
    {
        $company = CompanyInfo::first();
        return view('contact', compact('company'));
    }
    
    public function nmaxJogja()
    {
        return $this->motorLandingPage('NMAX', 'nmax-jogja');
    }
    
    public function aeroxJogja()
    {
        return $this->motorLandingPage('AEROX', 'aerox-jogja');
    }
    
    public function r15Jogja()
    {
        return $this->motorLandingPage('R15', 'r15-jogja');
    }
    
    public function vixionJogja()
    {
        return $this->motorLandingPage('VIXION', 'vixion-jogja');
    }
    
    public function xmaxJogja()
    {
        return $this->motorLandingPage('XMAX', 'xmax-jogja');
    }
    
    private function motorLandingPage($motorName, $viewName)
    {
        // Find motor by name
        $motor = Motor::where('name', 'LIKE', '%' . $motorName . '%')->first();
        
        if (!$motor) {
            // Fallback to first motor if not found
            $motor = Motor::first();
        }
        
        // Load all models and variants
        $motor->load(['models.variants', 'models' => function($query) {
            $query->where('is_active', true)->orderBy('price_otr', 'asc');
        }]);
        
        // Get all models for display
        $motorModels = $motor->models;
        
        // Get related motors (same category)
        $relatedMotors = MotorModel::with(['motor', 'availableVariants'])
            ->whereHas('motor', function($query) use ($motor) {
                $query->where('category', $motor->category)
                      ->where('id', '!=', $motor->id);
            })
            ->where('is_active', true)
            ->take(3)
            ->get();
        
        return view($viewName, compact('motor', 'motorModels', 'relatedMotors'));
    }
}
