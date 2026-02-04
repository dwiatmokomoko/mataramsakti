# Admin Panel Guide - Yamaha Dealer Website

## Login Information
- **URL**: http://127.0.0.1:8000/admin/login
- **Email**: admin@yamaha.com
- **Password**: password

## Dashboard Overview

### Statistics Cards
1. **Total Motor**: Jumlah jenis motor (NMAX, R15, XMAX, dll)
2. **Total Model**: Jumlah model dari semua motor (NMAX Standard, NMAX Turbo, dll)
3. **Model Aktif**: Model yang sedang aktif dan ditampilkan di website
4. **Model Unggulan**: Model yang ditampilkan di hero carousel

### Category Distribution
Menampilkan distribusi motor per kategori:
- Maxi (NMAX, XMAX, TMAX)
- Matic (AEROX, LEXI)
- Sport (R15, VIXION)
- Moped (JUPITER Z1)

### Recent Motors Table
Menampilkan 5 motor terbaru dengan informasi:
- Nama motor dan jumlah model
- Kategori
- Harga mulai (dari model termurah)
- Status aktif/nonaktif
- Aksi (lihat detail, edit)

## Menu Management

### 1. Motor Management
**URL**: `/admin/motors`

**Fungsi**: Mengelola informasi dasar motor (nama, kategori, deskripsi)

**Fields**:
- Name (contoh: NMAX, R15, XMAX)
- Category (Maxi, Matic, Sport, Moped)
- Description
- Status (Active/Inactive)

**Actions**:
- Create: Tambah motor baru
- Edit: Edit informasi motor
- Show: Lihat detail motor dan semua modelnya
- Delete: Hapus motor (hanya jika tidak ada model)

### 2. Motor Model Management
**URL**: `/admin/motors/{motor}/models`

**Fungsi**: Mengelola model/varian dari setiap motor

**Fields**:
- Name (contoh: Standard, Turbo, Connected)
- Full Name (contoh: NMAX Standard, NMAX Turbo)
- Description
- Price OTR
- Price DP
- Price Installment
- Image
- Specifications (JSON format)
- Featured (tampil di hero carousel)
- Status (Active/Inactive)

**Actions**:
- Create: Tambah model baru untuk motor
- Edit: Edit informasi model
- Show: Lihat detail model dan variannya
- Delete: Hapus model (hanya jika tidak ada varian)

### 3. Motor Variant Management (Colors)
**URL**: `/admin/motors/{motor}/models/{model}/variants`

**Fungsi**: Mengelola pilihan warna untuk setiap model

**Fields**:
- Color Name (contoh: Matte Black, Racing Blue)
- Color Code (hex atau CSS gradient)
- Image (gambar motor dengan warna tersebut)
- Price Difference (selisih harga dari harga dasar)
- Available (tersedia/tidak)

**Actions**:
- Create: Tambah warna baru
- Edit: Edit informasi warna
- Delete: Hapus warna

### 4. Company Management
**URL**: `/admin/company`

**Fungsi**: Mengelola informasi dealer

### 5. Testimonial Management
**URL**: `/admin/testimonials`

**Fungsi**: Mengelola testimoni pelanggan

## Workflow Management

### Menambah Motor Baru
1. **Buat Motor** → Tambah informasi dasar (nama, kategori)
2. **Tambah Model** → Tambah varian model dengan harga dan spesifikasi
3. **Tambah Warna** → Tambah pilihan warna untuk setiap model
4. **Set Featured** → Pilih model yang akan ditampilkan di hero carousel

### Contoh: Menambah NMAX
1. **Motor**: Name="NMAX", Category="Maxi"
2. **Models**:
   - NMAX Standard (Rp 32,650,000)
   - NMAX Turbo (Rp 38,650,000) - Featured
   - NMAX Connected (Rp 35,650,000)
3. **Variants** untuk setiap model:
   - Standard: Matte Black, White, Racing Blue
   - Turbo: Matte Grey, Matte Red, Turbo Blue
   - Connected: Cyber Blue, Tech Silver

## Data Structure

### Hierarchy
```
Motor (NMAX)
├── Model (Standard) - Rp 32,650,000
│   ├── Variant (Matte Black)
│   ├── Variant (White)
│   └── Variant (Racing Blue)
├── Model (Turbo) - Rp 38,650,000 [Featured]
│   ├── Variant (Matte Grey)
│   ├── Variant (Matte Red)
│   └── Variant (Turbo Blue)
└── Model (Connected) - Rp 35,650,000
    ├── Variant (Cyber Blue)
    └── Variant (Tech Silver)
```

## Specifications Format

Specifications disimpan dalam format JSON dengan key-value pairs:

```json
{
  "tipe_mesin": "4-Langkah, SOHC, Silinder Tunggal, Pendingin Cairan",
  "kapasitas_mesin": "155 cc",
  "daya_maksimum": "11.1 kW (15.0 PS) / 8,000 rpm",
  "torsi_maksimum": "13.9 Nm / 6,500 rpm",
  "sistem_bahan_bakar": "Fuel Injection",
  "tipe_transmisi": "V-Belt Automatic",
  "kapasitas_tangki": "6.6 L",
  "berat_isi": "127 kg"
}
```

## Quick Actions

Dashboard menyediakan quick actions:
- **Tambah Motor Baru**: Langsung ke form create motor
- **Edit Info Dealer**: Edit informasi company
- **Lihat Website**: Buka website di tab baru

## System Information

Dashboard menampilkan informasi sistem:
- Laravel version
- PHP version
- Database type (PostgreSQL)
- Last update timestamp

## Best Practices

1. **Konsistensi Naming**: Gunakan naming yang konsisten untuk motor dan model
2. **Featured Models**: Pilih 3-4 model featured untuk hero carousel
3. **Image Quality**: Upload gambar berkualitas tinggi (min 800x600px)
4. **Specifications**: Lengkapi spesifikasi untuk semua model
5. **Price Updates**: Update harga secara berkala sesuai kebijakan dealer
6. **Color Codes**: Gunakan hex code yang akurat untuk warna motor

## Troubleshooting

### Motor tidak muncul di website
- Pastikan motor dan model dalam status Active
- Pastikan ada minimal 1 variant warna yang Available

### Gambar tidak tampil
- Pastikan file gambar sudah terupload
- Check format file (JPG, PNG, GIF)
- Pastikan ukuran file tidak melebihi 2MB

### Spesifikasi tidak tampil
- Pastikan format JSON specifications benar
- Check key names sesuai dengan yang digunakan di view

Sistem admin panel ini memberikan kontrol penuh untuk mengelola lineup motor Yamaha dengan struktur yang fleksibel dan user-friendly.