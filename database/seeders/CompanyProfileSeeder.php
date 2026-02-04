<?php

namespace Database\Seeders;

use App\Models\CompanyInfo;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    public function run(): void
    {
        // Company Info untuk Dealer Yamaha
        CompanyInfo::create([
            'name' => 'Yamaha Mataram Sakti',
            'description' => 'Dealer resmi Yamaha Motor Indonesia yang melayani penjualan, service, dan spare part motor Yamaha. Kami berkomitmen memberikan pelayanan terbaik untuk kepuasan pelanggan.',
            'vision' => 'Menjadi dealer Yamaha terdepan yang memberikan pelayanan prima dan kepuasan pelanggan.',
            'mission' => 'Menyediakan produk motor Yamaha berkualitas tinggi dengan layanan purna jual terbaik, serta membangun hubungan jangka panjang dengan pelanggan.',
            'email' => 'info@yamahamataramsakti.com',
            'phone' => '+62 274 123456',
            'address' => 'Jl. Gempol, Giri Peni, Kec. Wates, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta (Depan SAMSAT Wates)',
            'website' => 'https://www.yamahamataramsakti.com'
        ]);
    }
}
