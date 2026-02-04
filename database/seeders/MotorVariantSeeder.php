<?php

namespace Database\Seeders;

use App\Models\Motor;
use App\Models\MotorVariant;
use Illuminate\Database\Seeder;

class MotorVariantSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil beberapa motor untuk diberi varian warna
        $motors = Motor::whereIn('name', ['TMAX', 'XMAX 250', 'NMAX TURBO', 'R15M'])->get();
        
        foreach ($motors as $motor) {
            $variants = [];
            
            switch ($motor->name) {
                case 'TMAX':
                    $variants = [
                        ['color_name' => 'Tech Black', 'color_code' => '#1a1a1a', 'price_difference' => 0],
                        ['color_name' => 'Icon Grey', 'color_code' => '#6c757d', 'price_difference' => 0],
                        ['color_name' => 'Phantom Blue', 'color_code' => '#1e3a8a', 'price_difference' => 500000],
                    ];
                    break;
                    
                case 'XMAX 250':
                    $variants = [
                        ['color_name' => 'Matte Grey', 'color_code' => '#495057', 'price_difference' => 0],
                        ['color_name' => 'Icon Blue', 'color_code' => '#0d6efd', 'price_difference' => 0],
                        ['color_name' => 'Phantom Red', 'color_code' => '#dc3545', 'price_difference' => 300000],
                    ];
                    break;
                    
                case 'NMAX TURBO':
                    $variants = [
                        ['color_name' => 'Matte Black', 'color_code' => '#212529', 'price_difference' => 0],
                        ['color_name' => 'Racing Blue', 'color_code' => '#0066cc', 'price_difference' => 0],
                        ['color_name' => 'Pearl White', 'color_code' => '#f8f9fa', 'price_difference' => 200000],
                        ['color_name' => 'Metallic Red', 'color_code' => '#e74c3c', 'price_difference' => 200000],
                    ];
                    break;
                    
                case 'R15M':
                    $variants = [
                        ['color_name' => 'Racing Blue', 'color_code' => '#1e40af', 'price_difference' => 0],
                        ['color_name' => 'Matte Black', 'color_code' => '#1f2937', 'price_difference' => 0],
                        ['color_name' => 'Monster Energy', 'color_code' => '#10b981', 'price_difference' => 500000],
                    ];
                    break;
            }
            
            foreach ($variants as $variantData) {
                MotorVariant::create([
                    'motor_id' => $motor->id,
                    'color_name' => $variantData['color_name'],
                    'color_code' => $variantData['color_code'],
                    'price_difference' => $variantData['price_difference'],
                    'is_available' => true
                ]);
            }
        }
    }
}
