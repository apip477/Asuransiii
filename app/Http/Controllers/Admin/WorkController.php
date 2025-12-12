<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SubmissionAcceptedNotification;
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
// app/Http/Controllers/Admin/WorkController.php

public function update(Request $request, Work $work) // Asumsi menggunakan model Work
{
    $newStatus = $request->input('status'); // Ambil status dari form Admin
    // Ambil alasan penolakan jika ada
    $rejectionReason = $request->input('reason'); 

    // 1. Update status
    $work->status = $newStatus;
    if ($newStatus === 'rejected') {
        // Simpan alasan penolakan jika diperlukan
        $work->rejection_reason = $rejectionReason; 
    }
    $work->save();

    // 2. Kirim Notifikasi ke Nasabah
    Mail::to($work->user->email)->send(new SubmissionAcceptedNotification($work, $newStatus));

    // 3. Redirect ke halaman index
    if ($newStatus === 'accepted') {
        $message = 'Pengajuan disetujui, notifikasi WA dikirimkan ke nasabah.';
    } else {
        $message = 'Pengajuan ditolak, notifikasi dikirimkan ke nasabah.';
    }

    return redirect()->route('works.index')->with('success', $message);
}

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