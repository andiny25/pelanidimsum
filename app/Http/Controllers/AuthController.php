<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function login(Request $request)
    {

        $pageData['email'] = $request->email;
        $pageData['password'] = $request->password;
         // Validasi data yang diinputkan
         $request->validate([
            'email' => 'required',
            'password' => [
                'required',
                'min:3',
            ],
        ]);

        $user = User::where('email', $request->email)->first();
        if($user&& Hash::check($request->password, $user->password)){
            Auth::login($user);

            return redirect()->route('dashboard')->with('success', true);
        }

        return redirect()->route('login')->with('error', 'Akun email tidak terdaftar');
    }

    public function show_forget_password()
    {
        return view('forget');
    }

    public function do_forget_password(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],

        ]);
        if ($request->email == '2357@mahasiswa.pcr.ac.id') {
            return redirect()-> route('auth.show-forget')->with('success',$request->email);
        } else {
        return redirect()->route('login')->with('error', true);
        }
        // $pageData['result'] = $result;
        // return view('login-form',$pageData);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')
        ->with(['prompt' => 'select_account'])
        ->redirect();
        //return Socialite::driver('google')->redirect();
    }


public function handleGoogleCallback()
{
    $googleUser = Socialite::driver('google')->stateless()->user();
        $email_user = $googleUser->email;
        //dd($email_user);

        $user = User::where('email', $email_user)->first();
        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', true);
        }

    return redirect()->route('login')->with('error', 'Akun email tidak terdaftar');

}

}
