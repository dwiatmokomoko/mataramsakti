<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Motor extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'is_active',
        'is_featured',
        'price_otr',
        'price_dp',
        'price_installment',
        'image',
        'specifications'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'specifications' => 'array',
        'price_otr' => 'decimal:0',
        'price_dp' => 'decimal:0',
        'price_installment' => 'decimal:0'
    ];

    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug when creating
        static::creating(function ($motor) {
            if (empty($motor->slug)) {
                $motor->slug = static::generateUniqueSlug($motor->name);
            }
        });

        // Update slug when name changes
        static::updating(function ($motor) {
            if ($motor->isDirty('name') && empty($motor->slug)) {
                $motor->slug = static::generateUniqueSlug($motor->name, $motor->id);
            }
        });
    }

    /**
     * Generate unique slug from name
     */
    protected static function generateUniqueSlug($name, $ignoreId = null)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (static::slugExists($slug, $ignoreId)) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    /**
     * Check if slug exists
     */
    protected static function slugExists($slug, $ignoreId = null)
    {
        $query = static::where('slug', $slug);
        
        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }
        
        return $query->exists();
    }

    /**
     * Get route key name for route model binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function models()
    {
        return $this->hasMany(MotorModel::class);
    }

    public function activeModels()
    {
        return $this->hasMany(MotorModel::class)->where('is_active', true);
    }

    public function featuredModels()
    {
        return $this->hasMany(MotorModel::class)->where('is_featured', true)->where('is_active', true);
    }

    // Untuk backward compatibility dengan sistem lama
    public function variants()
    {
        return $this->hasManyThrough(MotorVariant::class, MotorModel::class);
    }

    public function availableVariants()
    {
        return $this->hasManyThrough(MotorVariant::class, MotorModel::class)->where('is_available', true);
    }

    // Ambil model utama (yang pertama atau yang featured)
    public function getMainModelAttribute()
    {
        return $this->featuredModels()->first() ?: $this->activeModels()->first();
    }

    // Untuk compatibility dengan view yang sudah ada
    public function getFormattedPriceOtrAttribute()
    {
        $price = $this->attributes['price_otr'] ?? 0;
        if (!$price && $this->main_model) {
            $price = $this->main_model->price_otr;
        }
        return 'Rp ' . number_format($price, 0, ',', '.');
    }

    public function getMainImageAttribute()
    {
        $image = $this->attributes['image'] ?? null;
        if ($image) {
            return $image;
        }
        return $this->main_model ? $this->main_model->main_image : null;
    }
}
