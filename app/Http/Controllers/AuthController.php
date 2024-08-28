<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'no_anggota' => 'required|string',
            'no_ktp' => 'required|string',
        ]);

        $anggota = Anggota::where('no_anggota', $request->no_anggota)
            ->where('no_ktp', $request->no_ktp)
            ->first();

        if ($anggota) {
            Auth::login($anggota);

            return view('welcome');
        }

        return back()->withErrors([
            'error' => 'Nomor Anggota atau NIK salah.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
