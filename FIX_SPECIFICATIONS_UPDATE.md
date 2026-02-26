# Fix Update Spesifikasi Motor & Status

## Masalah yang Diperbaiki

1. **Field spesifikasi tidak bisa diupdate** - Form sudah ada tapi data tidak tersimpan
2. **Checkbox status tidak berfungsi** - is_active, is_featured tidak bisa diubah

## Perubahan yang Dilakukan

### 1. Model Motor (`app/Models/Motor.php`)
- Menambahkan field ke `$fillable`: `specifications`, `model`, `price_otr`, `price_dp`, `price_installment`, `image`, `is_featured`
- Menambahkan casting: `specifications` => `array`, `is_featured` => `boolean`
- **PENTING**: Menghapus accessor `getSpecificationsAttribute()` yang meng-override data dari database

### 2. MotorController (`app/Http/Controllers/Admin/MotorController.php`)
- Update validation untuk menerima semua field
- Perbaiki handling checkbox `is_active` dan `is_featured`
- Tambahkan handling upload image

### 3. MotorModelController (`app/Http/Controllers/Admin/MotorModelController.php`)
- Perbaiki handling checkbox `is_active` dan `is_featured`
- Update validation untuk field `specifications`

### 4. MotorVariantController (`app/Http/Controllers/Admin/MotorVariantController.php`)
- Perbaiki handling checkbox `is_available`

### 5. Form Views
- `resources/views/admin/motor-models/create.blade.php` - Tambah field spesifikasi
- `resources/views/admin/motor-models/edit.blade.php` - Tambah field spesifikasi

## Cara Testing

### Test Update Motor (URL: /admin/motors/{id}/edit)

1. Login ke admin panel
2. Buka halaman edit motor (contoh: /admin/motors/34/edit)
3. Isi field spesifikasi:
   - Tipe Mesin: "4 Langkah, SOHC, VVA"
   - Kapasitas Mesin: "155cc"
   - Daya Maksimum: "15,4 PS / 8000 rpm"
   - dll.
4. Centang/uncheck checkbox "Status Aktif" dan "Motor Unggulan"
5. Klik "Update Motor"
6. Cek di halaman depan apakah spesifikasi muncul

### Test Update Model Motor (URL: /admin/motors/{motor_id}/models/{id}/edit)

1. Buka halaman edit model motor
2. Isi field spesifikasi (sama seperti di atas)
3. Centang/uncheck checkbox "Aktif" dan "Featured"
4. Klik "Update Model"
5. Cek di halaman depan

## Prioritas Spesifikasi

View `motor-detail.blade.php` menggunakan logika:
```php
$specifications = $firstModel ? $firstModel->specifications : $motor->specifications;
```

Artinya:
1. Jika ada model motor, gunakan spesifikasi dari model pertama
2. Jika tidak ada model, gunakan spesifikasi dari motor

## Troubleshooting

### Spesifikasi masih tidak muncul?

1. Cek apakah data tersimpan di database:
```sql
SELECT id, name, specifications FROM motors WHERE id = 34;
SELECT id, name, specifications FROM motor_models WHERE motor_id = 34;
```

2. Pastikan format JSON valid di database
3. Clear cache Laravel:
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Checkbox tidak berfungsi?

1. Inspect element di browser, pastikan checkbox memiliki:
   - `name="is_active"` atau `name="is_featured"`
   - `value="1"`
2. Cek di Network tab browser apakah field dikirim saat submit
3. Jika checkbox tidak dicentang, field tidak akan ada di request (ini normal)
