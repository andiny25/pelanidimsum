<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;

class KasirController extends Controller
{
    // Tampilkan halaman kasir
    public function index()
    {
        $produk = Produk::all();
        return view('admin.kasir.index', compact('produk'));
    }

    // Simpan transaksi
public function store(Request $request)
{
    $data = $request->all();

    \Log::info($data); // cek dulu masuk atau tidak

    $transaksi = Transaksi::create([
        'total' => $data['total'],
        'bayar' => $data['bayar'],
        'kembalian' => $data['kembalian']
    ]);

    foreach ($data['keranjang'] as $item) {
        DetailTransaksi::create([
            'transaksi_id' => $transaksi->id,
            'produk_id' => $item['id'],
            'qty' => $item['qty'],
            'harga' => $item['harga']
        ]);
    }

    return response()->json([
        'success' => true
    ]);
}
}