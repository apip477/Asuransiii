<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\RedirectResponse; 
use Illuminate\Support\Facades\Storage; 

class SubmissionController extends Controller
{
    /**
     * Menampilkan formulir pengajuan jaminan.
     */
    public function create()
    {
        return view('user.submission.create'); 
    }

    /**
     * Menyimpan data pengajuan jaminan dan dokumen ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi Data dan File
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'file_path' => 'required|file|mimes:pdf,zip,jpg,png|max:5120', 
        ]);

        // 2. Simpan File ke storage/app/public/works/
        $filePath = $request->file('file_path')->store('works', 'public'); 

        // 3. Simpan Data ke Database
        Work::create([
            'user_id' => Auth::id(), 
            'title' => $validated['title'],
            'description' => $validated['description'],
            'file_path' => $filePath, 
            'status' => 'pending', 
        ]);

        // 4. REDIRECT AKHIR: Arahkan ke halaman konfirmasi yang jelas
        return redirect()->route('submission.success') 
                         ->with('success', 'Pengajuan jaminan Anda berhasil dikirim.');
    }
}