# Panduan Deployment ke Server Production

## Perubahan File .env untuk Production

Ketika deploy ke server production, Anda perlu mengubah beberapa konfigurasi di file `.env`:

### 1. Environment & Debug
```env
APP_ENV=production          # Ubah dari 'local' ke 'production'
APP_DEBUG=false            # Ubah dari 'true' ke 'false' untuk keamanan
APP_URL=https://yourdomain.com  # Ganti dengan domain Anda
```

### 2. Locale
```env
APP_LOCALE=id              # Ubah ke bahasa Indonesia
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=id_ID
```

### 3. Database Configuration
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=3424               # Port PostgreSQL di server (biasanya 3424 atau 5432)
DB_DATABASE=company_profile_xxx
DB_USERNAME=postgres
DB_PASSWORD=your_secure_password  # Ganti dengan password yang aman
```

### 4. Session & Security
```env
SESSION_ENCRYPT=true       # Aktifkan enkripsi session
SESSION_DOMAIN=yourdomain.com  # Set domain untuk session
```

### 5. File Storage
```env
FILESYSTEM_DISK=public     # Untuk upload gambar motor
```

### 6. Logging
```env
LOG_LEVEL=error           # Hanya log error di production
```

### 7. Mail Configuration (Opsional)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="Yamaha Motor Indonesia"
```

## Langkah-langkah Deployment

### 1. Di Server Production
```bash
# Clone repository
git clone https://github.com/dwiatmokomoko/mataramsakti.git
cd mataramsakti

# Copy file .env
cp .env.production .env

# Edit .env sesuai konfigurasi server
nano .env

# Install dependencies
composer install --optimize-autoloader --no-dev

# Generate application key (jika belum ada)
php artisan key:generate

# Setup storage link
php artisan storage:link

# Run migrations
php artisan migrate --force

# Seed database
php artisan db:seed --class=CorrectedMotorStructureSeeder
php artisan db:seed --class=AdminUserSeeder

# Clear dan cache config
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set permissions
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### 2. Konfigurasi Web Server (Apache/Nginx)

#### Apache (.htaccess sudah ada)
Pastikan DocumentRoot mengarah ke folder `public/`

#### Nginx
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /var/www/html/mataramsakti/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### 3. SSL Certificate (Recommended)
```bash
# Install Certbot
sudo apt install certbot python3-certbot-apache

# Get SSL certificate
sudo certbot --apache -d yourdomain.com
```

## Troubleshooting

### 1. Permission Issues
```bash
sudo chown -R www-data:www-data /var/www/html/mataramsakti
sudo chmod -R 755 /var/www/html/mataramsakti
sudo chmod -R 775 /var/www/html/mataramsakti/storage
sudo chmod -R 775 /var/www/html/mataramsakti/bootstrap/cache
```

### 2. Database Connection Issues
- Pastikan PostgreSQL berjalan: `sudo systemctl status postgresql`
- Cek port PostgreSQL: `sudo netstat -plunt | grep postgres`
- Test koneksi: `php artisan migrate:status`

### 3. File Upload Issues
```bash
# Pastikan storage link ada
php artisan storage:link

# Set permission untuk upload
sudo chmod -R 775 storage/app/public
```

### 4. Cache Issues
```bash
# Clear semua cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Rebuild cache untuk production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Keamanan Production

1. **Jangan commit file .env ke Git**
2. **Gunakan password database yang kuat**
3. **Aktifkan HTTPS**
4. **Set APP_DEBUG=false**
5. **Gunakan APP_ENV=production**
6. **Backup database secara berkala**

## Monitoring

### Log Files
- Laravel logs: `storage/logs/laravel.log`
- Web server logs: `/var/log/apache2/` atau `/var/log/nginx/`

### Database Backup
```bash
# Backup database
pg_dump -U postgres -h localhost company_profile_xxx > backup_$(date +%Y%m%d).sql

# Restore database
psql -U postgres -h localhost company_profile_xxx < backup_20260205.sql
```