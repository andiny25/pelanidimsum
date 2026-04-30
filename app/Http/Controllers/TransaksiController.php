<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;

class TransaksiController extends Controller
{
    // =========================
    // RIWAYAT TRANSAKSI
    // =========================
    public function index()
    {
        $transaksi = Transaksi::with('detailTransaksi.produk')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.transaksi.index', compact('transaksi'));
    }

    // =========================
    // SIMPAN TRANSAKSI
    // =========================
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            // buat transaksi utama
            $transaksi = Transaksi::create([
                'total' => $data['total'],
                'bayar' => $data['bayar'],
                'kembalian' => $data['kembalian'],
            ]);

            // simpan detail transaksi
            if (!empty($data['items'])) {
                foreach ($data['items'] as $item) {
                    DetailTransaksi::create([
                        'transaksi_id' => $transaksi->id,
                        'produk_id' => $item['id'],
                        'qty' => $item['qty'],
                        'harga' => $item['harga'],
                    ]);
                }
            }

            return response()->json([
                'status' => 'success'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}