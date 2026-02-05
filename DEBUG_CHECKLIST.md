# 🔍 Debug Checklist untuk Error 500

## Langkah-langkah Debugging:

### 1. **Cek Error Log**
```bash
# Apache error log
sudo tail -f /var/log/apache2/error.log

# Laravel error log
tail -f /var/www/html/mataramsakti/storage/logs/laravel.log

# Cek log khusus yamahajogja.id
sudo tail -f /var/log/apache2/yamahajogja_error.log
```

### 2. **Cek File dan Permission**
```bash
# Cek ownership
ls -la /var/www/html/mataramsakti/

# Cek permission storage
ls -la /var/www/html/mataramsakti/storage/

# Cek .env file
cat /var/www/html/mataramsakti/.env
```

### 3. **Cek Database Connection**
```bash
cd /var/www/html/mataramsakti
php artisan migrate:status
php artisan tinker --execute="DB::connection()->getPdo();"
```

### 4. **Cek PHP dan Extensions**
```bash
# Cek PHP version
php -v

# Cek PHP extensions
php -m | grep -E "(pdo|pgsql|mbstring|openssl|tokenizer|xml|ctype|json)"

# Cek PHP-FPM status
sudo systemctl status php8.1-fpm
```

### 5. **Cek PostgreSQL**
```bash
# Cek PostgreSQL status
sudo systemctl status postgresql

# Cek port PostgreSQL
sudo netstat -plunt | grep postgres

# Test koneksi database
psql -U postgres -h 127.0.0.1 -p 3424 -d company_profile_xxx
```

### 6. **Cek Apache Configuration**
```bash
# Test Apache config
sudo apache2ctl configtest

# Cek virtual host
sudo apache2ctl -S

# Restart Apache
sudo systemctl restart apache2
```

## 🚨 **Kemungkinan Penyebab Error 500:**

### A. **File Permission Issues**
```bash
# Fix permission
sudo chown -R www-data:www-data /var/www/html/mataramsakti
sudo chmod -R 755 /var/www/html/mataramsakti
sudo chmod -R 775 /var/www/html/mataramsakti/storage
sudo chmod -R 775 /var/www/html/mataramsakti/bootstrap/cache
```

### B. **Missing .env File**
```bash
# Copy .env
cp /var/www/html/mataramsakti/.env.server /var/www/html/mataramsakti/.env
php artisan key:generate --force
```

### C. **Database Connection Issues**
- Cek apakah PostgreSQL berjalan
- Cek port database (3424 atau 5432)
- Cek username/password database
- Cek nama database

### D. **Missing Dependencies**
```bash
cd /var/www/html/mataramsakti
composer install --no-dev --optimize-autoloader
```

### E. **Cache Issues**
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
```

### F. **Storage Link Missing**
```bash
php artisan storage:link
```

### G. **Apache Virtual Host Issues**
- Pastikan DocumentRoot mengarah ke `/var/www/html/mataramsakti/public`
- Pastikan AllowOverride All
- Pastikan mod_rewrite enabled

## 🔧 **Quick Fix Commands:**

```bash
# Jalankan script perbaikan
cd /var/www/html/mataramsakti
chmod +x fix-server.sh
./fix-server.sh

# Atau manual:
sudo chown -R www-data:www-data .
sudo chmod -R 775 storage bootstrap/cache
php artisan key:generate --force
php artisan migrate --force
php artisan storage:link
php artisan optimize:clear
php artisan config:cache
sudo systemctl restart apache2
```

## 📞 **Jika Masih Error:**

1. **Aktifkan Debug Mode Sementara:**
   ```bash
   # Edit .env
   APP_DEBUG=true
   APP_ENV=local
   
   # Clear cache
   php artisan config:clear
   ```

2. **Cek Error Detail di Browser**

3. **Kembalikan ke Production Mode:**
   ```bash
   APP_DEBUG=false
   APP_ENV=production
   php artisan config:cache
   ```