<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::latest()->get();
        return view('admin.transaksi.index', compact('transaksi'));
    }

 public function store(Request $request)
{
    $transaksi = Transaksi::create([
        'total' => $request->total,
        'bayar' => $request->bayar,
        'kembalian' => $request->kembalian,
    ]);

    foreach ($request->keranjang as $item) {
        DetailTransaksi::create([
            'transaksi_id' => $transaksi->id,
            'produk_id' => $item['id'],
            'qty' => $item['qty'],
            'harga' => $item['harga'],
        ]);
    }

    return response()->json(['success' => true]);
}
}