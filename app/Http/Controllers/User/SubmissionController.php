<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\RedirectResponse; 
use Illuminate\View\View; // Tambahkan ini
use Illuminate\Support\Facades\Storage; 

class SubmissionController extends Controller
{
    /**
     * Menampilkan formulir pengajuan jaminan.
     */
    public function create(Request $request): View // Terima objek Request di sini
    {
        // 1. Logika Mapping Produk untuk Pre-fill Judul Proyek
        $product_slug = $request->query('product');
        
        $product_mapping = [
            'bid_bond'           => 'Jaminan Penawaran (Bid Bond)',
            'performance_bond'   => 'Jaminan Pelaksanaan (Performance Bond)',
            'adv_payment_bond'   => 'Jaminan Uang Muka (Adv. Payment Bond)',
            'retensi_bond'       => 'Jaminan Pemeliharaan (Retensi)',
            'payment_bond'       => 'Jaminan Pembayaran (Payment Bond)',
            'sp2d_bond'          => 'SP2D Bank Garansi',
            'custom_bond'        => 'Jaminan Lainnya (Custom Bond)',
        ];
        
        // Dapatkan judul pre-fill. Jika tidak ada slug, kembalikan string kosong.
        $prefill_project_title = $product_mapping[$product_slug] ?? '';

        // Kirim nilai pre-fill ini ke view
        return view('user.submission.create', [
            'prefill_title' => $prefill_project_title,
        ]);
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
            // Tambahkan validasi untuk product_name yang dikirim dari hidden input
            'product_name' => 'nullable|string|max:255', 
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
            // Opsional: Simpan product_name ke field yang relevan di tabel works
            // Jika Anda memiliki kolom 'product_type' di tabel 'works', Anda bisa menyimpannya di sini:
            // 'product_type' => $validated['product_name'] ?? 'Manual', 
        ]);

        // 4. REDIRECT AKHIR: Arahkan ke halaman konfirmasi yang jelas
        return redirect()->route('submission.success') 
                         ->with('success', 'Pengajuan jaminan Anda berhasil dikirim.');
    }
}