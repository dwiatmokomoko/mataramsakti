<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MotorModel extends Model
{
    protected $fillable = [
        'motor_id',
        'name',
        'full_name',
        'description',
        'price_otr',
        'price_dp',
        'price_installment',
        'image',
        'specifications',
        'is_featured',
        'is_active'
    ];

    protected $casts = [
        'price_otr' => 'decimal:0',
        'price_dp' => 'decimal:0',
        'price_installment' => 'decimal:0',
        'specifications' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function motor()
    {
        return $this->belongsTo(Motor::class);
    }

    public function variants()
    {
        return $this->hasMany(MotorVariant::class);
    }

    public function availableVariants()
    {
        return $this->hasMany(MotorVariant::class)->where('is_available', true);
    }

    public function getFormattedPriceOtrAttribute()
    {
        return 'Rp ' . number_format($this->price_otr, 0, ',', '.');
    }

    public function getFormattedPriceDpAttribute()
    {
        return $this->price_dp ? 'Rp ' . number_format($this->price_dp, 0, ',', '.') : null;
    }

    public function getFormattedPriceInstallmentAttribute()
    {
        return $this->price_installment ? 'Rp ' . number_format($this->price_installment, 0, ',', '.') : null;
    }

    public function getMainImageAttribute()
    {
        // Jika ada variant dengan gambar, ambil yang pertama
        $variantWithImage = $this->variants()->whereNotNull('image')->first();
        if ($variantWithImage) {
            return $variantWithImage->image;
        }
        
        // Jika tidak ada, gunakan gambar model
        return $this->image;
    }
}