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

// Add login route for Laravel's auth system
Route::get('/login', [AdminController::class, 'login'])->name('login');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('authenticate');
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        
        // Motor Management (Basic Info)
        Route::resource('motors', MotorController::class);
        
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
