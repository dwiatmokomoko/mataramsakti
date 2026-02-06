# PANDUAN SETUP GOOGLE SEARCH CONSOLE
## LANGKAH DEMI LANGKAH DENGAN SCREENSHOT

---

## 🎯 KENAPA INI PENTING?

**Tanpa Google Search Console, website Anda TIDAK AKAN RANKING!**

Google Search Console adalah cara Anda memberitahu Google bahwa website Anda ada dan perlu di-index. Tanpa ini, Google tidak tahu website Anda update, tidak tahu halaman baru Anda, dan tidak akan ranking.

---

## ⏱️ WAKTU YANG DIBUTUHKAN

- Setup awal: 15 menit
- Verification: 5 menit
- Submit sitemap: 2 menit
- Request indexing: 10 menit
- **Total: 30 menit**

---

## 📋 LANGKAH 1: BUKA GOOGLE SEARCH CONSOLE

1. Buka browser (Chrome/Firefox/Edge)
2. Kunjungi: https://search.google.com/search-console
3. Login dengan akun Google Anda (Gmail)
4. Jika belum punya akun Google, buat dulu di: https://accounts.google.com

---

## 📋 LANGKAH 2: ADD PROPERTY (TAMBAH WEBSITE)

1. Klik tombol **"Add Property"** atau **"Tambahkan Properti"**
2. Pilih **"URL prefix"** (BUKAN "Domain")
3. Masukkan URL lengkap: `http://yamahajogja.id:20275`
4. Klik **"Continue"** atau **"Lanjutkan"**

**PENTING:** Gunakan URL prefix, bukan Domain, karena kita pakai custom port (20275)

---

## 📋 LANGKAH 3: VERIFY OWNERSHIP (VERIFIKASI KEPEMILIKAN)

Google akan menampilkan beberapa metode verifikasi. Pilih **"HTML tag"** (paling mudah):

### Metode HTML Tag:

1. Google akan memberikan kode seperti ini:
   ```html
   <meta name="google-site-verification" content="ABC123XYZ..." />
   ```

2. Copy kode tersebut

3. Buka file: `company-profile-xxx/resources/views/layouts/app.blade.php`

4. Cari bagian `<head>` dan tambahkan kode di bawah tag `<meta charset="UTF-8">`:

   ```blade
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
       <!-- Google Search Console Verification -->
       <meta name="google-site-verification" content="ABC123XYZ..." />
       
       <!-- Rest of head content -->
   ```

5. Save file

6. Deploy ke server:
   ```bash
   git add .
   git commit -m "Add Google Search Console verification"
   git push origin main
   
   # Di server:
   cd /var/www/html/mataramsakti
   git pull origin main
   php artisan view:clear
   php artisan cache:clear
   ```

7. Kembali ke Google Search Console

8. Klik **"Verify"** atau **"Verifikasi"**

9. Jika berhasil, akan muncul pesan: **"Ownership verified"** ✅

---

## 📋 LANGKAH 4: SUBMIT SITEMAP

Setelah verified, langsung submit sitemap:

1. Di menu kiri, klik **"Sitemaps"**

2. Di kolom "Add a new sitemap", masukkan: `sitemap.xml`

3. Klik **"Submit"**

4. Status akan berubah menjadi:
   - **"Fetching"** (sedang diambil) → tunggu 1-2 menit
   - **"Success"** (berhasil) → ✅ DONE!

5. Google akan mulai crawl semua URL di sitemap Anda

**Expected Result:**
- Google akan crawl dalam 24-48 jam
- Semua halaman akan mulai ter-index
- Ranking akan mulai muncul dalam 1-2 minggu

---

## 📋 LANGKAH 5: REQUEST INDEXING (PERCEPAT INDEXING)

Untuk mempercepat indexing, request manual untuk halaman penting:

1. Di menu kiri, klik **"URL Inspection"** atau **"Inspeksi URL"**

2. Masukkan URL homepage: `http://yamahajogja.id:20275/`

3. Klik Enter

4. Tunggu Google mengecek (10-30 detik)

5. Jika muncul "URL is not on Google", klik **"Request Indexing"**

6. Tunggu 1-2 menit (Google akan crawl)

7. Ulangi untuk halaman penting lainnya:
   - `http://yamahajogja.id:20275/dealer-yamaha-wates`
   - `http://yamahajogja.id:20275/dealer-yamaha-kulon-progo`
   - `http://yamahajogja.id:20275/dealer-yamaha-sleman`
   - `http://yamahajogja.id:20275/dealer-yamaha-bantul`
   - `http://yamahajogja.id:20275/dealer-yamaha-gunung-kidul`
   - `http://yamahajogja.id:20275/dealer-yamaha-wonosari`
   - `http://yamahajogja.id:20275/motor/1` (NMAX)
   - `http://yamahajogja.id:20275/motor/2` (Aerox)
   - `http://yamahajogja.id:20275/motor/3` (Fazzio)

**PENTING:** Google membatasi request indexing. Jika sudah mentok, tunggu 1 hari dan lanjutkan besok.

---

## 📋 LANGKAH 6: MONITOR PERFORMANCE

Setelah 3-7 hari, cek performance:

1. Di menu kiri, klik **"Performance"** atau **"Performa"**

2. Anda akan melihat grafik:
   - **Total clicks** (jumlah klik dari Google)
   - **Total impressions** (berapa kali muncul di Google)
   - **Average CTR** (click-through rate)
   - **Average position** (posisi rata-rata di Google)

3. Klik tab **"Queries"** untuk melihat keyword apa yang membawa traffic

4. Klik tab **"Pages"** untuk melihat halaman mana yang paling banyak diklik

**Target:**
- Week 1-2: Impressions mulai muncul (100-500)
- Week 3-4: Clicks mulai muncul (10-50)
- Month 2: Position naik ke halaman 1 (posisi 1-10)
- Month 3: Dominasi keyword utama (posisi 1-3)

---

## 📋 LANGKAH 7: FIX ISSUES (JIKA ADA)

Jika ada error atau warning:

1. Di menu kiri, klik **"Coverage"** atau **"Cakupan"**

2. Lihat tab **"Error"** (merah)

3. Klik error untuk melihat detail

4. Fix error sesuai petunjuk Google

5. Setelah fix, klik **"Validate Fix"**

**Common Errors:**
- **404 Not Found** → Halaman tidak ada, fix URL atau hapus dari sitemap
- **Server Error (5xx)** → Website down, cek server
- **Redirect Error** → Terlalu banyak redirect, fix routing
- **Soft 404** → Halaman kosong, tambahkan content

---

## 📋 LANGKAH 8: SUBMIT URL REMOVAL (OPSIONAL)

Jika ada halaman lama yang tidak ingin di-index:

1. Di menu kiri, klik **"Removals"**

2. Klik **"New Request"**

3. Masukkan URL yang ingin dihapus

4. Klik **"Next"** → **"Submit Request"**

**HATI-HATI:** Jangan hapus halaman penting!

---

## ✅ CHECKLIST SETELAH SETUP

- [ ] Property added & verified
- [ ] Sitemap submitted
- [ ] Homepage indexed
- [ ] Location pages indexed (6 pages)
- [ ] Motor pages indexed (minimal 5 pages)
- [ ] No errors in Coverage
- [ ] Performance data mulai muncul (tunggu 3-7 hari)

---

## 🎯 EXPECTED RESULTS

### Week 1:
- ✅ Website ter-index di Google
- ✅ Impressions mulai muncul (100-500)
- ✅ Muncul di halaman 2-3 untuk keyword utama

### Week 2:
- ✅ Clicks mulai muncul (10-50)
- ✅ Position naik ke halaman 1 posisi 5-10
- ✅ Traffic organik +100%

### Week 3-4:
- ✅ Position naik ke halaman 1 posisi 1-5
- ✅ Traffic organik +300%
- ✅ Leads mulai banyak dari Google

### Month 2-3:
- 🎯 Dominasi keyword utama (posisi 1-3)
- 🎯 Traffic organik +500%
- 🎯 Leads meningkat drastis

---

## 🚨 TROUBLESHOOTING

### Problem: "Ownership verification failed"
**Solution:**
- Pastikan meta tag sudah di-deploy ke server
- Clear cache: `php artisan view:clear`
- Cek source code website, pastikan meta tag muncul
- Tunggu 5 menit dan coba verify lagi

### Problem: "Sitemap could not be read"
**Solution:**
- Cek sitemap accessible: `curl http://yamahajogja.id:20275/sitemap.xml`
- Pastikan format XML valid
- Cek robots.txt tidak block sitemap

### Problem: "URL is not on Google" setelah 1 minggu
**Solution:**
- Request indexing manual
- Cek robots.txt tidak block URL
- Cek halaman tidak ada error 404/500
- Build backlinks ke halaman tersebut

### Problem: "Coverage errors"
**Solution:**
- Baca detail error di Google Search Console
- Fix sesuai petunjuk
- Validate fix
- Tunggu Google re-crawl (1-7 hari)

---

## 📞 BUTUH BANTUAN?

Jika ada kesulitan:
1. Screenshot error yang muncul
2. Kirim ke tim support
3. Atau hubungi SEO specialist

---

## 🔗 RESOURCES

- Google Search Console: https://search.google.com/search-console
- Google Search Console Help: https://support.google.com/webmasters
- Sitemap Protocol: https://www.sitemaps.org
- Robots.txt Tester: https://support.google.com/webmasters/answer/6062598

---

**Last Updated:** February 6, 2026
**Status:** Ready to implement
**Priority:** CRITICAL - DO TODAY!
**Expected Time:** 30 minutes
**Expected Result:** Ranking halaman 1 dalam 2-4 minggu
