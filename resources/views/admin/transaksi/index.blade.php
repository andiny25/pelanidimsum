@extends('layouts.admin.app')

@section('content')
<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold text-dark mb-1">Riwayat Transaksi</h4>
        <p class="text-muted small mb-0">Daftar semua transaksi</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            @if($transaksi->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th> <!-- 🔥 INI YANG KAMU MAU -->
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $item->detail }}
                        </td>

                        <td class="fw-bold text-warning">
                            Rp {{ number_format($item->total, 0, ',', '.') }}
                        </td>

                        <td>
                            {{ $item->created_at->format('d M Y, H:i') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else

            <div class="text-center py-5">
                <p class="text-muted">Belum ada transaksi</p>
            </div>

            @endif

        </div>
    </div>

</div>
@endsection