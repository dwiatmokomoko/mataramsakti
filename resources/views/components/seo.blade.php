@props([
    'title' => null,
    'description' => null,
    'keywords' => [],
    'image' => null,
    'url' => null,
    'type' => 'website',
    'structuredData' => null,
    'noindex' => false,
    'canonical' => null
])

@php
    use App\Helpers\SEOHelper;
    
    $seoTitle = SEOHelper::generateTitle($title);
    $seoDescription = SEOHelper::generateDescription($description);
    $seoKeywords = SEOHelper::generateKeywords($keywords);
    $canonicalUrl = SEOHelper::generateCanonicalUrl($canonical);
    
    $ogData = SEOHelper::generateOpenGraphData([
        'title' => $title ?: $seoTitle,
        'description' => $seoDescription,
        'image' => $image ?: asset('images/yamaha-og-default.jpg'),
        'url' => $url ?: $canonicalUrl,
        'type' => $type
    ]);
    
    $twitterData = SEOHelper::generateTwitterCardData([
        'title' => $title ?: $seoTitle,
        'description' => $seoDescription,
        'image' => $image ?: asset('images/yamaha-twitter-default.jpg')
    ]);
@endphp

<!-- Basic SEO Meta Tags -->
<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<meta name="keywords" content="{{ $seoKeywords }}">
<meta name="author" content="Yamaha Motor Indonesia">
<meta name="robots" content="{{ $noindex ? 'noindex, nofollow' : 'index, follow' }}">
<meta name="googlebot" content="{{ $noindex ? 'noindex, nofollow' : 'index, follow' }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ $canonicalUrl }}">

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="{{ $ogData['title'] }}">
<meta property="og:description" content="{{ $ogData['description'] }}">
<meta property="og:image" content="{{ $ogData['image'] }}">
<meta property="og:url" content="{{ $ogData['url'] }}">
<meta property="og:type" content="{{ $ogData['type'] }}">
<meta property="og:site_name" content="{{ $ogData['site_name'] }}">
<meta property="og:locale" content="id_ID">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="{{ $twitterData['card'] }}">
<meta name="twitter:title" content="{{ $twitterData['title'] }}">
<meta name="twitter:description" content="{{ $twitterData['description'] }}">
<meta name="twitter:image" content="{{ $twitterData['image'] }}">
<meta name="twitter:site" content="{{ $twitterData['site'] }}">

<!-- Additional Meta Tags -->
<meta name="theme-color" content="#1e3c72">
<meta name="msapplication-TileColor" content="#1e3c72">
<meta name="application-name" content="Yamaha Motor Indonesia">

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">

<!-- Structured Data -->
@if($structuredData)
<script type="application/ld+json">
{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endif

<!-- Preconnect for Performance -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net">
<link rel="preconnect" href="https://cdnjs.cloudflare.com">

<!-- DNS Prefetch -->
<link rel="dns-prefetch" href="//www.google-analytics.com">
<link rel="dns-prefetch" href="//www.googletagmanager.com">
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//cdn.jsdelivr.net">

<!-- Alternate Language Links -->
<link rel="alternate" hreflang="id" href="{{ $canonicalUrl }}">
<link rel="alternate" hreflang="x-default" href="{{ $canonicalUrl }}">