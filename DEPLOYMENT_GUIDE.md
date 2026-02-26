# Deployment Guide - Fix Spesifikasi Motor

## Perubahan yang Di-push

Commit: `e98dca4` - "fix admin page"

File yang diubah:
- `app/Models/Motor.php` - Tambah fillable & casts, hapus accessor specifications
- `app/Http/Controllers/Admin/MotorController.php` - Fix checkbox & validation
- `app/Http/Controllers/Admin/MotorModelController.php` - Fix checkbox & validation
- `app/Http/Controllers/Admin/MotorVariantController.php` - Fix checkbox
- `resources/views/admin/motor-models/create.blade.php` - Tambah field spesifikasi
- `resources/views/admin/motor-models/edit.blade.php` - Tambah field spesifikasi
- `FIX_SPECIFICATIONS_UPDATE.md` - Dokumentasi

## Langkah Deployment di Server

### 1. SSH ke Server
```bash
ssh user@yamahajogja.id
```

### 2. Masuk ke Direktori Project
```bash
cd /path/to/project
```

### 3. Pull Perubahan Terbaru
```bash
git pull origin main
```

### 4. Clear Cache Laravel
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### 5. Restart PHP-FPM / Web Server
```bash
# Untuk PHP-FPM
sudo systemctl restart php8.2-fpm

# Atau untuk Apache
sudo systemctl restart apache2

# Atau untuk Nginx
sudo systemctl restart nginx
```

## Troubleshooting Error 500

### Error: Database Connection Refused

Jika muncul error:
```
SQLSTATE[08006] [7] could not connect to server: Connection refused
Is the server running on host "127.0.0.1" and accepting TCP/IP connections on port 5432?
```

**Solusi:**

1. Cek status PostgreSQL:
```bash
sudo systemctl status postgresql
```

2. Jika tidak running, start PostgreSQL:
```bash
sudo systemctl start postgresql
```

3. Cek koneksi database di `.env`:
```bash
cat .env | grep DB_
```

Pastikan:
- `DB_CONNECTION=pgsql`
- `DB_HOST=127.0.0.1`
- `DB_PORT=5432`
- `DB_DATABASE=nama_database`
- `DB_USERNAME=username`
- `DB_PASSWORD=password`

4. Test koneksi database:
```bash
php artisan tinker
>>> DB::connection()->getPdo();
```

### Error: Permission Denied

Jika ada error permission:
```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

## Verifikasi Deployment

### 1. Cek Log Error
```bash
tail -f storage/logs/laravel.log
```

### 2. Test Update Motor
1. Login ke admin: `https://yamahajogja.id/admin`
2. Buka edit motor: `https://yamahajogja.id/admin/motors/34/edit`
3. Isi field spesifikasi
4. Centang/uncheck checkbox status
5. Klik "Update Motor"
6. Cek apakah berhasil (redirect ke index tanpa error)

### 3. Cek Frontend
1. Buka halaman detail motor
2. Scroll ke bagian "SPECIFICATIONS"
3. Pastikan spesifikasi muncul (bukan "Spesifikasi belum tersedia")

## Rollback (Jika Diperlukan)

Jika ada masalah serius:
```bash
git reset --hard HEAD~1
php artisan cache:clear
sudo systemctl restart php8.2-fpm
```

## Catatan Penting

- Perubahan ini TIDAK memerlukan migration database (kolom sudah ada)
- Tidak ada perubahan pada struktur tabel
- Hanya perubahan logic di Model, Controller, dan View
- Pastikan PostgreSQL running sebelum test
