<?php

namespace Database\Seeders;

use App\Models\Motor;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $motors = Motor::all();
        
        $testimonials = [
            [
                'customer_name' => 'Budi Santoso',
                'customer_location' => 'Jakarta',
                'motor_id' => $motors->where('name', 'NMAX TURBO')->first()?->id,
                'testimonial' => 'NMAX TURBO sangat nyaman untuk perjalanan harian. Irit bensin dan performa mesin sangat responsif. Pelayanan dealer juga sangat memuaskan!',
                'rating' => 5,
                'is_featured' => true,
                'is_active' => true
            ],
            [
                'customer_name' => 'Sari Dewi',
                'customer_location' => 'Bandung',
                'motor_id' => $motors->where('name', 'R15M')->first()?->id,
                'testimonial' => 'R15M adalah motor sport impian saya. Desainnya keren, performa tinggi, dan handling yang sangat baik. Recommended banget!',
                'rating' => 5,
                'is_featured' => true,
                'is_active' => true
            ],
            [
                'customer_name' => 'Ahmad Rizki',
                'customer_location' => 'Surabaya',
                'motor_id' => $motors->where('name', 'XMAX 250')->first()?->id,
                'testimonial' => 'XMAX 250 cocok untuk touring jarak jauh. Kenyamanan berkendara luar biasa dan fitur-fiturnya sangat lengkap.',
                'rating' => 5,
                'is_featured' => true,
                'is_active' => true
            ],
            [
                'customer_name' => 'Maya Putri',
                'customer_location' => 'Yogyakarta',
                'motor_id' => $motors->where('name', 'FreeGo')->first()?->id,
                'testimonial' => 'FreeGo sangat cocok untuk wanita. Ringan, mudah dikendarai, dan desainnya stylish. Harga juga terjangkau.',
                'rating' => 4,
                'is_featured' => true,
                'is_active' => true
            ],
            [
                'customer_name' => 'Dedi Kurniawan',
                'customer_location' => 'Medan',
                'motor_id' => $motors->where('name', 'MT-15')->first()?->id,
                'testimonial' => 'MT-15 naked bike yang sangat fun to ride. Akselerasi mantap dan cocok untuk berkendara di kota.',
                'rating' => 5,
                'is_featured' => true,
                'is_active' => true
            ],
            [
                'customer_name' => 'Rina Sari',
                'customer_location' => 'Semarang',
                'motor_id' => $motors->where('name', 'Gear 125')->first()?->id,
                'testimonial' => 'Gear 125 sangat ekonomis dan handal. Sudah 3 tahun pakai, jarang ada masalah. Service di dealer juga cepat.',
                'rating' => 4,
                'is_featured' => true,
                'is_active' => true
            ]
        ];

        foreach ($testimonials as $testimonial) {
            if ($testimonial['motor_id']) { // Only create if motor exists
                Testimonial::create($testimonial);
            }
        }
    }
}
