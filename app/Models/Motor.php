<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = [
        'name',
        'category',
        'description',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
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
    public function getPriceOtrAttribute()
    {
        return $this->main_model ? $this->main_model->price_otr : 0;
    }

    public function getFormattedPriceOtrAttribute()
    {
        return $this->main_model ? $this->main_model->formatted_price_otr : 'Rp 0';
    }

    public function getImageAttribute()
    {
        return $this->main_model ? $this->main_model->image : null;
    }

    public function getMainImageAttribute()
    {
        return $this->main_model ? $this->main_model->main_image : null;
    }

    public function getSpecificationsAttribute()
    {
        return $this->main_model ? $this->main_model->specifications : [];
    }
}
