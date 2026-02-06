# CARA MEMBUAT HALAMAN LOKASI LAINNYA

## File yang Sudah Dibuat:
✅ `resources/views/location-wates.blade.php`

## File yang Perlu Dibuat:
1. `resources/views/location-kulon-progo.blade.php`
2. `resources/views/location-sleman.blade.php`
3. `resources/views/location-bantul.blade.php`
4. `resources/views/location-gunung-kidul.blade.php`
5. `resources/views/location-wonosari.blade.php`

## Cara Cepat:
Copy file `location-wates.blade.php` dan ganti:

### Untuk Kulon Progo:
- Ganti "Wates" → "Kulon Progo"
- Ganti "wates" → "kulon-progo"
- Update koordinat GPS jika perlu

### Untuk Sleman:
- Ganti "Wates" → "Sleman"
- Ganti "wates" → "sleman"
- Update alamat: "Jl. Raya Sleman, Sleman, DIY"
- Update koordinat GPS: latitude: -7.7056, longitude: 110.3539

### Untuk Bantul:
- Ganti "Wates" → "Bantul"
- Ganti "wates" → "bantul"
- Update alamat: "Jl. Raya Bantul, Bantul, DIY"
- Update koordinat GPS: latitude: -7.8879, longitude: 110.3289

### Untuk Gunung Kidul:
- Ganti "Wates" → "Gunung Kidul"
- Ganti "wates" → "gunung-kidul"
- Update alamat: "Jl. Raya Wonosari, Gunung Kidul, DIY"
- Update koordinat GPS: latitude: -7.9667, longitude: 110.6000

### Untuk Wonosari:
- Ganti "Wates" → "Wonosari"
- Ganti "wates" → "wonosari"
- Update alamat: "Jl. Raya Wonosari, Wonosari, Gunung Kidul, DIY"
- Update koordinat GPS: latitude: -7.9667, longitude: 110.6000

## Atau Gunakan Command Ini:

```bash
# Di folder company-profile-xxx

# Copy untuk Kulon Progo
cp resources/views/location-wates.blade.php resources/views/location-kulon-progo.blade.php

# Copy untuk Sleman
cp resources/views/location-wates.blade.php resources/views/location-sleman.blade.php

# Copy untuk Bantul
cp resources/views/location-wates.blade.php resources/views/location-bantul.blade.php

# Copy untuk Gunung Kidul
cp resources/views/location-wates.blade.php resources/views/location-gunung-kidul.blade.php

# Copy untuk Wonosari
cp resources/views/location-wates.blade.php resources/views/location-wonosari.blade.php
```

Kemudian edit setiap file dan ganti nama lokasi sesuai petunjuk di atas.

## Setelah Semua File Dibuat:

1. Test di local:
```bash
php artisan serve
```

2. Buka browser:
- http://localhost:8000/dealer-yamaha-wates
- http://localhost:8000/dealer-yamaha-kulon-progo
- http://localhost:8000/dealer-yamaha-sleman
- http://localhost:8000/dealer-yamaha-bantul
- http://localhost:8000/dealer-yamaha-gunung-kidul
- http://localhost:8000/dealer-yamaha-wonosari

3. Deploy ke server:
```bash
bash deploy-location-pages.sh
```

## Update Sitemap:

Tambahkan URL baru ke `public/sitemap.xml`:

```xml
<!-- Location Pages -->
<url>
    <loc>http://yamahajogja.id:20275/dealer-yamaha-wates</loc>
    <lastmod>2026-02-06</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
</url>

<url>
    <loc>http://yamahajogja.id:20275/dealer-yamaha-kulon-progo</loc>
    <lastmod>2026-02-06</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
</url>

<url>
    <loc>http://yamahajogja.id:20275/dealer-yamaha-sleman</loc>
    <lastmod>2026-02-06</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
</url>

<url>
    <loc>http://yamahajogja.id:20275/dealer-yamaha-bantul</loc>
    <lastmod>2026-02-06</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
</url>

<url>
    <loc>http://yamahajogja.id:20275/dealer-yamaha-gunung-kidul</loc>
    <lastmod>2026-02-06</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
</url>

<url>
    <loc>http://yamahajogja.id:20275/dealer-yamaha-wonosari</loc>
    <lastmod>2026-02-06</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
</url>
```

## Setelah Deploy:

1. Submit sitemap ke Google Search Console
2. Request indexing untuk setiap halaman lokasi
3. Share link di social media dengan geotag lokasi
4. Tunggu 2-4 minggu untuk ranking naik

## Expected Result:

- Ranking #1 untuk "dealer yamaha wates"
- Ranking #1 untuk "dealer yamaha kulon progo"
- Ranking #1 untuk "dealer yamaha sleman"
- Ranking #1 untuk "dealer yamaha bantul"
- Ranking #1 untuk "dealer yamaha gunung kidul"
- Ranking #1 untuk "dealer yamaha wonosari"
