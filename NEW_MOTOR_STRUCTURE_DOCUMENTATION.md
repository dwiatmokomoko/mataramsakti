# Dokumentasi Struktur Motor Baru

## Overview
Sistem telah diperbarui dengan struktur database yang lebih logis dan sesuai dengan kebutuhan bisnis:

**Motor → Model → Variant (Warna)**

## Struktur Database

### 1. Tabel `motors`
Tabel utama untuk kategori motor (NMAX, R15, XMAX, dll)

**Kolom:**
- `id` - Primary key
- `name` - Nama motor (contoh: "NMAX", "R15", "XMAX")
- `category` - Kategori motor (Maxi, Sport, Matic, dll)
- `description` - Deskripsi motor
- `is_active` - Status aktif

### 2. Tabel `motor_models`
Tabel untuk model/varian dari setiap motor

**Kolom:**
- `id` - Primary key
- `motor_id` - Foreign key ke tabel motors
- `name` - Nama model (contoh: "Standard", "Turbo", "Connected")
- `full_name` - Nama lengkap (contoh: "NMAX Standard", "NMAX Turbo")
- `description` - Deskripsi model
- `price_otr` - Harga OTR
- `price_dp` - Harga DP
- `price_installment` - Cicilan
- `image` - Gambar model
- `specifications` - Spesifikasi (JSON)
- `is_featured` - Apakah featured
- `is_active` - Status aktif

### 3. Tabel `motor_variants`
Tabel untuk pilihan warna dari setiap model

**Kolom:**
- `id` - Primary key
- `motor_model_id` - Foreign key ke tabel motor_models
- `color_name` - Nama warna (contoh: "Matte Black", "Racing Blue")
- `color_code` - Kode warna (hex atau gradient CSS)
- `image` - Gambar dengan warna tersebut
- `price_difference` - Selisih harga dari harga dasar
- `is_available` - Status ketersediaan

## Contoh Data Structure

### NMAX (Motor)
- **NMAX Standard** (Model)
  - Matte Black (Variant)
  - White (Variant)
  - Racing Blue (Variant)
- **NMAX Turbo** (Model)
  - Matte Grey (Variant)
  - Matte Red (Variant)
  - Turbo Blue (Variant)
- **NMAX Connected** (Model)
  - Cyber Blue (Variant)
  - Tech Silver (Variant)

### R15 (Motor)
- **R15 Standard** (Model)
  - Racing Blue (Variant)
  - Matte Black (Variant)
  - White (Variant)
- **R15M** (Model)
  - Monster Energy (Variant)
  - MotoGP Edition (Variant)

## Model Relationships

### Motor Model
```php
public function models()
{
    return $this->hasMany(MotorModel::class);
}

public function activeModels()
{
    return $this->hasMany(MotorModel::class)->where('is_active', true);
}

public function featuredModels()
{
    return $this->hasMany(MotorModel::class)->where('is_featured', true);
}
```

### MotorModel Model
```php
public function motor()
{
    return $this->belongsTo(Motor::class);
}

public function variants()
{
    return $this->hasMany(MotorVariant::class);
}

public function availableVariants()
{
    return $this->hasMany(MotorVariant::class)->where('is_available', true);
}
```

### MotorVariant Model
```php
public function motorModel()
{
    return $this->belongsTo(MotorModel::class);
}
```

## Controller Updates

### HomeController
```php
public function index()
{
    // Ambil motor models yang featured untuk hero carousel
    $featuredMotors = MotorModel::with(['motor', 'availableVariants'])
        ->where('is_active', true)
        ->where('is_featured', true)
        ->get();
    
    // Ambil semua motor models untuk grid
    $allMotors = MotorModel::with(['motor', 'availableVariants'])
        ->where('is_active', true)
        ->get();
}

public function show(Motor $motor)
{
    // Load motor dengan semua models dan variants
    $motor->load(['models.variants', 'models' => function($query) {
        $query->where('is_active', true)->orderBy('price_otr', 'asc');
    }]);
}
```

## View Updates

### Home Page
- Hero carousel menampilkan `MotorModel` yang featured
- Motor grid menampilkan semua `MotorModel` yang aktif
- Setiap card menampilkan informasi dari `MotorModel`

### Motor Detail Page
- Variant tabs menampilkan semua `MotorModel` dari motor yang dipilih
- Color selection menampilkan `MotorVariant` dari model yang aktif
- Specifications diambil dari `MotorModel` yang aktif
- Dynamic content update saat ganti model/variant

## JavaScript Functionality

### Variant Tab System
- Setiap tab mewakili satu `MotorModel`
- Klik tab akan update:
  - Motor image
  - Motor name (full_name)
  - Price (price_otr)
  - Available colors (variants)
  - Specifications

### Color Selection
- Setiap color swatch mewakili satu `MotorVariant`
- Klik color akan update:
  - Motor image (jika ada)
  - Color name
  - Price (dengan price_difference)

## Seeder Data

### Motors Created:
1. **NMAX** (Maxi)
   - Standard (Rp 32,650,000)
   - Turbo (Rp 38,650,000) - Featured
   - Connected (Rp 35,650,000)

2. **R15** (Sport)
   - Standard (Rp 38,680,000) - Featured
   - M (Rp 42,680,000)

3. **XMAX** (Maxi)
   - 250 (Rp 68,215,000) - Featured

### Total Variants: 13 color options across all models

## Benefits of New Structure

1. **Logical Organization**: Motor → Model → Color follows real-world structure
2. **Flexible Pricing**: Each model can have different prices
3. **Individual Specifications**: Each model can have unique specs
4. **Better Management**: Easier to manage variants in admin
5. **Scalable**: Easy to add new motors, models, and colors
6. **SEO Friendly**: Better URL structure for different models
7. **User Experience**: Clear distinction between models and colors

## Migration Process

1. Created new `motor_models` table
2. Updated `motor_variants` to reference `motor_model_id`
3. Removed unnecessary columns from `motors` table
4. Updated all models and relationships
5. Updated controllers and views
6. Migrated data using `NewMotorStructureSeeder`

## Admin Panel Updates Needed

The admin panel will need to be updated to manage the new structure:
1. Motor management (basic info only)
2. Motor Model management (prices, specs, images)
3. Motor Variant management (colors for each model)

This new structure provides a much more flexible and maintainable system for managing Yamaha's motor lineup.