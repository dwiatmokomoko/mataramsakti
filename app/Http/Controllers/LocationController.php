<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Helpers\SEOHelper;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Location data for all kecamatan in DIY
    private $locations = [
        // Kabupaten Kulon Progo
        'wates' => [
            'name' => 'Wates',
            'full_name' => 'Wates, Kulon Progo',
            'kabupaten' => 'Kulon Progo',
            'description' => 'Dealer resmi Yamaha Mataram Sakti berlokasi di Wates, Kulon Progo. Melayani penjualan motor Yamaha terbaru dengan harga OTR terbaik, promo DP murah, cicilan 0%, service berkala, dan spare part original.',
            'distance' => '0 km (Lokasi Utama)',
            'priority' => 'high'
        ],
        'temon' => ['name' => 'Temon', 'full_name' => 'Temon, Kulon Progo', 'kabupaten' => 'Kulon Progo', 'distance' => '8 km dari Wates'],
        'panjatan' => ['name' => 'Panjatan', 'full_name' => 'Panjatan, Kulon Progo', 'kabupaten' => 'Kulon Progo', 'distance' => '12 km dari Wates'],
        'galur' => ['name' => 'Galur', 'full_name' => 'Galur, Kulon Progo', 'kabupaten' => 'Kulon Progo', 'distance' => '6 km dari Wates'],
        'lendah' => ['name' => 'Lendah', 'full_name' => 'Lendah, Kulon Progo', 'kabupaten' => 'Kulon Progo', 'distance' => '10 km dari Wates'],
        'sentolo' => ['name' => 'Sentolo', 'full_name' => 'Sentolo, Kulon Progo', 'kabupaten' => 'Kulon Progo', 'distance' => '5 km dari Wates'],
        'pengasih' => ['name' => 'Pengasih', 'full_name' => 'Pengasih, Kulon Progo', 'kabupaten' => 'Kulon Progo', 'distance' => '7 km dari Wates'],
        'kokap' => ['name' => 'Kokap', 'full_name' => 'Kokap, Kulon Progo', 'kabupaten' => 'Kulon Progo', 'distance' => '15 km dari Wates'],
        'girimulyo' => ['name' => 'Girimulyo', 'full_name' => 'Girimulyo, Kulon Progo', 'kabupaten' => 'Kulon Progo', 'distance' => '18 km dari Wates'],
        'nanggulan' => ['name' => 'Nanggulan', 'full_name' => 'Nanggulan, Kulon Progo', 'kabupaten' => 'Kulon Progo', 'distance' => '9 km dari Wates'],
        'kalibawang' => ['name' => 'Kalibawang', 'full_name' => 'Kalibawang, Kulon Progo', 'kabupaten' => 'Kulon Progo', 'distance' => '20 km dari Wates'],
        'samigaluh' => ['name' => 'Samigaluh', 'full_name' => 'Samigaluh, Kulon Progo', 'kabupaten' => 'Kulon Progo', 'distance' => '22 km dari Wates'],
        
        // Kabupaten Gunungkidul
        'wonosari' => [
            'name' => 'Wonosari',
            'full_name' => 'Wonosari, Gunungkidul',
            'kabupaten' => 'Gunungkidul',
            'description' => 'Yamaha Mataram Sakti melayani wilayah Wonosari dan sekitar Gunungkidul. Dealer resmi motor Yamaha dengan harga OTR terbaik, promo DP murah, cicilan 0%, dan layanan purna jual terpercaya.',
            'distance' => '45 km dari Wates',
            'priority' => 'high'
        ],
        'playen' => ['name' => 'Playen', 'full_name' => 'Playen, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '35 km dari Wates'],
        'patuk' => ['name' => 'Patuk', 'full_name' => 'Patuk, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '30 km dari Wates'],
        'paliyan' => ['name' => 'Paliyan', 'full_name' => 'Paliyan, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '50 km dari Wates'],
        'panggang' => ['name' => 'Panggang', 'full_name' => 'Panggang, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '55 km dari Wates'],
        'tepus' => ['name' => 'Tepus', 'full_name' => 'Tepus, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '60 km dari Wates'],
        'semanu' => ['name' => 'Semanu', 'full_name' => 'Semanu, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '52 km dari Wates'],
        'karangmojo' => ['name' => 'Karangmojo', 'full_name' => 'Karangmojo, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '42 km dari Wates'],
        'ponjong' => ['name' => 'Ponjong', 'full_name' => 'Ponjong, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '48 km dari Wates'],
        'rongkop' => ['name' => 'Rongkop', 'full_name' => 'Rongkop, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '58 km dari Wates'],
        'semin' => ['name' => 'Semin', 'full_name' => 'Semin, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '46 km dari Wates'],
        'nglipar' => ['name' => 'Nglipar', 'full_name' => 'Nglipar, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '40 km dari Wates'],
        'ngawen' => ['name' => 'Ngawen', 'full_name' => 'Ngawen, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '38 km dari Wates'],
        'gedangsari' => ['name' => 'Gedangsari', 'full_name' => 'Gedangsari, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '35 km dari Wates'],
        'saptosari' => ['name' => 'Saptosari', 'full_name' => 'Saptosari, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '53 km dari Wates'],
        'girisubo' => ['name' => 'Girisubo', 'full_name' => 'Girisubo, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '65 km dari Wates'],
        'tanjungsari' => ['name' => 'Tanjungsari', 'full_name' => 'Tanjungsari, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '62 km dari Wates'],
        'purwosari' => ['name' => 'Purwosari', 'full_name' => 'Purwosari, Gunungkidul', 'kabupaten' => 'Gunungkidul', 'distance' => '44 km dari Wates'],
        
        // Kabupaten Bantul
        'bantul' => [
            'name' => 'Bantul',
            'full_name' => 'Bantul',
            'kabupaten' => 'Bantul',
            'description' => 'Yamaha Mataram Sakti melayani wilayah Bantul dan sekitarnya. Dealer resmi motor Yamaha dengan harga OTR terbaik, promo DP murah, cicilan 0%, dan layanan purna jual terpercaya.',
            'distance' => '25 km dari Wates',
            'priority' => 'high'
        ],
        'sewon' => ['name' => 'Sewon', 'full_name' => 'Sewon, Bantul', 'kabupaten' => 'Bantul', 'distance' => '22 km dari Wates'],
        'kasihan' => ['name' => 'Kasihan', 'full_name' => 'Kasihan, Bantul', 'kabupaten' => 'Bantul', 'distance' => '20 km dari Wates'],
        'pandak' => ['name' => 'Pandak', 'full_name' => 'Pandak, Bantul', 'kabupaten' => 'Bantul', 'distance' => '18 km dari Wates'],
        'pajangan' => ['name' => 'Pajangan', 'full_name' => 'Pajangan, Bantul', 'kabupaten' => 'Bantul', 'distance' => '15 km dari Wates'],
        'sedayu' => ['name' => 'Sedayu', 'full_name' => 'Sedayu, Bantul', 'kabupaten' => 'Bantul', 'distance' => '10 km dari Wates'],
        'sanden' => ['name' => 'Sanden', 'full_name' => 'Sanden, Bantul', 'kabupaten' => 'Bantul', 'distance' => '28 km dari Wates'],
        'kretek' => ['name' => 'Kretek', 'full_name' => 'Kretek, Bantul', 'kabupaten' => 'Bantul', 'distance' => '30 km dari Wates'],
        'pundong' => ['name' => 'Pundong', 'full_name' => 'Pundong, Bantul', 'kabupaten' => 'Bantul', 'distance' => '32 km dari Wates'],
        'bambanglipuro' => ['name' => 'Bambanglipuro', 'full_name' => 'Bambanglipuro, Bantul', 'kabupaten' => 'Bantul', 'distance' => '27 km dari Wates'],
        'jetis-bantul' => ['name' => 'Jetis', 'full_name' => 'Jetis, Bantul', 'kabupaten' => 'Bantul', 'distance' => '24 km dari Wates'],
        'imogiri' => ['name' => 'Imogiri', 'full_name' => 'Imogiri, Bantul', 'kabupaten' => 'Bantul', 'distance' => '35 km dari Wates'],
        'dlingo' => ['name' => 'Dlingo', 'full_name' => 'Dlingo, Bantul', 'kabupaten' => 'Bantul', 'distance' => '40 km dari Wates'],
        'banguntapan' => ['name' => 'Banguntapan', 'full_name' => 'Banguntapan, Bantul', 'kabupaten' => 'Bantul', 'distance' => '23 km dari Wates'],
        'pleret' => ['name' => 'Pleret', 'full_name' => 'Pleret, Bantul', 'kabupaten' => 'Bantul', 'distance' => '26 km dari Wates'],
        'piyungan' => ['name' => 'Piyungan', 'full_name' => 'Piyungan, Bantul', 'kabupaten' => 'Bantul', 'distance' => '28 km dari Wates'],
        'srandakan' => ['name' => 'Srandakan', 'full_name' => 'Srandakan, Bantul', 'kabupaten' => 'Bantul', 'distance' => '25 km dari Wates'],
        
        // Kabupaten Sleman
        'sleman' => [
            'name' => 'Sleman',
            'full_name' => 'Sleman',
            'kabupaten' => 'Sleman',
            'description' => 'Yamaha Mataram Sakti melayani wilayah Sleman dan sekitarnya. Dealer resmi motor Yamaha dengan harga OTR terbaik, promo DP murah, cicilan 0%, dan layanan purna jual terpercaya.',
            'distance' => '18 km dari Wates',
            'priority' => 'high'
        ],
        'depok' => ['name' => 'Depok', 'full_name' => 'Depok, Sleman', 'kabupaten' => 'Sleman', 'distance' => '20 km dari Wates'],
        'mlati' => ['name' => 'Mlati', 'full_name' => 'Mlati, Sleman', 'kabupaten' => 'Sleman', 'distance' => '15 km dari Wates'],
        'gamping' => ['name' => 'Gamping', 'full_name' => 'Gamping, Sleman', 'kabupaten' => 'Sleman', 'distance' => '12 km dari Wates'],
        'godean' => ['name' => 'Godean', 'full_name' => 'Godean, Sleman', 'kabupaten' => 'Sleman', 'distance' => '8 km dari Wates'],
        'moyudan' => ['name' => 'Moyudan', 'full_name' => 'Moyudan, Sleman', 'kabupaten' => 'Sleman', 'distance' => '10 km dari Wates'],
        'minggir' => ['name' => 'Minggir', 'full_name' => 'Minggir, Sleman', 'kabupaten' => 'Sleman', 'distance' => '6 km dari Wates'],
        'seyegan' => ['name' => 'Seyegan', 'full_name' => 'Seyegan, Sleman', 'kabupaten' => 'Sleman', 'distance' => '14 km dari Wates'],
        'ngaglik' => ['name' => 'Ngaglik', 'full_name' => 'Ngaglik, Sleman', 'kabupaten' => 'Sleman', 'distance' => '22 km dari Wates'],
        'ngemplak' => ['name' => 'Ngemplak', 'full_name' => 'Ngemplak, Sleman', 'kabupaten' => 'Sleman', 'distance' => '25 km dari Wates'],
        'kalasan' => ['name' => 'Kalasan', 'full_name' => 'Kalasan, Sleman', 'kabupaten' => 'Sleman', 'distance' => '28 km dari Wates'],
        'berbah' => ['name' => 'Berbah', 'full_name' => 'Berbah, Sleman', 'kabupaten' => 'Sleman', 'distance' => '30 km dari Wates'],
        'prambanan' => ['name' => 'Prambanan', 'full_name' => 'Prambanan, Sleman', 'kabupaten' => 'Sleman', 'distance' => '32 km dari Wates'],
        'cangkringan' => ['name' => 'Cangkringan', 'full_name' => 'Cangkringan, Sleman', 'kabupaten' => 'Sleman', 'distance' => '35 km dari Wates'],
        'turi' => ['name' => 'Turi', 'full_name' => 'Turi, Sleman', 'kabupaten' => 'Sleman', 'distance' => '28 km dari Wates'],
        'pakem' => ['name' => 'Pakem', 'full_name' => 'Pakem, Sleman', 'kabupaten' => 'Sleman', 'distance' => '30 km dari Wates'],
        'tempel' => ['name' => 'Tempel', 'full_name' => 'Tempel, Sleman', 'kabupaten' => 'Sleman', 'distance' => '20 km dari Wates'],
        
        // Kota Yogyakarta
        'gondokusuman' => ['name' => 'Gondokusuman', 'full_name' => 'Gondokusuman, Kota Yogyakarta', 'kabupaten' => 'Kota Yogyakarta', 'distance' => '18 km dari Wates'],
        'jetis-jogja' => ['name' => 'Jetis', 'full_name' => 'Jetis, Kota Yogyakarta', 'kabupaten' => 'Kota Yogyakarta', 'distance' => '17 km dari Wates'],
        'tegalrejo' => ['name' => 'Tegalrejo', 'full_name' => 'Tegalrejo, Kota Yogyakarta', 'kabupaten' => 'Kota Yogyakarta', 'distance' => '15 km dari Wates'],
        'umbulharjo' => ['name' => 'Umbulharjo', 'full_name' => 'Umbulharjo, Kota Yogyakarta', 'kabupaten' => 'Kota Yogyakarta', 'distance' => '19 km dari Wates'],
        'kotagede' => ['name' => 'Kotagede', 'full_name' => 'Kotagede, Kota Yogyakarta', 'kabupaten' => 'Kota Yogyakarta', 'distance' => '22 km dari Wates'],
        'mergangsan' => ['name' => 'Mergangsan', 'full_name' => 'Mergangsan, Kota Yogyakarta', 'kabupaten' => 'Kota Yogyakarta', 'distance' => '18 km dari Wates'],
        'mantrijeron' => ['name' => 'Mantrijeron', 'full_name' => 'Mantrijeron, Kota Yogyakarta', 'kabupaten' => 'Kota Yogyakarta', 'distance' => '17 km dari Wates'],
        'kraton' => ['name' => 'Kraton', 'full_name' => 'Kraton, Kota Yogyakarta', 'kabupaten' => 'Kota Yogyakarta', 'distance' => '17 km dari Wates'],
        'gondomanan' => ['name' => 'Gondomanan', 'full_name' => 'Gondomanan, Kota Yogyakarta', 'kabupaten' => 'Kota Yogyakarta', 'distance' => '17 km dari Wates'],
        'pakualaman' => ['name' => 'Pakualaman', 'full_name' => 'Pakualaman, Kota Yogyakarta', 'kabupaten' => 'Kota Yogyakarta', 'distance' => '17 km dari Wates'],
        'danurejan' => ['name' => 'Danurejan', 'full_name' => 'Danurejan, Kota Yogyakarta', 'kabupaten' => 'Kota Yogyakarta', 'distance' => '17 km dari Wates'],
        'gedongtengen' => ['name' => 'Gedongtengen', 'full_name' => 'Gedongtengen, Kota Yogyakarta', 'kabupaten' => 'Kota Yogyakarta', 'distance' => '17 km dari Wates'],
        'ngampilan' => ['name' => 'Ngampilan', 'full_name' => 'Ngampilan, Kota Yogyakarta', 'kabupaten' => 'Kota Yogyakarta', 'distance' => '16 km dari Wates'],
        'wirobrajan' => ['name' => 'Wirobrajan', 'full_name' => 'Wirobrajan, Kota Yogyakarta', 'kabupaten' => 'Kota Yogyakarta', 'distance' => '16 km dari Wates'],
        
        // Jawa Tengah - Purworejo
        'purworejo' => [
            'name' => 'Purworejo',
            'full_name' => 'Purworejo, Jawa Tengah',
            'kabupaten' => 'Purworejo',
            'description' => 'Dealer resmi Yamaha Mataram Sakti melayani wilayah Purworejo, Jawa Tengah. Jual motor Yamaha terbaru dengan harga OTR terbaik, promo DP murah, cicilan 0%, service berkala, dan spare part original. Melayani penjualan motor Yamaha dengan layanan purna jual terpercaya untuk seluruh wilayah Purworejo.',
            'distance' => '85 km dari Wates',
            'priority' => 'high'
        ],
        
        // Jawa Tengah - Magelang
        'magelang' => [
            'name' => 'Magelang',
            'full_name' => 'Magelang, Jawa Tengah',
            'kabupaten' => 'Magelang',
            'description' => 'Dealer resmi Yamaha Mataram Sakti melayani wilayah Magelang, Jawa Tengah. Jual motor Yamaha terbaru dengan harga OTR terbaik, promo DP murah, cicilan 0%, service berkala, dan spare part original. Melayani penjualan motor Yamaha dengan layanan purna jual terpercaya untuk seluruh wilayah Magelang.',
            'distance' => '65 km dari Wates',
            'priority' => 'high'
        ],
        
        // Jawa Tengah - Klaten
        'klaten' => [
            'name' => 'Klaten',
            'full_name' => 'Klaten, Jawa Tengah',
            'kabupaten' => 'Klaten',
            'description' => 'Dealer resmi Yamaha Mataram Sakti melayani wilayah Klaten, Jawa Tengah. Jual motor Yamaha terbaru dengan harga OTR terbaik, promo DP murah, cicilan 0%, service berkala, dan spare part original. Melayani penjualan motor Yamaha dengan layanan purna jual terpercaya untuk seluruh wilayah Klaten.',
            'distance' => '55 km dari Wates',
            'priority' => 'high'
        ],
    ];
    
    public function show($slug)
    {
        try {
            // Check if location exists
            if (!isset($this->locations[$slug])) {
                abort(404);
            }
            
            $location = $this->locations[$slug];
            
            // Get motors - simplified query
            $motors = Motor::where('is_active', true)
                ->orderBy('name')
                ->limit(6)
                ->get();
            
            // Generate SEO data
            $seoTitle = "Dealer Yamaha {$location['name']} - Motor Yamaha {$location['full_name']} | Harga OTR 2026";
            $seoDescription = $location['description'] ?? "Dealer resmi Yamaha Mataram Sakti melayani wilayah {$location['full_name']}. Jual motor Yamaha terbaru 2026 dengan harga OTR terbaik, promo DP murah, cicilan 0%, service berkala, dan spare part original. Jarak {$location['distance']}.";
            
            $seoKeywords = [
                "dealer yamaha {$location['name']}",
                "yamaha {$location['name']}",
                "motor yamaha {$location['name']}",
                "harga motor yamaha {$location['name']}",
                "kredit motor yamaha {$location['name']}",
                "promo yamaha {$location['name']}",
                "nmax {$location['name']}",
                "aerox {$location['name']}",
                "r15 {$location['name']}",
                "dealer yamaha {$location['kabupaten']}",
            ];
            
            return view('location', compact('location', 'motors', 'seoTitle', 'seoDescription', 'seoKeywords', 'slug'));
        } catch (\Exception $e) {
            \Log::error('LocationController error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            abort(500, 'Error loading location page: ' . $e->getMessage());
        }
    }
}
