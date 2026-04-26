<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan model User ada
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('login'); // Tidak perlu mengirim 'message' kosong
    }

    /**
     * Fungsi untuk proses login.
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:0'],
        ]);

        // Hardcoded Username dan password (hanya contoh)

        $username = $request->username;
        $password = $request->password;

        if ($username =='dhea' && $password == 'dhea123') {
            // Anda mungkin ingin menggunakan autentikasi Laravel yang sebenarnya
            return redirect()->route('dashboard')->with('message', 'Login Berhasil');
        } else {
            return redirect()->back()->with('message', 'Login Gagal! Username atau Password tidak sesuai');
        }
    }

    /**
     * Tampilkan form registrasi.
     */
    public function showRegistrationForm()
    {
        return view('registrasi');
    }

    /**
     * Fungsi untuk proses registrasi.
     */
    public function registrasi(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Buat user baru
        User::create([
            $username => $request->username,
            $email => $request->email,
            $password => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('message', 'Registrasi Berhasil! Silakan login.');
    }

    // Fungsi-fungsi resource lainnya bisa diisi jika diperlukan

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
