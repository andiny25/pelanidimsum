@extends('layouts.app')

@section('content')
<style>
    /* STANDARISASI GLOBAL */
    :root {
        --primary-orange: #D35400;
        --dark-text: #2d3436;
        --title-size: 2.2rem;    /* Ukuran Judul Standar */
        --body-size: 1rem;       /* Ukuran Tulisan Isi Standar */
        --img-size: 400px;       /* Ukuran Gambar Standar */
    }

    /* 1. Typography */
    .section-title {
        font-size: var(--title-size);
        font-weight: 800;
        color: var(--dark-text);
        margin-bottom: 1.2rem;
    }
    .standard-img:hover {
    transform: scale(1.05);
    transition: 0.3s;
    }
    .section-subtitle {
        color: var(--primary-orange);
        font-weight: 700;
        text-uppercase: uppercase;
        letter-spacing: 2px;
        font-size: 0.9rem;
        display: block;
        margin-bottom: 10px;
    }

    .content-text {
        font-size: var(--body-size);
        color: #636e72;
        line-height: 1.6;
    }

    /* 2. Hero Section */
    .hero-header {
        background: linear-gradient(rgba(255, 244, 230, 0.9), rgba(255, 244, 230, 0.9)),
                    url('https://www.transparenttextures.com/patterns/white-diamond.png');
        min-height: 70vh;
        display: flex;
        align-items: center;
        border-radius: 0 0 50px 50px;
        margin-bottom: 50px;
    }

    /* Konsistensi Gambar Hero & About */
    .standard-img {
        width: var(--img-size);
        height: var(--img-size);
        object-fit: cover;
        border: 10px solid white;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }

    /* 3. Button Standarisasi */
    .btn-orange {
        background: var(--primary-orange);
        color: white;
        padding: 10px 25px; /* Ukuran tidak terlalu besar */
        border-radius: 50px;
        font-weight: 600;
        transition: 0.3s;
        border: none;
    }

    .btn-orange:hover {
        background: #A04000;
        color: white;
        transform: translateY(-2px);
    }

    /* 4. Product Card */
    .product-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        transition: 0.3s;
        background: white;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }

    .price-tag {
        position: absolute;
        bottom: 15px;
        right: 15px;
        background: rgba(255, 255, 255, 0.95);
        padding: 5px 15px;
        border-radius: 50px;
        font-weight: 700;
        color: var(--primary-orange);
        font-size: 0.85rem;
    }

    /* 5. Contact Section */
    .contact-card {
        padding: 40px;
        border-radius: 30px;
        background: #FFF4E6;
    }

    .form-control-custom {
        border-radius: 12px;
        padding: 12px;
        border: 1px solid #FFE8CC;
        font-size: 0.95rem;
    }

    .form-control-custom:focus {
        border-color: var(--primary-orange);
        box-shadow: none;
        background: white;
    }

    html { scroll-behavior: smooth; }
</style>

<div class="container-fluid hero-header">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7 text-center text-lg-start">
                <span class="section-subtitle">✨ Dimsum Mentai No. 1</span>
                <h1 class="section-title">Sensasi Mewah <br><span class="text-orange" style="color:var(--primary-orange)">Pelani Dimsum</span></h1>
                <p class="content-text mb-4 w-75 mx-auto mx-lg-0">
                    Nikmati perpaduan sempurna dimsum lembut dengan saus mentai premium yang dipanggang sempurna. Topping melimpah.
                </p>

                <form action="{{ route('home.index') }}" method="GET" class="d-flex bg-white shadow-sm rounded-pill p-2" style="max-width: 450px;">
                    <input class="form-control border-0 ps-4" type="text" name="search" value="{{ request('search') }}" placeholder="Cari menu...">
                    <button class="btn btn-orange">Cari</button>
                </form>
            </div>

            <div class="col-lg-5 d-none d-lg-block text-center">
                <img src="{{ asset('assets-admin/img/dimsum1.jpg') }}" class="standard-img rounded-circle" alt="Hero">
            </div>
        </div>
    </div>
</div>

<div id="about" class="container py-5">
    <div class="row g-5 align-items-center">
        <div class="col-lg-5 text-center">
            <img src="{{ asset('assets-admin/img/dimsum3.jpg') }}" class="standard-img rounded-4" alt="About">
        </div>
        <div class="col-lg-7 ps-lg-5">
            <span class="section-subtitle">— Tentang Kami</span>
            <h2 class="section-title">Pelani Dimsum: Rasa Mewah, Harga Ramah</h2>
            <p class="content-text mb-4">
                Kami berkomitmen menyajikan dimsum mentai dengan bahan-bahan paling segar dan proses higienis. Setiap gigitan adalah perpaduan rasa autentik dan topping melimpah.
            </p>
            <div class="row g-3 mb-4">
                <div class="col-6">
                    <div class="p-3 border rounded-3 bg-light d-flex align-items-center">
                        <i class="fas fa-utensils me-2 text-orange" style="color:var(--primary-orange)"></i>
                        <span class="fw-bold small">Bahan Segar</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 border rounded-3 bg-light d-flex align-items-center">
                        <i class="fas fa-certificate me-2 text-orange" style="color:var(--primary-orange)"></i>
                        <span class="fw-bold small">Resep Rahasia</span>
                    </div>
                </div>
            </div>
            <a href="#produk" class="btn btn-orange">Lihat Menu Sekarang</a>
        </div>
    </div>
</div>

<div id="produk" class="container-fluid py-5 mt-5" style="background:#fcfcfc;">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-subtitle">Menu Andalan</span>
            <h2 class="section-title">Varian Dimsum Terpopuler</h2>
            <div style="width: 60px; height: 4px; background: var(--primary-orange); margin: 0 auto; border-radius: 10px;"></div>
        </div>

        <div class="row g-4">
            @forelse($produk as $item)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card product-card shadow-sm h-100">
                    <div class="position-relative">
                        <img src="{{ asset('gambar_product/' . $item->gambar_product) }}"
                             class="card-img-top" style="height:220px; object-fit:cover;" alt="{{ $item->nama_produk }}">
                        <div class="price-tag">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                    </div>
                    <div class="card-body p-4 text-center">
                        <h6 class="fw-bold mb-2">{{ $item->nama_produk }}</h6>
                        <p class="small text-muted mb-3">{{ \Illuminate\Support\Str::limit($item->deskripsi, 50) }}</p>
                        <a href="{{ route('produk.show_detail', $item->produk_id) }}"
                           class="btn btn-outline-dark btn-sm w-100 rounded-pill fw-bold">Detail Menu</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="content-text">Maaf, menu "{{ request('search') }}" tidak ditemukan.</p>
                <a href="{{ route('home.index') }}" class="btn btn-orange">Lihat Semua Menu</a>
            </div>
            @endforelse
        </div>
    </div>
</div>

<div id="contact" class="container py-5 mb-5 mt-5">
    <div class="contact-card shadow-sm">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <h2 class="section-title">Ingin Pesan? <br><span style="color: var(--primary-orange)">Hubungi Kami</span></h2>
                <p class="content-text mb-4">Tim kami siap melayani pesanan katering atau delivery langsung ke rumahmu.</p>

                <div class="d-flex align-items-center mb-3">
                    <div class="bg-white p-2 rounded-circle shadow-sm me-3"><i class="fas fa-phone" style="color:var(--primary-orange)"></i></div>
                    <span class="small fw-bold">+62 812-3456-7890</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="bg-white p-2 rounded-circle shadow-sm me-3"><i class="fas fa-map-marker-alt" style="color:var(--primary-orange)"></i></div>
                    <span class="small fw-bold">Jl. Lintas Timur, Terantang Manuk</span>
                </div>
            </div>
            <div class="col-lg-7 text-center">
    <img src="{{ asset('assets-admin/img/dimsum2.jpeg') }}" 
         alt="Contact Image" 
         class="standard-img rounded-4">
</div>

            <!-- <div class="col-lg-7">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control form-control-custom" placeholder="Nama Anda" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control form-control-custom" placeholder="Email Aktif" required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="subject" class="form-control form-control-custom" placeholder="Subjek (Contoh: Pesanan Katering)" required>
                        </div>
                        <div class="col-12">
                            <textarea name="message" class="form-control form-control-custom" rows="4" placeholder="Tulis pesan atau detail pesanan Anda di sini..." required></textarea>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-orange px-4">
                                Kirim Pesan <i class="fas fa-paper-plane ms-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div> -->
        </div>
    </div>
</div>

@if(request('search'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const element = document.getElementById("produk");
        if (element) element.scrollIntoView({ behavior: 'smooth' });
    });
</script>
@endif

@endsection
