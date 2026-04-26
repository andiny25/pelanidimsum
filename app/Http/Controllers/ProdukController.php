<?php
namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // =======================
    // TAMPIL DATA PRODUK
    // =======================
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk.index', compact('produk'));
    }

    // =======================
    // FORM TAMBAH PRODUK
    // =======================
    public function create()
    {
        return view('admin.produk.create');
    }

    // =======================
    // SIMPAN PRODUK
    // =======================
    public function store(Request $request)
    {
        $request->validate([
            'name_produk'    => 'required',
            'harga'          => 'required',
            'deskripsi'      => 'required',
            'gambar_product' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data              = new Produk();
        $data->name_produk = $request->name_produk;
        $data->harga       = $request->harga;
        $data->deskripsi   = $request->deskripsi;

        // upload gambar
        if ($request->hasFile('gambar_product')) {
            $file      = $request->file('gambar_product');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('gambar_product'), $imageName);
            $data->gambar_product = $imageName;
        }

        $data->save();

        return redirect()->route('produk.list')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // =======================
    // FORM EDIT
    // =======================
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    // =======================
    // UPDATE PRODUK
    // =======================
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_produk'    => 'required',
            'harga'          => 'required|numeric',
            'deskripsi'      => 'required',
            'gambar_product' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $produk              = Produk::findOrFail($id);
        $produk->name_produk = $request->name_produk;
        $produk->harga       = $request->harga;
        $produk->deskripsi   = $request->deskripsi;

        if ($request->hasFile('gambar_product')) {
            // Hapus foto lama jika ada di folder
            if ($produk->gambar_product && file_exists(public_path('gambar_product/' . $produk->gambar_product))) {
                unlink(public_path('gambar_product/' . $produk->gambar_product));
            }

            $file      = $request->file('gambar_product');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('gambar_product'), $imageName);
            $produk->gambar_product = $imageName;
        }

        $produk->save();

        return redirect()->route('produk.list')->with('success', 'Produk berhasil diupdate!');
    }

    // =======================
    // HAPUS PRODUK
    // =======================
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.list')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
