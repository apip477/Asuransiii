<?php
// app/Http/Controllers/Admin/ContactController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact; // Import Model Contact
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    /**
     * Menampilkan daftar semua pesan kontak yang masuk (Index).
     */
    public function index(): View
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    // --- Fungsionalitas CREATE ---

    /**
     * Menampilkan form untuk membuat pesan kontak baru (Create).
     * Metode ini opsional, tergantung apakah Admin diizinkan membuat pesan.
     */
    public function create(): View
    {
        return view('admin.contacts.create');
    }

    /**
     * Menyimpan pesan kontak yang baru dibuat ke dalam storage (Store).
     * Ini adalah metode yang hilang dan menyebabkan error.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi data yang masuk
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // 2. Simpan data ke database
        Contact::create($validatedData);

        // 3. Redirect ke halaman index setelah berhasil menyimpan
        return redirect()->route('admin.contacts.index')
                         ->with('success', 'Pesan kontak berhasil disimpan.');
    }

    // --- Fungsionalitas READ/SHOW ---

    /**
     * Menampilkan detail spesifik dari satu pesan kontak (Show).
     */
    public function show(Contact $contact): View
    {
        // Tandai pesan sebagai sudah dibaca saat dibuka
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }
        
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Menandai pesan kontak sebagai sudah dibaca (Mark Read).
     * Metode tambahan untuk status.
     */
    public function markRead(Request $request, Contact $contact): RedirectResponse
    {
        $contact->update(['is_read' => true]);
        return redirect()->route('admin.contacts.index')->with('success', 'Pesan telah ditandai sebagai sudah dibaca.');
    }
    
    // --- Fungsionalitas DELETE ---

    /**
     * Menghapus pesan kontak (Destroy).
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Pesan kontak berhasil dihapus.');
    }
}