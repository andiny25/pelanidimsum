@extends('layouts.admin.app')

@section('content')
<style>
    /* Styling Dasar Form */
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

    /* Card Styling */
    .card-custom {
        border-radius: 15px;
        border: none;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    /* Breadcrumb Warna Cokelat */
    .breadcrumb-item a, .breadcrumb-item.active {
        color: #8B5E3C !important;
    }

    /* Menghilangkan warna biru bawaan pada option dropdown */
    .form-select option {
        color: #5A3E2B;
        background-color: #FFF4E6;
    }
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                {{-- <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #D35400;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </a>
                </li> --}}
                {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.list') }}">User</a></li>
                <li class="breadcrumb-item active">Tambah User</li> --}}
            </ol>
        </nav>
        <h2 class="h4 fw-bold" style="color: #5A3E2B;">Tambah User Baru</h2>
        <p class="mb-0" style="color: #8B5E3C;">Silakan isi formulir di bawah untuk menambahkan pengguna baru.</p>
    </div>

    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('user.list') }}"
           class="btn btn-sm shadow-sm"
           style="background: #FFF4E6; color: #5A3E2B; border: 1px solid #5A3E2B; border-radius: 8px; padding: 10px 20px;">
           <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>
</div>

<div class="card card-custom card-body p-4 p-md-5">

    {{-- Menampilkan pesan error --}}
    @if($errors->any())
    <div class="alert alert-danger border-0 shadow-sm" style="border-radius: 10px; background-color: #FDEDEC;">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li class="small fw-bold text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <h5 class="mb-4" style="color: #D35400; font-weight: 700;">
                <i class="fas fa-user-circle me-2"></i>Informasi Akun
            </h5>

            <div class="col-md-12 mb-4">
                <label for="avatar">Foto Profil</label>
                <input class="form-control border-light shadow-sm" id="avatar" type="file" name="avatar" style="border-radius: 8px;">
                <small class="text-muted mt-2 d-block">Gunakan foto formal dengan format JPG/PNG.</small>
            </div>

            <div class="col-md-6 mb-3">
                <label for="name">Nama Lengkap</label>
                <input class="form-control border-light shadow-sm" id="name" name="name" type="text"
                    placeholder="Masukkan nama lengkap" required style="border-radius: 8px; padding: 12px;">
            </div>

            <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input class="form-control border-light shadow-sm" id="email" name="email" type="email"
                    placeholder="nama@email.com" required style="border-radius: 8px; padding: 12px;">
            </div>

            <div class="col-md-6 mb-3">
                <label for="password">Password</label>
                <input class="form-control border-light shadow-sm" id="password" name="password" type="password"
                    placeholder="Buat password aman" required style="border-radius: 8px; padding: 12px;">
            </div>

            <div class="col-md-6 mb-3">
                <label for="role">Role</label>
                <select class="form-select border-light shadow-sm" id="role" name="role" required style="border-radius: 8px; padding: 12px;">
                    <option value="" selected disabled>Pilih Role...</option>
                    <option value="Super Admin">Super Admin</option>
                    <option value="Administrator">Administrator</option>
                    <option value="Pelanggan">Pelanggan</option>
                    <option value="Mitra">Mitra</option>
                </select>
            </div>
        </div>

        <div class="mt-4 pt-4 border-top text-end">
            <button type="submit" class="btn text-white fw-bold shadow-sm"
                style="background: #D35400; border: none; padding: 12px 30px; border-radius: 10px; width: 200px;">
                <i class="fas fa-save me-2"></i> Simpan User
            </button>
        </div>
    </form>
</div>
@endsection
