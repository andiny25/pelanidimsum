<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produk = Produk::all();

        return view('home', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|email|max:50',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:200',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('home.index')->with('success', 'Pesan berhasil dikirim!');
    }
    public function show($id)
{
    // Cari produk berdasarkan ID (primary key produk_id)
    $item = \App\Models\Produk::findOrFail($id);

    // Memanggil file detail_produk.blade.php yang ada di folder views utama
    return view('detail_produk', compact('item'));
}
}
