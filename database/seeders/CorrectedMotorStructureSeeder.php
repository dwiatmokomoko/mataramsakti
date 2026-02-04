<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Motor;
use App\Models\MotorModel;
use App\Models\MotorVariant;

class CorrectedMotorStructureSeeder extends Seeder
{
    public function run()
    {
        // ========== MAXI CATEGORY ==========
        
        // 1. TMAX
        $tmax = Motor::create([
            'name' => 'TMAX',
            'category' => 'Maxi',
            'description' => 'Ultimate maxi scooter dengan performa premium',
            'is_active' => true
        ]);

        $tmaxStandard = MotorModel::create([
            'motor_id' => $tmax->id,
            'name' => 'Standard',
            'full_name' => 'TMAX',
            'description' => 'Ultimate maxi scooter dengan teknologi terdepan',
            'price_otr' => 455000000,
            'price_dp' => 91000000,
            'price_installment' => 21000000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, DOHC, Parallel Twin, Pendingin Cairan',
                'kapasitas_mesin' => '562 cc',
                'daya_maksimum' => '35.0 kW (47.6 PS) / 7,000 rpm',
                'torsi_maksimum' => '56.2 Nm / 5,250 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Dual Disc with ABS',
                'rem_belakang' => 'Hydraulic Single Disc with ABS',
                'kapasitas_tangki' => '15.0 L',
                'berat_isi' => '220 kg'
            ],
            'is_featured' => true,
            'is_active' => true
        ]);

        // TMAX Colors
        MotorVariant::create(['motor_model_id' => $tmaxStandard->id, 'color_name' => 'Tech Kamo', 'color_code' => '#2c3e50', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $tmaxStandard->id, 'color_name' => 'Icon Blue', 'color_code' => '#1e3c72', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $tmaxStandard->id, 'color_name' => 'Matte Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);

        // 2. XMAX 250
        $xmax = Motor::create([
            'name' => 'XMAX',
            'category' => 'Maxi',
            'description' => 'Maxi scooter premium dengan performa tinggi',
            'is_active' => true
        ]);

        $xmax250 = MotorModel::create([
            'motor_id' => $xmax->id,
            'name' => '250',
            'full_name' => 'XMAX 250',
            'description' => 'Maxi scooter 250cc dengan teknologi canggih',
            'price_otr' => 68215000,
            'price_dp' => 13643000,
            'price_installment' => 3200000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '249 cc',
                'daya_maksimum' => '15.3 kW (20.6 PS) / 8,000 rpm',
                'torsi_maksimum' => '20.6 Nm / 6,500 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Dual Disc with ABS',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '13.2 L',
                'berat_isi' => '179 kg'
            ],
            'is_featured' => true,
            'is_active' => true
        ]);

        // XMAX 250 Colors
        MotorVariant::create(['motor_model_id' => $xmax250->id, 'color_name' => 'Crystal Graphite', 'color_code' => '#6c757d', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $xmax250->id, 'color_name' => 'Matte Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $xmax250->id, 'color_name' => 'Icon Blue', 'color_code' => '#1e3c72', 'price_difference' => 0, 'is_available' => true]);

        // 3. NMAX TURBO / Neo
        $nmax = Motor::create([
            'name' => 'NMAX',
            'category' => 'Maxi',
            'description' => 'Maxi scooter premium dengan performa tinggi dan teknologi canggih',
            'is_active' => true
        ]);

        $nmaxTurbo = MotorModel::create([
            'motor_id' => $nmax->id,
            'name' => 'TURBO',
            'full_name' => 'NMAX "TURBO" / Neo',
            'description' => 'Varian turbo dengan performa maksimal',
            'price_otr' => 33765000,
            'price_dp' => 6753000,
            'price_installment' => 1580000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '11.1 kW (15.0 PS) / 8,000 rpm',
                'torsi_maksimum' => '13.9 Nm / 6,500 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '6.6 L',
                'berat_isi' => '127 kg'
            ],
            'is_featured' => true,
            'is_active' => true
        ]);

        // NMAX Colors
        MotorVariant::create(['motor_model_id' => $nmaxTurbo->id, 'color_name' => 'Matte Grey', 'color_code' => '#6c757d', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $nmaxTurbo->id, 'color_name' => 'Matte Red', 'color_code' => '#dc3545', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $nmaxTurbo->id, 'color_name' => 'Turbo Blue', 'color_code' => '#1e3c72', 'price_difference' => 0, 'is_available' => true]);

        // 4. AEROX Alpha
        $aeroxAlpha = Motor::create([
            'name' => 'AEROX',
            'category' => 'Maxi',
            'description' => 'Skutik sporty dengan desain futuristik',
            'is_active' => true
        ]);

        $aeroxAlphaModel = MotorModel::create([
            'motor_id' => $aeroxAlpha->id,
            'name' => 'Alpha',
            'full_name' => 'Aerox Alpha',
            'description' => 'Skutik sporty dengan teknologi terdepan',
            'price_otr' => 29900000,
            'price_dp' => 5980000,
            'price_installment' => 1400000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '11.1 kW (15.0 PS) / 8,000 rpm',
                'torsi_maksimum' => '13.8 Nm / 6,500 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '5.5 L',
                'berat_isi' => '126 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // Aerox Alpha Colors
        MotorVariant::create(['motor_model_id' => $aeroxAlphaModel->id, 'color_name' => 'Matte Red', 'color_code' => '#dc3545', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $aeroxAlphaModel->id, 'color_name' => 'Matte Blue', 'color_code' => '#1e3c72', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $aeroxAlphaModel->id, 'color_name' => 'Matte Grey', 'color_code' => '#6c757d', 'price_difference' => 0, 'is_available' => true]);

        // 5. LEXI LX 155
        $lexi = Motor::create([
            'name' => 'LEXI',
            'category' => 'Maxi',
            'description' => 'Skutik stylish untuk urban lifestyle',
            'is_active' => true
        ]);

        $lexiLX155 = MotorModel::create([
            'motor_id' => $lexi->id,
            'name' => 'LX 155',
            'full_name' => 'LEXI LX 155',
            'description' => 'Skutik stylish dengan teknologi VVA',
            'price_otr' => 27050000,
            'price_dp' => 5410000,
            'price_installment' => 1270000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '11.1 kW (15.0 PS) / 8,000 rpm',
                'torsi_maksimum' => '13.8 Nm / 6,500 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Drum Brake',
                'kapasitas_tangki' => '5.5 L',
                'berat_isi' => '115 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // LEXI LX 155 Colors
        MotorVariant::create(['motor_model_id' => $lexiLX155->id, 'color_name' => 'Matte Brown', 'color_code' => '#8b4513', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $lexiLX155->id, 'color_name' => 'Matte Blue', 'color_code' => '#1e3c72', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $lexiLX155->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);

        // 6. NMAX 155
        $nmax155 = MotorModel::create([
            'motor_id' => $nmax->id,
            'name' => '155',
            'full_name' => 'NMAX 155',
            'description' => 'Varian standar dengan fitur lengkap',
            'price_otr' => 32175000,
            'price_dp' => 6435000,
            'price_installment' => 1510000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '11.1 kW (15.0 PS) / 8,000 rpm',
                'torsi_maksimum' => '13.9 Nm / 6,500 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '6.6 L',
                'berat_isi' => '127 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // NMAX 155 Colors
        MotorVariant::create(['motor_model_id' => $nmax155->id, 'color_name' => 'Matte Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $nmax155->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $nmax155->id, 'color_name' => 'Racing Blue', 'color_code' => '#0d6efd', 'price_difference' => 0, 'is_available' => true]);

        // 7. Aerox 155
        $aerox155Model = MotorModel::create([
            'motor_id' => $aeroxAlpha->id,
            'name' => '155',
            'full_name' => 'Aerox 155',
            'description' => 'Skutik sporty dengan teknologi Y-Connect',
            'price_otr' => 28650000,
            'price_dp' => 5730000,
            'price_installment' => 1350000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '11.1 kW (15.0 PS) / 8,000 rpm',
                'torsi_maksimum' => '13.8 Nm / 6,500 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '5.5 L',
                'berat_isi' => '126 kg'
            ],
            'is_featured' => true,
            'is_active' => true
        ]);

        // Aerox 155 Colors
        MotorVariant::create(['motor_model_id' => $aerox155Model->id, 'color_name' => 'Matte Red', 'color_code' => '#dc3545', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $aerox155Model->id, 'color_name' => 'Matte Blue', 'color_code' => '#1e3c72', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $aerox155Model->id, 'color_name' => 'Matte Grey', 'color_code' => '#6c757d', 'price_difference' => 0, 'is_available' => true]);

        // ========== CLASSY CATEGORY ==========
        
        // 1. Grand Filano
        $grandFilano = Motor::create([
            'name' => 'GRAND FILANO',
            'category' => 'Classy',
            'description' => 'Skutik klasik dengan desain elegan',
            'is_active' => true
        ]);

        $grandFilanoStandard = MotorModel::create([
            'motor_id' => $grandFilano->id,
            'name' => 'Standard',
            'full_name' => 'Grand Filano',
            'description' => 'Skutik klasik dengan desain elegan dan nyaman',
            'price_otr' => 28315000,
            'price_dp' => 5663000,
            'price_installment' => 1330000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Udara',
                'kapasitas_mesin' => '125 cc',
                'daya_maksimum' => '6.1 kW (8.2 PS) / 6,500 rpm',
                'torsi_maksimum' => '10.9 Nm / 5,000 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Drum Brake',
                'kapasitas_tangki' => '4.2 L',
                'berat_isi' => '103 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // Grand Filano Colors
        MotorVariant::create(['motor_model_id' => $grandFilanoStandard->id, 'color_name' => 'Mint Green', 'color_code' => '#98fb98', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $grandFilanoStandard->id, 'color_name' => 'Cream', 'color_code' => '#f5f5dc', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $grandFilanoStandard->id, 'color_name' => 'Brown', 'color_code' => '#8b4513', 'price_difference' => 0, 'is_available' => true]);

        // 2. Fascino
        $fascino = Motor::create([
            'name' => 'FASCINO',
            'category' => 'Classy',
            'description' => 'Skutik retro dengan gaya vintage',
            'is_active' => true
        ]);

        $fascinoStandard = MotorModel::create([
            'motor_id' => $fascino->id,
            'name' => 'Standard',
            'full_name' => 'Fascino',
            'description' => 'Skutik retro dengan gaya vintage yang menawan',
            'price_otr' => 22270000,
            'price_dp' => 4454000,
            'price_installment' => 1045000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Udara',
                'kapasitas_mesin' => '125 cc',
                'daya_maksimum' => '6.1 kW (8.2 PS) / 6,500 rpm',
                'torsi_maksimum' => '10.9 Nm / 5,000 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Drum Brake',
                'kapasitas_tangki' => '4.2 L',
                'berat_isi' => '99 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // Fascino Colors
        MotorVariant::create(['motor_model_id' => $fascinoStandard->id, 'color_name' => 'Purple', 'color_code' => '#800080', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $fascinoStandard->id, 'color_name' => 'Pink', 'color_code' => '#ffc0cb', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $fascinoStandard->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);

        // ========== MATIC CATEGORY ==========
        
        // 1. Gear Ultima
        $gearUltima = Motor::create([
            'name' => 'GEAR',
            'category' => 'Matic',
            'description' => 'Skutik praktis untuk kebutuhan sehari-hari',
            'is_active' => true
        ]);

        $gearUltimaModel = MotorModel::create([
            'motor_id' => $gearUltima->id,
            'name' => 'Ultima',
            'full_name' => 'Gear Ultima',
            'description' => 'Skutik praktis dengan fitur lengkap',
            'price_otr' => 20140000,
            'price_dp' => 4028000,
            'price_installment' => 945000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Udara',
                'kapasitas_mesin' => '125 cc',
                'daya_maksimum' => '6.1 kW (8.2 PS) / 6,500 rpm',
                'torsi_maksimum' => '10.9 Nm / 5,000 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Drum Brake',
                'kapasitas_tangki' => '4.2 L',
                'berat_isi' => '103 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // Gear Ultima Colors
        MotorVariant::create(['motor_model_id' => $gearUltimaModel->id, 'color_name' => 'Matte Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $gearUltimaModel->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $gearUltimaModel->id, 'color_name' => 'Red', 'color_code' => '#dc3545', 'price_difference' => 0, 'is_available' => true]);

        // 2. GEAR 125
        $gear125 = MotorModel::create([
            'motor_id' => $gearUltima->id,
            'name' => '125',
            'full_name' => 'GEAR 125',
            'description' => 'Skutik praktis dengan teknologi VVA',
            'price_otr' => 19195000,
            'price_dp' => 3839000,
            'price_installment' => 900000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Udara',
                'kapasitas_mesin' => '125 cc',
                'daya_maksimum' => '6.1 kW (8.2 PS) / 6,500 rpm',
                'torsi_maksimum' => '10.9 Nm / 5,000 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Drum Brake',
                'kapasitas_tangki' => '4.2 L',
                'berat_isi' => '103 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // GEAR 125 Colors
        MotorVariant::create(['motor_model_id' => $gear125->id, 'color_name' => 'Red', 'color_code' => '#dc3545', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $gear125->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $gear125->id, 'color_name' => 'Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);

        // 3. FreeGo 125
        $freeGo = Motor::create([
            'name' => 'FREEGO',
            'category' => 'Matic',
            'description' => 'Skutik modern dengan desain sporty',
            'is_active' => true
        ]);

        $freeGo125 = MotorModel::create([
            'motor_id' => $freeGo->id,
            'name' => '125',
            'full_name' => 'FreeGo 125',
            'description' => 'Skutik modern dengan desain sporty dan nyaman',
            'price_otr' => 22665000,
            'price_dp' => 4533000,
            'price_installment' => 1065000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Udara',
                'kapasitas_mesin' => '125 cc',
                'daya_maksimum' => '6.1 kW (8.2 PS) / 6,500 rpm',
                'torsi_maksimum' => '10.9 Nm / 5,000 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Drum Brake',
                'kapasitas_tangki' => '4.2 L',
                'berat_isi' => '103 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // FreeGo 125 Colors
        MotorVariant::create(['motor_model_id' => $freeGo125->id, 'color_name' => 'Matte Brown', 'color_code' => '#8b4513', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $freeGo125->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $freeGo125->id, 'color_name' => 'Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);

        // 4. X-Ride 125
        $xRide = Motor::create([
            'name' => 'X-RIDE',
            'category' => 'Matic',
            'description' => 'Skutik adventure dengan karakter tangguh',
            'is_active' => true
        ]);

        $xRide125 = MotorModel::create([
            'motor_id' => $xRide->id,
            'name' => '125',
            'full_name' => 'X-Ride 125',
            'description' => 'Skutik adventure dengan karakter tangguh',
            'price_otr' => 20935000,
            'price_dp' => 4187000,
            'price_installment' => 980000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Udara',
                'kapasitas_mesin' => '125 cc',
                'daya_maksimum' => '6.1 kW (8.2 PS) / 6,500 rpm',
                'torsi_maksimum' => '10.9 Nm / 5,000 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Drum Brake',
                'kapasitas_tangki' => '4.2 L',
                'berat_isi' => '103 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // X-Ride 125 Colors
        MotorVariant::create(['motor_model_id' => $xRide125->id, 'color_name' => 'Matte Blue', 'color_code' => '#1e3c72', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $xRide125->id, 'color_name' => 'Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $xRide125->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);

        // 5. Mio M3 125
        $mio = Motor::create([
            'name' => 'MIO',
            'category' => 'Matic',
            'description' => 'Skutik compact dan ekonomis',
            'is_active' => true
        ]);

        $mioM3125 = MotorModel::create([
            'motor_id' => $mio->id,
            'name' => 'M3 125',
            'full_name' => 'Mio M3 125',
            'description' => 'Skutik compact dan ekonomis untuk mobilitas harian',
            'price_otr' => 17610000,
            'price_dp' => 3522000,
            'price_installment' => 825000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Udara',
                'kapasitas_mesin' => '125 cc',
                'daya_maksimum' => '6.1 kW (8.2 PS) / 6,500 rpm',
                'torsi_maksimum' => '10.9 Nm / 5,000 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Drum Brake',
                'kapasitas_tangki' => '4.2 L',
                'berat_isi' => '103 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // Mio M3 125 Colors
        MotorVariant::create(['motor_model_id' => $mioM3125->id, 'color_name' => 'Cyan', 'color_code' => '#00ffff', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $mioM3125->id, 'color_name' => 'Pink', 'color_code' => '#ffc0cb', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $mioM3125->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);

        // 6. Fino 125
        $fino = Motor::create([
            'name' => 'FINO',
            'category' => 'Matic',
            'description' => 'Skutik stylish dengan desain feminin',
            'is_active' => true
        ]);

        $fino125 = MotorModel::create([
            'motor_id' => $fino->id,
            'name' => '125',
            'full_name' => 'Fino 125',
            'description' => 'Skutik stylish dengan desain feminin yang elegan',
            'price_otr' => 20400000,
            'price_dp' => 4080000,
            'price_installment' => 955000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Udara',
                'kapasitas_mesin' => '125 cc',
                'daya_maksimum' => '6.1 kW (8.2 PS) / 6,500 rpm',
                'torsi_maksimum' => '10.9 Nm / 5,000 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => 'V-Belt Automatic',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Drum Brake',
                'kapasitas_tangki' => '4.2 L',
                'berat_isi' => '103 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // Fino 125 Colors
        MotorVariant::create(['motor_model_id' => $fino125->id, 'color_name' => 'Red', 'color_code' => '#dc3545', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $fino125->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $fino125->id, 'color_name' => 'Pink', 'color_code' => '#ffc0cb', 'price_difference' => 0, 'is_available' => true]);

        // ========== SPORT CATEGORY ==========
        
        // 1. XSR 155
        $xsr = Motor::create([
            'name' => 'XSR',
            'category' => 'Sport',
            'description' => 'Motor sport heritage dengan karakter klasik',
            'is_active' => true
        ]);

        $xsr155 = MotorModel::create([
            'motor_id' => $xsr->id,
            'name' => '155',
            'full_name' => 'XSR 155',
            'description' => 'Motor sport heritage dengan karakter klasik modern',
            'price_otr' => 39265000,
            'price_dp' => 7853000,
            'price_installment' => 1840000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '12.4 kW (16.8 PS) / 8,500 rpm',
                'torsi_maksimum' => '14.9 Nm / 7,000 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => '5-Speed Manual',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '11.0 L',
                'berat_isi' => '134 kg'
            ],
            'is_featured' => true,
            'is_active' => true
        ]);

        // XSR 155 Colors
        MotorVariant::create(['motor_model_id' => $xsr155->id, 'color_name' => 'Matte Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $xsr155->id, 'color_name' => 'Racing Blue', 'color_code' => '#0d6efd', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $xsr155->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);

        // 2. R15
        $r15 = Motor::create([
            'name' => 'R15',
            'category' => 'Sport',
            'description' => 'Motor sport dengan teknologi MotoGP',
            'is_active' => true
        ]);

        $r15Standard = MotorModel::create([
            'motor_id' => $r15->id,
            'name' => 'Standard',
            'full_name' => 'R15',
            'description' => 'Motor sport dengan teknologi MotoGP',
            'price_otr' => 41200000,
            'price_dp' => 8240000,
            'price_installment' => 1930000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '14.2 kW (19.3 PS) / 10,000 rpm',
                'torsi_maksimum' => '14.7 Nm / 8,500 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => '6-Speed Manual',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '11.0 L',
                'berat_isi' => '142 kg'
            ],
            'is_featured' => true,
            'is_active' => true
        ]);

        // R15 Colors
        MotorVariant::create(['motor_model_id' => $r15Standard->id, 'color_name' => 'Racing Blue', 'color_code' => '#0d6efd', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $r15Standard->id, 'color_name' => 'Matte Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $r15Standard->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);

        // 3. R25
        $r25 = Motor::create([
            'name' => 'R25',
            'category' => 'Sport',
            'description' => 'Motor sport premium dengan performa tinggi',
            'is_active' => true
        ]);

        $r25Standard = MotorModel::create([
            'motor_id' => $r25->id,
            'name' => 'Standard',
            'full_name' => 'R25',
            'description' => 'Motor sport premium dengan performa tinggi',
            'price_otr' => 75250000,
            'price_dp' => 15050000,
            'price_installment' => 3530000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, DOHC, Parallel Twin, Pendingin Cairan',
                'kapasitas_mesin' => '249 cc',
                'daya_maksimum' => '26.1 kW (35.5 PS) / 12,000 rpm',
                'torsi_maksimum' => '23.0 Nm / 10,000 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => '6-Speed Manual',
                'rem_depan' => 'Hydraulic Dual Disc with ABS',
                'rem_belakang' => 'Hydraulic Single Disc with ABS',
                'kapasitas_tangki' => '11.0 L',
                'berat_isi' => '166 kg'
            ],
            'is_featured' => true,
            'is_active' => true
        ]);

        // R25 Colors
        MotorVariant::create(['motor_model_id' => $r25Standard->id, 'color_name' => 'Racing Blue', 'color_code' => '#0d6efd', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $r25Standard->id, 'color_name' => 'Matte Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $r25Standard->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);

        // 4. MT-25
        $mt25 = Motor::create([
            'name' => 'MT-25',
            'category' => 'Sport',
            'description' => 'Motor naked sport dengan karakter agresif',
            'is_active' => true
        ]);

        $mt25Standard = MotorModel::create([
            'motor_id' => $mt25->id,
            'name' => 'Standard',
            'full_name' => 'MT-25',
            'description' => 'Motor naked sport dengan karakter agresif',
            'price_otr' => 65450000,
            'price_dp' => 13090000,
            'price_installment' => 3070000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, DOHC, Parallel Twin, Pendingin Cairan',
                'kapasitas_mesin' => '249 cc',
                'daya_maksimum' => '26.1 kW (35.5 PS) / 12,000 rpm',
                'torsi_maksimum' => '23.0 Nm / 10,000 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => '6-Speed Manual',
                'rem_depan' => 'Hydraulic Single Disc with ABS',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '14.0 L',
                'berat_isi' => '166 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // MT-25 Colors
        MotorVariant::create(['motor_model_id' => $mt25Standard->id, 'color_name' => 'Matte Blue', 'color_code' => '#1e3c72', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $mt25Standard->id, 'color_name' => 'Matte Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $mt25Standard->id, 'color_name' => 'Yellow', 'color_code' => '#ffd700', 'price_difference' => 0, 'is_available' => true]);

        // 5. MT-15
        $mt15 = Motor::create([
            'name' => 'MT-15',
            'category' => 'Sport',
            'description' => 'Motor naked sport entry level',
            'is_active' => true
        ]);

        $mt15Standard = MotorModel::create([
            'motor_id' => $mt15->id,
            'name' => 'Standard',
            'full_name' => 'MT-15',
            'description' => 'Motor naked sport entry level dengan performa optimal',
            'price_otr' => 40215000,
            'price_dp' => 8043000,
            'price_installment' => 1885000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '14.2 kW (19.3 PS) / 10,000 rpm',
                'torsi_maksimum' => '14.7 Nm / 8,500 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => '6-Speed Manual',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '10.0 L',
                'berat_isi' => '134 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // MT-15 Colors
        MotorVariant::create(['motor_model_id' => $mt15Standard->id, 'color_name' => 'Matte Blue', 'color_code' => '#1e3c72', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $mt15Standard->id, 'color_name' => 'Matte Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $mt15Standard->id, 'color_name' => 'Yellow', 'color_code' => '#ffd700', 'price_difference' => 0, 'is_available' => true]);

        // 6. Vixion 155
        $vixion = Motor::create([
            'name' => 'VIXION',
            'category' => 'Sport',
            'description' => 'Motor sport naked dengan performa tangguh',
            'is_active' => true
        ]);

        $vixion155 = MotorModel::create([
            'motor_id' => $vixion->id,
            'name' => '155',
            'full_name' => 'Vixion 155',
            'description' => 'Motor sport naked dengan performa tangguh',
            'price_otr' => 30750000,
            'price_dp' => 6150000,
            'price_installment' => 1440000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '12.4 kW (16.8 PS) / 8,500 rpm',
                'torsi_maksimum' => '14.9 Nm / 7,000 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => '5-Speed Manual',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '11.0 L',
                'berat_isi' => '134 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // Vixion 155 Colors
        MotorVariant::create(['motor_model_id' => $vixion155->id, 'color_name' => 'Matte Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $vixion155->id, 'color_name' => 'Racing Blue', 'color_code' => '#0d6efd', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $vixion155->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);

        // ========== MOPED CATEGORY ==========
        
        // 1. MX King 150
        $mxKing = Motor::create([
            'name' => 'MX KING',
            'category' => 'Moped',
            'description' => 'Motor bebek sport dengan performa tinggi',
            'is_active' => true
        ]);

        $mxKing150 = MotorModel::create([
            'motor_id' => $mxKing->id,
            'name' => '150',
            'full_name' => 'MX King 150',
            'description' => 'Motor bebek sport dengan performa tinggi',
            'price_otr' => 28125000,
            'price_dp' => 5625000,
            'price_installment' => 1320000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '150 cc',
                'daya_maksimum' => '10.3 kW (14.0 PS) / 8,500 rpm',
                'torsi_maksimum' => '13.3 Nm / 7,000 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => '5-Speed Manual',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Drum Brake',
                'kapasitas_tangki' => '4.3 L',
                'berat_isi' => '118 kg'
            ],
            'is_featured' => true,
            'is_active' => true
        ]);

        // MX King 150 Colors
        MotorVariant::create(['motor_model_id' => $mxKing150->id, 'color_name' => 'Racing Blue', 'color_code' => '#0d6efd', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $mxKing150->id, 'color_name' => 'Matte Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $mxKing150->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);

        // 2. Jupiter Z1
        $jupiterZ1 = Motor::create([
            'name' => 'JUPITER Z1',
            'category' => 'Moped',
            'description' => 'Motor bebek andalan untuk kebutuhan sehari-hari',
            'is_active' => true
        ]);

        $jupiterZ1Standard = MotorModel::create([
            'motor_id' => $jupiterZ1->id,
            'name' => 'Standard',
            'full_name' => 'Jupiter Z1',
            'description' => 'Motor bebek andalan untuk kebutuhan sehari-hari',
            'price_otr' => 21880000,
            'price_dp' => 4376000,
            'price_installment' => 1025000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Udara',
                'kapasitas_mesin' => '113 cc',
                'daya_maksimum' => '6.6 kW (8.9 PS) / 7,500 rpm',
                'torsi_maksimum' => '9.0 Nm / 5,500 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => '4-Speed Manual',
                'rem_depan' => 'Drum Brake',
                'rem_belakang' => 'Drum Brake',
                'kapasitas_tangki' => '3.7 L',
                'berat_isi' => '96 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // Jupiter Z1 Colors
        MotorVariant::create(['motor_model_id' => $jupiterZ1Standard->id, 'color_name' => 'Green', 'color_code' => '#28a745', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $jupiterZ1Standard->id, 'color_name' => 'Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $jupiterZ1Standard->id, 'color_name' => 'Red', 'color_code' => '#dc3545', 'price_difference' => 0, 'is_available' => true]);

        // 3. Vega Force
        $vegaForce = Motor::create([
            'name' => 'VEGA FORCE',
            'category' => 'Moped',
            'description' => 'Motor bebek ekonomis dan handal',
            'is_active' => true
        ]);

        $vegaForceStandard = MotorModel::create([
            'motor_id' => $vegaForce->id,
            'name' => 'Standard',
            'full_name' => 'Vega Force',
            'description' => 'Motor bebek ekonomis dan handal untuk mobilitas harian',
            'price_otr' => 19800000,
            'price_dp' => 3960000,
            'price_installment' => 930000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Udara',
                'kapasitas_mesin' => '113 cc',
                'daya_maksimum' => '6.6 kW (8.9 PS) / 7,500 rpm',
                'torsi_maksimum' => '9.0 Nm / 5,500 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => '4-Speed Manual',
                'rem_depan' => 'Drum Brake',
                'rem_belakang' => 'Drum Brake',
                'kapasitas_tangki' => '3.7 L',
                'berat_isi' => '96 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // Vega Force Colors
        MotorVariant::create(['motor_model_id' => $vegaForceStandard->id, 'color_name' => 'Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $vegaForceStandard->id, 'color_name' => 'Red', 'color_code' => '#dc3545', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $vegaForceStandard->id, 'color_name' => 'Blue', 'color_code' => '#0d6efd', 'price_difference' => 0, 'is_available' => true]);

        // ========== OFF-ROAD CATEGORY ==========
        
        // 1. WR155R
        $wr155r = Motor::create([
            'name' => 'WR155R',
            'category' => 'Off-Road',
            'description' => 'Motor trail untuk petualangan off-road',
            'is_active' => true
        ]);

        $wr155rStandard = MotorModel::create([
            'motor_id' => $wr155r->id,
            'name' => 'Standard',
            'full_name' => 'WR155R',
            'description' => 'Motor trail untuk petualangan off-road',
            'price_otr' => 40275000,
            'price_dp' => 8055000,
            'price_installment' => 1890000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '12.4 kW (16.8 PS) / 8,500 rpm',
                'torsi_maksimum' => '14.9 Nm / 7,000 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => '6-Speed Manual',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '7.6 L',
                'berat_isi' => '134 kg'
            ],
            'is_featured' => true,
            'is_active' => true
        ]);

        // WR155R Colors
        MotorVariant::create(['motor_model_id' => $wr155rStandard->id, 'color_name' => 'Racing Blue', 'color_code' => '#0d6efd', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $wr155rStandard->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $wr155rStandard->id, 'color_name' => 'Black', 'color_code' => '#212529', 'price_difference' => 0, 'is_available' => true]);

        // 2. YZ125X
        $yz125x = Motor::create([
            'name' => 'YZ125X',
            'category' => 'Off-Road',
            'description' => 'Motor cross untuk kompetisi dan trail',
            'is_active' => true
        ]);

        $yz125xStandard = MotorModel::create([
            'motor_id' => $yz125x->id,
            'name' => 'Standard',
            'full_name' => 'YZ125X',
            'description' => 'Motor cross untuk kompetisi dan trail',
            'price_otr' => 97000000,
            'price_dp' => 19400000,
            'price_installment' => 4550000,
            'specifications' => [
                'tipe_mesin' => '2-Langkah, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '125 cc',
                'daya_maksimum' => '22.0 kW (30.0 PS) / 8,500 rpm',
                'torsi_maksimum' => '28.0 Nm / 7,000 rpm',
                'sistem_bahan_bakar' => 'Carburetor',
                'tipe_transmisi' => '6-Speed Manual',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '7.5 L',
                'berat_isi' => '98 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // YZ125X Colors
        MotorVariant::create(['motor_model_id' => $yz125xStandard->id, 'color_name' => 'Racing Blue', 'color_code' => '#0d6efd', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $yz125xStandard->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);

        // 3. YZ250X
        $yz250x = Motor::create([
            'name' => 'YZ250X',
            'category' => 'Off-Road',
            'description' => 'Motor cross premium untuk kompetisi tingkat tinggi',
            'is_active' => true
        ]);

        $yz250xStandard = MotorModel::create([
            'motor_id' => $yz250x->id,
            'name' => 'Standard',
            'full_name' => 'YZ250X',
            'description' => 'Motor cross premium untuk kompetisi tingkat tinggi',
            'price_otr' => 120000000,
            'price_dp' => 24000000,
            'price_installment' => 5620000,
            'specifications' => [
                'tipe_mesin' => '2-Langkah, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '249 cc',
                'daya_maksimum' => '35.0 kW (47.6 PS) / 8,500 rpm',
                'torsi_maksimum' => '42.0 Nm / 7,000 rpm',
                'sistem_bahan_bakar' => 'Carburetor',
                'tipe_transmisi' => '6-Speed Manual',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '7.5 L',
                'berat_isi' => '105 kg'
            ],
            'is_featured' => true,
            'is_active' => true
        ]);

        // YZ250X Colors
        MotorVariant::create(['motor_model_id' => $yz250xStandard->id, 'color_name' => 'Racing Blue', 'color_code' => '#0d6efd', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $yz250xStandard->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);

        // 4. YZ250F
        $yz250f = Motor::create([
            'name' => 'YZ250F',
            'category' => 'Off-Road',
            'description' => 'Motor cross 4-tak untuk enduro dan trail',
            'is_active' => true
        ]);

        $yz250fStandard = MotorModel::create([
            'motor_id' => $yz250f->id,
            'name' => 'Standard',
            'full_name' => 'YZ250F',
            'description' => 'Motor cross 4-tak untuk enduro dan trail',
            'price_otr' => 129000000,
            'price_dp' => 25800000,
            'price_installment' => 6050000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, DOHC, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '249 cc',
                'daya_maksimum' => '30.0 kW (40.8 PS) / 10,000 rpm',
                'torsi_maksimum' => '25.0 Nm / 8,500 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => '5-Speed Manual',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '7.5 L',
                'berat_isi' => '108 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // YZ250F Colors
        MotorVariant::create(['motor_model_id' => $yz250fStandard->id, 'color_name' => 'Racing Blue', 'color_code' => '#0d6efd', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $yz250fStandard->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);

        // 5. YZ250FX
        $yz250fx = Motor::create([
            'name' => 'YZ250FX',
            'category' => 'Off-Road',
            'description' => 'Motor enduro premium untuk petualangan ekstrem',
            'is_active' => true
        ]);

        $yz250fxStandard = MotorModel::create([
            'motor_id' => $yz250fx->id,
            'name' => 'Standard',
            'full_name' => 'YZ250FX',
            'description' => 'Motor enduro premium untuk petualangan ekstrem',
            'price_otr' => 124000000,
            'price_dp' => 24800000,
            'price_installment' => 5810000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, DOHC, Silinder Tunggal, Pendingin Cairan',
                'kapasitas_mesin' => '249 cc',
                'daya_maksimum' => '30.0 kW (40.8 PS) / 10,000 rpm',
                'torsi_maksimum' => '25.0 Nm / 8,500 rpm',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_transmisi' => '5-Speed Manual',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '8.1 L',
                'berat_isi' => '110 kg'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // YZ250FX Colors
        MotorVariant::create(['motor_model_id' => $yz250fxStandard->id, 'color_name' => 'Racing Blue', 'color_code' => '#0d6efd', 'price_difference' => 0, 'is_available' => true]);
        MotorVariant::create(['motor_model_id' => $yz250fxStandard->id, 'color_name' => 'White', 'color_code' => '#ffffff', 'price_difference' => 0, 'is_available' => true]);
    }
}