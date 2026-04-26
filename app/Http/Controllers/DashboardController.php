<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Produk;
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

        // Mengambil 3 pelanggan terbaru
        $pelangganTerbaru = DB::table('pelanggan')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get(['first_name', 'email', 'created_at']);

        // Data kontak dari tabel contacts
        $contacts = Contact::all();
        $products = Produk::All();

        // Gabungkan semua data dalam satu array untuk dikirim ke view
        return view('admin.dashboard', [
            'totalPelanggan' => $totalPelanggan,
            'totalUsers' => $totalUsers,
            'totalMitra' => $totalMitra,
            'pelangganTerbaru' => $pelangganTerbaru,
            'contacts' => $contacts,
            'products' => $products,
        ]);

        return view('admin.dashboard', compact('contacts','products'));

    }
}
