<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work; 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse; 
use Illuminate\Support\Facades\Auth; 

// WAJIB DITAMBAHKAN: Import Mail Facade dan Mailable Class
use Illuminate\Support\Facades\Mail;
use App\Mail\UserClaimApprovedNotification; // Asumsi ini adalah nama Mailable Class Anda

class WorkController extends Controller
{
    /**
     * Menampilkan daftar karya (index).
     */
    public function index()
    {
        // Mengambil semua karya dan memuat relasi user pemiliknya
        $works = Work::with('user')
                     ->orderBy('created_at', 'desc')
                     ->get();
        
        return view('admin.tables.works.index', compact('works'));
    }

    /**
     * Menampilkan detail karya (show) untuk verifikasi oleh Admin.
     */
    public function show(Work $work)
    {
        // Memuat relasi 'user' agar bisa menampilkan nama pemilik
        $work->load('user'); 
        
        // Mengirim data ke view admin/tables/works/show.blade.php
        return view('admin.tables.works.show', compact('work'));
    }

    /**
     * Memperbarui status karya (Setujui/Tolak) dan mengirim notifikasi WA.
     */
    public function update(Request $request, Work $work): RedirectResponse
    {
        // 1. Validasi Status yang dikirimkan
        $request->validate([
            'status' => ['required', 'in:verified,rejected']
        ]);

        $newStatus = $request->input('status');
        $message = '';

        if ($newStatus === 'verified') {
            // Beri nomor sertifikat/jaminan baru (SJU-tahun-timestamp)
            $work->certificate_number = 'SJU-' . date('Y') . time(); 
            $message = 'Pengajuan berhasil diverifikasi. Notifikasi WA dikirim ke user.'; // Pesan diperbarui
            
            // 🚨 LOGIKA PENGIRIMAN EMAIL DENGAN INSTRUKSI WA
            // Pastikan user memiliki email yang valid
            if ($work->user && $work->user->email) {
                try {
                    Mail::to($work->user->email)->send(new UserClaimApprovedNotification($work));
                } catch (\Exception $e) {
                    // Log error jika pengiriman email gagal, tapi lanjutkan proses
                    \Log::error('Failed to send email notification: ' . $e->getMessage());
                }
            }
            // ---------------------------------------------

        } elseif ($newStatus === 'rejected') {
            $message = 'Pengajuan telah ditolak.';
        }
        
        // 2. Update status dan simpan ke database
        $work->status = $newStatus;
        $work->save();

        // 3. Redirect kembali ke halaman daftar karya (index)
        return redirect()->route('works.index')
                         ->with('success', $message);
    }

    // --- Method Resource Lainnya ---

    public function create()
    {
        return view('admin.mitra.create');
    }

    public function store(Request $request)
    {
        // Menyimpan pengajuan baru (Admin tidak perlu)
    }

    public function edit(Work $work)
    {
        return view('admin.works.edit', compact('work'));
    }
    
    public function destroy(Work $work)
    {
        // Menghapus pengajuan
    }
}