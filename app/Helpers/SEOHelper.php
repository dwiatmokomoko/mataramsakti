<?php

namespace App\Helpers;

class SEOHelper
{
    public static function generateTitle($title = null, $suffix = true)
    {
        $baseTitle = 'Dealer Yamaha Jogja Wates Sleman Bantul Gunungkidul - Yamaha Mataram Sakti | Harga Motor 2026 OTR Termurah';
        
        if (!$title) {
            return $baseTitle;
        }
        
        if ($suffix) {
            return $title . ' | ' . $baseTitle;
        }
        
        return $title;
    }
    
    public static function generateDescription($description = null)
    {
        $defaultDescription = 'Dealer Yamaha Jogja Wates Sleman Bantul Gunungkidul - Yamaha Mataram Sakti adalah dealer resmi motor Yamaha terpercaya. Showroom terdekat di Wates, Kulon Progo. Harga OTR 2026 NMAX, Aerox, Fazzio, R15, Vixion, XSR155, Lexi, XMAX, MT15, Grand Filano termurah se-Jogja. Promo DP 0%, DP 500rb, DP 1 juta, kredit tanpa survey, cicilan ringan mulai 500rb/bulan. Melayani Wates, Sentolo, Nanggulan, Galur, Pengasih, Sleman, Depok, Godean, Bantul, Sewon, Kasihan, Gunungkidul, Wonosari. Sales Yamaha Mataram Sakti 24 Jam WA 0856-4195-6326. Ready stock semua tipe! Buka Senin-Minggu 08:00-17:00.';
        
        return $description ?: $defaultDescription;
    }
    
    public static function generateKeywords($keywords = [])
    {
        $defaultKeywords = [
            // ========================================
            // TIER 0: BRAND NAME - ULTRA CRITICAL
            // ========================================
            'yamaha mataram sakti',
            'yamaha mataram sakti jogja',
            'yamaha mataram sakti wates',
            'yamaha mataram sakti kulon progo',
            'yamaha mataram sakti sleman',
            'yamaha mataram sakti bantul',
            'yamaha mataram sakti gunungkidul',
            'dealer yamaha mataram sakti',
            'dealer yamaha mataram sakti jogja',
            'showroom yamaha mataram sakti',
            'showroom yamaha mataram sakti jogja',
            'motor yamaha mataram sakti',
            'harga motor yamaha mataram sakti',
            'promo yamaha mataram sakti',
            'kredit motor yamaha mataram sakti',
            'sales yamaha mataram sakti',
            'alamat yamaha mataram sakti',
            'kontak yamaha mataram sakti',
            'wa yamaha mataram sakti',
            'whatsapp yamaha mataram sakti',
            'mataram sakti jogja',
            'mataram sakti wates',
            'mataram sakti kulon progo',
            
            // ========================================
            // TIER 1: ULTRA HIGH PRIORITY - MULTI LOCATION
            // ========================================
            'dealer yamaha jogja wates sleman bantul',
            'dealer yamaha jogja wates sleman bantul gunungkidul',
            'yamaha jogja wates sleman bantul',
            'motor yamaha jogja wates sleman bantul',
            'showroom yamaha jogja wates sleman bantul',
            'harga motor yamaha jogja wates sleman bantul',
            
            // ========================================
            // TIER 2: WATES & KULON PROGO
            // ========================================
            'dealer yamaha wates',
            'yamaha wates',
            'showroom yamaha wates',
            'motor yamaha wates',
            'dealer resmi yamaha wates',
            'dealer yamaha kulon progo',
            'yamaha kulon progo',
            'showroom yamaha kulon progo',
            'motor yamaha kulon progo',
            'dealer resmi yamaha kulon progo',
            'harga motor yamaha wates 2026',
            'harga motor yamaha kulon progo 2026',
            'harga otr yamaha wates',
            'harga otr yamaha kulon progo',
            'promo yamaha wates',
            'promo yamaha kulon progo',
            'kredit motor yamaha wates',
            'kredit motor yamaha kulon progo',
            'yamaha wates terdekat',
            'yamaha kulon progo terdekat',
            'dealer yamaha terdekat wates',
            'dealer yamaha terdekat kulon progo',
            
            // Kecamatan di Kulon Progo (EXHAUSTIVE)
            'yamaha sentolo',
            'dealer yamaha sentolo',
            'motor yamaha sentolo',
            'harga motor yamaha sentolo',
            'yamaha nanggulan',
            'dealer yamaha nanggulan',
            'motor yamaha nanggulan',
            'yamaha galur',
            'dealer yamaha galur',
            'motor yamaha galur',
            'yamaha lendah',
            'dealer yamaha lendah',
            'motor yamaha lendah',
            'yamaha pengasih',
            'dealer yamaha pengasih',
            'motor yamaha pengasih',
            'yamaha panjatan',
            'dealer yamaha panjatan',
            'yamaha girimulyo',
            'dealer yamaha girimulyo',
            'yamaha kokap',
            'dealer yamaha kokap',
            'yamaha kalibawang',
            'dealer yamaha kalibawang',
            'yamaha samigaluh',
            'dealer yamaha samigaluh',
            'yamaha temon',
            'dealer yamaha temon',
            
            // ========================================
            // TIER 3: JOGJA GENERAL
            // ========================================
            'dealer yamaha jogja',
            'yamaha jogja',
            'dealer resmi yamaha jogja',
            'showroom motor yamaha jogja',
            'showroom yamaha jogja',
            'pusat yamaha jogja',
            'motor yamaha jogja',
            'yamaha motor jogja',
            'dealer yamaha yogyakarta',
            'yamaha yogyakarta',
            'showroom yamaha yogyakarta',
            'harga motor yamaha jogja 2026',
            'harga otr yamaha jogja 2026',
            'promo yamaha jogja 2026',
            'kredit motor yamaha jogja',
            'yamaha jogja terdekat',
            'dealer yamaha terdekat jogja',
            'dealer yamaha terdekat di jogja',
            'showroom yamaha terdekat jogja',
            'motor yamaha terdekat jogja',
            
            // ========================================
            // TIER 4: SLEMAN AREA (EXHAUSTIVE)
            // ========================================
            'dealer yamaha sleman',
            'yamaha sleman',
            'showroom yamaha sleman',
            'motor yamaha sleman',
            'harga motor yamaha sleman',
            'harga motor yamaha sleman 2026',
            'promo yamaha sleman',
            'kredit motor yamaha sleman',
            'dealer yamaha terdekat sleman',
            'yamaha depok sleman',
            'dealer yamaha depok',
            'motor yamaha depok',
            'yamaha seturan',
            'dealer yamaha seturan',
            'motor yamaha seturan',
            'yamaha gejayan',
            'dealer yamaha gejayan',
            'motor yamaha gejayan',
            'yamaha godean',
            'dealer yamaha godean',
            'motor yamaha godean',
            'yamaha kalasan',
            'dealer yamaha kalasan',
            'motor yamaha kalasan',
            'yamaha jalan magelang',
            'dealer yamaha jalan magelang',
            'yamaha jalan kaliurang',
            'dealer yamaha jalan kaliurang',
            'yamaha jakal',
            'dealer yamaha jakal',
            'yamaha mlati',
            'dealer yamaha mlati',
            'motor yamaha mlati',
            'yamaha gamping',
            'dealer yamaha gamping',
            'motor yamaha gamping',
            'yamaha ngaglik',
            'dealer yamaha ngaglik',
            'motor yamaha ngaglik',
            'yamaha seyegan',
            'dealer yamaha seyegan',
            'yamaha minggir',
            'dealer yamaha minggir',
            'yamaha moyudan',
            'dealer yamaha moyudan',
            'yamaha tempel',
            'dealer yamaha tempel',
            'yamaha turi',
            'dealer yamaha turi',
            'yamaha pakem',
            'dealer yamaha pakem',
            'yamaha cangkringan',
            'dealer yamaha cangkringan',
            'yamaha prambanan',
            'dealer yamaha prambanan',
            'motor yamaha prambanan',
            
            // ========================================
            // TIER 5: BANTUL AREA (EXHAUSTIVE)
            // ========================================
            'dealer yamaha bantul',
            'yamaha bantul',
            'showroom yamaha bantul',
            'motor yamaha bantul',
            'harga motor yamaha bantul',
            'harga motor yamaha bantul 2026',
            'promo yamaha bantul',
            'kredit motor yamaha bantul',
            'dealer yamaha terdekat bantul',
            'yamaha sewon',
            'dealer yamaha sewon',
            'motor yamaha sewon',
            'yamaha kasihan',
            'dealer yamaha kasihan',
            'motor yamaha kasihan',
            'yamaha jalan parangtritis',
            'dealer yamaha jalan parangtritis',
            'yamaha banguntapan',
            'dealer yamaha banguntapan',
            'motor yamaha banguntapan',
            'yamaha imogiri',
            'dealer yamaha imogiri',
            'motor yamaha imogiri',
            'yamaha pandak',
            'dealer yamaha pandak',
            'motor yamaha pandak',
            'yamaha bambanglipuro',
            'dealer yamaha bambanglipuro',
            'yamaha piyungan',
            'dealer yamaha piyungan',
            'motor yamaha piyungan',
            'yamaha pleret',
            'dealer yamaha pleret',
            'motor yamaha pleret',
            'yamaha jetis bantul',
            'dealer yamaha jetis bantul',
            'yamaha sanden',
            'dealer yamaha sanden',
            'yamaha kretek',
            'dealer yamaha kretek',
            'yamaha pundong',
            'dealer yamaha pundong',
            'yamaha dlingo',
            'dealer yamaha dlingo',
            'motor yamaha dlingo',
            
            // ========================================
            // TIER 6: GUNUNG KIDUL AREA (EXHAUSTIVE)
            // ========================================
            'dealer yamaha gunung kidul',
            'yamaha gunung kidul',
            'dealer yamaha gunungkidul',
            'yamaha gunungkidul',
            'showroom yamaha gunung kidul',
            'motor yamaha gunung kidul',
            'harga motor yamaha gunung kidul',
            'harga motor yamaha gunungkidul 2026',
            'promo yamaha gunung kidul',
            'kredit motor yamaha gunung kidul',
            'dealer yamaha terdekat gunung kidul',
            'yamaha wonosari',
            'dealer yamaha wonosari',
            'motor yamaha wonosari',
            'harga motor yamaha wonosari',
            'yamaha playen',
            'dealer yamaha playen',
            'motor yamaha playen',
            'yamaha gedangsari',
            'dealer yamaha gedangsari',
            'motor yamaha gedangsari',
            'yamaha nglipar',
            'dealer yamaha nglipar',
            'motor yamaha nglipar',
            'yamaha semanu',
            'dealer yamaha semanu',
            'motor yamaha semanu',
            'yamaha karangmojo',
            'dealer yamaha karangmojo',
            'yamaha ponjong',
            'dealer yamaha ponjong',
            'yamaha rongkop',
            'dealer yamaha rongkop',
            'yamaha semin',
            'dealer yamaha semin',
            'yamaha ngawen',
            'dealer yamaha ngawen',
            
            // ========================================
            // TIER 7: KOTA YOGYAKARTA
            // ========================================
            'yamaha kota yogyakarta',
            'dealer yamaha kota yogyakarta',
            'motor yamaha kota yogyakarta',
            'yamaha umbulharjo',
            'dealer yamaha umbulharjo',
            'motor yamaha umbulharjo',
            'yamaha kotagede',
            'dealer yamaha kotagede',
            'motor yamaha kotagede',
            'yamaha jetis',
            'dealer yamaha jetis',
            'motor yamaha jetis',
            'yamaha malioboro',
            'dealer yamaha malioboro',
            'yamaha gondokusuman',
            'dealer yamaha gondokusuman',
            'motor yamaha gondokusuman',
            'yamaha mergangsan',
            'dealer yamaha mergangsan',
            'yamaha mantrijeron',
            'dealer yamaha mantrijeron',
            'yamaha kraton',
            'dealer yamaha kraton',
            'yamaha pakualaman',
            'dealer yamaha pakualaman',
            'yamaha danurejan',
            'dealer yamaha danurejan',
            'yamaha gedongtengen',
            'dealer yamaha gedongtengen',
            'yamaha ngampilan',
            'dealer yamaha ngampilan',
            'yamaha wirobrajan',
            'dealer yamaha wirobrajan',
            'motor yamaha wirobrajan',
            'yamaha tegalrejo',
            'dealer yamaha tegalrejo',
            'motor yamaha tegalrejo',
            
            // ========================================
            // TIER 8: HARGA & PROMO (ULTRA SPECIFIC + EXHAUSTIVE)
            // ========================================
            // Harga Mataram Sakti
            'harga nmax mataram sakti',
            'harga aerox mataram sakti',
            'harga fazzio mataram sakti',
            'harga r15 mataram sakti',
            'harga xsr155 mataram sakti',
            'harga lexi mataram sakti',
            'harga xmax mataram sakti',
            'harga mt15 mataram sakti',
            'harga vixion mataram sakti',
            'harga grand filano mataram sakti',
            
            // Harga per Lokasi - NMAX
            'harga nmax wates',
            'harga nmax kulon progo',
            'harga nmax jogja',
            'harga nmax sleman',
            'harga nmax bantul',
            'harga nmax gunungkidul',
            'harga nmax wonosari',
            'harga nmax 2026 jogja',
            'harga nmax 2026 wates',
            'harga otr nmax jogja',
            'harga otr nmax wates',
            'harga cash nmax jogja',
            'harga kredit nmax jogja',
            
            // Harga per Lokasi - Aerox
            'harga aerox wates',
            'harga aerox kulon progo',
            'harga aerox jogja',
            'harga aerox sleman',
            'harga aerox bantul',
            'harga aerox gunungkidul',
            'harga aerox wonosari',
            'harga aerox 2026 jogja',
            'harga aerox 2026 wates',
            'harga otr aerox jogja',
            'harga otr aerox wates',
            'harga cash aerox jogja',
            'harga kredit aerox jogja',
            
            // Harga per Lokasi - Fazzio
            'harga fazzio wates',
            'harga fazzio kulon progo',
            'harga fazzio jogja',
            'harga fazzio sleman',
            'harga fazzio bantul',
            'harga fazzio gunungkidul',
            'harga fazzio 2026 jogja',
            'harga otr fazzio jogja',
            
            // Harga per Lokasi - R15
            'harga r15 wates',
            'harga r15 kulon progo',
            'harga r15 jogja',
            'harga r15 sleman',
            'harga r15 bantul',
            'harga r15 gunungkidul',
            'harga r15 2026 jogja',
            'harga otr r15 jogja',
            'harga r15 v4 jogja',
            
            // Harga per Lokasi - XSR155
            'harga xsr155 wates',
            'harga xsr155 kulon progo',
            'harga xsr155 jogja',
            'harga xsr155 sleman',
            'harga xsr155 bantul',
            'harga xsr155 2026 jogja',
            'harga otr xsr155 jogja',
            
            // Harga per Lokasi - Lexi
            'harga lexi wates',
            'harga lexi kulon progo',
            'harga lexi jogja',
            'harga lexi sleman',
            'harga lexi bantul',
            'harga lexi 2026 jogja',
            'harga otr lexi jogja',
            
            // Harga per Lokasi - XMAX
            'harga xmax wates',
            'harga xmax kulon progo',
            'harga xmax jogja',
            'harga xmax sleman',
            'harga xmax bantul',
            'harga xmax 2026 jogja',
            'harga otr xmax jogja',
            
            // Harga per Lokasi - MT15
            'harga mt15 wates',
            'harga mt15 kulon progo',
            'harga mt15 jogja',
            'harga mt15 sleman',
            'harga mt15 bantul',
            'harga mt15 2026 jogja',
            'harga otr mt15 jogja',
            
            // Harga per Lokasi - Vixion
            'harga vixion wates',
            'harga vixion kulon progo',
            'harga vixion jogja',
            'harga vixion sleman',
            'harga vixion bantul',
            'harga vixion 2026 jogja',
            'harga otr vixion jogja',
            
            // Harga per Lokasi - Grand Filano
            'harga grand filano wates',
            'harga grand filano kulon progo',
            'harga grand filano jogja',
            'harga grand filano sleman',
            'harga grand filano bantul',
            'harga grand filano 2026 jogja',
            
            // Harga per Lokasi - Gear 125
            'harga gear 125 wates',
            'harga gear 125 kulon progo',
            'harga gear 125 jogja',
            'harga gear 125 sleman',
            'harga gear 125 bantul',
            
            // Harga per Lokasi - Mio M3
            'harga mio m3 wates',
            'harga mio m3 kulon progo',
            'harga mio m3 jogja',
            'harga mio m3 sleman',
            'harga mio m3 bantul',
            
            // Harga per Lokasi - Fino
            'harga fino wates',
            'harga fino kulon progo',
            'harga fino jogja',
            'harga fino sleman',
            'harga fino bantul',
            
            // Harga per Lokasi - Soul GT
            'harga soul gt wates',
            'harga soul gt kulon progo',
            'harga soul gt jogja',
            'harga soul gt sleman',
            'harga soul gt bantul',
            
            // Promo Spesifik per Lokasi
            'promo motor yamaha wates',
            'promo motor yamaha kulon progo',
            'promo motor yamaha jogja',
            'promo motor yamaha sleman',
            'promo motor yamaha bantul',
            'promo motor yamaha gunungkidul',
            'promo yamaha wates 2026',
            'promo yamaha jogja 2026',
            'promo yamaha sleman 2026',
            'promo yamaha bantul 2026',
            'diskon yamaha wates',
            'diskon yamaha kulon progo',
            'diskon yamaha jogja',
            'diskon yamaha sleman',
            'diskon yamaha bantul',
            'cashback yamaha wates',
            'cashback yamaha kulon progo',
            'cashback yamaha jogja',
            'cashback yamaha sleman',
            'cashback yamaha bantul',
            'promo dp 0 yamaha jogja',
            'promo dp 0 yamaha wates',
            'promo dp murah yamaha jogja',
            'promo cicilan 0 yamaha jogja',
            'harga nmax kulon progo',
            'harga nmax jogja',
            'harga aerox wates',
            'harga aerox kulon progo',
            'harga aerox jogja',
            'harga fazzio wates',
            'harga fazzio kulon progo',
            'harga fazzio jogja',
            'harga r15 wates',
            'harga r15 kulon progo',
            'harga r15 jogja',
            'harga xsr155 wates',
            'harga xsr155 kulon progo',
            'harga xsr155 jogja',
            'harga lexi wates',
            'harga lexi kulon progo',
            'harga lexi jogja',
            'harga xmax wates',
            'harga xmax kulon progo',
            'harga xmax jogja',
            'harga mt15 wates',
            'harga mt15 kulon progo',
            'harga mt15 jogja',
            'harga grand filano wates',
            'harga grand filano kulon progo',
            'harga grand filano jogja',
            'harga gear 125 wates',
            'harga gear 125 kulon progo',
            'harga gear 125 jogja',
            'harga mio m3 wates',
            'harga mio m3 kulon progo',
            'harga mio m3 jogja',
            
            // Promo Spesifik
            'promo motor yamaha wates',
            'promo motor yamaha kulon progo',
            'promo motor yamaha jogja',
            'diskon yamaha wates',
            'diskon yamaha kulon progo',
            'diskon yamaha jogja',
            'cashback yamaha wates',
            'cashback yamaha kulon progo',
            'cashback yamaha jogja',
            
            // ========================================
            // TIER 9: KREDIT & FINANSIAL (ULTRA DETAILED + EXHAUSTIVE)
            // ========================================
            // Kredit Mataram Sakti
            'kredit motor yamaha mataram sakti',
            'kredit nmax mataram sakti',
            'kredit aerox mataram sakti',
            'kredit r15 mataram sakti',
            'kredit fazzio mataram sakti',
            'dp 0 yamaha mataram sakti',
            'dp murah yamaha mataram sakti',
            'cicilan ringan yamaha mataram sakti',
            'angsuran murah yamaha mataram sakti',
            
            // Kredit per Lokasi - General
            'kredit motor yamaha wates',
            'kredit motor yamaha kulon progo',
            'kredit motor yamaha jogja',
            'kredit nmax wates',
            'kredit nmax kulon progo',
            'kredit nmax jogja',
            'kredit aerox wates',
            'kredit aerox kulon progo',
            'kredit aerox jogja',
            'dp 0 yamaha wates',
            'dp 0 yamaha kulon progo',
            'dp 0 yamaha jogja',
            'dp 500rb yamaha wates',
            'dp 500rb yamaha kulon progo',
            'dp 500rb yamaha jogja',
            'dp 1 juta yamaha wates',
            'dp 1 juta yamaha kulon progo',
            'dp 1 juta yamaha jogja',
            'angsuran 500rb yamaha wates',
            'angsuran 500rb yamaha kulon progo',
            'angsuran 500rb yamaha jogja',
            'angsuran 1 juta yamaha wates',
            'angsuran 1 juta yamaha kulon progo',
            'angsuran 1 juta yamaha jogja',
            'cicilan ringan yamaha wates',
            'cicilan ringan yamaha kulon progo',
            'cicilan ringan yamaha jogja',
            'kredit tanpa survey wates',
            'kredit tanpa survey kulon progo',
            'kredit tanpa survey jogja',
            'kredit motor ktp luar wates',
            'kredit motor ktp luar kulon progo',
            'kredit motor ktp luar jogja',
            
            // Leasing Spesifik
            'kredit yamaha baf wates',
            'kredit yamaha baf kulon progo',
            'kredit yamaha baf jogja',
            'kredit yamaha adira wates',
            'kredit yamaha adira kulon progo',
            'kredit yamaha adira jogja',
            'kredit yamaha wom finance wates',
            'kredit yamaha wom finance kulon progo',
            'kredit yamaha wom finance jogja',
            'kredit yamaha bca finance wates',
            'kredit yamaha bca finance kulon progo',
            'kredit yamaha bca finance jogja',
            
            // ========================================
            // TIER 9: MODEL SPECIFIC (EXHAUSTIVE)
            // ========================================
            // NMAX Series
            'yamaha nmax mataram sakti',
            'nmax mataram sakti jogja',
            'yamaha nmax turbo mataram sakti',
            'yamaha nmax turbo wates',
            'yamaha nmax turbo kulon progo',
            'yamaha nmax turbo jogja',
            'nmax connected wates',
            'nmax connected kulon progo',
            'nmax connected jogja',
            'nmax tech max wates',
            'nmax tech max kulon progo',
            'nmax tech max jogja',
            
            // Aerox Series
            'yamaha aerox mataram sakti',
            'aerox mataram sakti jogja',
            'aerox 155 connected mataram sakti',
            'aerox 155 connected wates',
            'aerox 155 connected kulon progo',
            'aerox 155 connected jogja',
            'aerox s version wates',
            'aerox s version kulon progo',
            'aerox s version jogja',
            
            // Fazzio Series
            'fazzio hybrid connected wates',
            'fazzio hybrid connected kulon progo',
            'fazzio hybrid connected jogja',
            'fazzio neo wates',
            'fazzio neo kulon progo',
            'fazzio neo jogja',
            
            // R Series
            'yamaha r15 mataram sakti',
            'r15 mataram sakti jogja',
            'r15 connected mataram sakti',
            'r15 connected wates',
            'r15 connected kulon progo',
            'r15 connected jogja',
            'r15 v4 wates',
            'r15 v4 kulon progo',
            'r15 v4 jogja',
            'r25 wates',
            'r25 kulon progo',
            'r25 jogja',
            
            // ========================================
            // TIER 10: PERSONA & USE CASE
            // ========================================
            'motor yamaha untuk mahasiswa wates',
            'motor yamaha untuk mahasiswa kulon progo',
            'motor yamaha untuk mahasiswa jogja',
            'motor yamaha untuk ojol wates',
            'motor yamaha untuk ojol kulon progo',
            'motor yamaha untuk ojol jogja',
            'motor yamaha untuk wanita wates',
            'motor yamaha untuk wanita kulon progo',
            'motor yamaha untuk wanita jogja',
            'motor yamaha irit wates',
            'motor yamaha irit kulon progo',
            'motor yamaha irit jogja',
            'motor yamaha matic wates',
            'motor yamaha matic kulon progo',
            'motor yamaha matic jogja',
            'motor yamaha sport wates',
            'motor yamaha sport kulon progo',
            'motor yamaha sport jogja',
            
            // ========================================
            // TIER 11: LONG TAIL QUESTIONS
            // ========================================
            'alamat dealer yamaha mataram sakti',
            'nomor telepon yamaha mataram sakti',
            'jam buka yamaha mataram sakti',
            'cara ke yamaha mataram sakti',
            'dealer yamaha terdekat dari wates',
            'dealer yamaha terdekat dari kulon progo',
            'dealer yamaha terdekat dari jogja',
            'alamat dealer yamaha di wates',
            'alamat dealer yamaha di kulon progo',
            'alamat dealer yamaha di jogja',
            'nomor telepon dealer yamaha wates',
            'nomor telepon dealer yamaha kulon progo',
            'nomor telepon dealer yamaha jogja',
            'jam buka dealer yamaha wates',
            'jam buka dealer yamaha kulon progo',
            'jam buka dealer yamaha jogja',
            'cara ke dealer yamaha wates',
            'cara ke dealer yamaha kulon progo',
            'cara ke dealer yamaha jogja',
            
            // ========================================
            // TIER 12: SERVICE & SPARE PART
            // ========================================
            'service yamaha mataram sakti',
            'bengkel yamaha mataram sakti',
            'spare part yamaha mataram sakti',
            'service yamaha wates',
            'service yamaha kulon progo',
            'service yamaha jogja',
            'bengkel yamaha wates',
            'bengkel yamaha kulon progo',
            'bengkel yamaha jogja',
            'spare part yamaha wates',
            'spare part yamaha kulon progo',
            'spare part yamaha jogja',
            'oli yamalube wates',
            'oli yamalube kulon progo',
            'oli yamalube jogja',
            
            // ========================================
            // TIER 13: COMPARISON KEYWORDS
            // ========================================
            'nmax vs pcx wates',
            'nmax vs pcx kulon progo',
            'nmax vs pcx jogja',
            'aerox vs vario wates',
            'aerox vs vario kulon progo',
            'aerox vs vario jogja',
            'fazzio vs scoopy wates',
            'fazzio vs scoopy kulon progo',
            'fazzio vs scoopy jogja',
            
            // ========================================
            // TIER 14: TYPO & VARIATIONS
            // ========================================
            'yamaha yogya',
            'yamaha yogyakarta',
            'diler yamaha wates',
            'diler yamaha kulon progo',
            'diler yamaha jogja',
            'dealer yama wates',
            'dealer yama kulon progo',
            'dealer yama jogja',
            
            // ========================================
            // TIER 15: BRAND & TRUST SIGNALS
            // ========================================
            'dealer resmi yamaha mataram sakti',
            'dealer 3s yamaha mataram sakti',
            'yamaha motor indonesia mataram sakti',
            'sales yamaha mataram sakti',
            'marketing yamaha mataram sakti',
            'dealer resmi yamaha wates',
            'dealer resmi yamaha kulon progo',
            'dealer resmi yamaha jogja',
            'dealer 3s yamaha wates',
            'dealer 3s yamaha kulon progo',
            'dealer 3s yamaha jogja',
            'yamaha motor indonesia wates',
            'yamaha motor indonesia kulon progo',
            'yamaha motor indonesia jogja',
            'sales yamaha wates',
            'sales yamaha kulon progo',
            'sales yamaha jogja',
            'marketing yamaha wates',
            'marketing yamaha kulon progo',
            'marketing yamaha jogja',
            
            // ========================================
            // TIER 16: CONTACT & URGENCY
            // ========================================
            'wa dealer yamaha mataram sakti',
            'whatsapp yamaha mataram sakti',
            'kontak yamaha mataram sakti',
            'sales yamaha mataram sakti 24 jam',
            'ready stock yamaha mataram sakti',
            'indent yamaha mataram sakti',
            'wa dealer yamaha wates',
            'wa dealer yamaha kulon progo',
            'wa dealer yamaha jogja',
            'whatsapp yamaha wates',
            'whatsapp yamaha kulon progo',
            'whatsapp yamaha jogja',
            'kontak yamaha wates',
            'kontak yamaha kulon progo',
            'kontak yamaha jogja',
            'sales yamaha 24 jam wates',
            'sales yamaha 24 jam kulon progo',
            'sales yamaha 24 jam jogja',
            'ready stock yamaha wates',
            'ready stock yamaha kulon progo',
            'ready stock yamaha jogja',
            'indent yamaha wates',
            'indent yamaha kulon progo',
            'indent yamaha jogja',
            
            // ========================================
            // TIER 17: BUYING INTENT KEYWORDS (ULTRA DETAILED)
            // ========================================
            // Beli Motor
            'beli motor yamaha jogja',
            'beli motor yamaha wates',
            'beli motor yamaha sleman',
            'beli motor yamaha bantul',
            'beli motor yamaha gunungkidul',
            'beli nmax jogja',
            'beli aerox jogja',
            'beli r15 jogja',
            'beli vixion jogja',
            'beli motor yamaha cash jogja',
            'beli motor yamaha kredit jogja',
            'beli motor yamaha bekas jogja',
            'beli motor yamaha baru jogja',
            
            // Jual Motor
            'jual motor yamaha jogja',
            'jual motor yamaha wates',
            'jual nmax jogja',
            'jual aerox jogja',
            'jual r15 jogja',
            'jual motor yamaha murah jogja',
            'jual motor yamaha baru jogja',
            
            // Cari Motor
            'cari motor yamaha jogja',
            'cari dealer yamaha jogja',
            'cari showroom yamaha jogja',
            'cari motor yamaha murah jogja',
            'cari motor yamaha dp murah jogja',
            
            // Mau Beli
            'mau beli motor yamaha jogja',
            'mau kredit motor yamaha jogja',
            'mau beli nmax jogja',
            'mau beli aerox jogja',
            
            // ========================================
            // TIER 18: QUESTION KEYWORDS (LONG-TAIL)
            // ========================================
            'berapa harga nmax jogja',
            'berapa harga aerox jogja',
            'berapa harga r15 jogja',
            'berapa dp nmax jogja',
            'berapa cicilan nmax jogja',
            'berapa angsuran nmax jogja',
            'dimana beli motor yamaha jogja',
            'dimana dealer yamaha jogja',
            'dimana showroom yamaha jogja',
            'dimana dealer yamaha terdekat',
            'kapan promo yamaha jogja',
            'bagaimana cara kredit motor yamaha',
            'bagaimana cara beli motor yamaha',
            'apa syarat kredit motor yamaha',
            'apa promo yamaha jogja',
            
            // ========================================
            // TIER 19: COMPARISON KEYWORDS
            // ========================================
            'nmax vs pcx jogja',
            'aerox vs vario jogja',
            'r15 vs cbr jogja',
            'fazzio vs scoopy jogja',
            'xsr155 vs cb150r jogja',
            'perbandingan nmax pcx jogja',
            'perbandingan aerox vario jogja',
            'lebih bagus nmax atau pcx',
            'lebih irit nmax atau pcx',
            'lebih cepat aerox atau vario',
            'pilih nmax atau pcx jogja',
            'pilih aerox atau vario jogja',
            
            // ========================================
            // TIER 20: REVIEW & TESTIMONIAL KEYWORDS
            // ========================================
            'review nmax jogja',
            'review aerox jogja',
            'review r15 jogja',
            'review dealer yamaha jogja',
            'review yamaha mataram sakti',
            'testimoni yamaha mataram sakti',
            'pengalaman beli motor yamaha jogja',
            'pengalaman kredit motor yamaha jogja',
            'kelebihan nmax jogja',
            'kekurangan nmax jogja',
            'kelebihan aerox jogja',
            'kekurangan aerox jogja',
            
            // ========================================
            // TIER 21: SPECIFICATION KEYWORDS
            // ========================================
            'spesifikasi nmax 2026',
            'spesifikasi aerox 2026',
            'spesifikasi r15 2026',
            'spesifikasi vixion 2026',
            'spesifikasi lengkap nmax',
            'spesifikasi lengkap aerox',
            'fitur nmax 2026',
            'fitur aerox 2026',
            'teknologi nmax 2026',
            'teknologi aerox 2026',
            'mesin nmax 2026',
            'mesin aerox 2026',
            'cc nmax',
            'cc aerox',
            'cc r15',
            'tenaga nmax',
            'tenaga aerox',
            'top speed nmax',
            'top speed aerox',
            'konsumsi bbm nmax',
            'konsumsi bbm aerox',
            'irit nmax',
            'irit aerox',
            
            // ========================================
            // TIER 22: COLOR KEYWORDS
            // ========================================
            'warna nmax 2026',
            'warna aerox 2026',
            'warna r15 2026',
            'warna vixion 2026',
            'warna fazzio 2026',
            'warna baru nmax 2026',
            'warna baru aerox 2026',
            'warna terbaru nmax',
            'warna terbaru aerox',
            'pilihan warna nmax jogja',
            'pilihan warna aerox jogja',
            
            // ========================================
            // TIER 23: ACCESSORIES & SPARE PARTS
            // ========================================
            'aksesoris yamaha jogja',
            'aksesoris nmax jogja',
            'aksesoris aerox jogja',
            'spare part yamaha jogja',
            'spare part nmax jogja',
            'spare part aerox jogja',
            'onderdil yamaha jogja',
            'suku cadang yamaha jogja',
            'helm yamaha jogja',
            'jaket yamaha jogja',
            
            // ========================================
            // TIER 24: SERVICE KEYWORDS
            // ========================================
            'service yamaha mataram sakti',
            'service yamaha wates',
            'service yamaha jogja',
            'service nmax jogja',
            'service aerox jogja',
            'bengkel yamaha mataram sakti',
            'bengkel yamaha wates',
            'bengkel yamaha jogja',
            'servis berkala yamaha jogja',
            'ganti oli yamaha jogja',
            'tune up yamaha jogja',
            'spare part yamaha mataram sakti',
            'spare part original yamaha jogja',
            
            // ========================================
            // TIER 25: INSURANCE & WARRANTY
            // ========================================
            'asuransi motor yamaha jogja',
            'garansi motor yamaha jogja',
            'garansi yamaha mataram sakti',
            'asuransi nmax jogja',
            'asuransi aerox jogja',
            
            // ========================================
            // TIER 26: TRADE-IN KEYWORDS
            // ========================================
            'trade in motor yamaha jogja',
            'tukar tambah motor yamaha jogja',
            'tukar tambah motor lama jogja',
            'trade in nmax jogja',
            'trade in aerox jogja',
            'jual motor lama beli yamaha baru',
            'tukar tambah motor bekas jogja',
            
            // ========================================
            // TIER 27: EVENT & COMMUNITY
            // ========================================
            'event yamaha jogja',
            'komunitas yamaha jogja',
            'club nmax jogja',
            'club aerox jogja',
            'club r15 jogja',
            'gathering yamaha jogja',
            'touring yamaha jogja',
            
            // ========================================
            // TIER 28: URGENCY KEYWORDS
            // ========================================
            'motor yamaha ready stock jogja',
            'nmax ready stock jogja',
            'aerox ready stock jogja',
            'r15 ready stock jogja',
            'motor yamaha indent jogja',
            'motor yamaha cepat jogja',
            'beli motor yamaha hari ini',
            'promo yamaha hari ini',
            'diskon yamaha hari ini',
            
            // ========================================
            // TIER 29: SEASONAL KEYWORDS
            // ========================================
            'promo yamaha lebaran 2026',
            'promo yamaha tahun baru 2026',
            'promo yamaha akhir tahun',
            'promo yamaha ramadan 2026',
            'promo yamaha natal 2026',
            'promo yamaha imlek 2026',
            'promo yamaha kemerdekaan',
            
            // ========================================
            // TIER 30: DEMOGRAPHIC KEYWORDS
            // ========================================
            'motor yamaha untuk mahasiswa jogja',
            'motor yamaha untuk wanita jogja',
            'motor yamaha untuk ojol jogja',
            'motor yamaha untuk keluarga jogja',
            'motor yamaha untuk anak muda jogja',
            'motor yamaha untuk ibu rumah tangga',
            'motor yamaha untuk pekerja jogja',
            'motor yamaha murah untuk mahasiswa',
            'motor yamaha irit untuk ojol',
            
            // ========================================
            // TIER 31: PAYMENT METHOD KEYWORDS
            // ========================================
            'kredit motor yamaha baf jogja',
            'kredit motor yamaha adira jogja',
            'kredit motor yamaha wom finance jogja',
            'kredit motor yamaha bca finance jogja',
            'kredit motor yamaha mandiri jogja',
            'kredit motor yamaha acc jogja',
            'leasing motor yamaha jogja',
            'finance motor yamaha jogja',
            
            // ========================================
            // TIER 32: DOCUMENT KEYWORDS
            // ========================================
            'syarat kredit motor yamaha jogja',
            'syarat beli motor yamaha jogja',
            'dokumen kredit motor yamaha',
            'ktp luar kota beli motor yamaha jogja',
            'kredit motor yamaha ktp luar jogja',
            'bpkb motor yamaha jogja',
            'stnk motor yamaha jogja',
            
            // ========================================
            // TIER 33: TIME-BASED KEYWORDS
            // ========================================
            'dealer yamaha buka hari ini',
            'dealer yamaha buka minggu',
            'dealer yamaha buka 24 jam',
            'sales yamaha 24 jam jogja',
            'beli motor yamaha malam ini',
            'showroom yamaha buka sekarang',
            
            // ========================================
            // TIER 34: SOCIAL PROOF KEYWORDS
            // ========================================
            'dealer yamaha terpercaya jogja',
            'dealer yamaha resmi jogja',
            'dealer yamaha terbaik jogja',
            'dealer yamaha termurah jogja',
            'dealer yamaha terlengkap jogja',
            'showroom yamaha terbesar jogja',
            'yamaha mataram sakti terpercaya',
            'yamaha mataram sakti resmi',
            
            // ========================================
            // TIER 35: MOBILE & ONLINE KEYWORDS
            // ========================================
            'beli motor yamaha online jogja',
            'kredit motor yamaha online jogja',
            'simulasi kredit motor yamaha online',
            'harga motor yamaha online jogja',
            'booking motor yamaha online jogja',
            'pesan motor yamaha online jogja',
            'wa dealer yamaha jogja',
            'whatsapp yamaha mataram sakti',
            'chat dealer yamaha jogja',
            'kontak dealer yamaha jogja',
            'nomor dealer yamaha jogja',
            'telepon dealer yamaha jogja'
        ];
        
        $allKeywords = array_merge($defaultKeywords, $keywords);
        return implode(', ', array_unique($allKeywords));
    }
    
    public static function generateCanonicalUrl($url = null)
    {
        return $url ?: request()->url();
    }
    
    public static function generateOpenGraphData($data = [])
    {
        $defaults = [
            'title' => 'Yamaha Mataram Sakti Jogja - Dealer Resmi Motor Yamaha | Harga OTR 2026 Termurah',
            'description' => 'Dealer resmi Yamaha Mataram Sakti Jogja. Jual motor Yamaha terbaru 2026 dengan harga OTR Jogja terbaik, promo DP murah, cicilan 0%. Melayani Wates, Sleman, Bantul, Kulon Progo, Gunung Kidul.',
            'image' => asset('images/yamaha-og-image.jpg'),
            'url' => request()->url(),
            'type' => 'website',
            'site_name' => 'Yamaha Jogja'
        ];
        
        return array_merge($defaults, $data);
    }
    
    public static function generateTwitterCardData($data = [])
    {
        $defaults = [
            'card' => 'summary_large_image',
            'title' => 'Yamaha Mataram Sakti Jogja - Dealer Resmi Motor Yamaha | Harga OTR 2026 Termurah',
            'description' => 'Dealer resmi Yamaha Mataram Sakti Jogja. Jual motor Yamaha terbaru 2026 dengan harga OTR Jogja terbaik, promo DP murah, cicilan 0%.',
            'image' => asset('images/yamaha-twitter-card.jpg'),
            'site' => '@YamahaMotorID'
        ];
        
        return array_merge($defaults, $data);
    }
    
    public static function generateStructuredData($type = 'Organization', $data = [])
    {
        switch ($type) {
            case 'Organization':
                return [
                    '@context' => 'https://schema.org',
                    '@type' => 'Organization',
                    'name' => 'Yamaha Mataram Sakti',
                    'alternateName' => 'Dealer Yamaha Mataram Sakti Jogja',
                    'url' => config('app.url'),
                    'logo' => asset('images/yamaha-logo.png'),
                    'description' => 'Dealer resmi Yamaha Mataram Sakti di Wates, Kulon Progo, Yogyakarta. Melayani penjualan motor Yamaha, service, spare part, dan aksesoris.',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => 'Jl. Raya Wates',
                        'addressLocality' => 'Wates',
                        'addressRegion' => 'Kulon Progo, D.I. Yogyakarta',
                        'postalCode' => '55611',
                        'addressCountry' => 'ID'
                    ],
                    'geo' => [
                        '@type' => 'GeoCoordinates',
                        'latitude' => '-7.8567',
                        'longitude' => '110.1594'
                    ],
                    'contactPoint' => [
                        '@type' => 'ContactPoint',
                        'telephone' => '+62-856-4195-6326',
                        'contactType' => 'customer service',
                        'areaServed' => 'ID',
                        'availableLanguage' => ['Indonesian', 'Javanese']
                    ],
                    'sameAs' => [
                        'https://www.facebook.com/YamahaMotorID',
                        'https://www.instagram.com/yamaha_motor_id',
                        'https://www.youtube.com/YamahaMotorID'
                    ]
                ];
                
            case 'Product':
                return array_merge([
                    '@context' => 'https://schema.org',
                    '@type' => 'Product',
                    'brand' => [
                        '@type' => 'Brand',
                        'name' => 'Yamaha'
                    ],
                    'manufacturer' => [
                        '@type' => 'Organization',
                        'name' => 'Yamaha Motor Co., Ltd.'
                    ]
                ], $data);
                
            case 'LocalBusiness':
                return array_merge([
                    '@context' => 'https://schema.org',
                    '@type' => 'MotorcycleDealer',
                    'name' => 'Yamaha Mataram Sakti',
                    'alternateName' => 'Dealer Yamaha Mataram Sakti Jogja',
                    'url' => config('app.url'),
                    'description' => 'Dealer resmi Yamaha Mataram Sakti di Wates, Kulon Progo, Yogyakarta. Jual motor Yamaha terbaru, service berkala, spare part original, dan aksesoris.',
                    'image' => asset('images/yamaha-showroom.jpg'),
                    'priceRange' => 'Rp 15.000.000 - Rp 500.000.000',
                    'telephone' => '+62-856-4195-6326',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => 'Jl. Raya Wates',
                        'addressLocality' => 'Wates',
                        'addressRegion' => 'Kulon Progo, D.I. Yogyakarta',
                        'postalCode' => '55611',
                        'addressCountry' => 'ID'
                    ],
                    'geo' => [
                        '@type' => 'GeoCoordinates',
                        'latitude' => '-7.8567',
                        'longitude' => '110.1594'
                    ],
                    'openingHoursSpecification' => [
                        [
                            '@type' => 'OpeningHoursSpecification',
                            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                            'opens' => '08:00',
                            'closes' => '17:00'
                        ]
                    ],
                    'areaServed' => [
                        ['@type' => 'City', 'name' => 'Wates'],
                        ['@type' => 'City', 'name' => 'Sentolo'],
                        ['@type' => 'City', 'name' => 'Nanggulan'],
                        ['@type' => 'City', 'name' => 'Galur'],
                        ['@type' => 'City', 'name' => 'Lendah'],
                        ['@type' => 'City', 'name' => 'Pengasih'],
                        ['@type' => 'City', 'name' => 'Panjatan'],
                        ['@type' => 'City', 'name' => 'Girimulyo'],
                        ['@type' => 'City', 'name' => 'Kokap'],
                        ['@type' => 'City', 'name' => 'Kalibawang'],
                        ['@type' => 'City', 'name' => 'Samigaluh'],
                        ['@type' => 'City', 'name' => 'Kulon Progo']
                    ],
                    'paymentAccepted' => 'Cash, Credit Card, Bank Transfer, Leasing',
                    'currenciesAccepted' => 'IDR'
                ], $data);
                
            default:
                return $data;
        }
    }
}