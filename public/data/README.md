# Panduan Tabel Angsuran Kredit Motor Yamaha

## Struktur File

File `installment-tables.json` berisi tabel angsuran untuk setiap model motor berdasarkan harga OTR.

## Format Data

```json
{
  "HARGA_OTR": [
    {
      "dp": NILAI_DP,
      "installments": {
        "11": ANGSURAN_11_BULAN,
        "17": ANGSURAN_17_BULAN,
        "23": ANGSURAN_23_BULAN,
        "29": ANGSURAN_29_BULAN,
        "35": ANGSURAN_35_BULAN
      }
    }
  ]
}
```

## Cara Menambahkan Motor Baru

### 1. Buka file `installment-tables.json`

### 2. Tambahkan entry baru dengan format:

```json
"28840000": [
  { "dp": 2900000, "installments": { "11": 2828000, "17": 1937000, "23": 1514000, "29": 1261000, "35": 1101000 } },
  { "dp": 3000000, "installments": { "11": 2818000, "17": 1930000, "23": 1508000, "29": 1256000, "35": 1097000 } },
  ...
]
```

### 3. Key (Harga OTR)
- Gunakan harga OTR motor tanpa titik atau koma
- Contoh: Rp 28.840.000 → `"28840000"`

### 4. Array DP dan Angsuran
- Setiap entry berisi:
  - `dp`: Nilai uang muka (DP)
  - `installments`: Object berisi angsuran untuk 5 tenor (11, 17, 23, 29, 35 bulan)

### 5. Urutkan DP dari terkecil ke terbesar

## Contoh Lengkap

```json
{
  "28550000": [
    { "dp": 2900000, "installments": { "11": 2798000, "17": 1917000, "23": 1498000, "29": 1247000, "35": 1089000 } },
    { "dp": 3000000, "installments": { "11": 2788000, "17": 1910000, "23": 1492000, "29": 1243000, "35": 1085000 } }
  ],
  "28840000": [
    { "dp": 2900000, "installments": { "11": 2828000, "17": 1937000, "23": 1514000, "29": 1261000, "35": 1101000 } },
    { "dp": 3000000, "installments": { "11": 2818000, "17": 1930000, "23": 1508000, "29": 1256000, "35": 1097000 } }
  ]
}
```

## Tips

1. **Validasi JSON**: Pastikan format JSON valid sebelum menyimpan
2. **Backup**: Selalu backup file sebelum melakukan perubahan
3. **Testing**: Test simulasi kredit setelah menambahkan data baru
4. **Konsistensi**: Pastikan semua motor memiliki 5 tenor yang sama (11, 17, 23, 29, 35)

## Cara Kerja Sistem

1. Sistem akan mencari harga motor yang **exact match** terlebih dahulu
2. Jika tidak ada exact match, sistem akan mencari harga yang **paling mendekati**
3. Sistem akan mencari DP yang **paling mendekati** dari input user
4. Menampilkan 5 paket kredit dengan tenor berbeda

## Troubleshooting

### Motor tidak muncul angsurannya
- Pastikan harga OTR di database sesuai dengan key di JSON
- Cek console browser untuk error loading JSON

### Angsuran tidak sesuai
- Periksa kembali data di tabel PDF
- Pastikan tidak ada typo dalam angka

### File JSON error
- Gunakan JSON validator online untuk mengecek format
- Pastikan tidak ada koma berlebih di akhir array/object

## Update Data

Untuk update data angsuran:
1. Edit file `public/data/installment-tables.json`
2. Simpan perubahan
3. Refresh halaman (tidak perlu restart server)
4. Clear cache browser jika perlu

## Keamanan

- File JSON ini bersifat **read-only** dari sisi client
- Tidak ada API untuk mengubah data dari frontend
- Hanya admin server yang bisa mengubah file ini

---

**Catatan**: Sistem ini dirancang untuk scalable hingga ratusan model motor tanpa perlu mengubah code atau database.
