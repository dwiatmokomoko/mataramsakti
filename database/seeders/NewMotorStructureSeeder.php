<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Motor;
use App\Models\MotorModel;
use App\Models\MotorVariant;

class NewMotorStructureSeeder extends Seeder
{
    public function run()
    {
        // 1. NMAX
        $nmax = Motor::create([
            'name' => 'NMAX',
            'category' => 'Maxi',
            'description' => 'Skutik premium dengan performa tinggi dan teknologi canggih',
            'is_active' => true
        ]);

        // NMAX Models
        $nmaxStandard = MotorModel::create([
            'motor_id' => $nmax->id,
            'name' => 'Standard',
            'full_name' => 'NMAX Standard',
            'description' => 'Varian standar dengan fitur lengkap',
            'price_otr' => 32650000,
            'price_dp' => 6530000,
            'price_installment' => 1500000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'jumlah_silinder' => '1 Silinder',
                'diameter_langkah' => '52.0 mm x 58.7 mm',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '11.1 kW (15.0 PS) / 8,000 rpm',
                'torsi_maksimum' => '13.9 Nm / 6,500 rpm',
                'sistem_starter' => 'Electric Starter & Kick Starter',
                'sistem_pelumasan' => 'Wet Sump',
                'kapasitas_oli_mesin' => '1.0 L',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_kopling' => 'Automatic Centrifugal Clutch',
                'tipe_transmisi' => 'V-Belt Automatic',
                'perbandingan_kompresi' => '10.9 : 1',
                'tipe_rangka' => 'Underbone',
                'suspensi_depan' => 'Telescopic Fork',
                'suspensi_belakang' => 'Swing Arm dengan Monoshock',
                'tipe_ban' => 'Tubeless',
                'ban_depan' => '110/70-13M/C 48P',
                'ban_belakang' => '130/70-13M/C 57P',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '6.6 L',
                'pxlxt' => '1,935 mm x 665 mm x 1,210 mm',
                'jarak_sumbu_roda' => '1,340 mm',
                'jarak_terendah_tanah' => '135 mm',
                'tinggi_tempat_duduk' => '765 mm',
                'berat_isi' => '127 kg',
                'sistem_pengapian' => 'TCI',
                'tipe_baterai' => '12V, 3Ah',
                'tipe_busi' => 'NGK CPR7EA-9'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        $nmaxTurbo = MotorModel::create([
            'motor_id' => $nmax->id,
            'name' => 'Turbo',
            'full_name' => 'NMAX Turbo',
            'description' => 'Varian turbo dengan performa maksimal',
            'price_otr' => 38650000,
            'price_dp' => 7730000,
            'price_installment' => 1800000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan, Turbo',
                'jumlah_silinder' => '1 Silinder',
                'diameter_langkah' => '52.0 mm x 58.7 mm',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '13.5 kW (18.2 PS) / 8,500 rpm',
                'torsi_maksimum' => '16.8 Nm / 7,000 rpm',
                'sistem_starter' => 'Electric Starter & Kick Starter',
                'sistem_pelumasan' => 'Wet Sump',
                'kapasitas_oli_mesin' => '1.0 L',
                'sistem_bahan_bakar' => 'Fuel Injection with Turbo',
                'tipe_kopling' => 'Automatic Centrifugal Clutch',
                'tipe_transmisi' => 'V-Belt Automatic',
                'perbandingan_kompresi' => '11.2 : 1',
                'tipe_rangka' => 'Underbone',
                'suspensi_depan' => 'Telescopic Fork',
                'suspensi_belakang' => 'Swing Arm dengan Monoshock',
                'tipe_ban' => 'Tubeless',
                'ban_depan' => '110/70-13M/C 48P',
                'ban_belakang' => '130/70-13M/C 57P',
                'rem_depan' => 'Hydraulic Single Disc with ABS',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '6.6 L',
                'pxlxt' => '1,935 mm x 665 mm x 1,210 mm',
                'jarak_sumbu_roda' => '1,340 mm',
                'jarak_terendah_tanah' => '135 mm',
                'tinggi_tempat_duduk' => '765 mm',
                'berat_isi' => '132 kg',
                'sistem_pengapian' => 'TCI',
                'tipe_baterai' => '12V, 5Ah',
                'tipe_busi' => 'NGK CPR7EA-9'
            ],
            'is_featured' => true,
            'is_active' => true
        ]);

        $nmaxConnected = MotorModel::create([
            'motor_id' => $nmax->id,
            'name' => 'Connected',
            'full_name' => 'NMAX Connected',
            'description' => 'Varian dengan teknologi Y-Connect',
            'price_otr' => 35650000,
            'price_dp' => 7130000,
            'price_installment' => 1650000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'jumlah_silinder' => '1 Silinder',
                'diameter_langkah' => '52.0 mm x 58.7 mm',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '11.1 kW (15.0 PS) / 8,000 rpm',
                'torsi_maksimum' => '13.9 Nm / 6,500 rpm',
                'sistem_starter' => 'Electric Starter & Kick Starter',
                'sistem_pelumasan' => 'Wet Sump',
                'kapasitas_oli_mesin' => '1.0 L',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_kopling' => 'Automatic Centrifugal Clutch',
                'tipe_transmisi' => 'V-Belt Automatic',
                'perbandingan_kompresi' => '10.9 : 1',
                'tipe_rangka' => 'Underbone',
                'suspensi_depan' => 'Telescopic Fork',
                'suspensi_belakang' => 'Swing Arm dengan Monoshock',
                'tipe_ban' => 'Tubeless',
                'ban_depan' => '110/70-13M/C 48P',
                'ban_belakang' => '130/70-13M/C 57P',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '6.6 L',
                'pxlxt' => '1,935 mm x 665 mm x 1,210 mm',
                'jarak_sumbu_roda' => '1,340 mm',
                'jarak_terendah_tanah' => '135 mm',
                'tinggi_tempat_duduk' => '765 mm',
                'berat_isi' => '127 kg',
                'sistem_pengapian' => 'TCI',
                'tipe_baterai' => '12V, 3Ah',
                'tipe_busi' => 'NGK CPR7EA-9'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // NMAX Standard Variants (Colors)
        MotorVariant::create([
            'motor_model_id' => $nmaxStandard->id,
            'color_name' => 'Matte Black',
            'color_code' => '#212529',
            'price_difference' => 0,
            'is_available' => true
        ]);

        MotorVariant::create([
            'motor_model_id' => $nmaxStandard->id,
            'color_name' => 'White',
            'color_code' => '#ffffff',
            'price_difference' => 0,
            'is_available' => true
        ]);

        MotorVariant::create([
            'motor_model_id' => $nmaxStandard->id,
            'color_name' => 'Racing Blue',
            'color_code' => '#0d6efd',
            'price_difference' => 0,
            'is_available' => true
        ]);

        // NMAX Turbo Variants (Colors)
        MotorVariant::create([
            'motor_model_id' => $nmaxTurbo->id,
            'color_name' => 'Matte Grey',
            'color_code' => '#6c757d',
            'price_difference' => 0,
            'is_available' => true
        ]);

        MotorVariant::create([
            'motor_model_id' => $nmaxTurbo->id,
            'color_name' => 'Matte Red',
            'color_code' => '#dc3545',
            'price_difference' => 0,
            'is_available' => true
        ]);

        MotorVariant::create([
            'motor_model_id' => $nmaxTurbo->id,
            'color_name' => 'Turbo Blue',
            'color_code' => '#1e3c72',
            'price_difference' => 0,
            'is_available' => true
        ]);

        // NMAX Connected Variants (Colors)
        MotorVariant::create([
            'motor_model_id' => $nmaxConnected->id,
            'color_name' => 'Cyber Blue',
            'color_code' => '#00bcd4',
            'price_difference' => 0,
            'is_available' => true
        ]);

        MotorVariant::create([
            'motor_model_id' => $nmaxConnected->id,
            'color_name' => 'Tech Silver',
            'color_code' => '#adb5bd',
            'price_difference' => 0,
            'is_available' => true
        ]);

        // 2. R15
        $r15 = Motor::create([
            'name' => 'R15',
            'category' => 'Sport',
            'description' => 'Motor sport dengan teknologi MotoGP',
            'is_active' => true
        ]);

        // R15 Models
        $r15Standard = MotorModel::create([
            'motor_id' => $r15->id,
            'name' => 'Standard',
            'full_name' => 'R15 Standard',
            'description' => 'Varian standar dengan performa sport',
            'price_otr' => 38680000,
            'price_dp' => 7736000,
            'price_installment' => 1800000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'jumlah_silinder' => '1 Silinder',
                'diameter_langkah' => '58.0 mm x 58.7 mm',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '14.2 kW (19.3 PS) / 10,000 rpm',
                'torsi_maksimum' => '14.7 Nm / 8,500 rpm',
                'sistem_starter' => 'Electric Starter',
                'sistem_pelumasan' => 'Wet Sump',
                'kapasitas_oli_mesin' => '1.05 L',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_kopling' => 'Wet Multiple Disc',
                'tipe_transmisi' => '6-Speed Manual',
                'perbandingan_kompresi' => '11.6 : 1',
                'tipe_rangka' => 'Deltabox',
                'suspensi_depan' => 'Telescopic Fork',
                'suspensi_belakang' => 'Swing Arm dengan Monoshock',
                'tipe_ban' => 'Tubeless',
                'ban_depan' => '100/80-17M/C 52P',
                'ban_belakang' => '140/70-17M/C 66H',
                'rem_depan' => 'Hydraulic Single Disc',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '11.0 L',
                'pxlxt' => '1,990 mm x 725 mm x 1,135 mm',
                'jarak_sumbu_roda' => '1,325 mm',
                'jarak_terendah_tanah' => '155 mm',
                'tinggi_tempat_duduk' => '815 mm',
                'berat_isi' => '142 kg',
                'sistem_pengapian' => 'TCI',
                'tipe_baterai' => '12V, 5Ah',
                'tipe_busi' => 'NGK CPR8EA-9'
            ],
            'is_featured' => true,
            'is_active' => true
        ]);

        $r15M = MotorModel::create([
            'motor_id' => $r15->id,
            'name' => 'M',
            'full_name' => 'R15M',
            'description' => 'Varian M dengan fitur premium',
            'price_otr' => 42680000,
            'price_dp' => 8536000,
            'price_installment' => 2000000,
            'specifications' => [
                'tipe_mesin' => '4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan',
                'jumlah_silinder' => '1 Silinder',
                'diameter_langkah' => '58.0 mm x 58.7 mm',
                'kapasitas_mesin' => '155 cc',
                'daya_maksimum' => '14.2 kW (19.3 PS) / 10,000 rpm',
                'torsi_maksimum' => '14.7 Nm / 8,500 rpm',
                'sistem_starter' => 'Electric Starter',
                'sistem_pelumasan' => 'Wet Sump',
                'kapasitas_oli_mesin' => '1.05 L',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_kopling' => 'Wet Multiple Disc',
                'tipe_transmisi' => '6-Speed Manual',
                'perbandingan_kompresi' => '11.6 : 1',
                'tipe_rangka' => 'Deltabox',
                'suspensi_depan' => 'Telescopic Fork',
                'suspensi_belakang' => 'Swing Arm dengan Monoshock',
                'tipe_ban' => 'Tubeless',
                'ban_depan' => '100/80-17M/C 52P',
                'ban_belakang' => '140/70-17M/C 66H',
                'rem_depan' => 'Hydraulic Single Disc with ABS',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '11.0 L',
                'pxlxt' => '1,990 mm x 725 mm x 1,135 mm',
                'jarak_sumbu_roda' => '1,325 mm',
                'jarak_terendah_tanah' => '155 mm',
                'tinggi_tempat_duduk' => '815 mm',
                'berat_isi' => '144 kg',
                'sistem_pengapian' => 'TCI',
                'tipe_baterai' => '12V, 5Ah',
                'tipe_busi' => 'NGK CPR8EA-9'
            ],
            'is_featured' => false,
            'is_active' => true
        ]);

        // R15 Standard Variants (Colors)
        MotorVariant::create([
            'motor_model_id' => $r15Standard->id,
            'color_name' => 'Racing Blue',
            'color_code' => '#0d6efd',
            'price_difference' => 0,
            'is_available' => true
        ]);

        MotorVariant::create([
            'motor_model_id' => $r15Standard->id,
            'color_name' => 'Matte Black',
            'color_code' => '#212529',
            'price_difference' => 0,
            'is_available' => true
        ]);

        MotorVariant::create([
            'motor_model_id' => $r15Standard->id,
            'color_name' => 'White',
            'color_code' => '#ffffff',
            'price_difference' => 0,
            'is_available' => true
        ]);

        // R15M Variants (Colors)
        MotorVariant::create([
            'motor_model_id' => $r15M->id,
            'color_name' => 'Monster Energy',
            'color_code' => 'linear-gradient(45deg, #000000, #39ff14)',
            'price_difference' => 0,
            'is_available' => true
        ]);

        MotorVariant::create([
            'motor_model_id' => $r15M->id,
            'color_name' => 'MotoGP Edition',
            'color_code' => 'linear-gradient(45deg, #0d6efd, #ffffff)',
            'price_difference' => 0,
            'is_available' => true
        ]);

        // 3. XMAX
        $xmax = Motor::create([
            'name' => 'XMAX',
            'category' => 'Maxi',
            'description' => 'Maxi scooter premium dengan performa tinggi',
            'is_active' => true
        ]);

        // XMAX Models
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
                'jumlah_silinder' => '1 Silinder',
                'diameter_langkah' => '69.0 mm x 66.2 mm',
                'kapasitas_mesin' => '249 cc',
                'daya_maksimum' => '15.3 kW (20.6 PS) / 8,000 rpm',
                'torsi_maksimum' => '20.6 Nm / 6,500 rpm',
                'sistem_starter' => 'Electric Starter',
                'sistem_pelumasan' => 'Wet Sump',
                'kapasitas_oli_mesin' => '1.4 L',
                'sistem_bahan_bakar' => 'Fuel Injection',
                'tipe_kopling' => 'Automatic Centrifugal Clutch',
                'tipe_transmisi' => 'V-Belt Automatic',
                'perbandingan_kompresi' => '10.9 : 1',
                'tipe_rangka' => 'Underbone',
                'suspensi_depan' => 'Telescopic Fork',
                'suspensi_belakang' => 'Swing Arm dengan Monoshock',
                'tipe_ban' => 'Tubeless',
                'ban_depan' => '120/70-15M/C 56H',
                'ban_belakang' => '140/70-14M/C 68P',
                'rem_depan' => 'Hydraulic Dual Disc with ABS',
                'rem_belakang' => 'Hydraulic Single Disc',
                'kapasitas_tangki' => '13.2 L',
                'pxlxt' => '2,185 mm x 775 mm x 1,415 mm',
                'jarak_sumbu_roda' => '1,540 mm',
                'jarak_terendah_tanah' => '140 mm',
                'tinggi_tempat_duduk' => '795 mm',
                'berat_isi' => '179 kg',
                'sistem_pengapian' => 'TCI',
                'tipe_baterai' => '12V, 8.6Ah',
                'tipe_busi' => 'NGK CPR8E'
            ],
            'is_featured' => true,
            'is_active' => true
        ]);

        // XMAX 250 Variants (Colors)
        MotorVariant::create([
            'motor_model_id' => $xmax250->id,
            'color_name' => 'Crystal Graphite',
            'color_code' => '#6c757d',
            'price_difference' => 0,
            'is_available' => true
        ]);

        MotorVariant::create([
            'motor_model_id' => $xmax250->id,
            'color_name' => 'Matte Black',
            'color_code' => '#212529',
            'price_difference' => 0,
            'is_available' => true
        ]);

        MotorVariant::create([
            'motor_model_id' => $xmax250->id,
            'color_name' => 'Icon Blue',
            'color_code' => '#1e3c72',
            'price_difference' => 0,
            'is_available' => true
        ]);
    }
}