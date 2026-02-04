<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_location',
        'motor_id',
        'testimonial',
        'rating',
        'customer_photo',
        'is_featured',
        'is_active'
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function motor()
    {
        return $this->belongsTo(Motor::class);
    }

    public function getStarsHtmlAttribute()
    {
        $stars = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $this->rating) {
                $stars .= '<i class="fas fa-star text-warning"></i>';
            } else {
                $stars .= '<i class="far fa-star text-warning"></i>';
            }
        }
        return $stars;
    }
}
