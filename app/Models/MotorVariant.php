<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MotorVariant extends Model
{
    protected $fillable = [
        'motor_model_id',
        'color_name',
        'color_code',
        'image',
        'price_difference',
        'is_available'
    ];

    protected $casts = [
        'price_difference' => 'decimal:0',
        'is_available' => 'boolean'
    ];

    public function motorModel()
    {
        return $this->belongsTo(MotorModel::class);
    }

    // Untuk backward compatibility
    public function motor()
    {
        return $this->motorModel->motor();
    }

    public function getFormattedPriceDifferenceAttribute()
    {
        if ($this->price_difference == 0) {
            return null;
        }
        
        $prefix = $this->price_difference > 0 ? '+' : '';
        return $prefix . 'Rp ' . number_format($this->price_difference, 0, ',', '.');
    }

    public function getFinalPriceAttribute()
    {
        return $this->motorModel->price_otr + $this->price_difference;
    }

    public function getFormattedFinalPriceAttribute()
    {
        return 'Rp ' . number_format($this->final_price, 0, ',', '.');
    }
}
