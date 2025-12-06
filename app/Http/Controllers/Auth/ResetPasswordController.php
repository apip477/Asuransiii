<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
    /**
     * Menampilkan formulir reset password.
     * Metode ini dipanggil saat pengguna mengklik tautan dari email.
     */
    public function showResetForm(Request $request, $token = null): View
    {
        // =============================================================
        // DEBUGGING SEMENTARA UNTUK MENGUJI VARIABEL $token
        // =============================================================
        
        if (is_null($token)) {
            // Jika token tidak ditemukan di URL, hentikan dan tampilkan pesan error
            dd('ERROR: TOKEN TIDAK DITEMUKAN DI URL! Cek rute dan tautan email Anda.');
        } else {
            // Jika token ditemukan, hentikan dan tampilkan token yang berhasil ditangkap
            dd('TOKEN BERHASIL DITEMUKAN:', $token);
        }
        
        // =============================================================
        // Akhir dari Debugging
        // =============================================================
        
        // PENTING: Meneruskan variabel $token dan $email ke view
        return view('auth.reset-password')->with([
            'token' => $token,
            'email' => $request->email, // Ambil email dari query string di URL
        ]);
    }

    /**
     * Memproses permintaan POST untuk mereset password.
     * Di sini Anda akan menambahkan logika untuk validasi dan update password ke database.
     */
    public function reset(Request $request)
    {
        // ... (Logika untuk memvalidasi dan mengupdate password akan diletakkan di sini)
        
        // Untuk sementara, Anda bisa menambahkan dd() untuk memastikan ini terpanggil:
        // dd('Reset password logic here.', $request->all());
    }
}