<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SubmissionAcceptedNotification;
use App\Models\Work; 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage; // <-- WAJIB DITAMBAHKAN UNTUK MENGHAPUS FILE
use App\Mail\UserClaimApprovedNotification; // Asumsi ini adalah nama Mailable Class Anda

class WorkController extends Controller
{
    /**
     * Menampilkan daftar karya (index).
     */
    public function index(Request $request)
    {
        // 1. Ambil status filter (Disimpan di sini untuk digunakan di index)
        $filterStatus = $request->query('status');
        $searchTerm = $request->query('search');

        // 2. Mulai query
        $query = Work::with('user')->orderBy('created_at', 'desc');
        
        // 3. Terapkan filter jika ada
        if (!empty($filterStatus)) {
            $query->where('status', $filterStatus);
        }

        // 4. Eksekusi query & Hitung pending untuk badge
        $works = $query->get();
        $pendingCount = Work::where('status', 'pending')->count();
        
        // 5. Kirim data ke view
        return view('admin.tables.works.index', compact('works', 'filterStatus', 'pendingCount'));
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
    public function update(Request $request, Work $work)
    {
        $newStatus = $request->input('status');
        $rejectionReason = $request->input('reason'); 

        // 1. Update status
        $work->status = $newStatus;
        if ($newStatus === 'rejected') {
            $work->rejection_reason = $rejectionReason; 
        }
        $work->save();

        // 2. Kirim Notifikasi ke Nasabah
        // Pastikan Anda menggunakan Mailable Class yang benar: SubmissionAcceptedNotification
        if ($work->user && $work->user->email) {
             Mail::to($work->user->email)->send(new SubmissionAcceptedNotification($work, $newStatus));
        }

        // 3. Redirect ke halaman index dengan nama route yang dikoreksi (admin.work.index)
        if ($newStatus === 'accepted') {
            $message = 'Pengajuan disetujui, notifikasi WA dikirimkan ke nasabah.';
        } else {
            $message = 'Pengajuan ditolak, notifikasi dikirimkan ke nasabah.';
        }

        // KOREKSI REDIRECT NAME
        return redirect()->route('admin.work.index')->with('success', $message);
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
    
    /**
     * Menghapus pengajuan dan dokumen terkait.
     */
    public function destroy(Work $work)
    {
        // Hapus dokumen fisik dari storage (jika ada)
        if ($work->document_path) {
            Storage::disk('public')->delete($work->document_path);
        }
        
        // Hapus entri dari database
        $work->delete();
        
        // KOREKSI REDIRECT NAME
        return redirect()->route('admin.work.index')->with('success', 'Pengajuan berhasil dihapus.');
    }
}