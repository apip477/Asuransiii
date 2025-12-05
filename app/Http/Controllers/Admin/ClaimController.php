<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Storage; // <-- WAJIB: Import Storage untuk hapus file

class ClaimController extends Controller
{
    /**
     * Menampilkan daftar semua Klaim yang masuk.
     */
    public function index()
    {
        // Mengambil semua klaim, diurutkan dari yang terbaru, dan memuat data user
        $claims = Claim::with('user')
                        ->orderBy('created_at', 'desc')
                        ->get();
        
        return view('admin.claims.index', compact('claims')); 
    }

    /**
     * Menampilkan detail spesifik dari sebuah Klaim.
     */
    public function show(Claim $claim)
    {
        // Memuat relasi user agar bisa diakses di view
        $claim->load('user'); 

        return view('admin.claims.show', compact('claim'));
    }

    /**
     * Memperbarui status Klaim (Admin action).
     */
    public function update(Request $request, Claim $claim)
    {
        // Validasi status baru
        $request->validate([
            'status' => 'required|in:pending,approved,rejected,closed',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $claim->status = $request->input('status');
        $claim->admin_notes = $request->input('admin_notes');
        $claim->save();

        // Setelah sukses, bersihkan cache
        \Artisan::call('cache:clear'); 

        return redirect()->route('admin.claims.show', $claim->id)
                         ->with('success', 'Status Klaim berhasil diperbarui.');
    }

    /**
     * Menghapus Klaim dan file yang terkait dari storage.
     */
    public function destroy(Claim $claim)
    {
        // 1. Hapus Dokumen terkait dari Storage (Penting untuk membersihkan storage)
        if ($claim->document_contract_path) {
            Storage::disk('public')->delete($claim->document_contract_path);
        }
        if ($claim->document_loss_path) {
            Storage::disk('public')->delete($claim->document_loss_path);
        }
        
        // 2. Hapus Record dari Database
        $claim->delete();

        // 3. Redirect kembali ke daftar klaim dengan pesan sukses
        return redirect()->route('admin.claims.index')
                         ->with('success', 'Klaim ID #' . $claim->id . ' berhasil dihapus.');
    }
    
    // create, store, dan edit tidak diperlukan untuk Admin
    public function create() { /* TIDAK DIPAKAI */ }
    public function store(Request $request) { /* TIDAK DIPAKAI */ }
    public function edit(Claim $claim) { /* TIDAK DIPAKAI */ }
}