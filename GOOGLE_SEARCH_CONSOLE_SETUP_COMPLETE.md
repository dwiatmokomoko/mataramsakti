# 🚀 PANDUAN LENGKAP GOOGLE SEARCH CONSOLE

## LANGKAH 1: DAFTAR & VERIFIKASI WEBSITE

### A. Buka Google Search Console
```
https://search.google.com/search-console
```

### B. Tambahkan Property
1. Klik "Add Property"
2. Pilih "URL prefix"
3. Masukkan: `http://yamahajogja.id:20275` atau domain utama Anda
4. Klik "Continue"

### C. Verifikasi Kepemilikan (Pilih salah satu metode)

#### Metode 1: HTML File Upload (RECOMMENDED)
1. Download file verifikasi dari Google
2. Upload ke folder `public/`
3. Akses: `http://yamahajogja.id:20275/google[kode].html`
4. Klik "Verify" di Google Search Console

#### Metode 2: HTML Tag
1. Copy meta tag dari Google
2. Paste di `resources/views/layouts/app.blade.php` di dalam `<head>`
```html
<meta name="google-site-verification" content="YOUR-CODE-HERE" />
```
3. Klik "Verify"

#### Metode 3: Google Analytics
1. Jika sudah install Google Analytics
2. Gunakan akun yang sama
3. Verifikasi otomatis

---

## LANGKAH 2: SUBMIT SITEMAP

### A. Buka Sitemaps
1. Di sidebar kiri, klik "Sitemaps"
2. Masukkan URL sitemap: `sitemap.xml`
3. Klik "Submit"

### B. Tunggu Indexing
- Google akan mulai crawl website
- Proses bisa memakan waktu 1-7 hari
- Cek status di "Coverage" report

---

## LANGKAH 3: REQUEST INDEXING MANUAL

### A. Inspect URL Tool
1. Klik icon search di atas
2. Masukkan URL halaman penting:
   - Homepage: `http://yamahajogja.id:20275/`
   - Motor NMAX: `http://yamahajogja.id:20275/motor/1`
   - Motor Aerox: `http://yamahajogja.id:20275/motor/2`
   - dll.

3. Klik "Request Indexing"
4. Tunggu konfirmasi

### B. Priority URLs (Request ini dulu)
```
http://yamahajogja.id:20275/
http://yamahajogja.id:20275/motor/1
http://yamahajogja.id:20275/motor/2
http://yamahajogja.id:20275/motor/3
http://yamahajogja.id:20275/motor/4
http://yamahajogja.id:20275/motor/5
```

---

## LANGKAH 4: MONITORING & OPTIMIZATION

### A. Performance Report
**Cek setiap minggu:**
- Total clicks
- Total impressions
- Average CTR
- Average position

**Target:**
- CTR > 5%
- Average position < 10 (page 1)

### B. Coverage Report
**Cek setiap minggu:**
- Valid pages
- Error pages
- Excluded pages

**Action:**
- Fix semua error pages
- Submit ulang jika ada masalah

### C. Enhancements
**Cek:**
- Mobile usability
- Core Web Vitals
- Breadcrumbs
- Sitelinks searchbox

**Action:**
- Fix semua issues
- Improve page speed

---

## LANGKAH 5: OPTIMIZE SEARCH APPEARANCE

### A. Improve CTR
**Jika CTR rendah (<3%):**
1. Update title tags (lebih menarik)
2. Update meta descriptions (call-to-action)
3. Tambahkan emoji di description
4. Highlight unique selling points

**Contoh Title Optimization:**
```
❌ Before: "Yamaha NMAX - Dealer Yamaha Jogja"
✅ After: "NMAX Jogja - Harga OTR 2026 Mulai 30 Juta | DP 0% Cicilan Ringan"
```

### B. Improve Rankings
**Jika ranking rendah (>10):**
1. Tambah konten berkualitas
2. Build backlinks
3. Improve page speed
4. Enhance user experience
5. Add more internal links

---

## LANGKAH 6: TRACK KEYWORDS

### A. Queries Report
**Analisis:**
- Keyword apa yang membawa traffic?
- Keyword apa yang ranking tinggi tapi CTR rendah?
- Keyword apa yang perlu ditarget lebih?

### B. Optimization Strategy
**Untuk setiap keyword:**
1. Cek current position
2. Jika position 11-20: Optimize content, build backlinks
3. Jika position 4-10: Improve CTR dengan better title/description
4. Jika position 1-3: Maintain dengan fresh content

---

## LANGKAH 7: FIX COMMON ISSUES

### A. Crawl Errors
**Jika ada 404 errors:**
```bash
1. Cek URL yang error
2. Redirect ke halaman yang benar
3. Atau buat halaman baru
```

### B. Mobile Usability Issues
**Jika ada mobile issues:**
```bash
1. Test di Google Mobile-Friendly Test
2. Fix responsive design
3. Improve tap targets
4. Reduce font size issues
```

### C. Core Web Vitals Issues
**Jika ada performance issues:**
```bash
1. Optimize images (compress, WebP)
2. Minify CSS/JS
3. Enable caching
4. Use CDN
5. Lazy load images
```

---

## LANGKAH 8: ADVANCED FEATURES

### A. Rich Results
**Enable:**
- Product schema (untuk motor)
- Organization schema (untuk dealer)
- LocalBusiness schema (untuk lokasi)
- Breadcrumb schema (untuk navigasi)

**Test:**
```
https://search.google.com/test/rich-results
```

### B. Sitelinks
**Cara mendapatkan sitelinks:**
1. Website structure yang jelas
2. Internal linking yang baik
3. Consistent navigation
4. High authority domain

**Tidak bisa diatur manual**, Google yang tentukan.

### C. FAQ Schema (Optional)
**Tambahkan FAQ di halaman motor:**
```json
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "Berapa harga NMAX di Jogja?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Harga NMAX di Jogja mulai dari Rp 30 jutaan OTR."
    }
  }]
}
```

---

## LANGKAH 9: WEEKLY CHECKLIST

### Senin
- [ ] Cek performance report
- [ ] Analisis top queries
- [ ] Identify improvement opportunities

### Rabu
- [ ] Cek coverage report
- [ ] Fix any errors
- [ ] Submit new pages

### Jumat
- [ ] Cek enhancements
- [ ] Review mobile usability
- [ ] Check Core Web Vitals

---

## LANGKAH 10: MONTHLY TASKS

### Setiap Bulan
- [ ] Comprehensive SEO audit
- [ ] Competitor analysis
- [ ] Update old content
- [ ] Build new backlinks
- [ ] Review and adjust strategy

---

## 📊 EXPECTED RESULTS TIMELINE

### Week 1-2
- Website verified
- Sitemap submitted
- Initial crawling started

### Week 3-4
- Pages indexed
- Appear in search results (page 2-3)
- Start getting impressions

### Week 5-8
- Rankings improve
- Move to page 1 for long-tail keywords
- Traffic starts growing

### Week 9-12
- Rank #1-3 for target keywords
- Consistent traffic
- Good CTR

### Month 4-6
- Dominate search results
- High authority
- Sustainable growth

---

## 🎯 TARGET METRICS

### Short Term (1-3 months)
- 100+ indexed pages
- 1,000+ impressions/month
- 50+ clicks/month
- Average position < 20

### Medium Term (3-6 months)
- 10,000+ impressions/month
- 500+ clicks/month
- Average position < 10
- CTR > 5%

### Long Term (6-12 months)
- 50,000+ impressions/month
- 2,500+ clicks/month
- Average position < 5
- CTR > 7%
- Rank #1 for primary keywords

---

## 🚨 TROUBLESHOOTING

### Problem: Pages not indexed
**Solution:**
1. Check robots.txt
2. Check sitemap
3. Request indexing manually
4. Check for crawl errors

### Problem: Low CTR
**Solution:**
1. Improve title tags
2. Improve meta descriptions
3. Add structured data
4. Enhance content quality

### Problem: Low rankings
**Solution:**
1. Improve content quality
2. Build more backlinks
3. Improve page speed
4. Enhance user experience
5. Add more internal links

---

## 📞 SUPPORT

Jika ada pertanyaan atau butuh bantuan:
- WhatsApp: 0856-4195-6326
- Email: info@yamahajogja.id

---

**Last Updated:** February 2026
**Status:** Ready to implement

---

## ✅ QUICK START CHECKLIST

- [ ] Daftar Google Search Console
- [ ] Verifikasi website
- [ ] Submit sitemap
- [ ] Request indexing untuk 10 halaman utama
- [ ] Setup email notifications
- [ ] Bookmark dashboard
- [ ] Schedule weekly review

**Estimated Time:** 30-60 minutes

**Let's dominate Google search! 🚀**
