<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColums     = ['role'];
        $searchableColumns    = ['name'];
        $pageData['dataUser'] = User::filter($request, $filterableColums, $searchableColumns)->paginate(5)->OnEachSide(2)->withQueryString();
        return view('admin.user.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diinputkan
        $request->validate([
            'name'     => ['required'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
            'role'     => ['required', 'in:Super Admin,Administrator,Pelanggan,Mitra'],
        ]);

        // Menangani file avatar jika ada
        $avatarName = null;
        if ($request->hasFile('avatar')) {
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('avatar'), $avatarName);
        }

        // Menyimpan data ke database dengan User::create()
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'avatar'   => $avatarName,
        ]);

        return redirect()->route('user.list')->with('success', 'User berhasil ditambahkan');
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
    public function edit(string $param1)
    {
        $pageData['data_user'] = User::findOrFail($param1);
        return view('admin.user.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'   => ['required', 'max:200'],
            'email'  => ['required', 'email', 'max:200'],
            'role'   => ['required', 'in:Super Admin,Administrator,Pelanggan,Mitra'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'], // Validasi foto
        ]);

        $user = User::findOrFail($request->id);

        // Update data teks
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->role  = $request->role;

        // Hanya update password jika diinputkan yang baru
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Menangani update foto profil
        if ($request->hasFile('avatar')) {
            // Hapus foto lama jika ada (opsional tapi disarankan)
            if ($user->avatar && file_exists(public_path('avatar/' . $user->avatar))) {
                unlink(public_path('avatar/' . $user->avatar));
            }

            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('avatar'), $avatarName);
            $user->avatar = $avatarName;
        }

        $user->save();

        return redirect()->route('user.list')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(string $param1)
    {
        $user = User::findOrFail($param1);
        $user->delete();
        return redirect()->route('user.list')->with('success', 'Penghapusan Data Berhasil');
    }
}
