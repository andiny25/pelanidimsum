<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total pelanggan
        $totalPelanggan = DB::table('pelanggan')->count();

        // Total users
        $totalUsers = DB::table('users')->count();

        // Total mitra
        $totalMitra = DB::table('mitra')->count();

        // Jumlah penjualan (transaksi selesai)
        $totalPenjualan = Transaksi::count(); 
        // kalau mau lebih valid:
        // $totalPenjualan = Transaksi::where('status', 'selesai')->count();

        // Pelanggan terbaru
        $pelangganTerbaru = DB::table('pelanggan')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get(['first_name', 'email', 'created_at']);

        // Data lain
        $contacts = Contact::all();
        $products = Produk::all();

        return view('admin.dashboard', [
            'totalPelanggan' => $totalPelanggan,
            'totalUsers' => $totalUsers,
            'totalMitra' => $totalMitra,
            'totalPenjualan' => $totalPenjualan,
            'pelangganTerbaru' => $pelangganTerbaru,
            'contacts' => $contacts,
            'products' => $products,
        ]);
    }
}