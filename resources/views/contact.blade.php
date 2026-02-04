@extends('layouts.app')

@section('title', 'Contact - Yamaha Mataram Sakti')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Hubungi Kami</h1>
        <p class="lead text-muted">Dealer resmi Yamaha Motor Indonesia siap melayani Anda</p>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- Informasi Dealer -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary rounded-circle p-3 me-3">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold">Alamat Dealer</h5>
                                    <p class="mb-0">
                                        {{ $company->address ?? 'Jl. Gempol, Giri Peni, Kec. Wates, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta (Depan SAMSAT Wates)' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary rounded-circle p-3 me-3">
                                    <i class="fas fa-phone text-white"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold">Telepon</h5>
                                    <p class="mb-0">
                                        <a href="tel:{{ $company->phone ?? '+62 274 123456' }}" class="text-decoration-none">
                                            {{ $company->phone ?? '+62 274 123456' }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary rounded-circle p-3 me-3">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold">Email</h5>
                                    <p class="mb-0">
                                        <a href="mailto:{{ $company->email ?? 'info@yamahamataramsakti.com' }}" class="text-decoration-none">
                                            {{ $company->email ?? 'info@yamahamataramsakti.com' }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary rounded-circle p-3 me-3">
                                    <i class="fas fa-clock text-white"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold">Jam Operasional</h5>
                                    <p class="mb-0">
                                        Senin - Sabtu: 08.00 - 17.00 WIB<br>
                                        Minggu: 08.00 - 15.00 WIB
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Layanan Kami -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title text-primary mb-4">
                        <i class="fas fa-tools me-2"></i>Layanan Kami
                    </h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-motorcycle text-primary me-3"></i>
                                <span>Penjualan Motor Yamaha Baru</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-wrench text-primary me-3"></i>
                                <span>Service & Maintenance</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-cogs text-primary me-3"></i>
                                <span>Spare Part Original</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-credit-card text-primary me-3"></i>
                                <span>Kredit Motor (DP Ringan)</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-shield-alt text-primary me-3"></i>
                                <span>Asuransi Motor</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exchange-alt text-primary me-3"></i>
                                <span>Trade In Motor Bekas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Kontak -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-primary mb-4">
                        <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                    </h4>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">No. Telepon</label>
                                <input type="tel" class="form-control" id="phone" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="motor_interest" class="form-label">Motor yang Diminati</label>
                                <select class="form-control" id="motor_interest">
                                    <option value="">Pilih Motor</option>
                                    <option value="TMAX">TMAX</option>
                                    <option value="XMAX 250">XMAX 250</option>
                                    <option value="NMAX TURBO">NMAX TURBO</option>
                                    <option value="R15M">R15M</option>
                                    <option value="MT-15">MT-15</option>
                                    <option value="FreeGo">FreeGo</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subjek</label>
                            <select class="form-control" id="subject" required>
                                <option value="">Pilih Subjek</option>
                                <option value="Informasi Harga">Informasi Harga</option>
                                <option value="Test Drive">Test Drive</option>
                                <option value="Kredit Motor">Kredit Motor</option>
                                <option value="Service Motor">Service Motor</option>
                                <option value="Spare Part">Spare Part</option>
                                <option value="Trade In">Trade In</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Pesan</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Tuliskan pesan atau pertanyaan Anda..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Map atau Info Tambahan -->
            <div class="card mt-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Lokasi Dealer</h5>
                    <p class="text-muted mb-3">Mudah dijangkau dan strategis di depan SAMSAT Wates</p>
                    <div class="bg-light p-4 rounded">
                        <i class="fas fa-map-marked-alt fa-5x text-primary mb-3"></i>
                        <p class="mb-0">
                            <strong>Yamaha Mataram Sakti</strong><br>
                            Kulon Progo, Yogyakarta
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection