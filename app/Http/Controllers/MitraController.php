<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColums = ['jenis_kemitraan'];
        $searchableColumns = ['nama_mitra'];
        $pageData['dataMitra'] = Mitra::filter($request, $filterableColums, $searchableColumns)->paginate(2)->OnEachSide(2)->withQueryString();
        return view('admin.mitra.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mitra' => 'required|string|max:200',
            'alamat' => 'nullable|string',
            'email' => 'required|string|email|max:50|unique:mitra',
            'nomor_telepon' => 'required|string|regex:/^[0-9]+$/',
            'jenis_kemitraan' => 'required|in:Platinum,Gold,Silver',
            'tanggal_bergabung' => 'required|date',
            'confirmation' => 'accepted', // nama disesuaikan dengan checkbox di form
        ], [
            'confirmation.accepted' => 'Checkbox tidak boleh kosong.',
        ]);

        Mitra::create([
            'nama_mitra' => $request->nama_mitra,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'jenis_kemitraan' => $request->jenis_kemitraan,
            'tanggal_bergabung' => $request->tanggal_bergabung,
        ]);

        return redirect()->route('mitra.list')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataMitra = Mitra::findOrFail($id); // Ambil data mitra berdasarkan ID
        return view('admin.mitra.edit', compact('dataMitra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'mitra_id' => ['required'],
            'nama_mitra' => ['required'],
            'alamat' => ['required'],
            'email' => ['required', 'email'],
            'nomor_telepon' => ['required', 'numeric'],
            'jenis_kemitraan' => ['required', 'in:Platinum,Gold,Silver'],
            'tanggal_bergabung' => ['required', 'date'],
        ]);

        $mitra_id = $request->mitra_id;
        $mitra = Mitra::findOrFail($mitra_id);

        // Mengupdate data mitra
        $mitra->mitra_id = $request->mitra_id;
        $mitra->nama_mitra = $request->nama_mitra;
        $mitra->alamat = $request->alamat;
        $mitra->email = $request->email;
        $mitra->nomor_telepon = $request->nomor_telepon;
        $mitra->jenis_kemitraan = $request->jenis_kemitraan;
        $mitra->tanggal_bergabung = $request->tanggal_bergabung;

        // Menyimpan perubahan
        $mitra->save();

        // Redirect atau memberikan respon sukses
        return redirect()->route('mitra.list')->with('success', 'Mitra berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mitra = mitra::findOrFail($id);
        $mitra->delete();
        return redirect()->route('mitra.list')->with('success', 'Data Mitra berhasil dihapus.');
    }
}
