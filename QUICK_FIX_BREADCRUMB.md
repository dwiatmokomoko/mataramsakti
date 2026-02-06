# QUICK FIX - Breadcrumb Error

## Masalah
Error di line 59: `syntax error, unexpected end of file, expecting "elseif" or "else" or "endif"`

## Solusi Cepat

Jalankan command ini di server (copy-paste langsung):

```bash
cd /var/www/html/mataramsakti

# Backup file lama
cp resources/views/components/breadcrumb.blade.php resources/views/components/breadcrumb.blade.php.error-backup

# Buat file baru yang benar
cat > resources/views/components/breadcrumb.blade.php << 'ENDOFFILE'
@props([
    'items' => []
])

@if(count($items) > 0)
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}" class="text-decoration-none">
                <i class="fas fa-home me-1" aria-hidden="true"></i>Home
            </a>
        </li>
        
        @foreach($items as $index => $item)
            @if($loop->last)
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $item['title'] }}
                </li>
            @else
                <li class="breadcrumb-item">
                    @if(isset($item['url']))
                        <a href="{{ $item['url'] }}" class="text-decoration-none">
                            {{ $item['title'] }}
                        </a>
                    @else
                        {{ $item['title'] }}
                    @endif
                </li>
            @endif
        @endforeach
    </ol>
</nav>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ route('home') }}"
        }
        @foreach($items as $index => $item)
        ,{
            "@type": "ListItem",
            "position": {{ $index + 2 }},
            "name": "{{ $item['title'] }}"
            @if(isset($item['url']) && !$loop->last)
            ,"item": "{{ $item['url'] }}"
            @endif
        }
        @endforeach
    ]
}
</script>
@endif
ENDOFFILE

# Clear cache
php artisan view:clear

# Test
curl -I http://localhost:20275/motor/48

echo "✅ Selesai! Coba akses http://yamahajogja.id/motor/48"
```

## Atau Cara Manual

1. Edit file:
```bash
nano resources/views/components/breadcrumb.blade.php
```

2. Pastikan struktur seperti ini:
   - Baris 1-4: `@props` dan `@if(count($items) > 0)`
   - Baris 5-32: HTML breadcrumb dengan `@foreach` dan `@endforeach`
   - Baris 34-57: JSON-LD dengan `@foreach` dan `@endforeach`
   - Baris 59: `@endif` (penutup dari baris 4)

3. Setiap `@if` harus punya `@endif`
4. Setiap `@foreach` harus punya `@endforeach`

## Verifikasi

Setelah fix, cek:
```bash
# Hitung jumlah @if dan @endif (harus sama)
grep -c "@if" resources/views/components/breadcrumb.blade.php
grep -c "@endif" resources/views/components/breadcrumb.blade.php

# Hitung jumlah @foreach dan @endforeach (harus sama)
grep -c "@foreach" resources/views/components/breadcrumb.blade.php
grep -c "@endforeach" resources/views/components/breadcrumb.blade.php
```

Hasilnya harus:
- `@if`: 4
- `@endif`: 4
- `@foreach`: 2
- `@endforeach`: 2

## Test Setelah Fix

```bash
# Clear semua cache
php artisan optimize:clear

# Test homepage
curl -I http://localhost:20275/

# Test motor detail
curl -I http://localhost:20275/motor/48

# Keduanya harus return: HTTP/1.1 200 OK
```
