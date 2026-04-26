
@extends('layouts.admin.app')

@section('content')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mitra</li>
                        <li class="breadcrumb-item active" aria-current="page">EditMitra</li>
                    </ol>
                </nav>
                <h2 class="h4">Edit Mitra</h2>
                <p class="mb-0">Form perubahan data mitra </p>
            </div>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('mitra.list') }}"
                    class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                    Kembali
                </a>
                
            </div>
        </div>

        {{-- Form Section --}}
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">General information</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('mitra.update') }}" method="POST">
                @csrf
                    <div class="row">
                        <!-- Nama Mitra -->
                        <div class="col-md-6 mb-3">
                            <label for="nama_mitra">Nama Mitra</label>
                            <input class="form-control" id="nama_mitra" name="nama_mitra" type="text"
                                   placeholder="Masukkan nama mitra" value="{{ $dataMitra->nama_mitra ?? '' }}" required maxlength="200">
                        </div>

                        <!-- Alamat -->
                        <div class="col-md-6 mb-3">
                            <label for="alamat">Alamat</label>
                            <input class="form-control" id="alamat" name="alamat" type="text"
                                   placeholder="Masukkan alamat mitra" value="{{ $dataMitra->Alamat ?? '' }}" required maxlength="200">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="email" type="email"
                                   placeholder="Masukkan email" value="{{ $dataMitra->email ?? '' }}" required maxlength="50">
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="col-md-6 mb-3">
                            <label for="nomor_telepon">Nomor Telepon</label>
                            <input class="form-control" id="nomor_telepon" name="nomor_telepon" type="text"
                                   placeholder="Masukkan nomor telepon" value="{{ $dataMitra->nomor_telepon ?? '' }}" required
                                   pattern="\d*" title="Hanya boleh angka">
                        </div>

                        <!-- Jenis Kemitraan -->
                        <div class="col-md-6 mb-3">
                            <label for="jenis_kemitraan">Jenis Kemitraan</label>
                            <select class="form-control" id="jenis_kemitraan" name="jenis_kemitraan" required>
                                <option value="" disabled selected>Pilih jenis kemitraan</option>
                                <option value="Platinum" {{ (isset($dataMitra->jenis_kemitraan) && $dataMitra->jenis_kemitraan == 'Platinum') ? 'selected' : '' }}>Platinum</option>
                                <option value="Gold" {{ (isset($dataMitra->jenis_kemitraan) && $dataMitra->jenis_kemitraan == 'Gold') ? 'selected' : '' }}>Gold</option>
                                <option value="Silver" {{ (isset($dataMitra->jenis_kemitraan) && $dataMitra->jenis_kemitraan == 'Silver') ? 'selected' : '' }}>Silver</option>
                            </select>
                        </div>

                        <!-- Tanggal Bergabung -->
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_bergabung">Tanggal Bergabung</label>
                            <input class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" type="date"
                                   value="{{ $dataMitra->tanggal_bergabung ?? '' }}" placeholder="dd/mm/yyyy" required>
                        </div>



                        <!-- Tombol Submit -->
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>

                                    <div class="datepicker-footer">
                                        <div class="datepicker-controls"><button type="button" class="btn today-btn"
                                                style="display: none;">Today</button><button type="button"
                                                class="btn clear-btn" style="display: none;">Clear</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <input type="hidden" name="mitra_id" value="{{ $dataMitra->mitra_id }}">

            </form>
        </div>
@endsection

