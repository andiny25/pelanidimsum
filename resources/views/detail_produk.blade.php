@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="container py-5 mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb small bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}" class="text-muted text-decoration-none">Beranda</a></li>
                    <li class="breadcrumb-item active text-orange fw-600" aria-current="page">{{ $item->name_produk }}</li>
                </ol>
            </nav>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="row g-0">
                    <div class="col-md-5">
                        <div class="position-relative h-100">
                            <img src="{{ asset('gambar_product/' . $item->gambar_product) }}"
                                 class="img-fluid w-100 h-100 object-fit-cover"
                                 alt="{{ $item->name_produk }}"
                                 style="min-height: 400px;">
                            <div class="badge-tag">
                                <i class="fas fa-star me-1"></i> Best Seller
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="card-body p-4 p-lg-5">
                            <div class="mb-1 text-orange small fw-bold text-uppercase tracking-widest">Pelani Dimsum Menu</div>
                            <h2 class="fw-700 mb-2 text-dark">{{ $item->name_produk }}</h2>

                            <div class="d-flex align-items-baseline mb-4">
                                <h3 class="text-orange fw-700 mb-0">Rp {{ number_format($item->harga, 0, ',', '.') }}</h3>
                                <span class="ms-2 text-muted small">/ porsi</span>
                            </div>

                            <div class="description-section mb-4">
                                <h6 class="fw-bold text-dark mb-2 small text-uppercase">Deskripsi Produk</h6>
                                <p class="text-muted mb-0 lh-base" style="font-size: 0.95rem;">
                                    {{ $item->deskripsi }}
                                </p>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-6">
                                    <div class="d-flex align-items-center p-2 border rounded-3 bg-light-subtle">
                                        <i class="fas fa-leaf text-success me-2 small"></i>
                                        <span class="small fw-600">Bahan Alami</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center p-2 border rounded-3 bg-light-subtle">
                                        <i class="fas fa-fire-alt text-danger me-2 small"></i>
                                        <span class="small fw-600">Sajikan Hangat</span>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4 opacity-50">

                            <div class="row align-items-center">
                                <div class="col-sm-8">
                                    <a href="https://wa.me/6281234567890?text=Halo%20Pelani%20Dimsum,%20saya%20ingin%20memesan%20{{ urlencode($item->name_produk) }}"
                                       target="_blank"
                                       class="btn btn-orange w-100 rounded-3 py-2 fw-bold shadow-sm transition">
                                        <i class="fab fa-whatsapp me-2"></i> Pesan via WhatsApp
                                    </a>
                                </div>
                                <div class="col-sm-4 mt-3 mt-sm-0">
                                    <div class="text-center text-sm-start">
                                        <span class="text-muted" style="font-size: 0.75rem;">Est. Ready</span><br>
                                        <span class="fw-bold small text-dark"><i class="far fa-clock me-1"></i> 15-20 Menit</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('home.index') }}" class="text-muted small text-decoration-none hover-orange">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke daftar menu
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #fcfcfc;
    }

    .fw-600 { font-weight: 600; }
    .fw-700 { font-weight: 700; }
    .text-orange { color: #D35400 !important; }
    .bg-light-subtle { background-color: #fdfdfd; }

    /* Image Control */
    .object-fit-cover { object-fit: cover; }
    .badge-tag {
        position: absolute;
        top: 15px;
        right: 15px;
        background: #D35400;
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: bold;
        text-transform: uppercase;
    }

    /* Button Styling */
    .btn-orange {
        background: #D35400;
        color: white;
        border: none;
        font-size: 0.9rem;
    }
    .btn-orange:hover {
        background: #A04000;
        color: white;
        transform: translateY(-2px);
    }

    .hover-orange:hover {
        color: #D35400 !important;
    }

    .tracking-widest { letter-spacing: 2px; }
    .transition { transition: all 0.2s ease-in-out; }

    /* Card Styling */
    .card {
        border: 1px solid rgba(0,0,0,0.05) !important;
    }

    @media (max-width: 768px) {
        .card-body { padding: 1.5rem !important; }
    }
</style>
@endsection
