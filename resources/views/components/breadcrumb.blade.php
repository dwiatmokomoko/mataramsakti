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
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ route('home') }}"
        }
        @foreach($items as $index => $item)
        ,{
            "@@type": "ListItem",
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
