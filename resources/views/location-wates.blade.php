@extends('layouts.app')

@section('title', 'Dealer Yamaha Wates - Harga Motor 2026 Termurah OTR Kulon Progo')

@section('meta')
<meta name="description" content="Dealer Resmi Yamaha di Wates Kulon Progo. Harga Motor Yamaha 2026 Termurah: NMAX Turbo, Aerox Connected, Fazzio Hybrid, R15 V4. Promo DP 0% Kredit Tanpa Survey. Showroom: Jl. Raya Wates. WA: 0856-4195-6326">
<meta name="keywords" content="dealer yamaha wates, yamaha wates, dealer yamaha kulon progo, yamaha kulon progo, harga motor yamaha wates, harga nmax wates, harga aerox wates, kredit motor yamaha wates, promo yamaha wates, showroom yamaha wates, alamat dealer yamaha wates, dealer resmi yamaha wates">

<!-- Open Graph -->
<meta property="og:title" content="Dealer Yamaha Wates - Harga Motor 2026 Termurah OTR Kulon Progo">
<meta property="og:description" content="Dealer Resmi Yamaha di Wates Kulon Progo. Promo DP 0% Kredit Tanpa Survey. WA: 0856-4195-6326">
<meta property="og:url" content="{{ url('/dealer-yamaha-wates') }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ asset('logoyamaha.png') }}">

<!-- Structured Data - LocalBusiness -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "MotorcycleDealer",
  "name": "Dealer Yamaha Wates Kulon Progo",
  "image": "{{ asset('logoyamaha.png') }}",
  "@@id": "{{ url('/dealer-yamaha-wates') }}",
  "url": "{{ url('/dealer-yamaha-wates') }}",
  "telephone": "0856-4195-6326",
  "priceRange": "Rp 15.000.000 - Rp 50.000.000",
  "address": {
    "@@type": "PostalAddress",
    "streetAddress": "Jl. Raya Wates",
    "addressLocality": "Wates",
    "addressRegion": "Kulon Progo",
    "postalCode": "55611",
    "addressCountry": "ID"
  },
  "geo": {
    "@@type": "GeoCoordinates",
    "latitude": -7.8567,
    "longitude": 110.1591
  },
  "openingHoursSpecification": {
    "@@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "08:00",
    "closes": "17:00"
  },
  "sameAs": [
    "https://www.facebook.com/yamahawates",
    "https://www.instagram.com/yamahawates"
  ],
  "areaServed": [
    {
      "@@type": "City",
      "name": "Wates"
    },
    {
      "@@type": "City",
      "name": "Kulon Progo"
    }
  ]
}
</script>
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white">
    
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    Dealer Yamaha Wates Kulon Progo
                </h1>
                <p class="text-xl md:text-2xl mb-8">
                    Dealer Resmi Yamaha Terpercaya di Wates - Harga Motor 2026 Termurah OTR Kulon Progo
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="https://wa.me/6285641956326" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-lg font-bold text-lg transition">
                        <i class="fab fa-whatsapp mr-2"></i> Chat WhatsApp
                    </a>
                    <a href="tel:0856-4195-6326" class="bg-white hover:bg-gray-100 text-blue-600 px-8 py-4 rounded-lg font-bold text-lg transition">
                        <i class="fas fa-phone mr-2"></i> Telepon Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Lokasi & Maps -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Lokasi Showroom Kami di Wates</h2>
            
            <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                <!-- Info Lokasi -->
                <div class="bg-blue-50 p-8 rounded-lg">
                    <h3 class="text-2xl font-bold mb-6 text-blue-800">Alamat Lengkap</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-blue-600 mt-1 mr-3"></i>
                            <div>
                                <p class="font-semibold">Alamat:</p>
                                <p>Jl. Raya Wates, Wates, Kulon Progo, DIY 55611</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-phone text-blue-600 mt-1 mr-3"></i>
                            <div>
                                <p class="font-semibold">Telepon:</p>
                                <p>0856-4195-6326</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-clock text-blue-600 mt-1 mr-3"></i>
                            <div>
                                <p class="font-semibold">Jam Buka:</p>
                                <p>Senin - Minggu: 08:00 - 17:00 WIB</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-car text-blue-600 mt-1 mr-3"></i>
                            <div>
                                <p class="font-semibold">Parkir:</p>
                                <p>Luas & Gratis</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="bg-gray-100 rounded-lg overflow-hidden h-96">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.5!2d110.1591!3d-7.8567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNTEnMjQuMSJTIDExMMKwMDknMzIuOCJF!5e0!3m2!1sen!2sid!4v1234567890"
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>

            <!-- Cara ke Showroom -->
            <div class="mt-12 max-w-4xl mx-auto">
                <h3 class="text-2xl font-bold mb-6 text-center">Cara ke Showroom Kami</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white border-2 border-blue-200 p-6 rounded-lg">
                        <h4 class="font-bold text-lg mb-3 text-blue-800">Dari Jogja Kota</h4>
                        <p class="text-gray-700">Ambil Jl. Godean → Jl. Wates → Sampai Wates (30 menit)</p>
                    </div>
                    <div class="bg-white border-2 border-blue-200 p-6 rounded-lg">
                        <h4 class="font-bold text-lg mb-3 text-blue-800">Dari Sleman</h4>
                        <p class="text-gray-700">Ambil Jl. Magelang → Jl. Godean → Jl. Wates (40 menit)</p>
                    </div>
                    <div class="bg-white border-2 border-blue-200 p-6 rounded-lg">
                        <h4 class="font-bold text-lg mb-3 text-blue-800">Dari Bantul</h4>
                        <p class="text-gray-700">Ambil Jl. Imogiri → Jl. Wates via Ring Road (45 menit)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Promo Khusus Wates -->
    <section class="py-16 bg-gradient-to-r from-red-500 to-red-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">🎉 Promo Spesial Wates Kulon Progo 2026</h2>
            <div class="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto mt-8">
                <div class="bg-white/10 backdrop-blur p-6 rounded-lg">
                    <h3 class="text-2xl font-bold mb-3">DP 0%</h3>
                    <p>Kredit tanpa DP untuk warga Wates & Kulon Progo</p>
                </div>
                <div class="bg-white/10 backdrop-blur p-6 rounded-lg">
                    <h3 class="text-2xl font-bold mb-3">Gratis Ongkir</h3>
                    <p>Pengiriman gratis se-Kulon Progo</p>
                </div>
                <div class="bg-white/10 backdrop-blur p-6 rounded-lg">
                    <h3 class="text-2xl font-bold mb-3">Bonus Aksesoris</h3>
                    <p>Helm, jaket, dan aksesoris senilai 2 juta</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Motor Terlaris di Wates -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Motor Yamaha Terlaris di Wates 2026</h2>
            <div class="grid md:grid-cols-4 gap-6 max-w-6xl mx-auto">
                <div class="bg-blue-50 p-6 rounded-lg text-center">
                    <h3 class="font-bold text-xl mb-2">NMAX Turbo</h3>
                    <p class="text-2xl font-bold text-blue-600 mb-2">Rp 35 Juta</p>
                    <p class="text-sm text-gray-600">Cicilan: Rp 1,2 juta/bulan</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-lg text-center">
                    <h3 class="font-bold text-xl mb-2">Aerox Connected</h3>
                    <p class="text-2xl font-bold text-blue-600 mb-2">Rp 28 Juta</p>
                    <p class="text-sm text-gray-600">Cicilan: Rp 950 ribu/bulan</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-lg text-center">
                    <h3 class="font-bold text-xl mb-2">Fazzio Hybrid</h3>
                    <p class="text-2xl font-bold text-blue-600 mb-2">Rp 22 Juta</p>
                    <p class="text-sm text-gray-600">Cicilan: Rp 750 ribu/bulan</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-lg text-center">
                    <h3 class="font-bold text-xl mb-2">R15 V4</h3>
                    <p class="text-2xl font-bold text-blue-600 mb-2">Rp 42 Juta</p>
                    <p class="text-sm text-gray-600">Cicilan: Rp 1,4 juta/bulan</p>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="{{ url('/') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-bold text-lg inline-block transition">
                    Lihat Semua Motor
                </a>
            </div>
        </div>
    </section>

    <!-- Kenapa Pilih Kami -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Kenapa Beli Motor Yamaha di Wates?</h2>
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="text-center">
                    <div class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-certificate text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Dealer Resmi</h3>
                    <p class="text-gray-600">Authorized dealer Yamaha dengan garansi resmi</p>
                </div>
                <div class="text-center">
                    <div class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tag text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Harga Termurah</h3>
                    <p class="text-gray-600">Harga OTR termurah se-Kulon Progo</p>
                </div>
                <div class="text-center">
                    <div class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shipping-fast text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Proses Cepat</h3>
                    <p class="text-gray-600">Kredit disetujui dalam 1 hari, motor langsung dibawa</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Final -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Kunjungi Showroom Kami di Wates Hari Ini!</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Dapatkan harga terbaik, promo menarik, dan pelayanan terbaik dari tim kami
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="https://wa.me/6285641956326?text=Halo, saya mau tanya motor Yamaha di Wates" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-lg font-bold text-lg transition">
                    <i class="fab fa-whatsapp mr-2"></i> Chat WhatsApp
                </a>
                <a href="tel:0856-4195-6326" class="bg-white hover:bg-gray-100 text-blue-600 px-8 py-4 rounded-lg font-bold text-lg transition">
                    <i class="fas fa-phone mr-2"></i> 0856-4195-6326
                </a>
            </div>
        </div>
    </section>

</div>
@endsection
