<?php
// app/Http/Controllers/Admin/ContactController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact; // Import Model Contact
use Illuminate\View\View; // Import View
use Illuminate\Http\Request; // Import Request
use Illuminate\Http\RedirectResponse; // Import RedirectResponse

class ContactController extends Controller
{
    /**
     * Menampilkan daftar semua pesan kontak yang masuk untuk Admin.
     */
    public function index(): View
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Menandai pesan kontak sebagai sudah dibaca.
     */
    public function markRead(Request $request, Contact $contact): RedirectResponse
    {
        $contact->update(['is_read' => true]);
        return redirect()->route('admin.contacts.index')->with('success', 'Pesan telah ditandai sebagai sudah dibaca.');
    }

    /**
     * Menghapus pesan kontak.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Pesan kontak berhasil dihapus.');
    }
}
