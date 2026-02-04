# Yamaha Motor Indonesia - Website Dealer

Website dealer resmi Yamaha Motor Indonesia yang dibangun dengan Laravel dan PostgreSQL.

## Fitur

- **Homepage**: Carousel motor unggulan, filter kategori, dan katalog lengkap motor Yamaha
- **Contact**: Informasi dealer, layanan, dan form kontak
- **Kategori Motor**: Maxi, Matic, Sport, Classy, Off-Road, Moped
- **Responsive Design**: Tampilan optimal di semua perangkat
- **Bootstrap 5**: UI framework modern dengan tema Yamaha

## Teknologi

- **Backend**: Laravel 12
- **Database**: PostgreSQL
- **Frontend**: Bootstrap 5, Font Awesome
- **PHP**: 8.2+

## Data Motor

Website ini dilengkapi dengan data motor Yamaha terlengkap:
- **12 Model Motor** dari berbagai kategori
- **4 Motor Unggulan** di carousel
- **6 Kategori**: Maxi, Matic, Sport, Classy, Off-Road, Moped
- **Informasi Lengkap**: Harga OTR, DP, cicilan, dan spesifikasi

## Admin Panel

Website dilengkapi dengan admin panel untuk mengelola:
- **Kelola Motor**: Tambah, edit, hapus motor
- **Info Dealer**: Update informasi dealer
- **Dashboard**: Statistik dan overview
- **Upload Gambar**: Kelola foto motor dan logo

### Akses Admin
- **URL**: http://localhost:8000/admin/login
- **Default Login**: admin@yamahamataramsakti.com / password
- **Panduan**: Lihat file `ADMIN_GUIDE.md`

## Instalasi

### Prasyarat
- PHP 8.2+
- Composer
- PostgreSQL 12+
- Node.js (opsional, untuk asset compilation)

### 1. Install PostgreSQL
**Windows:**
- Download PostgreSQL dari https://www.postgresql.org/download/windows/
- Install dengan default settings
- Catat password untuk user `postgres`

**macOS:**
```bash
brew install postgresql
brew services start postgresql
```

**Ubuntu/Debian:**
```bash
sudo apt update
sudo apt install postgresql postgresql-contrib
sudo systemctl start postgresql
sudo systemctl enable postgresql
```

### 2. Setup Database PostgreSQL
```bash
# Login ke PostgreSQL
psql -U postgres

# Buat database
CREATE DATABASE company_profile_xxx;

# Buat user (opsional)
CREATE USER company_user WITH PASSWORD 'your_password';
GRANT ALL PRIVILEGES ON DATABASE company_profile_xxx TO company_user;

# Keluar dari psql
\q
```

### 3. Clone Repository
```bash
git clone <repository-url>
cd company-profile-xxx
```

### 4. Install Dependencies
```bash
composer install
```

### 5. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 6. Konfigurasi Database
Edit file `.env` dan sesuaikan konfigurasi PostgreSQL:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=company_profile_xxx
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

### 7. Jalankan Migration dan Seeder
```bash
php artisan migrate
php artisan db:seed
```

### 8. Jalankan Aplikasi
```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## Setup Cepat dengan Script

Saya juga menyediakan script untuk setup otomatis:

### Windows (setup.bat)
```batch
@echo off
echo Setting up Company Profile XXX...

echo Installing dependencies...
composer install

echo Setting up environment...
copy .env.example .env
php artisan key:generate

echo Please configure your PostgreSQL database in .env file
echo Then run: php artisan migrate --seed
pause
```

### Linux/macOS (setup.sh)
```bash
#!/bin/bash
echo "Setting up Company Profile XXX..."

echo "Installing dependencies..."
composer install

echo "Setting up environment..."
cp .env.example .env
php artisan key:generate

echo "Please configure your PostgreSQL database in .env file"
echo "Then run: php artisan migrate --seed"
```

## Struktur Database

### company_infos
- `id`: Primary key
- `name`: Nama dealer
- `description`: Deskripsi dealer
- `vision`: Visi dealer
- `mission`: Misi dealer
- `email`: Email dealer
- `phone`: Nomor telepon
- `address`: Alamat dealer
- `logo`: Path logo dealer
- `website`: Website dealer

### motors
- `id`: Primary key
- `name`: Nama motor (TMAX, XMAX, NMAX, dll)
- `model`: Model lengkap motor
- `description`: Deskripsi motor
- `price_otr`: Harga OTR
- `price_dp`: Harga DP
- `price_installment`: Cicilan per bulan
- `image`: Path gambar motor
- `category`: Kategori (Maxi, Matic, Sport, dll)
- `specifications`: Spesifikasi motor (JSON)
- `is_featured`: Motor unggulan
- `is_active`: Status aktif

## Kustomisasi

### Mengubah Data Dealer
Edit data di `database/seeders/CompanyProfileSeeder.php` atau langsung melalui database.

### Menambah/Edit Motor
Tambahkan data baru ke tabel `motors` atau edit `database/seeders/MotorSeeder.php`.

### Mengubah Kategori Motor
Edit kategori di model Motor atau tambahkan kategori baru di seeder.

### Upload Gambar Motor
1. Simpan gambar di `public/storage/motors/`
2. Update kolom `image` di database
3. Jalankan `php artisan storage:link`

### Styling
Edit file `resources/views/layouts/app.blade.php` untuk mengubah tampilan global.

## Deployment

### Production Setup
1. Set `APP_ENV=production` di file `.env`
2. Set `APP_DEBUG=false`
3. Konfigurasi database production
4. Jalankan `php artisan config:cache`
5. Jalankan `php artisan route:cache`
6. Jalankan `php artisan view:cache`

### Storage Link
Jika menggunakan file upload:
```bash
php artisan storage:link
```

## Kontribusi

1. Fork repository
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## Lisensi

Aplikasi ini menggunakan lisensi MIT. Lihat file `LICENSE` untuk detail.

## Support

Untuk pertanyaan atau dukungan, hubungi:
- Email: info@companyxxx.com
- Website: https://www.companyxxx.com