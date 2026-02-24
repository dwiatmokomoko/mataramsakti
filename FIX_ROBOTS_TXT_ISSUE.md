# 🔧 FIX: Robots.txt Unreachable Issue

## MASALAH:
Google Search Console error: **"Failed: Robots.txt unreachable"**

**Root Cause:** Port 20275 tidak accessible dari internet. Google crawler hanya bisa akses port 80 (HTTP) atau 443 (HTTPS).

---

## SOLUSI 1: SETUP REVERSE PROXY (RECOMMENDED)

Buat website accessible di port 80 dengan reverse proxy ke port 20275.

### Di Server, jalankan:

```bash
# 1. Install Apache mod_proxy (jika belum)
sudo a2enmod proxy
sudo a2enmod proxy_http
sudo systemctl restart apache2

# 2. Buat virtual host untuk yamahajogja.id di port 80
sudo nano /etc/apache2/sites-available/yamahajogja.conf
```

### Isi file yamahajogja.conf:

```apache
<VirtualHost *:80>
    ServerName yamahajogja.id
    ServerAlias www.yamahajogja.id
    
    # Reverse proxy ke port 20275
    ProxyPreserveHost On
    ProxyPass / http://localhost:20275/
    ProxyPassReverse / http://localhost:20275/
    
    # Logs
    ErrorLog ${APACHE_LOG_DIR}/yamahajogja-error.log
    CustomLog ${APACHE_LOG_DIR}/yamahajogja-access.log combined
</VirtualHost>
```

### Enable site dan restart Apache:

```bash
# Enable site
sudo a2ensite yamahajogja.conf

# Test config
sudo apache2ctl configtest

# Restart Apache
sudo systemctl restart apache2

# Test dari server
curl -I http://yamahajogja.id/
curl -I http://yamahajogja.id/robots.txt
curl -I http://yamahajogja.id/sitemap.xml
```

### Update Google Search Console:

1. Hapus property lama: `http://yamahajogja.id:20275`
2. Add property baru: `http://yamahajogja.id` (tanpa port)
3. Verify ownership
4. Submit sitemap: `http://yamahajogja.id/sitemap.xml`
5. Request indexing

**Expected Result:** Google bisa akses robots.txt, indexing berhasil! ✅

---

## SOLUSI 2: CLOUDFLARE TUNNEL (ALTERNATIF)

Jika tidak bisa setup reverse proxy, gunakan Cloudflare Tunnel:

### 1. Install Cloudflared:

```bash
# Download cloudflared
wget https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-amd64.deb
sudo dpkg -i cloudflared-linux-amd64.deb

# Login ke Cloudflare
cloudflared tunnel login

# Create tunnel
cloudflared tunnel create yamahajogja

# Configure tunnel
nano ~/.cloudflared/config.yml
```

### 2. Config file (~/.cloudflared/config.yml):

```yaml
tunnel: yamahajogja
credentials-file: /home/moko/.cloudflared/<TUNNEL-ID>.json

ingress:
  - hostname: yamahajogja.id
    service: http://localhost:20275
  - service: http_status:404
```

### 3. Route DNS:

```bash
cloudflared tunnel route dns yamahajogja yamahajogja.id
```

### 4. Run tunnel:

```bash
cloudflared tunnel run yamahajogja
```

**Expected Result:** Website accessible di `https://yamahajogja.id` (port 443)

---

## SOLUSI 3: PINDAH KE PORT 80 (SIMPLE)

Jika tidak ada service lain di port 80, pindahkan aplikasi ke port 80:

### 1. Update Apache config:

```bash
# Edit virtual host
sudo nano /etc/apache2/sites-available/000-default.conf
```

### 2. Ubah port dari 20275 ke 80:

```apache
<VirtualHost *:80>
    DocumentRoot /var/www/html/mataramsakti/public
    
    <Directory /var/www/html/mataramsakti/public>
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

### 3. Restart Apache:

```bash
sudo systemctl restart apache2
```

### 4. Update .env:

```bash
cd /var/www/html/mataramsakti
nano .env
```

Ubah:
```
APP_URL=http://yamahajogja.id
```

### 5. Clear cache:

```bash
php artisan config:clear
php artisan cache:clear
```

### 6. Test:

```bash
curl -I http://yamahajogja.id/
curl -I http://yamahajogja.id/robots.txt
```

**Expected Result:** Website accessible di port 80, Google bisa crawl! ✅

---

## SOLUSI 4: UPDATE CLOUDFLARE DNS (QUICK FIX)

Jika menggunakan Cloudflare, pastikan:

1. **Disable Cloudflare Proxy** (Gray Cloud, bukan Orange Cloud)
   - Login ke Cloudflare
   - Pilih domain yamahajogja.id
   - DNS Records → Klik icon cloud (ubah jadi gray)
   
2. **Add SRV Record** untuk custom port:
   - Type: SRV
   - Name: _http._tcp
   - Priority: 0
   - Weight: 0
   - Port: 20275
   - Target: yamahajogja.id

**TAPI:** Google tetap tidak bisa crawl custom port. Solusi 1-3 lebih baik!

---

## REKOMENDASI:

**GUNAKAN SOLUSI 1 (Reverse Proxy)** karena:
- ✅ Paling mudah & cepat
- ✅ Tidak perlu ubah port aplikasi
- ✅ Google bisa crawl dengan normal
- ✅ Support HTTPS di masa depan
- ✅ Tidak perlu install software tambahan

---

## SETELAH FIX:

1. Update Google Search Console dengan URL baru (tanpa port)
2. Submit sitemap lagi
3. Request indexing untuk semua halaman
4. Tunggu 24-48 jam untuk Google crawl
5. Monitor di Google Search Console

---

## VERIFICATION:

Test dari luar server (bukan dari localhost):

```bash
# Test dari komputer lain atau online tool
curl -I http://yamahajogja.id/robots.txt
curl -I http://yamahajogja.id/sitemap.xml

# Atau buka di browser:
# http://yamahajogja.id/robots.txt
# http://yamahajogja.id/sitemap.xml
```

Jika return HTTP 200 OK, berarti berhasil! ✅

---

**PENTING:** Tanpa fix ini, Google tidak akan bisa crawl website Anda!

Custom port (20275) hanya untuk development/testing, tidak untuk production!
