<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MotorController;
use App\Http\Controllers\Admin\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/motor/{motor}', [App\Http\Controllers\MotorDetailController::class, 'show'])->name('motor.detail');
Route::post('/motor/{motor}/calculate-credit', [App\Http\Controllers\MotorDetailController::class, 'calculateCredit'])->name('motor.calculate-credit');

// SEO Routes
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap.index');
Route::get('/sitemap-main.xml', [App\Http\Controllers\SitemapController::class, 'main'])->name('sitemap.main');
Route::get('/sitemap-motors.xml', [App\Http\Controllers\SitemapController::class, 'motors'])->name('sitemap.motors');
Route::get('/robots.txt', [App\Http\Controllers\RobotsController::class, 'robots'])->name('robots');

// Location-Specific Pages for Local SEO
Route::get('/dealer-yamaha-wates', function () {
    return view('location-wates');
})->name('location.wates');

Route::get('/dealer-yamaha-kulon-progo', function () {
    return view('location-kulon-progo');
})->name('location.kulon-progo');

Route::get('/dealer-yamaha-sleman', function () {
    return view('location-sleman');
})->name('location.sleman');

Route::get('/dealer-yamaha-bantul', function () {
    return view('location-bantul');
})->name('location.bantul');

Route::get('/dealer-yamaha-gunung-kidul', function () {
    return view('location-gunung-kidul');
})->name('location.gunung-kidul');

Route::get('/dealer-yamaha-wonosari', function () {
    return view('location-wonosari');
})->name('location.wonosari');

// Add login route for Laravel's auth system
Route::get('/login', [AdminController::class, 'login'])->name('login');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('authenticate');
    
    // CSRF Token refresh route
    Route::get('/csrf-token', function () {
        return response()->json(['token' => csrf_token()]);
    })->middleware(['auth']);
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        
        // Motor Management (Basic Info)
        Route::resource('motors', MotorController::class);
        Route::delete('/motors/{motor}/ajax', [MotorController::class, 'destroyAjax'])->name('motors.destroy.ajax');
        
        // Motor Models Management
        Route::prefix('motors/{motor}/models')->name('motors.models.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\MotorModelController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\MotorModelController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\MotorModelController::class, 'store'])->name('store');
            Route::get('/{motorModel}', [App\Http\Controllers\Admin\MotorModelController::class, 'show'])->name('show');
            Route::get('/{motorModel}/edit', [App\Http\Controllers\Admin\MotorModelController::class, 'edit'])->name('edit');
            Route::put('/{motorModel}', [App\Http\Controllers\Admin\MotorModelController::class, 'update'])->name('update');
            Route::delete('/{motorModel}', [App\Http\Controllers\Admin\MotorModelController::class, 'destroy'])->name('destroy');
        });

        // Backward compatibility route for old admin structure
        Route::get('motors/{motor}/variants', function($motorId) {
            $motor = \App\Models\Motor::findOrFail($motorId);
            return redirect()->route('admin.motors.models.index', $motor);
        })->name('motors.variants.index');
        
        // Motor Variants (Colors) - Update route structure
        Route::prefix('motors/{motor}/models/{motorModel}/variants')->name('motors.models.variants.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\MotorVariantController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\MotorVariantController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\MotorVariantController::class, 'store'])->name('store');
            Route::get('/{variant}/edit', [App\Http\Controllers\Admin\MotorVariantController::class, 'edit'])->name('edit');
            Route::put('/{variant}', [App\Http\Controllers\Admin\MotorVariantController::class, 'update'])->name('update');
            Route::delete('/{variant}', [App\Http\Controllers\Admin\MotorVariantController::class, 'destroy'])->name('destroy');
        });
        
        // Company Management
        Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
        Route::get('/company/edit', [CompanyController::class, 'edit'])->name('company.edit');
        Route::put('/company', [CompanyController::class, 'update'])->name('company.update');
        
        // Testimonial Management
        Route::resource('testimonials', App\Http\Controllers\Admin\TestimonialController::class);
    });
});
