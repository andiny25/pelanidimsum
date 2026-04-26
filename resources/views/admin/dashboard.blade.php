@extends('layouts.admin.app')

@section('content')
    <style>
        /* Custom Styling untuk Tema Pelani Dimsum */
        :root {
            --pelani-orange: #d35400;
            --pelani-soft: #fff5e6;
            --pelani-dark: #2c3e50;
        }

        .card {
            border-radius: 12px;
            border: none;
            overflow: hidden;
        }

        .text-pelani {
            color: var(--pelani-orange) !important;
        }

        .bg-pelani {
            background-color: var(--pelani-orange) !important;
            color: white !important;
        }

        /* Styling Tabel Premium */
        .table thead th {
            background-color: #fdf2e9;
            /* Oranye sangat muda agar segar */
            color: var(--pelani-orange);
            text-transform: uppercase;
            font-size: 0.7rem;
            letter-spacing: 0.5px;
            font-weight: 700;
            border-bottom: 2px solid var(--pelani-orange);
            padding: 15px;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            font-size: 0.85rem;
            color: #444;
            border-bottom: 1px solid #eee;
        }

        .table-hover tbody tr:hover {
            background-color: var(--pelani-soft);
            transition: 0.3s;
        }

        /* Perbaikan Khusus Kolom Subject */
        .subject-badge {
            background-color: #ebedef;
            color: var(--pelani-dark) !important;
            /* Memastikan teks gelap agar terbaca */
            border: 1px solid #ced4da;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 600;
            display: inline-block;
            font-size: 0.75rem;
        }

        /* Badge Tanggal Pelanggan Terbaru */
        .badge-date {
            background-color: var(--pelani-dark);
            color: white;
            border-radius: 20px;
            padding: 5px 15px;
            font-size: 0.75rem;
        }
    </style>

    <div class="py-4 d-flex justify-content-between align-items-center">
        <h2 class="h4 fw-bold text-pelani mb-0">Ringkasan Dashboard</h2>
        {{-- <button class="btn bg-pelani px-4 shadow-sm fw-bold">Tambah Data</button> --}}
    </div>

    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-start border-4 border-warning">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted small mb-1">Total Pelanggan</h6>
                        <h2 class="fw-bold mb-0 text-dark">{{ $totalPelanggan }}</h2>
                        <small class="text-success fw-bold">↑ 12% sejak bulan lalu</small>
                    </div>
                    <div class="rounded-circle bg-pelani d-flex align-items-center justify-content-center shadow-sm"
                        style="width: 50px; height: 50px;">
                        <i class="fas fa-users text-white"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-start border-4 border-warning">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted small mb-1">Total Users</h6>
                        <h2 class="fw-bold mb-0 text-dark">{{ $totalUsers }}</h2>
                        <small class="text-success fw-bold">↑ 10% sejak bulan lalu</small>
                    </div>
                    <div class="rounded-circle bg-pelani d-flex align-items-center justify-content-center shadow-sm"
                        style="width: 50px; height: 50px;">
                        <i class="fas fa-user-shield text-white"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-start border-4 border-warning">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted small mb-1">Pesan Masuk</h6>
                        <h2 class="fw-bold mb-0 text-dark">{{ $contacts->count() }}</h2>
                        <small class="text-success fw-bold">↑ Aktif</small>
                    </div>
                    <div class="rounded-circle bg-pelani d-flex align-items-center justify-content-center shadow-sm"
                        style="width: 50px; height: 50px;">
                        <i class="fas fa-envelope-open-text text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8">

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 text-pelani fw-bold"><i class="fas fa-utensils me-2"></i>Menu Pelani Dimsum</h5>
                    <a href="{{ route('produk.list') }}" class="btn btn-sm btn-outline-warning fw-bold">
                        Lihat Semua
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th class="text-center">Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td class="ps-4 fw-bold text-muted">{{ $loop->iteration }}</td>
                                    <td class="fw-bold text-dark">{{ $item->name_produk }}</td>
                                    <td class="text-pelani fw-bold">Rp {{ number_format($item->harga ?? 0, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ asset('gambar_product/' . $item->gambar_product) }}" width="55"
                                            height="55" class="rounded-circle shadow-sm border"
                                            style="object-fit: cover;"
                                            onerror="this.src='https://placehold.co/50x50?text=No+Img'">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 text-pelani fw-bold"><i class="fas fa-envelope me-2"></i>Pesan Masuk (Contact Message)
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td class="ps-4 fw-bold text-muted">{{ $loop->iteration }}</td>
                                    <td class="fw-bold text-dark">{{ $contact->name }}</td>
                                    <td class="small text-muted text-nowrap">{{ $contact->email }}</td>
                                    <td>
                                        <span class="subject-badge">
                                            {{ $contact->subject ?? 'No Subject' }}
                                        </span>
                                    </td>
                                    <td class="small text-dark" style="max-width: 200px;">
                                        <i class="fas fa-quote-left text-muted opacity-50 me-1"></i>
                                        {{ str()->limit($contact->message, 50) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-4">

            <div class="card shadow-sm mb-4 text-center overflow-hidden">
                <div class="bg-pelani" style="height: 80px;"></div>
                <div class="card-body pt-0">
                    <img src="{{ asset('assets-admin/img/dimsum1.jpg') }}"
                        class="rounded-circle border border-4 border-white shadow mx-auto mt-n5 mb-3"
                        style="width: 100px; height: 100px; object-fit: cover;">
                    <h5 class="fw-bold mb-1">Pelani Dimsum Mentai</h5>
                    <p class="text-muted small"><i class="fas fa-map-marker-alt me-1"></i> Pekanbaru, Indonesia</p>

                    <div class="text-start mt-4 border-top pt-3">
                        <h6 class="small fw-bold text-pelani text-uppercase mb-3">Tim Online Teraktif</h6>

                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-success me-2"
                                style="width: 10px; height: 10px; border-radius: 50%; padding: 0;"> </span>
                            <span class="small fw-bold">Dhea</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-success me-2"
                                style="width: 10px; height: 10px; border-radius: 50%; padding: 0;"> </span>
                            <span class="small fw-bold">Andini</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-success me-2"
                                style="width: 10px; height: 10px; border-radius: 50%; padding: 0;"> </span>
                            <span class="small fw-bold">Melda</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 text-pelani fw-bold">Pelanggan Terbaru</h6>
                    <i class="fas fa-user-clock text-muted"></i>
                </div>
                <div class="card-body">
                    @forelse ($pelangganTerbaru as $p)
                        <div class="p-3 rounded-3 mb-3 border-start border-4 border-warning shadow-sm"
                            style="background-color: #fcfcfc;">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">{{ $p->first_name }}
                                    </h6>
                                    <small class="text-muted" style="font-size: 0.75rem;">{{ $p->email }}</small>
                                </div>
                                <span
                                    class="badge-date shadow-sm">{{ \Carbon\Carbon::parse($p->created_at)->format('d M Y') }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4">
                            <img src="https://cdn-icons-png.flaticon.com/512/107/107122.png" width="40"
                                class="opacity-25 mb-2">
                            <p class="text-muted small">Belum ada pelanggan baru.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
