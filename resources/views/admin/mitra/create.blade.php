
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
                        <li class="breadcrumb-item active" aria-current="page">Tambah Mitra</li>
                    </ol>
                </nav>
                <h2 class="h4">Tambah Mitra</h2>
                <p class="mb-0">Form penambahan mitra baru</p>
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
            <form action="{{ route('mitra.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="nama_mitra">Nama Mitra</label>
                            <input class="form-control" id="nama_mitra" name="nama_mitra" type="text" placeholder="Masukkan nama mitra" required="">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="alamat">Alamat</label>
                            <input class="form-control" id="alamat" name="alamat" type="text" placeholder="Masukkan alamat" required="">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.3 5.68a1 1 0 0 1 .82-.1l6.35 2.55 6.35-2.55a1 1 0 1 1 .82 1.83L10 9.83 3.5 6.41a1 1 0 0 1-.2-1.73z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M2 7.98a1 1 0 0 1 1 0l7 3.02 7-3.02a1 1 0 1 1 1 1.73l-8 3.45a1 1 0 0 1-.82 0l-8-3.45a1 1 0 0 1-.18-1.73z" clip-rule="evenodd"/>
                                </svg>
                            </span>
                            <input class="form-control" id="email" name="email" type="email" placeholder="Masukkan email" required="">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input class="form-control" id="nomor_telepon" name="nomor_telepon" type="text" placeholder="Masukkan nomor telepon" required="">
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3">
                        <label for="jenis_kemitraan">Jenis Kemitraan</label>
                        <select class="form-select mb-0" id="jenis_kemitraan" name="jenis_kemitraan" aria-label="Pilih jenis kemitraan">
                            <option selected="">Pilih jenis kemitraan</option>
                            <option value="Silver">Silver</option>
                            <option value="Gold">Gold</option>
                            <option value="Platinum">Platinum</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_bergabung">Tanggal Bergabung</label>
                        <input data-datepicker="" class="form-control datepicker-input" id="tanggal_bergabung" name="tanggal_bergabung" type="date" placeholder="dd/mm/yyyy" required="">
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

                        <!-- Checkbox Validasi -->
                        <div>
                            <input type="checkbox" name="confirmation" id="confirmation" value="1" required>
                            <label for="confirmation">Data ini benar dan dapat dipertanggungjawabkan dengan semestinya</label>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save all</button>
                        </div>
            </form>
        </div>
@endsection

