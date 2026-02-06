# 🚀 DEPLOY KE SERVER - STEP BY STEP

## LANGKAH 1: Push dari Local ke Git

Di komputer lokal Anda (Windows), jalankan:

```bash
cd D:\web\company-profile-xxx

# Push ke Git
git push origin main
```

---

## LANGKAH 2: Pull di Server & Deploy

Login ke server dan jalankan command berikut:

```bash
# Masuk ke folder project
cd /var/www/html/mataramsakti

# Pull perubahan terbaru
git pull origin main

# Fix permission untuk log file
sudo chown -R www-data:www-data storage/
sudo chmod -R 775 storage/
sudo chown -R www-data:www-data bootstrap/cache/
sudo chmod -R 775 bootstrap/cache/

# Clear semua cache
php artisan view:clear
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan optimize:clear

# Verify files exist
echo "=== Checking sitemap.xml ==="
ls -la public/sitemap.xml
cat public/sitemap.xml | head -20

echo "=== Checking robots.txt ==="
ls -la public/robots.txt
cat public/robots.txt

echo "=== Checking location page ==="
ls -la resources/views/location-wates.blade.php

echo "=== Checking routes ==="
grep -A 5 "Location-Specific Pages" routes/web.php

# Test sitemap accessible
echo "=== Testing sitemap URL ==="
curl -I http://localhost:20275/sitemap.xml

echo "=== Testing robots.txt URL ==="
curl -I http://localhost:20275/robots.txt

echo "=== Testing location page ==="
curl -I http://localhost:20275/dealer-yamaha-wates

echo "=== Testing homepage ==="
curl -I http://localhost:20275/
```

---

## LANGKAH 3: Verify Deployment

Setelah deploy, cek apakah semua berjalan:

```bash
# Test dari browser atau curl
curl http://yamahajogja.id:20275/sitemap.xml
curl http://yamahajogja.id:20275/robots.txt
curl http://yamahajogja.id:20275/dealer-yamaha-wates
```

Jika semua return HTTP 200 OK, deployment berhasil! ✅

---

## LANGKAH 4: Buat Location Pages Lainnya

Setelah deployment berhasil, buat location pages lainnya:

```bash
cd /var/www/html/mataramsakti

# Copy template untuk lokasi lain
cp resources/views/location-wates.blade.php resources/views/location-kulon-progo.blade.php
cp resources/views/location-wates.blade.php resources/views/location-sleman.blade.php
cp resources/views/location-wates.blade.php resources/views/location-bantul.blade.php
cp resources/views/location-wates.blade.php resources/views/location-gunung-kidul.blade.php
cp resources/views/location-wates.blade.php resources/views/location-wonosari.blade.php

# Edit setiap file (ganti "Wates" dengan nama lokasi)
# Gunakan nano atau vim
nano resources/views/location-kulon-progo.blade.php
# Find & Replace: Wates → Kulon Progo
# Save & Exit

# Ulangi untuk lokasi lainnya...

# Clear cache
php artisan view:clear

# Test
curl -I http://localhost:20275/dealer-yamaha-kulon-progo
curl -I http://localhost:20275/dealer-yamaha-sleman
curl -I http://localhost:20275/dealer-yamaha-bantul
curl -I http://localhost:20275/dealer-yamaha-gunung-kidul
curl -I http://localhost:20275/dealer-yamaha-wonosari
```

---

## TROUBLESHOOTING

### Problem: Permission denied untuk log file
```bash
sudo chown -R www-data:www-data /var/www/html/mataramsakti/storage/
sudo chmod -R 775 /var/www/html/mataramsakti/storage/
```

### Problem: 404 Not Found untuk location pages
```bash
php artisan route:clear
php artisan route:cache
php artisan view:clear
```

### Problem: 500 Internal Server Error
```bash
# Cek error log
tail -50 /var/www/html/mataramsakti/storage/logs/laravel.log

# Clear cache
php artisan optimize:clear
```

### Problem: Sitemap tidak accessible
```bash
# Pastikan file ada
ls -la /var/www/html/mataramsakti/public/sitemap.xml

# Pastikan permission benar
chmod 644 /var/www/html/mataramsakti/public/sitemap.xml
```

---

## NEXT STEPS SETELAH DEPLOY

1. ✅ Setup Google Search Console (30 menit)
   - Buka: https://search.google.com/search-console
   - Add property: http://yamahajogja.id:20275
   - Submit sitemap: http://yamahajogja.id:20275/sitemap.xml

2. ✅ Setup Google My Business (1 jam)
   - Buka: https://business.google.com
   - Create business profile
   - Upload photos
   - Get reviews

3. ✅ Monitor ranking (setiap hari)
   - Cek Google Search Console
   - Cek posisi keyword di Google
   - Track traffic & leads

---

**PENTING:** Setelah deploy, langsung setup Google Search Console dan Google My Business!

Tanpa kedua tools ini, website tidak akan ranking meskipun sudah deploy!
