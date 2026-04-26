@extends('layouts.admin.app')

@section('content')
<style>
    /* Styling Dasar Form - Persis Edit User */
    .form-control:focus, .form-select:focus {
        border-color: #D35400 !important;
        box-shadow: 0 0 0 0.25rem rgba(211, 84, 0, 0.25) !important;
    }

    /* Warna Label agar senada dengan Sidebar */
    label {
        color: #5A3E2B;
        font-weight: 600;
        margin-bottom: 8px;
    }

    /* Card Styling Custom */
    .card-custom {
        border-radius: 15px;
        border: none;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    /* Breadcrumb Warna Cokelat */
    .breadcrumb-item a, .breadcrumb-item.active {
        color: #8B5E3C !important;
    }
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            {{-- <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('produk.list') }}">Produk</a></li>
                <li class="breadcrumb-item active">Edit Produk</li>
            </ol> --}}
        </nav>
        <h2 class="h4 fw-bold" style="color: #5A3E2B;">Edit Produk</h2>
        <p class="mb-0" style="color: #8B5E3C;">Perbarui data produk: <strong>{{ $produk->name_produk }}</strong></p>
    </div>

    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('produk.list') }}"
           class="btn btn-sm shadow-sm"
           style="background: #FFF4E6; color: #5A3E2B; border: 1px solid #5A3E2B; border-radius: 8px; padding: 10px 20px;">
           <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>
</div>

<div class="card card-custom card-body p-4 p-md-5">
    <h5 class="mb-4" style="color: #D35400; font-weight: 700;">
        <i class="fas fa-info-circle me-2"></i>Informasi Produk
    </h5>

    {{-- Alert Error --}}
    @if ($errors->any())
        <div class="alert alert-danger border-0 shadow-sm" style="border-radius: 10px; background-color: #FDEDEC;">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li class="small fw-bold text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produk.update', $produk->produk_id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name_produk">Nama Produk</label>
                <input class="form-control border-light shadow-sm" name="name_produk" type="text"
                       value="{{ old('name_produk', $produk->name_produk) }}" required style="border-radius: 8px; padding: 12px;">
            </div>
            <div class="col-md-6 mb-3">
                <label for="harga">Harga</label>
                <input class="form-control border-light shadow-sm" name="harga" type="number"
                       value="{{ old('harga', $produk->harga) }}" required style="border-radius: 8px; padding: 12px;">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control border-light shadow-sm" name="deskripsi" rows="3" required
                          style="border-radius: 8px; padding: 12px;">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
            </div>

            <div class="col-md-12 mb-3">
                <label>Foto Produk Saat Ini</label>
                <div class="mb-3">
                    @if($produk->gambar_product && file_exists(public_path('gambar_product/'.$produk->gambar_product)))
                        <img src="{{ asset('gambar_product/'.$produk->gambar_product) }}" width="120" class="rounded border shadow-sm">
                    @else
                        <span class="badge bg-soft-secondary text-secondary">Tidak ada foto</span>
                    @endif
                </div>

                <label for="gambar_product">Ganti Foto (Kosongkan jika tidak ingin diganti)</label>
                <input class="form-control border-light shadow-sm" type="file" name="gambar_product" id="gambar_product"
                       style="border-radius: 8px; padding: 10px;">
                <small class="text-muted">Format: jpg, jpeg, png. Maks: 2MB</small>
            </div>
        </div>

        <div class="mt-4 pt-4 border-top text-end">
            <button type="submit" class="btn text-white fw-bold shadow-sm"
                style="background: #D35400; border: none; padding: 12px 30px; border-radius: 10px;">
                <i class="fas fa-save me-2"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
