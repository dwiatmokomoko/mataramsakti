#!/bin/bash

# Fix breadcrumb component syntax error
# This script will replace the breadcrumb.blade.php file with a corrected version

echo "🔧 Fixing breadcrumb component..."

# Backup the current file
cp resources/views/components/breadcrumb.blade.php resources/views/components/breadcrumb.blade.php.backup
echo "✅ Backup created: breadcrumb.blade.php.backup"

# Create the corrected breadcrumb file
cat > resources/views/components/breadcrumb.blade.php << 'EOF'
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

<!-- Structured Data for Breadcrumb -->
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
EOF

echo "✅ Breadcrumb component fixed!"

# Clear view cache
php artisan view:clear
echo "✅ View cache cleared"

# Test the fix
echo ""
echo "🧪 Testing motor detail page..."
curl -I http://localhost:20275/motor/1

echo ""
echo "✅ Fix completed!"
echo ""
echo "📋 Next steps:"
echo "1. Test motor detail page: http://localhost:20275/motor/1"
echo "2. If working, test public access: http://yamahajogja.id:20275/"
echo "3. Remember to disable Cloudflare proxy (Orange → Gray Cloud) for custom port"
