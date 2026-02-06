#!/bin/bash

echo "🔍 Checking current breadcrumb file..."
echo ""
echo "Current file content:"
cat resources/views/components/breadcrumb.blade.php
echo ""
echo "================================"
echo ""

# Count directives
echo "Counting Blade directives:"
echo "@if count: $(grep -c '@if' resources/views/components/breadcrumb.blade.php)"
echo "@endif count: $(grep -c '@endif' resources/views/components/breadcrumb.blade.php)"
echo "@foreach count: $(grep -c '@foreach' resources/views/components/breadcrumb.blade.php)"
echo "@endforeach count: $(grep -c '@endforeach' resources/views/components/breadcrumb.blade.php)"
echo ""
echo "Expected: @if=4, @endif=4, @foreach=2, @endforeach=2"
echo ""

read -p "Press Enter to fix the file..."

# Backup
cp resources/views/components/breadcrumb.blade.php resources/views/components/breadcrumb.blade.php.broken

# Create correct file
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

echo "✅ File fixed!"
echo ""
echo "New directive counts:"
echo "@if count: $(grep -c '@if' resources/views/components/breadcrumb.blade.php)"
echo "@endif count: $(grep -c '@endif' resources/views/components/breadcrumb.blade.php)"
echo "@foreach count: $(grep -c '@foreach' resources/views/components/breadcrumb.blade.php)"
echo "@endforeach count: $(grep -c '@endforeach' resources/views/components/breadcrumb.blade.php)"
echo ""

# Clear cache
php artisan view:clear
echo ""

# Test
echo "Testing pages..."
curl -I http://localhost:20275/ 2>&1 | grep "HTTP"
curl -I http://localhost:20275/motor/1 2>&1 | grep "HTTP"

echo ""
echo "✅ Done! Check http://yamahajogja.id/motor/1"
