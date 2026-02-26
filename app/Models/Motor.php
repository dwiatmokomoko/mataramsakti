<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = [
        'name',
        'category',
        'description',
        'is_active',
        'is_featured',
        'model',
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
