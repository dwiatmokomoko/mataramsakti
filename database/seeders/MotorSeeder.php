<?php

namespace Database\Seeders;

use App\Models\Motor;
use Illuminate\Database\Seeder;

class MotorSeeder extends Seeder
{
    public function run(): void
    {
        $motors = [
            // MAXI SCOOTER
            [
                'name' => 'TMAX',
                'model' => 'TMAX 560',
                'description' => 'The ultimate maxi scooter with premium performance and luxury features.',
                'price_otr' => 455000000,
                'price_dp' => 45500000,
                'price_installment' => 12500000,
                'category' => 'Maxi',
                'is_featured' => true,
                'is_active' => true,
                'specifications' => [
                    // Engine
                    'tipe_mesin' => '4 Langkah, berpendingin cairan, DOHC 4 katup',
                    'jumlah_silinder' => '2 Silinder Sejajar',
                    'diameter_langkah' => '70 x 73 mm',
                    'kapasitas_mesin' => '562cc',
                    'daya_maksimum' => '34,7 kW (47,2 PS) / 7000 rpm',
                    'torsi_maksimum' => '56,2 Nm / 5250 rpm',
                    'sistem_starter' => 'Electric Starter',
                    'sistem_pelumasan' => 'Pelumasan Basah',
                    'kapasitas_oli_mesin' => '3,4 L',
                    'sistem_bahan_bakar' => 'Fuel Injection',
                    'tipe_kopling' => 'Kopling Otomatis Sentrifugal',
                    'tipe_transmisi' => 'V-Belt Otomatis',
                    'perbandingan_kompresi' => '10,9 : 1',
                    // Chassis
                    'tipe_rangka' => 'Backbone',
                    'suspensi_depan' => 'Telescopic Fork',
                    'suspensi_belakang' => 'Unit Swing dengan Link',
                    'tipe_ban' => 'Tubeless',
                    'ban_depan' => '120/70-15M/C 56H',
                    'ban_belakang' => '160/60-15M/C 67H',
                    'rem_depan' => 'Disc Brake dengan ABS',
                    'rem_belakang' => 'Disc Brake dengan ABS',
                    // Dimensions
                    'kapasitas_tangki_bensin' => '15 L',
                    'pxlxt' => '2200mm x 795mm x 1420mm',
                    'jarak_sumbu_roda' => '1575mm',
                    'jarak_terendah_tanah' => '135mm',
                    'tinggi_tempat_duduk' => '800mm',
                    'berat_isi' => '220 Kg',
                    // Electrical
                    'sistem_pengapian' => 'TCI',
                    'tipe_baterai' => 'YTZ14S',
                    'tipe_busi' => 'NGK/CPR8EA-9'
                ]
            ],
            [
                'name' => 'XMAX 250',
                'model' => 'XMAX 250',
                'description' => 'Premium maxi scooter with sporty design and advanced technology.',
                'price_otr' => 68215000,
                'price_dp' => 6821500,
                'price_installment' => 1900000,
                'category' => 'Maxi',
                'is_featured' => true,
                'is_active' => true,
                'specifications' => [
                    // Engine
                    'tipe_mesin' => '4 Langkah, berpendingin cairan, SOHC 4 katup',
                    'jumlah_silinder' => 'Silinder Tunggal',
                    'diameter_langkah' => '70 x 64,9 mm',
                    'kapasitas_mesin' => '249cc',
                    'daya_maksimum' => '15,3 kW (20,8 PS) / 7500 rpm',
                    'torsi_maksimum' => '20,1 Nm / 7000 rpm',
                    'sistem_starter' => 'Electric Starter',
                    'sistem_pelumasan' => 'Pelumasan Basah',
                    'kapasitas_oli_mesin' => '1,65 L',
                    'sistem_bahan_bakar' => 'Fuel Injection',
                    'tipe_kopling' => 'Kopling Otomatis Sentrifugal',
                    'tipe_transmisi' => 'V-Belt Otomatis',
                    'perbandingan_kompresi' => '10,9 : 1',
                    // Chassis
                    'tipe_rangka' => 'Underbone',
                    'suspensi_depan' => 'Telescopic Fork',
                    'suspensi_belakang' => 'Unit Swing',
                    'tipe_ban' => 'Tubeless',
                    'ban_depan' => '110/80-14M/C 59P',
                    'ban_belakang' => '130/70-13M/C 63P',
                    'rem_depan' => 'Disc Brake dengan ABS',
                    'rem_belakang' => 'Disc Brake',
                    // Dimensions
                    'kapasitas_tangki_bensin' => '7,5 L',
                    'pxlxt' => '2020mm x 775mm x 1355mm',
                    'jarak_sumbu_roda' => '1425mm',
                    'jarak_terendah_tanah' => '145mm',
                    'tinggi_tempat_duduk' => '795mm',
                    'berat_isi' => '179 Kg',
                    // Electrical
                    'sistem_pengapian' => 'TCI',
                    'tipe_baterai' => 'YTZ7V',
                    'tipe_busi' => 'NGK/CPR8EA-9'
                ]
            ],
            [
                'name' => 'NMAX TURBO',
                'model' => 'NMAX TURBO TECH MAX',
                'description' => 'Advanced maxi scooter with turbo technology and smart features.',
                'price_otr' => 38650000,
                'price_dp' => 3865000,
                'price_installment' => 1706000,
                'category' => 'Maxi',
                'is_featured' => true,
                'is_active' => true,
                'specifications' => [
                    // Engine
                    'tipe_mesin' => '4 Langkah, berpendingin cairan, SOHC 4 katup, VVA',
                    'jumlah_silinder' => 'Silinder Tunggal',
                    'diameter_langkah' => '58 x 58,7 mm',
                    'kapasitas_mesin' => '155,09cc',
                    'daya_maksimum' => '11,3 kW (15,4 PS) / 8000 rpm',
                    'torsi_maksimum' => '14,2 Nm / 8000 rpm',
                    'sistem_starter' => 'Electric Starter',
                    'sistem_pelumasan' => 'Pelumasan Basah',
                    'kapasitas_oli_mesin' => '1,00 L (TURBO & TURBO Ultimate), 0,90 L (Standard & CyberCity)',
                    'sistem_bahan_bakar' => 'Fuel Injection',
                    'tipe_kopling' => 'Kopling sentrifugal, Kering',
                    'tipe_transmisi' => 'V-Belt Otomatis / YECVT (TURBO & TURBO Ultimate)',
                    'perbandingan_kompresi' => '11,6 : 1',
                    // Chassis
                    'tipe_rangka' => 'Underbone',
                    'suspensi_depan' => 'Telescopic with 30mm Inner Tubes',
                    'suspensi_belakang' => 'Unit Swing',
                    'tipe_ban' => 'Tubeless',
                    'ban_depan' => '110/80-14/C 53P',
                    'ban_belakang' => '140/70-14/C 62P',
                    'rem_depan' => 'Disc Brake',
                    'rem_belakang' => 'Disc Brake',
                    // Dimensions
                    'kapasitas_tangki_bensin' => '5,5 L',
                    'pxlxt' => '1980mm x 710mm x 1170mm',
                    'jarak_sumbu_roda' => '1350mm',
                    'jarak_terendah_tanah' => '145mm',
                    'tinggi_tempat_duduk' => '790mm',
                    'berat_isi' => '130 Kg (TURBO & TURBO Ultimate), 127 Kg (CyberCity), 124 Kg (Standard)',
                    // Electrical
                    'sistem_pengapian' => 'TCI',
                    'tipe_baterai' => 'YTZ77V (TURBO & TURBO Ultimate), YTZ76V (Standard & CyberCity)',
                    'tipe_busi' => 'NGK/CPR8EA-9'
                ]
            ],

            // MATIC
            [
                'name' => 'FreeGo',
                'model' => 'FreeGo 125',
                'description' => 'Stylish and efficient automatic scooter for urban mobility.',
                'price_otr' => 22730000,
                'price_dp' => 2273000,
                'price_installment' => 1054000,
                'category' => 'Matic',
                'is_featured' => false,
                'is_active' => true,
                'specifications' => [
                    // Engine
                    'tipe_mesin' => '4 Langkah, berpendingin udara, SOHC 2 katup',
                    'jumlah_silinder' => 'Silinder Tunggal',
                    'diameter_langkah' => '52,4 x 57,9 mm',
                    'kapasitas_mesin' => '124,8cc',
                    'daya_maksimum' => '6,6 kW (8,9 PS) / 7000 rpm',
                    'torsi_maksimum' => '9,6 Nm / 5500 rpm',
                    'sistem_starter' => 'Electric & Kick Starter',
                    'sistem_pelumasan' => 'Pelumasan Basah',
                    'kapasitas_oli_mesin' => '0,8 L',
                    'sistem_bahan_bakar' => 'Fuel Injection',
                    'tipe_kopling' => 'Kopling Otomatis Sentrifugal',
                    'tipe_transmisi' => 'V-Belt Otomatis',
                    'perbandingan_kompresi' => '9,5 : 1',
                    // Chassis
                    'tipe_rangka' => 'Underbone',
                    'suspensi_depan' => 'Telescopic Fork',
                    'suspensi_belakang' => 'Unit Swing',
                    'tipe_ban' => 'Tubeless',
                    'ban_depan' => '80/90-14M/C 40P',
                    'ban_belakang' => '90/90-14M/C 46P',
                    'rem_depan' => 'Disc Brake',
                    'rem_belakang' => 'Drum Brake',
                    // Dimensions
                    'kapasitas_tangki_bensin' => '4,2 L',
                    'pxlxt' => '1845mm x 665mm x 1095mm',
                    'jarak_sumbu_roda' => '1265mm',
                    'jarak_terendah_tanah' => '135mm',
                    'tinggi_tempat_duduk' => '775mm',
                    'berat_isi' => '103 Kg',
                    // Electrical
                    'sistem_pengapian' => 'TCI',
                    'tipe_baterai' => 'YTZ5S',
                    'tipe_busi' => 'NGK/CPR7EA-9'
                ]
            ],
            [
                'name' => 'Gear 125',
                'model' => 'Gear Ultima 125',
                'description' => 'Reliable and fuel-efficient scooter for daily commuting.',
                'price_otr' => 19750000,
                'price_dp' => 1975000,
                'price_installment' => 822000,
                'category' => 'Matic',
                'is_featured' => false,
                'is_active' => true,
                'specifications' => [
                    // Engine
                    'tipe_mesin' => '4 Langkah, berpendingin udara, SOHC 2 katup',
                    'jumlah_silinder' => 'Silinder Tunggal',
                    'diameter_langkah' => '52,4 x 57,9 mm',
                    'kapasitas_mesin' => '124,8cc',
                    'daya_maksimum' => '6,1 kW (8,2 PS) / 6500 rpm',
                    'torsi_maksimum' => '9,7 Nm / 5000 rpm',
                    'sistem_starter' => 'Electric & Kick Starter',
                    'sistem_pelumasan' => 'Pelumasan Basah',
                    'kapasitas_oli_mesin' => '0,8 L',
                    'sistem_bahan_bakar' => 'Karburator',
                    'tipe_kopling' => 'Kopling Otomatis Sentrifugal',
                    'tipe_transmisi' => 'V-Belt Otomatis',
                    'perbandingan_kompresi' => '9,5 : 1',
                    // Chassis
                    'tipe_rangka' => 'Underbone',
                    'suspensi_depan' => 'Telescopic Fork',
                    'suspensi_belakang' => 'Unit Swing',
                    'tipe_ban' => 'Tube Type',
                    'ban_depan' => '70/90-14 34P',
                    'ban_belakang' => '80/90-14 40P',
                    'rem_depan' => 'Drum Brake',
                    'rem_belakang' => 'Drum Brake',
                    // Dimensions
                    'kapasitas_tangki_bensin' => '4,2 L',
                    'pxlxt' => '1840mm x 650mm x 1040mm',
                    'jarak_sumbu_roda' => '1265mm',
                    'jarak_terendah_tanah' => '135mm',
                    'tinggi_tempat_duduk' => '765mm',
                    'berat_isi' => '98 Kg',
                    // Electrical
                    'sistem_pengapian' => 'CDI',
                    'tipe_baterai' => 'YB3L-A',
                    'tipe_busi' => 'NGK/C7HSA'
                ]
            ],

            // SPORT
            [
                'name' => 'R15M',
                'model' => 'All New R15M',
                'description' => 'Racing-inspired sport bike with MotoGP DNA.',
                'price_otr' => 39680000,
                'price_dp' => 3968000,
                'price_installment' => 1743000,
                'category' => 'Sport',
                'is_featured' => true,
                'is_active' => true,
                'specifications' => [
                    // Engine
                    'tipe_mesin' => '4 Langkah, berpendingin cairan, SOHC 4 katup, VVA',
                    'jumlah_silinder' => 'Silinder Tunggal',
                    'diameter_langkah' => '58 x 58,7 mm',
                    'kapasitas_mesin' => '155,09cc',
                    'daya_maksimum' => '13,8 kW (18,6 PS) / 10000 rpm',
                    'torsi_maksimum' => '14,2 Nm / 8500 rpm',
                    'sistem_starter' => 'Electric Starter',
                    'sistem_pelumasan' => 'Pelumasan Basah',
                    'kapasitas_oli_mesin' => '1,05 L',
                    'sistem_bahan_bakar' => 'Fuel Injection',
                    'tipe_kopling' => 'Kopling Manual Basah',
                    'tipe_transmisi' => '6 Percepatan',
                    'perbandingan_kompresi' => '11,6 : 1',
                    // Chassis
                    'tipe_rangka' => 'Deltabox',
                    'suspensi_depan' => 'Telescopic Fork',
                    'suspensi_belakang' => 'Swingarm dengan Link',
                    'tipe_ban' => 'Tubeless',
                    'ban_depan' => '100/80-17M/C 52P',
                    'ban_belakang' => '140/70-17M/C 66H',
                    'rem_depan' => 'Disc Brake dengan ABS',
                    'rem_belakang' => 'Disc Brake',
                    // Dimensions
                    'kapasitas_tangki_bensin' => '11 L',
                    'pxlxt' => '1990mm x 725mm x 1135mm',
                    'jarak_sumbu_roda' => '1325mm',
                    'jarak_terendah_tanah' => '155mm',
                    'tinggi_tempat_duduk' => '815mm',
                    'berat_isi' => '142 Kg',
                    // Electrical
                    'sistem_pengapian' => 'TCI',
                    'tipe_baterai' => 'YTZ7V',
                    'tipe_busi' => 'NGK/CPR8EA-9'
                ]
            ],
            [
                'name' => 'MT-15',
                'model' => 'MT-15',
                'description' => 'Naked sport bike with aggressive styling and performance.',
                'price_otr' => 33760000,
                'price_dp' => 3376000,
                'price_installment' => 1480000,
                'category' => 'Sport',
                'is_featured' => false,
                'is_active' => true,
                'specifications' => [
                    // Engine
                    'tipe_mesin' => '4 Langkah, berpendingin cairan, SOHC 4 katup, VVA',
                    'jumlah_silinder' => 'Silinder Tunggal',
                    'diameter_langkah' => '58 x 58,7 mm',
                    'kapasitas_mesin' => '155,09cc',
                    'daya_maksimum' => '13,8 kW (18,6 PS) / 10000 rpm',
                    'torsi_maksimum' => '14,2 Nm / 8500 rpm',
                    'sistem_starter' => 'Electric Starter',
                    'sistem_pelumasan' => 'Pelumasan Basah',
                    'kapasitas_oli_mesin' => '1,05 L',
                    'sistem_bahan_bakar' => 'Fuel Injection',
                    'tipe_kopling' => 'Kopling Manual Basah',
                    'tipe_transmisi' => '6 Percepatan',
                    'perbandingan_kompresi' => '11,6 : 1',
                    // Chassis
                    'tipe_rangka' => 'Deltabox',
                    'suspensi_depan' => 'Telescopic Fork',
                    'suspensi_belakang' => 'Swingarm dengan Monoshock',
                    'tipe_ban' => 'Tubeless',
                    'ban_depan' => '100/80-17M/C 52P',
                    'ban_belakang' => '140/70-17M/C 66H',
                    'rem_depan' => 'Disc Brake dengan ABS',
                    'rem_belakang' => 'Disc Brake',
                    // Dimensions
                    'kapasitas_tangki_bensin' => '10 L',
                    'pxlxt' => '2020mm x 800mm x 1065mm',
                    'jarak_sumbu_roda' => '1335mm',
                    'jarak_terendah_tanah' => '155mm',
                    'tinggi_tempat_duduk' => '810mm',
                    'berat_isi' => '138 Kg',
                    // Electrical
                    'sistem_pengapian' => 'TCI',
                    'tipe_baterai' => 'YTZ7V',
                    'tipe_busi' => 'NGK/CPR8EA-9'
                ]
            ],

            // CLASSY/BEBEK
            [
                'name' => 'Jupiter Z1',
                'model' => 'Jupiter Z1 CW',
                'description' => 'Classic underbone motorcycle with reliable performance.',
                'price_otr' => 21560000,
                'price_dp' => 2156000,
                'price_installment' => 1042000,
                'category' => 'Classy',
                'is_featured' => false,
                'is_active' => true,
                'specifications' => [
                    // Engine
                    'tipe_mesin' => '4 Langkah, berpendingin udara, SOHC 2 katup',
                    'jumlah_silinder' => 'Silinder Tunggal',
                    'diameter_langkah' => '50 x 57,9 mm',
                    'kapasitas_mesin' => '113,7cc',
                    'daya_maksimum' => '6,6 kW (8,9 PS) / 7500 rpm',
                    'torsi_maksimum' => '8,9 Nm / 6000 rpm',
                    'sistem_starter' => 'Electric & Kick Starter',
                    'sistem_pelumasan' => 'Pelumasan Basah',
                    'kapasitas_oli_mesin' => '0,8 L',
                    'sistem_bahan_bakar' => 'Karburator',
                    'tipe_kopling' => 'Kopling Manual Basah',
                    'tipe_transmisi' => '4 Percepatan',
                    'perbandingan_kompresi' => '9,5 : 1',
                    // Chassis
                    'tipe_rangka' => 'Underbone',
                    'suspensi_depan' => 'Telescopic Fork',
                    'suspensi_belakang' => 'Swingarm',
                    'tipe_ban' => 'Tube Type',
                    'ban_depan' => '70/90-17 38P',
                    'ban_belakang' => '80/90-17 44P',
                    'rem_depan' => 'Drum Brake',
                    'rem_belakang' => 'Drum Brake',
                    // Dimensions
                    'kapasitas_tangki_bensin' => '3,7 L',
                    'pxlxt' => '1930mm x 720mm x 1050mm',
                    'jarak_sumbu_roda' => '1235mm',
                    'jarak_terendah_tanah' => '145mm',
                    'tinggi_tempat_duduk' => '770mm',
                    'berat_isi' => '108 Kg',
                    // Electrical
                    'sistem_pengapian' => 'CDI',
                    'tipe_baterai' => 'YB3L-A',
                    'tipe_busi' => 'NGK/C7HSA'
                ]
            ],

            // OFF-ROAD
            [
                'name' => 'WR 155R',
                'model' => 'WR 155R',
                'description' => 'Adventure-ready off-road motorcycle for all terrains.',
                'price_otr' => 39790000,
                'price_dp' => 3979000,
                'price_installment' => 1893000,
                'category' => 'Off-Road',
                'is_featured' => false,
                'is_active' => true,
                'specifications' => [
                    // Engine
                    'tipe_mesin' => '4 Langkah, berpendingin cairan, SOHC 4 katup, VVA',
                    'jumlah_silinder' => 'Silinder Tunggal',
                    'diameter_langkah' => '58 x 58,7 mm',
                    'kapasitas_mesin' => '155,09cc',
                    'daya_maksimum' => '12,5 kW (16,9 PS) / 8500 rpm',
                    'torsi_maksimum' => '14,3 Nm / 7500 rpm',
                    'sistem_starter' => 'Electric & Kick Starter',
                    'sistem_pelumasan' => 'Pelumasan Basah',
                    'kapasitas_oli_mesin' => '1,25 L',
                    'sistem_bahan_bakar' => 'Fuel Injection',
                    'tipe_kopling' => 'Kopling Manual Basah',
                    'tipe_transmisi' => '6 Percepatan',
                    'perbandingan_kompresi' => '11,6 : 1',
                    // Chassis
                    'tipe_rangka' => 'Semi Double Cradle',
                    'suspensi_depan' => 'Telescopic Fork dengan Travel 230mm',
                    'suspensi_belakang' => 'Monoshock dengan Travel 220mm',
                    'tipe_ban' => 'Tube Type',
                    'ban_depan' => '80/100-21 51P',
                    'ban_belakang' => '120/80-18 62P',
                    'rem_depan' => 'Disc Brake',
                    'rem_belakang' => 'Disc Brake',
                    // Dimensions
                    'kapasitas_tangki_bensin' => '7,6 L',
                    'pxlxt' => '2185mm x 825mm x 1270mm',
                    'jarak_sumbu_roda' => '1420mm',
                    'jarak_terendah_tanah' => '285mm',
                    'tinggi_tempat_duduk' => '895mm',
                    'berat_isi' => '134 Kg',
                    // Electrical
                    'sistem_pengapian' => 'TCI',
                    'tipe_baterai' => 'YTZ7V',
                    'tipe_busi' => 'NGK/CPR8EA-9'
                ]
            ],

            // MOPED
            [
                'name' => 'Fino',
                'model' => 'Fino Grande Hybrid',
                'description' => 'Retro-styled moped with modern hybrid technology.',
                'price_otr' => 28180000,
                'price_dp' => 2818000,
                'price_installment' => 1233000,
                'category' => 'Moped',
                'is_featured' => false,
                'is_active' => true,
                'specifications' => [
                    // Engine
                    'tipe_mesin' => '4 Langkah, berpendingin udara, SOHC 2 katup, Hybrid',
                    'jumlah_silinder' => 'Silinder Tunggal',
                    'diameter_langkah' => '52,4 x 57,9 mm',
                    'kapasitas_mesin' => '124,8cc',
                    'daya_maksimum' => '6,0 kW (8,1 PS) / 6500 rpm',
                    'torsi_maksimum' => '9,7 Nm / 5000 rpm',
                    'sistem_starter' => 'Electric & Kick Starter',
                    'sistem_pelumasan' => 'Pelumasan Basah',
                    'kapasitas_oli_mesin' => '0,8 L',
                    'sistem_bahan_bakar' => 'Fuel Injection + Hybrid System',
                    'tipe_kopling' => 'Kopling Otomatis Sentrifugal',
                    'tipe_transmisi' => 'V-Belt Otomatis',
                    'perbandingan_kompresi' => '9,5 : 1',
                    // Chassis
                    'tipe_rangka' => 'Underbone',
                    'suspensi_depan' => 'Telescopic Fork',
                    'suspensi_belakang' => 'Unit Swing',
                    'tipe_ban' => 'Tubeless',
                    'ban_depan' => '80/90-14M/C 40P',
                    'ban_belakang' => '90/90-14M/C 46P',
                    'rem_depan' => 'Disc Brake',
                    'rem_belakang' => 'Drum Brake',
                    // Dimensions
                    'kapasitas_tangki_bensin' => '4,2 L',
                    'pxlxt' => '1845mm x 665mm x 1095mm',
                    'jarak_sumbu_roda' => '1265mm',
                    'jarak_terendah_tanah' => '135mm',
                    'tinggi_tempat_duduk' => '775mm',
                    'berat_isi' => '105 Kg',
                    // Electrical
                    'sistem_pengapian' => 'TCI',
                    'tipe_baterai' => 'YTZ5S',
                    'tipe_busi' => 'NGK/CPR7EA-9'
                ]
            ]
        ];

        foreach ($motors as $motor) {
            Motor::create($motor);
        }
    }
}
